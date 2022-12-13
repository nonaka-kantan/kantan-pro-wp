<?php

class Kantan_Supplier_Class{

    public $name;

    public function __construct() {
        $this->$name;
        // add_action('');
        // add_filter('');
    }
    
    function Supplier_Tab_View( $name ) {

        // ログインユーザー情報を取得
        global $current_user;
        $login_user = $current_user->nickname;

        // ログアウトのリンク
        $logout_link = wp_logout_url();

        // 表示する内容
        $content = <<<END
        <h3>ここは [$name] です。</h3>
        <p><font size="4">$login_user さんこんにちは。ログインありがとうございます！<br />
        ここに<a href="/$name">$name</a>の処理が入ります。</font></p>

        <!--ログアウト-->
        <p><font size="4"><a href="$logout_link">ログアウト</a></font></p>
        END;
        return $content;
    }

    // // ログインしていない場合
    // function Tab_Error() {

    //     // ログインのリンク
    //     $login_link = wp_login_url(); 

    //     // 表示する内容
    //     $content = <<<END
    //     <h3>ログインしてください</h3>

    //     <!--ログイン-->
    //     <p><font size="4"><a href="$login_link">ログイン</a></font></p>
    //     END;
    //     return $content;
    // }
    // function filter() {

    // }
}

?>