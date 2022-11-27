<?php
    class Pagers{
        //metodo para paginar las paginas
        public function Pager($tabledb, $pages=false){
            /*Instancio la clase CRUD*/
            $user = new CRUD();
    
            /*llamo al metodo ReadUpdate para traer el total de los registros de la tabla */
            $resultRegisters = $user->ReadCount($tabledb);
            
            /*Asigno el total de registros a una variable*/
            $totalRegisters = $resultRegisters['totalRegisters'];

            /*declaro la variable que contiene el numero de paginas que tendra la tabla */
            $showPage = 3;

            /*valido que la variable page se le haya asignado un valor por el metodo get */
            if($pages==""){
                $pages = 1;
            }

            /*operacion para hayar el separador por paginas */
            $separator = ($pages-1) * $showPage;

            /*operacion para hayar el total de la paginas*/
            $totalPage = ceil($totalRegisters / $showPage);

            $paginador = array($showPage, $pages, $separator, $totalPage );

            return $paginador;

        }
    }

?>