@extends('layouts.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="card" style="margin-top: 80px">
    <div class="card-header">
        <h3 class="text-primary text-center font-weight-bold">醫師資料</h3>
    </div>

<table class="table table-hover text-center">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">醫師姓名</th>
            <th scope="col">性別</th>
            <th scope="col">生日</th>
            <th scope="col">部門</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($doctor as $item)
        <tr>
            <th scope="row">{{ $item->ssn }}</th>
            <td>{{ $item->name }}</td>
            <td>{{ $item->sex }}</td>
            <td>{{ $item->b_date }}</td>
            <td>{{ $item->dept }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
<!-- /.content-wrapper -->
@endsection

@section('javascript')
@stop
