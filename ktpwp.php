<?php
/*
Plugin Name: Kantan Pro WP
Description: カンタンProWP
Version: 1.0
*/

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * 必要な定数を定義しておく
 */
 if ( ! defined( 'MY_PLUGIN_VERSION' ) ) {
	define( 'MY_PLUGIN_VERSION', '1.0' );
}
if ( ! defined( 'MY_PLUGIN_PATH' ) ) {
	define( 'MY_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
}
if ( ! defined( 'MY_PLUGIN_URL' ) ) {
	define( 'MY_PLUGIN_URL', plugins_url( '/', __FILE__ ) );
}

// wp-config.phpが存在しているか？
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

add_action('plugins_loaded','KTPWP_Index');


//ログインしているかどうかを確認
//ログインしていれば、ログインユーザー情報取得
global $current_user;
// get_currentuserinfo();

// $current_user->user_login;
// $current_user->user_email;
// $current_user->user_level;
// $current_user->user_firstname;
// $current_user->user_lastname;
// $current_user->display_name;
// $current_user->ID;


function KTPWP_Index(){

	//ログイン中なら
	if( is_user_logged_in() ){

		//仕事リスト
		function shortcodelist(){
			return  '<a href=/list/>list</a>';
		}
		add_shortcode('list','shortcodelist');
		
		//受注書
		function shortcodeorder(){
			return '<a href="/order/">order</a>';
		}
		add_shortcode('order','shortcodeorder');
		
		//クライアント
		function shortcodeclient(){
			return '<a href="/client/">client</a>';
		}
		add_shortcode('client','shortcodeclient');
		
		//商品・サービス
		function shortcodeservice(){
			return '<a href="/service/">service</a>';
		}
		add_shortcode('service','shortcodeservice');
		
		//協力会社
		function shortcodesupplier(){
			return '<a href="/supplier/">supplier</a>';
		}
		add_shortcode('supplier','shortcodesupplier');
		
		//レポート
		function shortcodereport(){
			return '<a href="/report/">report</a>';
		}
		add_shortcode('report','shortcodereport');
		
		//設定
		function shortcodesetting(){
			return '<a href="/setting/">setting</a>';
		}
		add_shortcode('setting','shortcodesetting');

		function shortcodelogin_er(){
			return '<p>ログインしています</p>';
		}
		add_shortcode('login_er','shortcodelogin_er');
	
	//ログインしてなければ
	}else{
			echo '<p>ログインしてください</p>';
	}
}