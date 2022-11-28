<?php

class Kntan_Tab_Class {

    // public function __construct() {
    //     add_action('Action');
    //     // add_filter('');
    // }

    public $res;

    public function Tab_View( $tab_name ) {
        $res = '<h4>ここは ['.$tab_name.'] です。<br /><br /><a href=/'.$tab_name.'/>'.$tab_name.'</a></h4>';
        return $res;
    }

    // public function filter() {

    // }
}

?>