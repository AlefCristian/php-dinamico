<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<div id="page_content">
<div id="page_content"> 
    <div id="sidebar">
        <?php include"sidebars/sidebars.php";?>
    </div>
    <div id="page">
        <h1>Fale Conosco</h1>
        <h2>O que está esperando? Venha conhecer os melhores cursos do Brasil!</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a erat venenatis augue egestas dapibus id a metus. Curabitur quis mollis augue. Phasellus pretium porttitor pharetra.</p>
        
           
        
            <form method="post" action="" name="contato">
                <?php
                if(isset($_POST['envio']) && $_POST['envio'] == 'send'){
                $nome =     strip_tags(trim($_POST['nome']));
                $email =    strip_tags(trim($_POST['email']));
                $telefone =    strip_tags(trim($_POST['telefone']));
                $assunto =  strip_tags(trim($_POST['assunto']));
                $mensagem = strip_tags(trim($_POST['mensagem']));

		
	
//<input type="hidden" name="enviar" value="send" />

$date = date("d/m/Y h:i");

// ****** ATENÇÃO ********
// ABAIXO ESTÁ A CONFIGURAÇÃO DO SEU FORMULÁRIO.
// ****** ATENÇÃO ********

//CABEÇALHO - ONFIGURAÇÕES SOBRE SEUS DADOS E SEU WEBSITE
$nome_do_site="UpInside";
$email_para_onde_vai_a_mensagem = "alef_cristian@yahoo.com.br";
$nome_de_quem_recebe_a_mensagem = "UpInside";
$exibir_apos_enviar='index.php?pagina=nav/enviado';

//MAIS - CONFIGURAÇOES DA MENSAGEM ORIGINAL
$cabecalho_da_mensagem_original="From: $name <$email>\n";
$assunto_da_mensagem_original="Fale com UpInside";

// FORMA COMO RECEBERÁ O E-MAIL (FORMULÁRIO)
// ******** OBS: SE FOR ADICIONAR NOVOS CAMPOS, ADICIONE OS CAMPOS NA VARIÁVEL ABAIXO *************
$configuracao_da_mensagem_original="

ENVIADO POR:\n
Nome: $nome\n
E-mail: $email\n
Assunto: $assunto\n
Telefone: $telefone\n\n
Mensagem: $mensagem\n\n

ENVIADO EM: $date";

//CONFIGURAÇÕES DA MENSAGEM DE RESPOSTA
// CASO $assunto_digitado_pelo_usuario="s" ESSA VARIAVEL RECEBERA AUTOMATICAMENTE A CONFIGURACAO
// "Re: $assunto"
$assunto_da_mensagem_de_resposta = "Recebemos seu e-mail";
$cabecalho_da_mensagem_de_resposta = "From: $nome_do_site <$email_para_onde_vai_a_mensagem>\n";
$configuracao_da_mensagem_de_resposta="Obrigado por entrar em contato!\nEstaremos respondendo em breve...\nAtenciosamente,\n$nome_do_site\n\nEnviado em: $date";

// ****** IMPORTANTE ********
// A PARTIR DE AGORA RECOMENDA-SE QUE NÃO ALTERE O SCRIPT PARA QUE O  SISTEMA FINCIONE CORRETAMENTE
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

echo "<script>window.location='$exibir_apos_enviar'</script>";

} else {
	echo "$retorno";
  }
                
?>
                <fieldset>
                    <legend>Entre em contato</legend>
                    <span id="sprytextfield1">
                        <label> <span>Nome:</span>
                            <input name="nome" type="text" id="nome">
                        </label>
                        <span class="textfieldRequiredMsg">Informe seu nome.</span>
                    </span>
                    
                    <span id="sprytextfield2">
                        <label> 
                            <span>E-mail:</span>
                            <input name="email" type="text" id="email">
                        </label>
                        <span class="textfieldRequiredMsg">Informe seu email.</span>
                        <span class="textfieldInvalidFormatMsg">Informe um e-amil válido.</span>
                    </span>
                    
                    <span id="sprytextfield3">
                        <label>
                            <span>Telefone:</span>
                        <input name="telefone" type="text" id="telefone" />
                        </label>
                        <span class="textfieldRequiredMsg">Informe seu telefone.</span>
                        <span class="textfieldInvalidFormatMsg">Telefone é inválido.</span>
                    </span>
                    
                    <span id="sprytextfield4">
                        <label> <span>Assunto:</span>                        <input name="assunto" type="text" id="assunto">
                     </label>
                        <span class="textfieldRequiredMsg">Informe o Assunto.</span>
                    </span>
                    
                    <span id="sprytextarea1">
                        <label><span>Mensagem:</span>
                        <textarea name="mensagem" rows="5"></textarea>
                        <span id="countsprytextarea1">&nbsp;</span>
                    </label>
                    <span class="textareaRequiredMsg">Envie sua mensagem.</span><span class="textareaMaxCharsMsg">o Maximo são 500 caracteres.</span>
                    </span>
                    <input type="hidden" name="envio" value="send" />    
                    <input type="submit" name="Enviar" value="Enviar" class="contato_btn" />
                </fieldset>
        </form>        
    </div>
</div>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "email", {useCharacterMasking:true});
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3", "custom", {pattern:"(00) 0000-0000", useCharacterMasking:true});
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1", {maxChars:500, counterId:"countsprytextarea1", counterType:"chars_remaining"});
//-->
</script>