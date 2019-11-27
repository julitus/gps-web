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
 */

$cakeDescription = 'GPs - Pages';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>
        <?= $cakeDescription ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <!--?= $this->Html->css('base.css') ?-->
    <!--?= $this->Html->css('cake.css') ?-->

    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('font-awesome.min.css') ?>
    <?= $this->Html->css('ionicons.min.css') ?>
    <?= $this->Html->css('AdminLTE.min.css') ?>
    <?= $this->Html->css('_all-skins.min.css') ?>

    <?= $this->Html->css('bootstrap-datepicker.min.css') ?>
    <?= $this->Html->css('daterangepicker.css') ?>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <?= $this->Html->css('custom.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
    
    <div class="wrapper">

        <?= $this->element('header') ?>
        <?= $this->element('sidebar') ?>

        <div class="content-wrapper">
            <?= $this->Flash->render() ?>
            
            <?= $this->fetch('content') ?>
        </div>

        <?= $this->element('footer') ?>

    </div>

    <!--nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
                <li><a target="_blank" href="https://book.cakephp.org/3.0/">Documentation</a></li>
                <li><a target="_blank" href="https://api.cakephp.org/3.0/">API</a></li>
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div-->


    <footer>
    </footer>

    <?= $this->Html->script('jquery.min.js') ?>
    <?= $this->Html->script('jquery-ui.min.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>

    <?= $this->Html->script('moment.min.js') ?>
    <?= $this->Html->script('daterangepicker.js') ?>
    <?= $this->Html->script('bootstrap-datepicker.min.js') ?>

    <?= $this->Html->script('adminlte.min.js') ?>
    <?= $this->Html->script('dashboard.js') ?>
    <?= $this->Html->script('demo.js') ?>

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6Nem6HRVGgsqitMo1HKjNfdeMPl-eQa0"></script>

</body>
</html>
