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
<?php elseif (Auth::user()->roles_id == 5): ?>
    <?php
      header("Location: pengembangan/home");
      exit;
    ?>
<?php elseif (Auth::user()->roles_id == 6): ?>
    <?php
      header("Location: teknologi/home");
      exit;
    ?>
<?php elseif (Auth::user()->roles_id == 7): ?>
    <?php
      header("Location: evaluasi/home");
      exit;
    ?> 
<?php elseif (Auth::user()->roles_id == 8): ?>
    <?php
      header("Location: sekretaris/home");
      exit;
    ?> 
<?php elseif (Auth::user()->roles_id == 9): ?>
    <?php
      header("Location: bendahara/home");
      exit;
    ?> 
<?php elseif (Auth::user()->roles_id == 666): ?>
    <?php
      header("Location: dpl/home");
      exit;
    ?>
<?php elseif (Auth::user()->roles_id == 777): ?>
    <?php
      header("Location: kdpl/home");
      exit;
    ?>     
<?php endif ?>