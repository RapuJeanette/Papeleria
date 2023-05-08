<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function index(Request $request)
    {
        $roles = Role::all();
        $query = $request->input('q');
        $users = User::when($query, function ($query, $searchTerm) {
            return $query->where('name', 'LIKE', "%$searchTerm%")
                ->orWhere('email', 'LIKE', "%$searchTerm%");
        })
            ->paginate(10);
        return view('admin.users.index', compact('users', 'query', 'roles'));
    }

    public function crear()
    {
        $roles = Role::pluck('name','name')->all();
        return view('admin.users.crear',compact('roles'));
    }

    public function guardar(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'roles'=>'required'
        ]);

        $input=$request->all();
        $input['password']=Hash::make($input['password']);
        $user= User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('admin.users.index');
    }

    public function editar($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole=$user->roles->pluck('name','name')->all();
        return view('admin.users.editar', compact('user', 'roles','userRole'));
    }

    public function actualizar(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'required',
            'roles' => 'required'
        ]);
        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('admin.users.index')->with('success', 'Cliente Editado correctamente.');
    }

    public function eliminar($id)
    {
        User::find($id)->delete();
        return redirect()->route('admin.users.index');
    }
}
