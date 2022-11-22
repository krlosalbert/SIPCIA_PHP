<?php
    class Connection {
        private $connection;
        private $sql;
        private $result;
        private $hostname = "localhost";
        private $database = "dbsipcia"; 
        private $username = "root"; 
        private $password = "";

        public function connect(){
            $this->connection = mysqli_connect(
                $this->hostname, 
                $this->username,
                $this->password, 
                $this->database);

            if($this->connection){

                return $this->connection;

            }else{

                echo"Error al conectar";
            }
        }
        public function cerrar(){
            $this->mySQLI->close();
        }
        public function consulta($sql){
            $this->sql = $sql;
            $this->result = $this->mySQLI->query($this->sql);
            $this->filasAfectadas = $this->mySQLI->affected_rows;
            $this->citaId = $this->mySQLI->insert_id;
        }
        public function obtenerResult(){
            return $this->result;
        }
        public function obtenerFilasAfectadas(){
            return $this->filasAfectadas;
        }
        public function obtenerCitaId(){
            return $this->citaId;
        }
    }
?>