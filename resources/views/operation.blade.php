@extends('layouts.master')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="card" style="margin-top: 80px">
    <div class="card-header text-center">
        <h3 class="text-primary text-center font-weight-bold"
            style="display: inline-block; text-shadow: 1px 1px 0.5px #495057;">開刀房資料</h3>
        <a type="button" href="" class="btn btn-outline-success" data-toggle="modal" data-target="#createPatient"
            style="display: inline-block; float: right">
            <i class="fa fa-plus"></i> 新增</a>
    </div>
    <div>
        <input type="search" id="search" placeholder="search..." style="width: 200px; float: right; margin: 15px">
    </div>
    <table class="table table-hover text-center" id="operationTable">
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
                <td><a data-toggle="modal" class="text-primary" onclick="patientInfo({{$item->char_no}})"
                        style="cursor: pointer;">{{ $item->char_no }}</a></td>
                <td>{{ $item->room }}</td>
                <td>{{ $item->st_time }}</td>
                <td>{{ $item->end_time }}</td>
            </tr>
            <tr>
               
            
                @foreach($item->patient as $patient)
                    <div class="w3-container">
                        <div id="patientInfo_{{$item->char_no}}" class="w3-modal">
                            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:300px">
                            <div class="w3-center"><br>
                                <span onclick="document.getElementById('patientInfo_{{$item->char_no}}').style.display='none'"
                                    class="w3-button w3-xlarge w3-transparent w3-display-topright"
                                    title="Close Modal">×</span>
                            </div>
                            <div class="w3-center"><br>
                                <img src="http://www.fju.edu.tw/showImg/event/event8.jpg" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
                            </div>
                            <label for="date" class="col-sm-2 col-form-label"></label>
                                <form method="POST" action="{{ route('patients.create')}}">
                                    {{ csrf_field() }}
                                    <div class="form-group row">
                                        <label for="date" class="col-sm-2 col-form-label">  病人:</label>
                                        <div class="col-sm-5">
                                            <input type="text" name="date" class="form-control" id="date" value="{{is_null($patient->name) ? '-' : $patient->name}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                         <label for="date" class="col-sm-2 col-form-label">  性別:</label>
                                        <div class="col-sm-5">
                                            <input type="text" name="date" class="form-control" id="date" value="{{is_null($patient->sex) ? '-' : $patient->sex}}">
                                        </div>
                                    </div>
                                    @foreach($item->doctor as $doctor)
                                    <div class="form-group row">
                                        <label for="date" class="col-sm-2 col-form-label">  醫生:</label>
                                        <div class="col-sm-5">
                                            <input type="text" name="date" class="form-control" id="date" value="{{is_null($doctor->name) ? '-' : $doctor->name}}">
                                        </div>
                                    </div>
                            
                                    <div class="form-group row">
                                        <label for="date" class="col-sm-2 col-form-label">  部門:</label>
                                        <div class="col-sm-5">
                                            <input type="text" name="date" class="form-control" id="date" value="{{is_null($doctor->dept) ? '-' : $doctor->dept}}">
                                        </div>
                                    
                                    </div>
                                    @endforeach
                                </form>
                        
                                
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="modal fade" id="createPatient" tabindex="-1" role="dialog" aria-labelledby="createPatientLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center text-danger w-100" style="font-weight: bold"
                        id="createPatientLabel">新增開刀房資料</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('patients.create')}}">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="date" class="col-sm-2 col-form-label">日期</label>
                            <div class="col-sm-10">
                                <input type="text" name="date" class="form-control" id="date">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="PID" class="col-sm-2 col-form-label">病人ID</label>
                            <div class="col-sm-10">
                                <input type="text" name="PID" class="form-control" id="PID">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="room" class="col-sm-2 col-form-label">病房</label>
                            <div class="col-sm-10">
                                <input type="text" name="room" class="form-control" id="room">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="start" class="col-sm-2 col-form-label">開刀時間</label>
                            <div class="col-sm-10">
                                <input type="text" name="start" class="form-control" id="start">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="end" class="col-sm-2 col-form-label">結束時間</label>
                            <div class="col-sm-10">
                                <input type="text" name="end" class="form-control" id="end">
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
        // $('#operationTable').DataTable({
        // });
        $('.dataTables_wrapper').css('padding', '15px')
    });

    function patientInfo(info) {
        $('#patientInfo_' + info).show()
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

    var $list = $('#operationTable');

    $('#search').on('keyup', function () {
        var value = this.value;
        $list.find('tr').each(function () {
            $(this).toggle(fuzzySearch(this.innerText, value));
        });
    });
</script>
@stop
