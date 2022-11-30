<?php

session_start();

require_once 'db_connect.php';

if(isset($_POST['cadastraCurso'])):

	$matricula = mysqli_escape_string($connect, $_POST['matricula']);
	$nome = mysqli_escape_string($connect, $_POST['nome']);
	$email = mysqli_escape_string($connect, $_POST['email']);
	$telefone = mysqli_escape_string($connect, $_POST['telefone']);
	$id_curso = mysqli_escape_string($connect, $_POST['curso']);

	if(empty($matricula) && empty($nome) && empty($email) && empty($telefone) && empty($id_curso)):
		echo '<script>alert("Preencha os campos corretamente!")</script>';
	else:
		$sql = "INSERT INTO aluno (matricula_aluno, nome, email, telefone, id_curso_fk) VALUES ('$matricula', '$nome', '$email', '$telefone', '$id_curso')";

		if (mysqli_query($connect, $sql)){
			header('Location: ../alunos.php');
		}
		else{
			echo 'erro';
		}

	endif;

endif;

?>