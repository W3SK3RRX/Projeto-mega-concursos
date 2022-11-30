<?php

include_once 'php/db_connect.php';

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/x-icon" href="assets/img/Concursos.png">
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
	<link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,600;1,200;1,400;1,600&display=swap"
      rel="stylesheet"
    />
	<title>Ômega Concursos</title>
</head>
<body>

<nav>
    <a href="index.php"><h1>Ômega Concursos</h1></a>
</nav>
<br>
<br>
<br>

<div class="row">
	<div class="card_auto">
		<h1>Alunos</h1>
		<h3>Lista de Alunos Cadastrados</h3>
		<br>
		<table border="1">
			<thead>
				<th>Matrícula</th>
				<th>Nome do Aluno</th>
				<th>Email do Aluno</th>
				<th>Telefone do Aluno</th>
				<th>Curso</th>
			</thead>
			<tbody>
				<?php

				$sql = "SELECT * FROM Aluno";
				$resultado = mysqli_query($connect, $sql);
				if(mysqli_num_rows($resultado)>0):
					while ($dados = mysqli_fetch_array($resultado)):
				?>
				<tr>
					<th><?php echo $dados['matricula_aluno']; ?></th>
					<th><?php echo $dados['nome']; ?></th>
					<th><?php echo $dados['email']; ?></th>
					<th><?php echo $dados['telefone']; ?></th>
					<?php
						$sql1 = "SELECT curso.nome FROM aluno INNER JOIN curso on (aluno.id_curso_fk = curso.id_curso)";
						$resultado1 = mysqli_query($connect, $sql1);
						while($dados1 = mysqli_fetch_array($resultado1)){ ?>
							<th><?php echo $dados1['nome']; ?></th>
						<?php } ?>
					</tr>
				</tr>
				<?php
				endwhile;
				else:?>
				<tr>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
				</tr>
			<?php
			endif;
			?>
			</tbody>
		</table>
		<br>
		<a href="cadastros/cadastroAluno.php"><button class="button">Cadastrar Aluno</button></a>
		<a href="cadastros/consultarAluno.php"><button class="button">Consultar Aluno</button></a>
	</div>
</div>

<br>
<br>

<footer>
	<h1>Ômega Concursos</h1>
</footer>

</body>
</html>