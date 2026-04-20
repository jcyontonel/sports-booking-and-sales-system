// variables
$urlbase = $("body")[0].attributes.url.value;
var total = 0;
$reservas = []; //{ hora: "10:30", tiempo:"1:30"}
$dbreservas = [];
$("input[name=browser]").on('input', function(e){
    var $input = $(this),
        val = $input.val(),
        list = $input.attr('list'),
        match = $('#'+list + ' option').filter(function() {
            return ($(this).val() === val);
        });
    if(match.length > 0) {
        $id=match[0].id;
        $nombre = match[0].value;
        $precio = match[0].attributes.precio.value;
        $stock = match[0].attributes.stock.value;
        $img = match[0].attributes.img.value;
        if($("input#product-"+$id)[0] == undefined){
            $("#listaProductos")
                .append(`<li style="width: 100%;">
                        <div class="row">
                            <div class="col s7">
                                <input type="checkbox" onclick="onclickchk(this)"  class="chkproduct"  checked="checked" id="product-${$id}" precio="${$precio}">
                                <label for="product-${$id}" style="font-size: 1.4rem;line-height: 30px;">${$nombre}<small>(S/. ${$precio})</small></label>
                                <img src="${$img}" width="35px" alt="">
                            </div>
                            <div class="col s2">
                                <input type="number" onchange="changeCantidad(this)" class="form-control"  id="product-cantidad-${$id}" value="1" id="" min="1" max="${$stock}">
                            </div>
                            <div class="col s2" id="product-precio-${$id}" style="text-align:right;font-size: 1.5rem;font-weight:bold;">S/. ${$precio}</div>
                            <div class="col s1" style="text-align:right">
                                <a style="cursor: pointer;" onclick="quitarProducto(this, ${$id})"><i class="material-icons">highlight_off</i></a>
                            </div>
                        </div>
                    </li>`);
                listProductos.push({
                    id: $id,
                    nombre: $nombre,
                    precio: $precio,
                    stock: $stock,
                    cantidad: 1
                });
                onclickchk();
        }
        else{
            $("input#product-cantidad-"+$id).focus()
        }
        calcularTotal();
        $input.val(null);
    }
    else{
        $.ajax({
            type: "GET",
            url: $urlbase+"/productos/buscar/"+val,
            success: function(data){
                // Generar Options
                $productos = data.productos;
                $options = "";
                for (let i = 0; i < $productos.length; i++) {
                    $options += `<option id="${$productos[i].id}" 
                                        precio="${$productos[i].precio}" 
                                        stock="${$productos[i].stock}" 
                                        value="${$productos[i].nombre}"
                                        img="${$urlbase+'/'+$productos[i].foto}">
                                        S/.${$productos[i].precio}
                                </option>`;
                }
                $('#'+list ).append($options);
            }
        });
    }
});

function onclickchk($this) {
    calcularTotal();
}

function changeCantidad($this) {
    $id= $this.id.replace("product-cantidad-", "")
    for (let i = 0; i < listProductos.length; i++) {
        if(listProductos[i].id == $id)
            listProductos[i].cantidad = $this.value;   
    }
    calcularTotal();
}
function calcularTotal(){
    // Recorre los precios
    total = 0;
    //Sumamos las horas seleccionadas para reservas
    var totalCancha = 0;
    $reservas.map(function(obj){ 
        var horas = obj.horas;
        var mediasHoras = 0;
        var tiempo = horas.map(function(hora) {
            var tiempo = (parseInt(hora.tiempo.split(':')[0])*2) + (hora.tiempo.split(':')[1] == '00' ? 0:1);
            mediasHoras += tiempo;
            return tiempo;
        });
        totalCancha += mediasHoras * parseFloat(cancha.costo);
     });
    total += totalCancha;
    // Sumamos la lista de productos productos
    for (let i = 0; i < listProductos.length; i++) {
        if(listProductos[i].cantidad == undefined) listProductos[i].cantidad = 1;
        $subtotal = listProductos[i].precio*listProductos[i].cantidad;
        // Actualiza la información
        $("#product-precio-"+listProductos[i].id).text("S/."+moneyFormat($subtotal));
        if($("#product-"+listProductos[i].id)[0].checked){
            total = total + $subtotal;
        }
    }
    $("#total-pagar").html("S/."+moneyFormat(total));
    Culqi.publicKey = 'pk_test_D0HRdkfbFayxZSsf';
    Culqi.settings({
        title: 'El Bache',
        currency: 'PEN',
        description: 'Alquiler de '+cancha.nombre,
        amount: total*100
    });
}
function quitarProducto($a, $idproducto){
    $a.parentElement.parentElement.parentElement.remove();
    var k;
    for (k = 0; k < listProductos.length; ++k) {
        if(listProductos[k].id == $idproducto)
            listProductos.splice(k, 1);
    }
    calcularTotal();
}
function quitarReserva($i, $j) {
    $("#reserva-"+$j).remove();
    $reservas[$i].horas.splice($j, 1);
    calcularHorasDisponibles()
    calcularTotal();
}
function moneyFormat($val) {
    return $val.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,');
}
$(document).ready(function(){
    jQuery.datetimepicker.setLocale('es');
    jQuery('#dtpfecha').datetimepicker({
        format:'d.m.Y',
        inline:true,
        value: '+1970/01/01',
        minDate:'-1970/01/01',
        timepicker:false,
        onSelectDate:function(ct,$i){
            $fecha = $i[0].value;
            getReservas($fecha);
        }
    });
    var today = new Date();
    getReservas(today.getDate()+'.'+(today.getMonth()+1)+'.'+today.getFullYear());
    calcularTotal();
});
function calcularHorasDisponibles(){
    $cols = "";
    $arrayHorasReservadas = []; // Array de horas reservadas BD
    $arrayHorasSeleccionadas = [];
    $fechaSeleccionada = $('#dtpfecha')[0].value;
    $reservaDia = $reservas[$reservas.map(function(d) { return d.fecha; }).indexOf($fechaSeleccionada)];
    for (let j = 0; j < $dbreservas.length; j++) {
        $fecha = new Date($dbreservas[j].fecha);
        //Agregamos primera media hora reservada
        $arrayHorasReservadas.push($fecha.getHours()+':'+$fecha.getMinutes())
        $tiempo = $dbreservas[j].tiempo;
        $ciclos = ($tiempo.split(":")[0]*2) + ($tiempo.split(":")[1]=="30"? 1:0);
        for (let c = 1; c < $ciclos; c++) {
            $fecha.setMinutes ( $fecha.getMinutes() + 30 );
            $horaReservada = $fecha.getHours()+':'+$fecha.getMinutes();
            // Agregamos nueva media hora reservada al array
            $arrayHorasReservadas.push($horaReservada);
        }
    }
    if ($reservaDia!= undefined){
        for (let m = 0; m < $reservaDia.horas.length; m++) {
            $arrayHorasSeleccionadas = $arrayHorasSeleccionadas.concat($reservaDia.horas[m].seleccionadas);
        }
    }
    
    // Generamos las horas de atención
    for (let i = 9; i < 24; i++) {
        // verificamos si el tiempo ya ha pasado:
        $fs = $fechaSeleccionada.split('.');
        $fs1 = new Date($fs[2], $fs[1]-1, $fs[0], i,0,0);
        $fs2 = new Date($fs[2], $fs[1]-1, $fs[0], i,30,0);
        if($arrayHorasReservadas.indexOf(i+":0") != -1){
            $cols += `<div class="col s2 btn-reserved">${i}:00</div>`;
        }
        else{
            if($fs1 <= new Date())
            {
                $cols += `<div class="col s2 btn-reserved">${i}:00</div>`;
            }
            else{
                if($arrayHorasSeleccionadas.indexOf(i+":00")!= -1){
                    $cols += `<div class="col s2 btn-selected">${i}:00</div>`;
                }
                else{$cols += `<div class="col s2 btn-free">${i}:00</div>`;}
            }
        }
            
        if($arrayHorasReservadas.indexOf(i+":30") != -1){
            $cols += `<div class="col s2 btn-reserved">${i}:30</div>`;
        }
        else {
            if($fs2 <= new Date())
            {
                $cols += `<div class="col s2 btn-reserved">${i}:30</div>`;
            }
            else{
                if($arrayHorasSeleccionadas.indexOf(i+":30")!= -1){
                    $cols += `<div class="col s2 btn-selected">${i}:30</div>`;
                }
                else{$cols += `<div class="col s2 btn-free">${i}:30</div>`;}
            }
        }
    }
    $("#listhorasdisponibles").html($cols);
}
function getReservas($fecha = null)
{
    if($fecha == null) return null;
    $.ajax({
        type: 'GET',
        url: $urlbase+'/reservas/reservas/'+$fecha,
        data:{idcancha: cancha.id},
        success: function(data){
            $dbreservas = data.reservas;
            calcularHorasDisponibles();
            initListHorasDisponibles();
        }
    })
}
function initListHorasDisponibles(){
    $("#listhorasdisponibles .col").on('click', function(e){
        if(this.classList.contains('btn-reserved')) return;
        this.classList.toggle('btn-free');
        this.classList.toggle('btn-selected');
        verificarSeleccionReserva();
    });
}
function verificarSeleccionReserva(){
    $fechaSeleccionada = $('#dtpfecha')[0].value;
    $reservaDia = {
                'fecha':$fechaSeleccionada,
                'horas': []
            };
    $horasSeleccionadas = $("#listhorasdisponibles .btn-selected");
    $flag = true;
    $horaSeleccionada = "";
    $tiempo = 0;
    $seleccionadas = [];
    for (let i = 0; i < $horasSeleccionadas.length; i++) {
        if($flag){
            $horaSeleccionada = $horasSeleccionadas[i].innerText;
            $tiempo = 0;
            $seleccionadas = [];
            $flag = false;
        }
        $tiempo += 0.5;
        $nextHora = getNextHora($horasSeleccionadas[i].innerText);
        $existsNext = false;
        $seleccionadas.push($horasSeleccionadas[i].innerText)
        if($horasSeleccionadas[i+1] != undefined){
            if($nextHora == $horasSeleccionadas[i+1].innerText) $existsNext = true;
        }
        if(!$existsNext){
            $reservaDia.horas.push({
                                    "desde": $horaSeleccionada,
                                    "hasta": getNextHora($horasSeleccionadas[i].innerText),
                                    "tiempo": parseInt($tiempo)+':'+(($tiempo % 1)>0 ? "30":"00"),
                                    "seleccionadas": $seleccionadas
                                });
            $flag = true;
        }
    }
    $indexReserva = $reservas.map(function(d) { return d.fecha; }).indexOf($fechaSeleccionada);
    if($indexReserva != -1) $reservas[$indexReserva] = $reservaDia;
    else $reservas.push($reservaDia);
    mostrarReservas();
}
function getNextHora($horaActual) {
    $horaArray = $horaActual.split(':');
    return ($horaArray[1] == "00")? ($horaArray[0]+':30'):((parseInt($horaArray[0])+1)+':00');
}
function mostrarReservas(){
    $htmlreservas ="";
    for (let i = 0; i < $reservas.length; i++) {
        for (let j = 0; j < $reservas[i].horas.length; j++) {
            $htmlreservas += `<li id="reserva-${j}" style="width: 100%;">
                                <div class="row">
                                    <div class="col s3">
                                        <input type="checkbox" checked="checked" disabled="disabled">
                                        <label style="font-size: 1.4rem;line-height: 30px;"><b>Día:</b> ${ $reservas[i].fecha.replace(/[.]/g, "/")}</label>
                                    </div>
                                    <div class="col s2" style="font-size: 1.4rem;line-height: 30px;">
                                        <b>Desde:</b> ${ $reservas[i].horas[j].desde }
                                    </div>
                                    <div class="col s2" style="font-size: 1.4rem;line-height: 30px;">
                                        <b>Hasta:</b> ${ $reservas[i].horas[j].hasta }
                                    </div>
                                    <div class="col s2" style="font-size: 1.4rem;line-height: 30px;">
                                        <b>${ $reservas[i].horas[j].tiempo } horas
                                    </div>
                                    <div class="col s2" style="text-align:right;font-size: 1.5rem;font-weight:bold;">S/. ${ moneyFormat (cancha.costo * ((parseInt($reservas[i].horas[j].tiempo.split(":")[0])*2)+($reservas[i].horas[j].tiempo.split(":")[1]=="30" ? 1:0)))}</div>
                                    <div class="col s1" style="text-align:right">
                                <a style="cursor: pointer;" onclick="quitarReserva(${i}, ${j})"><i class="material-icons">highlight_off</i></a>
                            </div>
                                </div>
                            </li>`;
            $htmlr = `<tr>
                            <td>
                                <i class="material-icons" style="font-size:14px;font-weight: bold;">chevron_right</i> 
                                <b>Día:</b> ${ $reservas[i].fecha.replace(".", "/")}
                            </td>
                            <td><b>Desde:</b> ${ $reservas[i].horas[j].desde }</td>
                            <td><b>Hasta:</b> ${ $reservas[i].horas[j].hasta }</td>
                            <td>${ $reservas[i].horas[j].tiempo } horas</td>
                            <td><b>S/. ${ moneyFormat (total * ((parseInt($reservas[i].horas[j].tiempo.split(":")[0])*2)+($reservas[i].horas[j].tiempo.split(":")[1]=="30" ? 1:0)))} </b></td>
                        </tr>`;
        }
    }
    $("#listaReservas").html($htmlreservas);
    calcularTotal();
}
function reservar() {
    Culqi.open();
}
function culqi() {

    if(Culqi.token) { // ¡Token creado exitosamente!
        // Get the token ID:
        var token = Culqi.token;
        var listaProductosSeleccionados = [];
        for (let i = 0; i < listProductos.length; i++) {
            if(listProductos[i].cantidad == undefined) listProductos[i].cantidad = 1;
            if($("#product-"+listProductos[i].id)[0].checked) 
                listaProductosSeleccionados.push({
                            id: listProductos[i].id,
                            cantidad: listProductos[i].cantidad
                });
        }
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            url: $urlbase+ "/reservas/reservar/cliente",
            dataType: 'json',
            type: 'POST',
            data: {
                idcancha: cancha.id,
                reservas: $reservas,
                productos: listaProductosSeleccionados,
                token: token,
                monto: total
            },
            success: function(data) {
                if(data.reserva != undefined){
                    if(document.URL == "http://localhost/elbache/public/perfil/nueva/reserva")
                        location.reload()
                    else
                        window.location = $urlbase + '/perfil/reservas';
                }
            }
        });

    }else{ // ¡Hubo algún problema!
        // Mostramos JSON de objeto error en consola
        console.log(Culqi.error);
        alert(Culqi.error.mensaje);
    }
};