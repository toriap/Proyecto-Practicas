<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Role;
use App\Subject;
use App\Parameter;

class UserController extends Controller
{

    public function updateShowDirector($id)
    {

        //Encontrar un usuario
        $user = User::find($id);

        return view('admin.editDirector', [
            'user' => $user
        ]);
    }

    public function updateDirector(Request $request)
    {

        $id = $request->input('id');

        // ValidaciÃ³n del formulario
        $validate = $this->validate($request, [
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'document' => 'required|string|max:255|unique:user,document,' . $id,
            'email' => 'required|string|email|max:255|unique:user,email,' . $id,
            'phone' => 'required|string|max:255',
            'password' => 'string|min:6|confirmed'
        ]);

        // Recoger datos del formulario
        $name = $request->input('name');
        $lastname = $request->input('lastname');
        $document = $request->input('document');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $password = $request->input('password');
        $role = $request->input('role');

        // Asignar nuevos valores al objeto del usuario
        $user = User::find($id);

        $user->name = $name;
        $user->lastname = $lastname;
        $user->document = $document;
        $user->email = $email;
        $user->phone = $phone;

        if (!is_null($password)) {
            $user->password = Hash::make($password);
        }

        // Ejecutar consulta y cambios en la base de datos
        $user->update();

        if ($role == 'admin') {
            return redirect()->route('user.listDirectors')
            ->with(['message' => 'Usuario actualizado correctamente']);
        } else {
            return redirect()->route('config')
            ->with(['message' => 'Usuario actualizado correctamente']);
        }

        
    }
    
     public function updateAdmin(Request $request)
    {

        $id = $request->input('id');

        // Validaci¨®n del formulario
        $validate = $this->validate($request, [
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'document' => 'required|string|max:255|unique:user,document,' . $id,
            'email' => 'required|string|email|max:255|unique:user,email,' . $id,
            'phone' => 'required|string|max:255',
            'password' => 'string|min:6|confirmed'
        ]);

        // Recoger datos del formulario
        $name = $request->input('name');
        $lastname = $request->input('lastname');
        $document = $request->input('document');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $password = $request->input('password');
        $role = $request->input('role');

        // Asignar nuevos valores al objeto del usuario
        $user = User::find($id);

        $user->name = $name;
        $user->lastname = $lastname;
        $user->document = $document;
        $user->email = $email;
        $user->phone = $phone;

        if (!is_null($password)) {
            $user->password = Hash::make($password);
        }

        // Ejecutar consulta y cambios en la base de datos
        $user->update();

        
        return redirect()->route('config.admin')
        ->with(['message' => 'Usuario actualizado correctamente']);
        

        
    }


    public function deleteDirector($id)
    {
        // Conseguir datos del usuario
        $user = User::find($id);

        echo $user->id;


        // Eliminar relacion en tabla pivote
        $user->roles()->detach();

        // Eliminar usuario
        $user->delete();

        return redirect()->route('user.listDirectors', ['id' => $user->id])
            ->with([
                'message' => 'Usuario eliminado correctamente!!'
            ]);
    }

    public function updateShowOperative($id)
    {

        //Encontrar un usuario
        $user = User::find($id);
        $subject = new Subject();

        // Obtener todos los lapsos
        $subjects = $subject->all();

        return view('admin.editOperative', [
            'user' => $user,
            'subjects' => $subjects
        ]);
    }

    public function updateOperative(Request $request)
    {

        $id = $request->input('id');

        // ValidaciÃ³n del formulario
        $validate = $this->validate($request, [
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'document' => 'required|string|max:255|unique:user,document,' . $id,
            'email' => 'required|string|email|max:255|unique:user,email,' . $id,
            'phone' => 'required|string|max:255',
            'password' => 'string|min:8|confirmed',
            'subject_id' => 'array',
            'role' => 'string'
        ]);

        // Recoger datos del formulario
        $name = $request->input('name');
        $lastname = $request->input('lastname');
        $document = $request->input('document');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $password = $request->input('password');
        $subjects = $request['subject_id'];
        $role = $request->input('role');

        // Asignar nuevos valores al objeto del usuario
        $user = User::find($id);

        $user->name = $name;
        $user->lastname = $lastname;
        $user->document = $document;
        $user->email = $email;
        $user->phone = $phone;

        if (!is_null($password)) {
            $user->password = Hash::make($password);
        }

        if (!is_null($subjects)) {
            foreach ($subjects as $option_value) {
                $user->subjects()->sync(Subject::where('id', $option_value)->first(), false);
            }
        }

        // Ejecutar consulta y cambios en la base de datos
        $user->update();

        if ($role == 'admin') {
            return redirect()->route('user.updateShowOperativeAdmin', ['id' => $user->id])
                ->with(['message' => 'Usuario actualizado correctamente']);
        } else {
            return redirect()->route('user.updateShowOperative', ['id' => $user->id])
                ->with(['message' => 'Usuario actualizado correctamente']);
        }
    }

    public function deleteOperative($id, $role)
    {
        // Conseguir datos del usuario
        $user = User::find($id);


        // Eliminar relacion en tabla pivote
        $user->roles()->detach();
        $user->subjects()->detach();
        
        Parameter::where('user_id', $id) ->delete();

        // Eliminar usuario
        $user->delete();

        if ($role == 'admin') {
            return redirect()->route('user.listOperativesAdmin', ['id' => $user->id])
                ->with([
                    'message' => 'Usuario eliminado correctamente!!'
                ]);
        } else {
            return redirect()->route('user.listOperatives', ['id' => $user->id])
                ->with([
                    'message' => 'Usuario eliminado correctamente!!'
                ]);
        }
    }

    public function config(){
		return view('admin.config');
	}

    public function listDirectors(Request $request)
    {
        // El role_id para directores es 2
        $users = Role::find(2);

        /* foreach ($users->users as $user) {
            echo $user->name . "<br>";
        }
        die(); */

        return view('admin.directors', [
            'users' => $users
        ]);
    }

    public function listOperatives(Request $request, $report = 'false')
    {
        $users = Role::find(3);

        if ($report == 'false') {
            return view('admin.operatives', [
                'users' => $users
            ]);
        } else {
            return view('admin.operativesReport', [
                'users' => $users
            ]);
        }
    }

    public function deleteSubject($user_id, $id)
    {
        // Conseguir datos del usuario

        $user = User::find($user_id);

        // Eliminar relacion en tabla pivote
        $user->subjects()->detach($id);
         // Eliminar parametros
        Parameter::where('user_id', $user_id)->where('subject_id', $id)->delete();

        return redirect()->route('user.updateShowOperative', ['id' => $user->id])
            ->with([
                'message' => 'Materia eliminada correctamente!!'
            ]);
    }
}
