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
            <?php /*?><a href="cadastro-imovel.php">Cadastrar Imovél</a><br />
			<a href="listar.php">Listar Usuarios</a><?php */?>
    		<div id="menu">
            	<ul>
                	<li><a href="index.php">Início</a></li>
                    <li><a href="sobre.php">Sobre</a></li>
                    <li><span>Serviços</span></li>
                    <li><a href="imoveis.php">Imóveis</a></li>
                    <li><a href="caixa.php">CAIXA Aqui</a></li>
                    <li><a href="contato.php">Contato</a></li>
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
            <h1>Serviços</h1>
            <p>Soluções em negócios imobiliários. A RVC Imobiliária oferece serviços pensando sempre na solução mais rápida e conveniente para você. Veja abaixo a lista de cada uma das nossas áreas de atuação.</p>
            <p><b>• Intermediações na compra e venda</b><br /></p>
            <ul style=" list-style-position:outside; margin-left:20px; color:#999; font-family:Tahoma, Geneva, sans-serif; margin-top:10px; font-size:12px;">
            	<li><p>Casas</p></li>
                <li><p>Apartamentos</p></li>
                <li><p>Terrenos</p></li>
                <li><p>Condomínios</p></li>
                <li><p>Imóveis rurais</p></li>
            </ul>
            <p><b>• Locação e administração de contratos residenciais e comerciais</b><br /></p>
            <p><b>• Avaliação de imóveis</b><br /></p>
            <p><b>• Lançamentos imobiliários, residenciais ou comerciais</b><br /></p><br><br>
            <h1 style="margin:15px 0 10px;">Correspondente Caixa Aqui</h1>
            <p style="float:left; width:420px;">Visando oferecer mais comodidade aos seus clientes a RVC Imobiliária se tornou correspondente bancário da CAIXA ECONÔMICA FEDERAL, podendo assim oferecer mais uma gama de serviços e produtos, para mais detalhes <a href="caixa.php">clique aqui</a>.</p>
            <a href="caixa.php" style="float:left;"><img src="images/icon-caixa-g.png" /></a>
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
                Como chegar? <a class="mapa1" href="images/mapa-rio.jpg" title="RVC Imobiliária - Rio Paranaíba">ver mapa</a>
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
