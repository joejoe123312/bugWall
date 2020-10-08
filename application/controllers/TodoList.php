<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TodoList extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Main_model');
    }

    function index()
    {
        //notification
        $this->Main_model->alertPromt('To do Updated', 'updateTodo');
        $this->Main_model->alertPromt('To do Deleted', 'todoDeleted');

        $data['todoTable'] = $this->Main_model->get('todo', 'id');
        $this->load->view('todoList', $data);
    }

    function add()
    {
        //notifications
        $this->Main_model->alertPromt('To do added', 'addTodo');

        $this->form_validation->set_rules('task', 'Task', 'required');
        if ($this->form_validation->run()) {
            $insert['task'] = $this->input->post('task');
            $this->Main_model->_insert('todo', $insert);

            //notify and redirect
            $this->Main_model->notifyAndRedirect('addTodo', 'TodoList/add');
        }
        $this->load->view('addTodo');
    }

    function update()
    {
        $todoId = $this->uri->segment(3);

        $this->form_validation->set_rules('task', 'Task', 'required');
        if ($this->form_validation->run()) {
            $update['task'] = $this->input->post('task');
            $this->Main_model->_update('todo', 'id', $todoId, $update);

            //notify and redirect
            $this->Main_model->notifyAndRedirect('updateTodo', 'TodoList');
        }

        //supply data
        $data['todoTable'] = $this->Main_model->get('todo', 'id')->row();

        $this->load->view('updateTodo', $data);
    }

    function delete()
    {
        $todoId = $this->uri->segment(3);

        $this->Main_model->_delete('todo', 'id', $todoId);

        //notify and redirect
        $this->Main_model->notifyAndRedirect('todoDeleted', 'Todo');
    }
}
