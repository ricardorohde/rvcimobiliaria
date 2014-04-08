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
$id = $_GET['id'];
	
$query_imovel = "SELECT * FROM IMOVEL WHERE ID_IMOVEL='$id' AND STATUS_IMOVEL='A'";

$imovel = mysql_query($query_imovel);

$row_imovel = mysql_fetch_assoc($imovel);
$totalrows_imovel = mysql_num_rows($imovel);

$tipo = $row_imovel["TIPO_IMOVEL"];

if ($tipo=='A'){
	$nomeimovel = 'Apartamento';
	$labelvalor = 'Valor';
	}
	if ($tipo=='C'){
	$nomeimovel = 'Casa';
	$labelvalor = 'Valor';
	}
	if ($tipo=='T'){
	$nomeimovel = 'Lote';
	$labelvalor = 'Valor';
	}
	if ($tipo=='R'){
	$nomeimovel = 'Rural';
	$labelvalor = 'Valor';
	}
	if ($tipo=='L'){
	$nomeimovel = 'Locação';
	$labelvalor = 'Aluguel';
	}
	$i = '1';
	$img1 = $row_imovel["IMG1_IMOVEL"];
	$img2 = $row_imovel["IMG2_IMOVEL"];
	$img3 = $row_imovel["IMG3_IMOVEL"];
	$img4 = $row_imovel["IMG4_IMOVEL"];
	$img5 = $row_imovel["IMG5_IMOVEL"];
	$img6 = $row_imovel["IMG6_IMOVEL"];
	$img7 = $row_imovel["IMG7_IMOVEL"];
	$img8 = $row_imovel["IMG8_IMOVEL"];
	
	if ($img1==null) {$numeral = 0;}
	else if ($img2==null){$numeral = 1;}
  	else if ($img3==null){$numeral = 2;}
	else if ($img4==null){$numeral = 3;}
	else if ($img5==null){$numeral = 4;}
	else if ($img6==null){$numeral = 5;}
	else if ($img7==null){$numeral = 6;}
	else if ($img8==null){$numeral = 7;}
	else  {$numeral = 8; }
	
	$idimovel = $row_imovel["ID_IMOVEL"];
	$cidadeimovel = $row_imovel["CIDADE_IMOVEL"];
	$bairroimovel = $row_imovel["BAIRRO_IMOVEL"];
	$valorimovel = $row_imovel["VALOR_IMOVEL"];
	$urlimovel = $row_imovel["URL_IMOVEL"];
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>RVC Imobiliária - A certeza de um negócio seguro</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
   <link type="text/css" href="jquery-ui.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
    <link rel="stylesheet" href="colorbox.css" />
    <link type="text/css" href="styles/bottom.css" rel="stylesheet" />
<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.js'></script>  
    <script src="js/jquery.jcarousel.min.js" type="text/javascript"></script>
	<script src="js/jquery.pikachoose.js" type="text/javascript"></script>
     <script src="js/jquery.colorbox-min.js" type="text/javascript"></script>
     <script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>   
	 <script>
			$(document).ready(
				function (){					
					$("#fotos").PikaChoose({carousel:true});
					$('a[href="<?php echo $img1 ?>"]').colorbox({rel:'foto1'});
					$(".button-agendar").colorbox({iframe:true, width:"400px", height:"400px"});
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
   		<div class="coluna-esquerda">
            <h2><?php echo $row_imovel["NOME_IMOVEL"];?> - <?php echo $row_imovel["BAIRRO_IMOVEL"];?>
            <?php if($tipo=='A' or $tipo=='L' or $tipo=='C'){ ?>
            <span class="garagem icone-imovel"><?php echo $row_imovel["GARAGEM_IMOVEL"];?></span>
            <span class="banheiro icone-imovel"><?php echo $row_imovel["BANHEIRO_IMOVEL"];?></span>
            <span class="quarto icone-imovel"><?php echo $row_imovel["QUARTO_IMOVEL"];?></span>
            <?php }; ?>
            </h2>
            
            <ul id="fotos" class="jcarousel-skin-pika">
            	<?php  do { ?>
                <li><a class="foto1" href="<?php echo $urlimovel."0". $i.".jpg"; ?>"><img src="<?php echo $urlimovel."0". $i.".jpg"; $i++; ?>"/></a></li>
				<?php }   while($i<=$numeral); ?> 
            </ul>
            
            <p style="font-size:12px;"><?php echo $row_imovel["DESC_IMOVEL"];?></p>
			<h2 style="margin:20px 0 10px;">Infraestrutura</h2>
            <ul class="caracteristicas">
            	<?php echo $row_imovel["INFRA_IMOVEL"];?>
            </ul>
            <br style="clear:both;" />
            <h2 style="margin:20px 0 10px;">Formas de Pagamento</h2>
            <ul class="caracteristicas">
            	<?php echo $row_imovel["PAGAMENTO_IMOVEL"];?>
            </ul>
            <br style="clear:both;" />
            <h2 style="margin:20px 0 10px;">Características do Imovél</h2>
            <ul class="caracteristicas">
            	<?php echo $row_imovel["CARACTERISTICA_IMOVEL"];?>
            </ul>
            </div>
            <div class="coluna-direita">
            <h2>Ficha Técnica</h2>
            <ul class="ficha-tecnica">
            	<li><b>Tipo:</b> <?php echo $nomeimovel;?></li>
                <li class="odd"><b><?php echo $labelvalor;?>:</b> <?php echo $row_imovel["VALOR_IMOVEL"];?></li>
                <li><b>Cidade:</b> <?php echo $row_imovel["CIDADE_IMOVEL"];?></li>
                <li class="odd"><b>Bairro:</b> <?php echo $row_imovel["BAIRRO_IMOVEL"];?></li>
                <?php if($tipo=='A' or $tipo=='L' or $tipo=='T' or $tipo=='C'){ ?>
                <li><b>Área útil:</b> <?php echo $row_imovel["AREA_IMOVEL"];?> m²</li>
                <?php } else{ ?>
                <li><b>Área útil:</b> <?php echo $row_imovel["AREA_IMOVEL"];?> ha</li>
                <?php }; ?>
                <?php if($tipo=='A' or $tipo=='L' or $tipo=='C'){ ?>
                <li class="odd"><b>Quartos:</b> <?php echo $row_imovel["QUARTO_IMOVEL"];?></li>
                <li><b>Banheiros:</b> <?php echo $row_imovel["BANHEIRO_IMOVEL"];?></li>
                <li class="odd"><b>Vagas:</b> <?php echo $row_imovel["GARAGEM_IMOVEL"];?></li>
                <?php }; ?>
                <?php if($tipo=='A' or $tipo=='L'){ ?><li><b>Condomínio:</b> <?php echo $row_imovel["CONDOMINIO_IMOVEL"];?></li><?php }; ?>
            </ul>
            <br style="clear:both;" />
	    <br style="clear:both;" />
            <a href="agendar.php?id=<?php echo $row_imovel["ID_IMOVEL"]; ?>" class="button-agendar">AGENDE UMA VISITA</a>
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
