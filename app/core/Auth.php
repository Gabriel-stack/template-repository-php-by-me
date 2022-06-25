<?php
namespace app\core;
use app\models\User;

class Auth extends Session
{
    protected $user;

  public function __construct()
  {

  }
  
  public function login(array $props)
  {
    $this->user($props);
  }

  public function logout()
  {
    $this->destroy();
  }
  
  public function attempt(array $credentials)
  {
    $user = new User();
    $user = $user->select()->where('email', '=',  $credentials['email'])->first();
    dd($user->password);
    if ($user) {
      if (password_verify($credentials['password'], $user->password)) {
        $this->login($credentials);
        return true;
      }
    }
    return false;
  }

  public function check()
  {
    return $this->get('user');
  }
}