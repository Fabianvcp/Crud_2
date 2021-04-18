<?php
    //? establecer zona horaria ?//
    date_default_timezone_set('America/Argentina/Cordoba');
    class Conectar{
        protected $dbh;

        //*! Conexion a la base de datos !*//
        protected function Conexion(){
            try{
                $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=crud2", "root","");
                return $conectar;
            }catch(Exception $e){
                print " !Error BD! " .$e->getMessage(). "<br/>";
                die();
            }
        }
        //*# esta funcion por seguridad que reconosca los caracteres #*//
        public function set_names(){
            return $this->dbh->query("SET NAMES 'utf8'");
        }

    }
    ?>