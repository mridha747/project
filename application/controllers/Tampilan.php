<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tampilan extends CI_Controller
{

public function index(){
    $data['title'] = 'E-LEARSTMIK';

    $this->load->view('templates/tampilan_header', $data);
    $this->load->view('tampilan/index');
    $this->load->view('templates/tampilan_footer');
}

public function contact(){
    $data['title'] = 'E-LEARSTMIK';

    $this->load->view('templates/tampilan_header', $data);
    $this->load->view('tampilan/contact');
    $this->load->view('templates/tampilan_footer');
}
}

