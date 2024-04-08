
<?php
     require_once "conexion.php";
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

<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nuevo Contacto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="" method="post">
      <div class="modal-body">

        <label>Nombre</label>
        <input type="text" class = "form-control" placeholder = "Ingresa el nombre" name = "nombre" id ="nombre" required>
        <label>Telefono</label>
        <input type="text" class = "form-control" placeholder = "Ingresa el telefono" name = "telefono" id ="telefono" required>
        <label>Fecha de Nacimiento</label>
        <input type="date" class = "form-control" placeholder = "Ingresa la fecha" name = "fecha" id ="fecha" required>
        <label>Correo</label>
        <input type="email" class = "form-control" placeholder = "Ingresa el correo" name = "correo" id ="correo" required>
        <label>Departamento</label>
        <select class ="form-control" name="departamentos" id ="departamentos" required> 
            <option value="">Seleccionar</option>
            <?php
                while($dptos = mysqli_fetch_array($querydtos)){?>
                    <option value="<?php echo $dptos['iddepartamentos']?>"><?php echo $dptos['departamento'] ?></option>
                <?php }?>
        </select>
        <label>Municipio</label>
        <select class ="form-control" name="municipio" id="municipio" required>
            <option value="">Seleccionar</option>
            
        </select> 
        


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
      <script src="js/peticiones.js"></script>
    </div>
  </div>
</div>




