<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enrolement;
use Validator;
use DB;
class EnrolementController extends Controller
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
        {
            $validator = Validator::make($request->all(), [
               
                'student_id' => 'required|exists:students,student_id', 
                 'course_id' => 'required|exists:courses,course_id'
               
               
             
               ,
            ]);
            
            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }
    
            $enrolement = new Enrolement;
    
            $enrolement->student_id = $request->student_id;
            $enrolement->course_id=$request->course_id;
            if($enrolement->save()){
                return response()->json(['success'=>"enrolement created successfully !"], 200);
            }else{
                return response()->json(['error'=>"enrolement creation unsuccessful !"], 400);
            }  
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function GetAllEnrolement($id)
    {
        $enrolementlist = enrolement::where('id',$id)->get();
        return response()->json(['success'=>'enrolementlist sucessfully listed','data' =>$enrolementlist],200); 
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
