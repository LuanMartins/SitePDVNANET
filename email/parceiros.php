<?php

require_once("../vendor/phpmailer/PHPMailer.php");
require_once("../vendor/phpmailer/SMTP.php");
require_once ("../vendor/phpmailer/Exception.php");

// criaÃ§Ã£o de objeto para envio de mensagem
if($_POST) {
    if (strip_tags($_POST['nome']) &&
        strip_tags($_POST['email']) &&
        strip_tags($_POST['telefone']) &&
        strip_tags($_POST['cidade']) &&
        strip_tags($_POST['uf'])
    ) {


        $email = new PHPMailer\PHPMailer\PHPMailer();
// configuraÃ§Ã£o basica para uso da classe
        $email->isSMTP();
        $email->Host = 'smtp.gmail.com';
        $email->SMTPAuth = true;
        $email->SMTPSecure = 'tls';
        $email->Username = 'contato.pdvnanet@gmail.com';
        $email->Password = 'solucoes@12';
        $email->Port = 587;
        $email->isHTML(true);
        $email->CharSet = 'ut f-8';

// configuraÃ§Ã£o de remetente
        $email->setFrom('contato.pdvnanet@gmail.com');
        $email->FromName = "PDVNANET";

// email de destinatario
        $email->AddAddress( "luan_18martins@hotmail.com", $_POST['nome'] );

// mensagem de teste
        $email->Subject = "A Equipe do PDVNANET agradece seu contato " + $_POST['nome'];
        $email->Body = "<html lang='pt'>
        <head>
          <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <meta http-equiv='X-UA-Compatible' content='ie=edge'>
        </head>
        <body>
        <div style='background: #f0f0f0; padding: 20px; '>
                    <div style='background: white; width: 80%; margin: auto; border: 1px solid rgb(210, 210, 210);'>
                        <div style='height: 70px; background: #429244;'></div>
                        <div style='height: 20px; background: #00a2ea'></div>
                        <div style='width: 500px; margin: auto; margin-top: 10px; margin-bottom: 10px;'>
                            <h1><center>ATENÇÃO TIME COMERCIAL</center></h1>
                        </div>
                        <div style='width: 80%; margin: auto; margin-top: 10px; margin-bottom: 10px;'>
                            <div style='text-align: justify; margin-top: 20px; margin-bottom: 20px; font-family: Arial; font-size: 15px;'>
                            <h3></h3>
                                <h4>Data:</h4>
                                <h4>Horário do Contato:</h4>
                                <h4>Nome: </h4>
                                <h4>Email: </h4>
                                <h4>Telefone: </h4>
                                <h4>Empresa:</h4>
                                <h4>cargo: </h4>
                                <h3>Atenciosamente,</h3>
                                <h3>Soluc1one Web System</h3>
                                <img src='cid:135' width='300px' height='100px'>
                                <h3>Atenciosamente,</h3>
                                <h3>Soluc1one Web System</h3>
                            </div>
                        </div>
                        <div style='background: white;'>
                            <div style='width: 300px; margin: auto; margin-top: 10px; margin-bottom: 10px;'>
                            
                            </div>
                        </div>
                    </div>	
                </div>
        </body>
        </html>";

         //$email->MsgHTML($mensagem);

        $enviado = $email->Send();


        //---------- Email para confirmação de envio --------------------//


        $emailParceiro = new PHPMailer\PHPMailer\PHPMailer();

         $emailParceiro->isSMTP();
         $emailParceiro->Host = 'smtp.gmail.com';
         $emailParceiro->SMTPAuth = true;
         $emailParceiro->SMTPSecure = 'tls';
         $emailParceiro->Username = 'contato.pdvnanet@gmail.com';
         $emailParceiro->Password = 'solucoes@12';
         $emailParceiro->Port = 587;
         $emailParceiro->isHTML(true);
         $emailParceiro->CharSet = 'utf-8';

//  configuraÃ§Ã£o de remetente
         $emailParceiro->setFrom('contato.pdvnanet@gmail.com');
         $emailParceiro->FromName = "PDVNANET";

//  email de destinatario
         $emailParceiro->AddAddress( $_POST['email'], $_POST['nome'] );

// mensagem de t este
        $emailParceiro->Subject = "A Equipe do PDVNANET agradece seu contato " + $_POST['nome'];
        $emailParceiro->Body = "<html lang='pt'>
        <head> 
          <meta ch arset='UTF-8'>
            <meta  name='viewport' content='width=device-width, initial-scale=1.0'>
            <met a http-equiv='X-UA-Compatible' content='ie=edge'>
        </head> 
        <body> 
        <div style='background: #f0f0f0; padding: 20px; '>
                    <div style='background: white; width: 80%; margin: auto; border: 1px solid rgb(210, 210, 210);'>
                        <div style='height: 70px; background: #429244;'></div>
                        <div style='height: 20px; background: #00a2ea'></div>
                        <div style='width: 500px; margin: auto; margin-top: 10px; margin-bottom: 10px;'>
                            <h1><center>ATENÇÃO TIME COMERCIAL</center></h1>
                        </div>
                        <div style='width: 80%; margin: auto; margin-top: 10px; margin-bottom: 10px;'>
                            <div style='text-align: justify; margin-top: 20px; margin-bottom: 20px; font-family: Arial; font-size: 15px;'>
                            <h3></h3>
                                <h4>recebi a confirmação topzeira</h4>
                                
                            < /div>
                        </div>
                        <div style='background: white;'>
                             <div style='width: 300px; margin: auto; margin-top: 10px; margin-bottom: 10px;'>
                            
                            </div>
                        </div>
                    </div>	
                </div> 
        </body> 
        </html>" ;

        //$email->MsgHTML($mensagem);

         $enviadoParceiro = $emailParceiro->Send();



         if ($enviado && $enviadoParceiro) {
             echo "1";
         } else {
            //$error = PHPMailer\PHPMailer\Exception();

            echo $email->ErrorInfo;
        }
    }

}

?>