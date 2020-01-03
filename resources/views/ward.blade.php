@extends('layouts.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="card" style="margin-top: 80px">
    <div class="card-header text-center">
        <h3 class="text-primary text-center font-weight-bold"
            style="display: inline-block; text-shadow: 1px 1px 0.5px #495057;">病房資料</h3>
        <a type="button" href="" class="btn btn-outline-success" data-toggle="modal" data-target="#createPatient"
            style="display: inline-block; float: right">
            <i class="fa fa-plus"></i> 新增</a>
    </div>
    <div>
        <input type="search" id="search" placeholder="search..." style="width: 200px; float: right; margin: 15px">
    </div>
<table class="table table-hover text-center" id="wardTable">
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
            <td>{{ $item->type }} 人房</td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
<!-- /.content-wrapper -->

@endsection

@section('javascript')
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="/dist/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>

    $(document).ready(function () {
        $.noConflict();
        $('.dataTables_wrapper').css('padding', '15px')
    });

    function patientInfo(info) {
        $('#patient_' + info).toggle()
    }


    var grep = function (array, callback, invert) {

        var returnArray = [],
            callbackValue;

        // we negate the invert
        invert = !!invert;

        // Go through the array, only saving the items
        // that pass the validator function
        for (var i = array.length; i--;) {
            callbackValue = !!callback(array[i], i);
            if (invert !== callbackValue) {
                returnArray.push(array[i]);
            }
        }

        return returnArray;
    };


    var fuzzySearch = function (text, query) {
        text = text.toLowerCase();
        query = query.toLowerCase().split('');

        return !grep(query, function (value) {
            return text.indexOf(value) === -1;
        }).length;
    };

    var $list = $('#wardTable');

    $('#search').on('keyup', function () {
        var value = this.value;
        $list.find('tr').each(function () {
            $(this).toggle(fuzzySearch(this.innerText, value));
        });
    });
</script>
@stop
