<?php
//Verifico se o arquivo existe
if(file_exists("init.php")) {
	require "init.php";		
} else {
	echo "Arquivo init.php nao foi encontrado";
	exit;
}
//verifico se a função que eu criei existe, vai que alguem pegou meu script e apagou ela = )
if(!function_exists("Abre_Conexao")) {
	echo "Erro o arquivo init.php foi auterado, nao existe a função Abre_Conexao";
	exit;
}

Abre_Conexao();
//verifico se nao deu erro de mysql
if(mysql_errno() != 0) {
                //verifico se a $errros existe, mesma coisa vai que alguem meche no script e apagou ela
	if(!isset($erros)) {
		echo "Erro o arquivo init.php foi auterado, nao existe \$erros";
		exit;
	}
	echo $erros[mysql_errno()];
	exit;
}	
$palavra = $_GET['buscar-imovel'];


$query_casa = "SELECT * FROM IMOVEL 
WHERE 
BAIRRO_IMOVEL LIKE '%$palavra%' AND STATUS_IMOVEL='A' OR 
DESC_IMOVEL LIKE '%$palavra%' AND STATUS_IMOVEL='A' OR 
CIDADE_IMOVEL LIKE '%$palavra%' AND STATUS_IMOVEL='A' OR 
VALOR_IMOVEL LIKE '%$palavra%' AND STATUS_IMOVEL='A' OR 
INFRA_IMOVEL LIKE '%$palavra%' AND STATUS_IMOVEL='A' OR 
CARACTERISTICA_IMOVEL LIKE '%$palavra%' AND STATUS_IMOVEL='A' OR 
MINIDESC_IMOVEL LIKE '%$palavra%' AND STATUS_IMOVEL='A' OR 
AREA_IMOVEL LIKE '%$palavra%' AND STATUS_IMOVEL='A' OR 
NOME_IMOVEL LIKE '%$palavra%' AND STATUS_IMOVEL='A' ORDER BY ID_IMOVEL DESC";
$casa = mysql_query($query_casa);

$row_casa = mysql_fetch_assoc($casa);
$totalrows_casa = mysql_num_rows($casa);


?>
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
        	<h1>Resultado da Busca</h1>
            <div style="margin:0;" id="grid-home">
            <ul>
                <?php if ($totalrows_casa != 0) { do { $tipo = $row_casa["TIPO_IMOVEL"];?> 
                    <li>
                        <h3><?php echo $row_casa["NOME_IMOVEL"];?> - <?php echo $row_casa["BAIRRO_IMOVEL"];?></h3>
                        <a href="imovel.php?id=<?php echo $row_casa["ID_IMOVEL"];?>"><img src="<?php echo $row_casa["THUMB_IMOVEL"];?>" /></a>
                        <div class="tabela">
                        <h4>R$ <?php echo $row_casa["VALOR_IMOVEL"]; ?></h4>
                        <div class="quarto"><?php echo $row_casa["QUARTO_IMOVEL"]; ?></div>
                        <div class="garagem"><?php echo $row_casa["GARAGEM_IMOVEL"]; ?></div>
                        <br style="clear:both;" />
                       <?php if($tipo=='A' or $tipo=='L' or $tipo=='T' or $tipo=='C'){ ?>
                        <h4 style="border-bottom:none; border-top:1px solid #CCC; padding-top:10px;">Área:<span style="font-weight:normal;"> <?php echo $row_casa["AREA_IMOVEL"]; ?> m²</span></h4>
                        <?php } else{ ?>
                        <h4 style="border-bottom:none; border-top:1px solid #CCC; padding-top:10px;">Área:<span style="font-weight:normal;"> <?php echo $row_casa["AREA_IMOVEL"]; ?> ha</span></h4>
                        <?php }; ?>
                        <a href="imovel.php?id=<?php echo $row_casa["ID_IMOVEL"];?>"><span>Mais Detalhes</span><img src="images/grid-detalhes.gif" style="margin:0; float:right;" /></a>
                        
                      </div>
                        <p><?php echo $row_casa["MINIDESC_IMOVEL"];?></p>                
                    </li>
            	<?php } while($row_casa = mysql_fetch_assoc($casa)); } else {
						echo "<h2 style='margin:10px 20px 0; color:#333; font-weight:normal; font-size:16px;'> Nenhum registro foi encontrado com a palavra ".$palavra.". </h2>";
				}?>
            </ul>
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
