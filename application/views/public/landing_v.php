<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/favicon.ico">


    <title>Kalia Code</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="<?=base_url('static/images/favicon.ico')?>">

    <?=$_APP['stylesheets']?>

 
</head>

<body>
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <?=$_APP['header']?>

    <?=$_APP['fragment']?>

    <?=$_APP['footer']?>

    <!-- Bootstrap core JavaScript -->
    <script src="<?=base_url('static/vendor/jquery/jquery.min.js')?>"></script>
    <script src="<?=base_url('static/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>


    <!-- Additional Scripts -->
    <script src="<?=base_url('static/assets/js/custom.js')?>"></script>
    <script src="<?=base_url('static/assets/js/owl.js')?>"></script>
 
 <script type="text/javascript"> function base_url(complement = '') { return "<?= base_url() ?>"+complement } </script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

<?php if (isset($scripts)):
    foreach ($scripts as $script): ?>
        <script type="text/javascript" src="<?= base_url(
            'static/js/' . $script . '.js'
        ) ?>"></script>
    <?php endforeach;
endif; ?>

    <script src="<?=base_url('static/js/app.js')?>"></script><!--Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. -->
</body>
</html>
