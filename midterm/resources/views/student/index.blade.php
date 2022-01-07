@extends("layouts.master")
@section('title') ti61 @stop
@section('content')

<br>
<center><h1>น้ำหนักส่วนสูงของ IT61</h1>   </center>
<br>


<div class="panel panel-default">
<center>
    <a href="{{ URL::to('student/edit') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i> เพิ่มข้อมูล</a>
        <form action="{{ URL::to('student/search') }}" method="post" class="form-inline">
            {{ csrf_field() }}
            
         <input  type="text" name="q" class="form-control" placeholder="พิมพ์ชื่อเมืองที่ต้องการค้นหา">
            <button type="submit" class="btn btn-outline-primary"><i class="fa fa-search"></i> ค้นหา</button>
        </form>
     
     
    </div>
 

    <table class="table table-bordered table-striped table-hover">
    
        <thead>
        <br>
        <tr>
            <td>ลำดับ</td>
            <td>เลขที่</td>
            <td>ชื่อ </td>
            <td>นามสกุล</td>
            <td>อายุ</td>
            <td>เพศ</td>
            <td>น้ำหนัก </td>
            <td>ส่วนสูง </td>
        </tr>
        </thead>
        <tbody>
            @foreach($students as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->num }}</td>
                <td>{{ $p->f_name }}</td>
                <td>{{ $p->l_name }}</td>
                <td>{{ $p->age }}</td>
                <td>{{ $p->sex }}</td>
                <td>{{ $p->weight }}</td>
                <td>{{ $p->height }}</td>
                <td>
                <a href="{{ URL::to('student/edit/'.$p->id) }}" class="btn btn-warning"><i class="fa fa-pencil"></i>แก้ไข</a>
                    <a href="#" class="btn btn-danger btn-delete" id-delete="{{ $p->id }}"><i class="fa fa-trash-o"></i> ลบ</a>
                </td>
                <script>
                    $('.btn-delete').on('click', function() {
                        if(confirm("คุณต้องการลบข้อมูลหรือไม่?")) {
                            var url = "{{ URL::to('student/remove') }}" + '/' + $(this).attr('id-delete');
                            window.location.href = url;
                        }
                        
                    });
                </script>
            </tr>
            
            @endforeach
        </tbody>
        
    </table>

    {{ $students->links() }}
            <br>
   <center>
   <a href="http://127.0.0.1:8000/student"button type="button" class="btn btn-outline-info"><i class="fas fa-home"></i>หน้าแรก</button></a>    
   <a href="studentJS"button type="button" class="btn btn-danger"><i class=""></i>ส่วนสูง</button></a>
   <a href="student1JS"button type="button" class="btn btn-danger">น้ำหนัก</button></a> 



</center>
                </br></br></br>
</div>


@stop
