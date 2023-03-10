<?php require_once "include/navbar.php"; ?>

<div class="w-full flex justify-center items-center mt-32">
  <div class="w-3/12 h-screen ml-6  flex-col mt-30">
    <form class="flex flex-col justify-center gap-2 bg-white p-30 border rounded gap-8 " action="<?= URLROOT ?>cruiseController/reservation" method="POST">
      <input type="hidden" name="id_cruise" value="<?= $data['cruise']->ID_cruise ?>">

      <label for="Price" class="ml-5">cruise price</label>

      <input class="text-md block px-3 py-2 rounded-lg w-full
                bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md
                 focus:placeholder-gray-500 focus:bg-white focus:border-gray-600
                  focus:outline-none" type="text" readonly name="Price" value="<?= $data['cruise']->price ?> DH">

      <label for="id_roomType_price" class="ml-5">room type</label>

      <select class="text-md block px-3 py-2 rounded-lg w-full
                bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md
                 focus:placeholder-gray-500 focus:bg-white
                  focus:border-gray-600 focus:outline-none" name="id_roomType_price" required="required">
        <option selected disabled>room type</option>
        <?php foreach ($data['roomType'] as $roomType) : ?>
          <option value="<?= $roomType->id . ' ' . $roomType->price ?>">
            <?= $roomType->name . ':' . $roomType->price . ' $' ?>
          </option>
        <?php endforeach ?>
      </select>

      </select>
      <div class="flex justify-center">
        <button for="submit" name="submit" type="submit" class="btn">book Now</button>
      </div>
    </form>
  </div>
</div>



<?php require_once "include/footer.php"; ?>