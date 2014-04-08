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
$re = mysql_query("select * from estados order by estado");
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

	
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>RVC Imobiliária - A certeza de um negócio seguro</title>
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link type="text/css" href="jquery-ui.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
    <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.js'></script>  
     <script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>   
	<script>
			$(document).ready(
				function (){
					$( "#data" ).datepicker({ 
						dayNamesMin: [ "Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab" ],
						minDate: +1,
						monthNames: [ "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro" ],
						dateFormat: "dd/mm/yy"
						
					});
				});
		</script>	
</head>

<body style="background:#fff;">
	
        <div id='agendar' style='padding:10px; background:#fff;'>
        <form action="" method="post" enctype="multipart/form-data" class="contato">            
            <?php
            if (isset($_POST['enviar']) && $_POST['enviar'] == 'send') {
            
             $nome = strip_tags(trim($_POST['nome']));
             $fone = strip_tags(trim($_POST['fone']));
			 $email = strip_tags(trim($_POST['email']));
             $data = strip_tags(trim($_POST['data']));
			 $hora = strip_tags(trim($_POST['hora']));
			
            
             if(empty($nome)) {
             $retorno = '<span>Informe seu nome</span>';
             }elseif (empty($fone)) {
             $retorno = '<span>Informe seu telefone</span>';
			 }elseif (empty($email)) {
             $retorno = '<span>Informe seu e-mail</span>';
             }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
             $retorno = '<span>Informe um e-mail válido</span>';
             }elseif (empty($data)) {
             $retorno = '<span>Escolha uma data para a visita!</span>';
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
            $assunto_da_mensagem_original="Agendamento de visita RVC Imobiliaria";
            
            // FORMA COMO RECEBERÁ O E-MAIL (FORMULÁRIO)
            // ******** OBS: SE FOR ADICIONAR NOVOS CAMPOS, ADICIONE OS CAMPOS NA VARIÁVEL ABAIXO *************
            
			$idimovel = $row_imovel["ID_IMOVEL"];
			$cidadeimovel = $row_imovel["CIDADE_IMOVEL"];
			$bairroimovel = $row_imovel["BAIRRO_IMOVEL"];
			$valorimovel = $row_imovel["VALOR_IMOVEL"];
		     
			
			$configuracao_da_mensagem_original="
            
            AGENDADO POR:\n
            Nome: $nome\n
            Telefone: $fone\n
		    E-mail: $email\n\n
            Data da Visita: $data\n
			Horário da Visita: $hora\n
			
			DADOS DO IMOVÉL:\n
            ID: $idimovel\n
            Cidade: $cidadeimovel\n
		    Bairro: $bairroimovel\n
            Valor: $valorimovel\n
            
            ENVIADO EM: $date";
            
            //CONFIGURAÇÕES DA MENSAGEM DE RESPOSTA
            // CASO $assunto_digitado_pelo_usuario="s" ESSA VARIAVEL RECEBERA AUTOMATICAMENTE A CONFIGURACAO
            // "Re: $assunto"
            $assunto_da_mensagem_de_resposta = "Confirmação";
            $cabecalho_da_mensagem_de_resposta = "From: $nome_do_site <$email_para_onde_vai_a_mensagem>\n";
            $configuracao_da_mensagem_de_resposta="Obrigado por agendar uma visita!\nEntraremos em contato para confirmar sua visita em breve...\nAtenciosamente,\n$nome_do_site\n\nEnviado em: $date";
            
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
            echo "<span class=\"yes\">Sua visita foi agendada com suscesso, Entraremos em contato o mais breve possivel!</span>";
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
             <li style="float:left;">
             <label>
             <span>Data:</span><br />
             <input type="text" name="data" id="data" style="width:100px;"/>
             </label>
             </li>
             <li  style="float:left; margin-left:20px;">
             <label>
             <span>Horário:</span><br />
             <select name="hora"  style="width:100px;">
             	<option value="10:00">10:00</option>
                <option value="10:30">10:30</option>
                <option value="11:00">11:00</option>
                <option value="11:30">11:30</option>
                <option value="13:00">13:00</option>
                <option value="13:30">13:30</option>
                <option value="14:00">14:00</option>
                <option value="14:30">14:30</option>
                <option value="15:00">15:00</option>
                <option value="15:30">15:30</option>
                <option value="16:00">16:00</option>
                <option value="16:30">16:30</option>
                <option value="17:00">17:00</option>
                <option value="17:30">17:30</option>
             </select>
             </label>
             </li>
             
             <li  style="clear:both;"><br />
             <input type="hidden" name="enviar" value="send" />
             <input type="submit" name="Enviar" value="Agendar" class="button-form" href="#agendar"/>
             </li>
             </ul>
            </form>
        </div>

</body>
</html>
