<!DOCTYPE html>
<html>
<head>
    <title>Formulário com PHP e Ajax</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <link rel="stylesheet" href="static/css/style.css">
    <link rel="stylesheet" href="static/font-awesome/css/font-awesome.min.css">
</head>
<body>
 
<div class="wrapper">
<h1>Formulário de Contato com PHP e Ajax</h1>
    <form id="form_contact" method="post">    
    <label>Nome</label>
        <input type="text" name="nome" class="input_group" placeholder="&#xf05a; Nome" maxlength="65" required>
         
        <label>E-mail</label>
        <input type="email" name="email" class="input_group" placeholder="&#xf0e0; E-mail" maxlength="50" required>
         
        <label>Assunto</label>
        <input type="text" name="assunto" class="input_group" placeholder="&#xf12a; Assunto" maxlength="40" required>
 
        <label>Mensagem</label>
        <textarea name="mensagem" rows="5" class="textarea_group" placeholder="&#xf044; Mensagem" maxlenght="50000" required></textarea>            
         
    <button type="submit" class="btn_send">ENVIAR</button>
    </form>       
</div>
 
<div class="modal">
    <div class="modal-content">
        <div class="modal-loading">
            <img src="static/img/loading_2.gif" alt="RENOMEAR">
            <p>ENVIANDO, AGUARDE!</p>
        </div>
 
        <div class="modal-success hidden">            
            <img src="static/img/success.svg">
            <p>ENVIADO COM SUCESSO!</p>
            <button class="modal-close" alt="fechar">Fechar</button>
        </div>
    </div>
</div>
 
<div class="overlay"></div>
</body>
</html>
</code>