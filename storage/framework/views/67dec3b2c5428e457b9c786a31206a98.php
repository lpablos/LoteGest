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
        const fraccManzanaLoteRoute = "<?php echo e(route('fracc.Manzana.lote',['idFracc' => 1])); ?>"
        
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
        $(document).ready(function () {
            
            let contadorLotes = 0;
            let contadorTablas = 0; 
            
            let dataManzanasLotes = '';
            let opcionesManzanas = '';


            const $btn = $('#btn_add_compra');
            const $contenedor = $('#contenedor-compra');
            const $spanContador = $('#contador-lotes');

            const $fraccSelect = $('#fracc_id');

            if ($btn.length === 0) {
                console.error('No existe el botón con id #btn_add_compra en el DOM');
                return;
            }
            if ($contenedor.length === 0) {
                console.error('No existe el contenedor con id #contenedor-compra en el DOM');
                return;
            }
            if ($spanContador.length === 0) {
                // Si no existe el span del contador, crearlo opcionalmente
                $contenedor.before('<div class="text-center mt-2"><strong>Total de lotes agregados:</strong> <span id="contador-lotes">0</span></div>');
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
            function agregarBloque() {
                const bloque = $(`
                    <div class="row col-md-12 mb-3 lote-item" id=${contadorLotes}>
                        <div class="col-md-3 mb-4">
                            <label>Manzana</label>                            
                            <select class="form-select form-select-sm manzanaSelect" name="manzana[]" required>
                                ${opcionesManzanas}
                            </select>
                        </div>
                        <div class="col-md-3 mb-4">
                            <label>Lote</label>
                            <select class="form-select form-select-sm loteSelect" name="lote[]" required>
                                <option value="" disabled selected>Selecciona un lote</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-4">
                            <label>Superficie m2</label>
                            <input type="number" min="1" step="0.01" name="superficie_m2[]" class="form-control form-control-sm">
                        </div>
                        <div class="col-md-2 mb-4">
                            <label>Tipo de Venta</label>
                            <select class="form-select form-select-sm tipoVentaSelect" name="venta_tp[]" required>
                                <option value="" selected>Selecciona una opción</option>
                                <option value="precio_credito">Credito</option>
                                <option value="precio_contado">Contado</option>
                            </select>
                        </div>
                          <div class="col-md-3 mb-4">
                            <label>Precio</label>
                            <input type="text" step="0.01" name="precio[]" class="form-control form-control-sm precioInput" readonly>
                        </div>
                        <div class="col-md-1 mb-4 d-flex align-items-end">
                            <button type="button" class="btn btn-sm btn-danger btn-eliminar" title="Eliminar lote">✖</button>
                        </div>
                    </div>
                `);

                // Agregar al contenedor y actualizar contador
                $contenedor.append(bloque);
                contadorLotes++;
                actualizarContador();
                setTimeout(() => {
                    // agregarTabla();                    
                }, 1000);
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


            $(document).on('change', '.tipoVentaSelect', function() {
                const $bloque = $(this).closest('.lote-item');
                const manzanaId = parseInt($bloque.find('.manzanaSelect').val());
                const tipoVenta = $(this).val(); // "precio_contado" o "precio_credito"
                const $precioInput = $bloque.find('.precioInput');

                const manzana = dataManzanasLotes.find(m => m.id === manzanaId);

                if (manzana && manzana[tipoVenta]) {
                    $precioInput.val(manzana[tipoVenta]).trigger('change'); // 🔹 dispara el evento

                } else {
                    $precioInput.val('');
                }
            });

            // Evento click: agrega 1 bloque por click
            $btn.on('click', function () {
                agregarBloque();
            });

            // Delegación: eliminar bloque con botón (disminuye contador)
            $contenedor.on('click', '.btn-eliminar', function () {
                $(this).closest('.lote-item').remove();
                contadorLotes = Math.max(0, contadorLotes - 1);
                actualizarContador();
                actualizarTotalVenta();
              
            });

            // function agregarTabla() {
            //     contadorTablas++;
            //     const tabla = $(`
            //         <div class="row col-md-12 mb-3 tabla-item">                        
            //             <table class="table table-bordered border-primary mb-0 table">
            //                 <thead>
            //                     <tr>
            //                         <th>First Name</th>
            //                         <th>Last Name</th>
            //                         <th>Username</th>
            //                     </tr>
            //                 </thead>
            //                 <tbody>
            //                     <tr>
            //                         <td>Vientos</td>
            //                         <td>Metros</td>
            //                         <td>Colindancia</td>
            //                         <td>Descripcio</td>
            //                     </tr>
            //                     <tr>
            //                         <td>Noroeste</td>
            //                         <td>
            //                             <input type="text" step="0.01" name="viento1[]" class="form-control form-control-sm">
            //                         </td>
            //                         <td>Colindando con:</td>
            //                         <td>
            //                             <input type="text" step="0.01" name="colinda1[]" class="form-control form-control-sm">
            //                         </td>
            //                     </tr>
            //                     <tr>
            //                         <td>Sureste</td>
            //                         <td>
            //                             <input type="text" step="0.01" name="viento2[]" class="form-control form-control-sm">
            //                         </td>
            //                         <td>Colindando con:</td>
            //                         <td>
            //                             <input type="text" step="0.01" name="colinda2[]" class="form-control form-control-sm">
            //                         </td>
            //                     </tr>
            //                      <tr>
            //                         <td>Noreste</td>
            //                         <td>
            //                             <input type="text" step="0.01" name="viento3[]" class="form-control form-control-sm">
            //                         </td>
            //                         <td>Colindando con:</td>
            //                         <td>
            //                             <input type="text" step="0.01" name="colinda3[]" class="form-control form-control-sm">
            //                         </td>
            //                     </tr>
            //                      <tr>
            //                         <td>Suroeste</td>
            //                         <td>
            //                             <input type="text" step="0.01" name="viento4[]" class="form-control form-control-sm">
            //                         </td>
            //                         <td>Colindando con:</td>
            //                         <td>
            //                             <input type="text" step="0.01" name="colinda4[]" class="form-control form-control-sm">
            //                         </td>
            //                     </tr>
            //                 </tbody>
            //             </table>
            //         </div>
            //     `);

            //     $('#contenedor-tablas').append(tabla);
            // }


            $fraccSelect.on('change', function () {
                const fraccId = $(this).val();

                if (!fraccId) return;               
                
                $.ajax({
                    url: fraccManzanaLoteRoute, // ruta Laravel
                    method: 'GET',
                    dataType: 'json',
                    success: function (data) {                       
                        dataManzanasLotes = data[0]
                        console.log(dataManzanasLotes);
                        
                        selectManzas();                        
                       
                    },
                    error: function (xhr, status, error) {
                        console.error('Error al obtener fraccionamiento:', error);
                    }
                });
            });


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

                console.log("Esto tienes", enganchesUnicos);
                

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

                console.log("Mensualidades únicas encontradas:", mensualidadesUnicas);

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