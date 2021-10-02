<h1>Create new user</h1>
<div class="w-25">
    <form method="POST">
        <div class="mb-3">
            <?php foreach ($params["data"] as $field) : ?>
                <label for="<?php echo $field->name ?>" class="form-label"><?php echo $field->label ?></label>
                <input type="<?php echo $field->type ?>" name="<?php echo $field->name ?>" class="form-control w-3">
                <div class="form-text alert-danger">
                    <?php
                    if (isset($params["errors"][$field->name])) {
                        echo $params["errors"][$field->name];
                    }
                    ?>
                </div>
            <?php endforeach; ?>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>