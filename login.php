<?php

$alert = "";

session_start();

if(!empty($_SESSION['active'])){
    header("location: index.php");
}else{
    if(!empty($_POST)){
        if(empty($_POST['usuario']) || empty($_POST['password'])){
            $alert = "Ingrese sus credenciales";
        }else{
            require_once ("conexion.php");
            $user = $_POST['usuario'];
            $pass = $_POST['password'];

            $stmt = mysqli_query($conexion, "SELECT * FROM admins WHERE usuario = '$user' AND password = '$pass'");
            $result = mysqli_num_rows($stmt);

            if($result > 0){
                $data = mysqli_fetch_array($stmt);
                session_start();
                $_SESSION['active'] = true;
                header("location: index.php");
            }else{
                $alert = 'Error de credenciales';
                session_destroy();
            }
        }
    }
}

?>


<!doctype html>
<html lang="en">
<style>
    .center-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh; 
    }


    table {
      border-collapse: collapse;
      width: 50%; 
    }

    table, th, td {
      padding: 8px;
      text-align: center;
    }
  </style>
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

        <main class = "container">

            

            <div class="center-container"
            >
            
                <table
                     height = "75px" width ="400px" class="center-table"
                >
                    <form action="" method="post">
                        <tbody>
 
                            <tr class="">
                                <td scope="row">
                                    <label for="">User: </label>
                                </td>
                                <td><input type="text" class = "form-control" placeholder = "Ingresa el Usuario" name = "usuario"></td>
                            </tr>
                            <tr class="">
                                <td scope="row">
                                    <label for="">Password: </label>
                                </td>
                                <td>
                                    <input type="password" class = "form-control" placeholder = "Ingresa el Pass" name = "password">
                                </td>
                            </tr>
                            <tr class="">
                                <td scope="row" colspan = "2">
                                <center><input type="submit" class = "btn btn-primary" value = "Ingresar"></center>
                                </td>
                            </tr>
                            <tr class="">
                                <td scope="row" colspan = "2">
                                <div class ='alert'><?php echo isset($alert) ? $alert : ''; ?></div>
                                </td>
                            </tr>
                        </tbody>
                    </form>
                </table>

            </div>
            

        </main>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>

