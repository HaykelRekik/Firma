<?php

namespace App\Http\Controllers;

use App\Sensor;
use App\Temperatureval;
use App\Humidityval;
use App\Motionval;
use Carbon\Carbon;
use Illuminate\Http\Request;


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


    public function pdf($sensor_id, $days)
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->roomsDataToHtml($sensor_id, $days));
        return $pdf->stream("SENSOR_DATA.pdf", array("Attachment" => false));
    }

    public function roomsDataToHtml($sensor_id, $days)
    {
        $sensorData = $this->getroomsval($sensor_id, $days);
        $output = '
            <h3 align="center">Sensors Data</h3>
            <table width="100%" style="border-collapse: collapse; border: 0px;">
            <tr>
                <th style="border: 1px solid; padding:1px;" width="30%">ID</th>
                <th style="border: 1px solid; padding:1px;" width="20%">Sensor ID</th>
                <th style="border: 1px solid; padding:1px;" width="20%">Value</th>
                <th style="border: 1px solid; padding:1px;" width="30%">Created</th>
            </tr>
     ';
        foreach ($sensorData as $val) {
            $output .= '
                <tr>
                    <td style="border: 1px solid; padding:1px;">' . $val->id . '</td>
                    <td style="border: 1px solid; padding:1px;">' . $val->sensor_id . '</td>
                    <td style="border: 1px solid; padding:1px;">' . $val->value . '</td>
                    <td style="border: 1px solid; padding:1px;">' . $val->created_at . '</td>
                    
                </tr>
      ';
        }
        $output .= '</table>';

        return $output;
    }
}


    
