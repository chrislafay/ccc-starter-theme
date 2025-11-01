<?php
/**
 * Register custom block styles for CCC Primary Theme.
 *
 * @package CCCPrimaryTheme
 */

if (! defined('ABSPATH')) {
    exit;
}

add_action('init', 'ccc_primary_theme_register_block_styles');

/**
 * Registers custom block styles.
 */
function ccc_primary_theme_register_block_styles(): void
{
    register_block_style(
        'core/columns',
        [
            'name'  => 'swap-on-mobile',
            'label' => __('Swap on Mobile', 'ccc-primary-theme'),
        ]
    );
}
