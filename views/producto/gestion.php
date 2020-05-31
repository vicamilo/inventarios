<h1>Gestión de productos</h1>

<a href="<?=base_url?>producto/crear" class="button button-small">Crear Producto</a>

<?php if(isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete'): ?>
    <strong class="alert_green">El producto se ha creado correctamente</strong>
<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] != 'failed'): ?>
    <strong class="alert_red">El producto no se ha creado correctamente</strong>
<?php endif; ?>

<table>
    <tr>
        <th>ID</th>
        <th>REFERENCIA</th>
        <th>PRODUCTO</th>
        <th>PRECIO</th>
        <th>PESO</th>
        <th>CATEGORIA</th>
        <th>STOCK</th>
        <th>FECHA_CREACION</th>
        <th>FECHA_ULT_VENTA</th>
    </tr>
    <?php while($pro = $productos->fetch_object()): ?>
        <tr>
            <td><?=$pro->id;?></td>
            <td><?=$pro->referencia;?></td>
            <td><?=$pro->nombre_producto;?></td>
            <td><?=$pro->precio;?></td>
            <td><?=$pro->peso;?></td>
            <td><?=$pro->categoria;?></td>
            <td><?=$pro->stock;?></td>
            <td><?=$pro->fecha_creacion;?></td>
            <td><?=$pro->fecha_ultima_venta;?></td>
			<td>
                <a href="<?=base_url?>producto/vender&id=<?=$pro->id?>" class="button button-gestion button-red">
				Vender</a>                
				<a href="<?=base_url?>producto/editar&id=<?=$pro->id?>" class="button button-gestion">Editar</a>
				<a href="<?=base_url?>producto/eliminar&id=<?=$pro->id?>" class="button button-gestion button-red">Eliminar</a>
			</td>            
        </tr>
    <?php endwhile; ?>
</table>