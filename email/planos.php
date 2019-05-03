<?php

/*require_once("../vendor/phpmailer/PHPMailer.php");
require_once("../vendor/phpmailer/SMTP.php");

// criação de objeto para envio de mensagem

function envioDeEmail(){
    $email = new PHPMailer\PHPMailer\PHPMailer();


// configuração basica para uso da classe
    $email->isSMTP();
    $email->Host = 'smtp.gmail.com';
    $email->SMTPAuth = true;
    $email->SMTPSecure = 'tls';
    $email->Username = 'contato.pdvnanet@gmail.com';
    $email->Password = 'solucoes@12';
    $email->Port = 587;

// configuração de remetente
    $email->setFrom('luan.martins@tecsoft.info');
    $email->FromName = "Luan Martins";

// email de destinatario
    $email->AddAddress('luan_18martins@hotmail.com', 'Carlos magno');

// mensagem de teste
    $email->Subject = "Mensagem Teste"; # Assunto da mensagem
    $email->Body = "Este é o corpo da mensagem de teste, em <b>HTML</b>! :)";
    $email->AltBody = "Este é o corpo da mensagem de teste, somente Texto! \r\n :)";

    $enviado = $email->Send();

    if ($enviado) {
        echo "1";
    } else {

        echo $email->ErrorInfo;
    }
}


echo envioDeEmail();
*/


echo 1;



?>