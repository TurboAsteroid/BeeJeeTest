<h1>Create task</h1>
<form method='post'>
    <div class="form-group">
        <label for="title">Name</label>
        <input type="text" class="form-control" id="name" placeholder="Enter a name" name="name"
               value="<?= $_POST['name'] ?>">
    </div>

    <div class="form-group">
        <label for="email">email</label>
        <input type="text" class="form-control" id="email" placeholder="Enter a email" name="email"
               value="<?= $_POST['email'] ?>">
    </div>

    <div class="form-group">
        <label for="text">text</label>
        <input type="text" class="form-control" id="text" placeholder="Enter a text" name="text"
               value="<?= $_POST['text'] ?>">
    </div>

    <?php foreach ($errors as $error) { ?>
        <div class="alert alert-danger" role="alert">
            <?= $error ?>
        </div>
    <? } ?>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>