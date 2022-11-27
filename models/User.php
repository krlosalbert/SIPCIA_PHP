<?php
    class User{
        private $field1      = "UserId";
        private $field2      = "UserName";
        private $field3      = "UserLastName";
        private $field4      = "UserAddres";
        private $field5      = "UserPhone";
        private $field6      = "UserEmail"; 
        private $field7      = "UserIdCard";
        private $field8      = "UserPassword";
        private $field9      = "RoleId";
        private $field10     = "RoleDescription";
        private $tabledb     = "tbluser";
        private $tabledb2    = "tblrole";
        private $identifier1 = "u";
        private $identifier2 = "r";

        function validate($user, $password){     
            session_start();             
    
            $db = new Connection();
            $connect = $db->connect();   
    
            if(!empty($_SESSION['active'])){
                header ('location:?action=/home');
            }else{
    
                if (empty($user) and empty($password)){ 
                    $mensaje = "Todos los campos son obligatorios";
                    return $mensaje;   
                }

                if(empty($user) and $password){ 
                    $mensaje = "El campo Usuario es obligatorio";
                    return $mensaje;
                }

                if ($user and empty($password)){ 
                    $mensaje = "El campo contraseña es obligatorio";
                    return $mensaje;
                }else{
                    $sql = (
                        "SELECT $this->field1, $this->field2, $this->field3, $this->field4,$this->field5, $this->field6, $this->field7, $this->field8, $this->field9 
                        FROM $this->tabledb 
                        WHERE $this->field7=$user
                        AND $this->field8=$password"
                    );
                    $query = mysqli_query($connect,$sql);
                    $resultado = mysqli_num_rows($query);
                    $data =mysqli_fetch_array($query);

                    if($resultado>0){   
                        $_SESSION['active']   = true;
                        $_SESSION['iduser']   = $data['UserId'];
                        $_SESSION['name']     = $data['UserName'];
                        $_SESSION['rol']      = $data['RoleId'];
    
                        if($data['RoleId']==1){//administrador 
                            header ('location:?action=/home');
                        }

                        if($data['RolId']==2){//almacenista                      
                            header ('location:?action=/home');
                        }
                    }else{
                        $mensaje= 'Error: El usuario o contrasena son incorrectos';
                        return $mensaje;
                        session_destroy();
                    }
                }
            }   
        }

        public function searchUsers($separator, $showPage){
            /*Instancio la clase CRUD*/
            $CRUD = new CRUD();
            
            /*llamo al metodo ReadJoin para traer los usuarios registrados en la db */  
            $resultUsers = $CRUD->ReadJoin(
                $this->tabledb, 
                $this->tabledb2, 
                $this->identifier1, 
                $this->identifier2, 
                $this->field9, 
                $this->field1, 
                $separator, 
                $showPage
            );
            return $resultUsers;
        }

        public function searchUsersRole(){
            $CRUD      = new CRUD();
            $resultRole = $CRUD->Read($this->tabledb2, $this->field9);
            return  $resultRole;
        }

        public function RegisterUsers($name, $lastName, $addres, $phone, $email, $cedula, $password, $role){
            //instancio la clase CRUD
            $CRUD = new CRUD();

            $data   = "'$name', '$lastName', '$addres', $phone, '$email', $cedula, '$password', $role";
            $fields = "$this->field2, $this->field3, $this->field4, $this->field5, $this->field6, $this->field7, $this->field8, $this->field9";
            
            //llamo al metodo create para hacer la insersion  la BD
            $resultUsers = $CRUD->Create($this->tabledb, $fields, $data);
            return $resultUsers;
        }  
        
        public function SearchUpdateUsers($id){
            
            $CRUD       = new CRUD();
            $result = $CRUD->ReadUpdate($this->tabledb, $this->field1, $id);
            return $result;
            
        } 

        public function Update($id, $name, $lastName, $addres, $phone, $email, $cedula, $password, $role){
            //instancio la clase CRUD
            $CRUD = new CRUD();

            $fields  = "$this->field2='$name', $this->field3='$lastName', $this->field4='$addres', $this->field5=$phone, $this->field6='$email', $this->field7=$cedula, $this->field8='$password', $this->field9=$role";
            $result = $CRUD->Update($this->tabledb, $fields, $this->field1, $id);
        }  

        public function Delete($id){
            //instancio la clase CRUD
            $CRUD = new CRUD();
            $result = $CRUD->Delete($this->tabledb, $this->field1, $id);
        } 
    }
?>
