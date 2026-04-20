$urlbase = $("body")[0].attributes.url.value;
var cancha = {
    id: null,
};
var listProductos = [];
$(document).ready(function(){
    jQuery.loadScript = function (url, callback) {
        jQuery.ajax({
            url: url,
            dataType: 'script',
            success: callback,
            async: true
        });
    };
    $('#selCanchas').change(function(){
        cancha = canchas.find(function(cancha){
            return cancha.id == $("select").val();
        });
        /*
        var today = new Date();
        onSelectDtp(today.getDate()+'.'+(today.getMonth()+1)+'.'+today.getFullYear())
        */
        calcularTotal();
    }); 
    $('.rbnreserva').click(function(){
        $radio = this.previousElementSibling;
        $radio.checked = true;
        if($radio.value == "alquiler"){
            $("#rbtnalquiler").prop("checked", true);
            $("#canchaSelect").show();
            $("#listahoras").show();
            $("#canchaCheck").hide();
            $value = new Date();
            $minDate = '-1970/01/01';
            $.loadScript($urlbase+'/js/reserva.js', function(){});
        }
        else{
            $("#rbtnevento").prop("checked", true);
            $("#canchaSelect").hide();
            $("#listahoras").hide();
            $("#canchaCheck").show();
            $value = '+1970/01/02';
            $minDate = '+1970/01/02';
            $.loadScript($urlbase+'/js/evento.js', function(){});
        }
        /*jQuery('#fechaReserva').datetimepicker({
            value: $value,
            minDate:$minDate
        });
        onSelectDtp(jQuery('#fechaReserva').val())*/
    });
    $( ".rbnreserva" ).trigger( "click" );
    $( "#selCanchas" ).trigger( "change" );
});
    function onSelectDtp($fecha) {
    $tipoReserva = $('input[type=radio][name=tiporeserva]:checked');
    // Alquiler
    if($tipoReserva.val() == "alquiler"){
        //getReservas($fecha);
    }
    //Evento
    else if($tipoReserva.val() == "evento"){
        //getCanchasDisponibles($fecha);
    }
    
}

function reservarEmpleado() {
    if(confirm("¿Desea realizar la reserva ahora?")){
        $tiporeserva = $('input[name=tiporeserva]:checked').val();
        if($tiporeserva == "alquiler")
            reservarAlquiler();
        if($tiporeserva == "evento")
            reservarEvento();
    }
}
function reservarAlquiler() {
    $canchaid = $("#selCanchas").val();
    if($reservas.length == 0){
        alert("Seleccione horas a reservar");
        return;
    }
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        url: $urlbase+ "/reservas/reservar/empleado",
        dataType: 'json',
        type: 'POST',
        data: {
            idcancha: $canchaid,
            reservas: $reservas,
            productos: [],
            monto: total
        },
        success: function(data) {
            if(data.reserva != undefined){
                alert("Reserva de alquiler registrada correctamente.")
                location.reload();
            }
        }
    });
}
function reservarEvento() {
    if($canchas.length == 0){
        alert("No hay canchas seleccionadas para la reserva.")
        return;
    }
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        url: $urlbase+ "/eventos/reservar/empleado",
        type: 'POST',
        data: {
            fecha: $('#dtpfecha')[0].value,
            canchas: $canchas,
            monto: $total
        },
        success: function(data) {
            if(data.evento != undefined){
                alert("Reserva de evento registrada correctamente.")
                location.reload();
            }
        }
    });
}