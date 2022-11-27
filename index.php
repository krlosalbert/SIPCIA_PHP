<?php 
    require_once 'Controller/Controller.php';
    require_once 'models/User.php';
    require_once 'models/Role.php';
    require_once 'models/Pagers.php';
    require_once 'models/Connection.php';
    require_once 'models/CRUD.php';
    require_once 'models/config.php';

    $controller = new Controller();

    if( isset($_GET["action"])){
        //ruta para el login
        if($_GET["action"] == "/login"){
            $controller->seePage('view/login.php');
        }
        //ruta para la pagina principal o home
        if($_GET["action"] == "/home"){
            $controller->seePage('view/home.php');
        }
        //ruta para visualizar los usuarios existentes en la db con mas de una pagina
        if(isset($_GET['pages'])){
            $pages = $_GET['pages'];
            $controller->viewUsers("tbluser", $pages);
        }
        //ruta para visualizar los usuarios existentes en la db con una sola pagina
        if($_GET["action"] == "/viewUsers"){
            $controller->viewUsers("tbluser");
        }
        //ruta para el formulario que permite crear nuevos usuarios
        if($_GET["action"] == "/FormUsers"){
            $controller->FormUsers();
        }
        //ruta para crear los usuarios
        if($_GET["action"] == "/CreateUsers"){
            //recibir los datos por el metodo POST
            if( isset($_POST)){
                $controller->CreateUsers(
                    $_POST['name'],
                    $_POST['lastName'],
                    $_POST['addres'],
                    $_POST['phone'],
                    $_POST['email'],
                    $_POST['cedula'],
                    $_POST['password'],
                    $_POST['role']
                );
            };  
            unset($_POST);
            $controller->viewUsers("tbluser");
        }
        //ruta para formulario de editar usuarios
        if($_GET["action"] == "/Update"){
            if( isset($_GET['id'])){
                $controller->UpdateUsersForm($_GET['id']);
            }
        }
        //ruta para editar usuarios
        if($_GET["action"] == "/UpdateUsers"){
            if( isset($_POST)){
                $controller->UpdateUsers(
                    $_POST['id'],
                    $_POST['name'],
                    $_POST['lastName'],
                    $_POST['addres'],
                    $_POST['phone'],
                    $_POST['email'],
                    $_POST['cedula'],
                    $_POST['password'],
                    $_POST['role']
                );
            }
            unset($_POST);
            $controller->viewUsers("tbluser");
        }

        //ruta para formulario de eliminar usuarios
        if($_GET["action"] == "/Delete"){
            if( isset($_GET['id'])){
                $controller->DeleteUsers($_GET['id']);
            }
            $controller->viewUsers("tbluser");
        }
        //ruta para visualizar los roles
        if($_GET["action"] == "/viewRole"){
            $controller->viewRole("tblrole");
        }
        //ruta para cerrar sesion
        if($_GET["action"] == "/close"){
            $controller->SingOff();
        }
    }else{
        $controller->seePage('view/login.php');
    }
?>