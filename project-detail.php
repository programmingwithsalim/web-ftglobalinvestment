<?php include "./includes/head.php" ?>

    <?php include "./includes/navigation.php" ?>
    
    <!--Page Title-->
    <section class="page-title" style="background-image:url(images/background/11.jpg);">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <div class="title-box">
                    <h1>Project Detail</h1>
                    <span class="title">The Interior speak for themselves</span>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="index-2.html">Home</a></li>
                    <li>Project Detail</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <script>
        $(document).ready(function(){
            let id = location.search.split('=')[1]
            fetch(`models/projects.json`)

                .then((data) => data.json())
                .then((projects) => {
                    let project = projects.find(project => project._id == id)

                    $('.project-detail').append(`
                        <div class="auto-container">
                        <!-- Upper Box -->
                        <div class="upper-box">
                            <!--Project Tabs-->
                            <div class="project-tabs tabs-box clearfix">
                                <!--Tab Btns-->
                                <ul class="tab-btns tab-buttons clearfix">
                                    <li data-tab="#tab-1" class="tab-btn"><img src=${project.images[0]} alt=""></li>
                                    <li data-tab="#tab-2" class="tab-btn"><img src=${project.images[1]} alt=""></li>
                                    <li data-tab="#tab-3" class="tab-btn"><img src=${project.images[2]} alt=""></li>
                                </ul>
                                
                                <!--Tabs Container-->
                                <div class="tabs-content">
                                    <!--Tab / Active Tab-->
                                    <div class="tab active-tab" id="tab-1">
                                        <figure class="image"><a href=${project.banner} class="lightbox-image" data-fancybox="images">
                                            <img src=${project.banner} alt=""></a></figure>
                                    </div>

                                    <!--Tab-->
                                    <div class="tab" id="tab-2">
                                        <figure class="image"><a href=${project.images[0]} class="lightbox-image" data-fancybox="images">
                                            <img src=${project.images[0]} alt=""></a></figure>
                                    </div>

                                    <!--Tab-->
                                    <div class="tab" id="tab-3">
                                        <figure class="image"><a href=${project.images[1]} class="lightbox-image" data-fancybox="images">
                                            <img src=${project.images[1]} alt=""></a></figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!--Lower Content-->
                        <div class="lower-content"> 
                            <div class="row clearfix">
                                <!--Content Column-->
                                <div class="content-column col-lg-8 col-md-12 col-sm-12">
                                    <div class="inner-column">
                                        <h2>Project Descripation</h2>
                                        <p>${project.description}</p> 
                                        <h4>Project Challenge</h4>
                                        <p>${project.challenge}</p>
                                        <ul class="list-style-one">
                                            
                                        </ul>
                                        <h4>What We Did</h4>
                                        <p>${project.whatWeDid}</p>
                                        <h4>RESULT</h4>
                                        <p>${project.results}</p>
                                    </div>
                                </div>
                                
                                <!--Info Column-->
                                <div class="info-column col-lg-4 col-md-12 col-sm-12 ">
                                    <div class="inner-column wow fadeInRight">
                                        <h3>Project Information</h3>
                                        <p>${project.projectInformation}</p>
                                        <ul class="info-list">
                                            <li><strong>Client :</strong> ${project.client}</li><br>
                                            <li><strong>Location :</strong> ${project.location}</li><br>
                                            <li><strong>Surface Area :</strong> ${project.surfaceArea}</li><br>
                                            <li><strong>Year Completed :</strong> ${project.yearCompleted}</li><br>
                                            <li><strong>Value :</strong> ${project.value}</li><br>
                                            <li><strong>Architect :</strong> ${project.architects}</li><br>
                                        </ul>

                                        <!--Help Box-->
                                        <div class="help-box-two">
                                            <div class="inner">
                                                <span class="title">Quick Contact</span>
                                                <h2>Get Solution</h2>
                                                <div class="text">Contact us at the Interior office nearest to you or submit a business inquiry online.</div>
                                                <a class="theme-btn btn-style-two" href="contact.html">Contact</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `)
            })
        })
    </script>


    <!--Project Detail Section-->
    <section class="project-details-section">
        <div class="project-detail">
            
        </div>
    </section>
    <!--End Portfolio Details-->

<?php include "./includes/footer.php" ?>