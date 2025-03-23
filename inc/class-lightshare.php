<?php

namespace Lightshare;

class Lightshare {

	protected $loader;
	protected $plugin_name;
	protected $version;

	public function __construct() {
		$this->version = LIGHTSHARE_VERSION;
		$this->plugin_name = 'lightshare';
		$this->load_dependencies();
		$this->define_admin_hooks();
		$this->define_public_hooks();
	}

	private function load_dependencies() {
		require_once LIGHTSHARE_PATH . 'inc/class-loader.php';
		require_once LIGHTSHARE_PATH . 'inc/class-lightshare-options.php';
		require_once LIGHTSHARE_PATH . 'inc/class-core-tweaks.php';
		require_once LIGHTSHARE_PATH . 'admin/class-admin.php';
		require_once LIGHTSHARE_PATH . 'public/class-public.php';

		$this->loader = new \Lightshare\Loader();
	}

	private function define_public_hooks() {
		$plugin_public = new \Lightshare\Public_Core($this->get_plugin_name(), $this->get_version());

		$this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
		$this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts');

		new \Lightshare\Core_Tweaks();
	}

	private function define_admin_hooks() {
		$plugin_admin = new \Lightshare\Admin($this->get_plugin_name(), $this->get_version());

		$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
		$this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');
		$this->loader->add_action('admin_init', $plugin_admin, 'register_settings');
	}

	public function run() {
		$this->loader->run();
	}

	public function get_plugin_name() {
		return $this->plugin_name;
	}

	public function get_version() {
		return $this->version;
	}
}
