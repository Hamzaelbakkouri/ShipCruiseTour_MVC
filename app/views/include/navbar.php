<div class="w-full bg-white relative flex overflow-hidden">
  <div class="w-full h-full flex flex-col justify-between">
    <header class="w-full h-16 flex items-center  bg-gray-800">
      <div class="ml-8 h-15 w-14 ">
        <img src="<?= URLROOT ?>img/logo.png" alt="">
      </div>
      <div class=" w-full relative flex justify-end px-5 space-x-10">
        <?php if (isset($_SESSION['role'])) : ?>
          <?php if ($_SESSION['role'] == 0) : ?>
            <div class="text-white h-10 w-40 flex items-center justify-center rounded-lg cursor-pointer hover:text-gray-800 hover:bg-white  hover:duration-300 hover:ease-linear focus:bg-white">
              <a href="<?= URLROOT ?>cruiseController/admin">Dashboard</i></a>
            </div>
          <?php else : ?>
            <div class="text-white h-10 w-40 flex items-center justify-center rounded-lg cursor-pointer hover:text-gray-800 hover:bg-white  hover:duration-300 hover:ease-linear focus:bg-white">
              <a href="<?= URLROOT ?>cruiseController/ticket">Your Reservation</a>
            </div>
          <?php endif; ?>
        <?php endif; ?>

        <div class="h-10 w-20 flex items-center justify-center rounded-lg cursor-pointer text-white hover:bg-black  hover:duration-300 hover:ease-linear focus:bg-white">
          <a href="<?= URLROOT ?>pages/home">HOME</a>
        </div>

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
      </div>
    </header>
    <main class="max-w-full h-full flex relative overflow-y-hidden">
      <div class="h-full w-full flex flex-wrap items-start justify-start rounded-tl grid-flow-col auto-cols-max gap-4 overflow-y-scroll">
      </div>
    </main>
  </div>
</div>