<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Redirect the user to the provider authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->scopes(['read:user', 'repo'])->redirect();
    }


    /**
     * Obtain the user information from provider.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return redirect($this->redirectTo);
    }

    /**
     * If a user has registered before using social auth, return the user
     * else, create a new user object.
     * @param  $user Socialite user object
     * @param $provider Social auth provider
     * @return  User
     */
    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }

        $customer = Customer::create([
            'name' => $user->name,
            'email' => $user->email,
        ]);

        var_dump($customer->id);

        return User::create([
            'name'     => $user->name,
            'customer_id' => $customer->id,
            'email'    => $user->email,
            'github_token'    => $user->token,
            'github_username'    => $user->nickname,
            'provider' => $provider,
            'provider_id' => $user->id
        ]);
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
