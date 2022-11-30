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
		<h1>Cadastrar Disciplina</h1>
		<form action="../php/adddisciplina.php" method="POST">
			<input type="number" name="id" placeholder="Id da disciplina"><br>
			<input type="text" name="nome" placeholder="Nome da disciplina"><br>
			<input type="text" name="descricao" placeholder="Descrição da disciplina"><br>
			<select id="professor" name="professor">
    			<option value="">Professor da discplina</option>
    			<?php
    			$query = "SELECT * FROM professor";
    			$resultado = mysqli_query($connect, $query); 
    			while($dados = mysqli_fetch_array($resultado)) { ?>
    			<option value="<?php echo $dados['id_professor'] ?>"><?php echo $dados['nome'] ?></option>
 			<?php } ?>
  			</select>
			<br>
			<br>	
   			<div id="botao">
      			<input type="submit" name="cadastraDisciplina" value="Cadastrar" class="botaoEnviar"/>
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