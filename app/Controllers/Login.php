<?php

namespace App\Controllers;

use \CodeIgniter\Controller;

class Login extends Controller
{
    public function index()
    {
        $data = [];
        require_once APPPATH . 'Libraries/vendor/autoload.php';
        $facebook = new \Facebook\Facebook([
            'app_id' => '4608542689254650',
            'app_secret' => '5cde3e96ac3d4631ed210d288673408f',
            'default_graph_version' => 'v2.3'
        ]);

        $fb_helper = $facebook->getRedirectLoginHelper();

        if ($this->request->getVar('state')) {
            $fb_helper->getPersistentDataHandler()->set('state', $this->request->getVar('state'));
        }

        if ($this->request->getVar('code')) {
            if (session()->get('access_token')) {
                $access_token = session()->get('access_token');
            } else {
                $access_token = $fb_helper->getAccessToken();
                session()->set('access_token', $access_token);
                $facebook->setDefaultAccessToken($access_token);
            }
            $graph_response = $facebook->get('/me?fields=name,email', $access_token);
            $fb_user_info = $graph_response->getGraphUser();
            if (!empty($fb_user_info['id'])) {
                $fbdata = [
                    'profile_pic' => 'http://graph.facebook.com/' . $fb_user_info['id'] . '/picture',
                    'user_name' => $fb_user_info['name'],
                    'email' =>  $fb_user_info['email'],
                    'userid' =>  $fb_user_info['id'],
                ];

                session()->set('userdata', $fbdata);
            }
            // var_dump($fbdata);exit;
        } else {
            $fb_permissions = ['email'];
            $data['fb_login_url'] = $fb_helper->getLoginUrl('https://farmaceuticosp.com.br/eventos/login', $fb_permissions);
            // var_dump($data);exit;
        }
        return view("fb_view", $data);
    }

    public function logout()
    {
        if (session()->has('userdata')) {
            session()->destroy();
            return redirect()->to(base_url() . '/login');
        }
    }
}
