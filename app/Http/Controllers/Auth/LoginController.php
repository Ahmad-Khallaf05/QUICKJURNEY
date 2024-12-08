<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
use AuthenticatesUsers;

/**
* Where to redirect users after login.
*
* @return string
*/
protected function redirectTo()
{
// Check the usertype and redirect accordingly
if (Auth::user()->usertype == 'admin') {
return '/dash';
} else {
return '/home';
}
}

/**
* Create a new controller instance.
*
* @return void
*/
public function __construct()
{
$this->middleware('guest')->except('logout');
$this->middleware('auth')->only('logout');
}
}
