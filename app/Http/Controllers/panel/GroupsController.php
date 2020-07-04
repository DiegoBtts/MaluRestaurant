<?php
namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\models\GroupsModel;
use App\Http\Controllers\Controller;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Helpers\Helper;
use App\models\TestTypeModel;

class GroupsController extends Controller
{
    public function index()
	{
        if(\Auth::user()->role == "admin")
        {
            $test = TestTypeModel::all();

            if ($test->isEmpty())
            {
               return view('panel.testtype.index', ['items' => $test])->with(["message"=>"No tenemos registrados tipos de pruebas"]);
            }

		    return view('panel.groups.index')->with(['items' => GroupsModel::all()]);
        }
        else
        {
            return view('panel.sell.index')->with(["message"=>"solo el admin puede ver el modulo de examenes"]);
        }
	}

	public function add() 
	{
        return view('panel.groups.form')->with(['group' => new GroupsModel()]);
    }

    public function edit($id)
    {
        return view('panel.groups.form')->with(['group' => GroupsModel::find($id)]);;
    }

    public function delete($id)
    {
        $group = GroupsModel::find($id);
        //borrar fichero
        unlink($group->form_route);
        //borrar tabla
        Schema::dropIfExists($group->table_name);
        GroupsModel::destroy($id);
        return redirect()->route('groups');
    }

    public function save(Request $request, GroupsModel $group) 
    {
        $field_sample = '<div class="col-md-6">

          <label class="label-style" for="name">@label</label>

          <div class="input-group mb-3">

              <div class="input-group-prepend">

                <span class="input-group-text"><i class="fas fa-user"></i></span>

              </div>

              <input type="@type" id="@name" name="@name" placeholder="@placeholder" class="form-control form-control-lg capitalize" @required>
              <div class="input-group-prepend">

                <span class="input-group-text">@leyend</span>

              </div>

          </div>

        </div>';

        $guard_sample = "";

        $table_name = strtolower(str_replace(" ","_",$request->input('group_name')));

        $required = $request->input('required');
        $label = $request->input('label');
        $tag = $request->input('tag');
        $placeholder = $request->input('placeholder');
        $field_name = $request->input('field_name');
        $field_type = $request->input('field_type');
        $query = Helper::TableQueryBuilder($table_name,$field_name,$field_type);
        $create_table = Helper::CreateTable($query);

        //crear tabla
        if (!$create_table) 
        {
            session()->flash('messages', 'error|No fue posible guardar la tabla' );
            return redirect()->back();
        }

        //crear formulario
        foreach ($field_name as $key => $value) 
        {
            $sample = $field_sample;
            $field_name_value = strtolower(str_replace(" ","_",$value)); 
            $sample = str_replace("@name",$field_name_value,$sample); 
            $sample = $field_type[$key]=="varchar"?str_replace("@type","text",$sample):str_replace("@type","number",$sample); 
            $sample = str_replace("@placeholder",$placeholder[$key],$sample);  
            $sample = str_replace("@label",$label[$key],$sample); 
            $sample = str_replace("@leyend",$tag[$key],$sample); 
            $sample = $required!="no"?str_replace("@required","required",$sample):str_replace("@required"," ",$sample); 
            $guard_sample.=preg_replace("/[\r\n|\n|\r]+/", " ", $sample);      
        }

        //crear fichero
        $route_form = "resourses/forms/".$table_name.".txt";
        $fh = fopen($route_form, 'w') or die("Se produjo un error al crear el archivo");       
        fwrite($fh, $guard_sample) or die("No se pudo escribir en el archivo");
        fclose($fh);   

        $group->table_name = $table_name;
        $group->form_route = $route_form;
        $group->table_route = $route_form;
        $group->user_id = $request->input('user_id');
        $group->count_field = count($field_name);
        $group->typeTest_id = $request->input('typeTest_id');
        $group->price = $request->input('price');
        $group->save();

        session()->flash('messages', 'success|Cambios guardados correctamente.' );
        return redirect()->route('groups');
    }
}
