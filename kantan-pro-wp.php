<?php
/*
Plugin Name: kantan pro wp
Description: カンタンProWP
Version: 1.0
*/

// wp-config.phpが存在しているか？
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

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

// KTPWP_Indexをロード
add_action('plugins_loaded','KTPWP_Index');

// ログインエラークラス
include 'includes/class-tab-errer.php';

function KTPWP_Index(){

	//ログイン中なら
	if( is_user_logged_in() ){

		//仕事リスト
		function TabList(){
			include 'includes/class-tab-list.php';
			$list = new Kantan_List_Class();
			return $list->List_Tab_View( 'list' );
		}
		add_shortcode('list','TabList');

		//受注書
		function shortcodeorder(){
			include 'includes/class-tab-order.php';
			$tabs = new Kntan_Order_Class();
			return $tabs->Order_Tab_View( 'order' );
		}
		add_shortcode('order','shortcodeorder');
		
		//クライアント
		function shortcodeclient(){
			include 'includes/class-tab-client.php';
			$tabs = new Kntan_Client_Class();
			return $tabs->Client_Tab_View( 'client' );
		}
		add_shortcode('client','shortcodeclient');
		
		//商品・サービス
		function shortcodeservice(){
			include 'includes/class-tab-service.php';
			$tabs = new Kntan_Service_Class();
			return $tabs->Service_Tab_View( 'service' );
		}
		add_shortcode('service','shortcodeservice');
		
		//協力会社
		function shortcodesupplier(){
			include 'includes/class-tab-supplier.php';
			$tabs = new Kantan_Supplier_Class();
			return $tabs->Supplier_Tab_View( 'supplier' );
		}
		add_shortcode('supplier','shortcodesupplier');
		
		//レポート
		function shortcodereport(){
			include 'includes/class-tab-report.php';
			$tabs = new Kntan_Report_Class();
			return $tabs->Report_Tab_View( 'report' );
		}
		add_shortcode('report','shortcodereport');
		
		//設定
		function shortcodesetting(){
			include 'includes/class-tab-setting.php';
			$tabs = new Kntan_Setting_Class();
			return $tabs->Setting_Tab_View( 'setting' );
		}
		add_shortcode('setting','shortcodesetting');
	
	//ログインしてなければ
	}else{
		//仕事リスト
		function shortcodelist(){
			$tabs = new Kntan_Tab_Error_Class();
			return $tabs->Tab_Error( 'list' );
		}
		add_shortcode('list','shortcodelist');

		//受注書
		function shortcodeorder(){
			$tabs = new Kntan_Tab_Error_Class();
			return $tabs->Tab_Error( 'order' );
		}
		add_shortcode('order','shortcodeorder');
		
		//クライアント
		function shortcodeclient(){
			$tabs = new Kntan_Tab_Error_Class();
			return $tabs->Tab_Error( 'client' );
		}
		add_shortcode('client','shortcodeclient');
		
		//商品・サービス
		function shortcodeservice(){
			$tabs = new Kntan_Tab_Error_Class();
			return $tabs->Tab_Error( 'service' );
		}
		add_shortcode('service','shortcodeservice');
		
		//協力会社
		function shortcodesupplier(){
			$tabs = new Kntan_Tab_Error_Class();
			return $tabs->Tab_Error( 'supplier' );
		}
		add_shortcode('supplier','shortcodesupplier');
		
		//レポート
		function shortcodereport(){
			$tabs = new Kntan_Tab_Error_Class();
			return $tabs->Tab_Error( 'report' );
		}
		add_shortcode('report','shortcodereport');
		
		//設定
		function shortcodesetting(){
			$tabs = new Kntan_Tab_Error_Class();
			return $tabs->Tab_Error( 'setting' );
		}
		add_shortcode('setting','shortcodesetting');
	}
}