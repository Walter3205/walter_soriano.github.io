<?php

// Replace this with your own email address

$siteOwnersEmail['1'] = 'dimas4@hotmail.com';
$siteOwnersEmail['2'] = 'yimyhercules@gmail.com';

if($_POST) {

    $name = trim(stripslashes($_POST['contactName']));
    $email = trim(stripslashes($_POST['contactEmail']));
    $subject = trim(stripslashes($_POST['contactSubject']));
    $contact_message = trim(stripslashes($_POST['contactMessage']));

    // Check Name
    if (strlen($name) < 2) {
        $error['name'] = "Por favor ingrese su nombre.";
    }
    // Check Email
    if (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $email)) {
        $error['email'] = "Por favor ingrese una dirección de correo válida.";
    }
    // Check Message
    if (strlen($contact_message) < 15) {
        $error['message'] = "Por favor ingrese su mensaje, debe ser mayor a 15 carácteres.";
    }
    // Subject
    if ($subject == '') { $subject = "Correo de Contacto del Sitio Web"; }


    // Set Message
    $message .= "Correo de: " . $name . "<br />";
    $message .= "Dirección: " . $email . "<br />";
    $message .= "Mensaje: <br />";
    $message .= $contact_message;
    $message .= "<br /> ----- <br /> Este correo ha sido enviado desde el formulario de Contacto de su Sitio. <br />";

    // Set From: header
    $from =  $name . " <" . $email . ">";

    // Email Headers
    $headers = "From: " . $from . "\r\n";
    $headers .= "Reply-To: ". $email . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


    if (!$error) {
        //$db = db_connect();
        //$contactModel = model('ContactModel', true, $db);
        /*$contactModel = new \App\Models\ContactModel();
        
        helper(['form', 'url']);
        $actual = new DateTime();
        
        $data = [
            'name' => $name,
            'email'  => $email,
            'subject' => $subject,
            'message'  => $contact_message,
            'readed' =>	'F',
            'created_at' => $actual->format("yyyy-mm-dd H:i:s"),
            'updated_at' => $actual->format("yyyy-mm-dd H:i:s")
        ];
    
        $contactModel->insert($data);*/
        
        for ($i=1; $i <= 2; $i++) { 
            ini_set("sendmail_from", $siteOwnersEmail[$i]); // for windows server .$i
            $mail = mail($siteOwnersEmail[$i], $subject, $message, $headers);
        }

        if ($mail) {     
            echo "OK"; 
        }else { 
            echo "Algo ha salido mal por favor intente nuevamente."; 
        }
        
    } # end if - no validation error

    else {

        $response = (isset($error['name'])) ? $error['name'] . "<br /> \n" : null;
        $response .= (isset($error['email'])) ? $error['email'] . "<br /> \n" : null;
        $response .= (isset($error['message'])) ? $error['message'] . "<br />" : null;
        
        echo $response;

    } # end if - there was a validation error

}

?>