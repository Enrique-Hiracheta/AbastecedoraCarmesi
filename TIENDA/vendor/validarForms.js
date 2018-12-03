//*******************************************/
/************ CREATE Alexander **************/
/************ DATE: 08/10/2017 **************/
/********************************************/


var dataValidator = {

    feedbackIcons: {
        valid: 'fa fa-check',
        invalid: 'fa fa-times',
        validating: 'fa fa-refresh'
    },

    fields: {

        usuario: {
            validators: {
                notEmpty: {
                    message: 'El usuario es requerido'
                }
            }
        },

        contrasenia: {
            validators: {
                notEmpty: {
                    message: 'El contraseña es requerido'
                }
            }
        },

        usuarioSin: {
            validators: {
                notEmpty: {
                    message: 'X'
                }
            }
        },

        contraseniaSin: {
            validators: {
                notEmpty: {
                    message: 'X'
                }
            }
        },

        nombre: {
            validators: {
                notEmpty: {
                    message: 'El nombre es requerido'
                }
            }
        },

        apellidoPaterno: {
            validators: {
                notEmpty: {
                    message: 'El apellido es requerido'
                }
            }
        },

        email: {
            validators: {
                notEmpty: {
                    message: 'El correo es requerido y no puede ser vacio'
                },
                emailAddress: {
                    message: 'El correo electronico no es valido'
                }
            }
        },

        password: {
            validators: {
                notEmpty: {
                    message: 'El password es requerido y no puede ser vacio'
                },
                stringLength: {
                    min: 8,
                    message: 'El password debe contener al menos 8 caracteres'

                }
            }
        },

        datetimepicker: {
            validators: {
                notEmpty: {
                    message: 'La fecha de nacimiento es requerida y no puede ser vacia'
                },
                date: {
                    format: 'YYYY-MM-DD',
                    message: 'La fecha de nacimiento no es valida'
                }
            }
        },

        sexo: {
            validators: {
                notEmpty: {
                    message: 'El sexo es requerido'
                }
            }
        },

        curp: {
            validators: {
                notEmpty: {
                    message: 'El CURP es requerido'
                }
            }
        },

        telefono: {
            message: 'El teléfono no es valido',
            validators: {
                notEmpty: {
                    message: 'El teléfono es requerido y no puede ser vacio'
                },
                regexp: {
                    regexp: /^[0-9]+$/,
                    message: 'El teléfono solo puede contener números'
                }
            }
        },

        telefono_cel: {
            message: 'El teléfono no es valido',
            validators: {
                regexp: {
                    regexp: /^[0-9]+$/,
                    message: 'El teléfono solo puede contener números'
                }
            }
        }
    }
};


function validar(nombreFormulario) {
    "use strict";
    $('#' + nombreFormulario).bootstrapValidator(dataValidator)
        .on('success.form.bv', function (e) {
            // Prevent form submission
            e.preventDefault();

        });
}

function validarLogin(nombreFormulario) {
    "use strict";
    $('#' + nombreFormulario).bootstrapValidator(dataValidator)
        .on('success.form.bv', function (e) {
            // Prevent form submission
            e.preventDefault();
            var usuario = $("#usuarioSin").val();
            var contraseña = $("#contraseniaSin").val();
            if (usuario == "" || contraseña == "") {
                return false;
            } else {
                //Construimos la variable que se guardará en el data del Ajax para pasar al archivo php que procesará los datos
                var datos = {
                    'usuario': usuario,
                    'contrasenia': contraseña
                }

                $.ajax({
                    type: "POST",
                    url: "controller/acceso_controller.php",
                    data: datos,
                    success: function (data) {
                        if (!data) {
                            fnCorrecto("Correcto!");
                            location.reload();
                        } else {
                            fnError("Error al iniciar sesión");
                        }

                    },
                    error: function () {
                        fnError("Error al iniciar sesión");
                    }

                });
            } //Fin else


        });
}

$(document).ready(function () {
    "use strict";
    validar("altaUsuario");
});
