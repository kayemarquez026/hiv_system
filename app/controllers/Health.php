<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Health extends Controller {
    public function index() {
        header('Content-Type: text/plain');
        echo 'ok';
        return;
    }

    public function db() {
        header('Content-Type: text/plain');
        try {
            $db = new Database('main');
            $db->raw('SELECT 1');
            echo 'db: ok';
        } catch (Exception $e) {
            http_response_code(500);
            echo 'db: error - ' . $e->getMessage();
        }
        return;
    }
}
