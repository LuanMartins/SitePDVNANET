<?php

require_once("../vendor/phpmailer/PHPMailer.php");
require_once("../vendor/phpmailer/SMTP.php");
require_once ("../vendor/phpmailer/Exception.php");

// criaÃ§Ã£o de objeto para envio de mensagem

function envioDeEmail($nome,$email,$telefone,$plano)
{
}
if($_POST) {
    if (strip_tags($_POST['nome']) && strip_tags($_POST['email']) && strip_tags($_POST['telefone'])) {

        $email = new PHPMailer\PHPMailer\PHPMailer();


// configuraÃ§Ã£o basica para uso da classe
        $email->isSMTP();
        $email->Host = 'smtp.gmail.com';
        $email->SMTPAuth = true;
        $email->SMTPSecure = 'tls';
        $email->Username = 'contato.pdvnanet@gmail.com';
        $email->Password = 'solucoes@12';
        $email->Port = 587;

// configuraÃ§Ã£o de remetente
        $email->setFrom('contato.pdvnanet@gmail.com');
        $email->FromName = "PDVNANET";

// email de destinatario
        $email->AddAddress( $_POST['email'], $_POST['nome'] );

// mensagem de teste
        $email->Subject = "A Equipe do PDVNANET agradece seu contato " + $_POST['nome'];
        $email->Body = "testando o envio de mensagens contato simples <b>HTML</b>! :)";

        $enviado = $email->Send();

        if ($enviado) {
            echo "1";
        } else {
            //$error = PHPMailer\PHPMailer\Exception();

            echo $email->ErrorInfo;
        }
    }

}

?>