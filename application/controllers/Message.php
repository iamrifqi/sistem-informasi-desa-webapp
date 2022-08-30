<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Message extends CI_Controller
{
    public function index()
    {
        $this->load->view('message/templates/header');
        $this->load->view('message/index');
        $this->load->view('message/templates/footer');
    }
}
