<h1>Welcome to dashboard</h1>
<?php $addBugs = base_url() . "Bugs" ?>
<a href="<?= $addBugs ?>"><button>Add Bugs</button></a> &nbsp;

<?php $todoList = base_url() . "TodoList" ?>
<a href="<?= $todoList ?>"><button>To Do List</button></a>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Url</th>
            <th>Description</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        <?php $counter = 0; ?>
        <?php foreach ($bugTable->result() as $row) { ?>
            <?php $counter++ ?>
            <tr>
                <td><?= $counter ?></td>
                <td><a href="<?= $row->url ?>" target="_blank"><?= $row->url ?></a></td>
                <td><?= $row->description ?></td>
                <td>
                    <?php
                    $update = base_url() . "Bugs/update/$row->id";
                    $delete = base_url() . "Bugs/delete/$row->id";
                    ?>

                    <a href="<?= $update ?>"><button>Update</button></a>
                    <a href="<?= $delete ?>"><button>Delete</button></a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>