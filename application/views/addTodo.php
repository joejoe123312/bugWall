<h1>Add To do list</h1>
<form action="" method="post">
    <label>Task:</label><br>
    <input type="text" name="task" placeholder="Input new task here" autocomplete="off"><br><br>

    <button type="submit">Submit</button>
</form>

<?php $back = base_url() . "TodoList" ?>
<a href="<?= $back ?>"><button>Back</button></a>