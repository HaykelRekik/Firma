<?php

namespace App\Http\Controllers;

use App\sensor;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sensors = sensor::all()
               ->orderBy('name')
               ->take(10)
               ->get();
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
            $sensor = new sensor();
            $sensor->reference =$request->reference;
            $sensor->type =$request->type;
            $sensor->room_id = $request->room_id;
            $sensor->save();
            return response()->json(['msg' => 'new sensor has been created', 'success' => 1], 200);
       
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function associate(Request $request)

    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function show(sensor $sensor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function edit(sensor $sensor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        sensor::where('sensor_id', $request->sensor_id)
        ->update(
            [
                'reference' => $request->reference,
                'type' => $request->type,
                'room_id' => $request->room_id
            ]);
        $response = [
            'msg' => 'sensor has been succefuly updated',
            'success' => 1,
            'status' => 200,
        ];
        return response()->json($response, $response['status']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function destroy($sensor_id)
    {
        sensor::where('sensor_id', $sensor_id)->delete();
        $response = [
            'msg' => 'your sensor has been deleted',
            'success' => 1,
            'status' => 200
        ];
        return response()->json($response, $response['status']);
    }

    public function getallsensors()
    {
    $sensors = sensor::all();
    return response()->json($sensors, 200);
    
    } 
}
