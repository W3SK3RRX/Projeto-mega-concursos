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
		<h1>Disciplinas</h1>
		<h3>Lista de Disciplinas</h3>
		<br>
		<table border="1">
			<thead>
				<th>Id</th>
				<th>Nome</th>
				<th>Descrição</th>
				<th>Professor</th>
			</thead>
			<tbody>
				<?php

				$sql = "SELECT * FROM disciplina";
				$resultado = mysqli_query($connect, $sql);
				if(mysqli_num_rows($resultado)>0):
					while ($dados = mysqli_fetch_array($resultado)):?>
					<tr>
						<th><?php echo $dados['id_disciplina']; ?></th>
						<th><?php echo $dados['nome']; ?></th>
						<th><?php echo $dados['descricao']; ?></th>
					<?php
						$sql1 = "SELECT professor.nome from disciplina INNER JOIN professor on disciplina.id_professor = professor.id_professor";
						$resultado1 = mysqli_query($connect, $sql1);
						while($dados1 = mysqli_fetch_array($resultado1)){ ?>
							<th><?php echo $dados1['nome']; ?></th>
						<?php } ?>
					</tr>
				<?php
				endwhile;
				else:?>
				<tr>
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
		<a href="cadastros/cadastroDisciplina.php"><button class="button">Cadastrar Disciplina</button></a>
	</div>
</div>

<br>
<br>

<footer>
	<h1>Ômega Concursos</h1>
</footer>

</body>
</html>