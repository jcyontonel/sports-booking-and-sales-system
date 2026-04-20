$urlbase = $("body")[0].attributes.url.value;

function agregarProducto($idproducto){
    $cantidad = $("#cantidad-"+$idproducto).val();
    $.ajax({
        url: $urlbase+'/carrito/agregar',
        type: 'POST',
        data: {
            idproducto: $idproducto,
            cantidad: $cantidad
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function($data){
            alert($data);
            getCountProductsCart();
        }
    });
}
function pagar(){
    if($user != null ){
        Culqi.open();
    }
    else{
        alert("Necesita registrarse para poder comprar.");
    }
}

function culqi() {
    if(Culqi.token) { // ¡Token creado exitosamente!
        // Get the token ID:
        var token = Culqi.token;
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            url: $urlbase+ "/venta/vender/cliente",
            type: 'POST',
            data: {
                token: token
            },
            success: function(data) {
                alert(data.message);
                if(data.value)
                    window.location = $urlbase + '/perfil/compras';
            }
        });

    }
    else{ // ¡Hubo algún problema!
        // Mostramos JSON de objeto error en consola
        console.log(Culqi.error);
        alert(Culqi.error.mensaje);
    }
};