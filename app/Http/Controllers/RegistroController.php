<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\HomeController;
use App\Mail\MessageSend;
use Illuminate\Validation\ValidationData;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use InformacionTable;
use App\Models\Informacion_table;
use App\Models\User;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\Rule;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('registros.login');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email', 'string' ],
            'password' => ['required', 'string']
        ]);

        $remember = $request->filled('remember');

        if (Auth::attempt($credentials, $remember)){
            $request->session()->regenerate();

            return redirect()
                ->intended('registros/login')
                ->with('status', 'You are logged in!');

       }
       $request->session()->invalidate();
       throw ValidationException::withMessages([
            'email' => __('auth.failed')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registros.create');
    }

    public function insert()
    {
        request()->validate([
            'name' => 'required',
            'email'=> 'required|email|unique:users,email',
            'password' => 'required',
            'password1' => 'same:password',
        ]);

        DB::table('users')->insert([
            'id' => null,
            'name' => request('name'),
            'email' => request('email'),
            'avatar' => 'default.svg',
            'email_verified_at' => now(),
            'password' => Hash::make(request('password')),
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => null,
        ]);

        return redirect()
                ->intended('registros/create')
                ->with('status1', 'Se ha registrado exitosamente!!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        request()->validate([
            'email' => 'required|email',
            'dependencia' => 'required',
            'elabora' => 'required',
            'firma' => 'required',
            'tipo' => 'required',
            'asunto' => 'required',
            'temas' => 'required'
        ]);

        DB::table('informacion_table')->insert([
            'id' => null,
            'fecha' => now(),
            'email' => request('email'),
            'equipo' => request('dependencia'),
            'elabora' => request('elabora'),
            'firma' => request('firma'),
            'documento' => request('tipo'),
            'asunto' => request('asunto'),
            'temas' => request('temas')
        ]);

        // Buscar en la Base de datos

        $message = DB::table('informacion_table')->orderBy('id', 'desc')->first();

        // Enviar Email

        Mail::to('cfarias5@hotmail.com')->send(new MessageSend($message));

        // Mostrar Radicado

        return view('registros.store')
                    ->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($datos)
    {

        $user = User::find($datos);

        return view('registros.edit', [
            'User' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email', Rule::unique('users')->ignore($user->id),
            'password' => 'required',
            'password1' => 'same:password'
        ]);

        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/uploads/', $name);

        DB::table('users')
            ->where('id', $user->id)
            ->update([
            'name' => $request->name,
            'email' => $request->email,
            'avatar' => $name,
            'email_verified_at' => now(),
            'password' => Hash::make($request->password),
            'remember_token' => null,
            'created_at' => null,
            'updated_at' => now(),
        ]);

        }else{
            DB::table('users')
                ->where('id', $user->id)
                ->update([
                'name' => $request->name,
                'email' => $request->email,
                'avatar' => 'default.svg',
                'email_verified_at' => now(),
                'password' => Hash::make($request->password),
                'remember_token' => null,
                'created_at' => null,
                'updated_at' => now(),
            ]);
        }

        return redirect()
                ->route('edit', $user)
                ->with('status3', 'Se ha Actualizado Correctamente!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user, Redirector $redirect)
    {
        $user->delete();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return $redirect->to('registros/login')
                ->with('status5', 'Su Cuenta ha sido Borrada');
    }

    public function logout(Request $request, Redirector $redirect)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return $redirect->to('registros/login')
                ->with('status', 'Sesion Finalizada');
        ;
    }
}
