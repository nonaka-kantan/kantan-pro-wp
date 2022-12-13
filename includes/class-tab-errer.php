<?php

class Kntan_Tab_Error_Class {

    public $name;

    public function __construct() {
        $this->$name;
        // add_action('');
        // add_filter('');
    }
    
    // ログインしていない場合
    function Tab_Error() {

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