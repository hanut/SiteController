<?php
require_once './utils/SiteController.php';
$controller = new SiteController();

$controller->addScript('//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js');
$controller->addScript('http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js');
$controller->addScript('js/bootstrap.min.js');
$controller->addScript('js/modernizr.min.js');
?>
﻿<!DOCTYPE html>
<!--[if IE 7 ]>    <html class="ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8 oldie" lang="en"> <![endif]-->
<!--[if IE 	 ]>    <html class="ie" lang="en"> <![endif]-->
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<html>
    <head>
        <title>SiteController - Welcome</title>
        <meta charset="UTF-8">
        <meta name="description" content="Your Site's Description Goes here.">
        <meta name="author" content="Koresoft">
        <?php $controller->loadSection('head'); ?>
    </head>
    <body>
        <!--header-->
        <?php $controller->loadSection('header'); ?>
        <!--//header-->

        <!--main-->
        <?php $controller->loadSection('content/home');?>
        <!--//main-->

        <!--footer-->
        <?php $controller->loadSection('footer');?>
        <!--//footer-->

        <?php $controller->includeScripts();?>
    </body>
</html>