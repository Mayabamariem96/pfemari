<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    //
    public function users()
    {
        $users = User::all();
        return response()->json($users);
    }
    public function userById($id) {
        if(user::where('id', $id)->exists()) {
            $user = user::where('id', $id)->get();

            return response()->json($user);
        } else {
            return response()->json([
                'Not Found'
            ], 404);

        }
    }
    
    public function update(Request $request, $id) {
        if(User::where('id', $id)->exists()) {
            $user = User::find($id);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);

            $user->save();

            return response()->json('user updated successfully');
        } else {
            return response()->json([
                'Not Found'
            ], 404);

        }
    }



    public function delete($id) {
        if(user::where('id', $id)->exists()) {
            $user = user::find($id);
            $user->delete();

            return response()->json('Deleted Successfully');
        } else {
            return response()->json([
                'Not Found'
            ], 404);

        }
    }
}
