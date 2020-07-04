<?php

namespace App\Http\Controllers\Panel;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\ProductsModel;

class AuthController extends Controller 
{
    public function showLogin()
    {
        if (Auth::check())
        {
            return redirect('home');
        }
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $userdata = array(
            'username' => $request->get('username'),
            'password'=> $request->get('password')
        );

        if(Auth::attempt($userdata, $request->get('remember-me', 0)))
        {
            session($userdata);
            $products = ProductsModel::all();
            $list = collect();
            foreach ($products as $key => $value)
            {
                if ($value->stock < $value->stock_min) 
                {
                    $list->add($products[$key]);
                }
            }
            if ($list->isEmpty())
            {
                return redirect('home');
            }
            else
            {
                return view('panel.sell.index')->with(["message" => "Hay productos con el stock bajo"]);
            }
        }
        session()->flash('messages', 'error|Datos incorrectos' );
        return redirect('/');
    }

    public function logOut()
    {
        Auth::logout();
        session()->flash('messages', 'success|Tu sesión ha sido cerrada' );
        return redirect('/');    }
}