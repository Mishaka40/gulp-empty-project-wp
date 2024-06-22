<?php
    function createAjaxAction($action, $callback, $nopriv = true){
        if(!$action){
            return;
        }
        add_action('wp_ajax_'.$action, $callback);
        if($nopriv) {
            add_action('wp_ajax_nopriv_' . $action, $callback);
        }
    }
    
    createAjaxAction('contact_request', function (){
        $first_name = sanitize_text_field($_POST['firstname']);
        $last_name = sanitize_text_field($_POST['lastname']);
        $phone = sanitize_text_field($_POST['phone']);
        $email = sanitize_text_field($_POST['email']);
        $select = sanitize_text_field($_POST['select']);
        $message = sanitize_text_field($_POST['message']);
        
        $required_text = 'This field is required';
        $required = [
            [
                'name' => 'name',
                'value' => $first_name
            ],
            [
                'name' => 'email',
                'value' => $phone
            ],
            [
                'name' => 'email',
                'value' => $email
            ]
        ];
        $errors = [];
        
        foreach ($required as $required_field){
            if(!$required_field['value']){
                $errors[$required_field['name']] = $required_text;
            }
        }
        
        if($errors){
            wp_send_json_error(['errors'=>$errors], 300);
            return;
        }
        
        $to = get_option( 'admin_email' );
        $subject = 'Contact request';
        $headers = 'From: no_reply@first-circle.sheep.fish' . "\r\n";
        $email_message = 'Name: ' . $first_name . ' ' . ($last_name ?: '') . "\r\n";
        $email_message .= 'Phone: ' . $phone . "\r\n";
        $email_message .= 'Email: ' . $email . "\r\n";
        $email_message .= 'Interested in: ' . $select . "\r\n";
        $email_message .= 'Message: ' . "\r\n";
        $email_message .= $message;
        
        $sent = wp_mail($to, $subject, $email_message, $headers);
        $date = date('m/d/Y h:i:s a', time());
        $post_data = array(
            'post_title' => $date.' Contact request',
            'post_name' => $date.' Contact request',
            'post_status' => 'private',
            'post_author' => 1,
            'post_type' => 'contact-request',
        );
        
        $post_id = wp_insert_post($post_data);
        
        update_field('contact_request', $email_message, $post_id);
        
        wp_send_json_success(['success'=>$sent]);
    });