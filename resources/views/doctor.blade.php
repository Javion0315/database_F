@extends('layouts.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="card" style="margin-top: 80px">
    <div class="card-header text-center">
        <h3 class="text-primary text-center font-weight-bold"
            style="display: inline-block; text-shadow: 1px 1px 0.5px #495057;">醫師資料</h3>
        <a type="button" href="" class="btn btn-outline-success" data-toggle="modal" data-target="#createDoctor"
            style="display: inline-block; float: right">
            <i class="fa fa-plus"></i> 新增</a>
    </div>
    <div>
        <input type="search" id="search" placeholder="search..." style="width: 200px; float: right; margin: 15px">
    </div>
    @if ( $message = Session::get('success'))
    <div style="display:flex; justify-content: flex-start">
        <div class="alert alert-success" style="height: 50px; width: 30%; text-align: center">
            <p style="font-weight: bold"><i class="fa fa-check" style="padding-right: 15px"></i> {{ $message }}</p>
        </div>
    </div>
    @endif
    <table class="table table-hover text-center" id="doctorTable">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">醫師姓名</th>
                <th scope="col">性別</th>
                <th scope="col">生日</th>
                <th scope="col">部門</th>
                <th scope="col">操作</th>
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
                <td>
                    <div style="display: inline-block">
                        <a data-toggle="modal" data-target="#editdoctor" href="/doctor/{{$item->ssn}}"><input
                                type="submit" class="btn btn-primary delete-user" value="編輯"></a>
                    </div>
                    <form method="POST" action="/doctor/{{$item->ssn}}" style="display: inline-block">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <div>
                            <input type="submit" class="btn btn-danger delete-user" value="刪除">
                        </div>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="modal fade" id="createDoctor" tabindex="-1" role="dialog" aria-labelledby="createDoctorLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center text-danger w-100" style="font-weight: bold"
                        id="createDoctorLabel">新增醫師資料</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('patients.create')}}">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="Pname" class="col-sm-2 col-form-label">醫師姓名</label>
                            <div class="col-sm-10">
                                <input type="text" name="Pname" class="form-control" id="Pname">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Psex" class="col-sm-2 col-form-label">醫師性別</label>
                            <div class="col-sm-10">
                                <input type="text" name="Psex" class="form-control" id="Psex">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Pdate" class="col-sm-2 col-form-label">醫師生日</label>
                            <div class="col-sm-10">
                                <input type="text" name="Pdate" class="form-control" id="Pdate">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Pdep" class="col-sm-2 col-form-label">醫師部門</label>
                            <div class="col-sm-10">
                                <input type="text" name="Pdep" class="form-control" id="Pdep">
                            </div>
                        </div>
                        <div style="float: right;">
                            <button type="submit" class="btn btn-primary">新增</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="editdoctor" tabindex="-1" role="dialog" aria-labelledby="editDoctorLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center text-danger w-100" style="font-weight: bold"
                        id="editDoctorLabel">編輯醫師資料</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="GET" action="{{ route('doctor.edit', $item->ssn)}}">
                        {{-- <form> --}}
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="Pname" class="col-sm-2 col-form-label">醫師姓名</label>
                            <div class="col-sm-10">
                                <input type="text" name="Pname" class="form-control" id="Pname">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Psex" class="col-sm-2 col-form-label">醫師性別</label>
                            <div class="col-sm-10">
                                <input type="text" name="Psex" class="form-control" id="Psex">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Pdate" class="col-sm-2 col-form-label">醫師生日</label>
                            <div class="col-sm-10">
                                <input type="text" name="Pdate" class="form-control" id="Pdate">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Pdep" class="col-sm-2 col-form-label">醫師部門</label>
                            <div class="col-sm-10">
                                <input type="text" name="Pdep" class="form-control" id="Pdep">
                            </div>
                        </div>
                        <div style="float: right;">
                            <button type="submit" class="btn btn-primary">修改</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
        // $('#doctorTable').DataTable({
        // });
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

    var $list = $('#doctorTable');

    $('#search').on('keyup', function () {
        var value = this.value;
        $list.find('tr').each(function () {
            $(this).toggle(fuzzySearch(this.innerText, value));
        });
    });
</script>
@stop
