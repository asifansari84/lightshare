<?php

namespace Lightshare;

/**
 * Class for handling social networks operations
 */
class Share_Button {
	/**
	 * Process and sanitize social networks data
	 *
	 * @param array $share_data Raw share data from form submission
	 * @return array Processed and sanitized social networks data
	 */
	public static function process_social_networks($share_data) {
		$network_options = array();

		if (!is_array($share_data)) {
			return $network_options;
		}

		// Handle social networks order
		if (isset($share_data['social_networks_order'])) {
			$order = json_decode($share_data['social_networks_order'], true);
			if (is_array($order) && !empty($order)) {
				$active_networks = isset($share_data['social_networks']) ? (array)$share_data['social_networks'] : array();

				// Only keep active networks in the order
				$network_options['social_networks'] = array_values(array_intersect($order, $active_networks));
			}
		} elseif (isset($share_data['social_networks'])) {
			$network_options['social_networks'] = (array)$share_data['social_networks'];
		}

		return $network_options;
	}
}
