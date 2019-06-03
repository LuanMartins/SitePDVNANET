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

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $cidade = $_POST['cidade'];
        $uf = strtoupper($_POST['uf']);

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

        $corpoMensagem = "<html lang='pt'>
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
                                <h4>Nome: [NOME]</h4>
                                <h4>Email: [EMAIL]</h4>
                                <h4>Telefone: [TELEFONE]</h4>
                                <h4>Cidade: [CIDADE]</h4>
                                <h4>UF: [UF]</h4>
                                <h3>Atenciosamente,</h3>
                                <h3>SallesPDV</h3>
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

        $corpoMensagem = str_replace("[NOME]",$nome,$corpoMensagem);
        //$corpoMensagem = str_replace("[EMAIL]",strval($email),$corpoMensagem);
        $corpoMensagem = str_replace("[TELEFONE]",$telefone,$corpoMensagem);
        $corpoMensagem = str_replace("[CIDADE]",$cidade,$corpoMensagem);
        $corpoMensagem = str_replace("[UF]",$uf,$corpoMensagem);

        $email->Body = $corpoMensagem;

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
 
                        </div>
                        <div style='width: 80%; margin: auto; margin-top: 10px; margin-bottom: 10px;'>
                            <div style='text-align: justify; margin-top: 20px; margin-bottom: 20px; font-family: Arial; font-size: 15px;'>
                            <h3></h3>
                                <h4><center>Nossa equipe agradece o contato. Em breve retornaremos</center></h4>
                                
                            </div>
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