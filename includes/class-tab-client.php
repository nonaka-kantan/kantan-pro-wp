<?php

class Kntan_Client_Class{

    public $name;

    public function __construct() {
        $this->$name;
        // 
        // $my_client_table = Client_Tab_DB();
        // add_action('');
        // add_filter('');
    }
    
    
    // クライアントテーブル作成
    function Client_Table_Create(){
        
        // テーブルのバージョン管理
        global $wpdb;
        global $my_client_table_version;
        $my_client_table_version = '0.0'; // 更新する場合はバージョンを変更

        // テーブル名を設定
        $table_name = $wpdb->prefix. 'ktpwp_client';

        // 文字コードを設定
        $charset_collate = $wpdb->get_charset_collate();

        // テーブル名またはテーブルバージョンを変更した場合にdbDelta($sql)が実行される
        if ($wpdb->get_var("show tables like '$table_name'") != $table_name || get_option('my_client_table_version') !== $my_client_table_version) {
            $sql = "CREATE TABLE " . $table_name . " (
                id MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
                time BIGINT(11) DEFAULT '0' NOT NULL,
                name TINYTEXT NOT NULL,
                text TEXT NOT NULL,
                url VARCHAR(55) NOT NULL,
                UNIQUE KEY id (id)
            ) $charset_collate;";

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

            // テーブル更新実行
            dbDelta($sql);
            
            // wp_optionsにテーブルバージョンを登録する
            add_option( 'my_client_table_version', $my_client_table_version );

            // wp_optionsにテーブルバージョンをアップデートする
            update_option( 'my_client_table_version', $my_client_table_version );
        }
    
    
    }
    
    // テーブルに初期データを挿入する（現時点で毎回実行される）
    // フォームから値を受信した場合にのみ実行する必要がある
    function Client_Table_Data() {
        global $wpdb;
        
        $welcome_name = 'Mr. WordPress';
        $welcome_text = 'Congratulations, you just completed the installation!';
        
        $table_name = $wpdb->prefix. 'ktpwp_client';
        
        $wpdb->insert( 
            $table_name, 
            array( 
                'time' => current_time( 'mysql' ), 
                'name' => $welcome_name, 
                'text' => $welcome_text, 
            ) 
        );
    }

    // 表示するメッセージ
    function Client_Table_View( $name ) {

        global $wpdb;

        // ログインユーザー情報を取得
        global $current_user;
        $login_user = $current_user->nickname;

        // ログアウトのリンク
        $logout_link = wp_logout_url();
        
        // 最後のクエリー
        $last_q = $wpdb->last_query;
        $last_q = $wpdb->last_result;

        // テーブルデータを表示する


        // 表示する内容
        $content = <<<END
        <h3>ここは [$name] です。New!</h3>
        <p><font size="4">$login_user さんこんにちは。ログインありがとうございます！<br />
        ここに<a href="/$name">$name</a>の処理が入ります。-- $last_q</font></p>

        <!--ログアウト-->
        <p><font size="4"><a href="$logout_link">ログアウト</a></font></p>
        END;

        $content = $content;
        return $content;
    }

}

?>