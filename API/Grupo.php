<?php

include_once 'conexion.php';


class gru extends DB{
	function ObtenerDatos(){
		//consulta que sirve para obtener los datos para JSON y se le aplica la condicion para el grupo de trabajo que saldra
		$query = $this->connex()->query("SELECT p.idpersonas, p.nombre, p.telefono, p.fechaNacimiento, p.correo, d.departamento, m.municipio from personas p
		INNER JOIN departamentos d
		ON p.iddepartamentos = d.iddepartamentos
		INNER JOIN municipio m
		ON p.idmunicipio = m.idmunicipio
		WHERE p.idpersonas = '4'");
//en la consulta concat_ws sirve para que se muestre el dato de 2 celdas en 1<nombre><apellido>
		return $query;
	}

}

