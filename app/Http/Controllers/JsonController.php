<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Json;
use Validator;
use DB;
class JsonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
//     public function create()
//  {
// 			$User = array(
// 				'name' => 'Arif',
// 				'age' => 20,
// 			);

// 			$Article = new Article();
// 			$Article->data = json_encode($User);
// 			$Article->save();
//       return response()->json(['success' => 'success'], 200); 
//     }
    public function create(Request $request)
    {


        $json = new Json;
        $data = array(
            				'name' => $request->name,
            				'age' => $request->age,
                        );
                        
        $json->name = $request->name;
        $json->propertise = json_encode($data); 

        if($json->save()){
            return response()->json(['success'=>"json created successfully !"], 200);
        }else{
            return response()->json(['error'=>"json creation unsuccessful !"], 400);
        }
 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function GetAlljsondata()
    {
        $alljson = DB::table('jsons')->get();
        if($alljson) return response()->json($alljson, 200);

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
