<?php require APPROOT . '/views/inc/header.php'; ?>

<section class="py-5 text-center container">
  <div class="row py-lg-5">
    <div class="col-lg-6 col-md-8 mx-auto">
      <h1 class="fw-light">Total cruises | Admin side</h1>
      <p>
        <a href="<?php echo URLROOT; ?>/admins/addCruise" class="btn btn-primary my-2">Add A Cruise</a>
      </p>
    </div>
  </div>
</section>



<div class="album py-5 bg-dark text-white">
  <div class="container">
    <!-- <div class="card mt-5">
      <div class="card-body">
        Ships:
      </div>
    </div>
    <div class="card mt-2 mb-5">
      <div class="card-body">
        Ports:
      </div>
    </div> -->

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

      <?php
      foreach ($data['product'] as $key) {
      ?>
        <div class="col ">
          <div class="card shadow-sm bg-dark text-white">
            <img src="<?php echo URLROOT ?>/uploads/<?= $key->image ?>" class="bd-placeholder-img card-img-top">

            <div class="card-body ">
              <p class="card-text ">Name: <?= $key->title ?></p>
              <p class="card-text">Departure Date: <?= $key->departuredate ?></p>
              <p class="card-text">Departure Port: <?= $key->name ?> | <?= $key->country ?></p>
              <p class="card-text">Destination: <?= $key->destination ?></p>
              <p class="card-text">Duration: <?= $key->duration ?></p>
              <p class="card-text">Itinerary: <?= $key->itinerary ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a type="button" class="btn btn-sm btn-outline-secondary">View</a>
                  <a href="<?php echo URLROOT; ?>/admins/deletecruise/<?php echo $key->idcruise; ?>" type="button" class="btn btn-sm btn-outline-secondary">Delete</a>
                </div>
                <small class="text-muted">11 mins</small>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>