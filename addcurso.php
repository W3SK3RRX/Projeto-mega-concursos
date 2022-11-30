<?php

session_start();

require_once 'db_connect.php';

if(isset($_POST['cadastraCurso'])):
	$id = mysqli_escape_string($connect, $_POST['id']);
	$nome = mysqli_escape_string($connect, $_POST['nome']);
	$descricao = mysqli_escape_string($connect, $_POST['descricao']);

	if(empty($id) && empty($nome) && empty($descricao)){
		echo '<script>alert("Preencha os campos corretamente!")</script>';
	}
	else{
		foreach($_POST['disciplinas'] as $disciplina):
		$sql = "INSERT INTO curso (id_curso, nome, descricao) VALUES ('$id', '$nome', '$descricao')";
		$sql2 = "INSERT INTO curso_discplina (id_curso_fk, id_disciplina_fk) VALUES ('$id', ".$disciplina.")";
		if(mysqli_query($connect, $sql)){
			mysqli_query($connect, $sql2);
			header('Location: ../cursos.php');
		}
		else{
			echo 'erro';
		}
		endforeach;					
	}
endif;
?>