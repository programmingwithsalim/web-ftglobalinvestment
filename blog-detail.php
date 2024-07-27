<?php include "./includes/head.php" ?>

    <?php include "./includes/navigation.php" ?>
    
    <!--Page Title-->
    <section class="page-title" style="background-image:url(images/background/10.jpg);">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <div class="title-box">
                    <h1>News Detail</h1>
                    <span class="title">The Infallible Designs speaks for it self.</span>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="index-2.html">Home</a></li>
                    <li>Blog Detail</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->
    
    <!-- Blog Detail -->
    <div class="blog-detail style-two">
        <script>
            $(document).ready(function(){
                let pid = location.href.split('=')[1]

                fetch(`models/posts.json`)
                    .then((response) => response.json())

                    .then((posts) => {
                        const post = posts.find(post => post._id == pid)
                        console.log(post)
                        const months = [ '', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' ]
                        let [day, month, year] = post.date

                        $('.blog-detail').append(`
                            <div class="inner-container">
                                <!-- News Block -->
                                <div class="news-block-two">
                                    <div class="inner-box">
                                        <div class="image-box">
                                            <figure class="image">
                                                <img src=${post.banner} alt=""></figure>
                                        </div>

                                        <div class="caption-box">
                                            <div class="inner">
                                                <h3>${post.title}</h3>
                                                <ul class="info">
                                                    <li>${day} ${months[month]} ${year},</li>
                                                    <li><a href="blog-detail.html?pid=${post._id}">${post.author},</a></li>
                                                    <li><a href="blog-detail.html?pid=${post._id}">${post.comments.length} Comments,</a></li>
                                                </ul>
                                                <p>${post.paragraphs[0] || " "}</p>
                                                <p>${post.paragraphs[1] || " "}</p>
                                                <blockquote>
                                                    <i class="icon fa fa-quote-left"></i> ${post.paragraphs[2] || " "}
                                                </blockquote>
                                                <div class="tow-column row">
                                                    <div class="image-column col-lg-6 col-md-12 col-sm-12">
                                                        <figure class="image"><img src=${post.images[0] || " "} alt=""></figure>
                                                    </div>
                                                    <div class="text-column col-lg-6 col-md-12 col-sm-12">
                                                        <p>${post.paragraphs[3] || " "}</p>
                                                    </div>
                                                </div>
                                                <p>${post.paragraphs[4] || " "}.</p>
                                                <p>${post.paragraphs[5] || " "}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tags -->
                                <div class="tags clearfix">
                                    <span class="title">Tags:</span>
                                <ul>
                                    <li><a href="#"> ${post.tags[0]}</a></li> 
                                    <li><a href="#"> ${post.tags[1]}</a></li> 
                                    <li><a href="#"> ${post.tags[2]}</a></li> 
                                    <li><a href="#"> ${post.tags[3]}</a></li> 
                                </ul>
                                </div>

                                <!-- Share Option -->
                                <div class="share-option">
                                    <span class="title">Share This:</span>
                                    <ul class="social-icon-colored clearfix">
                                        <li class="facebook"><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                                        <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i>Google Plus</a></li>
                                        <li class="pinterest"><a href="#"><i class="fa fa-pinterest-p"></i>Pinterest</a></li>
                                        <li class="mail"><a href="#"><i class="fa fa-envelope"></i>Mail to Friends</a></li>
                                    </ul>
                                </div>

                                <!-- Comments Area -->
                                <div class="comments-area" data-comment>
                                    <div class="group-title"><h2>Comments (${post.comments.length})</h2></div>
                                    <!-- Comments Goes Here -->
                                </div>

                                    <!--Comment Form-->
                                    <div class="comment-form">
                                        <div class="group-title">
                                            <h2>Leave a Comment</h2>
                                        </div>
                                        <form method="post" class="comment--form"> 
                                            <div class="form-group">
                                                <input type="text" name="username" placeholder="Name" required="">
                                            </div>
                                            
                                            <div class="form-group">
                                                <input type="email" name="email" placeholder="Mail Address" required="">
                                            </div>

                                            <div class="form-group">
                                                <textarea name="message" placeholder="Your Comments"></textarea>
                                            </div>

                                            <div class="alert alert-dismissible fade show" id="feedback-message"> 
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true" data-close></span>
                                                </button>
                                            </div>
                                            
                                            <div class="form-group">
                                                <button class="theme-btn btn-style-one" type="submit" name="submit-form">Post Comment</button>
                                            </div>
                                        </form>
                                    </div>
                            <div>
                        `)

                        let comments = post.comments
                        comments.forEach((comment) => { populateComment(comment) });
                        
                        function populateComment(comment){
                            let commentContainer = document.querySelector('[data-comment]')
                            commentContainer.innerHTML += 
                            `<div class="comment-box" >
                                    <div class="comment">
                                        <div class="author-thumb"><img src="images/resource/user.png" alt=""></div> 
                                        <div class="comment-info">
                                            <div class="name">${comment.name}</div>
                                            <div class="date">${months[month]} ${day}, ${year}</div>
                                        </div>
                                        <div class="text">${comment.comment}</div>
                                            <a href="#" class="reply-btn">Reply</a>
                                        </div>
                                    </div>
                                    <form method="post" class="reply--form">
                                        <div class="form-group">
                                            <input type="text" name="reply" placeholder="Your Reply" required="">
                                        </div>
                                    </form>
                            </div>`

                    // let replies = JSON.stringify(comments.replies)
                    // if (comment.replies){
                    //     let replies = comment.replies
                    //     replies.forEach((reply) => { populateReplies(reply) })

                    //     function populateReplies(reply){
                    //         commentContainer.innerHTML += 
                    //             `<div class="comment-box reply-comment">
                    //                 <div class="comment">
                    //                 <div class="author-thumb"><img src="images/resource/user.png" alt=""></div> 
                    //                 <div class="comment-info">
                    //                     <div class="name">${comment.name}</div>
                    //                     <div class="date">${comment.date}</div>
                    //                 </div>
                    //                 <div class="text">${comment.comment}</div>
                    //                 <a href="#" class="reply-btn">Reply</a>
                    //                 </div>
                    //             </div>`
                    //     }
                    // }
                }
                })
            })
        </script>
        <script>
            $(document).on('submit','.comment--form',function(e){
                e.preventDefault(e)
                let pid = location.href.split('?')[1].split('=')[1]
                let username = $("input[name='username']").val()
                let email = $("input[name='email']").val()
                let message = $("textarea[name='message']").val()
                let feedback = $('.alert')[0]
                
                // axios.post(`/blog/${pid}/comment`, { pid: pid, name: username, email: email, comment: message })
                //     .then((response) => { 
                //         response.status === 200 ? feedback.classList.add('alert-primary') : ''
                //         response.status === 200 ? feedback.innerHTML = 'Comment Added Successfully.' : ''
                //     })
                //     .catch((error) => {
                //         feedback.classList.add('alert-danger')
                //         feedback.innerHTML = 'Something went wrong, Try agin later.'
                //     })
            });
        </script>
    </div>
    <!-- End Blog Detail -->

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



<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-circle-o-up"></span></div>
<script src="js/jquery.js"></script> 
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.fancybox.js"></script>
<script src="js/owl.js"></script>
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/wow.js"></script>
<script src="js/appear.js"></script>
<script src="js/mixitup.js"></script>
<script src="js/api.js"></script>
<script src="js/script.js"></script>
<!-- Color Setting -->
<script src="js/color-settings.js"></script>
</body>

<!-- index-527:04-->
</html>