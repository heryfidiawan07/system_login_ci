<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
        <title>Layout &rsaquo; Top Navigation &mdash; Stisla</title>
        <!-- General CSS Files -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/fontawesome/css/all.min.css">
        <!-- CSS Libraries -->
        <!-- Template CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/components.css">
        <!-- Start GA -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-94034622-3');
        </script>
        <!-- /END GA --></head>
        <body class="layout-3">

        <div id="app">
            <div class="main-wrapper container">
                <div class="navbar-bg"></div>

                <?php $this->load->view('template/user/nav_1') ?>
                <?php $this->load->view('template/user/nav_2') ?>