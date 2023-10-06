<div class="table-responsive">
    <table id="exportGeneral" class="table table-striped table-bordered text-nowrap " >
        <thead>
            <tr>
                <th>MASIVA ID </th>
                <th class='notexport'>ARCHIVO RESUMEN </th>
                <th>FECHA CREACION </th>
                <th>USUARIO XPERTA </th>  
                <th>NO DE GUIAS </th>
                <th>ARCHIVO CARGAR</th>
                
            </tr>
            
        </thead>
        @foreach( $tabla  as $row)
            <tr>
                <td>{{ $row['id'] }}</td>
                <th> 
                    <a href="../{{ $row['archivo_fallo'] }}" target="_blank"> 
                        <i class="text-info tx-24 fa fa-archive" data-toggle="tooltip" title="" data-original-title="fa fa-archive"> 
                        </i>
                    </a>
                </th>
                <td>{{ $row['created_at'] }}</td>
                <td>{{ $row['name'] }}</td>
                <td>{{ $row['no_registros'] }}</td>
                <td>{{ $row['archivo_nombre'] }}</td>
            </tr>
                
        @endforeach
      
                                
        <tfoot>
            <tr>
                <th>MASIVA ID </th>
                <th>ARCHIVO RESUMEN </th>
                <th>FECHA CREACION </th>
                <th>USUARIO XPERTA </th>  
                <th>NO DE GUIAS </th>
                <th>ARCHIVO CARGAR</th>
            </tr>
        </tfoot>
    </table>
</div>