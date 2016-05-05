// Functions

//Redirección
function redireccion() {
	$(location).attr('href','index.php');
}

//Refrescar
function timedRefresh(timeoutPeriod) {
	setTimeout("location.reload(true);",timeoutPeriod);
}

//animate links
$().ready(function() {
	$('.scroll-menu li a, .scroll-link').click(function(){
		$('html, body').animate({
			scrollTop: $( $.attr(this, 'href') ).offset().top
		}, 500);
		return false;
	});
});

//Validae Login
$().ready(function() {
	// validate signup form on keyup and submit
	$("#login-form").validate({
		rules: {
			empleado: {
				required: true,
				number: true
			},
			pass: {
				required: true											
			}
		},
		messages: {
			empleado: {
				required: "Ingresa tu número de empleado",
				number: "El número de empleado solo debe contener números"
			},
			pass: {
				required: "Ingresa la contraseña"
			}
		},
		submitHandler: function(form) {							
			submit();
		}
	});
});

//Send Login
function sendLogin() {
	$(".loader-login-container").css( "display", "block" );
	$("#respuesta-login").css( "display", "none" );

	$.post("validate_login.php", $("#login-form").serialize(), function(response) {
			$(".loader-login-container").css( "display", "none" );
			$("#respuesta-login").css( "display", "block" );
			if(response == "ok"){
				console.log('ejecutar redireccion');
				$(".loader-login-container").css( "display", "none" );
				$("#respuesta-login").html("<p class='success'><span>Inicio de sesión exitoso ...espera un momento</span><p>");
				$(location).attr('href','index.php');
			}else if(response == "error"){
				$("#respuesta-login").html("<p class='error'><span>El número de empleado o la contraseña son incorrectos</span><p>");
			}
	}); 
}

//Validate Register
$().ready(function() {	

	$("#registro").validate({
		rules: {
			carrera: {
				required: true
			},
			distancia: {
				required: true
			},
			email: {
				required: true,
				email: true
			},
			sindicalizado: {
				required: true
			},
			nombre: {
				required: true
			},
			apellidop: {
				required: true
			},
			apellidom: {
				required: true
			},
			edad: {
				required: true
			},
			sexo: {
				required: true
			},
			ciudad: {
				required: true
			},
			telefono: {
				required: true
			},
			talla: {
				required: true
			}
		},
		messages: {
			carrera: {
				required: "Selecciona la carrera"
			},
			distancia: {
				required: "Selecciona la distancia"
			},
			nombre: {
				required: "Ingresa tu nombre"
			},
			apellidop: {
				required: "Ingresa tu apellido paterno"
			},
			apellidom: {
				required: "Ingresa tu apellido materno"
			},
			email: {
				required: "Ingresa tu correo electrónico",
				email: "Correo electrónico inválido"
			},
			edad: {
				required: "Ingresa tu fecha de nacimiento"
			},
			sexo: {
				required: "Selecciona tu sexo"
			},
			sindicalizado: {
				required: "Selecciona si eres sindicalizado"
			},
			ciudad: {
				required: "Ingresa tu ciudad"
			},
			telefono: {
				required: "Ingresa tu teléfono"
			},
			talla: {
				required: "Selecciona la talla de playera"
			}
		},
		submitHandler: function(form) {							
			sendRegister();
		}
	});

});


//Send Register
function sendRegister() {
	$(".loader-register-container").css( "display", "block" );
	$("#respuesta-register").css( "display", "none" );
	$.post("registro_empleados.php", $("#registro").serialize(), function(response) {
			$(".loader-register-container").css( "display", "none" );
			$("#respuesta-register").css( "display", "block" );
			if(response == "ok"){
				$(".loader-register-container").css( "display", "none" );
				$("#respuesta-register").html("<p class='success'><span>Usted se ha inscrito correctamente a la carrera</span><p>");
				timedRefresh(3000);
			}else if(response == "error"){
				$("#respuesta-register").html("<p class='error'><span>Usted ya se ha inscrito a la carrera</span><p>");
			}
	}); 
}


//Validate Guest
$().ready(function() {	

	$("#registro_invitados").validate({
		rules: {
			carrera: {
				required: true
			},
			distancia: {
				required: true
			},
			email: {
				required: true,
				email: true
			},
			nombre: {
				required: true
			},
			apellidop: {
				required: true
			},
			apellidom: {
				required: true
			},
			edad: {
				required: true
			},
			sexo: {
				required: true
			},
			ciudad: {
				required: true
			},
			telefono: {
				required: true
			},
			talla: {
				required: true
			}
		},
		messages: {
			carrera: {
				required: "Selecciona la carrera"
			},
			distancia: {
				required: "Selecciona la distancia"
			},
			nombre: {
				required: "Ingresa tu nombre"
			},
			apellidop: {
				required: "Ingresa tu apellido paterno"
			},
			apellidom: {
				required: "Ingresa tu apellido materno"
			},
			email: {
				required: "Ingresa tu correo electrónico",
				email: "Correo electrónico inválido"
			},
			edad: {
				required: "Ingresa tu fecha de nacimiento"
			},
			sexo: {
				required: "Selecciona tu sexo"
			},
			ciudad: {
				required: "Ingresa tu ciudad"
			},
			telefono: {
				required: "Ingresa tu teléfono"
			},
			talla: {
				required: "Selecciona la talla de playera"
			}
		},
		submitHandler: function(form) {							
			sendGuest();
		}
	});

});


//Send Guest
function sendGuest() {
	$(".loader-register-container").css( "display", "block" );
	$("#respuesta-register").css( "display", "none" );
	$.post("registro_invitados.php", $("#registro_invitados").serialize(), function(response) {
			$(".loader-register-container").css( "display", "none" );
			$("#respuesta-register").css( "display", "block" );
			if(response == "ok"){
				$(".loader-register-container").css( "display", "none" );
				$("#respuesta-register").html("<p class='success'><span>Su invitado se ha inscrito correctamente a la carrera</span><p>");
				timedRefresh(3000);
			}else if(response == "error"){
				$("#respuesta-register").html("<p class='error'><span>Posiblemente su invitado ya ha sido inscrito a la carrera. Cambie la dirección de correo electrónico</span><p>");
			}
	}); 
}


//Validate Ninos
$().ready(function() {	

	$("#registro_ninos").validate({
		rules: {
			carrera: {
				required: true
			},
			nombre: {
				required: true
			},
			apellidop: {
				required: true
			},
			apellidom: {
				required: true
			},
			edad: {
				required: true
			},
			sexo: {
				required: true
			},
			talla: {
				required: true
			}
		},
		messages: {
			carrera: {
				required: "Selecciona la carrera"
			},
			nombre: {
				required: "Ingresa el nombre del niño"
			},
			apellidop: {
				required: "Ingresa el apellido paterno niño"
			},
			apellidom: {
				required: "Ingresa el apellido materno niño"
			},
			edad: {
				required: "Ingresa la edad del niño",
				range: "La edad del niños debe de ser entre 4 y 12 años para poder participar"
			},
			sexo: {
				required: "Selecciona el sexo niño"
			},
			talla: {
				required: "Selecciona la talla de playera niño"
			}
		},
		submitHandler: function(form) {							
			sendKid();
		}
	});

});


//Send Kid
function sendKid() {
	$(".loader-register-container").css( "display", "block" );
	$("#respuesta-register").css( "display", "none" );
	$.post("registro_ninos.php", $("#registro_ninos").serialize(), function(response) {
			$(".loader-register-container").css( "display", "none" );
			$("#respuesta-register").css( "display", "block" );
			if(response == "ok"){
				$(".loader-register-container").css( "display", "none" );
				$("#respuesta-register").html("<p class='success'><span>El niño se ha inscrito correctamente a la carrera</span><p>");
				timedRefresh(3000);
			}else if(response == "error"){
				$("#respuesta-register").html("<p class='error'><span>El niño ya ha inscrito a la carrera</span><p>");
			}
	}); 
}


//Datepicker
$().ready(function() {
	$("#age").on('change', function(){
		var age = $(this).val();
		if (age > 12){
			alert("Los niiños deben tener una edad menor o igual a 12 años para poder participar")
		}
		else if(age <= 12 && age >=10){
			$('#distance, #distance2').val('100 MTS');
		}
		else if(age < 10 && age >=8){
			$('#distance, #distance2').val('75 MTS');
		}
		else if(age < 8 && age >=6){
			$('#distance, #distance2').val('50 MTS');
		}
		else if(age < 6 && age >=4){
			$('#distance, #distance2').val('25 MTS');
		}
		else if (age < 4){
			alert("Los niños deben tener una edad mayor o igual a 4 años para poder participar")
		}
	});
});
