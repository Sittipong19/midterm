<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Student;
use App\Category;

class StudentController extends Controller
{
    
        public function index() {
            $students = Student::paginate();
            return view('student/index', compact('students'));
        }

        public function edit($id = null) {
            $categories = Category::pluck('name', 'id')->prepend('เลือกรายการ', '');
            if($id) {
                $student = Student::where('id', $id)->first();
                return view('student/edit')
                    ->with('student', $student)
                    ->with('categories', $categories);
            } else {
                return view('student/add')
                    ->with('categories', $categories);
            }

        }
        public function update(Request $request) {
            $rules = array(
                'num' => 'required',

    
            );
            $messages = array(
                'required' => 'กรุณากรอกข้อมูล :attribute ให้ครบถ้วน',
                'numeric' => 'กรุณากรอกข้อมูล :attribute ให้เป็นตัวเลข',
            );
            $id = $request->input('id');
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return redirect('student/edit/'.$id)
                    ->withErrors($validator)
                    ->withInput();
            }
            $student = Student::find($id);
            $student->num = $request->input('num');
            $student->f_name = $request->input('f_name');
            $student->l_name = $request->input('l_name');
            $student->age = $request->input('age');
            $student->sex = $request->input('sex');
            $student->weight = $request->input('weight');
            $student->height = $request->input('height');
            $student->save();
            return redirect('student')
                ->with('ok', true)
                ->with('msg', 'บันทึกข้อมูลเรียบร้อยแล้ว');
        
        }
        public function insert(Request $request) {
            $rules = array(
                'num' => 'required',
    
            );
            $messages = array(
                'required' => 'กรุณากรอกข้อมูล :attribute ให้ครบถ้วน',
                'numeric' => 'กรุณากรอกข้อมูล :attribute ให้เป็นตัวเลข',
            );
            $validator = Validator::make($request->all(), $rules, $messages);
            if ($validator->fails()) {
                return redirect('student/edit')
                    ->withErrors($validator)
                    ->withInput();
            }
            $student = new Student();
            $student->num = $request->input('num');
            $student->f_name = $request->input('f_name');
            $student->l_name = $request->input('l_name');
            $student->age = $request->input('age');
            $student->sex = $request->input('sex');
            $student->weight = $request->input('weight');
            $student->height = $request->input('height');
            $student->save();
            return redirect('student')
                ->with('ok', true)
                ->with('msg', 'บันทึกข้อมูลเรียบร้อยแล้ว');
        }
        public function search(Request $request) {
            $query = $request->input('q');
            if($query) {
                $students = Student::where('num', 'like', '%'.$query.'%')
                    ->orWhere('num', 'like', '%'.$query.'%')
                    ->paginate();
    
            } else {
                $students = Student::paginate();
            }
            return view('student/index', compact('students'));
    
        }
    
        public function remove($id) {
            Student::find($id)->delete();
            return redirect('student')
                ->with('ok', true)
                ->with('msg', 'ลบข้อมูลสำเร็จ');
        }
        
    
     
}
