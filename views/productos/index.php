<h1>Gestionar Productos</h1>

<table>
    <tr>
        <th>ID</th>
        <th>NOMBRE PRODUCTO</th>
        <th>REFERENCIA</th>
        <th>PRECIO</th>
        <th>PESO</th>
        <th>CATEGORIA</th>
        <th>STOCK</th>
        <th>FECHA CREACION</th>
        <th>FECHA ULTIMA VENTA</th>
    </tr>
    <?php while($pro = $productos->fetch_object()): ?>
        <tr>
            <td><?=$pro->id;?></td>
            <td><?=$pro->nombre_producto;?></td>
            <td><?=$pro->referencia;?></td>
            <td><?=$pro->precio;?></td>
            <td><?=$pro->peso;?></td>
            <td><?=$pro->categoria;?></td>
            <td><?=$pro->stock;?></td>
            <td><?=$pro->fecha_creacion;?></td>
            <td><?=$pro->fecha_ultima_venta;?></td>

        </tr>
    <?php endwhile; ?>
</table>