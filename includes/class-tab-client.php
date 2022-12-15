<?php

// 2022/12/14　バグ中

class Kntan_Client_Class{

    public $name;

    public function __construct() {
        $this->$name;
        // 
        // $my_client_table = Client_Tab_DB();
        // add_action('');
        // add_filter('');
    }
    
    // // テーブル作成用の関数を登録
    // register_activation_hook(__FILE__, 'Client_Tab_DB');

    // クライアントテーブル作成
    function Client_Tab_DB(){

        global $wpdb;
        $table_name = $wpdb->prefix. 'ktpwp_clienttable';
        if ($wpdb->get_var("show tables like '$table_name'") != $table_name || get_option('my_plugin_table_version') !== 'MY_PLUGIN_TABLE_VERSION') {
        // if ($wpdb->get_var("show tables like '$table_name'") != $table_name) {
            $sql = "CREATE TABLE " . $table_name . " (
                id MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
                time BIGINT(11) DEFAULT '0' NOT NULL,
                nama TINYTEXT NOT NULL,
                text TEXT NOT NULL,
                url VARCHAR(55) NOT NULL,
                UNIQUE KEY id (id)
            );";

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            dbDelta($sql);
            update_option('my_plugin_table_version', 'MY_PLUGIN_TABLE_VERSION');
        }
    }
    
    // ログインしている場合に表示するメッセージ
    function Client_Tab_View( $name ) {


        // ログインユーザー情報を取得
        global $current_user;
        $login_user = $current_user->nickname;

        // ログアウトのリンク
        $logout_link = wp_logout_url();
        

        // 表示する内容
        $content = <<<END
        <h3>ここは [$name] です。New!</h3>
        <p><font size="4">$login_user さんこんにちは。ログインありがとうございます！<br />
        ここに<a href="/$name">$name</a>の処理が入ります。</font></p>

        <!--ログアウト-->
        <p><font size="4"><a href="$logout_link">ログアウト</a></font></p>
        END;

        $content = $content . $table_name;
        return $content;
    }

}

?>