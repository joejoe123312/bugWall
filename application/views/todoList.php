<h1>Welcome to to do list</h1>
<?php
$back = base_url() . "Dashboard";
$addTodo = base_url() . "TodoList/add";
?>
<a href="<?= $back ?>"><button>Back</button></a> &nbsp;
<a href="<?= $addTodo ?>"><button>Add things to do</button></a>
<div style="margin-bottom:20px"></div>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Task</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <?php $counter = 0; ?>
        <?php foreach ($todoTable->result() as $row) { ?>
            <?php $counter++ ?>
            <tr>
                <td><?= $counter ?></td>
                <td><?= $row->task ?></td>
                <td>
                    <?php
                    $update = base_url() . "TodoList/update/$row->id";
                    $delete = base_url() . "TodoList/delete/$row->id";
                    ?>

                    <a href="<?= $update ?>"><button>Update</button></a>
                    <a href="<?= $delete ?>"><button>Delete</button></a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>