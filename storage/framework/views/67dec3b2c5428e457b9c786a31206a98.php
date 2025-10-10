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
                                        <?php $__currentLoopData = $corredores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $corredor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($corredor->id); ?>">- <?php echo e($corredor->full_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                        <?php $__currentLoopData = $fraccionamientos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fraccionamiento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($fraccionamiento->id); ?>">- <?php echo e($fraccionamiento->nombre); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="tipo_compra"> Tipo de compra </label>
                                    <select class="form-select form-select-sm" id="tipo_compra" name="tipo_compra" style="cursor: pointer;" required>
                                        <option value="" selected disabled> Selecciona una opción </option>
                                        <option value="1"> Individual </option>
                                        <option value="2"> Grupal </option>
                                        <option value="3"> Mixto </option>
                                    </select>
                                </div>
                                <hr>
                                <div class="col-md-3 mb-4">
                                    <label for="manzana"> Superficie Total </label>
                                    <input type="text" name="precio_contado" class="form-control form-control-sm" readOnly>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="mpio_id"> Enganche </label>
                                    <select class="form-select form-select-sm" id="mpio_id" name="mpio_id" style="cursor: pointer;" required>
                                        <option value="" selected disabled> Selecciona una opción </option>
                                        <option value="1"> 10% </option>
                                        <option value="2"> 15%</option>
                                        <option value="3"> 20%</option>
                                        <option value="4"> 30%</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-4">
                                    <label for="mpio_id"> Mensualidades </label>
                                    <select class="form-select form-select-sm" id="mpio_id" name="mpio_id" style="cursor: pointer;" required>
                                        <option value="" selected disabled> Selecciona una opción </option>
                                        <option value="1"> 6 Meses </option>
                                        <option value="2"> 12 Meses </option>
                                        <option value="3"> 18 Meses </option>
                                        <option value="4"> 24 Meses  </option>
                                        <option value="5"> 30 Meses </option>
                                        <option value="6"> 36 Meses </option>
                                    </select>
                                </div>
                                <hr>
                                <div class="text-end m-1" id="b_add_lote">
                                    <button type="button" id="btn_add_lote" class="btn btn-sm btn-primary btn-small waves-effect waves-light">
                                        + Lote
                                    </button>
                                </div>
                                <div class="row mb-1">
                                    <div id="contenedor-lotes"></div>
                                </div>
                                <hr>
                                <div class="text-end m-1">
                                    <button type="button" id="btn_add_medidas" class="btn btn-sm btn-primary btn-small waves-effect waves-light">
                                        + Medias y colindancias
                                    </button>
                                </div>
                                <div class="row mb-1">
                                    <div id="contenedor-medidas"></div>
                                </div>
                                <hr>
                            </div>
                        </form>
                    </section>

                    <!-- Bank Details -->
                   <h3> Datos del Contrato </h3>
                    <section>
                        <form>
                           <h4>CONTRATO DE COMPRAVENTA</h4>
                            <p>Contrato de la compraventa que celebran por una parte como VENDEDOR 
                                <input type="text" name="vendedor_asc" id="vendedor_asc" value="FAMILIA PINEDA" class="form-control form-control-sm" style="width: 200px; display: inline-block; vertical-align: middle; margin: 0 4px;">
                            quienes son <strong>propietarios/copropietarios</strong> y que son representados por 
                                <input type="text" name="propietarios_asc" id="propietarios_asc" value="LA ARQ TANIA MEDINA MARCOS" class="form-control form-control-sm" style="width: 200px; display: inline-block; vertical-align: middle; margin: 0 4px;">
                            y por el otro lado como COMPRADOR(A): 
                                <input type="text" name="comprador_asc" id="comprador_asc" value="LA ARQ TANIA MEDINA MARCOS" class="form-control form-control-sm" style="width: 200px; display: inline-block; vertical-align: middle; margin: 0 4px;">
                            los cuales se sujetan al tenor de las siguientes clausulas:</p>

                            <h5 class="text-center"> ------------------------------------ ANTECEDENTES ------------------------------------ </h5>

                            <p>La familia 
                                <input type="text" name="propietarios_asc" id="propietarios_asc" value="FAMILIA PINEDA" class="form-control form-control-sm" style="width: 200px; display: inline-block; vertical-align: middle; margin: 0 4px;">
                            son <strong>propietarios/copropietarios</strong> de un predio identificado con
                                <input type="text" name="ubicacion_asc" id="ubicacion_asc" value="Escritura numero 1,354 amparado bajo el numero de resgitro 13, tomo 14, pasada ante notario publico numero 3 de esta Ciudad de Zacapu, Michoacan" class="form-control form-control-sm" style="width: 410px; display: inline-block; vertical-align: middle; margin: 0 4px;">
                            ubicado 
                                <input type="text" name="ubicacion_zona_asc" id="ubicacion_zona_asc" value="AL ORIENTE DE LA CIUDAD DE ZACAPU denominado como LA CIENEGA" class="form-control form-control-sm" style="width: 250px; display: inline-block; vertical-align: middle; margin: 0 4px;">
                            municipio de 
                                <input type="text" name="municipio_estado_asc" id="municipio_estado_asc" value="ZACAPU, MICHOACAN" class="form-control form-control-sm" style="width: 250px; display: inline-block; vertical-align: middle; margin: 0 4px;">.</p>

                            <h5 class="text-center"> ------------------------------------ CLAUSULAS ------------------------------------ </h5>

                            <h6>PRIMERA. - </h6>
                            <p>La 
                                <input type="text" name="propietarios_uno_asc" id="propietarios_uno_asc" value="FAMILIA PINEDA" class="form-control form-control-sm" style="width: 200px; display: inline-block; vertical-align: middle; margin: 0 4px;"> 
                            venden una fracción marcada con el número de lote 
                                <input type="text" name="lotes_uno_asc" id="lotes_uno_asc" value="3, 4, 5" class="form-control form-control-sm" style="width: 150px; display: inline-block; vertical-align: middle; margin: 0 4px;"> 
                            que se describe con las siguientes medidas, colindancias y superficie:</p>


                            <table style="margin: 0 auto; width: 60%; border-collapse: collapse; text-align: center;">
                                <thead>
                                    <tr>
                                    <th style="border: 1px solid #000; padding: 6px;">Orientación</th>
                                    <th style="border: 1px solid #000; padding: 6px;">Medida</th>
                                    <th style="border: 1px solid #000; padding: 6px;">Colindancia</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="border: 1px solid #000; padding: 6px;">Noroeste</td>
                                        <td style="border: 1px solid #000; padding: 6px;">
                                            <input type="text" name="viento1_medida" id="viento1_medida" value="24.00 M" class="form-control form-control-sm" style="width: 150px; display: inline-block; vertical-align: middle; margin: 0 4px;">
                                        </td>
                                        <td style="border: 1px solid #000; padding: 6px;">
                                            <input type="text" name="viento1_colinda" id="viento1_colinda" value="Lote 2" class="form-control form-control-sm" style="width: 150px; display: inline-block; vertical-align: middle; margin: 0 4px;">
                                        </td>
                                        </tr>
                                        <tr>
                                        <td style="border: 1px solid #000; padding: 6px;">Sureste</td>
                                        <td style="border: 1px solid #000; padding: 6px;">
                                            <input type="text" name="viento2_medida" id="viento2_medida" value="24.00 M" class="form-control form-control-sm" style="width: 150px; display: inline-block; vertical-align: middle; margin: 0 4px;">
                                        </td>
                                        <td style="border: 1px solid #000; padding: 6px;">
                                            <input type="text" name="viento2_colinda" id="viento2_colinda" value="Lote 2" class="form-control form-control-sm" style="width: 150px; display: inline-block; vertical-align: middle; margin: 0 4px;">
                                        </td>
                                        </tr>
                                        <tr>
                                        <td style="border: 1px solid #000; padding: 6px;">Noreste</td>
                                        <td style="border: 1px solid #000; padding: 6px;">
                                            <input type="text" name="viento3_medida" id="viento3_medida" value="24.00 M" class="form-control form-control-sm" style="width: 150px; display: inline-block; vertical-align: middle; margin: 0 4px;">
                                        </td>
                                        <td style="border: 1px solid #000; padding: 6px;">
                                            <input type="text" name="viento3_colinda" id="viento3_colinda" value="Lote 2" class="form-control form-control-sm" style="width: 150px; display: inline-block; vertical-align: middle; margin: 0 4px;">
                                        </td>
                                        </tr>
                                        <tr>
                                        <td style="border: 1px solid #000; padding: 6px;">Suroeste</td>
                                        <td style="border: 1px solid #000; padding: 6px;">
                                            <input type="text" name="viento4_medida" id="viento4_medida" value="24.00 M" class="form-control form-control-sm" style="width: 150px; display: inline-block; vertical-align: middle; margin: 0 4px;">
                                        </td>
                                        <td style="border: 1px solid #000; padding: 6px;">
                                            <input type="text" name="viento4_colinda" id="viento4_colinda" value="Lote 2" class="form-control form-control-sm" style="width: 150px; display: inline-block; vertical-align: middle; margin: 0 4px;">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>


                            <h4>SEGUNDA. - </h4>
                            <p>El vendedor se compromete a vender a la parte compradora en 
                                <input type="text" name="precio_venta_asc" id="precio_venta_asc" value="$348,000.00 (trescientos cuarenta y ocho mil pesos 00/100 m.n)" class="form-control form-control-sm" style="width: 350px; display: inline-block; vertical-align: middle; margin: 0 4px;"> 
                            mismos que se pagarán de la siguiente manera: 
                                <input type="text" name="precio_enganche_asc" id="precio_enganche_asc" value="$34,800.00 (treinta y cuatro mil ochocientos pesos 00/100 m.n)" class="form-control form-control-sm" style="width: 350px; display: inline-block; vertical-align: middle; margin: 0 4px;"> 
                            en concepto de enganche, el resto que es la cantidad de <strong>$313,200.00 (trescientos trece mil doscientos pesos 00/100 m.n)</strong> se pagará en <strong> 24
                            mensualidades</strong> de <strong>$13,050.00 (trece mil cincuenta pesos 00/100 m.n)</strong>, contados a la firma del presente contrato.</p>

                            <h4>TERCERA.-</h4>
                            <p>La responsabilidad de obtención de los permisos de subdivisión, lotificación y servicios recaen íntegramente en el comprador.</p>

                            <h4>CUARTA.-</h4>
                            <p>El comprador se compromete a cumplir con los abonos antes mencionados; en caso de incumplir con el tercer abono perderá los derechos 
                            de su terreno y no se reintegrarán los pagos realizados.</p>

                            <h4>QUINTA.-</h4>
                            <p>La escrituración y los gastos que se generen de este mismo quedarán a cargo del comprador.</p>

                            <h4>SEXTA.-</h4>
                            <p>Ambas partes aceptan el presente contrato en todos y cada uno de sus términos de conformidad, por lo que firman al calce.</p>

                            <h4>SEPTIMA.-</h4>
                            <p>Ambas partes manifiestan que en el presente contrato no existió error, dolo, mala fe, ni ningún otro vicio de la voluntad que pudiera invalidarlo.</p>
                            <p class="text-right">Zacapu, Michoacán, a 31 de enero de 2025.</p>

                            <!-- Firmas -->
                            <table class="tabla-firmas">
                            <tr>
                                <td class="celda vacia"></td>
                                <td class="celda vacia"></td>
                            </tr>
                            <tr>
                                <td class="celda vendedor"> <strong>LA ARQ TANIA MEDINA MARCOS</strong><br>Representante de los Vendedores</td>
                                <td class="celda comprador"> <strong>CARLOS</strong><br>Comprador </td>
                            </tr>
                            </table>

                            <!-- Observaciones -->
                            <div class="observaciones">
                            <p><strong>OBSERVACIONES:</strong></p>
                            <p>Firma como gestor oficio su hija Glenis Maldonado Aburto en representación de Carlos Maldonado.</p>
                            </div>
                        </form>
                    </section>

                    <!-- Confirm Details -->
                    <h3> Vista Previa del Contrato </h3>
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
    <script>
        $(document).ready(function () {
        
            document.getElementById('btn_add_lote').addEventListener('click', function () {
                agregarLote({});
            });

            document.getElementById('btn_add_medidas').addEventListener('click', function () {
                agregarMedidas({});
            });

            function agregarLote(m) {
                let contenedor = document.getElementById('contenedor-lotes');
                let b_lote = `
                    <div class="row mb-1">
                        <div class="col-md-2 mb-4">
                            <label for="mpio_id"> Manzana </label>
                            <select class="form-select form-select-sm" id="mpio_id" name="mpio_id" style="cursor: pointer;" required>
                                <option value="" selected disabled> Selecciona una opción </option>
                                <?php $__currentLoopData = $mpios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mpio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($mpio->id); ?>">- <?php echo e($mpio->nom_mpio); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-2 mb-4">
                            <label for="mpio_id"> Lote </label>
                            <select class="form-select form-select-sm" id="mpio_id" name="mpio_id" style="cursor: pointer;" required>
                                <option value="" selected disabled> Selecciona una opción </option>
                                <?php $__currentLoopData = $mpios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mpio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($mpio->id); ?>">- <?php echo e($mpio->nom_mpio); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-2 mb-4">
                            <label for="manzana"> Superficie </label>
                            <input type="number" step="0.01" name="precio_contado" class="form-control form-control-sm" >
                        </div>
                        <div class="col-md-2 mb-4">
                            <label for="manzana"> Precio </label>
                            <input type="text" name="precio_contado" class="form-control form-control-sm" readOnly>
                        </div>
                        <div class="col-md-2 mb-4">
                            <label for="mpio_id"> Tipo de venta </label>
                            <select class="form-select form-select-sm" id="mpio_id" name="mpio_id" style="cursor: pointer;" required>
                                <option value="" selected disabled> Selecciona una opción </option>
                                <option value="1"> - Crédito </option>
                                <option value="2"> - Contado </option>
                            </select>
                        </div>
                    </div>`;
                contenedor.insertAdjacentHTML('beforeend', b_lote);
                contadorManzanas++;
            }
        
            function agregarMedidas(m) {
                let contenedor = document.getElementById('contenedor-medidas');
                let bloque = `
                    <div class="row mb-3" id="">
                        <div class="col-md-6">
                            <label class="form-label"> Noroeste </label>
                            <input type="text" name="precio_contado" class="form-control form-control-sm" >
                        </div>
                        <div class="col-md-6">
                            <label class="form-label"> Colindando con: </label>
                            <input type="text" name="precio_contado" class="form-control form-control-sm" >
                        </div>
                        <div class="col-md-6 mt-2">
                            <label class="form-label"> Sureste </label>
                            <input type="text" name="precio_contado" class="form-control form-control-sm" >
                        </div>
                        <div class="col-md-6 mt-2">
                            <label class="form-label"> Colindando con: </label>
                            <input type="text" name="precio_contado" class="form-control form-control-sm" >
                        </div>
                        <div class="col-md-6 mt-2">
                            <label class="form-label"> Noreste </label>
                            <input type="text" name="precio_contado" class="form-control form-control-sm" >
                        </div>
                        <div class="col-md-6 mt-2">
                            <label class="form-label"> Colindando con: </label>
                            <input type="text" name="precio_contado" class="form-control form-control-sm" >
                        </div>
                        <div class="col-md-6 mt-2">
                            <label class="form-label"> Suroeste </label>
                            <input type="text" name="precio_contado" class="form-control form-control-sm" >
                        </div>
                        <div class="col-md-6 mt-2">
                            <label class="form-label"> Colindando con: </label>
                            <input type="text" name="precio_contado" class="form-control form-control-sm" >
                        </div>
                    </div>`;
                contenedor.insertAdjacentHTML('beforeend', bloque);
                contadorManzanas++;
            }
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