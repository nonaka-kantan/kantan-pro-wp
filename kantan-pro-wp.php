<?php
/*
Plugin Name: kantan pro wp
Description: カンタンProWP
Version: 1.0
*/

if ( ! defined( 'ABSPATH' ) ) exit;

/*
 必要な定数を定義
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
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// クラスをインクルード
include 'includes/class-tab-control.php';

// KTPWP_Indexをロード
add_action('plugins_loaded','KTPWP_Index');


//ログインしているかどうかを確認
//ログインしていれば、ログインユーザー情報取得
global $current_user;

function KTPWP_Index(){

	//ログイン中なら
	if( is_user_logged_in() ){

		//仕事リスト
		function shortcodelist(){
			$tabs = new Kntan_Tab_Class();
			$tab_name = 'list';
			return $tabs->Tab_View( $tab_name );
		}
		add_shortcode('list','shortcodelist');

		//受注書
		function shortcodeorder(){
			$tabs = new Kntan_Tab_Class();
			$tab_name = 'order';
			return $tabs->Tab_View( $tab_name );
		}
		add_shortcode('order','shortcodeorder');
		
		//クライアント
		function shortcodeclient(){
			$tabs = new Kntan_Tab_Class();
			$tab_name = 'client';
			return $tabs->Tab_View( $tab_name );
		}
		add_shortcode('client','shortcodeclient');
		
		//商品・サービス
		function shortcodeservice(){
			$tabs = new Kntan_Tab_Class();
			$tab_name = 'service';
			return $tabs->Tab_View( $tab_name );
		}
		add_shortcode('service','shortcodeservice');
		
		//協力会社
		function shortcodesupplier(){
			$tabs = new Kntan_Tab_Class();
			$tab_name = 'supplier';
			return $tabs->Tab_View( $tab_name );
		}
		add_shortcode('supplier','shortcodesupplier');
		
		//レポート
		function shortcodereport(){
			$tabs = new Kntan_Tab_Class();
			$tab_name = 'report';
			return $tabs->Tab_View( $tab_name );
		}
		add_shortcode('report','shortcodereport');
		
		//設定
		function shortcodesetting(){
			$tabs = new Kntan_Tab_Class();
			$tab_name = 'setting';
			return $tabs->Tab_View( $tab_name );
		}
		add_shortcode('setting','shortcodesetting');

		// function shortcodelogin_er(){
		// 	$tabs = new Kntan_Tab_Class();
		// 	$tab_name = 'login_er';
		// 	return $tabs->Tab_View( $tab_name );
		// }
		// add_shortcode('login_er','shortcodelogin_er');
	
	//ログインしてなければ
	}else{
		//仕事リスト
		function shortcodelist(){
			$tabs = new Kntan_Tab_Class();
			$tab_name = 'list';
			return $tabs->Tab_Error( $tab_name );
		}
		add_shortcode('list','shortcodelist');

		//受注書
		function shortcodeorder(){
			$tabs = new Kntan_Tab_Class();
			$tab_name = 'order';
			return $tabs->Tab_Error( $tab_name );
		}
		add_shortcode('order','shortcodeorder');
		
		//クライアント
		function shortcodeclient(){
			$tabs = new Kntan_Tab_Class();
			$tab_name = 'client';
			return $tabs->Tab_Error( $tab_name );
		}
		add_shortcode('client','shortcodeclient');
		
		//商品・サービス
		function shortcodeservice(){
			$tabs = new Kntan_Tab_Class();
			$tab_name = 'service';
			return $tabs->Tab_Error( $tab_name );
		}
		add_shortcode('service','shortcodeservice');
		
		//協力会社
		function shortcodesupplier(){
			$tabs = new Kntan_Tab_Class();
			$tab_name = 'supplier';
			return $tabs->Tab_Error( $tab_name );
		}
		add_shortcode('supplier','shortcodesupplier');
		
		//レポート
		function shortcodereport(){
			$tabs = new Kntan_Tab_Class();
			$tab_name = 'report';
			return $tabs->Tab_Error( $tab_name );
		}
		add_shortcode('report','shortcodereport');
		
		//設定
		function shortcodesetting(){
			$tabs = new Kntan_Tab_Class();
			$tab_name = 'setting';
			return $tabs->Tab_Error( $tab_name );
		}
		add_shortcode('setting','shortcodesetting');
	}
}