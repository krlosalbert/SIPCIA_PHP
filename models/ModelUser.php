<?php

    class ModelUser{

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

        function validacion($user, $password){     
       
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
                }
                else{
                    
                    $sql = (
                        "SELECT $this->field1, $this->field2, $this->field3, $this->field4,$this->field5, $this->field6, $this->field7, $this->field8, $this->field9 
                        FROM $this->tabledb 
                        WHERE $this->field7=$user
                        AND $this->field7=$password"
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
                    }
                    else{
    
                        $mensaje= 'Error: El usuario o contrasena son incorrectos';
                        return $mensaje;
                        session_destroy();
                    }
                }
            }   
        }

        public function searchUsers($separator, $showPage){

            /*============================================================================================
            =DECLARAR VARIABLES E INSTANCIAR LA CLASE CRUD PARA TRAER LOS DATOS DEL USUARIO DE DOS TABLAS
            ==============================================================================================*/

            /*Instancio la clase CRUD*/
            $user = new CRUD();
            
            /*llamo al metodo ReadJoin2 para traer las ventas realizadas */  
            $resultUsers = $user->ReadJoin(
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

            $role      = new CRUD();
            $resultRole = $role->Read($this->tabledb2, $this->field9);

            return  $resultRole;

        }

        public function paginador($tabledb){
            /*Instancio la clase CRUD*/
            $user = new CRUD();
    
            /*llamo al metodo ReadUpdate para traer el total de los registros de la tabla */
            $resultRegisters = $user->ReadCount($tabledb);
            
            /*Asigno el total de registros a una variable*/
            $totalRegisters = $resultRegisters['totalRegisters'];

            /*declaro la variable que contiene el numero de paginas que tendra la tabla */
            $showPage = 5;

            /*valido que la variable page se le haya asignado un valor por el metodo get */
            if( empty($_GET['page']) ){

                $page = 1;

            }else{

                $page=$_GET['page'];
            }

            /*operacion para hayar el separador por paginas */
            $separator = ($page-1) * $showPage;

            /*operacion para hayar el total de la paginas*/
            $totalPage = ceil($totalRegisters / $showPage);

            $paginador = array($showPage, $page, $separator, $totalPage );

            return $paginador;

        }

        public function RegisterUsers($name, $email, $phone, $addres, $cedula, $password, $role){

            /*==================================================================================
            =DECLARAR VARIABLES E INSTANCIAR LA CLASE CRUD PARA INSERTAR LOS DATOS DEL USUARIO
            ====================================================================================*/

            $data   = "'$name', 'perez', '$addres', $phone, '$email', $cedula, '$password', $role";
            $fields = "$this->field2, $this->field3, $this->field4, $this->field5, $this->field6, $this->field7, $this->field8, $this->field9";
            
            //instancio la clase CRUD
            $usu = new CRUD();
            
            //llamo al metodo create para hacer la insersion a la BD
            $resultUsers = $usu->Create($this->tabledb, $fields, $data);

            return $resultUsers;
        }
        

    }



?>
