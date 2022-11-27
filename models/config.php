<?php
    class config{
        public function close(){
            session_start();
            session_destroy();
            header ('location:?action=/login');
        }
    }
?>