<?php require APPROOT . '/views/inc/header2.php'; ?>
<div class="mt-5">

</div>
<section class="book-form mt-md-5" id="book-form">

    <form action="" class="mt-md-5">
        <div data-aos="zoom-in" data-aos-delay="150" class="inputBox">
        <div class="form-group">
    <label for="exampleFormControlSelect1"></label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>tailand</option>
    </select>
  </div>
        <div data-aos="zoom-in" data-aos-delay="300" class="inputBox">
            <span>when?</span>
            <input type="date" value="">
        </div>
        <div data-aos="zoom-in" data-aos-delay="450" class="inputBox">
            <span>how many?</span>
            <input type="number" placeholder="number of travelers" value="">
        </div>
        <input data-aos="zoom-in" data-aos-delay="600" type="submit" value="find now" class="btn">
    </form>

</section>



<?php require APPROOT . '/views/inc/footer.php'; ?>

