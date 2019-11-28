@extends('layouts.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<h3 class="text-primary text-center font-weight-bold">病人資料</h3>
<table class="table table-hover text-center">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">病人姓名</th>
            <th scope="col">性別</th>
            <th scope="col">生日</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($patient as $item)
        <tr>
            <th scope="row">{{ $item->char_no }}</th>
            <td>{{ $item->name }}</td>
            <td>{{ $item->sex }}</td>
            <td>{{ $item->b_date }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- /.content-wrapper -->
@endsection

@section('javascript')
@stop
