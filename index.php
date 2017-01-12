<!DOCTYPE html>
<html>
<head>
    <title>Formulário com PHP e Ajax</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <link rel="stylesheet" href="static/css/style.css">
    <link rel="stylesheet" href="static/font-awesome/css/font-awesome.min.css">
    <script src="static/js/jquery.min.js"></script>
    <script src="static/js/script.js"></script>
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
    
<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
<script type="text/javascript">
$(document).ready(function(){

	$("#form_contact").submit(function(){			//Se o formulário for enviado...
	    var data_form = jQuery(this).serialize();	//Pegue os dados inseridos pelo usuário, Serialize e guarde na váriavel.
		
		$('.overlay').addClass('modal-show');		
		$('.modal').addClass('modal-show');			//Adicione as classes para exibir o modal.
		$('.modal-content').addClass('modal-animate');

		//Início AJAX
	    $.ajax({			
		    type: "POST",		//Modo de envio: GET ou POST.
		    url: "send.php",	//Chama o arquivo SEND.PHP que fará o envio dos dados pelo PHPMailer.
		    data: data_form,	//Chama a váriavel com os dados que o usuário inseriu.
		    success: function(b){		//Se o e-mail for enviado com sucesso...
			    setTimeout(function(){
			    	$(".modal-loading").addClass("hidden");	//Remova a mensagem de "Loading".
		        	$(".modal-success").addClass("active");	//E exiba a mensagem de confirmação!
		        
		        }, 1500);	//Geralmente, o envio é feito de forma instântanea. Consequentemente, o usuário pode ter a impressão de que ocorreu um erro. Por isso, adicionamos um delay de 1500ms. Assim, o usuário entende que "Estamos trabalhando/Estamos enviando o formulário"
		      }
		    }); //Fim AJAX
		    return false;
		  });

	$(".modal-close").click(function(){		//Quando fechar o modal
		$('.overlay').removeClass('modal-show');
		$('.modal').removeClass('modal-show');		//Remova as classes que exibem o modal
		$('.modal-content').removeClass('modal-animate');

    	setTimeout(function(){	//Como a mensagem de confirmação está ativa, precisamos ocultar ela e exibir a mensagem de Loading "no ponto" para o usuário fazer um novo envio.
    		$(".modal-loading").removeClass("hidden");	
    		$(".modal-success").removeClass("active");
    	}, 1200);
    });
});
</script>
    
</body>
</html>
