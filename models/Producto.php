<?php
    //! Producto Hereda la información de Conectar !//
    class Producto extends Conectar{
        //¿ Traer todos los datos ¿//
        public function get_producto(){
            //# conexion #//
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT* FROM tm_product  where est=1";
            $sql=$conectar->prepare($sql);
            $sql->execute();

            return $resultado = $sql->fetchAll();

        }

        
        //¿ Traer los datos del id que coincida ¿//
        public function get_producto_x_id($pro_id){
            //# conexion #//
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT* FROM tm_product where prod_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$pro_id);
            $sql->execute();

            return $resultado = $sql->fetchAll();

        }

        
        //¿ Elimina los datos del id que coincida ¿//
        public function delete_producto($pro_id){
            //# conexion #//
            $conectar = parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_producto
                    SET
                        est =0,
                        fech_elim=now()
                    WHERE
                        prod_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$pro_id);
            $sql->execute();

            return $resultado = $sql->fetchAll();

        }

        

        
        //¿ Insertar los datos  ¿//
        public function insert_producto($pro_nom){
            //# conexion #//
            $conectar = parent::conexion();
            parent::set_names();
            $sql="INSERT INTO tm_producto
                        (prod_id,prod_nom,fech_crea,fech_modi,fech_elim,est)
                    VALUES
                        (NULL, ?, now(), NULL, NULL, 1);
                   ";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$pro_nom);
            $sql->execute();

            return $resultado = $sql->fetchAll();

        }     
        
        
        //¿ actualizar los datos del id que coincida ¿//
        public function update_producto($pro_id,$pro_nom){
            //# conexion #//
            $conectar = parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_producto
                    SET
                        pro_nom =?,
                        fech_modi=now()
                    WHERE
                        prod_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$pro_nom);
            $sql->bindValue(2,$pro_id);
            $sql->execute();

            return $resultado = $sql->fetchAll();

        }
    }



        


?>