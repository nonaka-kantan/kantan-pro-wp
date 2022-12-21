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
        $my_client_table_version = '1.0.1'; // 更新する場合はバージョンを変更

        // テーブル名を設定
        $table_name = $wpdb->prefix. 'ktpwp_client';

        // 文字コードを設定
        $charset_collate = $wpdb->get_charset_collate();

        // テーブル名またはテーブルバージョンを変更した場合にdbDelta($sql)が実行される
        if ($wpdb->get_var("show tables like '$table_name'") != $table_name || get_option('my_client_table_version') !== $my_client_table_version) {
            $sql = $wpdb->prepare("CREATE TABLE " . $table_name . " (
                id MEDIUMINT(9) NOT NULL AUTO_INCREMENT,
                time BIGINT(11) DEFAULT '0' NOT NULL,
                name TINYTEXT NOT NULL,
                text TEXT NOT NULL,
                url VARCHAR(55) NOT NULL,
                UNIQUE KEY id (id)
            ) $charset_collate;");

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

            // テーブル更新実行
            dbDelta($sql);
            
            // wp_optionsにテーブルバージョンを登録する
            add_option( 'my_client_table_version', $my_client_table_version );

            // wp_optionsにテーブルバージョンをアップデートする
            update_option( 'my_client_table_version', $my_client_table_version );
        }
    
    }
    
    // フォームから値を受信しレコードを挿入する
    function Client_Table_Data() {
        global $wpdb;
        
        // フォームからのクエリーを受信する
        if(isset($_POST)){
            $client_name = $_POST['client_name'];
            $text = $_POST['text'];

            // POSTデータをクリア
            // unset($_POST);
        }
    
        // 受信したクエリーをテーブルに挿入する
        $table_name = $wpdb->prefix. 'ktpwp_client';
        $wpdb->insert( 
            $table_name, 
            array( 
                'time' => current_time( 'mysql' ),
                'name' => $client_name,
                'text' => $text,
            ) 
        );
    }

    // 表示する
    function Client_Table_View( $name ) {

        global $wpdb;

        // ログインユーザー情報を取得
        global $current_user;
        $login_user = $current_user->nickname;

        // ログアウトのリンク
        $logout_link = wp_logout_url();
        
        // テーブルデータを表示する（ページャー）
        $query_limit = '20'; //表示範囲
        $query_num = '0'; //スタート位置
        $query_range = $query_num . ',' . $query_limit;
        $table_name = $wpdb->prefix . 'ktpwp_client';

        // クライアントリスト情報を取得
        $query = $wpdb->prepare("SELECT * FROM {$table_name} ORDER BY `id` ASC LIMIT $query_range");
        $post_row = $wpdb->get_results($query);
        $results[] = "<h3>■ 顧客リスト($query_range)</h3>";
        foreach ($post_row as $row){
            $id = esc_html($row->id);
            $time = esc_html($row->time);
            $client_name = esc_html($row->name);
            $text = esc_html($row->text);
            $results[] = <<<END
            <p>$id : $time : $client_name : $text : 
            <form method="post" action="$form_action">
            <input type="hidden" name="client_id" value="$id">
            <input type="submit" name="send_post" value=" 詳細 ">
            </form></p>
            <hr>
            </p>    
            END;
        }
        $client_list = implode( $results );

        // 任意のIDからクライアント情報を取得
        if(isset( $_POST['client_id'] )){
            $query_id = $_POST['client_id'];
        }
        // IDが指定されない場合は最後のクライアントIDを指定
        else{
            $query_id = 37;
        }
        $query = $wpdb->prepare("SELECT * FROM {$table_name} ORDER BY `id` = $query_id");
        $post_row = $wpdb->get_results($query);
        foreach ($post_row as $row){
            $client_id = esc_html($row->id);
            $time = esc_html($row->time);
            $client_name = esc_html($row->name);
            $text = esc_html($row->text);
        }
        $top_client = <<<END
        <h3>■ 顧客の詳細（ID: $client_id ）</h3>
        ＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃<br />
        ＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃<br />
        ID: $client_id<br />
        TIME: $time<br />
        NAME: $client_name<br />
        MEMO: $text<br />
        ＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃<br />
        ＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃＃<br />
        END;
        
        // 新規クライアント作成入力フォーム
        $form_action = '/' . $name;
        // $form_action = the_permalink();
        $client_form = <<<END
        <h3>■ 顧客を登録</h3>
        <form method="post" action="$form_action">
        <label> 名前：</label> <input type="text" name="client_name">
        <label> テキスト：</label> <input type="text" name="text">
        <p><input type="submit" name="send_post" value="送信"></p>
        </form>
        END;

        // // 行数
        // $list_num = $wpdb->num_rows;
        // // 最後のクエリ結果
        // $last_result = $wpdb->last_result;
        
        // 表示するもの
        $message = <<<END
        <p><font size="4">ログインユーザー$login_user <a href="/$name">更新</a></font>
        <a href="$logout_link">ログアウト</a></p>
        END;

        $content = $top_client . $message . $client_form . $client_list;
        return $content;
    }

    
}

?>