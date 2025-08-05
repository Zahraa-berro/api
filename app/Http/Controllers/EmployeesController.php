<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use App\Models\employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;;

class EmployeesController extends Controller
{
     public function get_all_users(){
        $users=employees::all();
        return response()->json($users);
    }

    public function get_user_by_id($id){
        $user=employees::find($id);
        
        if (!$user) {
        return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json($user);
    }

    public function add_user(Request $request){
        $newuser=employees::create($request->all());
           $res=[
            "message"=> "added succefully",
            "status"=>200,
            "data"=>$newuser,
        ];
        return response()->json($res);
    }

     public function delete_user ($id){
        $deluser=employees::find($id);

        if (!$deluser) {
        return response()->json(['message' => 'User not found'], 404);
        }

        $deluser->delete();
        $res=[
            "message"=> "deleted succefully",
            "status"=>200,
            "data"=>$deluser,
        ];
        return response()->json($res);
    }

    

public function update_user(Request $request, $id)
{
    $moduser = employees::find($id);

    if (!$moduser) {
        return response()->json(['message' => 'User not found'], 404);
    }

    // Validate the incoming request
    $validator = Validator::make($request->all(), [
        'firstName' => 'required|string|max:255',
        'lastName'  => 'required|string|max:255',
        'email'     => 'required|email|unique:people,email,' . $id,
        'password'  => 'required|string|min:6',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    // Update user safely
    $moduser->firstName = $request->input('firstName');
    $moduser->lastName  = $request->input('lastName');
    $moduser->email     = $request->input('email');
    $moduser->password  = $request->input('password');
    //$moduser->password  = bcrypt($request->input('password'));
    $moduser->save();

    return response()->json([
        "message" => "Updated successfully",
        "status" => 200,
        "data" => $moduser,
    ]);
}
}
