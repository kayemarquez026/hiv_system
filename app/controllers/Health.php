<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Health extends Controller {
    public function index() {
        header('Content-Type: text/plain');
        echo 'ok';
        return;
    }
}
