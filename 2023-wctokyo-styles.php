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
	$time_fonts = filemtime( WCTOKYO_2023_STYLES_PATH . '/dist/fonts.css' );
	$time_style = filemtime( WCTOKYO_2023_STYLES_PATH . '/dist/2023-wctokyo-styles.css' );
	$time_add   = filemtime( WCTOKYO_2023_STYLES_PATH . '/dist/add-style.css' );

	wp_enqueue_style( '2023__fonts-styles', WCTOKYO_2023_STYLES_URL . '/dist/fonts.css', array( 'wcb_shortcodes' ), $time_fonts );
	wp_enqueue_style( '2023__wctokyo-styles', WCTOKYO_2023_STYLES_URL . '/dist/2023-wctokyo-styles.css', array( '2023__fonts-styles' ), $time_style );
	wp_enqueue_style( '2023__add-styles', WCTOKYO_2023_STYLES_URL . '/dist/add-style.css', array( '2023__wctokyo-styles' ), $time_add );
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


/**
 * その他 WordCamp サイトのカスタマイズ用ファイル
 *
 * GitHub https://github.com/WordPress/wordcamp.org の public_html/wp-content/mu-plugins からファイルを取得し一部流用
 */

// mu-plugins/wcorg-misc.php から一部読み込み.
require_once WCTOKYO_2023_STYLES_PATH . '/mu/wcorg-misc.php';


// プラグインディレクトリのtheme.jsonでテーマのtheme.jsonを上書きするコードを教えてください。のGoogle Bardの答え
add_action( 'after_setup_theme', function() {
	$theme_json = file_get_contents( get_stylesheet_directory() . '/theme.json' );
	$plugin_json = file_get_contents( plugin_dir_path(__FILE__) . 'theme.json' );
	$merged_json = array_merge( json_decode( $theme_json, true ), json_decode( $plugin_json, true ) );
	file_put_contents( get_stylesheet_directory() . '/theme.json', json_encode( $merged_json, JSON_PRETTY_PRINT ) );
} );


add_action( 'init', 'themeslug_register_block_styles' );
function themeslug_register_block_styles() {
}

register_block_style(
	'core/group',
	array(
		'name' => 'wc23-container-azure',
		'label' => __( '紺碧の波', 'textdomain' ),
	)
);


//Twenty TwentyテーマにあるインラインCSSを削除
add_action( 'wp_enqueue_scripts', function() {
    $styles = wp_styles();
    $styles->add_data( 'twentytwenty-style', 'after', array() );
}, 20 );