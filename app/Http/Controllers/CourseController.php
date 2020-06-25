<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use Validator;
use DB;
class CourseController extends Controller
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
            'course_id' => 'required|integer',
            'course_name' => 'required|string',
            'course_code'=>'required|string',
            
        ]);
        
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $course = new Course;
        $user_token=$request->token;
        $user =auth("users")->authenticate($user_token);
        $course->course_id = $request->course_id;
        $course->course_name = $request->course_name;
        $course->course_code = $request->course_code;
     
        $user_token=$request->token;
        $user =auth("users")->authenticate($user_token);
        
        if($course->save()){
            return response()->json(['success'=>"course created successfully !"], 200);
        }else{
            return response()->json(['error'=>"course creation unsuccessful !"], 400);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function GetAllCourse()
    {
        $allcourse = DB::table('courses')->get();
        if($allcourse) return response()->json($allcourse, 200);

        return response()->json(['error'=>"No user found !"], 400);
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
