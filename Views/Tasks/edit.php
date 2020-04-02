<h1>Edit task</h1>
<form method='post'>
    <div class="form-group">
        <label>Name: <?=$task["name"]?></label>
    </div>
    <div class="form-group">
        <label]>Email: <?=$task["email"]?></label>
    </div>
    <div class="form-group">
        <label for="text">text</label>
        <input type="text" class="form-control" id="text" placeholder="Enter a text" name="text" value ="<?=$task["text"]?>">
    </div>

    <div class="form-group">
        <label for="status">status:</label>
        <input type="checkbox" id="status" name="status" value="1" <?= ($task["status"] == 1 ? "checked" : "") ?>>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>