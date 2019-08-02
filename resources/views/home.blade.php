<?php if (Auth::user()->roles_id == 999): ?>
    <?php
      header("Location: admin/home");
      exit;
    ?>
<?php elseif (Auth::user()->roles_id == 888): ?>
    <?php
      header("Location: operator/home");
      exit;
    ?>
<?php elseif (Auth::user()->roles_id == 1): ?>
    <?php
      header("Location: ketua/home");
      exit;
    ?>
<?php elseif (Auth::user()->roles_id == 2): ?>
    <?php
      header("Location: sekre/home");
      exit;
    ?>
<?php elseif (Auth::user()->roles_id == 4): ?>
    <?php
      header("Location: operasional/home");
      exit;
    ?>
<?php elseif (Auth::user()->roles_id == 3): ?>
    <?php
      header("Location: pendikpel/home");
      exit;
    ?>

<?php endif ?>