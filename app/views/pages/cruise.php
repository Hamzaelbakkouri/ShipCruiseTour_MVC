<?php require APPROOT . '/views/inc/header2.php'; ?>
<div class="mt-5">

</div>
<section class="book-form mt-md-5" id="book-form">

    <form action="" class="mt-md-5">
        <div data-aos="zoom-in" data-aos-delay="150" class="inputBox">
            <div data-aos="zoom-in" data-aos-delay="300" class="inputBox">
                <div class="form-group">
                    <label for="exampleFormControlSelect1"></label>
                    <select class="form-control" d="exampleFormControlSelect1">
                    </select>
                </div>
            </div>
            <div data-aos="zoom-in" data-aos-delay="300" class="inputBox">
                <span>when?</span>
                <input type="date" value="">
            </div>
            <div data-aos="zoom-in" data-aos-delay="450" class="inputBox">
                <span>how many?</span>
                <input type="number" placeholder="" value="">
            </div>
            <input data-aos="zoom-in" data-aos-delay="600" type="submit" value="find now" class="btn">
    </form>

</section>

<div class="container">
    <div id="demo" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="card">
                    <div class="path">HOME / FACE <a>/ CLEANSERS</a> </div>
                    <div class="row">
                        <div class="col-md-6 text-center align-self-center"> <img class="img-fluid"
                                src="<?php echo URLROOT; ?>/images/safina55.jpg">
                        </div>
                        <div class="col-md-6 info">
                            <div class="row title">
                                <div class="col">
                                    <h2>Herbalism</h2>
                                </div>
                                <div class="col text-right"><a href="#"><i class="fa fa-heart-o"></i></a></div>
                            </div>
                            <p>Natural herbal wash</p> <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span> <span class="fa fa-star-half-full"></span>
                            <span id="reviews">1590 Reviews</span>
                            <div class="row price">
                                <label class="radio"> <input type="radio" name="size1" value="small" checked> <span>
                                        <div class="row"><big><b>1.5 oz.</b></big></div>
                                        <div class="row">$12.95</div></a>
                                    </span> </label>
                                <label class="radio"> <input type="radio" name="size1" value="large"> <span>
                                        <div class="row"><big><b>4.4 oz.</b></big></div>
                                        <div class="row">$21.95</div></a>
                                    </span> </label>
                                <div class="col text-right align-self-center"> <button class="btn">BOOK NOW</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



<?php require APPROOT . '/views/inc/footer.php'; ?>