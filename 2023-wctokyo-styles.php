<?php
/**
 * Plugin name: 2023 WCTokyo Styles
 * Description: WordCamp Tokyo 2023 用 カスタムCSS
 * Version: 0.0.1
 *
 * @package 2023__wctokyo-styles
 * @author WordCamp Tokyo 2023 web development team
 * @license GPL-3.0
 */

/**
 * Directory url of this plugin
 *
 * @var string
 */
define( 'WCTOKYO_2023_STYLES_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );

/**
 * Directory path of this plugin
 *
 * @var string
 */
define( 'WCTOKYO_2023_STYLES_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );


/**
 * Enqueue custom styles
 */
function enqueue_wctokyo2023_custom_styles() {
	$time = filemtime( WCTOKYO_2023_STYLES_PATH . '/dist/2023-wctokyo-styles.css' );
	// wp_enqueue_style( '2023__wctokyo-styles', WCTOKYO_2023_STYLES_URL . '/dist/2023-wctokyo-styles.css', array( 'twentytwentythree-style' ), $time );
	wp_enqueue_style( '2023__wctokyo-styles', WCTOKYO_2023_STYLES_URL . '/dist/2023-wctokyo-styles.css', array( 'wcb_shortcodes' ), $time );
}
add_action( 'wp_enqueue_scripts', 'enqueue_wctokyo2023_custom_styles' );


/**
 * ローカル環境の判定用に管理バーの色を変更
 */
function local_adminbar() {
	echo '<style type="text/css">#wpadminbar { background: #738e96; }</style>';
}
add_action( 'admin_head', 'local_adminbar' );
add_action( 'wp_head', 'local_adminbar' );
