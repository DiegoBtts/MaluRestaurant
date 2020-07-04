<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\models\UserModel;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
	{
        if(\Auth::user()->role == "admin")
        {
            return view('panel.user.index', ['items' => UserModel::all()]);
        }
        else
        {
            session()->flash('messages', 'info|Buen intento' );
            return view('panel.sell.index');
        }
	}

	public function add() 
	{
        return view('panel.user.form')->with(['user' => new UserModel()]);
    }

    public function edit($id)
    {
        $user = UserModel::find($id);
        return view('panel.user.form')->with(['user' => $user]);
    }

    public function delete($id)
    {
        $oldUser = UserModel::find($id);
        unlink(substr($oldUser->photo,1));
        rmdir('img/usuarios/'.$oldUser->username);
        UserModel::destroy($id);
        session()->flash('messages', 'success|El usuario se borro satisfactoriamente.');
        return redirect()->route('user');
    }

    public function save(Request $request, UserModel $user) 
    {
        if ($request->input("flag")!=2)
        {
            if ($request->input("flag")!=0) 
            {
                $user->password = bcrypt($request->input('password'));
            }

            if(isset($_FILES["newPicture"]))
            {
                if($user->photo!=""){
                    unlink(substr($user->photo,1));
                }
                $routePicture = UserController::ctrCrearImagen($_FILES["newPicture"],$request->input('username'),"usuarios",50,50,true);
                $user->photo = $routePicture;
            }
        }
        else
        {
            $routePicture = "/img/usuarios/default/anonymous.png";
            $user->password = bcrypt($request->input('password'));
            if(isset($_FILES["newPicture"]))
            {
                $routePicture = UserController::ctrCrearImagen($_FILES["newPicture"],$request->input('username'),"usuarios",50,50,false);
                $user->photo = $routePicture;
            }
        }

        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->role = $request->input('role');
        $user->last_login = now();
        $user->save();
        session()->flash('messages', 'success|Cambios guardados correctamente.' );
        return redirect()->route('user');
    }

    public function ctrCrearImagen($foto,$id,$folder,$nuevoAncho,$nuevoAlto,$flag)
    {
        $ruta;
        list($ancho,$alto) = getimagesize($foto["tmp_name"]);
        if($flag==false)
        {
            mkdir("img/".$folder."/".$id,0755);
        }  
        if ($foto["type"] == "image/jpeg")
        {
            $aleatorio = mt_rand(100,999);
            $ruta = "img/".$folder."/".$id."/".$aleatorio.".jpg";
            $origen = imagecreatefromjpeg($foto["tmp_name"]);
            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
            imagejpeg($destino,$ruta);
        }
        if ($foto["type"] == "image/png")
        {
            $aleatorio = mt_rand(100,999);
            $ruta = "img/".$folder."/".$id."/".$aleatorio.".png";
            $origen = imagecreatefrompng($foto["tmp_name"]);
            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
            imagepng($destino,$ruta);
        }
        return "/".$ruta;
    }
}
