<?php $__env->startSection('title'); ?>
    Clientes
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('build/libs/toastr/build/toastr.min.css')); ?>">
    <link href="<?php echo e(URL::asset('build/libs/select2/css/select2.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(URL::asset('build/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')); ?>" rel="stylesheet"
        type="text/css">
    <link href="<?php echo e(URL::asset('build/libs/spectrum-colorpicker2/spectrum.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(URL::asset('build/libs/bootstrap-timepicker/css/bootstrap-timepicker.min.css')); ?>" rel="stylesheet"
        type="text/css">
    <link href="<?php echo e(URL::asset('build/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css')); ?>" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="<?php echo e(URL::asset('build/libs/@chenfengyuan/datepicker/datepicker.min.css')); ?>">
    <link href="<?php echo e(URL::asset('build/libs/dropzone/dropzone.css')); ?>" rel="stylesheet" type="text/css" />
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            line-height: 1.4;
            margin: 20px;
            text-align: justify; /* Justificado */
        }
        h1 {
            text-align: center;
            font-size: 16px;
            margin-bottom: 10px;
        }
        h2 {
            text-align: center;
            font-size: 16px;
            margin-bottom: 10px;
        }
        h3 {
            text-align: center;
            /* font-size: 16px; */
            /* margin-bottom: 10px; */
        }

       .text-right {
            text-align: right;
        }

        hr {
            border: 1px dashed #000;
            margin: 15px 0;
        }
        .clausula {
            margin-bottom: 15px;
        }
        .firma {
            margin-top: 50px;
            width: 100%;
            display: flex;
            justify-content: space-between;
        }
        .firma div {
            text-align: center;
        }
        .observaciones {
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th, td {
            padding: 6px;
            text-align: center;
        }

        .tabla-firmas {
            width: 100%;
            border-collapse: collapse;
        }

        .tabla-firmas .celda {
            width: 50%;
            padding: 8px;
            vertical-align: middle;
        }

        .tabla-firmas .vacia {
            height: 30px; /* espacio para firma */
            border-bottom: 1px solid #000;
        }

        .tabla-firmas .vendedor {
            text-align: center;
        }

        .tabla-firmas .comprador {
            text-align: center;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <form id="wizard-form" action="<?php echo e(route('cliente.store')); ?>" method="post"  enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="card">
                 <div id="basic-example">
                    <?php echo $__env->make('pages.cliente.pasos.personales', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php echo $__env->make('pages.cliente.pasos.compra', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php echo $__env->make('pages.cliente.pasos.contratos', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php echo $__env->make('pages.cliente.pasos.preview', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>       
                    <?php echo $__env->make('pages.cliente.pasos.contrato', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>                   
                </div>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <!-- toastr plugin -->
    <script>
        const clienteStoreRoute = "<?php echo e(route('cliente.store')); ?>";
        const compraLoteFracc = "<?php echo e(route('compra-fraccionamiento-lotes.store')); ?>"
        const fraccManzanaLoteRoute = "<?php echo e(route('fracc.Manzana.lote',['idFracc' => 1])); ?>"
        const vientosFraccionamientoUrl = "<?php echo e(route('vientos.fraccion.identy',['idFracc' => 1])); ?>"
        const objFraccDetalle = "<?php echo e(route('fracc.detalle.registro',['idFracc' => 1])); ?>"
        const contratoStoreRoute = "<?php echo e(route('contratos.store')); ?>";
        


        
        
        // console.log("Esta es la ruta nueva -->",compraLoteFracc);
        
        
    </script>
    <script src="<?php echo e(URL::asset('build/libs/toastr/build/toastr.min.js')); ?>"></script>
    <!-- toastr init -->
    <script src="<?php echo e(URL::asset('build/js/pages/toastr.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/select2/js/select2.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/spectrum-colorpicker2/spectrum.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/bootstrap-timepicker/js/bootstrap-timepicker.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/@chenfengyuan/datepicker/datepicker.min.js')); ?>"></script>
    <!-- form repeater js -->
    <script src="<?php echo e(URL::asset('build/libs/jquery.repeater/jquery.repeater.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/pages/form-repeater.int.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/dropzone/dropzone-min.js')); ?>"></script>

    <!-- Form file upload init js -->
    <script src="<?php echo e(URL::asset('build/js/pages/form-file-upload.init.js')); ?>"></script>

    <!-- form advanced init -->
    <script src="<?php echo e(URL::asset('build/js/pages/form-advanced.init.js')); ?>"></script>

    <!-- jquery step -->
    <script src="<?php echo e(URL::asset('build/libs/jquery-steps/build/jquery.steps.min.js')); ?>"></script>

    <!-- form wizard init -->
    <script src="<?php echo e(URL::asset('build/js/pages/form-wizard.init.js')); ?>"></script>

   
    <script>
        
        window.datosCompra =<?php echo json_encode($datosCompra ?? [], 15, 512) ?>;
    </script>

    <script>
        $(document).ready(function () {

             // 👉 Aquí recibes los datos de Laravel
            let datos = window.datosCompra;
            let modoCargando = false;

            let $fraccSelect = $('#fracc_id');
            
            if(datos.length > 0){
                console.log("esta es la data -->", datos);
                
                const {cliente, corredor, estado, fraccionamiento, compralotelinderos} = datos[0]

                console.log("Este es el cliente", cliente);
                // Segmento del clinte
                $("#identy").val(cliente.id);
                $("#no_cliente").val(cliente.no_cliente)
                $("#nombre_comprador").val(cliente.nombre)
                $("#primer_ap_comprador").val(cliente.primer_apellido)
                $("#segundo_ap_comprador").val(cliente.segundo_apellido)
                $("#telefono_comprador").val(cliente.telefono)
                $("#fecha_nacimiento").val(cliente.fecha_nacimiento.split("T")[0])
                $("#correo_electronico_comprador").val(cliente.email)
                $("#num_contacto_comprador").val(cliente.num_contacto)
                $("#parentesco_comprador").val(cliente.parentesco)

                // Datos de compra
                $("#identyCli").val(cliente.id)
                $("#compraIdenty").val(datos[0].id)
                $("#num_solicitud").val(datos[0].num_solicitud)                
                $("#btn_add_compra").prop('disabled', false);
                setTimeout(() => {
                    $("#corredor").val(corredor.id).trigger("change");
                    $("#entidad_id").val(datos[0].estado_id).trigger("change");
                    $("#mpio_id").val(estado.id).trigger("change");
                    $("#tipoVentaSelect").val(datos[0].venta_tp).trigger("change");
                    $("#fracc_id").val(fraccionamiento.id).trigger("change");   

                    
                }, 1000);
                setTimeout(() => {
                    modoCargando = true;
                    compralotelinderos.forEach(registro => {
                        agregarBloque(registro);
                    });
                    setTimeout(() => {
                        modoCargando = false;                        
                    }, 1000);
                }, 1500);

                document.getElementById('resumen_compra').style.display = 'block';


                // Resumen de compra
                $("#superficiel_venta").val(datos[0].superficiel_venta);
                $("#total_venta").val(datos[0].total_venta);
                setTimeout(() => {
                    $("#enganche_venta_select").val(datos[0].enganche_venta_select).trigger("change");
                    $("#mensualidad_venta_select").val(datos[0].mensualidad_venta_select).trigger("change");
                    setTimeout(() => {
                        $("#enganche_venta").val(datos[0].enganche_venta);
                        $("#pago_mensual_venta").val(datos[0].ago_mensual_venta);                                            
                    }, 200);
                }, 2000);

                
               
            }


            
            let contadorLotes = 0;
            let contadorTablas = 0; 
            
            let dataManzanasLotes = '';
            let opcionesManzanas = '';

            let opcionesVientos = {};

            let detalleFraccionamiento = {}


            const $btn = $('#btn_add_compra');
            const $contenedor = $('#contenedor-compra');
            const $spanContador = $('#contador-lotes');

           

            if ($btn.length === 0) {
                // console.error('No existe el botón con id #btn_add_compra en el DOM');
                return;
            }
            if ($contenedor.length === 0) {
                // console.error('No existe el contenedor con id #contenedor-compra en el DOM');
                return;
            }
            if ($spanContador.length === 0) {
                // Si no existe el span del contador, crearlo opcionalmente
                $contenedor.before('<div class="text-center mt-2 pt-2"><strong>Total de lotes agregados:</strong> <span id="contador-lotes">0</span></div>');
                
            }


            

            // Función para actualizar contador en pantalla
            function actualizarContador() {
                $('#contador-lotes').text(contadorLotes);
            }

            function selectManzas (){
                opcionesManzanas = '<option value="" disabled selected>Selecciona una manzana</option>';
                dataManzanasLotes.forEach(m => {
                    opcionesManzanas += `<option value="${m.id}">Manzana ${m.num_manzana}</option>`;
                });
            }

            // Función que crea y agrega un bloque
            // function agregarBloque() {
            //     const bloque = $(`
            //         <div class="row col-md-12 mb-3 pt-4 lote-item" id=${contadorLotes}>
            //             <div class="col-md-3 mb-4">
            //                 <label>Manzana</label>                            
            //                 <select class="form-select form-select-sm manzanaSelect" name="manzana[]" required style="cursor: pointer;">
            //                     ${opcionesManzanas}
            //                 </select>
            //             </div>
            //             <div class="col-md-2 mb-4">
            //                 <label>Lote</label>
            //                 <select class="form-select form-select-sm loteSelect" name="lote[]" required style="cursor: pointer;">
            //                     <option value="" disabled selected>Selecciona un lote</option>
            //                 </select>
            //             </div>
            //             <div class="col-md-3 mb-4">
            //                 <label>Superficie m2</label>
            //                 <input type="number" min="1" step="0.01" name="superficie_m2[]" class="form-control form-control-sm" required>
            //             </div>                      
            //             <div class="col-md-3 mb-4">
            //                 <label>Precio</label>
            //                 <input type="text" step="0.01" name="precio[]" class="form-control form-control-sm precioInput" required>
            //             </div>
            //             <div class="col-md-1 mb-4 d-flex align-items-end">
            //                 <button type="button" class="btn btn-sm btn-danger btn-eliminar" title="Eliminar lote">✖</button>
            //             </div>
            //         </div>
            //     `);

            //     // Agregar al contenedor y actualizar contador
            //     $contenedor.append(bloque);
            //     contadorLotes++;
            //     actualizarContador();
                // agregarTabla();                    
                
            // }
            function agregarBloque(data = null) {
                const bloque = $(`
                    <div class="row col-md-12 mb-3 pt-4 lote-item" id="bloque_${contadorLotes}">
                        <div class="col-md-3 mb-4">
                            <label>Manzana</label>
                            <select class="form-select form-select-sm manzanaSelect" name="manzana[]" required>
                                ${opcionesManzanas}
                            </select>
                        </div>

                        <div class="col-md-2 mb-4">
                            <label>Lote</label>
                            <select class="form-select form-select-sm loteSelect" name="lote[]" required>
                                <option value="" disabled selected>Selecciona un lote</option>
                            </select>
                        </div>

                        <div class="col-md-3 mb-4">
                            <label>Superficie m2</label>
                            <input type="number" min="1" step="0.01" 
                                name="superficie_m2[]" 
                                class="form-control form-control-sm superficieInput" required>
                        </div>

                        <div class="col-md-3 mb-4">
                            <label>Precio</label>
                            <input type="text" step="0.01" 
                                name="precio[]" 
                                class="form-control form-control-sm precioInput" required>
                        </div>

                        <div class="col-md-1 mb-4 d-flex align-items-end">
                            <button type="button" class="btn btn-sm btn-danger btn-eliminar">✖</button>
                        </div>
                    </div>
                `);

                $contenedor.append(bloque);
                contadorLotes++;
                actualizarContador();
                // Si se enviaron datos → rellenar automáticamente
                if (data) {
                    setTimeout(() => {
                        // 1. Seleccionar manzana
                        bloque.find(".manzanaSelect").val(data.lote.manzana_id).trigger("change");
                        // 2. Cargar lotes en ese select (debes tener una función que llene los lotes)
                        bloque.find(".loteSelect").val(data.lote_id).trigger("change");
                    }, 200);
                    // 3. Superficie
                    bloque.find(".superficieInput").val(data.superficie_m2);
                    // 4. Precio
                    bloque.find(".precioInput").val(data.precio);
                }
                // console.log("Esta es al data ",data);
                setTimeout(() => {
                    agregarTabla(data)
                    
                }, 300);

               
            }


            $(document).on('change', '.manzanaSelect', function() {
                const manzanaId = parseInt($(this).val());
                const $bloque = $(this).closest('.lote-item'); 
                const $selectLote = $bloque.find('.loteSelect');

                // Buscar manzana correspondiente en el JSON
                const manzana = dataManzanasLotes.find(m => m.id === manzanaId);

                // Limpiar y llenar el select de lotes
                let opcionesLotes = '<option value="" disabled selected>Selecciona un lote</option>';
                if (manzana && manzana.lotes) {
                    manzana.lotes.forEach(l => {
                        opcionesLotes += `<option value="${l.id}">Lote ${l.num_lote}</option>`;
                    });
                }
                $selectLote.html(opcionesLotes);

                
            });

            // Evento click: agrega 1 bloque por click
            $btn.on('click', function () {
                agregarBloque();
                document.getElementById('resumen_compra').style.display = 'block';
            });

            // Delegación: eliminar bloque con botón (disminuye contador)
            $contenedor.on('click', '.btn-eliminar', function () {
                $(this).closest('.lote-item').remove();
                contadorLotes = Math.max(0, contadorLotes - 1);

                if(contadorLotes === 0){
                    limpiarVentaGenerales()
                }
                actualizarContador();
                actualizarTotalVenta();
                verificarManzanasYLotes();
                
              
            });

            function limpiarVentaGenerales(){
                const contenedor = document.querySelector('.lote-item-venta');
                // Limpia todos los <input> y <select> dentro de él
                contenedor.querySelectorAll('input, select').forEach(el => {
                    if (el.tagName === 'SELECT') {
                        el.selectedIndex = 0; // regresa al primer option
                    } else {
                        el.value = ''; // limpia el valor
                    }
                });
                document.getElementById('resumen_compra').style.display = 'none';
            }

            // function agregarTabla() {
            //     contadorTablas++;

            //     const tabla = $(`
            //         <div class="row col-md-12 mb-3 tabla-item">                        
            //             <table class="table table-bordered border-primary mb-0 table">
            //                 <thead>
            //                     <tr>
            //                         <th>Vientos</th>
            //                         <th>Metros</th>
            //                         <th>Colindancia</th>
            //                         <th>Descripción</th>
            //                     </tr>
            //                 </thead>
            //                 <tbody>
            //                     <tr>
            //                         <td>${opcionesVientos.viento1}</td>
            //                         <td>
            //                             <input type="text" step="0.01" name="viento1[]" class="form-control form-control-sm" required>
            //                         </td>
            //                         <td>Colindando con:</td>
            //                         <td>
            //                             <input type="text" name="colinda1[]" class="form-control form-control-sm" required>
            //                         </td>
            //                     </tr>
            //                     <tr>
            //                         <td>${opcionesVientos.viento2}</td>
            //                         <td>
            //                             <input type="text" step="0.01" name="viento2[]" class="form-control form-control-sm" required>
            //                         </td>
            //                         <td>Colindando con:</td>
            //                         <td>
            //                             <input type="text" name="colinda2[]" class="form-control form-control-sm" required>
            //                         </td>
            //                     </tr>
            //                     <tr>
            //                         <td>${opcionesVientos.viento3}</td>
            //                         <td>
            //                             <input type="text" step="0.01" name="viento3[]" class="form-control form-control-sm" required>
            //                         </td>
            //                         <td>Colindando con:</td>
            //                         <td>
            //                             <input type="text" name="colinda3[]" class="form-control form-control-sm" required>
            //                         </td>
            //                     </tr>
            //                     <tr>
            //                         <td>${opcionesVientos.viento4}</td>
            //                         <td>
            //                             <input type="text" step="0.01" name="viento4[]" class="form-control form-control-sm" required>
            //                         </td>
            //                         <td>Colindando con:</td>
            //                         <td>
            //                             <input type="text" name="colinda4[]" class="form-control form-control-sm" required>
            //                         </td>
            //                     </tr>
            //                 </tbody>
            //             </table>
            //         </div>
            //     `);

            //     $('#contenedor-tablas').append(tabla);
            // }
            function agregarTabla(data = null) {
                
                
                contadorTablas++;

                const tabla = $(`
                    <div class="row col-md-12 mb-3 tabla-item">                        
                        <table class="table table-bordered border-primary mb-0 table">
                            <thead>
                                <tr>
                                    <th>Vientos</th>
                                    <th>Metros</th>
                                    <th>Colindancia</th>
                                    <th>Descripción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>${opcionesVientos.viento1}</td>
                                    <td><input type="text" name="viento1[]" class="form-control form-control-sm viento1Input" required></td>
                                    <td>Colindando con:</td>
                                    <td><input type="text" name="colinda1[]" class="form-control form-control-sm colinda1Input" required></td>
                                </tr>
                                <tr>
                                    <td>${opcionesVientos.viento2}</td>
                                    <td><input type="text" name="viento2[]" class="form-control form-control-sm viento2Input" required></td>
                                    <td>Colindando con:</td>
                                    <td><input type="text" name="colinda2[]" class="form-control form-control-sm colinda2Input" required></td>
                                </tr>
                                <tr>
                                    <td>${opcionesVientos.viento3}</td>
                                    <td><input type="text" name="viento3[]" class="form-control form-control-sm viento3Input" required></td>
                                    <td>Colindando con:</td>
                                    <td><input type="text" name="colinda3[]" class="form-control form-control-sm colinda3Input" required></td>
                                </tr>
                                <tr>
                                    <td>${opcionesVientos.viento4}</td>
                                    <td><input type="text" name="viento4[]" class="form-control form-control-sm viento4Input" required></td>
                                    <td>Colindando con:</td>
                                    <td><input type="text" name="colinda4[]" class="form-control form-control-sm colinda4Input" required></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                `);

                $('#contenedor-tablas').append(tabla);

                // Si hay datos → rellenar automáticamente
                if (data) {
                    tabla.find(".viento1Input").val(data.lindero.viento1);
                    tabla.find(".colinda1Input").val(data.lindero.colinda1);

                    tabla.find(".viento2Input").val(data.lindero.viento2);
                    tabla.find(".colinda2Input").val(data.lindero.colinda2);

                    tabla.find(".viento3Input").val(data.lindero.viento3);
                    tabla.find(".colinda3Input").val(data.lindero.colinda3);

                    tabla.find(".viento4Input").val(data.lindero.viento4);
                    tabla.find(".colinda4Input").val(data.lindero.colinda4);
                }
            }




            $fraccSelect.on('change', function () {
                const fraccId = $(this).val();

                if (!fraccId) return;               
                
                const fraccUrl = fraccManzanaLoteRoute.replace(/\/\d+$/, `/${fraccId}`);
                
                $.ajax({
                    url: fraccUrl, 
                    method: 'GET',
                    dataType: 'json',
                    success: function (data) {                       
                        dataManzanasLotes = data[0]
                        selectManzas();  
                        $("#fracc_id")    
                        document.getElementById('btn_add_compra').disabled = false;   
                        vientosFraccionamiento(fraccId); 
                    },
                    error: function (xhr, status, error) {
                        console.error('Error al obtener fraccionamiento:', error);
                    }
                });
            });

            function vientosFraccionamiento(fraccIdd) {              
                const fraccId = fraccIdd;
                if (!fraccId) return;

                const fraccUrlLote = vientosFraccionamientoUrl.replace(/\/\d+$/, `/${fraccId}`);

                $.ajax({
                    url: fraccUrlLote, 
                    method: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        opcionesVientos = data[0];
                        // console.log("Esto es --> ", opcionesVientos);                        
                    },
                    error: function (xhr, status, error) {
                        console.error('Error al obtener los vientos:', error);
                    }
                });
            }



            // Evento: cada vez que se cambia un precio (manual o por código)
            $(document).on('input change', 'input[name="precio[]"]', function() {
                actualizarTotalVenta();
            });

            function actualizarTotalVenta() {
                let total = 0;

                // Recorre todos los inputs con nombre "precio[]"
                $('input[name="precio[]"]').each(function() {
                    const valor = parseFloat($(this).val()) || 0; // convierte a número o 0 si está vacío
                    total += valor;
                });

                // Asigna el total en el input correspondiente
                $('#total_venta').val(total.toFixed(2));
            }

            // Detecta cambios o tipeo en cualquier campo de superficie
            $(document).on('input change', 'input[name="superficie_m2[]"]', function() {
                actualizarTotalSuperficie();
            });

            
            function actualizarTotalSuperficie() {
                let totalSuperficie = 0;
                $('input[name="superficie_m2[]"]').each(function() {
                    const valor = parseFloat($(this).val()) || 0;
                    totalSuperficie += valor;
                });
                $('input[name="superficiel_venta"]').val(totalSuperficie.toFixed(2));
            }

            $(document).on('change', '.manzanaSelect', function() {
                // Array para almacenar todos los enganches seleccionados, sin duplicados
                let enganchesUnicos = [];

                // Recorremos todos los select de manzana
                $('select[name="manzana[]"]').each(function() {
                    const manzanaId = parseInt($(this).val());
                    
                    
                    if (!manzanaId) return;

                    // Buscar la manzana en el objeto
                    const manzana = dataManzanasLotes.find(m => m.id === manzanaId);
                    if (manzana && manzana.enganche) {
                        if (!enganchesUnicos.includes(manzana.enganche)) {
                            enganchesUnicos.push(manzana.enganche);
                        }
                    }
                });

                // console.log("Esto tienes", enganchesUnicos);
                

                // Recorremos todos los bloques para actualizar el select de tipoVenta/enganche
                $('.lote-item').each(function() {
                    const $engancheVentaSelect = $(this).find('.engancheVentaSelect');

                    // Guardar la opción vacía inicial
                    const vacio = '<option value="" selected>Selecciona una opción</option>';

                    // Reconstruir todas las opciones
                    let opciones = vacio;
                    enganchesUnicos.forEach(e => {
                        opciones += `<option value="${e}">${e} % </option>`;
                    });

                    $engancheVentaSelect.html(opciones);
                });
            });


            $(document).on('change', '.engancheVentaSelect', function() {
                // Obtenemos el porcentaje seleccionado
                const porcentaje = parseFloat($(this).val());
                if (isNaN(porcentaje)) return;

                // Buscamos el total de venta
                const totalVenta = parseFloat($('#total_venta').val()) || 0;

                // Calculamos el enganche
                const valorEnganche = (totalVenta * porcentaje) / 100;

                // Ponemos el resultado en el input correspondiente
                $(this).closest('.lote-item')
                    .find('input[name="enganche_venta"]')
                    .val(valorEnganche.toFixed(2)); // 2 decimales
            });


            $(document).on('change', '.manzanaSelect', function() {
                // Array para almacenar todas las mensualidades seleccionadas, sin duplicados
                let mensualidadesUnicas = [];

                // Recorremos todos los select de manzana
                $('select[name="manzana[]"]').each(function() {
                    const manzanaId = parseInt($(this).val());
                    if (!manzanaId) return;

                    // Buscar la manzana en el objeto
                    const manzana = dataManzanasLotes.find(m => m.id === manzanaId);
                    if (manzana && manzana.mensualidades) {
                        if (!mensualidadesUnicas.includes(manzana.mensualidades)) {
                            mensualidadesUnicas.push(manzana.mensualidades);
                        }
                    }
                });
                // Recorremos todos los bloques para actualizar el select de mensualidades
                $('.lote-item').each(function() {
                    const $mensualidadSelect = $(this).find('.mensualidadVentaSelect');

                    // Opción vacía inicial
                    const vacio = '<option value="" selected disabled>Selecciona una opción</option>';

                    // Reconstruir todas las opciones
                    let opciones = vacio;
                    mensualidadesUnicas.forEach(m => {
                        opciones += `<option value="${m}">${m} mensualidades</option>`;
                    });

                    $mensualidadSelect.html(opciones);
                });
            });


            $(document).on('change', '.mensualidadVentaSelect', function() {
                const mensualidades = parseInt($(this).val());
                const totalVenta = parseFloat($('#total_venta').val()) || 0;
                const engancheVenta = parseFloat($('input[name="enganche_venta"]').val()) || 0;

                if (mensualidades > 0 && totalVenta > 0) {
                    // Calcular el resto y dividirlo entre el número de mensualidades
                    const restante = totalVenta - engancheVenta;
                    const pagoMensual = restante / mensualidades;

                    // Mostrar el resultado con 2 decimales
                    $('#pago_mensual_venta').val(pagoMensual.toFixed(2));
                } else {
                    // Si falta algún dato, limpiar el campo
                    $('#pago_mensual_venta').val('');
                }
            });

          // Evento: cuando el usuario selecciona una manzana
            $(document).on('change', '.manzanaSelect', function () {
                const manzanaId = parseInt($(this).val()); // id de la manzana seleccionada
                const tipoVenta = $('#tipoVentaSelect').val(); // tipo de venta global

                // Si no hay selección válida, salir
                if (!manzanaId || !tipoVenta) {
                    // console.warn('Debe seleccionar tipo de venta y manzana.');
                    return;
                }

                // Buscar la manzana correspondiente en el arreglo global
                const manzanaSeleccionada = dataManzanasLotes.find(m => m.id === manzanaId);

                if (!manzanaSeleccionada) {
                    // console.error('No se encontró la manzana seleccionada.');
                    return;
                }

                // Obtener el precio según el tipo de venta
                const precio = manzanaSeleccionada[tipoVenta];

                // Buscar el input .precioInput dentro de la misma fila y asignarle el precio
                // $(this).closest('.lote-item').find('.precioInput').val(precio);
                 // Asignar el valor y disparar el evento para que otros scripts lo detecten
                const $inputPrecio = $(this).closest('.lote-item').find('.precioInput');
                $inputPrecio.val(precio).trigger('change'); // ← aquí se dispara el evento

                // console.log(`Manzana ${manzanaSeleccionada.num_manzana} (${tipoVenta}): ${precio}`);
            });



            $(document).on('change', '.manzanaSelect', function () {
                // Obtener todas las manzanas seleccionadas
                const manzanasSeleccionadas = $('.manzanaSelect')
                    .map(function () {
                        const val = $(this).val();
                        return val ? parseInt(val) : null;
                    })
                    .get()
                    .filter(Boolean); // elimina nulos o vacíos

                // Crear un Set (para evitar valores repetidos)
                const enganchesUnicos = new Set();

                // Recorrer las manzanas seleccionadas y agregar sus enganches
                manzanasSeleccionadas.forEach(id => {
                    const manzana = dataManzanasLotes.find(m => m.id === id);
                    if (manzana && manzana.enganche) {
                        enganchesUnicos.add(manzana.enganche);
                    }
                });

                // Seleccionar el combo de enganches
                const $selectEnganche = $('.engancheVentaSelect');

                // Limpiar y volver a generar opciones
                $selectEnganche.empty();
                $selectEnganche.append('<option value="" selected>Selecciona una opción</option>');

                // Agregar todas las opciones únicas de enganche
                enganchesUnicos.forEach(eng => {
                    $selectEnganche.append(`<option value="${eng}">${eng} %</option>`);
                });
            });


            $(document).on('change', '.manzanaSelect', function () {
                // Obtener todas las manzanas seleccionadas
                const manzanasSeleccionadas = $('.manzanaSelect')
                    .map(function () {
                        const val = $(this).val();
                        return val ? parseInt(val) : null;
                    })
                    .get()
                    .filter(Boolean);

                // Crear un Set para valores únicos
                const mensualidadesUnicas = new Set();

                // Buscar las mensualidades de las manzanas seleccionadas
                manzanasSeleccionadas.forEach(id => {
                    const manzana = dataManzanasLotes.find(m => m.id === id);
                    if (manzana && manzana.mensualidades) {
                        mensualidadesUnicas.add(manzana.mensualidades);
                    }
                });

                // Actualizar el select de mensualidades
                const $selectMensualidades = $('.mensualidadVentaSelect');
                $selectMensualidades.empty();
                $selectMensualidades.append('<option value="" selected disabled>Selecciona una opción</option>');

                mensualidadesUnicas.forEach(m => {
                    $selectMensualidades.append(`<option value="${m}">${m} mensualidades</option>`);
                });
            });

            $(document).on('change', '.engancheVentaSelect', function () {
                const enganchePorcentaje = parseFloat($(this).val()); // valor seleccionado (ej. 15, 30)
                const totalVenta = parseFloat($('#total_venta').val()); // valor total de la venta

                if (!isNaN(enganchePorcentaje) && !isNaN(totalVenta)) {
                    // Calcular el enganche
                    const engancheCalculado = (totalVenta * enganchePorcentaje) / 100;

                    // Insertar el resultado en el input correspondiente
                    $('input[name="enganche_venta"]').val(engancheCalculado.toFixed(2));

                    // Disparar evento "change" por si hay otros cálculos dependientes
                    $('input[name="enganche_venta"]').trigger('change');
                } else {
                    // Si falta algún valor, limpiar el campo
                    $('input[name="enganche_venta"]').val('');
                }
            });


            // Detecta cambios en manzana o lote
            $(document).on('change', '.manzanaSelect, .loteSelect', function () {
                // verificarManzanasYLotes();
                if (!modoCargando) {
                    verificarManzanasYLotes();
                }
            });


            function verificarManzanasYLotes() {
                const manzanas = [];
                const lotes = [];
                // Limpiamos las tablas previas antes de volver a agregar
                $('#contenedor-tablas').empty();
                // Recorremos todos los selects de manzana y lote
                $('.manzanaSelect').each(function (index) {
                    const manzanaVal = $(this).val();
                    const loteVal = $('.loteSelect').eq(index).val();

                    if (manzanaVal && loteVal) {
                        manzanas.push(manzanaVal);
                        lotes.push(Number(loteVal));
                    }
                });

                if (manzanas.length === 0 || lotes.length === 0) return;

                // Verificar si todas las manzanas son iguales
                const todasIguales = manzanas.every(m => m === manzanas[0]);

                // Verificar si los lotes son una secuencia válida
                const enSecuencia = verificarSecuenciaFlexible(lotes);

                // // Limpiamos las tablas previas antes de volver a agregar
                // $('#contenedor-tablas').empty();
                
                if (todasIguales && enSecuencia) {
                    // console.log('✅ Todas las manzanas iguales y lotes en secuencia → una tabla');
                    agregarTabla();
                } else {
                    // console.log('⚠️ Manzanas distintas o lotes no secuenciales → una tabla por registro');
                    manzanas.forEach(() => agregarTabla());
                }
            }


            function verificarSecuenciaFlexible(lotes) {
                if (lotes.length <= 1) return true;

                // Eliminamos duplicados y ordenamos
                const ordenados = [...new Set(lotes)].sort((a, b) => a - b);

                // Verifica si hay una diferencia constante de 1
                for (let i = 1; i < ordenados.length; i++) {
                    if (ordenados[i] - ordenados[i - 1] !== 1) {
                        return false;
                    }
                }

                return true;
            }


            $fraccSelect.on('change', function () {
                const fraccId = $(this).val();

                if (!fraccId) return;      
                
                const fraccUrlFraccDe = objFraccDetalle.replace(/\/\d+$/, `/${fraccId}`);
                console.log("Ruta para detalles --> ", fraccUrlFraccDe);
                
                $.ajax({ 
                    url: fraccUrlFraccDe, 
                    method: 'GET',
                    dataType: 'json',
                    success: function (data) {    
                        console.log("Esto  *** ", data);
                        $("#vendedor_propietario_asc").val(data.propietaria)
                        $("#vendedor_representante_asc").val(data.responsable)
                        const nombreCompleto = $("#nombre_comprador").val()+' '+$("#primer_ap_comprador").val()+' '+$('#segundo_ap_comprador').val();
                        $("#comprador_nombre_completo_asc").val(nombreCompleto)

                        //Antecedentes
                        $("#propietarios_familia_asc").val(data.propietaria)
                        $("#ubicacion_escritura_asc").val(data.datos_propiedad)
                        $("#ubicacion_zona_asc").val(data.ubicacion)    
                        $("#denominado_como_asc").val(data.nombre)                    
                        $("#municipio_estado_asc").val(data.municipio_nombre+', '+data.entidad_nombre);

                        //Primera clausula
                        $("#primer_vendedora_nombre").text(data.propietaria)
                        $("#primera_familia").text(data.propietaria)
                        
                       
                       
                    },
                    error: function (xhr, status, error) {
                        console.error('Error al obtener fraccionamiento:', error);
                    }
                });
            });

           
            
        });
    </script>

    <?php if(Session::has('success')): ?>
        <script>
            toastr.options = {
                "closeButton" : false,
                "progressBar" : true
            }
            toastr.success("<?php echo e(session('success')); ?>");
        </script>
    <?php endif; ?>
    <?php if(Session::has('error')): ?>
        <script>
            toastr.options = {
                "closeButton" : false,
                "progressBar" : true
            }
            toastr.warning("<?php echo e(session('error')); ?>");
        </script>
    <?php endif; ?>
    
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/luisjorgepablosartillo/Documents/PROYECTOS/LoteGest/resources/views/pages/cliente/add.blade.php ENDPATH**/ ?>