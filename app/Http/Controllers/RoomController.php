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

    public function get_last5_mesure($room_id){
        $room_mesures=roomvalue::where('room_id',$room_id)->whereDate('created_at', Carbon::today())->get(); 


        return response()->json($room_mesures);

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

}







