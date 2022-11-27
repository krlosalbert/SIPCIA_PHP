<?php
    class Role{
        private $field  = "RoleId";
        private $field2  = "RoleDescription";
        private $tabledb = "tblrole";

        public function searchRole($separator, $showPage){
            /*Instancio la clase CRUD*/
            $CRUD = new CRUD();
            
            //llamo al metodo Read para traer los roles registrados en la db 
            $result = $CRUD->Read($this->tabledb, $this->field, $separator, $showPage);
            return $result;
        }

        public function searchUpdateRole($id){
            /*Instancio la clase CRUD*/
            $CRUD = new CRUD();
            $users = new User();
            $resultUsers = $users->SearchUpdateUsers($id);

            //llamo al metodo Read para traer los roles registrados en la db 
            $resultRole = $CRUD->ReadUpdate($this->tabledb, $this->field, $resultUsers['RoleId']);
            $resultRole2 = $CRUD->Read($this->tabledb, $this->field);
            $result = array($resultRole, $resultRole2);
            return $result;
        }
        
        public function RegisterUsers($name, $lastName, $addres, $phone, $email, $cedula, $password, $role){
            $data   = "'$name', '$lastName', '$addres', $phone, '$email', $cedula, '$password', $role";
            $fields = "$this->field2, $this->field3, $this->field4, $this->field5, $this->field6, $this->field7, $this->field8, $this->field9";
            
            //instancio la clase CRUD
            $CRUD = new CRUD();
            
            //llamo al metodo create para hacer la insersion  la BD
            $resultUsers = $CRUD->Create($this->tabledb, $fields, $data);
            return $resultUsers;
        }   
    }
?>
