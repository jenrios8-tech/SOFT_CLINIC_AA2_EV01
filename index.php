<?php
require_once __DIR__ . '/medico.php';
require_once __DIR__ . '/consultorio.php';
require_once __DIR__ . '/medicamento.php';
$opciones = [
    'Medico' => ['clase' => 'Medico', 'campos' => ['identificacion', 'nombres', 'apellidos', 'especialidad', 'telefono', 'correo']],
    'Consultorio' => ['clase' => 'Consultorio', 'campos' => ['codigo', 'nombre', 'ubicacion', 'capacidad', 'estado']],
    'Medicamento' => ['clase' => 'Medicamento', 'campos' => ['codigo', 'nombre', 'presentacion', 'concentracion', 'cantidad', 'fechaVencimiento']],
 ];
$tipo = $_POST['tipo'] ?? $_GET['tipo'] ?? 'Medico';
if (!isset($opciones[$tipo])) $tipo = 'Medico';
$accion = $_POST['accion'] ?? '';
$mensaje = '';
$registros = [];
try {
    $obj = new $tipo();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($accion === 'crear' || $accion === 'actualizar') {
            foreach ($opciones[$tipo]['campos'] as $campo) {
                $setter = 'set' . ucfirst($campo);
                $obj->$setter(trim((string)($_POST[$campo] ?? '')));
            }
        }
        $id = (int)($_POST['id'] ?? 0);
        
if ($accion === 'crear') {
    $metodo = 'agregar' . $tipo;
    $mensaje = $obj->$metodo()
        ? 'Registro creado.'
        : 'No se pudo crear.';
}

if ($accion === 'actualizar') {
    $metodo = 'actualizar' . $tipo;
    $mensaje = $obj->$metodo($id)
        ? 'Actualización ejecutada.'
        : 'No se pudo actualizar.';
}

if ($accion === 'eliminar') {
    $metodo = 'eliminar' . $tipo;
    $mensaje = $obj->$metodo($id)
        ? 'Eliminación ejecutada.'
        : 'No se pudo eliminar.';
}

if ($accion === 'consultar') {
    $metodo = 'consultar' . $tipo;
    $fila = $obj->$metodo($id);
    $registros = $fila ? [$fila] : [];
    $mensaje = $fila
        ? 'Consulta realizada.'
        : 'No se encontró el registro.';
}


if ($accion !== 'consultar') {
    $metodo = 'listar' . $tipo;
    $registros = $obj->$metodo();
}

} // Cierra el if del POST

} catch (Throwable $e) {
    $mensaje = 'Error: ' . $e->getMessage();
}

function esc($v): string {
    return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8');
}
?>
<!doctype html><html lang="es"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>SOFT CLINIC - Pruebas CRUD</title><link rel="stylesheet" href="estilos.css"></head><body>
<main><h1>SOFT CLINIC</h1><p>Formulario de pruebas de las tres clases nuevas</p>
<nav><?php foreach(array_keys($opciones) as $nombre): ?><a href="?tipo=<?= esc($nombre) ?>"><?= esc($nombre) ?></a><?php endforeach; ?></nav>
<h2><?= esc($tipo) ?></h2><p role="status"><?= esc($mensaje) ?></p>
<form method="post"><input type="hidden" name="tipo" value="<?= esc($tipo) ?>">
<label>ID para consultar, actualizar o eliminar <input type="number" min="1" name="id"></label>
<?php foreach($opciones[$tipo]['campos'] as $campo): ?><label><?= esc(ucfirst($campo)) ?>
<input name="<?= esc($campo) ?>" <?= $campo === 'fechaVencimiento' ? 'type="date"' : 'type="text"' ?>></label><?php endforeach; ?>
<div class="acciones"><button name="accion" value="crear">Registrar</button><button name="accion" value="consultar">Consultar ID</button><button name="accion" value="actualizar">Actualizar ID</button><button name="accion" value="eliminar" onclick="return confirm('¿Eliminar registro?')">Eliminar ID</button></div></form>
<h2>Resultados</h2><div class="tabla"><table><thead><tr><?php if($registros) foreach(array_keys($registros[0]) as $campo): ?><th><?= esc($campo) ?></th><?php endforeach; ?></tr></thead>
<tbody><?php foreach($registros as $fila): ?><tr><?php foreach($fila as $valor): ?><td><?= esc($valor) ?></td><?php endforeach; ?></tr><?php endforeach; ?></tbody></table></div>
</main></body></html>
