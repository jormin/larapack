@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<table class="table table-striped table-bordered table-hover">
					<tbody>
						@foreach($access as $key => $val)
							<tr>
								<td width="20%">{{ $key }}</td>
								<td width="80%">{{ $val }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection