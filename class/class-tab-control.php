<?php

class Kntan_Tab_Class {

    // public function __construct() {
    //     add_action('Action');
    //     add_filter('');
    // }

    // public $property;
    
    // ログインしている場合
    function Tab_View( $tab_name ) {

        // ログインユーザー情報を取得
        global $current_user;
        $login_user = $current_user->nickname;

        // ログアウトのリンク
        $logout_link = wp_logout_url();

        // 表示する内容
        $content = <<<END
        <h3>ここは [$tab_name] です。</h3>
        <p><font size="4">$login_user さんこんにちは。ログインありがとうございます！<br />
        ここに<a href="/$tab_name">$tab_name</a>の処理が入ります。</font></p>

        <!--ログアウト-->
        <p><font size="4"><a href="$logout_link">ログアウト</a></font></p>
        END;
        return $content;
    }

    // ログインしていない場合
    function Tab_Error( $tab_name ) {

        // ログインのリンク
        $login_link = wp_login_url(); 

        // 表示する内容
        $content = <<<END
        <h3>ログインしてください</h3>

        <!--ログイン-->
        <p><font size="4"><a href="$login_link">ログイン</a></font></p>
        END;
        return $content;
    }
    // function filter() {

    // }
}

?>