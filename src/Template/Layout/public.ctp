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

$cakeDescription = 'TLHT: Amazon Techs you can count on';
?>
<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $cakeDescription ?>:
        <?php echo $this->fetch('title') ?>
    </title>
    <?php echo $this->Html->meta('icon') ?>

    <?php echo $this->Html->css('foundation.min.css') ?>
    <?php echo $this->Html->css('base.css') ?>

    <?php echo $this->Html->css('main.css') ?>
    <?php echo $this->Html->css('style.css') ?>

    <?php echo $this->Html->css('app.css') ?>

    <?php echo $this->Html->script('jquery') ?>
    <?php echo $this->Html->script('foundation.min') ?>
    <?php echo $this->Html->script('what-input') ?>
    <?php echo $this->Html->script('app') ?>

    <?php echo $this->fetch('meta') ?>
    <?php echo $this->fetch('css') ?>
    <?php echo $this->fetch('script') ?>

</head>
<body>
<body>

<nav class="top-bar" data-topbar role="navigation">
    <ul class="title-area ">
        <li class="name">
            <h1><a href=""><?php echo $this->fetch('title'); ?></a></h1>
        </li>
        <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
    </ul>

    <section class="top-bar-section">
        <!-- Right Nav Section -->
        <ul class="menu" data-dropdown-menu>
            <li><a href="/users/logout/">Login</a></li>
        </ul>
    </section>

</nav>


<?php echo $this->Flash->render() ?>
<div class="container clearfix">
    <?php echo $this->fetch('content') ?>
</div>
<footer>
</footer>
<script>
    $(document).foundation();
</script>
</body>
</html>
