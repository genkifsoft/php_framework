<?php

class admin extends controller {

    public function index() {
        if (common::isLoggedIn()) {
            url::redir("/admin/home");
        } else {
            $username = url::post("username");
            $password = url::post('password');
            if ($username && $password) {
                $admins = new admins();
                if ($user = $admins->auth($username, $password)) {
                    session::set("id", $user["id"]);
                    session::set("username", $user["username"]);
                    session::set("fname", $user["fname"]);
                    session::set("lname", $user["lname"]);
                    url::redir("/admin/home");
                } else {
                    $data = array('error' => 'username and password in correct');
                    load::view("/admin/login", $data);
                }
            } else {
                load::view("/admin/login");
            }
        }
    }

    function home() {
        if (!common::isLoggedIn()) {
            url::redir('/');
        } else {
            load::view("/admin/home");
        }
    }

    public function logout() {
        session::endSession();
        url::redir("/admin");
    }
}