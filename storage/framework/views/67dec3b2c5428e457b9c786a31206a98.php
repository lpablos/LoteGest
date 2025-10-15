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
            document.getElementById('btn_add_lote').addEventListener('click', function () {
                agregarLote({});
            });

            document.getElementById('btn_add_medidas').addEventListener('click', function () {
                agregarMedidas({});
            });

            // function agregarLote(m) {
            //     let contenedor = document.getElementById('contenedor-lotes');
            //     let b_lote = `
            //         <div class="row mb-1">
            //             <div class="col-md-2 mb-4">
            //                 <label for="mpio_id"> Manzana </label>
            //                 <select class="form-select form-select-sm" id="mpio_id" name="mpio_id" style="cursor: pointer;" required>
            //                     <option value="" selected disabled> Selecciona una opción </option>
            //                     <?php $__currentLoopData = $mpios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mpio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            //                         <option value="<?php echo e($mpio->id); ?>">- <?php echo e($mpio->nom_mpio); ?></option>
            //                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            //                 </select>
            //             </div>
            //             <div class="col-md-2 mb-4">
            //                 <label for="mpio_id"> Lote </label>
            //                 <select class="form-select form-select-sm" id="mpio_id" name="mpio_id" style="cursor: pointer;" required>
            //                     <option value="" selected disabled> Selecciona una opción </option>
            //                     <?php $__currentLoopData = $mpios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mpio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            //                         <option value="<?php echo e($mpio->id); ?>">- <?php echo e($mpio->nom_mpio); ?></option>
            //                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            //                 </select>
            //             </div>
            //             <div class="col-md-2 mb-4">
            //                 <label for="manzana"> Superficie </label>
            //                 <input type="number" step="0.01" name="precio_contado" class="form-control form-control-sm" >
            //             </div>
            //             <div class="col-md-2 mb-4">
            //                 <label for="manzana"> Precio </label>
            //                 <input type="text" name="precio_contado" class="form-control form-control-sm" readOnly>
            //             </div>
            //             <div class="col-md-2 mb-4">
            //                 <label for="mpio_id"> Tipo de venta </label>
            //                 <select class="form-select form-select-sm" id="mpio_id" name="mpio_id" style="cursor: pointer;" required>
            //                     <option value="" selected disabled> Selecciona una opción </option>
            //                     <option value="1"> - Crédito </option>
            //                     <option value="2"> - Contado </option>
            //                 </select>
            //             </div>
            //         </div>`;
            //     contenedor.insertAdjacentHTML('beforeend', b_lote);
            //     contadorManzanas++;
            // }
        
            // function agregarMedidas(m) {
            //     let contenedor = document.getElementById('contenedor-medidas');
            //     let bloque = `
            //         <div class="row mb-3" id="">
            //             <div class="col-md-6">
            //                 <label class="form-label"> Noroeste </label>
            //                 <input type="text" name="precio_contado" class="form-control form-control-sm" >
            //             </div>
            //             <div class="col-md-6">
            //                 <label class="form-label"> Colindando con: </label>
            //                 <input type="text" name="precio_contado" class="form-control form-control-sm" >
            //             </div>
            //             <div class="col-md-6 mt-2">
            //                 <label class="form-label"> Sureste </label>
            //                 <input type="text" name="precio_contado" class="form-control form-control-sm" >
            //             </div>
            //             <div class="col-md-6 mt-2">
            //                 <label class="form-label"> Colindando con: </label>
            //                 <input type="text" name="precio_contado" class="form-control form-control-sm" >
            //             </div>
            //             <div class="col-md-6 mt-2">
            //                 <label class="form-label"> Noreste </label>
            //                 <input type="text" name="precio_contado" class="form-control form-control-sm" >
            //             </div>
            //             <div class="col-md-6 mt-2">
            //                 <label class="form-label"> Colindando con: </label>
            //                 <input type="text" name="precio_contado" class="form-control form-control-sm" >
            //             </div>
            //             <div class="col-md-6 mt-2">
            //                 <label class="form-label"> Suroeste </label>
            //                 <input type="text" name="precio_contado" class="form-control form-control-sm" >
            //             </div>
            //             <div class="col-md-6 mt-2">
            //                 <label class="form-label"> Colindando con: </label>
            //                 <input type="text" name="precio_contado" class="form-control form-control-sm" >
            //             </div>
            //         </div>`;
            //     contenedor.insertAdjacentHTML('beforeend', bloque);
            //     contadorManzanas++;
            // }
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