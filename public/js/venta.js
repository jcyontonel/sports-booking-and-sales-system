$urlbase = $("body")[0].attributes.url.value;
$listProductos = [];
$("input[name=browser]").on('input', function(e){
    var $input = $(this),
        val = $input.val(),
        list = $input.attr('list'),
        match = $('#'+list + ' option').filter(function() {
            return ($(this).val() === val);
        });
        if(match.length > 0){
            $id = match[0].id;
            $nombre = match[0].value;
            $precio = parseFloat(match[0].attributes.precio.value);
            $stock = parseInt(match[0].attributes.stock.value);
            $img = match[0].attributes.img.value;
            if($("input#product-"+$id)[0] == undefined){
                $listProductos.push({
                    id: $id,
                    qty : 1,
                    price: $precio
                });
                $("#listaProductos")
                    .append(`<tr id="row-producto-${$id}"><td><img width="35px" src="${$img}" alt=""></td>
                                <td>${$id}</td>
                                <td>${$nombre}</td>
                                <td>S/. ${$precio}</td>
                                <td>
                                    <input id="product-${$id}" precio="${$precio}" type="number" 
                                    style="width: 80px;" class="form-control" value="1" min="1" max="${$stock}"
                                    onchange="changeCantidad(this)">
                                </td>
                                <td id="total-${$id}">S/. ${$precio}</td>
                                <td><a style="cursor: pointer;" onclick="quitarProducto(this, ${$id})"><i class="material-icons">highlight_off</i></a></td></tr>`);
                calcularTotal();
            }
        else{
            $("input#product-cantidad-"+$id).focus()
        }
        $input.val(null);
        }
        else{
            $.ajax({
                type: "GET",
                url: $urlbase+"/perfil/buscar/producto/"+val,
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
function changeCantidad($this) {
    $id= $this.id.replace("product-", "");
    $cantidad = parseFloat($this.value);
    $precio = parseFloat($this.attributes.precio.value);
    $("#total-"+$id).text("S/."+ ($cantidad * $precio));
    $producto = $listProductos.find(function(producto){
        return producto.id == $id;
    });
    $producto.qty = $cantidad;
    calcularTotal();
}
function quitarProducto($button, $idproducto){
    $("#row-producto-"+$idproducto).remove();
    $producto = $listProductos.find(function(producto){
        return producto.id == $id;
    });
    var index = $listProductos.indexOf($producto);
    $listProductos.splice(index, 1);
    calcularTotal();
}
function calcularTotal(){
    $total = 0;
    $listProductos.forEach(producto => {
        $total += producto.price * producto.qty;
    });
    $("#total-venta").text($total);
}

function pagar(){
    if(!confirm("¿Seguro que desea realizar la venta ahora?")){
        return;
    }
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        url: $urlbase+ "/venta/vender/empleado",
        type: 'POST',
        data: {
            productos: $listProductos
        },
        success: function(data) {
            alert(data.message);
            if(data.value)
                location.reload();
        }
    });
}