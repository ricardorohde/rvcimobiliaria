<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>RVC Imobiliária - A certeza de um negócio seguro</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
    <link rel="stylesheet" href="colorbox.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js" type="text/javascript"></script>
	<script src="js/jquery.colorbox-min.js" type="text/javascript"></script>
    <script>
			$(document).ready(function(){
				//Examples of how to assign the ColorBox event to elements
				$(".mapa1").colorbox({rel:'mapa1'});
				$(".mapa2").colorbox({rel:'mapa2'});
			});
		</script>	
</head>

<body>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
	<div id="root">
    	<div id="top">
        	<div id="logo"><a href="index.php"><img src="images/logo.gif" /></a></div>
    		<div id="menu">
            	<ul>
                	<li><a href="index.php">Início</a></li>
                    <li><a href="sobre.php">Sobre</a></li>
                    <li><a href="servicos.php">Serviços</a></li>
                    <li><a href="imoveis.php">Imóveis</a></li>
                    <li><a href="caixa.php">CAIXA Aqui</a></li>
                    <li><span>Contato</span></li>
                </ul>
                <form id="pesquisar-menu" action="busca-imoveis.php?i=trim($_POST['buscar-imovel']">
                	<input type="text" class="input-pesquisar" name="buscar-imovel"/>
                    <input type="submit" id="pesquisar-submit" value="Buscar" class="botao-pesquisar"></button>
                </form>
            </div>
    	</div>
        <div class="container">
        <div id="pagina-interna">
        	<div class="coluna-esquerda">
            <h1>Contato</h1>
            <form action="" method="post" enctype="multipart/form-data" class="contato">            
            <?php
            if (isset($_POST['enviar']) && $_POST['enviar'] == 'send') {
            
             $nome = strip_tags(trim($_POST['nome']));
             $fone = strip_tags(trim($_POST['fone']));
			 $email = strip_tags(trim($_POST['email']));
             $assunto = strip_tags(trim($_POST['assunto']));
             $mensagem = strip_tags(trim($_POST['mensagem']));
			
            
             if(empty($nome)) {
             $retorno = '<span>Informe seu nome</span>';
             }elseif (empty($fone)) {
             $retorno = '<span>Informe seu telefone</span>';
			 }elseif (empty($email)) {
             $retorno = '<span>Informe seu e-mail</span>';
             }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
             $retorno = '<span>Informe um e-mail válido</span>';
             }elseif (empty($assunto)) {
             $retorno = '<span>Digite o assunto!</span>';
             }elseif (empty($mensagem)) {
             $retorno = '<span>Digite a mensagem</span>';
             }if (empty($retorno)) {
            
            //<input type="hidden" name="enviar" value="send" />
            
            $date = date("d/m/Y h:i");
            
            // ****** ATENÇÃO ********
            // ABAIXO ESTÁ A CONFIGURAÇÃO DO SEU FORMULÁRIO.
            // ****** ATENÇÃO ********
            
            //CABEÇALHO - ONFIGURAÇÕES SOBRE SEUS DADOS E SEU WEBSITE
            $nome_do_site="RVC Imobiliária";
            $email_para_onde_vai_a_mensagem = "contato@rvcimobiliaria.com.br";
            $nome_de_quem_recebe_a_mensagem = "RVC Imobiliária";
            $exibir_apos_enviar='';
            
            //MAIS - CONFIGURAÇOES DA MENSAGEM ORIGINAL
            $cabecalho_da_mensagem_original="From: $nome <$email>\n";
            $assunto_da_mensagem_original="Contato do Site RVC Imobiliaria";
            
            // FORMA COMO RECEBERÁ O E-MAIL (FORMULÁRIO)
            // ******** OBS: SE FOR ADICIONAR NOVOS CAMPOS, ADICIONE OS CAMPOS NA VARIÁVEL ABAIXO *************
            $configuracao_da_mensagem_original="
            
            ENVIADO POR:\n
            Nome: $nome\n
            Telefone: $fone\n
		    E-mail: $email\n
            Assunto: $assunto\n\n\n
            Mensagem: $mensagem\n\n
            
            ENVIADO EM: $date";
            
            //CONFIGURAÇÕES DA MENSAGEM DE RESPOSTA
            // CASO $assunto_digitado_pelo_usuario="s" ESSA VARIAVEL RECEBERA AUTOMATICAMENTE A CONFIGURACAO
            // "Re: $assunto"
            $assunto_da_mensagem_de_resposta = "Confirmação";
            $cabecalho_da_mensagem_de_resposta = "From: $nome_do_site <$email_para_onde_vai_a_mensagem>\n";
            $configuracao_da_mensagem_de_resposta="Obrigado por entrar em contato!\nEstaremos respondendo em breve...\nAtenciosamente,\n$nome_do_site\n\nEnviado em: $date";
            
            // ****** IMPORTANTE ********
            // A PARTIR DE AGORA RECOMENDA-SE QUE NÃO ALTERE O SCRIPT PARA QUE O&nbsp; SISTEMA FINCIONE CORRETAMENTE
            // ****** IMPORTANTE ********
            
            //ESSA VARIAVEL DEFINE SE É O USUARIO QUEM DIGITA O ASSUNTO OU SE DEVE ASSUMIR O ASSUNTO DEFINIDO
            //POR VOCÊ CASO O USUARIO DEFINA O ASSUNTO PONHA "s" NO LUGAR DE "n" E CRIE O CAMPO DE NOME
            //'assunto' NO FORMULARIO DE ENVIO
            $assunto_digitado_pelo_usuario="s";
            
            //ENVIO DA MENSAGEM ORIGINAL
            $headers = "$cabecalho_da_mensagem_original";
            if ($assunto_digitado_pelo_usuario=="s")
            {
            $assunto = "$assunto_da_mensagem_original";
            };
            $seuemail = "$email_para_onde_vai_a_mensagem";
            $mensagem = "$configuracao_da_mensagem_original";
            mail($seuemail,$assunto,$mensagem,$headers);
            
            //ENVIO DE MENSAGEM DE RESPOSTA AUTOMATICA
            $headers = "$cabecalho_da_mensagem_de_resposta";
            if ($assunto_digitado_pelo_usuario=="s")
            {
            $assunto = "$assunto_da_mensagem_de_resposta";
            }
            else
            {
            $assunto = "Re: $assunto";
            };
            $mensagem = "$configuracao_da_mensagem_de_resposta";
            mail($email,$assunto,$mensagem,$headers);
            
            /*echo "<script>window.location='$exibir_apos_enviar'</script>";*/
            echo "<span class=\"yes\">Sua mensagem foi enviada com suscesso, Estaremos respondendo o mais breve possivel!</span>";
            } else {
             echo "$retorno";
             }
            }
            ?>
             <ul>
             <li>
             <label>
             <span>Nome:</span><br />
             <input type="text" name="nome" style="width:300px;" />
             </label>
             </li>
             <li>
             <label>
             <span>Telefone:</span><br />
             <input type="text" name="fone" style="width:100px;" />
             </label>
             </li>
             <li>
             <label>
             <span>E-mail:</span><br />
             <input type="text" name="email" style="width:300px;"/>
             </label>
             </li>
             <li>
             <label>
             <span>Assunto:</span><br />
             <input type="text" name="assunto"  style="width:300px;"/>
             </label>
             </li>
             <li>
             <label>
             <span>Mensagem:</span><br />
             <textarea cols="31" rows="5" name="mensagem"  style="width:300px;"></textarea>
             </label>
             </li>
             <li>
             <input type="hidden" name="enviar" value="send" />
             <input type="submit" name="Enviar" value="Enviar" class="button-form" />
             </li>
             </ul>
            </form>
            </div>
            <div class="coluna-direita">
            <h1>Escritórios</h1>            
            <p><b>Matriz - Ibiá/MG</b><br />
            	Rua Sabina Borges lima(antiga dezessete), 88 - Centro <br />
                CEP: 38950-000<br />
                Fone: (34) 3631-1196<br />
                E-mail: rvcimobiliaria@gmail.com<br />
                Como chegar? <a class="mapa1" href="images/mapa-ibia.jpg" title="RVC Imobiliária - Ibiá">ver mapa</a>
            </p>
            <p><b>Filial - Rio Paranaíba/MG</b><br />
            	Rua João Leandro, 718 - Centro<br />
                CEP: 38810-000<br />
                Fone: (34) 3855-2281<br />
                E-mail: rvcimobiliaria.rio@gmail.com<br />
                Como chegar? <a class="mapa2" href="images/mapa-rio.jpg" title="RVC Imobiliária - Rio Paranaíba">ver mapa</a>
            </p>	
	    <p><b> Filial - São Gotardo/MG</b><br />
		Rua Coronel Fonte Boa, 250 - Centro<br />
		CEP: 38800-000<br />
		Fone: (34) 3671-1022 <br />
		E-mail: rvcimobiliaria@gmail.com<br />
		Como chegar? <a class="mapa1" href="images/mapa-sg.jpg" title="RVC Imobiliária - São Gotardo">ver mapa</a>
	    
	    </p>
            <h1 style="margin:20px 0 10px;">Facebook</h1>
            <div class="fb-like-box" data-href="http://www.facebook.com/rvcimobiliaria" data-width="292" data-show-faces="true" data-stream="true" data-header="true"></div>
            </div>
            <br style="clear:both;" />
   		</div>
    <div id="assinatura">
    	<div id="assinatura-esquerda">
        <p>© 2014 RVC Imobiliária - A certeza de um négocio seguro. Todos os direitos reservados.<br /><br />
        <a href="http://www.facebook.com/rvcimobiliaria" target="_blank"><img src="images/icon-facebook.png" /></a>
        </p></div>
        <div id="assinatura-direita">
        <a href="caixa.php"><img src="images/icon-caixa.png" /></a>
        </div>
    </div>
    </div>        
    </div> 
</body>
</html>
