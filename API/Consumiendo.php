<?php
echo'CONSUMIENDO API';
echo'<br>';
echo'<br>';
//se asigna a la variable $data y se muestra por PRINT_r
$data=json_decode(file_get_contents("http://localhost/CrupPHPFinal/API/IndicePersona.php"), true);
print_r($data);


?>

<div><a href="../index.php">REGRESAR</a></div>