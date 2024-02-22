<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Services\DomicilioService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    protected $domicilio;
    public function __construct()
    {
        $this->domicilio = new DomicilioService();
    }

    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'apellido_paterno' => ['required', 'string', 'max:255'],
            'rfc' => ['required', 'string', 'max:13'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', Rules\Password::defaults()],
            'cp' => ['required','numeric', 'max:99999'],
            'estado' => ['required','string'],
            'municipio_alcaldia' => ['required','string', 'max:255'],
            'colonia' => ['required','string', 'max:255'],
            'calle' => ['required','string', 'max:255'],
            'no_exterior' => ['required','numeric','max:99999'],
            'tipo_vialidad_id' => ['required']
        ]);

        $user = User::create([
            'nombre' => $request->nombre,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => @$request->apellido_materno,
            'rfc' => $request->rfc,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $this->domicilio->guardarDomicilio($request,$user);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
