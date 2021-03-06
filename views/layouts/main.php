<!DOCTYPE html>
<html lang="<?php require_once(ROOT . '/views/partials/lang-detector.php'); ?>">

<!-- Head -->
<head>
    <!-- Required Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <!-- Additional Meta Tags -->
    <meta name="author" content="">
    <meta name="description" content="">

    <!-- Title -->
    <title><?php echo $this->title; ?></title>

    <!-- Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">

    <!-- CSS & JS Autoloader -->
    <?php require_once(ROOT . '/views/partials/css-autoloader.php'); ?>
    <?php require_once(ROOT . '/views/partials/js-autoloader.php'); ?>
</head>

<!-- Body -->
<?php
    if(!is_null($this->body)){
        echo "<body {$this->body}>";
    } else {
        echo "<body>";
    }

    if(!$this->void){
        require_once($this->view);
    } else {
        echo $this->view;
    }
    
    echo "</body></html>";
?>