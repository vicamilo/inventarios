<?php if(isset($sell) && isset($pro) && is_object($pro)): ?>
	<h1>Vender producto <?=$pro->nombre_producto?></h1>
    <?php $url_action = base_url."producto/vender&id=".$pro->id; ?>
<?php endif; ?>

<div class="form_container">

    <form action="<?=$url_action?>" method="POST" enctype="multipart/form-data">
        <label for="referencia">Referencia: <?=isset($pro) && is_object($pro) ? $pro->referencia : ''; ?></label>

        <label for="nombre_producto">Producto: <?=isset($pro) && is_object($pro) ? $pro->nombre_producto : ''; ?></label>

        <label for="precio">Precio: <?=isset($pro) && is_object($pro) ? $pro->precio : ''; ?></label>

        <label for="stock">Stock: <?=isset($pro) && is_object($pro) ? $pro->stock : ''; ?></label>

        <label for="cantidad">Cantidad</label>
        <input type="text" name="cantidad"  value= 0 required />

       
        <input type="submit" value="Vender" />

    </form>
</div>    