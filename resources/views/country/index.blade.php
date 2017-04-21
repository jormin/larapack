@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row" id="app">
			<div class="col-md-12">
				<table class="table table-striped table-bordered table-hover">
					<thead>
					<th>国旗</th>
					<th>名称</th>
					<th>代码</th>
					<th>首都</th>
					<th>公民身份</th>
					<th>货币</th>
					</thead>
					<tbody>
					@foreach ($countries as $country)
						<tr id="{{$country->country_code}}">
							<td>
								@if ($country->flag)
									<img src="/images/flags/{{$country->
							flag}}">
								@endif
							</td>
							<td>
								名称：{{$country->name}}
								@if ($country->eea == 1)
									<span class="label label-success">EEA</span>
								@endif
								<br>全称：{{$country->full_name}}</td>
							<td width="16%">
								国家代码：{{$country->country_code}}
								<br>
								区域代码：{{$country->region_code}}
								<br>
								子区域代码：{{$country->sub_region_code}}
								<br>
								ISO 3166 2：{{$country->iso_3166_2}}
								<br>
								ISO 3166 3：{{$country->iso_3166_3}}
								<br>电话区号:{{$country->calling_code}}</td>
							<td>{{$country->capital}}</td>
							<td>{{$country->citizenship}}</td>
							<td width="20%">
								货币：{{$country->currency}}
								<br>
								货币代码：{{$country->currency_code}}
								<br>
								货币单位：{{$country->currency_sub_unit}}
								<br>货币符号：{{$country->currency_symbol}}</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection