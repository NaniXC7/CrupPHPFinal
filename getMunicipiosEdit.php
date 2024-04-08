<?php 

require("conexion.php");

$idDepartamento = $conexion -> real_escape_string($_POST['id_departamento']);

$querymuni = $conexion->query("SELECT idmunicipio, municipio FROM municipio WHERE departamentos_iddepartamentos	 = '$idDepartamento' ORDER BY municipio ASC");

$respuesta = "<option value '' >Seleccionar</option>";

while($municipio = $querymuni -> fetch_assoc()){
    $respuesta .= "<option value = '".$municipio['idmunicipio']."' >".$municipio['municipio']."</option>";
}

echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);

?>