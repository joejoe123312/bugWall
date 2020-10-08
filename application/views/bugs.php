<h1>Add bugs</h1>
<form action="" method="post">
    <label>Url:</label><br>
    <input type="text" name="url" placeholder="Add url of the bug here" autocomplete="off"><br><br>

    <label>Bug description: </label><br>
    <input type="text" name="description" placeholder="Add description" autocomplete="off"><br><br>

    <button type="submit">Submit</button>
</form>

<?php $back = base_url() . "Dashboard" ?>
<a href="<?= $back ?>"><button>Back</button></a>