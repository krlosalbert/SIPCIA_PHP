<?php 

    require_once 'Controller/Controller.php';
    require_once 'models/ModelUser.php';
    require_once 'models/Connection.php';
    require_once 'models/CRUD.php';

    $controller = new Controller();

    if( isset($_GET["action"])){

        if($_GET["action"] == "/login"){

            $controller->seePage('view/login.php');

        }elseif($_GET["action"] == "/home"){

            $controller->seePage('view/home.php');

        }elseif($_GET["action"] == "/viewUsers"){

            $controller->viewUsers("tbluser");

        }elseif($_GET["action"] == "/FormUsers"){

            $controller->FormUsers();

        }elseif($_GET["action"] == "/CreateUsers"){

            if( isset($_POST)){
            
                $controller->CreateUsers(
                    $_POST['name'],
                    $_POST['email'],
                    $_POST['phone'],
                    $_POST['addres'],
                    $_POST['cedula'],
                    $_POST['password'],
                    $_POST['role']
                );
            };
            
        }elseif($_GET["action"] == "cancelar"){

            $controlador->verPagina('Vista/html/cancelar.php');

        }elseif($_GET["action"] == "cancelarCita"){

            $controlador->cancelarCitas($_POST["cancelarDocumento"]);
        }

    } else {
        $controller->seePage('view/login.php');
    }
?>