<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LoginController extends Controller {
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/administrativo';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
        $this->middleware('guest')->except('logout');
        $this->accessControlDomain = app("App\Domains\AccessControlDomain");
    }

    public function authenticated(Request $request, $user) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, "http://ip-api.com/json/".$request['ip']);
        $result = curl_exec($ch);

        curl_close($ch);

        $result = json_decode($result, true);
        
        $dataRequest['last_login_at'] = Carbon::now()->toDateTimeString();
        $dataRequest['last_login_ip'] = $request->getClientIp();
        $dataRequest['user_id'] = $user->id;

        $dataRequest['latitude'] = $result['lat'];
        $dataRequest['longitude'] = $result['lon'];

        $this->accessControlDomain->create($dataRequest);
    }
}