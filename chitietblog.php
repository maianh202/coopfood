<!DOCTYPE html>
<html lang="en">
<?php require("header.php");
$ketnoi = mysqli_connect($servername, $username, $password, $dbname);
// Bước 2: Lấy dữ liệu từ trên đường đẫn
$id_tin=$_GET["id_tin"];
 //Bước 3: Hiển thị các dữ liệu trong bảng tbl_sanpham ra đây
$sql = "
        SELECT * 
        FROM blog 
        WHERE blog_id = ".$id_tin  ;
    
$dulieu = mysqli_query($ketnoi, $sql);
$row = mysqli_fetch_array($dulieu);
?>

<style>
    aside.col-lg-3 div.sidebar, div.widget.widget-text span.social-label h3.title p{
        font-family: roboto;
    }
</style>

<body>
    <div class="page-wrapper">
        <main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/nen.png')">
        		<div class="container">
        			<h1 class="page-title">Bản tin<span>Chi tiết<table></table></span></h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a  style="font-family: roboto" href="index.html">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a  style="font-family: roboto" href="blog-listing.php">Tin tức</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Chi tiết</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                	<div class="row">
                		<div class="col-lg-9">
                            <article class="entry single-entry">
                                <div class="entry-body">
                                    <h2 class="entry-title">
                                        Bản tin công nghệ 
                                    </h2><!-- End .entry-title -->
                                    <article class="entry entry-list">
                                <div class="row align-items-center">
                                </div><!-- End .row -->
                            </article><!-- End .entry -->
                                    <?php
                                    $sql_tin="SELECT * FROM blog where blog_id = ".$id_tin;
                                    $result=$conn->query($sql_tin);
                                    if($result ->num_rows >0)
                                        {
                                            $i=1;
                                            while($row_tin=$result->fetch_assoc())
                                            {
                                            ?>
                            <article class="entry entry-list">
                                <div class="row align-items-center">
                                                
                                    <figure >
                                        <a  style="font-family: roboto" href="#">
                                            <img src="assets/<?php echo $row_tin['bog_image']?>">
                                        </a>
                                    </figure><!-- End .entry-media -->

                                    <div class="entry-body">
                                        <h2 class="entry-title">
                                            <a  style="font-family:roboto" href=""><?php echo $row_tin['blog_name']?></a>
                                        </h2><!-- End .entry-title -->
                                        <div class="entry-content">
                                            <ul>
                                                <li style="font-family:roboto"><?php echo $row_tin['blog_noidungchitiet']?></li>
                                            </ul>                                                                                        
                                        </div><!-- End .entry-content -->
                                    </div><!-- End .entry-body -->
     
                                </div><!-- End .row -->
                            </article><!-- End .entry -->                                          
                                        <?php
                                             $i++;
                                        }
                                    }
                                    ?>

                                    <div class="entry-footer row no-gutters flex-column flex-md-row">

                                        <div class="col-md-auto mt-2 mt-md-0">
                                            <div class="social-icons social-icons-color">
                                                <span style="font-family: roboto" class="social-label">Share this post:</span>
                                                <a style="font-family: roboto" href="#" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                                <a style="font-family: roboto" href="#" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                                <a  style="font-family: roboto" href="#" class="social-icon social-pinterest" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                                <a  style="font-family: roboto" href="#" class="social-icon social-linkedin" title="Linkedin" target="_blank"><i class="icon-linkedin"></i></a>
                                            </div><!-- End .soial-icons -->
                                        </div><!-- End .col-auto -->
                                    </div><!-- End .entry-footer row no-gutters -->
                                </div><!-- End .entry-body -->

                                <div class="entry-author-details">
                                    <figure class="author-media">
                                        <a style="font-family: roboto" href="#">
                                            <img src="assets/images/banners/back.png" alt="User name">
                                        </a>
                                    </figure><!-- End .author-media -->

                                    <div class="author-body">
                                        <div class="author-header row no-gutters flex-column flex-md-row">
                                            <div class="col">
                                                <h4><a  style="font-family: roboto" href="#">Hà Chi</a></h4>
                                            </div><!-- End .col -->
                                            <div class="col-auto mt-1 mt-md-0">
                                                <a  style="font-family: roboto" href="#" class="author-link">View all posts<i class="icon-long-arrow-right"></i></a>
                                            </div><!-- End .col -->
                                        </div><!-- End .row -->

                                        <div class="author-content">
                                            <p>Fan Samsung </p>
                                        </div><!-- End .author-content -->
                                    </div><!-- End .author-body -->
                                </div><!-- End .entry-author-details-->
                            </article><!-- End .entry -->

                            <nav class="pager-nav" aria-label="Page navigation">
                                <a  style="font-family: roboto" class="pager-link pager-link-prev" href="#" aria-label="Previous" tabindex="-1">
                                    Previous Post
                                    <span class="pager-link-title"></span>
                                </a>

                                <a  style="font-family: roboto" class="pager-link pager-link-next" href="#" aria-label="Next" tabindex="-1">
                                    Next Post
                                    <span class="pager-link-title"></span>
                                </a>
                            </nav><!-- End .pager-nav -->

                            <div class="related-posts">
                                <h3  style="font-family: roboto" class="title">Related Posts</h3><!-- End .title -->

                                <div class="owl-carousel owl-simple" data-toggle="owl" 
                                    data-owl-options='{
                                        "nav": false, 
                                        "dots": true,
                                        "margin": 20,
                                        "loop": false,
                                        "responsive": {
                                            "0": {
                                                "items":1
                                            },
                                            "480": {
                                                "items":2
                                            },
                                            "768": {
                                                "items":3
                                            }
                                        }
                                    }'>
                                </div><!-- End .owl-carousel -->
                            </div><!-- End .related-posts -->

                            <div class="comments">
                                <h3  style="font-family: roboto" class="title">3 Comments</h3><!-- End .title -->

                                <ul>
                                    <li>
                                        <div class="comment">
                                            <figure class="comment-media">
                                                <a  style="font-family: roboto" href="#">
                                                    <img src="assets/images/icons/favicon-32x32.png" alt="User name">
                                                </a>
                                            </figure>

                                            <div class="comment-body">
                                                <a  style="font-family: roboto" href="#" class="comment-reply">Reply</a>
                                                <div class="comment-user">
                                                    <h4><a  style="font-family: roboto" href="#">Đặng Hạnh</a></h4>
                                                    <span class="comment-date">November 9, 2022 at 2:19 pm</span>
                                                </div><!-- End .comment-user -->

                                                <div class="comment-content">
                                                    <p>Màn hình SUPER AMOLED là tốt nhất</p>
                                                </div><!-- End .comment-content -->
                                            </div><!-- End .comment-body -->
                                        </div><!-- End .comment -->

                                        <ul>
                                            <li>
                                                <div class="comment">
                                                    <figure class="comment-media">
                                                        <a  style="font-family: roboto" href="#">
                                                            <img src="assets/images/icons/apple-touch-icon.png" alt="User name">
                                                        </a>
                                                    </figure>

                                                    <div class="comment-body">
                                                        <a  style="font-family: roboto" href="#" class="comment-reply">Reply</a>
                                                        <div class="comment-user">
                                                            <h4><a  style="font-family: roboto" href="#">Duyên Nguyễn</a></h4>
                                                            <span class="comment-date">November 11, 2022 at 2:19 pm</span>
                                                        </div><!-- End .comment-user -->

                                                        <div class="comment-content">
                                                            <p>Samsung Galaxy S23 có thông tin mở bán</p>
                                                        </div><!-- End .comment-content -->
                                                    </div><!-- End .comment-body -->
                                                </div><!-- End .comment -->
                                            </li>
                                        </ul>
                                    </li>

                                    <li>
                                        <div class="comment">
                                            <figure class="comment-media">
                                                <a  style="font-family: roboto" href="#">
                                                    <img src="assets/images/banners/tet1.png" alt="User name">
                                                </a>
                                            </figure>

                                            <div class="comment-body">
                                                <a  style="font-family: roboto" href="#" class="comment-reply">Reply</a>
                                                <div class="comment-user">
                                                    <h4><a  style="font-family: roboto" href="#">Mai Anh</a></h4>
                                                    <span class="comment-date">November 16, 2022 at 2:19 pm</span>
                                                </div><!-- End .comment-user -->

                                                <div class="comment-content">
                                                    Cần mua IPHONE 16 ngay lập tức
                                                </div><!-- End .comment-content -->
                                            </div><!-- End .comment-body -->
                                        </div><!-- End .comment -->
                                    </li>
                                </ul>
                            </div><!-- End .comments -->
                            <div class="reply">
                                <div class="heading"  style="font-family: roboto">
                                    <h3 class="title">Trả lời ngay</h3><!-- End .title -->
                                    <p class="title-desc">Email *</p>
                                </div><!-- End .heading -->

                                <form action="#"  style="font-family: roboto">
                                    <label for="reply-message" class="sr-only">Comment</label>
                                    <textarea name="reply-message" id="reply-message" cols="30" rows="4" class="form-control" required placeholder="Comment *"></textarea>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="reply-name" class="sr-only">Name</label>
                                            <input type="text" class="form-control" id="reply-name" name="reply-name" required placeholder="Name *">
                                        </div><!-- End .col-md-6 -->

                                        <div class="col-md-6">
                                            <label for="reply-email" class="sr-only">Email</label>
                                            <input type="email" class="form-control" id="reply-email" name="reply-email" required placeholder="Email *">
                                        </div><!-- End .col-md-6 -->
                                    </div><!-- End .row -->

                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>POST COMMENT</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </form>
                            </div><!-- End .reply -->
                		</div><!-- End .col-lg-9 -->

                		<aside class="col-lg-3">
                			<div class="sidebar">
                				<div class="widget widget-search">
                                    <h3 class="widget-title">Search</h3><!-- End .widget-title -->

                                    <form action="#">
                                        <label for="ws" class="sr-only">Search in blog</label>
                                        <input type="search" class="form-control" name="ws" id="ws" placeholder="Search in blog" required>
                                        <button type="submit" class="btn"><i class="icon-search"></i><span class="sr-only">Search</span></button>
                                    </form>
                				</div><!-- End .widget -->

                                <div class="widget widget-cats">
                                    <h3 class="widget-title" style="color:blue">Danh mục</h3><!-- End .widget-title -->

                                    <ul>
                                        <li><a  style="font-family: roboto" href="#">Công nghệ mới<span>3</span></a></li> 
                                        <li><a  style="font-family: roboto" href="#">Cải tiến<span>3</span></a></li>
                                        <li><a  style="font-family: roboto" href="#">Phụ kiện đi kèm<span>1</span></a></li>
                                        <li><a  style="font-family: roboto" href="#">Edition<span>3</span></a></li>
                                        <li><a  style="font-family: roboto" href="#">Trải nghiệm<span>2</span></a></li>
                                    </ul>
                                </div><!-- End .widget -->

                                <div class="widget">
                                    <h3 class="widget-title" style="color:blue">Bài viết được yêu thích nhất</h3><!-- End .widget-title -->

                                    <ul class="posts-list">
                                        <li>
                                            <figure>
                                                <a  style="font-family: roboto" href="#">
                                                    <img src="assets/images/blog/1.png" alt="post">
                                                </a>
                                            </figure>

                                            <div>
                                                <span>Jan 5, 2023</span>
                                                <h4><a  style="font-family: roboto" href="#">Mới ra mắt</a></h4>
                                            </div>
                                        </li>
                                        <li>
                                            <figure>
                                                <a  style="font-family: roboto" href="#">
                                                    <img src="assets/images/blog/2.png" alt="post">
                                                </a>
                                            </figure>

                                            <div>
                                                <span>Jan 9, 2023</span>
                                                <h4><a  style="font-family: roboto" href="#">Giá rẻ bất ngờ.</a></h4>
                                            </div>
                                        </li>
                                    </ul><!-- End .posts-list -->
                                </div><!-- End .widget -->

                                <div class="widget widget-banner-sidebar">
                                    <div class="banner-sidebar-title" style="color:blue">SAM SUNG GALAXY S23 ULTRA</div><!-- End .ad-title -->
                                    
                                    <div class="banner-sidebar banner-overlay">
                                        <a  style="font-family: roboto" href="#">
                                            <img src="assets/images/blog/2.png" alt="banner">
                                        </a>
                                    </div><!-- End .banner-ad -->
                                </div><!-- End .widget -->

                                <div class="widget">
                                    <h3 class="widget-title" style="color:blue">Tags</h3><!-- End .widget-title -->

                                    <div class="tagcloud">
                                        <a  style="font-family: roboto" href="#">Pin</a>
                                        <a  style="font-family: roboto" href="#">Màn hình</a>
                                        <a  style="font-family: roboto" href="#">Vỏ kim loại</a>
                                        <a  style="font-family: roboto" href="#">ICD</a>
                                        <a  style="font-family: roboto" href="#">Kháng nước</a>
                                        <a  style="font-family: roboto" href="#">Giá rẻ</a>
                                        <a  style="font-family: roboto" href="#">Sành điệu</a>
                                    </div><!-- End .tagcloud -->
                                </div><!-- End .widget -->

                                <div class="widget widget-text">
                                    <h3 class="widget-title" style="color:blue">Bản tin công nghệ</h3><!-- End .widget-title -->

                                    <div class="widget-text-content">
                                        <b>Màn hình OLED <br> Màn hình cong <br> Màn hình gập<br> Vân tay siêu âm<br>Pin vô cực<br></b>
                                    </div><!-- End .widget-text-content -->
                                </div><!-- End .widget -->
                			</div><!-- End .sidebar sidebar-shop -->
                		</aside><!-- End .col-lg-3 -->
                	</div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-close"></i></span>

            <form action="#" method="get" class="mobile-search">
                <label for="mobile-search" class="sr-only">Search</label>
                <input type="search" class="form-control" name="mobile-search" id="mobile-search" placeholder="Search in..." required>
                <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
            </form>
            <div class="social-icons">
                <a  style="font-family: roboto" href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
                <a  style="font-family: roboto" href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
                <a  style="font-family: roboto" href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
                <a  style="font-family: roboto" href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
            </div><!-- End .social-icons -->
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->
    <?php require("footer.php") ?>
</body>
</html>