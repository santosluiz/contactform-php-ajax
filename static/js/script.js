$(document).ready(function(){
    $("#form_contact").submit(function(){           //Se o formulário for enviado...
        var data_form = jQuery(this).serialize();   //Pegue os dados inseridos pelo usuário, Serialize e guarde na váriavel.
         
        $('.overlay').addClass('modal-show');       
        $('.modal').addClass('modal-show');         //Adicione as classes para exibir o modal.
        $('.modal-content').addClass('modal-animate');
 
        //Início AJAX
        $.ajax({            
            type: "POST",       //Modo de envio: GET ou POST.
            url: "send.php",    //Chama o arquivo SEND.PHP que fará o envio dos dados pelo PHPMailer.
            data: data_form,    //Chama a váriavel com os dados que o usuário inseriu.
            success: function(b){       //Se o e-mail for enviado com sucesso...
                setTimeout(function(){
                    $(".modal-loading").addClass("hidden"); //Remova a mensagem de "Loading".
                    $(".modal-success").addClass("active"); //E exiba a mensagem de confirmação!
                 
                }, 1500);   //Geralmente, o envio é feito de forma instântanea. Consequentemente, o usuário pode ter a impressão de que ocorreu um erro. Por isso, adicionamos um delay de 1500ms. Assim, o usuário entende que "Estamos trabalhando/Estamos enviando o formulário"
              }
            }); //Fim AJAX
            return false;
          });
     
         $(".modal-close").click(function(){        //Quando fechar o modal
        $('.overlay').removeClass('modal-show');
        $('.modal').removeClass('modal-show');      //Remova as classes que exibem o modal
        $('.modal-content').removeClass('modal-animate');
         
         setTimeout(function(){ //Como a mensagem de confirmação está ativa, precisamos ocultar ela e exibir a mensagem de Loading "no ponto" para o usuário fazer um novo envio.
            $(".modal-loading").removeClass("hidden");  
            $(".modal-success").removeClass("active");
        }, 1200);
    });
});
