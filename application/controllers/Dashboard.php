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

        //get bugs count 
        $data['currentBugsCount'] = $this->Main_model->fastCountTable('bugs');

        $this->load->view('includes/header');
        $this->load->view('includes/navbar');
        $this->load->view('dashboard', $data);
        $this->load->view('includes/footer');
    }

    function ajaxUpdateTable()
    {
        //get the list of bugs
        $bugTable = $this->Main_model->get('bugs', 'id'); ?>

        <?php $counter = 0; ?>
        <?php foreach ($bugTable->result() as $row) { ?>
            <?php $counter++ ?>
            <tr>
                <td><?= $counter ?></td>
                <td><a href="<?= $row->url ?>" target="_blank" class="text-white"><?= $row->url ?></a></td>
                <td><?= $row->description ?></td>
                <td style="display:flex">
                    <?php
                    // $update = base_url() . "Bugs/update/$row->id";
                    // $delete = base_url() . "Bugs/delete/$row->id";
                    ?>

                    <button class="btn btn-primary btn-sm">Update</button>
                    <button id="deleteBug" value="<?= $row->id ?>" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
        <?php } ?>
<?php }

    function deleteBug()
    {
        if (isset($_POST['bugId'])) {
            $bugId = $this->input->post('bugId');

            $this->Main_model->_delete('bugs', 'id', $bugId);
        }
    }
}
