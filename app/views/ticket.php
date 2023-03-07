<?php require_once "include/navbar.php"; ?>

<!-- component -->
<h1 class="mt-10 flex justify-center text-white text-xl">YOUR RESERVATION</h1>
<?php foreach ($data['reservations'] as $reservation) : ?>

    <div class="flex flex-wrap gap-5 justify-center mb-20 ml-16">
        <div class="relative flex flex-col md:flex-row md:space-x-5 space-y-3 md:space-y-0 rounded-xl shadow-lg p-3 max-w-xs md:max-w-3xl mx-auto border bg-gray-800">
            <div class="w-full md:w-1/3 bg-gray-800 grid place-items-center">
                <img src="<?= IMAGE . $reservation->picture ?>" alt="tailwind logo" class="rounded-xl" />
            </div>
            <div class="w-full md:w-2/3 bg-gray-800 flex flex-col space-y-2 p-3">
                <div class="flex justify-between item-center">
                </div>
                <h3 class="font-black text-white md:text-3xl text-xl"><?= $reservation->name ?></h3>
                <p class="md:text-lg text-white text-base">ports : <?= $reservation->name ?><br>start date : <?= $reservation->start_date ?> <br>trajet :</p>
                <p class="text-xl font-black text-gray-800">
                    $<?= $reservation->price_reservation ?>
                    <span class="font-normal text-white text-base"> / <?= $reservation->nights_number ?> nights</span>
                </p>
                <div class="w-32 h-10 bg-blue-500 px-3 py-1 rounded-full text-xs font-medium text-gray-800 hidden md:block">
                    <a class="h-full flex justify-center items-center " href="<?= URLROOT . 'cruiseController/delete_ticket/' . $reservation->id_reservation ?>">Cancel</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php require_once "include/footer.php"; ?>