<?php
    class Controller {

        public function seePage($ruta){
            require_once $ruta;
        }

        public function viewUsers($tabledb){
            $modelUsers = new ModelUser();
            $page = $modelUsers->paginador($tabledb);
            $resultUsers = $modelUsers->searchUsers($page[2], $page[0]);
            require_once ('view/Users/ViewUsers.php');
        }

        public function FormUsers(){
            $modelUsers = new ModelUser();
            $resultRole = $modelUsers->searchUsersRole();
            require_once ('view/Users/FormUsers.php');

        }

        public function  CreateUsers($name, $email, $phone, $addres, $cedula, $password, $role){
            $modelUsers = new ModelUser();
            $resultUsers = $modelUsers->RegisterUsers($name, $email, $phone, $addres, $cedula, $password, $role);
            require_once ('view/Users/ViewUsers.php');
        }
        
    }

?>

        
