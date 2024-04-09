<?php
$url_base = "http://localhost/CrupPHPFinal/";
?>

<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>

    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link active" href="<?php echo $url_base ?>" aria-current="page"
                >CRUD PHP - CONTACTOS<span class="visually-hidden">(current)</span></a
            >
            <a class="nav-item nav-link" href="<?php echo $url_base?>logout.php">Cerrar sesion</a>
        </div>
    </nav>
    
    

        <main class = "container">
            <br><br>