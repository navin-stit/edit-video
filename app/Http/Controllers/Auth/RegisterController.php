<?php

namespace App\Http\Controllers\Auth;
use App\User;
use App\Customer;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Events\ActivationlinkEvent;
use Illuminate\Http\Request;
use App\Notifications\UserActivate;
use Illuminate\Auth\Events\Registered;





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
    protected $redirectTo = '/login';

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
     $user= User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'first_name' => $data['first_name'],
        'last_name' => $data['last_name'],
        'password' => Hash::make($data['password']),
        'token' => str_random(40) . time(),
        'role_id' => '1',]);
     DB::table('customers')->insert([
      [ 'name' => $data['name'],'email'=>$data['email'],'first_name' => $data['first_name'],'last_name' => $data['last_name'],'user_id' => $user->id, 'image'=>'ewwew.jpeg', 'password' => Hash::make($data['password']), 'created_at'=>date('Y-m-d h:i:s'),'updated_at'=>date('Y-m-d h:i:s')],]);

     
     $user->notify(new UserActivate($user));
     return $user;
 }
 
 public function register(Request $request)
 {
    $this->validator($request->all())->validate();

    event(new Registered($user = $this->create($request->all())));

    return redirect()->route('login')
    ->with(['success' => 'Congratulations! your account is registered, you will shortly receive an email to activate your account.']);
}

    /**
     * @param $token
     */
     public function activate($token)
    {
        $user = User::where('token', $token)->first();

        if (empty($user)) {
            return redirect()->to('/login')
            ->with(['error' => 'Your activation code is either expired or invalid.']);
        }

        $user->update(['token' => $token, 'active' => User::ACTIVE]);

        return redirect()->route('login')
        ->with(['success' => 'Congratulations! your account is now activated.']);
    }

}
