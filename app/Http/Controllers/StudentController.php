<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Validator;
use DB;
use Image;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

      
            $validator = Validator::make($request->all(), [
                'student_id' => 'required|integer',
                'student_name' => 'required|string',
                'student_email'=>'required|email',
                'student_mobile'   => 'required|max:15',
                'student_image'=>'required|image|mimes:jpg,png,jpeg|max:5000',
            
            ]);
            
            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
    
            }
            
            $student = new Student;
            $imageNames = "";
            $student->student_id = $request->student_id;
            $student->student_name = $request->student_name;
            $student->student_email = $request->student_email;
            $student->student_mobile = $request->student_mobile;

            if($file = $request->file("student_image")){
                $images = Image::canvas(600, 600, '#fff');
                $image  = Image::make($file->getRealPath())->resize(600, 600, function($constraint){
                    $constraint->aspectRatio();
                });
                $images->insert($image, 'center');
                $pathImage = date("Y") . '/' . date("m") . '/'.'images/';
                $pathImg = 'studentImages/'.date("Y") . '/' . date("m") . '/'.'images/';;
                $nameReplacer = time().'-'.uniqid(). '.' . $file->getClientOriginalExtension();
                if (!file_exists($pathImg)){
                    mkdir($pathImg, 0777, true);
                    $imageNames  = $pathImage.$nameReplacer;
                    $images->save('studentImages/'.$pathImage.$nameReplacer);
                }
                else{
                    $imageNames  = $pathImage.$nameReplacer;
                    $images->save('studentImages/'.$pathImage.$nameReplacer);
                }         
             $student->student_image = $imageNames;
        }  
        
  

            if($student->save()){
                return response()->json(['success'=>"student created successfully !"], 200);
            }else{
                return response()->json(['error'=>"student creation unsuccessful !"], 400);
            }
    
        
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function GetAllStudent()
    {

        $allstudent = DB::table('students')->get();
        if($allstudent) return response()->json($allstudent, 200);

        return response()->json(['error'=>"No user found !"], 400);

      
    //   $token = $allstudent = DB::table('oauth_access_tokens')->find($request->auth);
     
    //     if ($token) {
    //         return response()->json(['error'=> array(DB::table('students')->get())], 400);
    //     } else {
    //         return response()->json(['error'=>"No user found !"], 400);
    //     }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function UpdateStudentData(Request $request , $id)
    {
        $validator = Validator::make($request->all(), [
            'student_id' => 'required|integer',
            'student_name' => 'required|string',
            'student_email'=>'required|email',
            'student_mobile'   => 'required|max:15',
            'student_image'=>'required|image|mimes:jpg,png,jpeg|max:5000',
            
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $studentUpdate = new Student;

        $studentUpdate = Student::find($request->id);
        $studentUpdate->student_id = $request->student_id;
        $studentUpdate->student_name = $request->student_name;
        $studentUpdate->student_email = $request->student_email;
        $studentUpdate->student_mobile = $request->student_mobile;

        if($file = $request->file("student_image")){
            $images = Image::canvas(600, 600, '#fff');
            $image  = Image::make($file->getRealPath())->resize(600, 600, function($constraint){
                $constraint->aspectRatio();
            });
            $images->insert($image, 'center');
            $pathImage = date("Y") . '/' . date("m") . '/'.'images/';
            $pathImg = 'studentImages/'.date("Y") . '/' . date("m") . '/'.'images/';;
            $nameReplacer = time().'-'.uniqid(). '.' . $file->getClientOriginalExtension();
            if (!file_exists($pathImg)){
                mkdir($pathImg, 0777, true);
                $imageNames  = $pathImage.$nameReplacer;
                $images->save('studentImages/'.$pathImage.$nameReplacer);
            }
            else{
                $imageNames  = $pathImage.$nameReplacer;
                $images->save('studentImages/'.$pathImage.$nameReplacer);
            }         
         $studentUpdate->student_image = $imageNames;
    }

        if($studentUpdate->save()){
            return response()->json(['success'=>'Sucessfully student information updated!'],200);
        }
        return response()->json(['error'=>'Something went wrong !'],400);
    }
        
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function DeleteStudent($id)
    {
        $delete = Student::where('id',$id)->delete();
        if($delete){
         return response()->json(['success'=>'student information delete successfully'],200); 
        }else{
         return response()->json(['error'=>"Lecture data AllReady deleted !"], 400); 
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
