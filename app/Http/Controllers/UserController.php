<?php

namespace App\Http\Controllers;

// use App\Models\UserModels;

use App\Models\UserModels;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Throws;
use Throwable;

class UserController extends Controller
{
    public function index(){
        return UserModels::orderBy('id')->get();
    }

    public function create(Request $req){
        $user = new UserModels();
        $user -> name = $req -> input('name');
        $user -> phone = $req -> input('phone');
        $user -> grender = $req -> input('grender');
        $user -> type = $req -> input('type');
        $user -> status = $req -> input('status');
        $user-> save();

        return $user;
    }
    public function update($id, Request $req){
        try{
            $user = UserModels::find($id);
            if ($id) {
                $user -> name = $req -> input('name');
                $user -> phone = $req -> input('phone');
                $user -> grender = $req -> input('grender');
                $user -> type = $req -> input('type');
                $user -> status = $req -> input('status');
                $user-> save();

                return $user;
            } else {
                return 'id ko ton tai';
            }
        }catch( Throwable $err){
            return $err->getMessage();
        }
    }

    public function delete($id){
        $user = UserModels::find($id);
        if ($user) {
            $user -> delete();
            return $user;
        } else {
            return 'id ko ton tai';
        }
    }
    public function search($name){

        $userName = UserModels::where('name' , 'LIKE', "%{$name}%")
        ->get();
        return $userName;
    }
}
