<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $response = [
                'msg' => 'User Already exist',
                'success' => -1,
                'status' => 400
            ];
        }
        else{
        $user = new User;
        $user->Firstname = $request->Firstname;
        $user->Lastname = $request->Lastname;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->type = $request->type;
        $user->save();

        };

        $response = [
            'msg' => 'User Succsefully created',
            'success' => 1,
            'status' => 201 //created response code
        ];
        return response()->json($response, $response['status']);
    }



    public function getUser($id)
    {
        $user = User::where('id',$id)->first();
        if ($user) {
            $response = [
                'msg' => 'User Details',
                'success' => 1,
                'user_id' => $user->user_id,
                'Firstname' => $user->Firstname,
                'Lastname' => $user->Lastname,
                'phone' => $user->phone,
                'type' => $user->type,
                'email' => $user->email,
                'created_at' => $user->created_at,
                'status' => 200,
            ];
        } else {
            $response = [
                'msg' => 'User Not Found',
                'success' => -1,
                'status' => 404,
            ];
        }

        return response()->json($user);
        // return view('',compact('email'))
    }
    public function update(Request $request)
    {
        $user = User::where('id', $request->id)
        ->update(
            [
                'Firstname' => $request->Firstname,
                'Lastname' => $request->Lastname,
                'phone' => $request->phone,
                'type' => $request->type,
                'email' => $request->email,
                'password' =>bcrypt($request->password)
            ]);
        $response = [
            'msg' => 'user has been succefuly updated',
            'success' => 1,
            'status' => 200,
        ];
        return response()->json($response, $response['status']);
    }
    public function delete($id)
    {
        User::where('id', $id)->delete();
        $response = [
            'msg' => 'user deleted',
            'success' => 1,
            'status' => 200,
        ];
        return response()->json($response, $response['status']);
    }


    //get all users 

    public function getall()
    {
        $user = User::all();
        return response()->json($user, 200);
        
    }  


    public function update2(Request $request)
    {
        User::where('id', $request->id)
        ->update(
            [
                'Firstname' => $request->Firstname,
                'Lastname' => $request->Lastname,
                'phone' => $request->phone,
                'email' => $request->email,
                'email2' => $request->email2,
                'address' => $request->address,
                'city' => $request->city,
                'country' => $request->country,
                'zipcode' => $request->zipcode
            ]);
        $response = [
            'msg' => 'user has been succefuly updated',
            'success' => 1,
            'status' => 200,
        ];
        return response()->json($response, $response['status']);
    }


}


