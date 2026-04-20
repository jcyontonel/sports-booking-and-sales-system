$urlbase = $("body")[0].attributes.url.value;
$canchas = [];
$total = 0;
function calcularTotal(){
    $canchas = [];
    $total = 0;
    $("[id^=cancha-]:checked").each(function(){
        $chk = $(this);
        $canchas.push({
            id: $chk.attr('id').replace("cancha-", ""),
            precio: $chk.attr('precio')
        });
        $total += parseFloat($chk.attr('precio'));
    });
    $("#total-pagar").html("S/. "+$total);
    Culqi.publicKey = 'pk_test_D0HRdkfbFayxZSsf';
    Culqi.settings({
        title: 'El Bache',
        currency: 'PEN',
        description: 'Alquiler para evento de '+$canchas.length+ ' canchas',
        amount: $total*100
    });
}
$(document).ready(function(){
    
    jQuery.datetimepicker.setLocale('es');
    jQuery('#dtpfecha').datetimepicker({
        format:'d.m.Y',
        inline:true,
        value: '+1970/01/02',
        minDate:'+1970/01/02',
        timepicker:false,
        onSelectDate:function(ct,$i){
            getCanchasDisponibles($i[0].value);
        }
    });
    getCanchasDisponibles($('#dtpfecha')[0].value);
});
function getCanchasDisponibles($fecha) {
    $.ajax({
        type: 'GET',
        url: $urlbase+'/eventos/eventos/'+$fecha,
        success: function(data){
            $("[id^=cancha-]").removeAttr("disabled");
            data.forEach(element => {
                $("#cancha-"+element.id).attr('disabled', 'disabled').prop('checked', false);
            });
            calcularTotal();
        }
    })
}
function reservar() {
    Culqi.open();
}
function culqi() {

    if(Culqi.token) { // ¡Token creado exitosamente!
        // Get the token ID:
        var token = Culqi.token;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            url: $urlbase+ "/eventos/reservar/cliente",
            type: 'POST',
            data: {
                fecha: $('#dtpfecha')[0].value,
                canchas: $canchas,
                token: token,
                monto: $total
            },
            success: function(data) {
                if(data.evento != undefined){
                    window.location = $urlbase + '/perfil/eventos';
                }
            }
        });

    }else{ // ¡Hubo algún problema!
        // Mostramos JSON de objeto error en consola
        console.log(Culqi.error);
        alert(Culqi.error.mensaje);
    }
};