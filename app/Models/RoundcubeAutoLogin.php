<?php

/**
 * Class to automatically login on a Roundcube installation
 * @compatibility RoundCube 1.0.2+
 */
namespace App\Models;

use App\Models\RoundcubeException;
use Illuminate\Support\Facades\Cookie;

// main class
class RoundcubeAutoLogin
{
    // roundcube link (with a trailing slash)
    private $_rc_link = '';

    private $ch;

    /**
     * Creates a new RC object
     * @param $roundcube_link the roundcube link with a trailing slash
     */
    public function __construct($roundcube_link)
    {
        $this->_rc_link = $roundcube_link;
        $this->ch = curl_init();
    }

    /**
     * Tries to log a RC user in using cURL. Does two requests. One to
     * get a session token to perform the login, and one to do the actual
     * login of the user
     *
     * @param $email the full e-mailaddress of the user
     * @param $password the password of the user
     *
     * @returns The cookies you should set with setcookie
     */
    public function login($email, $password)
    {
        try
        {
            $token = $this->_get_token();

            if($token === FALSE) {
                throw new RoundcubeException('Unable to get token, is your RC link correct?');
            }

            // make the request to roundcube
            $post_params = array(
                '_token' => $token,
                '_task' => 'login',
                '_action' => 'login',
                '_timezone' => '',
                '_url' => '_task=login',
                '_user' => $email,
                '_pass' => $password
            );

            $query = '_token='.$token . '&_task=login' . '&_action=login' . '&_timezone=' . '&_url=_task=login' . '&_user='.$email.'&_pass='.$password;

            curl_setopt($this->ch, CURLOPT_URL, $this->_rc_link . '?_task=login');
            curl_setopt($this->ch, CURLOPT_COOKIEFILE, '');
            curl_setopt($this->ch, CURLOPT_COOKIEJAR, '');
            curl_setopt($this->ch, CURLOPT_POST, TRUE);
            curl_setopt($this->ch, CURLOPT_HEADER, TRUE);
            curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($this->ch, CURLOPT_POSTFIELDS, $query);
            $response = curl_exec($this->ch);
            $response_info = curl_getinfo($this->ch);

            if($response_info['http_code'] == 302)
            {
                // find all relevant cookies to set (php session + rc auth cookie)
                preg_match_all('/Set-Cookie: (.*)\b/', $response, $cookies);

                $cookie_return = array();

                foreach($cookies[1] as $cookie)
                {
                    preg_match('|([A-z0-9\_]*)=([A-z0-9\_\-]*);|', $cookie, $cookie_match);
                    if($cookie_match) {
                        $cookie_return[$cookie_match[1]] = $cookie_match[2];
                    }
                }

                return $cookie_return;
            }
            else
            {
                throw new RoundCubeException('ورود شما با خطا مواجه شد لطفا مجددا تلاش کنید.');
            }

        }
        catch(RoundCubeException $e)
        {
            echo 'RC error: ' . $e->getMessage();
        }
        catch(Exception $e)
        {
            echo 'General error: ' . $e->getMessage();
        }
    }



    /**
     * logout from portal
     *
     * @param $token the full e-mailaddress of the user

     *
     */
    public function logout()
    {
//        try {
//            $token = $this->_get_token();
//
//            if ($token === FALSE) {
//                throw new RoundcubeException('Unable to get token, is your RC link correct?');
//            }
//
//
//            $query = '?_task=logout' . '&_token=' . $token;
//
//            curl_setopt($this->ch, CURLOPT_URL, $this->_rc_link . $query);
//            curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, TRUE);
//
//
//            curl_exec($this->ch);
//
//            setcookie('roundcube_sessauth', null, 0, '/', 'ufax.ir');
//            setcookie('roundcube_sessid', null, 0, '/', 'ufax.ir');
//        }
//        catch(RoundCubeException $e)
//        {
//            echo 'RC error: ' . $e->getMessage();
//        }
//        catch(Exception $e)
//        {
//            echo 'General error: ' . $e->getMessage();
//        }

        if (isset($_SERVER['HTTP_COOKIE'])) {
            $cookies = explode(';', $_SERVER['HTTP_COOKIE']);

            foreach($cookies as $cookie) {
                $parts = explode('=', $cookie);
                $name = trim($parts[0]);
             var_dump($name);
            }

            foreach($cookies as $cookie) {
                $parts = explode('=', $cookie);
                $name = trim($parts[0]);
                setcookie($name, '', time()-1000);
                setcookie($name, '', time()-1000, '/', 'ufax.ir');
            }
        }
    }

    /**
     * Redirect to RC
     */
    public function redirect()
    {
        header('Location: ' . $this->_rc_link . '?task=mail');
        die();
    }

    /**
     * Gets a token to use for the login
     */
    private function _get_token()
    {
        curl_setopt($this->ch, CURLOPT_URL, $this->_rc_link);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($this->ch, CURLOPT_COOKIEFILE, '');
        curl_setopt($this->ch, CURLOPT_COOKIEJAR, '');
        $response = curl_exec($this->ch);
        preg_match('|<input type="hidden" name="_token" value="([A-z0-9]*)">|', $response, $matches);


        if($matches) {
            return $matches[1];
        }
        else {
            return FALSE;
        }
    }
}

///*
// include this HTML form in you page and point it to your script location
//
//<form action="http://domain.com/roundcube/RoundcubeAutoLogin.php" method="post" name="autologin">
//  UserID <input name="rc_user" type="text" id="rc_user">
//  Passwort <input name="rc_pass" type="password" id="rc_pass">
//  <input type="submit" name="Submit" value="login">
//</form>
//
//*/
//
//// send parameters with post, its more secure because username and password not shown in browser and logfile
//$rcuser=$_REQUEST['rc_user'];
//$rcpass=$_REQUEST['rc_pass'];
//
//
//// set your roundcube domain path
//$rc = new RoundcubeAutoLogin('http://domain.com/roundcube/');
//$cookies = $rc->login($rcuser, $rcpass);
//
//// now you can set the cookies with setcookie php function, or using any other function of a framework you are using
//if (!empty($cookies))
//{
//    foreach($cookies as $cookie_name => $cookie_value)
//    {
//        setcookie($cookie_name, $cookie_value, 0, '/', '');
//    }
//    // and redirect to roundcube with the set cookies
//    $rc->redirect();
//}

//?>
