<?php
// Ensure this file is being included by a parent file
if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Lightshare\LS_Options;

?>

<div id="<?php echo esc_attr($tab_id); ?>" class="tab-pane">
	<h2 class="content-title"><span class="dashicons dashicons-share-alt"></span> Floating Button</h2>
	<div class="lightshare-card">
		<table class="form-table">
			<tr valign="top">
				<th scope="row">
					<div class="lightshare-title-wrapper">Enable Floating Button
						<span class="dashicons dashicons-editor-help" data-title="Display social share buttons in floating sidebar"></span>
					</div>

				</th>
				<td>
					<div class="checkbox-radio">
						<label>
							<input type="checkbox" name="lightshare_options[enable_floating_button]" value="1" <?php checked(LS_Options::get_option('enable_floating_button'), '1'); ?> />
						</label>
					</div>
				</td>
			</tr>
		</table>
	</div>
</div>