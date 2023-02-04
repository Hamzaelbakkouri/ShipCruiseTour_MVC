<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="<?php echo URLROOT;?>/admins/dashboard "><img class="rounded-circle" style="width: 50px; height:50px" src="<?php echo URLROOT;?>/img/logo.png" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <?php if(isset($_SESSION['role']) && ($_SESSION['role'] == 0)) : ?>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/admins/dashboard">Dashbaord</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Add
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="<?php echo URLROOT; ?>/admins/addPort">Add Port</a></li>
              <li><a class="dropdown-item" href="<?php echo URLROOT; ?>/admins/addShip">Add Ship</a></li>
              <li><a class="dropdown-item" href="<?php echo URLROOT; ?>/admins/addCruise">Add Cruise</a></li>
              <li><a class="dropdown-item" href="<?php echo URLROOT; ?>/admins/addRoom">Add Room</a></li>
              <li><a class="dropdown-item" href="<?php echo URLROOT; ?>/admins/addRoomType">Add Type</a></li>
            </ul>
        </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/pages/reservations">Reservations</a>
          </li>
      </ul>
      <?php elseif(isset($_SESSION['role']) && ($_SESSION['role'] != 0)): ?>

        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/clients/home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/clients/about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/pages/reservations">Reservations</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/clients/myreservations">My Reservations</a>
          </li>
      </ul>

      <?php else:; ?>

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/client/home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/client/about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Reservations</a>
          </li>
      </ul>
      <?php endif; ?>

      <?php if(isset($_SESSION['idusers'])) : ?>
      
      <a href="<?php echo URLROOT; ?>/users/logout" class="btn btn-light btn-outline-primary border border-white">Logout</a>
      <?php else: ?>
      
      <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-light btn-outline-primary border border-white">Login</a>
 <?php endif ?>
    </div>
  </div>
</nav>