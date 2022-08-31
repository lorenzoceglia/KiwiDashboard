<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            <?= $app_name ?>
        </title>
        <?= $this->Html->meta('favicon.ico','img/favicon.ico',array('type' => 'icon')); ?>


        <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

        <?= $this->fetch('meta') ?>
        <?= $this->element('css_custom'); ?>
    </head>
    <body>
    <div id="page-top">
        <div id="wrapper">
            <?= $this->element('sidebar');?>
            <?= $this->element('content_wrapper');?>
        </div>

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <div class="text-center">
            <?= $this->Flash->render(); ?>
        </div>
        <?= $this->element('js_custom'); ?>

    </div>
    </body>
</html>
