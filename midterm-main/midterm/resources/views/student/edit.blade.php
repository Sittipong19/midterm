@extends("layouts.master")
@section('title') student-19 @stop
@section('content')
<br>
<center><h1>น้ำหนักส่วนสูงของ IT6</h1>
<br>

<div class="panel panel-default">
    {!! Form::model($student, array('action' => 'StudentController@update','method' => 'post', 'enctype' => 'multipart/form-data')) !!}
    <input type="hidden" name="id" value="{{ $student->id }}">
    @if($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)<div>{{ $error }}</div>@endforeach
    </div>
    @endif

    <div class="panel-heading">
        <div class="panel-title"><strong>แก้ไขข้อมูล Covie-19</strong></div>
    </div>
    <div class="panel-body">
        <table>

            <tr>
                <td>{{ Form::label('num', 'เลขที่') }}</td>
                <td>{{ Form::text('num', Request::old('num'), ['class' => 'form-control']) }}</td>
            </tr>
            <tr>
                <td>{{ Form::label('f_name', 'ชื่อ') }}</td>
                <td>{{ Form::text('f_name', Request::old('f_name'), ['class' => 'form-control']) }}</td>
            </tr>
            <tr>
                <td>{{ Form::label('l_name', 'นามสกุล') }}</td>
                <td>{{ Form::text('l_name', Request::old('l_name'), ['class' => 'form-control']) }}</td>
            </tr>
            <tr>
                <td>{{ Form::label('age', 'อายุ') }}</td>
                <td>{{ Form::text('age', Request::old('age'), ['class' => 'form-control']) }}</td>
            </tr>
            <tr>
                <td>{{ Form::label('sex', 'เพศ') }}</td>
                <td>{{ Form::text('sex', Request::old('sex'), ['class' => 'form-control']) }}</td>
            </tr>
            <tr>
                <td>{{ Form::label('weight', 'น้ำหนัก') }}</td>
                <td>{{ Form::text('weight', Request::old('weight'), ['class' => 'form-control']) }}</td>
            </tr>
            <tr>
                <td>{{ Form::label('height', 'ส่วนสูง') }}</td>
                <td>{{ Form::text('height', Request::old('height'), ['class' => 'form-control']) }}</td>
            </tr>

           
        </table>
    </div>
    <br>
    <div class="panel-footer">
      <button type="http://127.0.0.1:8000/student" class="btn btn-danger">ยกเลิก</button>
      <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> บันทึก</button>
    </div>
    {!! Form::close() !!}
</div>
</center>
@stop
