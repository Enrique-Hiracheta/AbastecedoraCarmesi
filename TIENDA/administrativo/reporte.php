<?php
session_start();
if ( @!$_SESSION[ 'tipo' ] == 1 ) {
    header( "Location:index.php" );
}

require_once( "funciones/reporteConsultas.php" );
require_once( "fpdf.php" );
/*
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(40, 10, 'Hello World!');
$pdf->Output();
*/
$meses = array( "ninguno", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" );
?>

<div class="menuPpal">
    <?php require_once 'templates/header.php'; ?>
</div>
<div>
    <?php require_once 'templates/menuAdmin.html'; ?>
</div>

<section id="main-content">
    <section class="wrapper">
        <div id="usuarios">
            <div class="encabezado">
                <div class="row">
                    <div class="col-lg-6">
                        <h1><i class="fa fa-book"></i> Reporte Ventas</h1>
                    </div>
                </div>
            </div>
            <div id="cuerpo">
                <form id="reporte" method="get" action="">
                    <div class="row">

                        <label class="col-md-1">Año</label>
                        <div class="col-md-2">
                            <select id="anio" name="anio" class="custom-select">
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2019">2020</option>
                            </select>
                        </div>
                        <label class="col-md-1">Mes</label>
                        <div class="col-md-2">
                            <select id="mes" name="mes" class="custom-select">
                                <option value="true" selected>Todos</option>
                                <option value="1">Enero</option>
                                <option value="2">Febrero</option>
                                <option value="3">Marzo</option>
                                <option value="4">Abril</option>
                                <option value="5">Mayo</option>
                                <option value="6">Junio</option>
                                <option value="7">Julio</option>
                                <option value="8">Agosto</option>
                                <option value="9">Septiembre</option>
                                <option value="10">Octubre</option>
                                <option value="11">Noviembre</option>
                                <option value="12">Diciembre</option>
                            </select>
                        </div>
                        <label class="col-md-1">Cliente</label>
                        <div class="col-md-2">
                            <select id="cliente" name="cliente" class="custom-select">
                                <option value="true">Todos</option>
                                <?php
                                foreach ( $clientes as $cliente ) {
                                    echo '<option value="'.$cliente["idCliente"].'">Cliente '.$cliente["idCliente"].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <label class="col-md-1">Detallado</label>
                        <div class="col-md-2">
                            <select id="detallado" name="detallado" class="custom-select">
                                <option value="0">No</option>
                                <option value="1">Si</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success" value="consultar">Consultar</button>

                    </div>
                </form>
                <!-- Tablas -->
                <div class="row" id="dvData">
                    <?php
                    if ( $detallado == 0 ) {
                        echo '<table class="table">
                        <tr>
                            <th>Año</th>
                            <th>Mes</th>
                            <th>Ciente</th>
                            <th>Venta</th>
                        </tr>';
                        //repetir por cliente

                        $TotalFinal = 0;
                        $idClienteAnte = null;
                        $TotalFinalCliente = 0;
                        $i = 0;
                        $j = 0;
                        foreach ( $resPedidos as $producto ) {
                            $fecha = explode( "-", $producto[ "fecha" ] );
                            $TotalFinal += $producto[ "total" ];

                            if ( $idClienteAnte == $producto[ "idCliente" ] || $idClienteAnte == null ) {
                                echo '<tr>
                            <td>' . $fecha[ 0 ] . '</td>
                            <td>' . $meses[ $fecha[ 1 ] ] . '</td>
                            <td>Cliente ' . $producto[ "idCliente" ] . '</td>
                            <td>$' . $producto[ "total" ] . '</td>
                            </tr>';
                                $TotalFinalCliente += $producto[ "total" ];
                                if ( $idClienteAnte == null ) {
                                    $idClienteAnte = $producto[ "idCliente" ];
                                }


                            } else {

                                echo '
                                <tr class="bg-primary text-white">
                                    <td></td>
                                    <td></td>
                                    <td>Total Cliente: ' . $idClienteAnte . '</td>
                                    <td>$' . $TotalFinalCliente . '</td>
                                </tr>';
                                echo '<tr>
                            <td>' . $fecha[ 0 ] . '</td>
                            <td>' . $meses[ $fecha[ 1 ] ] . '</td>
                            <td>Cliente ' . $producto[ "idCliente" ] . '</td>
                            <td>$' . $producto[ "total" ] . '</td>
                            </tr>';
                                if ( count( $resPedidos != $i ) ) {
                                    $TotalFinalCliente = 0;
                                    $j++;
                                }
                                $TotalFinalCliente += $producto[ "total" ];
                                $idClienteAnte = $producto[ "idCliente" ];

                            }
                            $i++;
                        }

                        if ( count( $resPedidos ) > 1 && $j > 0 ) {
                            echo '
                                <tr class="bg-primary text-white">
                                    <td></td>
                                    <td></td>
                                    <td>Total Cliente: ' . $idClienteAnte . '</td>
                                    <td>$' . $TotalFinalCliente . '</td>
                                </tr>';
                        }
                        echo '
                        <tr class="bg-success text-white">
                            <td></td>
                            <td></td>
                            <td>Total</td>
                            <td>$' . $TotalFinal . '</td>
                        </tr>
                        </table>';
                    } else {
                        echo '<table class="table">
                        <tr>
                            <th>Año</th>
                            <th>Mes</th>
                            <th>Dia</th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                        </tr>';
                        //repetir por cliente

                        $TotalFinal = 0;
                        $idClienteAnte = null;
                        $TotalFinalCliente = 0;
                        $i = 0;
                        $j = 0;
                        $mesAnterior = null;
                        $diaAnterior = null;
                        $anioAnterior = null;
                        foreach ( $resPedidos as $producto ) {
                            $fecha = explode( "-", $producto[ "fecha" ] );
                            $TotalFinal += $producto[ "precio" ] * $producto[ "cantidad" ];

                            if ( $idClienteAnte == $producto[ "idCliente" ] || $idClienteAnte == null ) {
                                echo '<tr>';
                                
                                if ( $anioAnterior == $fecha[ 0 ] ) {
                                    $anioAnterior = $fecha[ 0 ];
                                    echo '<td></td>';
                                } else {
                                    echo '<td>' . $fecha[ 0 ]  . '</td>';
                                    $anioAnterior = $fecha[ 0 ];
                                }
                                if ( $mesAnterior == $fecha[ 1 ] ) {
                                    $mesAnterior = $fecha[ 1 ];
                                    echo '<td></td>';
                                } else {
                                    
                                    echo '<td>' . $meses[ $fecha[ 1 ] ] . '</td>';
                                    $mesAnterior = $fecha[ 1 ];
                                }
                                if ( $diaAnterior == $fecha[ 2 ] ) {
                                    $diaAnterior = $fecha[ 2 ];
                                    echo '<td></td>';
                                } else {
                                    echo '<td>' . $fecha[ 2 ]  . '</td>';
                                    $diaAnterior = $fecha[ 2 ];
                                }

                            
                            echo '<td>' . $producto[ "producto" ] . '</td>
                            <td>$' . $producto[ "precio" ] . '</td>
                            <td>' . $producto[ "cantidad" ] . '</td>
                            <td>$' . $producto[ "precio" ] * $producto[ "cantidad" ] . '</td>
                            </tr>';
                                $TotalFinalCliente += $producto[ "precio" ] * $producto[ "cantidad" ];
                                if ( $idClienteAnte == null ) {
                                    $idClienteAnte = $producto[ "idCliente" ];
                                }


                            } else {
                                //Cambio de cliente
                                $mesAnterior = null;
                                $diaAnterior = null;
                                $anioAnterior = null;
                                $i++;

                                echo '
                                <tr class="bg-primary text-white">
                                    <td></td>
                                    <td></td>
                                    <td></td><td></td><td></td>
                                    <td>Total Cliente: ' . $idClienteAnte . '</td>
                                    <td>$' . $TotalFinalCliente . '</td>
                                </tr>';
                                
                                 if ( $anioAnterior == $fecha[ 0 ] ) {
                                    $anioAnterior = $fecha[ 0 ];
                                    echo '<td></td>';
                                } else {
                                    echo '<td>' . $fecha[ 0 ]  . '</td>';
                                    $anioAnterior = $fecha[ 0 ];
                                }
                                if ( $mesAnterior == $fecha[ 1 ] ) {
                                    $mesAnterior = $fecha[ 1 ];
                                    echo '<td></td>';
                                } else {
                                    
                                    echo '<td>' . $meses[ $fecha[ 1 ] ] . '</td>';
                                    $mesAnterior = $fecha[ 1 ];
                                }
                                if ( $diaAnterior == $fecha[ 2 ] ) {
                                    $diaAnterior = $fecha[ 2 ];
                                    echo '<td></td>';
                                } else {
                                    echo '<td>' . $fecha[ 2 ]  . '</td>';
                                    $diaAnterior = $fecha[ 2 ];
                                }
                                if ( count( $resPedidos != $i ) ) {
                                    $TotalFinalCliente = 0;
                                    $j++;
                                }
                                
                                echo '<td>' . $producto[ "producto" ] . '</td>
                            <td>$' . $producto[ "precio" ] . '</td>
                            <td>' . $producto[ "cantidad" ] . '</td>
                            <td>$' . $producto[ "precio" ] * $producto[ "cantidad" ] . '</td>
                            </tr>';
                                
                                $TotalFinalCliente += $producto[ "precio" ] * $producto[ "cantidad" ];
                                $idClienteAnte = $producto[ "idCliente" ];

                            }
                            $i++;
                        }

                        if ( count( $resPedidos ) > 1 && $j > 0 ) {
                            echo '
                                <tr class="bg-primary text-white">
                                    <td></td>
                                    <td></td><td></td><td></td>
                                    <td></td>
                                    <td>Total Cliente: ' . $idClienteAnte . '</td>
                                    <td>$' . $TotalFinalCliente . '</td>
                                </tr>';
                        }
                        echo '
                        <tr class="bg-success text-white">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Total</td>
                            <td>$' . $TotalFinal . '</td>
                        </tr>
                        </table>';
                    }
                    ?>
                    <!-- Fin repetir por cliente-->

                </div>
                <div class="row">
                    <input class="btn btn-success" type="button" id="btnExport" value="Exportar a Excel"/>
                    <BR><BR>
                    <a href="export_pdf_pedidos.php" class="link-btn">Exportar a PDF</a>
                    <a href="export_excel_pedidos.php" class="link-btn">Exportar a Excel</a>
                </div>
            </div>
        </div>
    </section>
</section>

<script>
    $( "#btnExport" ).click( function ( e ) {
        window.open( 'data:application/vnd.ms-excel,' + encodeURIComponent( $( '#dvData' ).html() ) );
        e.preventDefault();
    } );
</script>
