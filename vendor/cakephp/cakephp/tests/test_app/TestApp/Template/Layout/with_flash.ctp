<?php
$this->loadHelper('Html');

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php echo  $this->Html->charset(); ?>
    <title>
        <?php echo  $cakeDescription ?>:
        <?php echo  $this->fetch('title'); ?>
    </title>
    <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css('cake.generic');

        echo $this->fetch('script');
    ?>
</head>
<body>
    <div id="container">
        <div id="header">
            <h1><?php echo  $this->Html->link($cakeDescription, 'https://cakephp.org'); ?></h1>
        </div>
        <div id="content">

            <?php echo  $this->Flash->render(); ?>
            <?php echo  $this->fetch('content'); ?>

        </div>
        <div id="footer">
            <?php echo  $this->Html->link(
                    $this->Html->image('cake.power.gif', ['alt' => $cakeDescription, 'border' => '0']),
                    'http://www.cakephp.org/',
                    ['target' => '_blank', 'escape' => false]
                );
            ?>
        </div>
    </div>
</body>
</html>
