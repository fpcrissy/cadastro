<?php
    class cdst{
        public static function conect()
        {
            try{
                $con=new PDO('mysql:localhost=host; bdname=cdstrotable', 'root', '');
                return $con;
            } catch (PDOException $error1){
                echo 'error no processo' .$error1->getMessage();
            } catch (Exception $error2){
                echo 'generic error'.$error2->getMessage();
            }
            
        }
    }



?>