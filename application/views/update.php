<h1>Update bugs</h1>
<form action="" method="post">
    <label>Url:</label><br>
    <input type="text" name="url" value="<?= $bugInfo->url ?>" autocomplete="off"><br><br>

    <label>Bug description: </label><br>
    <input type="text" name="description" value="<?= $bugInfo->description ?>" autocomplete="off"><br><br>

    <button type="submit">Update</button>
</form>

<?php $back = base_url() . "Dashboard" ?>
<a href="<?= $back ?>"><button>Back</button></a>