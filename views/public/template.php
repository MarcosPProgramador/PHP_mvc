<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo PATH;?>views/public/styles/global.css">
    <link rel="shortcut icon" href="<?php echo $this->setConfig('icon');?>" type="image/png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $this->setStyle();?>">
    <title><?php echo $this->setConfig('title'); ?></title>
</head>
<body>
    <main>
        <?php 
            $this->setConfig(false, 'header'); 
            $this->setConfig('layout'); 
            $this->setConfig(false, 'footer'); 
        
        ?>
    </main> 
</body>
</html>