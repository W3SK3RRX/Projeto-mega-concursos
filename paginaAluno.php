<?php

require_once '../php/db_connect.php';

if(isset($_POST['consultarDadosAluno'])):
	$matricula = mysqli_escape_string($connect, $_POST['matricula']);

	if($matricula == null):
		header('Location: paginaAluno.php');
		echo "'<script>alert('Aluno não encontrado');</script>";
	else:
		$sql = "SELECT * FROM aluno WHERE matricula_aluno = '$matricula'";
		$resultado = mysqli_query($connect, $sql);
		$dados = mysqli_fetch_array($resultado);		
	endif;
endif;
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/x-icon" href="assets/img/Concursos.png">
	<link rel="stylesheet" type="text/css" href="../assets/css/styles.css">
	<link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,600;1,200;1,400;1,600&display=swap"
      rel="stylesheet"
    />
	<title>Ômega Concursos</title>
</head>
<body>

<nav>
    <a href="../index.php"><h1>Ômega Concursos</h1></a>
</nav>

<br>
<br>
<br>

<div class="row">
	<div class="card_auto">
		<h1>Dados do aluno</h1>
		<br>
		<p>Nome: <?php echo $dados['nome']; ?></p>
		<p>Matrícula: <?php echo $dados['matricula_aluno']; ?></p>
		<p>Email: <?php echo $dados['email']; ?></p>
		<p>Telefone: <?php echo $dados['telefone']; ?></p>
		<p>
			<label>Cursos em que o aluno está matriculado</label><br>
			<?php 

			$sql2 = "SELECT curso.nome FROM aluno INNER JOIN curso ON (aluno.id_curso_fk = curso.id_curso)";

			$resultado2 = mysqli_query($connect, $sql2);
			while($dados2 = mysqli_fetch_array($resultado2)){?>
				<p><?php echo $dados2['nome']; ?></p>
			<?php } ?>
			
		</p>
	</div>
</div>

<br>
<br>

<footer>
	<h1>Ômega Concursos</h1>
</footer>

</body>
</html>