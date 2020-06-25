<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Validator;
use DB;
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
            
            ]);
            
            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
    
            }
            
            $student = new Student;
                // $user_token=$request->token;
                // $student =auth("users")->authenticate($user_token);

            $student->student_id = $request->student_id;
            $student->student_name = $request->student_name;
            $student->student_email = $request->student_email;
            $student->student_mobile = $request->student_mobile;
           
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
