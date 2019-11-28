@extends('layouts.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<h3 class="text-primary text-center font-weight-bold">開刀房資料</h3>
<table class="table table-hover text-center">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">日期</th>
            <th scope="col">病人ID</th>
            <th scope="col">病房</th>
            <th scope="col">開刀時間</th>
            <th scope="col">結束時間</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($operation as $item)
        <tr>
            <th scope="row">{{ $item->op_id }}</th>
            <td>{{ $item->date }}</td>
            <td>{{ $item->char_no }}</td>
            <td>{{ $item->room }}</td>
            <td>{{ $item->st_time }}</td>
            <td>{{ $item->end_time }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<!-- /.content-wrapper -->

@endsection

@section('javascript')
