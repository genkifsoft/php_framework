<?php
class main extends controller {
    
    public function index() {
        
        print_r($this->da);
    }

    function foo() {
        echo "main foo";
    }
}
?>