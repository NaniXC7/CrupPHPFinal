<?php

include_once 'Grupo.php';
class Apigroup{
    function getAll(){//funcion que sirve para obtener todos los datos y aplicar Json_encode
        $persona = new gru();
        $personas = array();
        $personas["items"] = array();

        $res = $persona->ObtenerDatos();

        if ($res->rowCount()) {//condicion que cuenta el numero de f
            while($row = $res->fetch(PDO::FETCH_ASSOC)){
                    $item = array(
                        'Id'=> $row['idpersonas'],
                        'Nombre' => $row['nombre'],
                        'Telefono' => $row['telefono'],
                        'Correo' => $row['correo'],
                        'FechaNacimiento' => $row['fechaNacimiento'],
                        'Departamento' => $row['departamento'],
                        'Municipio' => $row['municipio']
                    );
                    array_push($personas["items"], $item);
            }
            echo json_encode($personas);
            //$this->printJson($personas);
        }else{
            echo json_encode(array('mensaje'=>'No hay elementos registrados'));
           //$this->error('No hay elementos registrados');
        }
    }

    function printJson($array){
        echo '<code>' . json_encode($array) . '</code>';

    }


    function error($mensaje){
        echo '<code>' . json_encode(array('mensaje'=>$mensaje)) . '</code>';
    }

}

?>