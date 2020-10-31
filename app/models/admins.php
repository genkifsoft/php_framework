<?php

class admins extends model {

    public function auth($username, $password) {
        $this->model->query("SELECT * FROM `admins` WHERE `username` = ? AND `password` = ? AND `flag` = ?",
            array($username, $password, 0));
        if ($row = $this->model->fetch_assoc()) {
            return $row;
        } else {
            return false;
        }
    }
}