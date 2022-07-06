<?php

function stock_count_file_email($file,$to,$from,$cc,$subject)
{
    
      $ci = get_instance();
      $from = $from;
      $to = $to;
      $cc = $cc;
      $subject = $subject;
      $from_name = 'Test';
      $email_message = '<p>Dear All,<br/><br/>Greetings From Test!!!<br/><br/>Please find the attached overall stock status Branded goods, and accessories for All live markets.</p>';
      $smtp = true;
      $config2 = array();
      $config2['protocol']    = 'smtp';
      $config2['smtp_host']    = 'ssl://smtp.gmail.com';
      $config2['smtp_port']    = 465; //SSL port
      $config2['smtp_timeout'] = '7';
      $config2['smtp_user']    = SUPP_EMAIL; //jlrmenasupport@mobilestyx.co.in
      $config2['smtp_pass']    = SUPP_EMAIL_PASS; //uaep@alta_mo
      $config2['charset']    = 'utf-8';
      $config2['mailtype'] = 'html';
      $config2['newline'] = "\r\n";		

    //   file_put_contents($file);
    
      $config['mailtype'] = 'html';
      if($smtp == true){
              $ci->load->library('email',$config2);
              $ci->email->initialize($config2);
             
      }else{
             //$ci->email->initialize($config);
             $ci->load->library('email',$config);
      }
         
         $ci->email->reply_to($from, $from_name);
         $ci->email->from($from, $from_name);
         $ci->email->to($to);
         $ci->email->cc($cc);
         $ci->email->subject($subject);
         if($file != ''){
            
         $ci->email->attach($file);
         }
         $ci->email->message($email_message);
          $send_mail = $ci->email->send();
          /*$x = $ci->email->print_debugger();
          print_r($x);*/
         $ci->email->clear(TRUE);
         return $send_mail;
}

?>