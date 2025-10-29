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
  // Evita avanzar hacia atrás sin restricciones
        if (newIndex < currentIndex) return true;

            let pasoCompletado = false; // 🔹 Controla si el AJAX fue exitoso

            // --------------------------
            // 🟢 PASO 1
            // --------------------------
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

                    if (this.type === "file" && this.files.length > 0) {
                        formData.append(this.name, this.files[0]);
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

                $.ajax({
                    url: clienteStoreRoute,
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    async: false, // ⚠️ Necesario para bloquear el flujo hasta recibir respuesta
                    beforeSend: function () {
                        toastr.info("Guardando datos del paso 1...");
                    },
                    success: function (response) {
                        const { id } = response.cliente;
                        $('#identy').val(id);
                        $('#identyCli').val(id);
                        toastr.success("Paso 1 guardado correctamente");
                        pasoCompletado = true;
                    },
                    error: function (xhr) {
                        toastr.error("Error al guardar el paso 1");
                        console.error(xhr.responseText);
                        pasoCompletado = false;
                    }
                });

                // Si el guardado falló, bloquea el paso
                if (!pasoCompletado) return false;
            }

            // --------------------------
            // 🟢 PASO 2
            // --------------------------
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

                // Validar tablas
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
                    url: compraLoteFracc,
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    async: false, // 🔒 Bloquea el flujo hasta respuesta
                    beforeSend: function () {
                        toastr.info("Guardando datos del paso 2...");
                    },
                    success: function (response) {
                        const { mensaje } = response;
                        const { id } = response.compra;
                        $('#compraIdenty').val(id);
                        toastr.success(mensaje);
                        pasoCompletado = true;
                    },
                    error: function (xhr) {
                        toastr.error("Error al guardar el paso 2");
                        console.error(xhr.responseText);
                        pasoCompletado = false;
                    }
                });

                // Si falló el guardado, bloquea el cambio de paso
                if (!pasoCompletado) return false;
            }

            // Si todo salió bien, permite avanzar
            return true;
        }, 
        onFinished: function (event, currentIndex) {
            console.log("Aqui este es el event", event);
            console.log("Este esel el currentIndex", event);
            
            document.getElementById('wizard-form').submit();
        }
    });
   
});
