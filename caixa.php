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
                    <li><span>CAIXA Aqui</span></li>
                    <li><a href="contato.php">Contato</a></li>
                </ul>
                <form id="pesquisar-menu" action="busca-imoveis.php?i=trim($_POST['buscar-imovel']">
                	<input type="text" class="input-pesquisar" name="buscar-imovel"/>
                    <input type="submit" id="pesquisar-submit" value="Buscar" class="botao-pesquisar"></button>
                </form>
            </div>
    	</div>
        <div class="container">
        <div id="pagina-interna" style="height:822px; background:url(images/caixa-aqui.jpg) no-repeat;">
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
