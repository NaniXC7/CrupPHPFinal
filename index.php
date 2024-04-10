<?php 
include_once("templates/header.php");
include_once("conexion.php");

session_start();

if(empty($_SESSION['active'])){
    header('location: login.php');
}


require_once ("conexion.php");
$query = mysqli_query($conexion, "SELECT p.idpersonas, p.nombre, p.telefono, p.fechaNacimiento, p.correo, d.departamento, m.municipio from personas p
                                  INNER JOIN departamentos d
                                  ON p.iddepartamentos = d.iddepartamentos
                                  INNER JOIN municipio m
                                  ON p.idmunicipio = m.idmunicipio");

if(isset($_GET['idpersona'])){
    $txtid = $_GET['idpersona'];

    $queryDelete = $conexion -> query("DELETE FROM personas WHERE idpersonas = '$txtid'");
    header("location:index.php");
}


?>


<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
Nuevo</button>
<a href="API/Consumiendo.php" class = "btn btn-secondary">API</a>



<br><br>

<div
    class="table-responsive"
>
    <table
        class="table"
    >
        <thead class = "table table-dark">
            <tr>
            <th scope="col">Nombre</th>
                <th scope="col">Telefono</th>
                <th scope="col">Fecha</th>
                <th scope="col">Correo</th>
                <th scope="col">Departamento</th>
                <th scope="col">Municipio</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php while($datos = mysqli_fetch_array($query)){?>
            <tr class="">
                <td scope="row"><?php echo $datos['nombre']?></td>
                <td><?php echo $datos['telefono']?></td>
                <td><?php echo $datos['fechaNacimiento']?></td>
                <td><?php echo $datos['correo']?></td>
                <td><?php echo $datos['departamento']?></td>
                <td><?php echo $datos['municipio']?></td>
                <td>
                    <a href="modulos/contactos/editar.php?idpersona=<?php echo $datos['idpersonas']; ?>"" class = "btn btn-success" >Editar</a>
                    <a href="index.php?idpersona=<?php echo $datos['idpersonas']; ?>" class = "btn btn-danger" >Eliminar</a>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>




<?php 
include_once("modulos/contactos/crear.php");
include_once("templates/footer.php");
?>

