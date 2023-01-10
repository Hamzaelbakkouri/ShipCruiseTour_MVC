<header class="header">

    <div id="menu-btn" class="fas fa-bars"></div>

    <a data-aos="zoom-in-left" data-aos-delay="150" href="#" class="logo"> <i class="fas fa-paper-plane"></i>SHIPTOUR
    </a>

    <nav class="navbar">
        <a data-aos="zoom-in-left" data-aos-delay="300" href="<?php echo URLROOT; ?> ">HOME</a>
        <a data-aos="zoom-in-left" data-aos-delay="450" href="<?php echo URLROOT; ?> /pages/about">ABOUT</a>
        <?php if (isset($_SESSION['name'])) : ?>
        <a data-aos="zoom-in-left" data-aos-delay="600" href="<?php echo URLROOT; ?> /pages/cruise">CRUISE</a>
        <a data-aos="zoom-in-left" data-aos-delay="900" href="<?php echo URLROOT; ?> /Users/logout">LOGOUT</a>
        <a class="user_name"><?= $_SESSION['name'] ?></a>
        <?php else : ?>
        <a data-aos="zoom-in-left" data-aos-delay="750" href="<?php echo URLROOT; ?> /pages/register">SIGN UP</a>
        <a data-aos="zoom-in-left" data-aos-delay="900" href="<?php echo URLROOT; ?> /pages/login">LOGIN</a>
        <?php endif; ?>
        <a><i class="fas fa-user"></i></a>
    </nav>
    <?php if (empty($_SESSION['name'])) : ?>
    <a data-aos="zoom-in-left" data-aos-delay="1300" href="<?php echo URLROOT; ?> /pages/loginadmin"
        class="btn">ADMIN</a>
    <?php endif; ?>
</header>