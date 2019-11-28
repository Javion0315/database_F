@extends('layouts.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<h3 class="text-primary text-center font-weight-bold">病房資料</h3>
<table class="table table-hover text-center">
    <thead>
        <tr>
            <th scope="col">病房</th>
            <th scope="col">區域</th>
            <th scope="col">類別</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ward as $item)
        <tr>
            <th scope="row">{{ $item->room }}</th>
            <td>{{ $item->area }}</td>
            <td>{{ $item->type }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<!-- /.content-wrapper -->

@endsection

@section('javascript')
@stop
