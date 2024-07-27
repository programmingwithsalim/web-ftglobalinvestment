<?php include "./includes/head.php" ?>

    <?php include "./includes/navigation.php" ?>
    
    <!--Page Title-->
    <section class="page-title" style="background-image:url(images/background/4.jpg);">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <div class="title-box">
                    <h1>Faquality Ask Question</h1>
                    <span class="title">The Answers speak for themselves</span>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="index-2.html">Home</a></li>
                    <li>FAQ's</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- FAQ Section -->
    <section class="faq-section"> 
        <div class="auto-container">
            <div class="row">
                <!-- Image Column -->
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="image-box">
                            <figure class="image"><img src="images/resource/faq-img.jpg" alt=""></figure>
                        </div>
                    </div>
                </div>

                <div class="accordion-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="sec-title">
                            <span class="float-text">some FAQ’s</span>
                            <h2>Frequality Asked Questions</h2>
                        </div>
                        <ul class="accordion-box">
                            <!--Block-->
                            <li class="accordion block">
                                <div class="acc-btn">What type of training and certifications do you have?<div class="icon fa fa-plus-square"></div></div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text"></div>
                                    </div>
                                </div>
                            </li>

                            <!--Block-->
                            <li class="accordion block active-block">
                                <div class="acc-btn active">Is your company licensed and/or insured? <div class="icon fa fa-plus-square"></div></div>
                                <div class="acc-content current">
                                    <div class="content">
                                        <div class="text"></div> 
                                    </div>
                                </div>
                            </li>
                            
                            <!--Block-->
                            <li class="accordion block">
                                <div class="acc-btn">How long does a typical construction project take? <div class="icon fa fa-plus-square"></div></div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text"></div> 
                                    </div>
                                </div>
                            </li>

                            <!--Block-->
                            <li class="accordion block">
                                <div class="acc-btn">How do you charge for projects? By the hour, job, etc.?<div class="icon fa fa-plus-square"></div></div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text"></div> 
                                    </div>
                                </div>
                            </li>

                            <!--Block-->
                            <li class="accordion block">
                                <div class="acc-btn">Do you have your own crew or do you hire subcontractors?<div class="icon fa fa-plus-square"></div></div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text"></div> 
                                    </div>
                                </div>
                            </li>

                            <!--Block-->
                            <li class="accordion block">
                                <div class="acc-btn">Who is responsible for getting the necessary permits?<div class="icon fa fa-plus-square"></div></div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text"></div> 
                                    </div>
                                </div>
                            </li>

                            <!--Block-->
                            <li class="accordion block">
                                <div class="acc-btn">Do you offer free in-person estimates?<div class="icon fa fa-plus-square"></div></div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text"></div> 
                                    </div>
                                </div>
                            </li>

                            <!--Block-->
                            <li class="accordion block">
                                <div class="acc-btn">What is your service area?<div class="icon fa fa-plus-square"></div></div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text"></div> 
                                    </div>
                                </div>
                            </li>

                            <!--Block-->
                            <li class="accordion block">
                                <div class="acc-btn">Do you offer any warranties or guarantees on the work you do?<div class="icon fa fa-plus-square"></div></div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text"></div> 
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End FAQ Section -->

    <!-- Faq Form Section -->
    <section class="faq-form-section">
        <div class="auto-container">
            <div class="sec-title">
                <span class="float-text">Have a Question</span>
                <h2>Let us know</h2>
            </div>


            <!-- Faq Form -->
            <div class="faq-form">
                <form method="post" data-contactForm>
                    <div class="row">
                        <div class="form-group col-lg-6 col-md-12">
                            <input type="text" data-name name="username" placeholder="Name" required>
                        </div>

                        <div class="form-group col-lg-6 col-md-12">
                            <input type="text" data-phone name="phone" placeholder="Phone" required>
                        </div>

                        <div class="form-group col-lg-6 col-md-12">
                            <input type="text" data-company name="company" placeholder="Company" required>
                        </div>
                        
                        <div class="form-group col-lg-6 col-md-12">
                            <input type="email" data-email name="email" placeholder="Email" required>
                        </div>

                        <div class="form-group col-lg-12 col-md-12">
                            <textarea  data-message name="message" placeholder="Massage"></textarea>
                        </div>
                        
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="alert alert-dismissible fade show" id="feedback-message"> 
                                <i id="feedback-icon" class="bi"></i>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true" data-close></span>
                                </button>
                            </div>
                        </div>

                        <div class="form-group col-lg-12 col-md-12">
                            <button class="theme-btn btn-style-three" data-submit type="submit" name="submit-form">Submit</button>
                        </div> 
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--End Contact Section -->

<?php include "./includes/footer.php" ?>