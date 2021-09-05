<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    protected $messages = [
        'name.required' => 'Esse campo é obrigatório.',
        'email.required' => 'O campo E-mail é obrigatório.',
        'password.required' => 'O campo Senha é obrigatório.',
        'confirm_password.required' => 'O campo Confirme a senha é obrigatório.'
    ];

    protected  $roles = [
        'name' => 'required|min:10',
        'email' => 'required|min:10',
        'password' => 'required',
        'confirm_password' => 'required'
    ];

    public function index()
    {
        try {
            $users = User::paginate(10);
            return view('admin.users.index')->with(['users' => $users]);
        } catch (Exception $e) {
            print_r($e);
            return view('admin.user.index')->with(['errors' => $e]);
        }
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate($this->roles, $this->messages);

        if ($request->password != $request->confirm_password) {
            return Redirect::back()->withErrors(['msg' => 'As senhas não podem ser diferentes'])->withInput();
        }

        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return Redirect::back()->withErrors(['email' => 'E-mail inválido'])->withInput();
        }

        $exists = User::where('email', $request->email)->get();

        if (count($exists) > 0) {
            return Redirect::back()->withErrors(['msg' => 'E-mail já cadastrado'])->withInput();
        }

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return view('admin.forms.c_user')->with(['msg' => 'Usuário cadastrado com sucesso.']);
    }

    public function show(Request $request)
    {
    }

    public function edit(Request $request)
    {
        return view('admin.users.create');
    }

    public function update(Request $request)
    {
    }

    public function destroy(Request $request)
    {
    }
}
