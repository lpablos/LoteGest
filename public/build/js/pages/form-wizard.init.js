/*
Template Name: Skote - Admin & Dashboard Template
Author: Themesbrand
Website: https://themesbrand.com/
Contact: themesbrand@gmail.com
File: Form wizard Js File
*/


// $(function () {
//     $("#basic-example").steps({
//         headerTag: "h3",
//         bodyTag: "section",
//         transitionEffect: "slide"
//     });


//     $("#vertical-example").steps({
//         headerTag: "h3",
//         bodyTag: "section",
//         transitionEffect: "slide",
//         stepsOrientation: "vertical"
//     });
// });


$(function () {
    $("#basic-example").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slide",
        autoFocus: true,
        onStepChanging: function (event, currentIndex, newIndex) {
            if (currentIndex === 0 && newIndex > 0) {

                let isValid = true; 
                let formData = new FormData();
                $("#basic-example section").eq(0).find("input, select, textarea").each(function () {
                    const $field = $(this);
                    const value = $field.val();
                    if ($field.prop("required")) {
                        if (!value || value.trim() === "") {
                            isValid = false;
                            $field.addClass("is-invalid");
                            toastr.warning(`El campo "${$field.attr("name")}" es obligatorio.`);
                        } else {
                            $field.removeClass("is-invalid");
                        }
                    }
                    if (this.type === "file") {
                        if (this.files.length > 0) {
                            formData.append(this.name, this.files[0]);
                        }
                    } else {
                        formData.append(this.name, value);
                    }
                });
                if (!isValid) {
                    toastr.error("Por favor completa todos los campos obligatorios antes de continuar.");
                    return false; 
                }
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                formData.append("_token", csrfToken);

                // Enviar por AJAX
                $.ajax({
                    url: clienteStoreRoute,
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                        toastr.info("Guardando datos del paso 1...");
                    },
                    success: function(response) {
                        toastr.success("Paso 1 guardado correctamente");
                        console.log("Respuesta:", response);
                        const {id} = response.cliente;                        
                        $('#identy').val(id);
                    },
                    error: function(xhr) {
                        
                        toastr.error("Error al guardar el paso 1");
                        console.error(xhr.responseText);
                        return false; 
                    }
                });
            }


            if (currentIndex === 1 && newIndex > 1) {
                let isValid = true;
                let formData = new FormData();

                $("#basic-example-p-1").find("input, select, textarea").each(function () {
                    const $field = $(this);
                    const value = $field.val();
                    if ($field.prop("required")) {
                        if (!value || value.trim() === "") {
                            isValid = false;
                            $field.addClass("is-invalid");
                            toastr.warning(`El campo "${$field.attr("name")}" es obligatorio.`);
                        } else {
                            $field.removeClass("is-invalid");
                        }
                    }

                    if (this.type === "file" && this.files.length > 0) {
                        formData.append(this.name, this.files[0]);
                    } else {
                        formData.append(this.name, value);
                    }
                });
                
                // Validar las tablas dentro de contenedor-tablas
                $("#contenedor-tablas .tabla-item table tbody tr").each(function (index, row) {
                    $(row).find("input[required]").each(function () {
                        const $input = $(this);
                        if (!$input.val() || $input.val().trim() === "") {
                            isValid = false;
                            $input.addClass("is-invalid");
                            toastr.warning(`Por favor completa el campo "${$input.attr("name")}" en la fila ${index + 1}`);
                        } else {
                            $input.removeClass("is-invalid");
                        }
                    });
                });

                if (!isValid) {
                    toastr.error("Por favor completa todos los campos obligatorios antes de continuar.");
                    return false;
                }

                formData.append("_token", $('meta[name="csrf-token"]').attr('content'));

                $.ajax({
                    url: compraLoteFracc, // <-- Cambia a la ruta de paso 1
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    async: false,
                    beforeSend: function() {
                        toastr.info("Guardando datos del paso 2...");
                    },
                    success: function(response) {
                        console.log("Este es el response paso 1", response);
                        
                        toastr.success("Paso 2 guardado correctamente");
                    },
                    error: function(xhr) {
                        toastr.error("Error al guardar el paso 2");
                        console.error(xhr.responseText);
                        return false;
                    }
                });
            }



            return true; // permite avanzar si todo está correcto
        }, 
        onFinished: function (event, currentIndex) {
            console.log("Aqui este es el event", event);
            console.log("Este esel el currentIndex", event);
            
            document.getElementById('wizard-form').submit();
        }
    });
   
});
