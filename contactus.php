<style>
    .card-header{
        background: url(assets/img/contact.png);
        background-size: contain;
        min-height: 100px;
        opacity: 90%;
    }
    .card-body{
        background-color: #F0F3F4 ;
    }
    label{
        font-weight: 600;
    }
    .card{
        border-radius: 10px;
        box-shadow: 0px 5px 10px rgba(104, 100, 100, 0.5);
      
    }
    .card:hover{
        display: block;
        
    }

    .social i.fa{-webkit-transition: 0.6s ease-out;-moz-transition:  0.6s ease-out;transition:  0.6s ease-out; font-size: larger;}
    .social i.fa:hover{-webkit-transform: rotateZ(360deg);-moz-transform: rotateZ(360deg);transform: rotateZ(360deg);}
    .social i.fab{-webkit-transition: 0.6s ease-out;-moz-transition:  0.6s ease-out;transition:  0.6s ease-out; font-size: larger;}
    .social i.fab:hover{-webkit-transform: rotateZ(360deg);-moz-transform: rotateZ(360deg);transform: rotateZ(360deg);}

    .linkedin{color:#0e76a8;text-align: center;}
    .instagram{color: #c21053;}

    .social i.fa{font-size:45px;}
    .social i.fab{font-size:45px;}
    .social .fab{margin: 10px 10px;}
    .social .fa{padding-left: 10%; padding-right: 10%;}

    .contactus{
        background-image: url(assets/img/bg.jpg);
        background-repeat: no-repeat;
        background-size:cover;
        min-height: 100vh;
    }

</style>
<body>
    
    <div class="contactus" id="contactus">
        <div class="container"> 
            <div class="row" style="text-align: center;">
                <div class="col-12">
                    <div class="heading my-4" style="text-transform:uppercase;">
                       <h1 class="text-center text-justify font font-weight-bold text-capitalize pt-5">About Us</h1>
<hr class="w-25 mx-auto pb-3">
                    </div>
                </div>
            </div>

            <div class="row pb-5">

                <div class="col-lg-6 col-md-12">
                    <div class="header" style="border-bottom: 2px solid #2E4053">
                        <h2 style="color:#212F3C ">Let’s talk</h2>
                        <p style="font-size: 15px;color:#212F3C ; ">Details given below can help you to reach out to us.</p>
                    </div>
                    <br>

                    <div class="row py-2 social">

                        <div class="col-6">
                            <a class="phone" href="tel:+919340961214"><i class="fa fa-phone"></i></a>
                            <div class="contact-info" style="margin-top: 20px;  margin-bottom: 20px;">
                                <strong style="padding-left: 10%;">Phone</strong><br />
                                <a href="tel:+919340961214">+91 9340961214</a>
                            </div>
                        </div>
                        <div class="col-6">
                            <a class="envelope" href="#"><i class="fa fa-envelope" style="color: #D44638;"></i></a>
                            <div class="email-info" style="margin-top: 20px; margin-bottom: 20px;">
                                <strong style="padding-left: 10%;">Email</strong><br />
                                <a href="mailto:pkbank2020@gmail.com" target="_blank">pkbank2020@gmail.com</a>
                            </div>
                        </div>

                    </div>


                    <div class="header" style="border-bottom: 2px solid #2E4053">
                        <h2 style="color:#212F3C "> Our Social Links</h2>
                        <p style="font-size: 15px;color:#212F3C "> Follow us at social media to get regular updates.</p>
                    </div>

                    <div class="row py-4 social">
                        <div class="col-lg-3 col-sm-6 col-6">
                            <a class="linkedin" href="#" target="_blank"><i class="fab fa-linkedin"></i>Linkedin</a>    
                        </div>
                        <div class="col-lg-3 col-sm-6 col-6">
                            <a class="facebook" href="#" target="_blank"><i class="fab fa-facebook"></i>Facebook</a>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-6">
                            <a class="twitter" href="#" target="_blank"><i class="fab fa-twitter"></i>Twitter</a> 
                        </div>
                        <div class="col-lg-3 col-sm-6 col-6">
                            <a class="instagram" href="#" target="_blank"><i class="fab fa-instagram"></i>Instagram</a>
                        </div>
                    </div>
                </div>


                <div class="col-lg-6 col-md-12 px-5">

                    <div class="card">
                        <div class="card-header" style="text-align:center;">
                            <div class="header-text" style="color: white">
                                <h3 style="font-family:cursive;"></h3> 
                                <p style="color:gold"><span></span></p>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">

                                <div class="form-group row">
                                    <label for="inputName" class="col-md-4 col-form-label">Name :</label>
                                    <div class="col-md-8">
                                        <input type="text" name="name" class="form-control" id="inputName" placeholder="Your Name" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail" class="col-md-4 col-form-label">Email :</label>
                                    <div class="col-md-8">
                                        <input type="email"  name="email" class="form-control" id="inputEmail" placeholder="Your Email" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputContact" class="col-md-4 col-form-label">Contact :</label>
                                    <div class="col-md-8">
                                        <input type="text" name="contact" pattern="[0-9]{10}" class="form-control" id="inputContact" placeholder="XX XXXX XXXX" required >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputSubject" class="col-md-4 col-form-label">Subject :</label>
                                    <div class="col-md-8">
                                        <input type="text" name="subject" class="form-control" id="inputSubject" placeholder="Subject" required >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputMessage" class="col-md-4 col-form-label">Message :</label>
                                    <div class="col-md-8">
                                        <textarea type="text" name="message" class="form-control" id="inputMessage" placeholder="Message" required></textarea>
                                    </div>
                                </div>

                                <button type="submit" id="submit" class="w-100 btn btn-primary btn-lg" name="contact_form">Send &nbsp;<span><i class="fa fa-paper-plane" style="font-size: 20pxpx;color:white"></i></span></button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
