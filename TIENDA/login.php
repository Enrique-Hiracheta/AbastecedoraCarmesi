<form class="col-md-12" method="post" action="" name="loginForm" id="loginForm">
	<div class="form-group input-group">
		<span class="input-group-addon"><i class="fa fa-user"></i></span>
		<input required class="form-control" type="text" id="usuarioSin" name='usuarioSin' placeholder="Usuario"/>
	</div>
	<div class="form-group input-group">
		<span class="input-group-addon"><i class="fa fa-lock"></i></span>
		<input required class="form-control" type="password" id="contraseniaSin" name='contraseniaSin' placeholder="Contraseña"/>
	</div>
	<div class="form-group">
		<input value="Ingresar" id="btnLogin" name="btnLogin" type="submit" class="btn btn-def btn-block"/>
	</div>
</form>
<style>
	i.form-control-feedback.bv-no-label {
		display: block;
		z-index: 50;
		right: -5px !important;
		top: -2px !important;
	}
	
	small.help-block {
		display: none !important;
	}
</style>

<script>
	$( document ).ready( function () {
		"use strict";
		validarLogin( "loginForm" );
	} );
</script>