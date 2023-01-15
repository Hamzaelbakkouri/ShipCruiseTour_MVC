<?php require APPROOT . '/views/inc/headregi.php'; ?>
<div class="mt-5">
    kk
</div>
<form action="<?php echo URLROOT; ?>/Adminway/cruiseController" method="post">
    <div class="container mt-5 mb-5">

        <div class="row d-flex align-items-center justify-content-center">

            <div class="col-md-6">


                <div class="card px-5 py-5">
                    <h2>add cruise</h2>


                    <div class="form-input">


                        <i class="fa fa-envelope"></i>
                        <input type="text" class="form-control" placeholder="name" name="namecr" required>

                    </div>

                    <div class="form-input">

                        <i class="fa fa-user"></i>
                        <input type="file" class="form-control" placeholder="image" name="img" required>

                    </div>


                    <div class="form-input">

                        <i class="fa fa-lock"></i>
                        <input type="number" class="form-control" placeholder="price" name="price" required>

                    </div>
                    <div class="form-input">

                        <i class="fa fa-lock"></i>
                        <input type="text" class="form-control" placeholder="night" name="num_night" required>

                    </div>
                    <div class="form-input">

                        <i class="fa fa-lock"></i>
                        <input type="text" class="form-control" placeholder="port depart" name="ports" required>

                    </div>
                    <div class="form-input">

                        <i class="fa fa-lock"></i>
                        <input type="date" class="form-control" placeholder="date depart" name="date_depart" required>

                    </div>


                    <button class="btn btn-primary mt-4 signup" name="submit_add_cruise">add</button>



                </div>



            </div>

        </div>

    </div>
</form>