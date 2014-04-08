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
$query_imovel = "SELECT * FROM IMOVEL WHERE STATUS_IMOVEL='A' AND DESTAQUE_IMOVEL='S' ORDER BY ID_IMOVEL DESC";
$imovel = mysql_query($query_imovel);

$row_imovel = mysql_fetch_assoc($imovel);
$totalrows_imovel = mysql_num_rows($imovel);



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>RVC Imobiliária - A certeza de um negócio seguro</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
	<link rel="stylesheet" type="text/css" href="wt-rotator.css"/>
	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.easing.1.3.min.js"></script>
    <script type="text/javascript" src="js/jquery.wt-rotator.min.js"></script>
	<script type="text/javascript">
    	$(document).ready(	
			function() {
				$(".container").wtRotator({
					width:850,
					height:430,
					thumb_width:24,
            		thumb_height:24,
					button_width:24,
					button_height:24,
					button_margin:5,
					auto_start:true,
					delay:5000,
					play_once:false,
					transition:"random",
					transition_speed:800,
					auto_center:true,
					easing:"",
					cpanel_position:"inside",
					cpanel_align:"BR",
					timer_align:"top",
					display_thumbs:true,
					display_dbuttons:true,
					display_playbutton:true,
					display_thumbimg:false,
           			display_side_buttons:false,
					display_numbers:true,
					display_timer:true,
					mouseover_select:false,
					mouseover_pause:false,
					cpanel_mouseover:false,
					text_mouseover:false,
					text_effect:"fade",
					text_sync:true,
					tooltip_type:"text",
					shuffle:false,
					block_size:75,
					vert_size:55,
					horz_size:50,
					block_delay:25,
					vstripe_delay:75,
					hstripe_delay:180			
				});
			}
		);
    </script>    
</head>

<body>
	<div id="root">
    	<div id="top">
        	<div id="logo"><a href="index.php"><img src="images/logo.gif" /></a></div>
            <?php /*?><a href="cadastro-imovel.php">Cadastrar Imovél</a><br />
			<a href="listar.php">Listar Usuarios</a><?php */?>
    		<div id="menu">
            	<ul>
                	<li><span>Início</span></li>
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
        	<div class="wt-rotator">
    	<div class="screen">
            <noscript>
            	<!-- placeholder 1st image when javascript is off -->
                <img src="images/rotate-img1.jpg"/>
            </noscript>
      	</div>
        <div class="c-panel">
      		<div class="thumbnails">
                <ul>
                    <li>
                    	<a href="images/rotate-img1.jpg" title="architecture">
                        <img src="images/thumbs/madness_arch2.jpg"/></a>
                        <a href="imovel.php?id=15" target="_self"></a>                        
                      
                    </li>
                    <li>
                    	<a href="images/rotate-img2.jpg" title="Lote - MG 230">
                        <img src="images/thumbs/madness_arch2.jpg"/></a>
                        <a href="imovel.php?id=14" target="_self"></a>                        
                      
                    </li>
                    <li>
                    	<a href="images/rotate-img3.jpg" title="architecture">
                        <img src="images/thumbs/madness_arch2.jpg"/></a>
                        <a href="imovel.php?id=9" target="_self"></a>                        
                      
                    </li>
                    <li>
                    	<a href="images/rotate-img4.jpg" title="architecture">
                        <img src="images/thumbs/madness_arch2.jpg"/></a>
                        <a href="imovel.php?id=4" target="_self"></a>                        
                      
                    </li>                    
              	</ul>
          	</div>     
  			<div class="buttons">
            	<div class="prev-btn"></div>
                <div class="play-btn"></div>    
            	<div class="next-btn"></div>               
            </div>
        </div>
    </div>
    <div id="grid-home">
    	<h1>Imóveis em Destaque</h1>
    	<ul>
            <?php do { $tipo = $row_imovel["TIPO_IMOVEL"];?>
        	<li>
            	<h3><?php echo $row_imovel["NOME_IMOVEL"];?> - <?php echo $row_imovel["BAIRRO_IMOVEL"];?></h3>
            	<a href="imovel.php?id=<?php echo $row_imovel["ID_IMOVEL"]; ?>"><img src="<?php echo $row_imovel["THUMB_IMOVEL"];?>" /></a>
                <div class="tabela">
                <h4>R$ <?php echo $row_imovel["VALOR_IMOVEL"]; ?></h4>
                <?php if($tipo=='A' or $tipo=='L' or $tipo=='C'){ ?>
                <div class="quarto"><?php echo $row_imovel["QUARTO_IMOVEL"]; ?></div>
                <div class="garagem"><?php echo $row_imovel["GARAGEM_IMOVEL"]; ?></div>
                <?php }; ?>
                <br style="clear:both;" />
                <?php if($tipo=='A' or $tipo=='L' or $tipo=='T' or $tipo=='C'){ ?>
                <h4 style="border-bottom:none; border-top:1px solid #CCC; padding-top:10px;">Área:<span style="font-weight:normal;"> <?php echo $row_imovel["AREA_IMOVEL"]; ?> m²</span></h4>
                <?php } else{ ?>
                <h4 style="border-bottom:none; border-top:1px solid #CCC; padding-top:10px;">Área:<span style="font-weight:normal;"> <?php echo $row_imovel["AREA_IMOVEL"]; ?> ha</span></h4>
                <?php }; ?>
                
                
                <a href="imovel.php?id=<?php echo $row_imovel["ID_IMOVEL"]; ?>"><span>Mais Detalhes</span><img src="images/grid-detalhes.gif" style="margin:0; float:right;" /></a>
                
              </div>
                <p><?php echo $row_imovel["MINIDESC_IMOVEL"];?></p>                
            </li>
            <?php } while($row_imovel = mysql_fetch_assoc($imovel)); ?>
                                  
        </ul>

         <br style="clear:both;"/> 
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
