<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public function submit($arr)
    {
        $name = $arr['name'];
        $email = $arr['email'];
        $message = $arr['message'];
        $response = $arr['g-recaptcha-response'];        
        
        // reCAPTCHA
        $sitekey = '6Lf6cmAUAAAAAMew3MznV1mnT8uoAeZYJYBDmjdu';
        $secret = '6Lf6cmAUAAAAAOZ-yi254bIr6AkGg4mwPMDTXL3w';        
        
        $errors = array();     
            
        // reCAPTCHA    
        //$response = $_POST['g-recaptcha-response'];
        if ($response == '') {

            // captcha not submitted properly; display the form again
            $errors[] = "Please fill out the captcha below.";
            
        } else {
            $url = 'https://www.google.com/recaptcha/api/siteverify';
            $data = ['secret'   => $secret,
                    'response' => $response,
                    'remoteip' => $_SERVER['REMOTE_ADDR']];

            $options = [
                'http' => [
                    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method'  => 'POST',
                    'content' => http_build_query($data) 
                ]
            ];
    
            $context  = stream_context_create($options);
            $result = file_get_contents($url, false, $context);
            $resp = json_decode($result);

            if (!$resp->success) {
                
                // What happens when the CAPTCHA was entered incorrectly
                $errors[] = "The reCAPTCHA wasn't entered correctly. Go back and try it again." . "(reCAPTCHA said: " . $resp->error . ")";                
                             
            } else {
                $email_message = "<!doctype html><html><body><p>From ".$name.",<br>".$message."</p></body></html>";
    
                $headers = "Content-Type: text/html; charset=ISO-8859-1\r\n".
                            'From: '.$email."\r\n".
                            'Reply-To: '.$email."\r\n".                   
                            'X-Mailer: PHP/' . phpversion();
                if (!mail( "plumtreeinbackyard@gmail.com", "A message from SoapCal website", $email_message, $headers ))
                {

                    $errors[] = "There was a technical issue while submitting your message. Please try again.";
                    
                }     
            }  //if $resp
        } //if $response
        
        return $errors;
    }
}
