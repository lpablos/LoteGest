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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <form id="wizard-form" action="<?php echo e(route('cliente.store')); ?>" method="post"  enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
                <div class="card">
                 <div id="basic-example">
                    <!-- Seller Details -->
                    <h3> Datos Personales</h3>
                    <section>
                        <form>
                        <div class="row col-md-12">
                        <p class="card-title-desc"> Todos los campos marcados con * son obligatorios </p>
                            <div class="col-md-3 mb-4">
                                <label for="nombre"> Número de cliente </label>
                                <input type="text" class="form-control form-control-sm" name="nombre" placeholder="Ingresa el nombre" style="text-transform:lowercase" required>
                            </div>
                            <div class="col-md-3 b-4">
                                <label for="fileINE"> Identificación INE</label>
                                <input class="form-control form-control-sm" type="file" name="fileIne" id="fileIne" accept="image/*" capture>
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="col-md-3 mb-4">
                                <label for="nombre"> Nombre(s)(*) </label>
                                <input type="text" class="form-control form-control-sm" name="nombre" placeholder="Ingresa el nombre" style="text-transform:lowercase" required>
                            </div>
                            <div class="col-md-3 mb-4">
                                <label for="primer_apellido"> Primer Apellido (*) </label>
                                <input type="text" class="form-control form-control-sm" name="primer_apellido" placeholder="Ingresa el primer apellido" style="text-transform:lowercase" required>
                            </div>
                            <div class="col-md-3 b-4">
                                <label for="segundo_apellido"> Segundo Apellido</label>
                                <input type="text" class="form-control form-control-sm" name="segundo_apellido" placeholder="Ingresa el segundo apellido" style="text-transform:lowercase">
                            </div>
                            <div class="col-md-3 mb-4">
                                <label for="telefono"> Teléfono </label>
                                <input type="number" class="form-control form-control-sm" name="telefono" oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,10)" minlength="10" maxlength="10">
                            </div>
                             <div class="col-md-3 mb-4">
                                <label for="fecha_nacimiento">Fecha de nacimiento (*) </label>
                                <input type="date" class="form-control form-control-sm" id="fecha_nacimiento" name="fecha_nacimiento" required>
                            </div>
                            <div class="col-md-3 mb-4">
                                <label for="email"> Correo Electrónico </label>
                                <input type="email" class="form-control form-control-sm" name="email" placeholder="Ingresa el correo electrónico" style="text-transform:lowercase" >
                            </div>
                            <div class="col-md-3 mb-4">
                                <label for="num_contacto">Número de contacto </label>
                                <input type="number" class="form-control form-control-sm" name="num_contacto" oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,10)" minlength="10" maxlength="10">
                            </div>
                            <div class="col-md-3 mb-4">
                                <label for="parentesco"> Parentesco </label>
                                <input type="text" class="form-control form-control-sm" name="parentesco" style="text-transform:lowercase">
                            </div>
                        </div>
                        </form>
                    </section>
                    <h3> Datos de Compra </h3>
                    <section>
                        <form>
                            <div class="row col-md-12">
                                <div class="col-md-3 mb-4">
                                    <label for="medidas_m"> Núm. de Solicitud </label>
                                    <input type="text" step="0.01" name="medidas_m" class="form-control form-control-sm">
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="entidad_id"> Corredor </label>
                                    <select class="form-select form-select-sm" id="entidad_id" name="entidad_id" style="cursor: pointer;" required>
                                        <option value="" selected disabled> Selecciona una opción </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-md-3 mb-4">
                                    <label for="entidad_id"> Estado </label>
                                    <select class="form-select form-select-sm" id="entidad_id" name="entidad_id" style="cursor: pointer;" required>
                                        <option value="" selected disabled> Selecciona una opción </option>
                                        <?php $__currentLoopData = $estados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($estado->id); ?>" <?php if($estado->id == 16): ?> selected <?php endif; ?> >- <?php echo e($estado->nom_estado); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="mpio_id"> Municipio </label>
                                    <select class="form-select form-select-sm" id="mpio_id" name="mpio_id" style="cursor: pointer;" required>
                                        <option value="" selected disabled> Selecciona una opción </option>
                                        <?php $__currentLoopData = $mpios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mpio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($mpio->id); ?>">- <?php echo e($mpio->nom_mpio); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="mpio_id"> Fraccionamiento </label>
                                    <select class="form-select form-select-sm" id="mpio_id" name="mpio_id" style="cursor: pointer;" required>
                                        <option value="" selected disabled> Selecciona una opción </option>
                                        <?php $__currentLoopData = $mpios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mpio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($mpio->id); ?>">- <?php echo e($mpio->nom_mpio); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="mpio_id"> Lote </label>
                                    <select class="form-select form-select-sm" id="mpio_id" name="mpio_id" style="cursor: pointer;" required>
                                        <option value="" selected disabled> Selecciona una opción </option>
                                        <?php $__currentLoopData = $mpios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mpio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($mpio->id); ?>">- <?php echo e($mpio->nom_mpio); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="manzana">Manzana</label>
                                    <select name="manzana" class="form-select form-select-sm" style="cursor: pointer;">  
                                        <option selected> Selecciona una opción </option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label> Tipo de Compra </label>
                                    <select class="form-select form-select-sm" style="cursor: pointer;">
                                        <option selected> Selecciona una opción </option>
                                        <option value="AE"> Contado </option>
                                        <option value="VI"> Crédito </option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="precio_contado">Precio Contado</label>
                                    <input type="number" step="0.01" name="precio_contado" class="form-control form-control-sm" >
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="precio_credito">Precio Crédito</label>
                                    <input type="number" step="0.01" name="precio_credito" class="form-control form-control-sm">
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="precio_credito"> Enganche </label>
                                    <input type="number" step="0.01" name="precio_credito" class="form-control form-control-sm">
                                </div>
                                 <div class="col-md-3 mb-4">
                                    <label> Forma de pago (CUANDO ES AL CONTADO) </label>
                                    <select class="form-select form-select-sm" style="cursor: pointer;">
                                        <option selected> Selecciona una opción </option>
                                        <option value="AE"> - Efectivo </option>
                                        <option value="VI"> - Transferencia </option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label> Mensualidades (A Crédito) </label>
                                    <select class="form-select form-select-sm" style="cursor: pointer;">
                                        <option selected> Selecciona una opción </option>
                                        <option value="AE"> - Alfredo </option>
                                        <option value="VI"> - Miguel </option>
                                    </select>
                                </div>







                                
                                
                                

                                
                                 

                                

                                
                            </div>
                        </form>
                    </section>

                    <!-- Bank Details -->
                    <h3> Sección 3 </h3>
                    <section>
                        <div>
                            <form>
                                <div class="row">
                                    
                                </div>
                            </form>
                        </div>
                    </section>

                    <!-- Confirm Details -->
                    <h3> Generación de Contrato </h3>
                    <section>
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="text-center">
                                    <div class="mb-4">
                                        <i class="mdi mdi-check-circle-outline text-success display-4"></i>
                                    </div>
                                    <div>
                                        <h5>Confirm Detail</h5>
                                        <p class="text-muted">If several languages coalesce, the grammar of the resulting</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                    
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <a href="<?php echo e(route('cliente.index')); ?>" class="btn text-muted d-none d-sm-inline-block btn-link"><i class="mdi mdi-arrow-left me-1"></i> Cancelar </a>
                    </div> <!-- end col -->
                    <div class="col-sm-6">
                        <div class="text-end">
                            <button type="submit" class="btn btn-success"><i class="mdi mdi-check me-1"></i> Guardar </button>
                        </div>
                    </div> 
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <!-- toastr plugin -->
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