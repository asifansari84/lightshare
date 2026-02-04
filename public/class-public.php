<?php

namespace Lightshare;

use Lightshare\LS_Options;
use Lightshare\Share_Button;

class Public_Core {
	private $plugin_name;
	private $version;

	public function __construct($plugin_name, $version) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	private function should_enqueue_assets() {
		$post_id = get_queried_object_id();
		$should_enqueue = false;

		$inline_enabled = LS_Options::get_option('inline.enabled', false);
		if ($inline_enabled) {
			$post_types = LS_Options::get_option('inline.post_types', array('post'));
			if (is_singular($post_types)) {
				$should_enqueue = true;
			}
		}

		$floating_enabled = LS_Options::get_option('floating.enabled', false);
		if ($floating_enabled) {
			$post_types = LS_Options::get_option('floating.post_types', array('post', 'page'));
			if (is_singular($post_types)) {
				$should_enqueue = true;
			}
		}

		if (!$should_enqueue && $post_id) {
			$post = get_post($post_id);
			if ($post && has_shortcode($post->post_content, 'lightshare')) {
				$should_enqueue = true;
			}
		}

		/**
		 * Filter whether Lightshare assets should be enqueued.
		 *
		 * @param bool $should_enqueue Whether to enqueue assets.
		 * @param int  $post_id         Current post ID.
		 */
		return apply_filters('lightshare_should_enqueue_assets', $should_enqueue, $post_id);
	}

	public function enqueue_styles() {
		if (!$this->should_enqueue_assets()) {
			return;
		}

		wp_enqueue_style(
			$this->plugin_name . '-public',
			plugin_dir_url(__FILE__) . 'css/lightshare-public.css',
			array(),
			$this->version,
			'all'
		);
	}

	public function enqueue_scripts() {
		if (!$this->should_enqueue_assets()) {
			return;
		}

		wp_enqueue_script(
			$this->plugin_name . '-public',
			plugin_dir_url(__FILE__) . 'js/lightshare-public.js',
			array('jquery'),
			$this->version,
			false
		);

		wp_localize_script(
			$this->plugin_name . '-public',
			'lightshare_ajax',
			array(
				'ajax_url' => admin_url('admin-ajax.php'),
				'nonce'    => wp_create_nonce('lightshare_nonce')
			)
		);
	}

	public function track_click() {
		check_ajax_referer('lightshare_nonce', 'nonce');

		$post_id = isset($_POST['post_id']) ? intval($_POST['post_id']) : 0;
		$network = isset($_POST['network']) ? sanitize_text_field($_POST['network']) : '';

		if ($post_id > 0 && !empty($network)) {
			// Increment total shares
			$total_shares = (int) get_post_meta($post_id, '_lightshare_total_shares', true);
			$total_shares++;
			update_post_meta($post_id, '_lightshare_total_shares', $total_shares);

			// Increment network shares
			$network_shares = (int) get_post_meta($post_id, '_lightshare_shares_' . $network, true);
			$network_shares++;
			update_post_meta($post_id, '_lightshare_shares_' . $network, $network_shares);

			wp_send_json_success(array('count' => Share_Button::format_count($total_shares)));
		}

		wp_send_json_error();
	}

	public function register_shortcodes() {
		add_shortcode('lightshare', array($this, 'render_shortcode'));
	}

	public function render_shortcode($atts) {
		$atts = shortcode_atts(
			array(
				'networks' => '',
				'style'    => '',
			),
			$atts,
			'lightshare'
		);

		return Share_Button::render_buttons($atts);
	}

	public function add_share_buttons($content) {
		if (is_singular() && is_main_query()) {
			// Check if inline sharing is enabled
			$inline_enabled = LS_Options::get_option('inline.enabled', false);

			if ($inline_enabled) {
				// Check if enabled for this post type
				$post_types = LS_Options::get_option('inline.post_types', array('post'));
				if (is_singular($post_types)) {
					$buttons = Share_Button::render_buttons();
					$position = LS_Options::get_option('inline.position', 'after');
					if ($position === 'before') {
						return $buttons . $content;
					}
					return $content . $buttons;
				}
			}
		}
		return $content;
	}

	public function add_floating_buttons() {
		$enabled = LS_Options::get_option('floating.enabled', false);
		
		if ($enabled) {
			$post_types = LS_Options::get_option('floating.post_types', array('post', 'page'));
			
			if (is_singular($post_types)) {
				$alignment = LS_Options::get_option('floating.button_alignment', 'left');
				$size = LS_Options::get_option('floating.button_size', 'medium');
				echo Share_Button::render_buttons(array(
					'class' => 'lightshare-floating lightshare-floating-' . esc_attr($alignment) . ' lightshare-floating-size-' . esc_attr($size),
					'show_label' => false
				));
			}
		}
	}
}
