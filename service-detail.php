<?php include "./includes/head.php" ?>

    <?php include "./includes/navigation.php" ?>
    
    <!--Page Title-->
    <section class="page-title" style="background-image:url(images/background/5.jpg);">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <div class="title-box">
                    <h1>Service Detail</h1>
                    <span class="title">The Interior speak for themselves</span>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="index-2.html">Home</a></li>
                    <li>Service Detail</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <script>
        $(document).ready(function(){
            _id = location.search.split('=')[1]
            
            fetch(`models/services.json`)
                .then((response) => response.json())
                .then((services) => {

                    let service = services.find(service => service._id == _id)

                    $('#inner-box').append(
                        `      
                                <h2>${service.title}</h2>
                                <div class="text">
                                    <strong>We Provide Complete Lighting Solution</strong>
                                    <p>${service.description}</p>
                                    <h3>Our Strategy</h3>
                                    <p>${service.strategy}</p>
                                    <div class="two-column row">
                                        <div class="column col-lg-6 col-md-6 col-sm-12">
                                            <h3>Our Key Features</h3>
                                            <ul>
                                                <li>${service.keyFeatures[0]}</li>
                                                <li>${service.keyFeatures[1]}</li>
                                                <li>${service.keyFeatures[2]}</li>
                                                <li>${service.keyFeatures[3]}</li>
                                                <li>${service.keyFeatures[4]}</li>
                                            </ul>
                                        </div>
                                        <div class="column col-lg-6 col-md-6 col-sm-12">
                                            <div class="image">
                                                <img src="images/background/3.jpg" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                    <blockquote>${service.author_quote}<cite>${service.quote}</cite></blockquote>
                                </div>`
                    )

                    $('#content-precau').append(`<p>${service.precautions}</p>`)
                    $('#content-intelli').append(`<p>${service.intelligence}</p>`)
                    $('#content-special').append(`<p>${service.specializations}</p>`)
                })

            // axios.get('/categories').then((response) => {
            //     let categories = response.data;
            //     categories.forEach((category) => {
            //         $('.blog-cat').append(`<li class=""><a href="#">${category.name}</a></li>`)
            //     })
            // })
        })
    </script>

    <!--Sidebar Page Container-->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                <!--Sidebar Side-->
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                    <aside class="sidebar services-sidebar">
                    
                        <!--Blog Category Widget-->
                        <div class="sidebar-widget sidebar-blog-category">
                            <ul class="blog-cat">
                                <!-- Categories Goes Here -->
                            </ul>
                        </div>

                        <!--Brochure-->
                        <div class="sidebar-widget brochure-widget">
                            <h3 class="sidebar-title">Our Sample Works</h3>
                            <div class="brochure-box">
                                <div class="inner">
                                    <span class="icon fa fa-file-pdf-o"></span>
                                    <div class="text">Project-One.pdf</div>
                                </div>
                                <a href="#" class="overlay-link"></a>
                            </div>
                            
                            <div class="brochure-box">
                                <div class="inner">
                                    <span class="icon fa fa-file-word-o"></span>
                                    <div class="text">Project-One.wd</div>
                                </div>
                                <a href="#" class="overlay-link"></a>
                            </div>

                            <div class="brochure-box">
                                <div class="inner">
                                    <span class="icon fa fa-file-powerpoint-o"></span>
                                    <div class="text">Project-One.ppt</div>
                                </div>
                                <a href="#" class="overlay-link"></a>
                            </div>
                            
                        </div>
                    
                        <!--Help Box-->
                        <div class="help-box" style="background-image:url(images/resource/brochure-bg.jpg)">
                            <div class="inner">
                                <span class="title">Quick Contact</span>
                                <h2>Get Solution</h2>
                                <div class="text">Contact us at the Interior office nearest to you or submit a business inquiry online.</div>
                                <a class="theme-btn btn-style-three" href="contact.html">Contact</a>
                            </div>
                        </div>
                    </aside>
                </div>
                
                <!--Content Side-->
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
                    <div class="service-detail">
                        <div id="inner-box" class="inner-box">
                            <div class="image-box">
                                <div class="single-item-carousel owl-carousel owl-theme">
                                    <figure class="image"><img src="images/background/4.jpg" alt="" /></figure>
                                    <figure class="image"><img src="images/background/5.jpg" alt="" /></figure>
                                    <figure class="image"><img src="images/background/13.jpg" alt="" /></figure>
                                </div>
                            </div>
                        </div>
                        
                        <!--Product Info Tabs-->
                        <div class="product-info-tabs">
                            <!--Product Tabs-->
                            <div class="prod-tabs tabs-box">
                                <!--Tab Btns-->
                                <ul class="tab-btns tab-buttons clearfix">
                                    <li data-tab="#prod-details" class="tab-btn active-btn">Precautions</li>
                                    <li data-tab="#prod-spec" class="tab-btn">Intelligence</li>
                                    <li data-tab="#prod-reviews" class="tab-btn">Specializations</li>
                                </ul>
                                
                                <!--Tabs Container-->
                                <div class="tabs-content">
                                    
                                    <!--Tab / Active Tab-->
                                    <div class="tab active-tab" id="prod-details">
                                        <div class="content" id="content-precau">
                                            <p></p>
                                        </div>
                                    </div>
                                    
                                    <!--Tab-->
                                    <div class="tab" id="prod-spec">
                                        <div class="content" id="content-intelli">
                                        </div>
                                    </div>
                                    
                                    <!--Tab-->
                                    <div class="tab" id="prod-reviews" >
                                        <div class="content" id="content-special">
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </div>
                        <!--End Product Info Tabs-->  
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include "./includes/footer.php" ?>