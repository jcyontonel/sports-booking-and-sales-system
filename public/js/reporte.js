var inputtipo = $("#inputtipo");
var inputopcion = $("#inputopcion");
var inputdesde = $("#from");
var inputhasta = $("#to");

function buscar() {
    $formContents = jQuery("#form-buscar").serialize();
    $.ajax({
        type: 'POST',
        url: $urlbase + '/reporte/buscar',
        data: $formContents,
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success: function (data) {
            if(data.success == false){
                alert("Seleccione correctamente.");
                return;
            }
            $columns = [];
            switch (inputtipo.val()) {
                case '1':
                    $columns = getColumnsEvento();
                    break;
                case '2':
                    $columns = getColumnsReservas();
                    break;
                case '3':
                    $columns = getColumnsVentas();
                    break;
            }
            cargar(data, $columns);
        }
    });
}
function selectTipo() {
    $html= `<select name="opcion" id="inputopcion">`;
    switch (inputtipo.val()) {
        case "1":
        case "2":
            $html += `<option value="0" selected="">Todas las canchas</option>
                        <option value="1">Cancha 1</option>
                        <option value="2">Cancha 2</option>`;
            break;
        case "3":
            $elements = cargarCategoriasProductos();
            $html += `<option value="0" selected>Todos los producto</option>`+$elements;
            break;
        default:
            break;
    }
    $html += `</select>`;
    if(inputtipo.val() == 0){
        $("#divdesde").hide();
        $("#divhasta").hide();
        $("#divopcion").hide();
    }
    else{
        $("#divdesde").show();
        $("#divhasta").show();
        $("#divopcion").show();
    }
    $("#divopcion").html($html);
    $('select').material_select();
}
function cargarCategoriasProductos() {
    $options ="";
    $.ajax({
        type: 'GET',
        url: $urlbase + '/productos/tipos',
        async:false, 
        success: function (data) {
            data.forEach(element => {
                $options += `<option value="${element.id}">${element.nombre}</option>`;
            });
            
        }
    });
    return $options;
}
function getColumnsEvento() {
    return  [
        {
            "title": "#Cod.",
            "width": 5,
            "data": "idevento"
        },
        {
            "title":"Cancha",
            "data":"cancha",
        },
        {
            "title":"Cliente",
            "data":"cliente",
        },
        {
            "title":"Fecha",
            "data":"fecha",
        },
        {
            "title":"Estado",
            "render": function(data, type, row){
                $estado ="";
                switch (row.estado) {
                    case "1":
                        $estado = "Reservado";
                        break;
                    case "2":
                        $estado = "Finalizado";
                        break;
                    case "3":
                        $estado = "Cancelado";
                        break;
                
                    default:
                        break;
                }
                return $estado;
            }
        }
    ];
}
function getColumnsReservas() {
    return  [
        {
            "title": "#Cod.",
            "width": 5,
            "data": "idreserva"
        },
        {
            "title":"Cancha",
            "data":"cancha",
        },
        {
            "title":"Cliente",
            "data":"cliente",
        },
        {
            "title":"Fecha",
            "data":"fecha",
        },
        {
            "title":"Tiempo",
            "data":"tiempo",
        },
        {
            "title":"Estado",
            "render": function(data, type, row){
                $estado ="";
                switch (row.estado) {
                    case "1":
                        $estado = "En espera";
                        break;
                    case "2":
                        $estado = "Terminado";
                        break;
                    case "3":
                        $estado = "Cancelado";
                        break;
                    case "4":
                        $estado = "Walk over";
                        break;
                    case "5":
                        $estado = "En juego";
                        break;
                
                    default:
                        break;
                }
                return $estado;
            }
        }
    ];  
}
function getColumnsVentas() {
    return  [
        {
            "title": "#Cod.",
            "width": 5,
            "data": "idventa"
        },
        {
            "title":"Producto",
            "data":"producto",
        },
        {
            "title":"Tipo",
            "data":"tipoproducto",
        },
        {
            "title":"Cliente",
            "data":"cliente",
        },
        {
            "title":"Fecha",
            "data":"fecha",
        }
    ];
}
function cargar(response, columns) {
    // Setup - add a text input to each footer cell
    $('#tablareporte tfoot th').each( function () {
        var title = $('#tablareporte thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
    $('#tablareporte').DataTable( {
        dom: 'Bfrtip',
        "destroy": true,
        colReorder: true,
        buttons: [
            'copyHtml5',
            'excelHtml5',
            {
                extend: 'pdfHtml5'
            },
            {
                extend: 'print'
            }
        ],
        "data": response,
        "searching": false,
        "paging": false,
        language: {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontró ningún registro",
            "info": "_PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(Filtrado de un total de _MAX_ total registros)",
            "search": "Buscar:",
            "paginate": {
                "first":      "Primero",
                "last":       "Último",
                "next":       "Siguiente",
                "previous":   "Anterior"
			},
        },
        "columns": columns
    } );
     // Apply the filter
     $("#tablareporte tfoot input").on( 'keyup change', function () {
        table
            .column( $(this).parent().index()+':visible' )
            .search( this.value )
            .draw();
    } );
}

