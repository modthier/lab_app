<?php if (!empty($_SESSION['done'])) {?>


    <div class="alert-success" style="padding: 10px;">
        <?php echo $_SESSION['done']; $_SESSION['done'] = null; ?>
    </div><br>

<?php } ?>


<?php if (!empty($_SESSION['error'])) {?>


    <div class="alert-danger" style="padding: 10px;">
        <?php echo $_SESSION['error']; $_SESSION['error'] = null; ?>
    </div><br>

<?php } ?>


<?php if (!empty($_SESSION['warning'])) {?>


    <div class="alert-danger" style="padding: 10px;">
        <?php echo $_SESSION['warning']; $_SESSION['warning'] = null; ?>
    </div><br>

<?php } ?>


<?php if (!empty($_SESSION['errArr'])) {?>


    <div class="alert-danger" style="padding: 10px;">
        <?php
        if (is_array($_SESSION['errArr'])) {
            foreach ($_SESSION['errArr'] as $err) {
                echo "<li>".$err."</li>";
            }
        }


        $_SESSION['errArr'] = null; ?>
    </div><br>

<?php } ?>