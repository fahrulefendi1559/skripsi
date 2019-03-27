<?php if (Auth::user()->roles_id == 999): ?>
    <?php
      header("Location: admin/home");
      exit;
    ?>
<?php elseif (Auth::user()->roles_id == 888): ?>
    <?php
      header("Location: admin/home");
      exit;
    ?>
<?php elseif (Auth::user()->roles_id == 1): ?>
    <?php
      header("Location: ketua/home");
      exit;
    ?>
<?php endif ?>