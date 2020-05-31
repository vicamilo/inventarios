<?php

class Producto{

   private $id;
   private $nombre_producto;
   private $referencia;
   private $precio;
   private $peso;
   private $categoria;
   private $stock;
   private $fecha_creacion;
   private $fecha_ultima_version;

   private $cantidad;

   private $db;

   public function __construct(){
   
       $this->db = Database::connect();
   }

   /**
    * Get the value of id
    */ 
   public function getId()
   {
           return $this->id;
   }

   /**
    * Get the value of nombre_producto
    */ 
   public function getNombre_producto()
   {
           return $this->nombre_producto;
   }

   /**
    * Get the value of referencia
    */ 
   public function getReferencia()
   {
           return $this->referencia;
   }

   /**
    * Get the value of precio
    */ 
   public function getPrecio()
   {
           return $this->precio;
   }

   /**
    * Get the value of peso
    */ 
   public function getPeso()
   {
           return $this->peso;
   }

   /**
    * Get the value of categoria
    */ 
   public function getCategoria()
   {
           return $this->categoria;
   }

   /**
    * Get the value of stock
    */ 
   public function getStock()
   {
           return $this->stock;
   }

   /**
    * Get the value of fecha_creacion
    */ 
   public function getFecha_creacion()
   {
           return $this->fecha_creacion;
   }

   /**
    * Get the value of fecha_ultima_version
    */ 
   public function getFecha_ultima_version()
   {
           return $this->fecha_ultima_version;
   }

   /**
    * Get the value of db
    */ 
   public function getDb()
   {
           return $this->db;
   }

   /**
    * Set the value of id
    *
    * @return  self
    */ 
   public function setId($id)
   {
           $this->id = $id;

           return $this;
   }

   /**
    * Set the value of nombre_producto
    *
    * @return  self
    */ 
   public function setNombre_producto($nombre_producto)
   {
           $this->nombre_producto = $this->db->real_escape_string($nombre_producto);

           return $this;
   }

   /**
    * Set the value of referencia
    *
    * @return  self
    */ 
   public function setReferencia($referencia)
   {
           $this->referencia = $this->db->real_escape_string($referencia);

           return $this;
   }

   /**
    * Set the value of precio
    *
    * @return  self
    */ 
   public function setPrecio($precio)
   {
           $this->precio = $this->db->real_escape_string($precio);

           return $this;
   }

   /**
    * Set the value of peso
    *
    * @return  self
    */ 
   public function setPeso($peso)
   {
           $this->peso = $this->db->real_escape_string($peso);

           return $this;
   }

   /**
    * Set the value of categoria
    *
    * @return  self
    */ 
   public function setCategoria($categoria)
   {
           $this->categoria = $this->db->real_escape_string($categoria);

           return $this;
   }

   /**
    * Set the value of stock
    *
    * @return  self
    */ 
   public function setStock($stock)
   {
           $this->stock = $this->db->real_escape_string($stock);

           return $this;
   }

   /**
    * Set the value of fecha_creacion
    *
    * @return  self
    */ 
   public function setFecha_creacion($fecha_creacion)
   {
           $this->fecha_creacion = $this->db->real_escape_string($fecha_creacion);

           return $this;
   }

   /**
    * Set the value of fecha_ultima_version
    *
    * @return  self
    */ 
   public function setFecha_ultima_version($fecha_ultima_version)
   {
           $this->fecha_ultima_version = $this->db->real_escape_string($fecha_ultima_version);

           return $this;
   }

   /**
    * Set the value of db
    *
    * @return  self
    */ 
   public function setDb($db)
   {
           $this->db = $db;

           return $this;
   }

      /**
    * Get the value of cantidad
    */ 
    public function getCantidad()
    {
       return $this->cantidad;
    }
 
    /**
     * Set the value of cantidad
     *
     * @return  self
     */ 
    public function setCantidad($cantidad)
    {
       $this->cantidad = $cantidad;
 
       return $this;
    }

   //consultar todos los productos

   public function getAll(){
      
        $productos = $this->db->query("SELECT id, nombre_producto, referencia, precio, peso, categoria, stock, fecha_creacion, fecha_ultima_venta from productos order by id desc");
        return $productos;

   }

   //consultar un producto

   public function getOne(){
        $producto = $this->db->query("SELECT id, nombre_producto, referencia, precio, peso, categoria, stock, fecha_creacion, fecha_ultima_venta FROM productos WHERE id = {$this->getId()}");
        return $producto->fetch_object();
   }

   //Grabar producto

   public function save(){
        $sql = "INSERT INTO productos (referencia,nombre_producto,precio,peso,categoria,stock,fecha_creacion) VALUES('{$this->getReferencia()}', '{$this->getNombre_producto()}', {$this->getPrecio()}, {$this->getPeso()}, '{$this->getCategoria()}', {$this->getStock()}, CURDATE() )";
        $save = $this->db->query($sql);

    /*     echo $sql;
        echo "<br/>";
        echo $this->db->error;
        die();  */

        $result = false;
        if($save){
            $result = true;
        }
        return $result;
   }

   //editar producto

   public function edit(){
           
        $sql = "UPDATE productos SET referencia='{$this->getReferencia()}', nombre_producto='{$this->getNombre_producto()}', precio={$this->getPrecio()}, peso={$this->getPeso()}, categoria='{$this->getCategoria()}' ,stock={$this->getStock()}";

        $sql .= " WHERE id={$this->id};";
        
        $save = $this->db->query($sql);

/*         echo $sql;
        echo "<br/>";
        echo $this->db->error;
        die();  */ 
        
        $result = false;
        if($save){
                $result = true;
        }
        return $result;
   }

   //eliminar producto

   public function delete(){
        $sql = "DELETE FROM productos WHERE id={$this->id}";
        $delete = $this->db->query($sql);
        
        $result = false;
        if($delete){
                $result = true;
        }
        return $result;
   }

   //vender producto

   public function sell(){
           
        $sql = "UPDATE productos SET stock=stock-{$this->getCantidad()}, fecha_ultima_venta= NOW()";

        $sql .= " WHERE id={$this->id};";
        
        $save = $this->db->query($sql);

     /*    echo $sql;
        echo "<br/>";
        echo $this->db->error;
        die();   */
        
        $result = false;
        if($save){
                $result = true;
        }
        return $result;
   }

}

?>
