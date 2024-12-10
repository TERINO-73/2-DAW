<?php 

class Producto{

    private $id;
    private $nombre;
    private $precio;
    private $stock;

    public function __construct($id,$nombre, $precio, $stock) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->stock = $stock;

    }
    public function disminuirStock($stock){
        $esteStock = 10;
        if($esteStock>=$stock){
           
            return true;
        }else{return false;}
    }


}



?>