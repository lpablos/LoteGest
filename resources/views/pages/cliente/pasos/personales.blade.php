<h3> Datos Personales</h3>
<section id="section-datos-personales">                        
   
    <div class="row col-md-12">
        <p class="card-title-desc"> Todos los campos marcados con * son obligatorios </p>
        <input type="hidden" id="identy" name="identy">   
        <div class="col-md-3 mb-4">
            <label for="no_cliente"> No. Cliente (*)</label>
            <input type="text" class="form-control form-control-sm" name="no_cliente" id="no_cliente" style="text-transform: uppercase;" required placeholder="No. de cliente">
        </div>  
        <div class="col-md-3 mb-4">
            <label for="nombre"> Nombre(s)(*) </label>
            <input type="text" class="form-control form-control-sm" name="nombre" id="nombre_comprador" placeholder="Ingresa el nombre" required>
        </div>
        <div class="col-md-3 mb-4">
            <label for="primer_apellido"> Primer Apellido (*) </label>
            <input type="text" class="form-control form-control-sm" name="primer_apellido" id="primer_ap_comprador" placeholder="Ingresa el primer apellido"  required>
        </div>
        <div class="col-md-3 b-4">
            <label for="segundo_apellido"> Segundo Apellido</label>
            <input type="text" class="form-control form-control-sm" name="segundo_apellido" id="segundo_ap_comprador" placeholder="Ingresa el segundo apellido" >
        </div>
        <div class="col-md-3 mb-4">
            <label for="telefono"> Teléfono </label>
            <input type="number" class="form-control form-control-sm" name="telefono" id="telefono_comprador" oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,10)" minlength="10" maxlength="10" placeholder="Ingresa el teléfono">
        </div>
            <div class="col-md-3 mb-4">
            <label for="fecha_nacimiento">Fecha de nacimiento (*) </label>
            <input type="date" class="form-control form-control-sm" id="fecha_nacimiento" name="fecha_nacimiento" required style="cursor: pointer;">
        </div>
        <div class="col-md-3 mb-4">
            <label for="correo_electronico_comprador"> Correo Electrónico </label>
            <input type="email" class="form-control form-control-sm" name="email" id="correo_electronico_comprador" placeholder="Ingresa el correo electrónico"  >
        </div>
        <div class="col-md-3 mb-4">
            <label for="num_contacto_comprador">Número de contacto </label>
            <input type="number" class="form-control form-control-sm" name="num_contacto" id="num_contacto_comprador" oninput="this.value=this.value.replace(/[^0-9]/g,'').slice(0,10)" minlength="10" maxlength="10" placeholder="Ingresa el número de contacto">
        </div>
        <div class="col-md-3 mb-4">
            <label for="parentesco_comprador"> Parentesco </label>
            <input type="text" class="form-control form-control-sm" name="parentesco" id="parentesco_comprador" placeholder="Ingresa el parentesco">
        </div>
        <!-- <div class="col-md-3 mb-4">
            <label for="ine"> Identificación INE</label>
            <input class="form-control form-control-sm" type="file" name="ine" id="ine" accept="image/*" capture>
        </div> -->
    </div>
</section>