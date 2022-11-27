<?php
    class Controller{
        //metodo para especificar ruta
        public function seePage($ruta){
            require_once $ruta;
        }
        //metodo para ver los usuarios registrados en la db
        public function viewUsers($tabledb, $pages=false){
            if($pages==""){
                $Users = new User();
                $Pager = new Pagers();
                $page  = $Pager->Pager($tabledb);
                $resultUsers = $Users->searchUsers($page[2], $page[0]);
                require_once ('view/Users/View.php');
            }else{
                $Users = new User();
                $Pager = new Pagers();
                $page  = $Pager->Pager($tabledb, $pages);
                $resultUsers = $Users->searchUsers($page[2], $page[0]);
                require_once ('view/Users/View.php');
            }
        }
        //metodo para el formulario de crear usuarios nuevos
        public function FormUsers(){
            $Users = new User();
            $resultRole = $Users->searchUsersRole();
            require_once ('view/Users/Form.php');

        }
        //metodo para crear los usuarios nuevos
        public function  CreateUsers($name, $lastName, $phone, $addres, $email, $cedula, $password, $role){
            $Users = new User();
            $resultUsers = $Users->RegisterUsers($name, $lastName, $phone, $addres, $email, $cedula, $password, $role);
        }
        //metodo para ver los roles de los usuarios registrados en la db
        public function viewRole($tabledb, $pages=false){
            if($pages==""){
                $Role = new Role();
                $Pager = new Pagers();
                $page = $Pager->Pager($tabledb);
                $resultRole = $Role->searchRole($page[2], $page[0]);
                require_once ('view/Role/ViewRole.php');
            }else{
                $Role = new Role();
                $Pager = new Pagers();
                $page = $Pager->Pager($tabledb, $pages);
                $resultRole = $Role->searchRole($page[2], $page[0]);
                require_once ('view/Role/ViewRole.php');
            }
        }
        public function updateUsersForm($id){
            $users = new User();
            $role  = new Role();
            $resultUsers = $users->searchUpdateUsers($id);
            $resultRole  = $role->searchUpdateRole($id);
            require_once ('view/Users/Update.php');
        }
        public function updateUsers($id, $name, $lastName, $phone, $addres, $email, $cedula, $password, $role){
            $Users = new User();
            $resultUsers = $Users->Update($id, $name, $lastName, $phone, $addres, $email, $cedula, $password, $role);
        }

        public function DeleteUsers($id){
            $users = new User();
            $resultUsers = $users->Delete($id);
        }

        //metodo cerrar Sesion
        public function SingOff(){
            $close = new config();
            $singOff = $close->close();
        }
        
    }

?>

        
