<h3> Datos del Contrato </h3>
<section>
    <form>
        <h4>CONTRATO DE COMPRAVENTA</h4>
        <p>Contrato de la compraventa que celebran por una parte como <strong>VENDEDOR</strong>  
            <input type="text" name="vendedor_propietario_asc" id="vendedor_propietario_asc" class="form-control form-control-sm" style="width: 200px; display: inline-block; vertical-align: middle; margin: 0 4px;">
        quienes son <strong>propietarios/copropietarios</strong> y que son representados por 
            <input type="text" name="vendedor_representante_asc" id="vendedor_representante_asc" class="form-control form-control-sm" style="width: 200px; display: inline-block; vertical-align: middle; margin: 0 4px;">
        y por el otro lado como <strong>COMPRADOR(A): </strong> 
            <input type="text" name="comprador_nombre_completo_asc" id="comprador_nombre_completo_asc" class="form-control form-control-sm" style="width: 200px; display: inline-block; vertical-align: middle; margin: 0 4px;">
        los cuales se sujetan al tenor de las siguientes clausulas:</p>

        <h5 class="text-center"> ------------------------------------ ANTECEDENTES ------------------------------------ </h5>

        <p>La familia 
            <input type="text" name="propietarios_familia_asc" id="propietarios_familia_asc" class="form-control form-control-sm" style="width: 200px; display: inline-block; vertical-align: middle; margin: 0 4px;">
        son <strong>propietarios/copropietarios</strong> de un predio identificado con
            <input type="text" name="ubicacion_escritura_asc" id="ubicacion_escritura_asc" class="form-control form-control-sm" style="width: 100%; display: inline-block; vertical-align: middle; margin: 0 4px;" placeholder="Datos de la escritura Escritura numero 1,354">
        ubicado 
            <input type="text" name="ubicacion_zona_asc" id="ubicacion_zona_asc" class="form-control form-control-sm" style="width: 250px; display: inline-block; vertical-align: middle; margin: 0 4px;">
        municipio de 
            <input type="text" name="municipio_estado_asc" id="municipio_estado_asc" class="form-control form-control-sm" style="width: 250px; display: inline-block; vertical-align: middle; margin: 0 4px;">.</p>

        <h5 class="text-center"> ------------------------------------ CLAUSULAS ------------------------------------ </h5>

        <h6>PRIMERA. - </h6>
        <p id="condicion1" style="display:none;">La <span id="primera_familia">*</span> venden una fracción marcada con el número de lote(s) <span id="primera_lotes">*</span> que se describe con las siguientes medidas, colindancias y superficie:</p>
        <textarea id="textoContrato" class="form-control" rows="2">
            
        </textarea>
        <br>
        <!-- <p>La 
            <input type="text" name="propietarios_uno_asc" id="propietarios_uno_asc" value="FAMILIA PINEDA" class="form-control form-control-sm" style="width: 200px; display: inline-block; vertical-align: middle; margin: 0 4px;"> 
        venden una fracción marcada con el número de lote 
            <input type="text" name="lotes_uno_asc" id="lotes_uno_asc" value="3, 4, 5" class="form-control form-control-sm" style="width: 150px; display: inline-block; vertical-align: middle; margin: 0 4px;"> 
        que se describe con las siguientes medidas, colindancias y superficie:</p> -->

        <div id="tabla_preview_id"></div>
        <!-- <table style="margin: 0 auto; width: 60%; border-collapse: collapse; text-align: center;">
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
        </table> -->


        <h4>SEGUNDA. - </h4>

      

        <p id="segundaClausula" style="display:none;">El vendedor se compromete a vender a la parte compradora en <span id="precio_venta_segundo"></span> mismos que se pagarán de la siguiente manera: <span id="precio_enganche_segundo"></span> en concepto de enganche, el resto que es la cantidad de <span id="restante_segundo"></span> se pagará en <span id="mensualidades_pago_segundo"></span> de <span id="pago_mensualidad_segundo"></span>, contados a la firma del presente contrato.</p>

        <textarea id="textoContratoSegunda" class="form-control" rows="3"></textarea>
        <br>

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
        <p class="text-right"><input type="text" name="fecha_asc_dato" id="fecha_asc_dato" class="form-control form-control-sm" style="width: 350px; display: inline-block; vertical-align: middle; margin: 0 4px;"> </p>

        <!-- Firmas -->
        <table class="tabla-firmas" style="border-collapse: collapse; border: none;">
            <tr>
                <td class="celda vendedor"><input type="text" name="representante_firma" id="representante_firma"  class="form-control form-control-sm"  style="width: 350px; display: inline-block; vertical-align: middle; margin: 0 4px; text-align: center;"><br>Representante de los Vendedores</td>
                <td class="celda comprador"><input type="text" name="comprador_firma" id="comprador_firma"  class="form-control form-control-sm"  style="width: 350px; display: inline-block; vertical-align: middle; margin: 0 4px; text-align: center;"><br>Comprador </td>
            </tr>
        </table>

        <!-- Observaciones -->
        <div class="observaciones">
        <p><strong>OBSERVACIONES:</strong></p>
        <p><input type="text" name="observaciones" id="observaciones" class="form-control form-control-sm" value="Ninguna" style="width: 100% ; display: inline-block; vertical-align: middle; margin: 0 4px;"></p>
        </div>
    </form>
</section>