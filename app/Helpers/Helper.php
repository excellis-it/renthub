<?php

namespace App\Helpers;
use App\Models\product\ProductModel;
use App\Models\UserEnquiry;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use App\Mail\SmtpEmail;


class Helper {


    public static function smtp_send_email($to, $subject, $body)
    {
        Mail::to($to)->send(new SmtpEmail($body));
    }

    public static function smtp_register_email($to, $subject, $body)
    {
        // echo "Hello World"; die;
        // Create a Mailable
        $data = ['body' => $body];
        
        
        Mail::send([], $data, function ($message) use ($to, $subject, $body) {
            $message->to($to)
                    ->subject($subject)
                    ->setBody($body, 'text/html'); // Use 'text/plain' for plain text
        });
    }

    public static function smtp_inquiry_email($to, $subject, $body)
    {
    //    echo "Hello World"; die;
        // Create a Mailable
        $data = ['body' => $body];
        
        
        Mail::send([], $data, function ($message) use ($to, $subject, $body) {
            $message->to($to)
                    ->subject($subject)
                    ->setBody($body, 'text/html'); // Use 'text/plain' for plain text
        });
    }

    public static function smtp_subscription_email($to, $subject, $body)
    {
      //echo "Hello World"; die;
        // Create a Mailable
        $data = ['body' => $body];
        
        Mail::send([], $data, function ($message) use ($to, $subject, $body) {
            $message->to($to)
                    ->subject($subject)
                    ->setBody($body, 'text/html'); // Use 'text/plain' for plain text
        });
    }

    public static function smtp_subscription_expiry($to, $subject, $body)
    {
      //echo "Hello World"; die;
        // Create a Mailable
        $data = ['body' => $body];
        
        Mail::send([], $data, function ($message) use ($to, $subject, $body) {
            $message->to($to)
                    ->subject($subject)
                    ->setBody($body, 'text/html'); // Use 'text/plain' for plain text
        });
    }

}
