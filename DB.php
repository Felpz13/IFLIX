<?php

	// Cria uma variável de sessão "con", pois terá acesso global. 
	// Abre a conexão e armazena o objeto que representa esta conexão na variável global
	// Esta variável será referenciada em cada acesso ao banco de dados
	$_SESSION['con'] = mysqli_connect("localhost", "admin", "aluno","db_series");

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

   
  


	function inserir($nome, $genero, $censura, $temp, $desc, $img, $video)	
    {
		$sql = "INSERT INTO tb_series (NOME, GENERO, CENSURA, TEMPORADAS, DESCRICAO, FOTO, TRAILER) VALUES ('".$nome."', '".$genero."', '".$censura."', '".$temp."', '".$desc."', '".$img."', '".$video."')";

		if(mysqli_query($_SESSION['con'],$sql)) 
        {
			return true;
		}
	}

    function listar($genero) {
        
        if($genero == "Todos os Generos") $sql = "SELECT * FROM tb_series";
        else $sql = "SELECT * FROM tb_series WHERE GENERO = '".$genero."'";		
		$retorno = mysqli_query($_SESSION['con'], $sql); # retorna registros (SELECT)
		$lista = array();
		while($reg = mysqli_fetch_assoc($retorno))	{
			array_push($lista, $reg);
		}
		return $lista;
	}

	function buscarCod($cod) {
		
		$sql = "SELECT * FROM tb_series WHERE CODIGO = '".$cod."'";		
		$retorno = mysqli_query($_SESSION['con'], $sql); # retorna registros (SELECT)
		$lista = array();
		while($reg = mysqli_fetch_assoc($retorno))	{
			array_push($lista, $reg);
		}
		return $lista;
	}

    function buscarNome($nome) {
		
		$sql = "SELECT * FROM tb_series WHERE NOME = '".$nome."'";		
		$retorno = mysqli_query($_SESSION['con'], $sql); # retorna registros (SELECT)
		$lista = array();
		while($reg = mysqli_fetch_assoc($retorno))	{
			array_push($lista, $reg);
		}
		return $lista;
	}

	function atualizar($nome, $genero, $censura, $temp, $desc, $img, $video, $id) {
		
		$sql = "UPDATE tb_series SET NOME='".$nome."', GENERO='".$genero."', CENSURA='".$censura."', TEMPORADAS='".$temp."', DESCRICAO='".$desc."', FOTO='".$img."', TRAILER='".$video."' WHERE CODIGO = ".$id."";			
		if(mysqli_query($_SESSION['con'],$sql)) {
			return true;
		}
	}

	function deletar($cod) {
		$sql = "DELETE from tb_series WHERE CODIGO = '".$cod."'";	

		if(mysqli_query($_SESSION['con'], $sql)) {
			return true;
		}
	}

?>
