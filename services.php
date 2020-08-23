<style>

    .carousel-item img{
        max-height: 420px;
    }
    .carousel{
        box-shadow: 0px 0px 10px black;
    }
    .services{
        min-height: 90vh;
    }

</style>
<body>
    <div class="services" id="services">
        <div class="row" style="text-align: center;">
            <div class="col-12">
                <div class="heading py-4" style="text-transform:uppercase;font-family:cursive;">
                    <h1>Services</h1>
                </div>
            </div>
        </div>
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="./assets/img/internship.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="./assets/img/online course.webp" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="./assets/img/certi1.jpg" alt="Third slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="./assets/img/ic1.jpg" alt="Fourth slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="./assets/img/course.webp" alt="Fifth slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="./assets/img/intern3.webp" alt="Sixth slide">
                </div>
            </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</body>