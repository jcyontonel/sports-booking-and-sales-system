@extends('layouts.profile')

@section('content-profile')

<div class="db-cent-table db-com-table">
    <div class="db-title">
        <h3><img src="{{ asset('images\icon\dbc10.png') }}" alt=""> Reportes</h3>
    </div>
    <div class="book-form inn-com-form db-form">
        <form id="form-buscar"  id="app" style="padding: 10px 30px !important;" class="col s12">
            <div class="row">
                <div class="input-field col s6">
                    <select name="tipo" id="inputtipo" onchange="selectTipo()">
                        <option value="0" selected="">Tipo de Reporte</option>
                        <option value="1">Reservas de Eventos</option>
                        <option value="2">Reservas de Alquiler</option>
                        <option value="3">Ventas</option>
                    </select>
                </div>
                <div class="input-field col s6" id="divopcion" style="display: none;">
                    
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6" id="divdesde" style="display: none;">
                    <input type="text" id="from" name="desde" autocomplete="off">
                    <label for="from">Desde</label>
                </div>
                <div class="input-field col s6" id="divhasta" style="display: none;">
                    <input type="text" id="to" name="hasta" autocomplete="off">
                    <label for="to">Hasta</label>
                </div>
            </div>
           
            <div class="row">
                <div class="input-field col s12">
                    <button onclick="buscar()" class="btn pull-right">
                        <i class="material-icons right" style="font-size: 30px; margin-top: -8px;">find_in_page</i>
                        Consultar 
                    </button>
                </div>
            </div>
        </form>
    </div><br>
    <div id="lista" class="book-form inn-com-form db-form" style=" min-height: 500px">
        <form style="padding: 10px 30px !important;" class="col s12">
        <table id="tablareporte" class="bordered responsive-table">
        </table>
        </form>
    </div>
</div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('css/buttons.dataTables.min.css') }}">
@endsection

@section('js')
    <script src="{{ asset('js/datatables.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/jszip.min.js') }}"></script>
    <script src="{{ asset('js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.colReorder.min.js') }}"></script>
    <script src="{{ asset('js/reporte.js') }}"></script>
@endsection