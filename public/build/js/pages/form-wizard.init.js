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

            return true; // permite avanzar si todo está correcto
        }, 
        onFinished: function (event, currentIndex) {
            console.log("Aqui este es el event", event);
            console.log("Este esel el currentIndex", event);
            
            document.getElementById('wizard-form').submit();
        }
    });
   
});
