
<?= $this->Html->script('jquery/jquery.min.js'); ?>
<?= $this->Html->script('bootstrap/bootstrap.bundle.min.js'); ?>


<?= $this->Html->script('jquery-easing/jquery.easing.min.js');?>


<?= $this->Html->script('sb-admin-2.min.js'); ?>



<?php if($current_action == 'dashboard'): ?>

<?= $this->Html->script('chart.js/Chart.min.js'); ?>
<?= $this->Html->script('chart-area-demo.js'); ?>
<?= $this->Html->script('chart-bar-demo.js');   ?>
<?= $this->Html->script('chart-pie-demo.js');?>
<?= $this->Html->script('dashboard.js');?>

<?php endif; ?>

<?php if($current_action == 'profile'): ?>

    <?= $this->Html->script('password_checker'); ?>

<?php endif; ?>

<?php if($current_action == 'sendChangelog'): ?>

    <?= $this->Html->script('editor.js'); ?>

<?php endif; ?>



<?= $this->Html->script('custom.js'); ?>


