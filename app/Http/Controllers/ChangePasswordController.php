<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
  
class ChangePasswordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('changePassword');
    } 
   
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        /*
    	$validation = \Validator::make($request, [
            'current_password' => ['required', new MatchOldPassword],
            'password' => ['required', 'string', 'min:5', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'confirmed'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        if ( $validation->fails() ) {
        dd($validation->errors()->all());
            
        }                

        */

        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required', 'string', 'min:5', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'confirmed'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
   
        //dd('Password change successfully.');

        //return $validation;
    }
}