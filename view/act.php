<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Prueba ITop</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
</head>

<body>

	<div class="p-5">
		<h2>Prueba ITop - Actividades</h2>
		<hr>
		<form>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text" for="sel_act_id">Id</span>
				</div>
				<select class="custom-select" id="sel_act_id">
					<?php foreach ($act_ids as $act_id) {
						echo '<option class="text-dark" value="' . $act_id . '" ';
						if ($act_id == $id) echo 'selected';
						echo '>' . $act_id . ' </option>';
					} ?>
				</select>
			</div>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-name">Nombre</span>
				</div>
				<input type="text" class="form-control" aria-describedby="basic-name" id="input_nombre" value="<?php echo $select['nombre'] ?>">
				<input type="hidden" id="input_h_nombre" value="<?php echo $select['nombre'] ?>">
			</div>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-date">Fecha</span>
				</div>
				<input type="date" class="form-control" aria-describedby="basic-date" id="input_fecha" value="<?php echo $select['fecha'] ?>">
				<input type="hidden" id="input_h_fecha" value="<?php echo $select['fecha'] ?>">
			</div>
			<div class="btn-group" role="group" aria-label="Basic example">
				<button type="button" class="btn btn-outline-info" id="create_act">Crear</button>
				<button type="button" class="btn btn-outline-warning" id="update_act">Actualizar</button>
				<button type="button" class="btn btn-outline-danger" id="delete_act">Borrar</button>
			</div>
		</form>

	</div>

	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<script src="../js/act.js"></script>

</body>

</html>