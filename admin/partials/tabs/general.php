<?php
// Ensure this file is being included by a parent file
if (!defined('ABSPATH')) exit; // Exit if accessed directly

use Lightshare\LS_Options;

?>
<div id="<?php echo esc_attr($tab_id); ?>" class="tab-pane">
	<h2 class="content-title"> <span class="dashicons dashicons-dashboard"></span> General</h2>
	<div class="lightshare-card">
		<table class="form-table">
			<tr valign="top">
				<th scope="row">
					<div class="lightshare-title-wrapper">Social Networks
						<span class="dashicons dashicons-editor-help" data-title="Choose which social share buttons to display when the share button is clicked. Click on a square to enable or disable that specific network. Drag and drop squares to arrange the order in which they will display."></span>
					</div>

				</th>
				<td>
					<ul class="lightshare-social-networks">
						<li class="lightshare-social-network-facebook"><label for="lightshare-share-social-network-input-facebook" class="active"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
									<path fill="currentColor" d="m279.14 288 14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path>
								</svg>Facebook<input type="checkbox" id="lightshare-share-social-network-input-facebook" name="lightshare[share][social_networks][]" value="facebook"></label></li>
						<li class="lightshare-social-network-twitter"><label for="lightshare-share-social-network-input-twitter" class="active"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
									<path fill="currentColor" d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8l164.9-188.5L26.8 48h145.6l100.5 132.9zm-24.8 373.8h39.1L151.1 88h-42z"></path>
								</svg>X<input type="checkbox" id="lightshare-share-social-network-input-twitter" name="lightshare[share][social_networks][]" value="twitter"></label></li>
						<li class="lightshare-social-network-linkedin"><label for="lightshare-share-social-network-input-linkedin" class="active"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
									<path fill="currentColor" d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3M447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"></path>
								</svg>LinkedIn<input type="checkbox" id="lightshare-share-social-network-input-linkedin" name="lightshare[share][social_networks][]" value="linkedin"></label></li>
						<li class="lightshare-social-network-pinterest"><label for="lightshare-share-social-network-input-pinterest" class="active"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
									<path fill="currentColor" d="M204 6.5C101.4 6.5 0 74.9 0 185.6 0 256 39.6 296 63.6 296c9.9 0 15.6-27.6 15.6-35.4 0-9.3-23.7-29.1-23.7-67.8 0-80.4 61.2-137.4 140.4-137.4 68.1 0 118.5 38.7 118.5 109.8 0 53.1-21.3 152.7-90.3 152.7-24.9 0-46.2-18-46.2-43.8 0-37.8 26.4-74.4 26.4-113.4 0-66.2-93.9-54.2-93.9 25.8 0 16.8 2.1 35.4 9.6 50.7-13.8 59.4-42 147.9-42 209.1 0 18.9 2.7 37.5 4.5 56.4 3.4 3.8 1.7 3.4 6.9 1.5 50.4-69 48.6-82.5 71.4-172.8 12.3 23.4 44.1 36 69.3 36 106.2 0 153.9-103.5 153.9-196.8C384 71.3 298.2 6.5 204 6.5"></path>
								</svg>Pinterest<input type="checkbox" id="lightshare-share-social-network-input-pinterest" name="lightshare[share][social_networks][]" value="pinterest"></label></li>
						<li class="lightshare-social-network-copy"><label for="lightshare-share-social-network-input-copy" class="active"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
									<path fill="currentColor" d="M320 448v40c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24V120c0-13.255 10.745-24 24-24h72v296c0 30.879 25.121 56 56 56zm0-344V0H152c-13.255 0-24 10.745-24 24v368c0 13.255 10.745 24 24 24h272c13.255 0 24-10.745 24-24V128H344c-13.2 0-24-10.8-24-24m120.971-31.029L375.029 7.029A24 24 0 0 0 358.059 0H352v96h96v-6.059a24 24 0 0 0-7.029-16.97"></path>
								</svg>Copy<input type="checkbox" id="lightshare-share-social-network-input-copy" name="lightshare[share][social_networks][]" value="copy"></label></li>
						<li class="lightshare-social-network-bluesky"><label for="lightshare-share-social-network-input-bluesky"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
									<path fill="currentColor" d="M407.8 294.7c-3.3-.4-6.7-.8-10-1.3 3.4.4 6.7.9 10 1.3M288 227.1c-26.1-50.7-97.1-145.2-163.1-191.8C61.6-9.4 37.5-1.7 21.6 5.5 3.3 13.8 0 41.9 0 58.4S9.1 194 15 213.9c19.5 65.7 89.1 87.9 153.2 80.7 3.3-.5 6.6-.9 10-1.4-3.3.5-6.6 1-10 1.4-93.9 14-177.3 48.2-67.9 169.9C220.6 589.1 265.1 437.8 288 361.1c22.9 76.7 49.2 222.5 185.6 103.4 102.4-103.4 28.1-156-65.8-169.9-3.3-.4-6.7-.8-10-1.3 3.4.4 6.7.9 10 1.3 64.1 7.1 133.6-15.1 153.2-80.7C566.9 194 576 75 576 58.4s-3.3-44.7-21.6-52.9c-15.8-7.1-40-14.9-103.2 29.8C385.1 81.9 314.1 176.4 288 227.1"></path>
								</svg>Bluesky<input type="checkbox" id="lightshare-share-social-network-input-bluesky" name="lightshare[share][social_networks][]" value="bluesky"></label></li>

						<li class="lightshare-social-network-email"><label for="lightshare-share-social-network-input-email"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
									<path fill="currentColor" d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7M256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4"></path>
								</svg>Email<input type="checkbox" id="lightshare-share-social-network-input-email" name="lightshare[share][social_networks][]" value="email"></label></li>


						<li class="lightshare-social-network-print"><label for="lightshare-share-social-network-input-print"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
									<path fill="currentColor" d="M448 192V77.25c0-8.49-3.37-16.62-9.37-22.63L393.37 9.37c-6-6-14.14-9.37-22.63-9.37H96C78.33 0 64 14.33 64 32v160c-35.35 0-64 28.65-64 64v112c0 8.84 7.16 16 16 16h48v96c0 17.67 14.33 32 32 32h320c17.67 0 32-14.33 32-32v-96h48c8.84 0 16-7.16 16-16V256c0-35.35-28.65-64-64-64m-64 256H128v-96h256zm0-224H128V64h192v48c0 8.84 7.16 16 16 16h48zm48 72c-13.25 0-24-10.75-24-24 0-13.26 10.75-24 24-24s24 10.74 24 24c0 13.25-10.75 24-24 24"></path>
								</svg>Print<input type="checkbox" id="lightshare-share-social-network-input-print" name="lightshare[share][social_networks][]" value="print"></label></li>
						<li class="lightshare-social-network-reddit"><label for="lightshare-share-social-network-input-reddit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
									<path fill="currentColor" d="M440.3 203.5c-15 0-28.2 6.2-37.9 15.9-35.7-24.7-83.8-40.6-137.1-42.3L293 52.3l88.2 19.8c0 21.6 17.6 39.2 39.2 39.2 22 0 39.7-18.1 39.7-39.7s-17.6-39.7-39.7-39.7c-15.4 0-28.7 9.3-35.3 22l-97.4-21.6c-4.9-1.3-9.7 2.2-11 7.1L246.3 177c-52.9 2.2-100.5 18.1-136.3 42.8-9.7-10.1-23.4-16.3-38.4-16.3-55.6 0-73.8 74.6-22.9 100.1-1.8 7.9-2.6 16.3-2.6 24.7 0 83.8 94.4 151.7 210.3 151.7 116.4 0 210.8-67.9 210.8-151.7 0-8.4-.9-17.2-3.1-25.1 49.9-25.6 31.5-99.7-23.8-99.7M129.4 308.9c0-22 17.6-39.7 39.7-39.7 21.6 0 39.2 17.6 39.2 39.7 0 21.6-17.6 39.2-39.2 39.2-22 .1-39.7-17.6-39.7-39.2m214.3 93.5c-36.4 36.4-139.1 36.4-175.5 0-4-3.5-4-9.7 0-13.7 3.5-3.5 9.7-3.5 13.2 0 27.8 28.5 120 29 149 0 3.5-3.5 9.7-3.5 13.2 0 4.1 4 4.1 10.2.1 13.7m-.8-54.2c-21.6 0-39.2-17.6-39.2-39.2 0-22 17.6-39.7 39.2-39.7 22 0 39.7 17.6 39.7 39.7-.1 21.5-17.7 39.2-39.7 39.2"></path>
								</svg>Reddit<input type="checkbox" id="lightshare-share-social-network-input-reddit" name="lightshare[share][social_networks][]" value="reddit"></label></li>


						<li class="lightshare-social-network-telegram"><label for="lightshare-share-social-network-input-telegram"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
									<path fill="currentColor" d="m446.7 98.6-67.6 318.8c-5.1 22.5-18.4 28.1-37.3 17.5l-103-75.9-49.7 47.8c-5.5 5.5-10.1 10.1-20.7 10.1l7.4-104.9 190.9-172.5c8.3-7.4-1.8-11.5-12.9-4.1L117.8 284 16.2 252.2c-22.1-6.9-22.5-22.1 4.6-32.7L418.2 66.4c18.4-6.9 34.5 4.1 28.5 32.2"></path>
								</svg>Telegram<input type="checkbox" id="lightshare-share-social-network-input-telegram" name="lightshare[share][social_networks][]" value="telegram"></label></li>
						<li class="lightshare-social-network-threads"><label for="lightshare-share-social-network-input-threads"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
									<path fill="currentColor" d="M331.5 235.7c2.2.9 4.2 1.9 6.3 2.8 29.2 14.1 50.6 35.2 61.8 61.4 15.7 36.5 17.2 95.8-30.3 143.2-36.2 36.2-80.3 52.5-142.6 53h-.3c-70.2-.5-124.1-24.1-160.4-70.2-32.3-41-48.9-98.1-49.5-169.6v-.5c.5-71.5 17.1-128.6 49.4-169.6 36.3-46.1 90.3-69.7 160.5-70.2h.3c70.3.5 124.9 24 162.3 69.9 18.4 22.7 32 50 40.6 81.7l-40.4 10.8c-7.1-25.8-17.8-47.8-32.2-65.4-29.2-35.8-73-54.2-130.5-54.6-57 .5-100.1 18.8-128.2 54.4C72.1 146.1 58.5 194.3 58 256c.5 61.7 14.1 109.9 40.3 143.3 28 35.6 71.2 53.9 128.2 54.4 51.4-.4 85.4-12.6 113.7-40.9 32.3-32.2 31.7-71.8 21.4-95.9-6.1-14.2-17.1-26-31.9-34.9-3.7 26.9-11.8 48.3-24.7 64.8-17.1 21.8-41.4 33.6-72.7 35.3-23.6 1.3-46.3-4.4-63.9-16-20.8-13.8-33-34.8-34.3-59.3-2.5-48.3 35.7-83 95.2-86.4 21.1-1.2 40.9-.3 59.2 2.8-2.4-14.8-7.3-26.6-14.6-35.2-10-11.7-25.6-17.7-46.2-17.8h-.7c-16.6 0-39 4.6-53.3 26.3l-34.4-23.6c19.2-29.1 50.3-45.1 87.8-45.1h.8c62.6.4 99.9 39.5 103.7 107.7l-.2.2zm-156 68.8c1.3 25.1 28.4 36.8 54.6 35.3 25.6-1.4 54.6-11.4 59.5-73.2-13.2-2.9-27.8-4.4-43.4-4.4-4.8 0-9.6.1-14.4.4-42.9 2.4-57.2 23.2-56.2 41.8z"></path>
								</svg>Threads<input type="checkbox" id="lightshare-share-social-network-input-threads" name="lightshare[share][social_networks][]" value="threads"></label></li>

						<li class="lightshare-social-network-whatsapp"><label for="lightshare-share-social-network-input-whatsapp"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
									<path fill="currentColor" d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157m-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1s56.2 81.2 56.1 130.5c0 101.8-84.9 184.6-186.6 184.6m101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8s-14.3 18-17.6 21.8c-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7s-12.5-30.1-17.1-41.2c-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2s-9.7 1.4-14.8 6.9c-5.1 5.6-19.4 19-19.4 46.3s19.9 53.7 22.6 57.4c2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4s4.6-24.1 3.2-26.4c-1.3-2.5-5-3.9-10.5-6.6"></path>
								</svg>WhatsApp<input type="checkbox" id="lightshare-share-social-network-input-whatsapp" name="lightshare[share][social_networks][]" value="whatsapp"></label></li>
					</ul>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">Disable Comments</th>
				<td>
					<div class="checkbox-radio">
						<label>
							<input type="checkbox" name="lightshare_options[disable_comments]" value="1" <?php checked(1, LS_Options::get_option('disable_comments'), true); ?> />
						</label>
						<span class="dashicons dashicons-editor-help" data-title="This will disable comments on all post types and remove comment-related functionality."></span>
					</div>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">Disable Rest API</th>
				<td>
					<select name="lightshare_options[disable_rest_api]" id="lightshare_disable_rest_api">
						<option value>Default (Enabled)</option>
						<option value="non_admins" <?php selected(LS_Options::get_option('disable_rest_api'), 'non_admins'); ?>>Disable for Non-Admins</option>
					</select>
					<span class="dashicons dashicons-editor-help" data-title="Disable Rest API requests."></span>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">Limit Post Revisions</th>
				<td>
					<select name="lightshare_options[limit_post_revisions]" id="lightshare_limit_post_revisions">
						<option value>Default (Unlimited)</option>
						<option value="false" <?php selected(LS_Options::get_option('limit_post_revisions'), 'false'); ?>>Disable Post Revisions</option>
						<option value="1" <?php selected(LS_Options::get_option('limit_post_revisions'), 1); ?>>1</option>
						<option value="2" <?php selected(LS_Options::get_option('limit_post_revisions'), 2); ?>>2</option>
						<option value="3" <?php selected(LS_Options::get_option('limit_post_revisions'), 3); ?>>3</option>
						<option value="4" <?php selected(LS_Options::get_option('limit_post_revisions'), 4); ?>>4</option>
						<option value="5" <?php selected(LS_Options::get_option('limit_post_revisions'), 5); ?>>5</option>
						<option value="10" <?php selected(LS_Options::get_option('limit_post_revisions'), 10); ?>>10</option>
						<option value="15" <?php selected(LS_Options::get_option('limit_post_revisions'), 15); ?>>15</option>
						<option value="20" <?php selected(LS_Options::get_option('limit_post_revisions'), 20); ?>>20</option>
					</select>
					<span class="dashicons dashicons-editor-help" data-title="Limits the number of revisions that are allowed for posts and pages."></span>
				</td>
			</tr>
		</table>
	</div>
</div>