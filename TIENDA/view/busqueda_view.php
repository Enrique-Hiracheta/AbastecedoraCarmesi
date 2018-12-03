<table id="busquedaTabla" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Codigo</th>
            <th>Categoria</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Codigo</th>
            <th>Categoria</th>
        </tr>
    </tfoot>
    <tbody>
        <?php
        foreach ( $dataProductos as $producto ) {
            echo '<tr>
            <td style="width: 200px;"><img style="width: 200px; height: 100px;" src="'.$producto[ "imagen" ].'"/></div></td>
            <td><spam class="descProductCarrito"><a href="?idProducto='.$producto["idProducto"].'" >'.$producto[ "nombre" ].' </a></spam></td>
            <td><spam class="descProductCarrito" title="'.$producto[ "descripcion" ].'">'.$producto[ "descripcion" ].'</spam></td>
            <td><span class="price-new">$ '.number_format(($producto["precio"]), 2, ".", " ").'</span></td>
            <td><spam class="descProductCarrito" title="'.$producto[ "codigo" ].'">'.$producto[ "codigo" ].'</spam></td>
            <td><spam class="descProductCarrito" title="'.$producto[ "categoria" ].'">'.$producto[ "categoria" ].'</spam></td>
            </tr>';
        }
        ?>
    </tbody>
</table>


<script>
    $( document ).ready( function () {
        $( '#busquedaTabla' ).DataTable( {
            "language": {
                "lengthMenu": "Mostrar _MENU_ articulos por pagina",
                "zeroRecords": "No se encontraron resultados",
                "info": "Pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No hay resultados disponibles",
                "infoFiltered": "(filtrado de los articulos totales de _MAX_)",
                "sSearch": "Buscar",
                "paginate": {
				    "previous": "Anterior",
                    "next": "Siguiente"
				}
            }
        } );
    } );
</script>