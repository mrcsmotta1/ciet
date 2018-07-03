<?php

class Funcoes{
	public $email;
	public $login;


	public function verificaSeJaExiste($dados){

		$this->email = $dados['email'];
		$this->login = $dados['login'];

		//diretorio onde o arquivo txt esta
		$dir = $_SERVER['DOCUMENT_ROOT'] . '/testes/teste4/dados/registros.txt';
		$arquivo = fopen ($dir, 'r'); //Abre o arquivo apenas como leitura
		$jaInseridos = array();
		$existeLogin = false;
		$existeEmail = false;

		//Pego o array dos dados inseridos unserialize
	 $jaInseridos = unserialize(file_get_contents($dir));
	 if(!empty($jaInseridos)){
		 	foreach ($jaInseridos as $key => $value) {
				foreach ($value as $item => $conteudo) {
					if($item == 'email' && $conteudo == $this->email){//Verifico se o emaail enviado existe no txt
				  			$existeEmail = true;
					}
					if($item == 'login' && $conteudo == $this->login){//Verifico se o login enviado existe no txt
								$existeLogin = true;
					}
				}
			}

	 }

	 //se o email e login não existem no txt, e houver dados fao a chamada para inserir dados
	 if($existeLogin == false && $existeEmail == false && isset($dados)){
	 		$rs = $this->insereDados($dados, $jaInseridos);
 	  	return $rs;
		}else{
			//Caso o email, login j existe, retorno o erro
			if($existeLogin == true && $existeEmail == true) return 'existeLogin&Email';
			if($existeEmail == true) return 'existeEmail';
			if($existeLogin == true) return 'existeLogin';
		}

	}

	public function insereDados($dados, $jaInseridos){
				//verifico se o txt ja tem conteudo
				if($jaInseridos){
					array_unshift($jaInseridos, $dados);//Sehouver conteudo, insiro o novo conteudo no começo do array
				}else{
					$jaInseridos [0]= $dados;
				}

				//diretorio onde esta o txt
				$dir = $_SERVER['DOCUMENT_ROOT'] . '/testes/teste4/dados/registros.txt';
				$insere = file_put_contents($dir, serialize($jaInseridos));//Insito os dados em um array serialize

				if($insere) return 'dadosOk';//retorno se o insert foi ok
				else return 'erroDados';//retorno caso tenha dado erro no insert
	}

}
