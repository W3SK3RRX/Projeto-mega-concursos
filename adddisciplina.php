<?php

session_start();

require_once 'db_connect.php';

if(isset($_POST['cadastraDisciplina'])):
	$id = mysqli_escape_string($connect, $_POST['id']);
	$nome = mysqli_escape_string($connect, $_POST['nome']);
	$descricao = mysqli_escape_string($connect, $_POST['descricao']);
	$id_professor = mysqli_escape_string($connect, $_POST['professor']);

	if(empty($id) && empty($nome) && empty($descricao) && empty($id_professor)):
		echo '<script>alert("Preencha os campos corretamente!")</script>';
	else:	
		$sql = "INSERT INTO disciplina (id_disciplina, nome, descricao, id_professor) VALUES ('$id','$nome', '$descricao', '$id_professor')";
		if(mysqli_query($connect, $sql)):
			header('Location: ../disciplinas.php');
		else:	
			echo 'erro';
		endif;
	endif;
endif;
?>