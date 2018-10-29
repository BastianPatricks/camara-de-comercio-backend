<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class usercontroller extends Controller
{
    public function confirmaUsuario(Request $request, $user)
    {
        $Usuario = DB::table('usuario')->where('nombre_usuario', $user)->first();
        if ($Usuario != null) {
            return response()->json($Usuario);
        } else {
            return null;
        }
    }
    public function addUser(Request $request){
        $usuario = $request->input('username');
        $password = $request->input('password');
        DB::insert('insert into usuario (nombre_usuario, contraseña_usuario) values (?, ?)', [$usuario, $password]);
    }
}
