<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Main_model');
    }

    function index()
    {
        //notifications
        $this->Main_model->alertPromt('Bug update', 'bugUpdate');
        $this->Main_model->alertPromt('Bug deleted', 'delete');

        //get the list of bugs
        $data['bugTable'] = $this->Main_model->get('bugs', 'id');
        $this->load->view('dashboard', $data);
    }
}
