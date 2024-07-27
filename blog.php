<?php include "./includes/head.php" ?>

    <script>
        // $(document).ready(function(){
        //     axios.get('/categories')
        //     .then((response) => {
        //         let categories = response.data
        //         categories.forEach((category) => {
        //             $('.cat-list').append(` <li><a onclick="getPost()">${category.name}<span>${category.blogs.length}</span></a></li>`)
        //         })
        //     })
        // })
    </script>
    <?php include "./includes/navigation.php" ?>
    
    
    <!--Page Title-->
    <section class="page-title" style="background-image:url(images/background/10.jpg);">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <div class="title-box">
                    <h1>News & Articles</h1>
                    <span class="title">The Infallible Designs speaks for it self.
                    </span>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="index.html">Home</a></li>
                    <li>Blogs</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Sidebar Page Container -->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                <!--Content Side-->
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
                    <div class="blog-classic">
                        <!-- Posts Goes Here -->
                    </div>

                    <!--Post Share Options-->
                    <div class="styled-pagination">
                        <ul class="clearfix">
                            <li class="prev-post"><a href="#"><span class="fa fa-long-arrow-left"></span> Prev</a></li>
                            <li class="next-post"><a href="#"><span class="fa fa-long-arrow-right"></span> Next</a></li>
                        </ul>
                    </div>
                </div>

                <!--Sidebar Side-->
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                    <aside class="sidebar default-sidebar">
                        
                        <!--search box-->
                        <div class="sidebar-widget search-box">
                            <form method="post" action="#">
                                <div class="form-group">
                                    <input type="search" name="search-field" value="" placeholder="Search....." required="">
                                    <button type="submit"><span class="icon fa fa-search"></span></button>
                                </div>
                            </form>
                        </div>

                        <!-- Categories -->
                        <div class="sidebar-widget categories">
                            <div class="sidebar-title"><h3>Catagories</h3></div>
                            <ul class="cat-list">
                                <!-- Categories Goes Here -->
                            </ul>
                        </div>

                         <!-- Latest News -->
                        <div class="sidebar-widget latest-news">
                            <div class="sidebar-title"><h3>Recent Post</h3></div>
                            <div class="widget-content-post">
                               <!-- Recent Posts Goes Here -->
                            </div>
                        </div>

                        <!-- Tags -->
                        <div class="sidebar-widget tags">
                        <div class="sidebar-title"><h3>Keywords</h3></div>
                            <ul class="tag-list clearfix">
                                <!-- Tags Goes Here -->
                            </ul>
                        </div>              
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- End Sidebar Container -->

<?php include "./includes/footer.php" ?>