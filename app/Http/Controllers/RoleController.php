<?php

namespace App\Http\Controllers;
use App\Models\role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function get_role_by_id($id){
        $role=role::find($id);
        
        if (!$role) {
        return response()->json(['message' => 'role not found'], 404);
        }

        return response()->json($role);
    }

}
