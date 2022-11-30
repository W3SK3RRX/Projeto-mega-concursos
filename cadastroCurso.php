<?php

include_once '../php/db_connect.php';

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
		<h1>Cadastrar Curso</h1>
		<form action="../php/addcurso.php" method="POST">
			<input type="number" name="id" placeholder="Id do curso"><br>
			<input type="text" name="nome" placeholder="Nome da curso"><br>
			<input type="text" name="descricao" placeholder="Descrição do curso"><br>
			<br>
			<?php
    			$query = "SELECT * FROM disciplina";
    			$resultado = mysqli_query($connect, $query); 
    			while($dados = mysqli_fetch_array($resultado)) { ?>
    				<input type="checkbox" id="disciplinas" name="disciplinas[]" value="<?php echo $dados['id_disciplina'] ?>">
    				<label for="disciplinas"><?php echo $dados['nome'] ?></label>
 			<?php } ?>
			<br>
			<br>	
   			<div id="botao">
      			<input type="submit" name="cadastraCurso" value="Cadastrar" class="botaoEnviar"/>
   			</div>
		</form>
	</div>
</div>

<br>
<br>

<footer>
	<h1>Ômega Concursos</h1>
</footer>

</body>
</html>