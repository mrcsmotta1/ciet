<?php
error_reporting(-1);
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);

$dir = $_SERVER['DOCUMENT_ROOT'] . '/testes/teste4/';
require_once $dir.'classes/Funcoes.class.php';

if(isset($_POST['btnCadastrar'])){
	$_POST['senha'] = md5($_POST['senha']);
	unset($_POST['btnCadastrar']);
	$existe = new Funcoes();
	$verifica = $existe->verificaSeJaExiste($_POST);

	$msgOk = $msgErro = $msgNOk = '';
		if($verifica == 'dadosOk') $msgOk = '<div class="alert alert-success">Registro efetuado com sucesso.</div>';
		if($verifica == 'erroDados') $msgNOk = '<div class="alert alert-danger">Erro ao salvar dados.</div>';
		if($verifica == 'existeLogin&Email') $msgErro = '<div class="alert alert-info">Email e login já cadastrados!</div>';
		if($verifica == 'existeEmail') $msgErro = '<div class="alert alert-info">Email já cadastrado!</div>';
		if($verifica == 'existeLogin') $msgErro = '<div class="alert alert-info">login já cadastrado!</div>';
}
?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1"/>
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
      <!-- Optional theme -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
      <!-- Latest compiled and minified JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
			<script type="text/javascript" src="mask/mask.js"></script>
      <title>Teste 4</title>
   </head>
   <body>
      <div class="container">
         <div class="row">
            <h1> Cadastre-se</h1>
						<hr>
         </div>
				 <?php if(isset($msgOk)):
					 		print $msgOk;
						endif;
						if (isset($msgNOk)):
							print $msgNOk;
						endif;
							if (isset($msgErro)):
								print $msgErro;
				 endif;
				 ?>
         <div class="row">
            <form action="" name="cadastro" method="POST">
               <div class="form-group">
                  <label for="nome">Nome</label>
                  <input type="text" class="form-control" name="nome" id="nome" placeholder="Insira seu Nome" required>
               </div>
               <div class="form-group">
                  <label for="sobrenome">Sobrenome</label>
                  <input type="text" class="form-control" name="sobrenome" id="sobrenome" placeholder="Insira seu Sobrenome" required>
               </div>
               <div class="form-group">
                  <label for="email">Endereço de Email</label>
                  <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Insira seu email" required>
                  <small id="emailHelp" class="form-text text-muted">Nós nunca vamos compartilhar seu e-mail com mais ninguém.</small>
               </div>
               <div class="form-group">
                  <label for="tel">Telephone</label>
                  <input type="tel" class="form-control" name="tel" id="tel" placeholder="(11)5555-5555"  required>

							</div>
               <div class="form-group">
                  <label for="login">Login</label>
                  <input type="text" class="form-control" name="login" id="login" placeholder="Insira seu Login" required>
               </div>
               <div class="form-group">
                  <label for="exampleInputPassword1">Senha</label>
                  <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha" required>
               </div>
               <div class="form-group" align="center">
                  <button type="submit" class="btn btn-lg btn-success" name="btnCadastrar">
                  	<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Enviar dados
                  </button>
               </div>
            </form>
         </div>
      </div>
   </body>
</html>
