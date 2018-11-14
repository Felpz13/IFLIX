<?php

	// Cria uma variável de sessão "con", pois terá acesso global. 
	// Abre a conexão e armazena o objeto que representa esta conexão na variável global
	// Esta variável será referenciada em cada acesso ao banco de dados
	$_SESSION['con'] = mysqli_connect("localhost", "admin", "aluno","DB_SERIES");

	if (mysqli_connect_errno() != 0) 
	{
			$msg_erro = mysqli_connect_error();
			echo ("<p>Erro para conectar no Banco de Dados!</p>
				   <p>Mensagem de erro: $msg_erro</p>");
			return;
			
	}

	mysqli_query($_SESSION['con'],"SET NAMES 'utf8'");
	mysqli_query($_SESSION['con'],"SET character_set_connection=utf8");
	mysqli_query($_SESSION['con'],"SET character_set_client=utf8");
	mysqli_query($_SESSION['con'],"SET character_set_results=utf8");

   
  


	function inserir($nome, $genero, $censura, $temp, $desc)	
    {
		$sql = "INSERT into db_series (NOME, GENERO, CENSURA, TEMPORADAS, DESCRICAO) values ('$nome', '$genero', '$censura', '$temp', '$desc')";

		if(mysqli_query($_SESSION['con'],$sql)) 
        {
			return true;
		}
	}

    function listar() {
		
		$sql = "SELECT * from db_series";		
		$return = mysqli_query($_SESSION['con'], $sql); # retorna registros (SELECT)
		$resultado = array();
		while($reg = mysqli_fetch_assoc($resultado))	
        {
			array_push($resultado, $reg);
		}
		return $resultado;
	}

	function buscar($argumentos) {
		
		$sql = "SELECT ID, NOME, GENERO, CENSURA, TEMPORADAS, DESCRICAO from db_series $argumentos";		
		$return = mysqli_query($_SESSION['con'], $sql); # retorna registros (SELECT)
		$resultado = array();
		while($reg = mysqli_fetch_assoc($resultado))	
        {
			array_push($resultado, $reg);
		}
		return $resultado;
	}

	function atualizar($nome, $genero, $censura, $temp, $desc, $id) {
		
		$sql = "UPDATE db_series SET $alteracoes $argumentos";			
		if(mysqli_query($_SESSION['con'],$sql)) {
			return true;
		}
	}

	function deletar($tabela, $argumentos) {
		$sql = "DELETE from $tabela $argumentos";

		if(mysqli_query($_SESSION['con'], $sql)) {
			return true;
		}
	}

?>
