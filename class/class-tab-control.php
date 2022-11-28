<?php

class Kntan_Tab_Class {

    // public function __construct() {
    //     add_action('Action');
    //     // add_filter('');
    // }

    public function Tab_View( $tab_name ) {
        $link = wp_logout_url();
        $content = <<<END
        <h3>ここは [$tab_name] です。</h3>
        <p><font size="4">ここに<a href="/$tab_name">$tab_name</a>の処理が入ります。</font></p>
        <p><font size="4"><a href="$link">ログアウト</a></font></p>
        END;
        return $content;
    }

    public function Tab_Error( $tab_name ) {
        $link = wp_login_url(); 
        $content = <<<END
        <h3>ログインしてください</h3>
        <p><font size="4"><a href="$link">ログイン</a></font></p>
        END;
        return $content;
    }
    // public function filter() {

    // }
}

?>