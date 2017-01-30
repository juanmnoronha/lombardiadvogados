<?php

$errorMSG = "";

// NAME
if (empty($_POST["name"])) {
    $errorMSG = "Nome obrigatório";
} else {
    $name = $_POST["name"];
}

// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "E-mail obrigatório ";
} else {
    $email = $_POST["email"];
}

// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG .= "Mensagem obrigatória ";
} else {
    $message = $_POST["message"];
}


$EmailTo = "juanmnoronha@gmail.com";
$Subject = "[Lombardi Advogados Associados] Nova mensagem recebida";

// prepare email body text
$Body = "";
$Body .= "Nome: ";
$Body .= $name;
$Body .= "\n";
$Body .= "E-mail: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Mensagem: ";
$Body .= $message;
$Body .= "\n";

// send email
$success = mail($EmailTo, $Subject, $Body, "From:".$email);

// redirect to success page
if ($success && $errorMSG == ""){
   echo "Mensagem Enviada com Sucesso";
}else{
    if($errorMSG == ""){
        echo "ERRO!!!! :(";
    } else {
        echo $errorMSG;
    }
}

?>
