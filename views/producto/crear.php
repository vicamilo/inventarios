<?php if(isset($edit) && isset($pro) && is_object($pro)): ?>
	<h1>Editar producto <?=$pro->nombre_producto?></h1>
    <?php $url_action = base_url."producto/save&id=".$pro->id; ?>
    
<?php elseif(isset($sell) && isset($pro) && is_object($pro)): ?>
	<h1>Vender producto <?=$pro->nombre_producto?></h1>
	<?php $url_action = base_url."producto/sell&id=".$pro->id; ?>    
	
<?php else: ?>
	<h1>Crear nuevo producto</h1>
	<?php $url_action = base_url."producto/save"; ?>
<?php endif; ?>



<div class="form_container">

    <form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
        <label for="referencia">Rerencia</label>
        <input type="text" name="referencia" value="<?=isset($pro) && is_object($pro) ? $pro->referencia : ''; ?>" required  />

        <label for="nombre_producto">Nombre Producto</label>
        <input type="text" name="nombre_producto"  value="<?=isset($pro) && is_object($pro) ? $pro->nombre_producto : ''; ?>" required />

        <label for="precio">Precio</label>
        <input type="number" name="precio"  value="<?=isset($pro) && is_object($pro) ? $pro->precio : ''; ?>" required  />

        <label for="peso">Peso</label>
        <input type="number" name="peso" value="<?=isset($pro) && is_object($pro) ? $pro->peso : ''; ?>" required />

        <label for="stock">Stock</label>
        <input type="number" name="stock" value="<?=isset($pro) && is_object($pro) ? $pro->stock : ''; ?>"  required />

        <label for="categoria">Categoria</label>
        <input type="text" name="categoria" value="<?=isset($pro) && is_object($pro) ? $pro->categoria : ''; ?>" required  />

        <input type="submit" value="Guardar" />

    </form>
</div>    