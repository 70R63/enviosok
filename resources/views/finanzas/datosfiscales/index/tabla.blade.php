<div class="table-responsive">
	<table id="exportGeneral" class="table table-striped table-bordered text-nowrap" >
		<thead>
			<tr>
				<th>ID</th>
				<th>RFC</th>
				<th>Raz&oacute;n Social </th>
				<th>CP</th>
				<th>Calle</th>
				<th>Colonia</th>
				<th>Municipio</th>
				<th>Entidad Federativa</th>
				<th>Facturaci&oacute;n Automatica</th>
				<th>CSF Completo</th>
				<th class="notexport">ACCIONES</th>
			</tr>
		</thead>
		<tbody>

			@foreach( $tabla  as $objeto)
				<tr>
					<td>{{ $objeto->id }}</td>
					<td>{{ $objeto->rfc }}</td>
					<td>{{ $objeto->razon_social }}</td>
					<td>{{ $objeto->cp }}</td>
					<td>{{ $objeto->calle }}</td>
					<td>{{ $objeto->colonia }}</td>
					<td>{{ $objeto->municipio_alcaldia }}</td>
					<td>{{ $objeto->estado }}</td>
					<td>{{ $objeto->facturacion_automatica }}</td>
					<td>{{ $objeto->csf_completo }}</td>
					<td>
						<a href=" {{ route('finanzas.datosfiscales.editar', $objeto->id) }} " class="text-info tx-20 ">
							<i class="fe fe-edit" alt="Editar"></i>
						</a>
							
					</td>
				</tr>
			@endforeach
		</tbody>
		<tfoot>
		    <tr>
		      <td colspan="11">Los datos son responsabilidad del cliente</td>
		    </tr>
		</tfoot>
	</table>
</div>