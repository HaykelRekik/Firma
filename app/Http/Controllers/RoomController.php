<?php

namespace App\Http\Controllers;

use App\Room;
use App\roomvalue;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class RoomController extends Controller
{


    /**
     * creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create(Request $request)
    {
        $room = Room::where('user_id', $request->user_id)
            ->where('name', $request->name)
            ->first();
        if ($room) {
            return response()->json(['msg' => 'room already exist', 'success' => -1], 400);
        }
        else {
            $room = new Room();
            $room->name = $request->name;
            $room->maxtemperature = $request->maxtemperature;
            $room->maxhumidity = $request->maxhumidity;
            $room->user_id  = $request->user_id;
            $room->save();
            return response()->json(['msg' => 'new room has been created', 'success' => 1], 200);
       
    }
    }

    public function dashboard($room_id)
    {
        // $data=roomvalue::where('room_id', $room_id)->first();
        
    return View('dashboardc',roomvalue::where('room_id',$room_id)->latest()->first());
    
    }
    

    public function getrooms($user_id)
    {
        $rooms = Room::where('user_id', $user_id)->get();
       return response()->json($rooms, 200);

    }

    public function getroom($room_id)
    {
        $room= Room::where('room_id', $room_id)->first();
        if($room){
       return response()->json($room, 200);}
       else{
           return response()->json(['msg' => 'this room or user does not exist']);
       }
    
    }


    /**
     * Restore rooms data soft deleted
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request)
    {
        $rooms = Room::where('user_id', $request->user_id)
            ->where('name', $request->name)
            ->restore();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }


    public function update(Request $request)
    {
        $room = Room::where('room_id', $request->room_id)
        ->update(
            [
                'name' => $request->newname,
                'maxtemperature' => $request->maxtemperature,
                'maxhumidity' => $request->maxhumidity
            ]);
        $response = [
            'msg' => 'room has been succefuly updated',
            'success' => 1,
            'status' => 200,
        ];
        return response()->json($response, $response['status']);
    }

    public function updatename(Request $request)
    {
        $room = Room::where('room_id', $request->room_id)
        ->update(
            [
                'name' => $request->newname
            ]);
        $response = [
            'msg' => 'room name has been succefuly updated',
            'success' => 1,
            'status' => 200,
        ];
        return response()->json($response, $response['status']);
    }
    

    public function updatemxtemp(Request $request)
    {
         Room::where('room_id', $request->room_id)->update(
            [
                'maxtemperature' => $request->maxtemperature
            ]);
            $response = [
                'msg' => 'room maxtemperature has been succefuly updated',
                'success' => 1,
                'status' => 200,
            ];
            return response()->json($response, $response['status']);

    }

    public function updatemxhum(Request $request)
    {
         Room::where('room_id', $request->room_id)->update(
            [
                'maxhumidity' => $request->maxhumidity
            ]);
            $response = [
                'msg' => 'room maxhumidity has been succefuly updated',
                'success' => 1,
                'status' => 200,
            ];
            return response()->json($response, $response['status']);

    }
    
    
    public function destroy($room_id)
    {
        $rooms = Room::where('room_id', $room_id)->delete();
        $response = [
            'msg' => 'your room has been deleted',
            'success' => 1,
            'status' => 200
        ];
        return response()->json($response, $response['status']);
    }

    public function getallrooms()
    {
    $rooms = Room::all();
    return response()->json($rooms, 200);
    
    }
    

    public function getRoomdata($room_id){
        $room_data=roomvalue::where('room_id',$room_id)->latest()->first();

        return response()->json($room_data);
       
    }


    public function get_24h_mesure(){
        $now= carbon::now();
        $rooms = roomvalue::where('created_at', '>=', $now->subDay()->toDateTimeString())->get();
    
        return $rooms;
    }

    public function get_7j_mesure(){
        $now= carbon::now();
        $rooms = roomvalue::where('created_at', '>=', $now->subDays(7)->toDateTimeString())->get();
    
        return $rooms;
    }
    public function get_30j_mesure(){
        $now= carbon::now();
        $rooms = roomvalue::where('created_at', '>=', $now->subDays(30)->toDateTimeString())->get();
    
        return $rooms;
    }

    public function createRoomdata(Request $request){
       $roomvalue = new roomvalue();
       $roomvalue->room_id = $request->room_id;
       $roomvalue->temperature = $request->temperature;
       $roomvalue->humidity = $request->humidity;
       $roomvalue->motion = $request->motion;
       $roomvalue->save();

       return response()->json('room data created');


    }

     /*
     * PDF Generation Implementation
     */

    // Get Supervisors List For PDF File

    public function getroomsval($days)
        
    {
        $roomsdata = roomvalue::where('created_at', '>=', carbon::now()->subDay($days)->toDateTimeString())->get();
        return $roomsdata;
    }

    public function pdf($days)
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->roomsDataToHtml($days));
        return $pdf->stream("ROOMS_DATA.pdf", array("Attachment" => false));
    }

    public function roomsDataToHtml($days)
    {
        $roomsData = $this->getroomsval($days);
        $output = '
            <h3 align="center">Rooms Data</h3>
            <table width="100%" style="border-collapse: collapse; border: 0px;">
            <tr>
                <th style="border: 1px solid; padding:12px;" width="30%">temperature</th>
                <th style="border: 1px solid; padding:12px;" width="20%">humidity</th>
                <th style="border: 1px solid; padding:12px;" width="20%">motion</th>
                <th style="border: 1px solid; padding:12px;" width="30%">Created</th>
            </tr>
     ';
        foreach ($roomsData as $roomData) {
            $output .= '
                <tr>
                    <td style="border: 1px solid; padding:12px;">' . $roomData->temperature . '</td>
                    <td style="border: 1px solid; padding:12px;">' . $roomData->humidity . '</td>
                    <td style="border: 1px solid; padding:12px;">' . $roomData->motion . '</td>
                    <td style="border: 1px solid; padding:12px;">' . $roomData->created_at->diffForHumans() . '</td>
                    
                </tr>
      ';
        }
        $output .= '</table>';

        return $output;
    }

}







