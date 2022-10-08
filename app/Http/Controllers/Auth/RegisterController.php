<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'library_ID_number' => ['required', 'string', 'max:255'],
            'firstname' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'year_level' => ['required', 'string', 'max:255'],
            'student_college_ID' => ['integer'],
            'student_course_ID' => ['integer'],
            'contact_number' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $total_accounts = DB::select("SELECT COUNT('library_id_number') as total_accounts
            FROM student_info");

        $student_number = Str(Carbon::now()->format('y')).sprintf('%05d', $total_accounts[0]->total_accounts+1);

        DB::table('student_info')->insert(
            [
                'student_number' => $student_number,
                'student_college_ID' => 117,
                'firstname' => $data['firstname'],
                'surname' => $data['surname'],
                'year_level' => "level 1",
                'email' => $data['email'],
                'contact_number' => $data['contact_number'],
            ]
        );

        $student_info_id = DB::select("SELECT student_info_ID
        FROM student_info WHERE $student_number");

        return User::create([
            'library_ID_number' => $data['library_ID_number'],
            'student_info_id' => $student_info_id[0]->student_info_ID,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
