<?php
/*
2022-12-16　baterです。
*/

class Kantan_Client_Form{

    public $name;

    public function __construct() {
        $this->$name;
        // add_action('');
        // add_filter('');
    }
    
    //ContactForm７から送信された情報を取得
    function my_wpcf7_mail_sent($contact_form){
    
        $submission = new WPCF7_Submission();
        if($submission) {
        
            //フォームデーターを取得
            $formdata = $submission->get_posted_data();
            
            //clientテーブルに追加
            global $wpdb;
            $table_name = $wpdb->prefix . 'ktpwp_client';
            $wpdb->insert(
            $table_name,
                array(
                'time' => current_time( 'mysql' ),
                'client_name' => $formdata['client_name'],
                'client_email' => $formdata['client_email'],
                'client_subject' => $formdata['client_subject'],
                )
            );
        }
    }
    
    //顧客情報入力フォーム（ContactForm７を利用）
    function kpw_client_form() {
        $kpw_client_form = <<< EOF
        <div class="wrap">
        
        <h2>■ 顧客情報入力フォーム</h2>
        
        //ContactForm７が出力したHTML
        <div role="form" class="wpcf7" id="wpcf7-f61-p62-o1" lang="ja" dir="ltr">
        <div class="screen-reader-response"></div>
        <form action="/#wpcf7-f61-p62-o1" method="post" class="wpcf7-form" novalidate="novalidate">
        <div style="display: none;">
        <input type="hidden" name="_wpcf7" value="61" />
        <input type="hidden" name="_wpcf7_version" value="5.1.4" />
        <input type="hidden" name="_wpcf7_locale" value="ja" />
        <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f61-p62-o1" />
        <input type="hidden" name="_wpcf7_container_post" value="62" />
        </div>
        <p><label> お名前 (必須)<br />
        <span class="wpcf7-form-control-wrap client_name"><input type="text" name="client_name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" /></span> </label></p>
        <p><label> メールアドレス (必須)<br />
        <span class="wpcf7-form-control-wrap client_email"><input type="email" name="client_email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" /></span> </label></p>
        <p><label> 題名<br />
        <span class="wpcf7-form-control-wrap client_subject"><input type="text" name="client_subject" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" /></span> </label></p>
        <p><input type="submit" value="送信" class="wpcf7-form-control wpcf7-submit" /></p>
        <div class="wpcf7-response-output wpcf7-display-none"></div></form></div>
        EOF;
    
    return $kpw_client_form;
    
    }
    
}

?>