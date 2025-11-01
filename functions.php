<?php
/**
 * Theme setup and asset loading for CCC Primary Theme.
 *
 * @package CCCPrimaryTheme
 */

if (! defined('ABSPATH')) {
    exit;
}

if (! function_exists('ccc_primary_theme_setup')) {
    /**
     * Register basic theme supports.
     */
    function ccc_primary_theme_setup(): void
    {
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support(
            'html5',
            [
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            ]
        );

        register_nav_menus(
            [
                'primary' => __('Primary Menu', 'ccc-primary-theme'),
            ]
        );
    }
}
add_action('after_setup_theme', 'ccc_primary_theme_setup');

/**
 * Enqueue front-end assets.
 */
function ccc_primary_theme_enqueue_assets(): void
{
    wp_enqueue_style(
        'ccc-primary-theme-style',
        get_stylesheet_uri(),
        [],
        wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'ccc_primary_theme_enqueue_assets');

/**
 * Register widget areas.
 */
function ccc_primary_theme_widgets_init(): void
{
    register_sidebar(
        [
            'name'          => __('Primary Sidebar', 'ccc-primary-theme'),
            'id'            => 'sidebar-1',
            'description'   => __('Add widgets here to appear in your sidebar.', 'ccc-primary-theme'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ]
    );
}
add_action('widgets_init', 'ccc_primary_theme_widgets_init');

// Load theme block definitions.
require_once get_template_directory() . '/blocks/main.php';
