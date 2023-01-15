<?php

/**
 * Plugin Name:       Related Products Slider
 * Plugin URI:        https://github.com/AbhijitSarker
 * Description:       Add custom tabs in the product edit page.
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Abhijit Sarker
 * Author URI:        https://github.com/AbhijitSarker
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       related_products
 * Domain Path:       /languages
 */

if (!defined('ABSPATH')) {
    die;
}


define("PLUGINS_DIR", plugin_dir_path(__FILE__));
define("PLUGINS_PATH_ASSETS", plugin_dir_url(__FILE__) . 'assets/');
define("PLUGINS_DIR_IMG", plugin_dir_url(__FILE__) . 'assets/img/');

add_action('wp_enqueue_scripts', 'related_products_enqueue_files');

function related_products_enqueue_files()
{

    wp_enqueue_style('all', PLUGINS_PATH_ASSETS . 'css/all.css', array(), false, true);
    wp_enqueue_style('bootstrap', PLUGINS_PATH_ASSETS . 'css/bootstrap.min.css');
    wp_enqueue_style('owl-carousel', PLUGINS_PATH_ASSETS . 'css/owl.carousel.min.css');
    wp_enqueue_style('owl-theme', PLUGINS_PATH_ASSETS . 'css/owl.theme.default.css');
    wp_enqueue_style('product-slider', PLUGINS_PATH_ASSETS . 'css/style.css');

    wp_enqueue_script('relatedpro', PLUGINS_PATH_ASSETS . 'js/bootstrap.bundle.min.js', array(), false, true);
    wp_enqueue_script('owl-carousel-js', PLUGINS_PATH_ASSETS . 'js/owl.carousel.js', array(), false, true);
    wp_enqueue_script('script', PLUGINS_PATH_ASSETS . 'js/script.js', array('jquery'), false, true);
}


add_action('woocommerce_after_single_product_summary', 'related_products_ralated_product', 999);
function related_products_ralated_product()
{
    require(PLUGINS_DIR . 'views/product-slider.php');
}
