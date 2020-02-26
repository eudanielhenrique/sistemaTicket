<?php
  if (!defined('ABSPATH')) exit;

  $params = $this->getParams();
  $msg = $params['msg'];
?>

<div class="alert alert-danger" role="alert">
  <?php echo $msg; ?>
</div>