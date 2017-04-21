@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                {{ Form::open(['route'=>'cars.index','method'=>'get','class'=>'form-inline','id'=>'filter-spec-form']) }}
                <div class="form-group">
                    <select name="brand" class="form-control">
                        <option value="">请选择品牌</option>
                        @foreach($brands as $brand)
                            @if ($brand->id == $brand_id)
                                <option value="{{ $brand->id }}" selected>{{ $brand->name }}</option>
                            @else
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <select name="factory" class="form-control">
                        <option value="">请选择厂商</option>
                        @foreach($factories as $factory)
                            @if ($factory->id == $factory_id)
                                <option value="{{ $factory->id }}" selected>{{ $factory->name }}</option>
                            @else
                                <option value="{{ $factory->id }}">{{ $factory->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <select name="series" class="form-control">
                        <option value="">请选择车系</option>
                        @foreach($series as $seriesitem)
                            @if ($seriesitem->id == $series_id)
                                <option value="{{ $seriesitem->id }}" selected>{{ $seriesitem->name }}</option>
                            @else
                                <option value="{{ $seriesitem->id }}">{{ $seriesitem->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <select name="year" class="form-control">
                        <option value="">请选择年份</option>
                        @foreach($years as $year)
                            @if ($year->id == $year_id)
                                <option value="{{ $year->id }}" selected>{{ $year->name }}</option>
                            @else
                                <option value="{{ $year->id }}">{{ $year->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                {{ Form::close() }}
            </div>
            <div class="col-md-12">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <th class="text-center">名称</th>
                        <th class="text-center">品牌</th>
                        <th class="text-center">厂商</th>
                        <th class="text-center">车系</th>
                        <th class="text-center">年份</th>
                        <th class="text-center">生产状态</th>
                        <th class="text-center">价格区间</th>
                        <th class="text-center">操作</th>
                    </thead>
                    <tbody>
                        @foreach ($specs as $spec)
                            <tr>
                                <td>
                                    {{$spec->name}}
                                </td>
                                <td>
                                    {{$spec->carBrand->name}}
                                </td>
                                <td>
                                    {{$spec->carFactory->name}}
                                </td>
                                <td>
                                    {{$spec->carSeries->name}}
                                </td>
                                <td class="text-center">
                                    {{$spec->carYear->name}}
                                </td>
                                <td class="text-center">
                                    @if ($spec->state == 20)
                                        在售车型
                                    @elseif($spec->state == 40)
                                        停售车型
                                    @endif
                                </td>
                                <td>{{$spec->minprice/10000}}
                                    万 - {{$spec->minprice/10000}}万
                                </td>
                                <td class="text-center">
                                    <a href="http://car.autohome.com.cn/config/spec/{{ $spec->autoid }}.html" target="_blank">查看参数配置</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-12 text-center">
                {{ $specs->links() }}
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
    form{
        margin-bottom: 22px;
    }
</style>
@endpush

@push('scripts')
<script>
    $("#filter-spec-form").find('select').each(function(index,item){
        $(this).change(function(){
            $("#filter-spec-form").find('select:gt('+index+')').val('');
            $("#filter-spec-form").submit();
        })
    })
</script>
@endpush