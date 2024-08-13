<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class UsersController extends Controller
{
    public function index(){
        $user_colum_name = Schema::getColumnListing('users');
        $users = Users::select('id', 'name', 'email', 'image', 'created_at')
            ->get()
            ->toArray();
        return view('users', [
            'user_colum_name' => $user_colum_name,
            'users' => $users,
        ]);
    }
    public function create(Request $request){
        Users::create($request->all());
        $user_colum_name = Schema::getColumnListing('users');
        $users = Users::select('id', 'name', 'email', 'image', 'created_at')
            ->get()
            ->toArray();
        return view('/users', [
            'user_colum_name' => $user_colum_name,
            'users' => $users,
        ]);
    }
    public function view(Request $request){
        $id = $request['id'];
        $view_user = Users::find($id)->toArray();
        dd($id, $view_user);
    }
}

