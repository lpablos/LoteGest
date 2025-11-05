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
                        primeraClausula();
                        clonarTablaPrevia();
                        segundaClausula();
                        generarFechaActualLarga()
                        datosVededorCliente()
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


function clonarTablaPrevia() { 
    const copia = $("#contenedor-tablas").clone(true, true);
    $("#tabla_preview_id").html(copia);
}


function primeraClausula(){
    let lotes = $("select[name='lote[]']").map(function (index) {
    // Texto del lote seleccionado
    let loteTexto = $(this).find("option:selected").text().trim();
    // Texto de la manzana correspondiente (mismo índice)
    let manzanaTexto = $("select[name='manzana[]']").eq(index).find("option:selected").text().trim();
    // Validar que ambos tengan valor
    if (loteTexto && loteTexto.toLowerCase() !== 'selecciona un lote' && 
        manzanaTexto && manzanaTexto.toLowerCase() !== 'selecciona una manzana') {
        return { lote: loteTexto, manzana: manzanaTexto };
    }
    }).get();
    // Agrupar lotes por manzana
    let agrupado = {};
    lotes.forEach(({ lote, manzana }) => {
        if (!agrupado[manzana]) agrupado[manzana] = [];
        agrupado[manzana].push(lote);
    });
    // Construir texto final
    let partes = Object.entries(agrupado).map(([manzana, lotes]) => {
        if (lotes.length > 1) {
            return `${lotes.join(", ")} que pertenecen a la ${manzana}`;
        } else {
            return `${lotes[0]} que pertenece a la ${manzana}`;
        }
    });
    // Insertar en el span
    $("#primera_lotes").text(partes.join(" y "));
    // Y reflejarlo en el textarea (vista previa)
    $("#textoContrato").val($("#condicion1").text());
}

function segundaClausula(){
    $("#precio_venta_segundo").text($("#total_venta").val()+' '+numeroALetras($("#total_venta").val()));
    $("#precio_enganche_segundo").text($("#enganche_venta").val()+' '+numeroALetras($("#enganche_venta").val()));
    const restante = parseFloat($("#total_venta").val()) - parseFloat($("#enganche_venta").val());
    $("#restante_segundo").text(restante.toFixed(2)+' '+numeroALetras(restante.toFixed(2)));
    $("#mensualidades_pago_segundo").text($("#mensualidades_venta_asc option:selected").text());
    $("#pago_mensualidad_segundo").text($("#pago_mensual_venta").val()+' '+numeroALetras($("#pago_mensual_venta").val()));
    $("#textoContratoSegunda").val($("#segundaClausula").text());
    $("#fecha_asc").val();
}  


function numeroALetras(num) {
    const unidades = ['', 'uno', 'dos', 'tres', 'cuatro', 'cinco', 'seis', 'siete', 'ocho', 'nueve'];
    const especiales = ['diez', 'once', 'doce', 'trece', 'catorce', 'quince', 'dieciséis', 'diecisiete', 'dieciocho', 'diecinueve'];
    const decenas = ['', '', 'veinte', 'treinta', 'cuarenta', 'cincuenta', 'sesenta', 'setenta', 'ochenta', 'noventa'];
    const centenas = ['', 'cien', 'doscientos', 'trescientos', 'cuatrocientos', 'quinientos', 'seiscientos', 'setecientos', 'ochocientos', 'novecientos'];

    function convertir(num) {
        if (num === 0) return 'cero';
        if (num < 10) return unidades[num];
        if (num < 20) return especiales[num - 10];
        if (num < 100) {
            const dec = Math.floor(num / 10);
            const uni = num % 10;
            if (dec === 2 && uni !== 0) return 'veinti' + unidades[uni];
            return decenas[dec] + (uni ? ' y ' + unidades[uni] : '');
        }
        if (num < 1000) {
            const cen = Math.floor(num / 100);
            const resto = num % 100;
            if (cen === 1 && resto > 0) return 'ciento ' + convertir(resto);
            return centenas[cen] + (resto ? ' ' + convertir(resto) : '');
        }
        if (num < 1000000) {
            const miles = Math.floor(num / 1000);
            const resto = num % 1000;
            if (miles === 1) return 'mil ' + convertir(resto);
            return convertir(miles) + ' mil' + (resto ? ' ' + convertir(resto) : '');
        }
        if (num < 1000000000) {
            const millones = Math.floor(num / 1000000);
            const resto = num % 1000000;
            if (millones === 1) return 'un millón ' + convertir(resto);
            return convertir(millones) + ' millones' + (resto ? ' ' + convertir(resto) : '');
        }
        return 'Número demasiado grande';
    }

    num = parseFloat(num);
    if (isNaN(num)) return '';

    const partes = num.toFixed(2).split('.');
    const entero = parseInt(partes[0]);
    const centavos = partes[1];

    let texto = convertir(entero).trim();
    texto = texto.charAt(0).toUpperCase() + texto.slice(1);

    return `${texto} pesos ${centavos}/100 M.N.`;
}


function generarFechaActualLarga() {
    const hoy = new Date();
    const meses = [
        "enero", "febrero", "marzo", "abril", "mayo", "junio",
        "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"
    ];

    const dia = hoy.getDate();
    const mes = meses[hoy.getMonth()];
    const año = hoy.getFullYear();
    $("#fecha_asc_dato").val(`${dia} de ${mes} de ${año}.`)
}


function datosVededorCliente(){
    $("#representante_firma").val($("#vendedor_propietario_asc").val());
    $("#comprador_firma").val($("#nombre_comprador").val()+' '+$("#primer_ap_comprador").val()+' '+$('#segundo_ap_comprador').val());
}
