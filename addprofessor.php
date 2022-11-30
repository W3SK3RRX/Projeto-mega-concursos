<?php

session_start();

require_once 'db_connect.php';

if(isset($_POST['cadastraProfessor'])):
	$id = mysqli_escape_string($connect, $_POST['id']);
	$nome = mysqli_escape_string($connect, $_POST['nome']);
	$email = mysqli_escape_string($connect, $_POST['email']);
	$telefone = mysqli_escape_string($connect, $_POST['telefone']);

	if(empty($id) && empty($nome) && empty($email) && empty($telefone)):
		echo '<script>alert("Preencha os campos corretamente!")</script>';
	else:
		$sql = "INSERT INTO professor (id_professor, nome, email, telefone) VALUES ('$id','$nome', '$email', '$telefone')";
		if(mysqli_query($connect, $sql)):
			echo '<script>alert("Cadastrado com sucesso!");</script>';
			header('Location: ../professores.php');
		else:
			echo '<script>alert("Erro ao cadastrar!")</script>';
			header('Location: ../professores.php');
		endif;
	endif;
endif;
?>