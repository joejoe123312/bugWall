<h1>Update to do</h1>
<form action="" method="post">
    <label>Task:</label><br>
    <input type="text" name="task" value="<?= $todoTable->task ?>" autocomplete="off"><br><br>

    <button type="submit">Submit</button>
</form>

<?php $back = base_url() . "TodoList" ?>
<a href="<?= $back ?>"><button>Back</button></a>