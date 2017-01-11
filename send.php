<?php
if(!empty($_POST)){ 
     $nome = $_POST['nome'];
     $email = $_POST['email'];
     $assunto = $_POST['assunto'];
     $mensagem = $_POST['mensagem'];
 }
// Caminho da biblioteca PHPMailer
include 'PHPMailerAutoload.php';
  
// Instância do objeto PHPMailer
$mail = new PHPMailer;
  
// Configura para envio de e-mails usando SMTP
$mail->isSMTP();
  
// Servidor SMTP
$mail->Host = 'endereco-do-seu-host-.com'; //Se for GMAIL: smtp.gmail.com
  
// Usar autenticação SMTP
$mail->SMTPAuth = true;
  
// Usuário da conta
$mail->Username = 'email@provedor-de-email.com';
  
// Senha da conta
$mail->Password = 'senha-do-email';
  
// Tipo de encriptação que será usado na conexão SMTP
 $mail->SMTPSecure = 'ssl';
  
// Porta do servidor SMTP - Também pode ser a porta "587". Verifique com o seu provedor de Email
$mail->Port = 465;
  
// Informa se vamos enviar mensagens usando HTML
$mail->IsHTML(true);
  
// Email do Remetente
$mail->From = 'email@remetente.com';

// Responder Para
$mail->addReplyTo($email, $nome);
  
// Nome do Remetente
$mail->FromName = $nome;
//Codificação da linguagem
$mail->CharSet = 'UTF-8';
  
// Endereço do e-mail do destinatário
$mail->addAddress('email@destinatario.com');
  
// Assunto do e-mail
$mail->Subject = $assunto;
  
// Mensagem que vai no corpo do e-mail
  $mail->Body = '<h1>NOVA MENSAGEM</h1> <br><br>
  Nome: <strong>'.$nome.'</strong>
<br>
  E-mail: <strong>'.$email.'</strong>
<br>
  Assunto: <strong>'.$assunto.'</strong>
<br>
  Mensagem: <strong>'.$mensagem.'</strong>
<br>';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    //echo 'Message has been sent';
}
