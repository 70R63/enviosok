
@if ($objeto->ltd_id==1)
	<a href="{{ $objeto->documento }}" target="_blank" rel="noopener noreferrer"><i class="text-info tx-20 fa fa-archive" data-toggle="tooltip" title="" data-original-title="fa fa-archive"></i></a>
@else
	<a href="{{ Storage::url($objeto->documento) }}" target="_blank" rel="noopener noreferrer"><i class="text-info tx-20 fa fa-archive" data-toggle="tooltip" title="" data-original-title="fa fa-archive"></i></a>

@endif
