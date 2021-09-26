    <?php
    if (isset($scripts) && is_array($scripts)):
    foreach ($scripts as $script): ?>
    <script src="<?php echo "/js/$script.js" ?>"></script>
    <?php endforeach; endif; ?>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

</html>