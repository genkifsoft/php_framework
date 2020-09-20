<?php
class main extends controller implements controllerInterface {
    
    public function index() {
        $data['text'] = 123;
        load::view("main::index", $data);
    }
}
?>