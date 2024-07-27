<!-- Main Footer -->
<footer class="main-footer alternate" style="background-image: url(images/background/5.jpg);">
            <div class="auto-container">
                <!--Widgets Section-->
                <div class="widgets-section">
                    <div class="row">
                        <!--Big Column-->
                        <div class="big-column col-xl-7 col-lg-12 col-md-12 col-sm-12">
                            <div class="row">
                                <!--Footer Column-->
                                <div class="footer-column col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <div class="footer-widget about-widget">
                                        <div class="footer-logo">
                                            <figure>
                                                <a href="index.html"><img src="images/logo.png" alt=""></a>
                                            </figure>
                                        </div>
                                        <div class="widget-content">
                                            <div class="text">The Company and its subsidiary are committed fully in the Construction and supplies Industry, Headquarters in Accra with professionals from various disciplines.</div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!--Footer Column-->
                                <div class="footer-column col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <div class="footer-widget recent-posts">
                                        <h2 class="widget-title">Recent Posts</h2>
                                         <!--Footer Column-->
                                        <div class="widget-content-post-footer">
                                        </div>
                                    </div>
                                </div>         
                            </div>
                        </div>
                        
                        <!--Big Column-->
                        <div class="big-column col-xl-5 col-lg-12 col-md-12 col-sm-12">
                            <div class="row clearfix">
                                <div class="footer-column col-xl-5 col-lg-6 col-md-6 col-sm-12">
                                     <div class="footer-widget links-widget">
                                        <h2 class="widget-title">Useful links</h2>
                                        <div class="widget-content">
                                            <ul class="list">
                                                <li><a href="about.html">About</a></li>
                                                <li><a href="services.html">Services</a></li>
                                                <li><a href="projects.html">Project</a></li>
                                                <li><a href="blog-classic.html">News</a></li>
                                                <li><a href="contact.html">Contact Us</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
    
                                <!--Footer Column-->
                                <div class="footer-column col-xl-7 col-lg-6 col-md-6 col-sm-12">
                                    <div class="footer-widget gallery-widget">
                                        <h2 class="widget-title">Recent Works</h2>
                                        <div class="widget-content">
                                            <div class="outer clearfix">
                                                <figure class="image">
                                                    <a href="images/gallery/1.jpg" class="lightbox-image" title="Image Title Here"><img src="images/resource/work-thumb-1.jpg" alt=""></a>
                                                </figure>
    
                                                <figure class="image">
                                                    <a href="images/gallery/2.jpg" class="lightbox-image" title="Image Title Here"><img src="images/resource/work-thumb-2.jpg" alt=""></a>
                                                </figure>
    
                                                <figure class="image">
                                                    <a href="images/gallery/3.jpg" class="lightbox-image" title="Image Title Here"><img src="images/resource/work-thumb-3.jpg" alt=""></a>
                                                </figure>
    
                                                <figure class="image">
                                                    <a href="images/gallery/4.jpg" class="lightbox-image" title="Image Title Here"><img src="images/resource/work-thumb-4.jpg" alt=""></a>
                                                </figure>
    
                                                <figure class="image">
                                                    <a href="images/gallery/5.jpg" class="lightbox-image" title="Image Title Here"><img src="images/resource/work-thumb-5.jpg" alt=""></a>
                                                </figure>
    
                                                <figure class="image">
                                                    <a href="images/gallery/1.jpg" class="lightbox-image" title="Image Title Here"><img src="images/resource/work-thumb-6.jpg" alt=""></a>
                                                </figure>
                                            </div>
                                        </div>       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!--Footer Bottom-->
            <div class="footer-bottom">
                <div class="auto-container">
                    <div class="inner-container clearfix">
                        <div class="social-links">
                            <ul class="social-icon-two">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
                            </ul>
                        </div>
                        
                        <div class="copyright-text">
                           <a href="https://www.ftglobali.com" target="_blank">FT Global Investment Limited</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Main Footer -->
    
    </div>
    
    
        <div class="scroll-to-top scroll-to-target" onclick="window.scrollTo({ top: 0, behavior: 'smooth' });" data-target="html"><span class="fa fa-arrow-circle-o-up"></span></div>
        <script src="js/jquery.js"></script> 
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.fancybox.js"></script>
        <script src="js/owl.js"></script>
        <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="js/wow.js"></script>
        <script src="js/appear.js"></script>
        <script src="js/mixitup.js"></script>
        <script src="js/color-settings.js"></script>
        <!-- Custom JS -->
        <!-- <script src="js/api.js"></script> -->
        <script src="js/script.js"></script>
        <!-- Color Setting -->
        <script src="./js/custom.js"></script>
        <!--Scroll to top-->
        <script>
            fetch('models/posts.json')
                .then((response) => response.json()) 
                .then((response) => { 

                    let posts = response;
                    for (let post of posts.slice(0, 2)){

                        let [day, month] = post.date.split(' ')
                        $('.widget-content-post-footer').append(
                            `<div class="post">
                                <div class="thumb"><a href="blog-detail">
                                <img src=${post.banner} alt=""></a></div>
                                <h6><a href="blog-detail?pidf=${post._id}">${post.title}</a></h6>
                                <ul class="info">
                                    <li>${day} ${month}</li>
                                    <li>${post.comments.length} comments</li>
                                </ul>
                            </div>
                        `)
                    }
		        })
        </script>
    
    </body>


    <!-- index-527:04-->
    </html>