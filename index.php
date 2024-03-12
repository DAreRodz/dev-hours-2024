<?php
/**
 * Plugin Name:       Dev Hours WP 6.5
 * Version:           1.0.0
 * Requires at least: 6.5
 * Requires PHP:      7.0
 * Description:       Plugin to showcase the Interactivity API shipped with WP 6.5.
 * Author:            David Arenas
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       dev-hours
 */

/**
 * Automatically registers block types by scanning the build/blocks folder.
 *
 * This function searches for JSON files within each subfolder and registers
 * them as block types. It is triggered on WordPress 'init' action.
 */
function devhours_auto_register_block_types()
{
		if (file_exists(__DIR__ . '/build/blocks/')) {
				$block_json_files = glob(__DIR__ . '/build/blocks/*/block.json');
				foreach ($block_json_files as $filename) {
						$block_folder = dirname($filename);
						register_block_type($block_folder);
				};
		};
}
add_action('init', 'devhours_auto_register_block_types');