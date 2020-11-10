<?php

namespace App\Http\Controllers;

use App\Sensor;
use App\Temperatureval;
use App\Humidityval;
use App\Motionval;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;


class SensorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function roomsensors($room_id)
    {
        $sensors = Sensor::where('room_id',$room_id)->orderBy('type')->get();

        return response()->json($sensors,200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
            $sensor = new Sensor();
            $sensor->max_value =$request->max_value;
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
    public function roomssensorsview($room_id)

    {
        return View('roomssensors')->with('room_id', $room_id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function get_24h_value($sensor_id)
    {

        if(Temperatureval::where('sensor_id', $sensor_id)->first()){
            $now= carbon::now();
            $val = Temperatureval::where('sensor_id', $sensor_id)->where('created_at', '>=', $now->subDay()->toDateTimeString())->get();
    
            return $val;

        }
        elseif(Humidityval::where('sensor_id', $sensor_id)->first()){
            $now= carbon::now();
            $val = Humidityval::where('sensor_id', $sensor_id)->where('created_at', '>=', $now->subDay()->toDateTimeString())->get();
    
            return $val;

        }
        elseif(Motionval::where('sensor_id', $sensor_id)->first()){
            $now= carbon::now();
            $val = Motionval::where('sensor_id', $sensor_id)->where('created_at', '>=', $now->subDay()->toDateTimeString())->get();
    
            return $val;

        }
        else{
            return response()->json('there is no mesure for this sensor id ');
        }
        
    }

    public function get_7j_value($sensor_id)
    {

        if(Temperatureval::where('sensor_id', $sensor_id)->first()){
            $now= carbon::now();
            $val = Temperatureval::where('sensor_id', $sensor_id)->where('created_at', '>=', $now->subDays(7)->toDateTimeString())->get();
            
            return $val;

        }
        elseif(Humidityval::where('sensor_id', $sensor_id)->first()){
            $now= carbon::now();
            $val = Humidityval::where('sensor_id', $sensor_id)->where('created_at', '>=', $now->subDays(7)->toDateTimeString())->get();
    
            return $val;

        }
        elseif(Motionval::where('sensor_id', $sensor_id)->first()){
            $now= carbon::now();
            $val = Motionval::where('sensor_id', $sensor_id)->where('created_at', '>=', $now->subDays(7)->toDateTimeString())->get();
    
            return $val;

        }
        else{
            return response()->json('there is no mesure for this sensor id ');
        }
        
    }


    public function get_30j_value($sensor_id)
    {

        if(Temperatureval::where('sensor_id', $sensor_id)->first()){
            $now= carbon::now();
            $val = Temperatureval::where('sensor_id', $sensor_id)->where('created_at', '>=', $now->subDays(30)->toDateTimeString())->get();
    
            return $val;

        }
        elseif(Humidityval::where('sensor_id', $sensor_id)->first()){
            $now= carbon::now();
            $val = Humidityval::where('sensor_id', $sensor_id)->where('created_at', '>=', $now->subDays(30)->toDateTimeString())->get();
    
            return $val;

        }
        elseif(Motionval::where('sensor_id', $sensor_id)->first()){
            $now= carbon::now();
            $val = Motionval::where('sensor_id', $sensor_id)->where('created_at', '>=', $now->subDays(30)->toDateTimeString())->get();
    
            return $val;

        }
        else{
            return response()->json('there is no mesure for this sensor id ');
        }
        
    }



    public function get_total_value($sensor_id)
    {

        if(Temperatureval::where('sensor_id', $sensor_id)->first()){
            $val = Temperatureval::where('sensor_id', $sensor_id)->get();
    
            return $val;

        }
        elseif(Humidityval::where('sensor_id', $sensor_id)->first()){
            $val = Humidityval::where('sensor_id', $sensor_id)->get();
    
            return $val;

        }
        elseif(Motionval::where('sensor_id', $sensor_id)->first()){
            $val = Motionval::where('sensor_id', $sensor_id)->get();
    
            return $val;

        }
        else{
            return response()->json('there is no mesure for this sensor id ');
        }
        
    }


    public function get_custom_value($sensor_id,$from,$to)
    {

        if(Temperatureval::where('sensor_id', $sensor_id)->first()){
            $val = Temperatureval::where('sensor_id', $sensor_id)->where('created_at', '>=', $from)->where('created_at', '<', $to)->get();
    
            return $val;

        }
        elseif(Humidityval::where('sensor_id', $sensor_id)->first()){
            $val = Temperatureval::where('sensor_id', $sensor_id)->where('created_at', '>=', $from)->where('created_at', '<', $to)->get();
    
            return $val;

        }
        elseif(Motionval::where('sensor_id', $sensor_id)->first()){
            $val = Temperatureval::where('sensor_id', $sensor_id)->where('created_at', '>=', $from)->where('created_at', '<', $to)->get();
    
            return $val;

        }
        else{
            return response()->json('there is no mesure for this sensor id ');
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function edit(Sensor $sensor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)

    {
        Sensor::where('sensor_id', $request->sensor_id)
        ->update(
            [
                'max_value' => $request->max_value,
                'type' => $request->type,
                'sensor_id' => $request->sensor_id
            ]);
        $response = [
            'msg' => 'sensor has been succefuly updated',
            'success' => 1,
            'status' => 200,
        ];
        return response()->json($response, $response['status']);
    }


    public function updatevalue(Request $request)

    {
        Sensor::where('sensor_id', $request->sensor_id)
        ->update(
            [
                'max_value' => $request->max_value,
                'sensor_id' => $request->sensor_id
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
     * @param  \App\Sensor  $sensor
     * @return \Illuminate\Http\Response
     */
    public function destroy($sensor_id)
    {
        Sensor::where('sensor_id', $sensor_id)->delete();
        $response = [
            'msg' => 'your sensor has been deleted',
            'success' => 1,
            'status' => 200
        ];
        return response()->json($response, $response['status']);
    }

    public function getallsensors()
    {
        $sensors = Sensor::all();
        return response()->json($sensors, 200);
    
    } 


    public function getroomsval($sensor_id, $days)
        
    {
        if(Temperatureval::where('sensor_id', $sensor_id)->first()){
            $now= carbon::now();
            $vals = Temperatureval::where('sensor_id', $sensor_id)->where('created_at', '>=', $now->subDays($days)->toDateTimeString())->get();
    
            return $vals;

        }
        elseif(Humidityval::where('sensor_id', $sensor_id)->first()){
            $now= carbon::now();
            $vals = Humidityval::where('sensor_id', $sensor_id)->where('created_at', '>=', $now->subDays($days)->toDateTimeString())->get();
    
            return $vals;

        }
        elseif(Motionval::where('sensor_id', $sensor_id)->first()){
            $now= carbon::now();
            $vals = Motionval::where('sensor_id', $sensor_id)->where('created_at', '>=', $now->subDays($days)->toDateTimeString())->get();
    
            return $vals;

        }
    
    }



    public function getroomsvaltotal($sensor_id)
        
    {
        if(Temperatureval::where('sensor_id', $sensor_id)->first()){
            $val = Temperatureval::where('sensor_id', $sensor_id)->get();
    
            return $val;
    
        }
        elseif(Humidityval::where('sensor_id', $sensor_id)->first()){
            $val = Humidityval::where('sensor_id', $sensor_id)->get();
    
            return $val;
    
        }
        elseif(Motionval::where('sensor_id', $sensor_id)->first()){
            $val = Motionval::where('sensor_id', $sensor_id)->get();
    
            return $val;
    
        }
        else{
            return response()->json('there is no mesure for this sensor id ');
        }
    
    }


    public function getroomsvalcustom($sensor_id,$from,$to)
        
    {
        if(Temperatureval::where('sensor_id', $sensor_id)->first()){
            $val = Temperatureval::where('sensor_id', $sensor_id)->where('created_at', '>=', $from)->where('created_at', '<=', $to)->get();
    
            return $val;

        }
        elseif(Humidityval::where('sensor_id', $sensor_id)->first()){
            $val = Temperatureval::where('sensor_id', $sensor_id)->where('created_at', '>=', $from)->where('created_at', '<=', $to)->get();
    
            return $val;

        }
        elseif(Motionval::where('sensor_id', $sensor_id)->first()){
            $val = Temperatureval::where('sensor_id', $sensor_id)->where('created_at', '>=', $from)->where('created_at', '<', $to)->get();
    
            return $val;

        }
        else{
            return response()->json('there is no mesure for this sensor id ');
        }
    }




    public function pdf($sensor_id, $days)
    {
        $pdf = \App::make('dompdf.wrapper');
        $now= carbon::now();
        $sensorData = $this->getroomsval($sensor_id, $days);
        $pdf = PDF::loadView('records', compact('sensorData','now'));
        return $pdf->stream("records.pdf");
    }


    public function pdftotal($sensor_id)
    {
        $pdf = \App::make('dompdf.wrapper');
        $now= carbon::now();
        $sensorData = $this->getroomsvaltotal($sensor_id);
        $pdf = PDF::loadView('records', compact('sensorData','now'));
        return $pdf->stream("records.pdf");
    }

    public function pdfcustom($sensor_id,$from,$to)
    {
        $pdf = \App::make('dompdf.wrapper');
        $now= carbon::now();
        $sensorData = $this->getroomsvalcustom($sensor_id,$from,$to);
        $pdf = PDF::loadView('records', compact('sensorData','now'));
        return $pdf->stream("records.pdf");
    }

}







    
