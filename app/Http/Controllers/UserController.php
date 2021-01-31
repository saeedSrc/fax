<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthCode;
use App\Http\Requests\StoreUser;
use App\Models\User;
use App\Models\RoundcubeAutoLogin;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use League\Flysystem\Config;
use Mockery\Exception;
use PHPUnit\TextUI\XmlConfiguration\Constant;
use Psy\TabCompletion\Matcher\ConstantsMatcher;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        session(['register-done' => null]);
        session(['auth-req-done' => 'true']);
        session(['auth-done' => 'true']);
        session(['register-form' => true]);
        session(['auth-req-form' => null]);
        session(['auth-form' => null]);
        return view('users.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUser $request)
    {
        User::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Send auth code to user.
     *
     * @param  int $phone
     * @return \Illuminate\Http\Response
     */
    public function PostPhoneAuthenticationForm(Request $request)
    {
        if (!$this->getSession('auth_code_expired_at') || ( $this->getSession('auth_code_expired_at') && $this->getSession('auth_code_expired_at') < time())) { // if code expires
          if (Auth::user()->auth_check == 0) { // id user not authenticated at all
              $code = rand(1001, 9999);
              $expire_at = time() + config('constants.auth_code_expire_time');
              $this->setSession('authentication_code', $code);
              $this->setSession('auth_code_expired_at', $expire_at);
              // TODO send sms method here
          }

        }

        return view('auth.phone_authorize')->with("remaining_time", $this->getRemainingSessionTime('auth_code_expired_at'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $phone
     * @return \Illuminate\Http\Response
     */
    public function GetPhoneAuthenticationForm(Request $request)
    {
        return view('auth.phone_authorize')->with("remaining_time", $this->getRemainingSessionTime('auth_code_expired_at'));
    }

    /**
     * Final rule for user Authentication.
     *
     * @param  int $phone
     * @return \Illuminate\Http\Response
     */
    public function FinalAuthenticate(AuthCode $request)
    {

        User::where('id', Auth::user()->id)->update(['auth_check'=> 1]);

        $this->setUserTooLdap();
//        $this->LdapStructure();

        return redirect('/');

    }

    /**
     * Set user session
     *
     */
    public function setSession($key, $val)
    {
        $key = 'constants.' . $key;
        session([config($key) => $val]);
    }

    /**
     * Get user session.
     *
     */
    public function getSession($key)
    {
        $key = 'constants.' . $key;
       return session(config($key));
    }

    /**
     * Get user remaining session time
     *
     */
    public function getRemainingSessionTime ($key)
    {
        $sessionTime = $this->getSession($key);
        $remainingTime = $sessionTime - time();
        if ($remainingTime < 0) {
            return "00:00";
        }
        return intval($remainingTime / 60) . ':' . intval($remainingTime % 60);
    }

    /**
     * set user tpp ldap server.
     *
     */
    public function setUserTooLdap()
    {
        $domain = 'ufax.ir';
        $username = 'Services';
        $password = 'Service@7585';
        $ldapconfig['host'] = '109.125.151.255';
        $ldapconfig['port'] = 389;
        $ldapconfig['basedn'] = 'dc=ir,dc=Ufax';

        $ds=ldap_connect($ldapconfig['host'], $ldapconfig['port']);
        ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($ds, LDAP_OPT_REFERRALS, 0);



        if ($ds) {

            ldap_bind($ds, "CN=Services, OU=Admin,OU=Users,OU=UFAX,DC=Ufax,DC=ir", $password);
            // prepare data
            $info["cn"] = "saeed13";
            $info["sn"] = "test testii";
            $info["givenName"] = "test2";
            $info["userPrincipalName"] = "saeed13";

//            $info["userPassword"] = decrypt(Auth::user()->password);
            $info["userPassword"] = "Aswe32b4";
            $info["unicodepwd"] = "newPassw";
            $info["userAccountControl"] = "512";
            $info["telephoneNumber"] = "09123860422";
            $info["mail"] = "09123860422@ufax";

            $info["l"] = "tehran";
            $info["accountExpires"] = "9223372036854775807";
            $info["description"] = "12345678";

            $info['objectclass'][0] = "top";
            $info['objectclass'][1] = "person";
            $info['objectclass'][2] = "organizationalPerson";
            $info['objectclass'][3] = "user";
            // add data to directory

            $dn= 'OU=Ufax-Users,OU=Users,OU=UFAX,DC=Ufax,DC=ir';

            $dn = 'cn=' . $info['cn'] . ',' . $dn;

            try {
                $r = ldap_add($ds, $dn, $info);

            } catch (Exception $exception) {
                dd(23);
            }


            ldap_close($ds);
        } else {
            echo "Unable to connect to LDAP server";
        }

        dd("success");
    }

    /**
     * ldap structure.
     *
     */
    public function LdapStructure()
    {
        $ldapconfig = array();
        $password = 'Service@7585';
        $ldapconfig['host'] = '109.125.151.255';
        $ldapconfig['port'] = 389;
        $ldapconfig['basedn'] = 'dc=ir,dc=Ufax';
        $ds=ldap_connect($ldapconfig['host'], $ldapconfig['port']);
        $bind = ldap_bind($ds, "CN=Services, OU=Admin,OU=Users,OU=UFAX,DC=Ufax,DC=ir", $password);
        $search_filter = "(&(objectCategory=person))";
        $search = ldap_search($ds, "CN=Services, OU=Admin,OU=Users,OU=UFAX,DC=Ufax,DC=ir", $search_filter);
        $info = ldap_get_entries($ds, $search);
        for ($i = 0; $i < $info["count"]; $i++) {
            dd($info[$i]);
            dd($info[$i]['objectclass']);
        }
    }


    /**
     * Roundcube auto login
     *
     */
    public function RoundCubeAutoLogin()
    {

        // set your roundcube domain path
        $rc = new RoundcubeAutoLogin('http://portal.ufax.ir');
        $cookies = $rc->login('Services@ufax.ir', 'Service@7585');
        // now you can set the cookies with setcookie php function, or using any     other function of a framework you are using
        foreach($cookies as $cookie_name => $cookie_value)
        {
            setcookie($cookie_name, $cookie_value, 0, '/', '');
        }
        // and redirect to roundcube with the set cookies
        $rc->redirect();
    }


}
