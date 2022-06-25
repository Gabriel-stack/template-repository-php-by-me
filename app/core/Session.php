<?php

namespace app\core;

class Session {

    public function user(array $props)
    {
        $_SESSION['user'] = $props;
    }
    public static function init()
    {
        session_start();
    }
    
    static function set($key, $value) {
        $_SESSION[$key] = $value;
    }
    
    static function get(string $key) {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
        return false;
    }
    
    public static function destroy() {
        session_destroy();
        session_regenerate_id(true);
    }
    
}