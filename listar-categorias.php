<?php
	require_once 'conexao.php';
	//busca linhas da tabela tipos
	$sql = "SELECT * FROM categorias ORDER BY nome";
	$resultado = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Listar Categorias</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="loja.css">
</head>
<body>
	<header class="container">
		<div class="row">
			<a href="index.php">
				<span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home
			</a>
			<h3>Listar Categorias no Sistema</h3>
			<hr>

			<?php if(isset($_GET['sucesso'])): ?>
				<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close"
					data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
					<?php echo $_GET['sucesso']; ?>
				</div>
			<?php endif; ?>

			<a href="form-categoria.php" class="btn btn-success botao-new">+ Adicionar uma nova Categoria</a>
		</div> <!-- end row -->
	</header> <!-- end header -->

	<section class="container">
		<div class="row">

			<table class="table table-striped">
				<tr>
					<th>ID</th>
					<th>Nome</th>
					<th>Descrição</th>
					<th>Estado</th>
					<th>Ações</th>
				</tr>

				<?php
				// começo do loop while
				while ($categoria = mysqli_fetch_object($resultado)) { ?>
					<tr>
						<td><?php echo $categoria->id ?></td>
						<td><?php echo $categoria->nome ?></td>
						<td><?php echo $categoria->descricao ?></td>
						<td><?php echo $categoria->estado ?></td>
						<td>
							<div class="btn-group">
								<a href='editar-categoria.php?id=<?php echo $categoria->id ?>'
									class='btn btn-info btn-xs'>
									Editar
								</a>
								<a href='excluir-categoria.php?id=<?php echo $categoria->id ?>'
										class='btn btn-danger btn-xs'>
										Excluir
								</a>
							</div>
						</td>
					</tr>
				<?php } // fim do loop while ?>
				</table>
			</div>  <!-- end row -->
		</section> <!-- end section -->

		<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</body>
</html>
