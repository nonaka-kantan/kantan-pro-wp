<?php

class Kntan_Tab_Class {

    // public function __construct() {
    //     add_action('Action');
    //     // add_filter('');
    // }

    public function Tab_View( $tab_name ) {
        $content = <<<END
        <h3>ここは [$tab_name] です。</h3>
        <p><font size="4">個別ページ → <a href=/$tab_name/ f>$tab_name</a></font></p>
        END;
        return $content;
    }

    // public function filter() {

    // }
}

?>