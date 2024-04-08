<?php include("../../templates/header.php");?>

<?php

include("../../conexion.php");
$alert = "";

if(isset($_GET['idpersona'])){
  $txtid = $_GET['idpersona'];

  $queryPersona = $conexion -> query("SELECT * FROM personas WHERE idpersonas = '$txtid'");
  $datosPersona = mysqli_fetch_array($queryPersona);
  $nombre = $datosPersona['nombre'];
  $telefono = $datosPersona['telefono'];
  $fecha = $datosPersona['fechaNacimiento'];
  $correo = $datosPersona['correo'];
  $departamento = $datosPersona['iddepartamentos'];
  $municipio = $datosPersona['idmunicipio'];
}


    $querydtos = mysqli_query($conexion,"SELECT iddepartamentos, departamento FROM departamentos");

?>

<?php
     include("../../conexion.php");
$alert = "";

if($_POST){
    if(empty($_POST['nombre']) || empty($_POST['telefono']) || empty($_POST['fecha']) || empty($_POST['correo'])){
        $alert = "Todos los campos son requeridos";
    }else{
 
      $nombre = $_POST['nombre'];
      $telefono = $_POST['telefono'];
      $fecha = $_POST['fecha'];
      $correo = $_POST['correo'];
      $departamento = $_POST['departamentos'];
      $municipio = $_POST['municipio'];

 
      $queryCorreo = $conexion -> query("SELECT * FROM personas WHERE correo = '$correo' ");
      $resultadoq = mysqli_num_rows($queryCorreo);

      if($resultadoq > 0){
        $alert = "El correo ya existe";
      }else{
        
        $queryAdd = $conexion -> query("INSERT INTO `personas`(`nombre`, `telefono`, `fechaNacimiento`, `correo`, `iddepartamentos`, `idmunicipio`) 
        VALUES ('$nombre', '$telefono', '$fecha', '$correo', '$departamento', '$municipio')");
        header("location:index.php");
        
      }
        

    }
    
    

}
    $querydtos = mysqli_query($conexion,"SELECT iddepartamentos, departamento FROM departamentos");

    

?>


      </div>

      <form action="" method="post">
      <div class="modal-body">

        <label>Nombre</label>
        <input type="text" class = "form-control" placeholder = "Ingresa el nombre" name = "nombre" id ="nombre" value ="<?php echo $nombre ?>" required>
        <label>Telefono</label>
        <input type="text" class = "form-control" placeholder = "Ingresa el telefono" name = "telefono" value ="<?php echo $telefono ?>" id ="telefono" required>
        <label>Fecha de Nacimiento</label>
        <input type="date" class = "form-control" placeholder = "Ingresa la fecha" name = "fecha" value ="<?php echo $fecha ?>" id ="fecha" required>
        <label>Correo</label>
        <input type="email" class = "form-control" placeholder = "Ingresa el correo" value ="<?php echo $correo ?>" name = "correo" id ="correo" required >
        <label>Departamento</label>
        <select class ="form-control" name="departamentosEdit" id ="departamentosEdit" value ="<?php echo $departamento ?>" required> 
            <?php
                while($dptos = mysqli_fetch_array($querydtos)){?>
                    <option value="<?php echo $dptos['iddepartamentos']?>"><?php echo $dptos['departamento'] ?></option>
                <?php }?>
        </select>
        <label>Municipio</label>
        <select class ="form-control" name="municipioEdit" id="municipioEdit" value ="<?php echo $municipio ?>" required>
            
        </select> 
        


        </div>
        <div class="modal-footer">
          <a href="../../index.php" class = "btn btn-danger">Cancelar</a>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
      <script src="js/peticionesEdit.js"></script>




<?php include("../../templates/footer.php");?>