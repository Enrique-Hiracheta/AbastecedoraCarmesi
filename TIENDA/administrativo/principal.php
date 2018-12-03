<?php
session_start();
if (@!$_SESSION['tipo']==2) {
	header("Location:index.php");
}
?>

<div class="menuPpal">
	<?php require_once 'templates/header.php'; ?>
</div>
<div>
	<?php require_once 'templates/menu.html'; ?>
</div>

<section id="main-content">
    <section class="wrapper" >
        <div id="usuarios" >
	        <div class="encabezado">
	        	<div class="row">
	        		<div class="col-md-6">
	            		<h1><i class="fa fa-users"></i> SIGMA</h1>
	            	</div>
	            </div>
	        </div>
	        <div id="cuerpo">
		        			<h1>Cuerpo</h1>
					</div>
	        </div>
        </div>
    </section>
</section>