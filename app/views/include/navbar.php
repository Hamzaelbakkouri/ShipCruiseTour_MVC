<div class="w-full bg-white relative flex overflow-hidden">

  <!-- Sidebar -->


  <div class="w-full h-full flex flex-col justify-between">
    <!-- Header -->
    <header class="h-16 w-full flex items-center relative justify-end px-5 space-x-10 bg-gray-800">
      <?php if (isset($_SESSION['role'])) : ?>
        <?php if ($_SESSION['role'] == 1) : ?>
          <div class="h-10 w-10 flex items-center justify-center rounded-lg cursor-pointer hover:text-gray-800 hover:bg-white  hover:duration-300 hover:ease-linear focus:bg-white">
            <a href="<?= URLROOT ?>cruiseController/admin"><i class='fa fa-user'></i></a>
          </div>
        <?php else : ?>
          <!-- user -->
          <div class="h-10 w-10 flex items-center justify-center rounded-lg cursor-pointer hover:text-gray-800 hover:bg-white  hover:duration-300 hover:ease-linear focus:bg-white">
            <a href="<?= URLROOT ?>cruiseController/ticket"><i class="fa fa-sack-dollar"></i></a>
          </div>
        <?php endif; ?>
      <?php endif; ?>

      <!-- Home -->
      <div class="h-10 w-20 flex items-center justify-center rounded-lg cursor-pointer text-white hover:bg-black  hover:duration-300 hover:ease-linear focus:bg-white">
        <a href="<?= URLROOT ?>pages/home">HOME</a>
      </div>

      <!-- tickets -->
      <div class="h-10 w-40 flex items-center justify-center rounded-lg cursor-pointer text-white hover:bg-black  hover:duration-300 hover:ease-linear focus:bg-white">

        <a href="<?= URLROOT ?>cruiseController/booking">BOOK NOW</i></a>
      </div>
      <div class=" w-32 h-10 flex items-center justify-center space-x-4 text-white hover:bg-black hover:border rounded">

        <?php if (isset($_SESSION['Id'])) : ?>
          <button> <a href="<?php echo URLROOT . 'usersController/logOut' ?>">logOut</a> </button>
        <?php else : ?>
          <button> <a href="<?php echo URLROOT . 'pages/login' ?>">login</a> </button>
        <?php endif; ?>

      </div>
    </header>
    <!-- Main -->
    <main class="max-w-full h-full flex relative overflow-y-hidden">
      <!-- Container -->
      <div class="h-full w-full flex flex-wrap items-start justify-start rounded-tl grid-flow-col auto-cols-max gap-4 overflow-y-scroll">
        <!-- Container -->
      </div>
    </main>
  </div>
</div>