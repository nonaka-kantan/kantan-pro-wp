<?php

class Kntan_Tab_Class {

    // public function __construct() {
    //     add_action('Action');
    //     add_filter('');
    // }

    // public $property;
    
    // ログインしている場合
    function Tab_View( $tab_name ) {

        // ログアウトのリンク
        $link = wp_logout_url();

        // ログインユーザー情報を取得
        global $current_user;
        $user = $current_user->nickname;

        // 表示する内容
        $content = <<<END
        <h3>ここは [$tab_name] です。</h3>
        <p><font size="4">$user さんこんにちは。ログインありがとうございます！<br />
        ここに<a href="/$tab_name">$tab_name</a>の処理が入ります。</font></p>

        <!--ログイン-->
        <p><font size="4"><a href="$link">ログアウト</a></font></p>
        END;
        return $content;
    }

    // ログインしていない場合
    function Tab_Error( $tab_name ) {

        // ログインのリンク
        $link = wp_login_url(); 

        // 表示する内容
        $content = <<<END
        <h3>ログインしてください</h3>

        <!--ログアウト-->
        <p><font size="4"><a href="$link">ログイン</a></font></p>
        END;
        return $content;
    }
    // function filter() {

    // }
}

?>