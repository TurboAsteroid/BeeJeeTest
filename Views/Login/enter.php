<h1>Enter</h1>
<form method='post'>
    <div class="form-group">
        <label for="name">login</label>
        <input type="text" class="form-control" id="login" placeholder="Enter a login" name="login">
    </div>

    <div class="form-group">
        <label for="pass">pass</label>
        <input type="text" class="form-control" id="pass" placeholder="Enter a pass" name="pass">
    </div>

    <?php foreach ($errors as $error) { ?>
        <div class="alert alert-danger" role="alert">
            <?= $error ?>
        </div>
    <? } ?>
    <?php if ($success) { ?>
        <div class="alert alert-success" role="alert">
            <?= success ?>
        </div>
    <? } ?>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>