<li class="nav-item">
	<a class="nav-link with-sub" href="#">
        <img src="{{asset('assets/azul_5_1.svg')}}" class="ml-1" height="35"  alt="">
        <span class="sidemenu-label">Mis finanzas</span>
        <i class="angle fe fe-chevron-right"></i>
	</a>
	<ul class="nav-sub">
		<li class="nav-sub-item">
			<a class="nav-sub-link" href="{{ route('finanzas.datosfiscales.index') }}">Datos Fiscales</a>
		</li>
		<li class="nav-sub-item">
			<a class="nav-sub-link" href="{{ route('finanzas.pasarela.index') }}">Recargas</a>
		</li>


		<li class="nav-sub-item">
			<a class="nav-sub-link" href="{{ route('pagos.index') }}">Facturación</a>
		</li>
	</ul>

	</ul>
</li>
