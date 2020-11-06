<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bugs extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Main_model');
    }

    function index() //code to add bugs
    {
        //notifications
        $this->Main_model->alertPromt('Bugs added successfully', 'addedBugs');

        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        if ($this->form_validation->run()) {
            $insert['url'] = $this->input->post('url');
            $insert['description'] = $this->input->post('description');
            $this->Main_model->_insert('bugs', $insert);

            //notify and redirect
            $this->session->set_userdata('addedBugs', 1);
            redirect("Bugs");
        }
        $this->load->view("bugs");
    }

    function update() //code to add bugs
    {
        //get the id
        $bugId = $this->uri->segment(3);

        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        if ($this->form_validation->run()) {
            $update['url'] = $this->input->post('url');
            $update['description'] = $this->input->post('description');
            $this->Main_model->_update('bugs', 'id', $bugId, $update);

            //notify and redirect
            $this->session->set_userdata('bugUpdate', 1);
            redirect("Dashboard");
        }

        //get the bug info
        $data['bugInfo'] = $this->Main_model->get_where('bugs', 'id', $bugId)->row();
        $this->load->view("update", $data);
    }

    function delete()
    {
        $bugId = $this->uri->segment(3);

        //delete the row in the database
        $this->Main_model->_delete('bugs', 'id', $bugId);

        //notify and redirect
        $this->session->set_userdata('delete', 1);
        redirect('Dashboard');
    }

    function tableChange()
    {
        $numRows = $this->Main_model->fastCountTable('bugs');
        echo $numRows;
    }
}
