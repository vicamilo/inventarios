<?php

require_once 'models/producto.php';

class productoController{

    public function index()
    {
        $producto = new Producto();
        $productos = $producto->getAll();
        require_once 'views/producto/gestion.php';
    }

    public function gestion(){

        $producto = new Producto();
        $productos = $producto->getAll();
        
        require_once 'views/producto/gestion.php';
    }

    public function crear(){

        require_once 'views/producto/crear.php';
    }

    public function save(){

        if(isset($_POST)){
            $referencia = isset($_POST['referencia']) ? $_POST['referencia'] : false;
            $nombre_producto = isset($_POST['nombre_producto']) ? $_POST['nombre_producto'] : false;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            $peso = isset($_POST['peso']) ? $_POST['peso'] : false;
            $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            
            if($referencia && $nombre_producto && $precio && $peso && $categoria && $stock){
                $producto = new Producto();
                $producto ->setReferencia($referencia);
                $producto ->setNombre_producto($nombre_producto);
                $producto ->setPrecio($precio);
                $producto ->setPeso($peso);
                $producto ->setCategoria($categoria);
                $producto ->setStock($stock);

               // var_dump($_GET['id']);

                if(isset($_GET['id'])){
					$id = $_GET['id'];
					$producto->setId($id);
        
                    $save = $producto->edit();

                }else{
					$save = $producto->save();
				}
                
                if($save){
                    $_SESSION['producto'] = "complete";
                }
                else{
                    $_SESSION['producto'] = "failed";
                }
            }
            else{
                $_SESSION['producto'] = "failed";
            }
        }
        else{
            $_SESSION['producto'] = "failed";
        }
        header('Location:'.base_url.'producto/gestion');
    }

    public function editar(){

		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$edit = true;
			
			$producto = new Producto();
			$producto->setId($id);
			
            $pro = $producto->getOne();
			
			require_once 'views/producto/crear.php';
			
		}else{
			header('Location:'.base_url.'producto/gestion');
		}
    }
    
    public function eliminar(){
		
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$producto = new Producto();
			$producto->setId($id);
			
			$delete = $producto->delete();
			if($delete){
				$_SESSION['delete'] = 'complete';
			}else{
				$_SESSION['delete'] = 'failed';
			}
		}else{
			$_SESSION['delete'] = 'failed';
        }

        header('Location:'.base_url.'producto/gestion');
    }
    
    public function vender(){

		if(isset($_GET['id'])) {
            $id = $_GET['id'];
            $cantidad =isset($_POST['cantidad']) ? $_POST['cantidad'] : false;
            //$stock =isset($_POST['stock']) ? $_POST['stock'] : false;
			$sell = true;
			
			$producto = new Producto();
            $producto->setId($id);
            $producto ->setCantidad($cantidad);
			
            $pro = $producto->getOne();

            if($cantidad != null){

                $save = $producto->sell();
                
            }
            
			
            require_once 'views/producto/vender.php';
			
		}else{
			header('Location:'.base_url.'producto/gestion');
		}
    }
}

?>