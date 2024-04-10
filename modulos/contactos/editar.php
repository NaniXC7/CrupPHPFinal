<?php include("../../templates/header.php");?>

<?php

include("../../conexion.php");
$alert = "";

if(isset($_GET['idpersona'])){
  $txtid = $_GET['idpersona'];

  $queryPersona = $conexion -> query("SELECT p.idpersonas, p.nombre, p.telefono, p.fechaNacimiento, p.correo, d.departamento, m.municipio, p.iddepartamentos, p.idmunicipio from personas p
                                      INNER JOIN departamentos d
                                      ON p.iddepartamentos = d.iddepartamentos
                                      INNER JOIN municipio m
                                      ON p.idmunicipio = m.idmunicipio WHERE idpersonas = '$txtid'");
  $datosPersona = mysqli_fetch_array($queryPersona);
  $nombre = $datosPersona['nombre'];
  $telefono = $datosPersona['telefono'];
  $fecha = $datosPersona['fechaNacimiento'];
  $correo = $datosPersona['correo'];
  $departamentoName = $datosPersona['departamento'];
  $municipioName = $datosPersona['municipio'];
  $departamentoid = $datosPersona['iddepartamentos'];
  $municipioid = $datosPersona['idmunicipio'];
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
      //$id = $_POST['idpersona'];
      $nombre = $_POST['nombre'];
      $telefono = $_POST['telefono'];
      $fecha = $_POST['fecha'];
      $correo = $_POST['correo'];
      $departamento = $_POST['departamentosEdit'];
      $municipio = $_POST['municipioEdit'];

 
      $queryCorreo = $conexion -> query("SELECT * FROM personas WHERE correo = '$correo' AND idpersonas != '$txtid' ");
      $resultadoq = mysqli_num_rows($queryCorreo);

      if($resultadoq > 0){
        $alert = "El correo ya existe";
      }else{
        
        if(empty($_POST['departamentosEdit']) && empty($_POST['municipioEdit'])){
          $queryAdd = $conexion -> query("UPDATE personas SET nombre= '$nombre', telefono = '$telefono', fechaNacimiento = '$fecha',
        correo = '$correo', iddepartamentos = '$departamentoid', idmunicipio = '$municipioid' WHERE idpersonas = '$txtid'");
        header("location:../../index.php");
        }else{
          $queryAdd = $conexion -> query("UPDATE personas SET nombre= '$nombre', telefono = '$telefono', fechaNacimiento = '$fecha',
        correo = '$correo', iddepartamentos = '$departamento', idmunicipio = '$municipio' WHERE idpersonas = '$txtid'");
        header("location:../../index.php");
        }
        
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
        <p><?php echo $departamentoName?></p><select class ="form-control" name="departamentosEdit" id ="departamentosEdit"> 
            <option value="">Seleccionar</option>
            <?php
                while($dptos = mysqli_fetch_array($querydtos)){?>
                    <option value="<?php echo $dptos['iddepartamentos']?>"><?php echo $dptos['departamento'] ?></option>
                <?php }?>
        </select>
        <label>Municipio</label>
        <p><?php echo $municipioName?></p><select class ="form-control" name="municipioEdit" id="municipioEdit">
            <option value="">Seleccionar</option>
            
        </select> 
        
        <script src="../../js/peticionesEdit.js"></script>


        </div>
        <div class="modal-footer">
          <a href="../../index.php" class = "btn btn-danger">Cancelar</a>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>





<?php include("../../templates/footer.php");?>