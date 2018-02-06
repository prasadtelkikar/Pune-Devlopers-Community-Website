<?php

    //validation
    $errors = ''; 
    $name = $_POST['name']; 
    $email_address = $_POST['email']; 
    $message = $_POST['message']; 

    if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $email_address))
        $errors .= "\n Error: Invalid email address";

    //validation complete

    if( empty($errors)){
    
        $to = $myemail;
        
        $email_subject = "Contact form submission: $name" + $subject;
        
        $email_body = "You have received a new message. ".
        
        " Here are the details:\n Name: $name \n ".
        
        "Email: $email_address\n Message \n $message";
        
        $headers = "From: $myemail\n";
        
        $headers .= "Reply-To: $email_address";

        
         mail("suyog.kale@gmail.com", $email_subject, $email_body, $headers);
         mail("cykulkarni@outlook.com", $email_subject, $email_body, $headers);

        header('Location: index.html');
    
    }
    
?>