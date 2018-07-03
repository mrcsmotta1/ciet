<?php

function foiMordido()
{
	//Gera um booleano aleatório
	$random = rand(0,1);
	
	//inicio a variavel vazia, pra não trazer resultado antigo
	$texto = "";
	
	
	//verifico o resultado do rand
	if($random == 0){
		$texto = "Joãozinho NÃO mordeu o seu dedo !";
	}else{
		$texto = "Joãozinho <b style='color:red;'>mordeu</b> o seu dedo !";
	}
	
	return $texto;
	
}