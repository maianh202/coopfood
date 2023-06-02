
<?php
require("header.php");
?>
<style>
    body{
        font-family: roboto;
    }
    label{
        color: black;
    }
</style>
    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div style="margin-top: 30px"></div>
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__text">
                        <div class="section-title" >
                            <h2 style="margin-bottom: 150px">Liên hệ <a href="index.php" style="color: #fcb941; font-family: roboto">SunPhone</a></h2>
                            <h4>Một vài thông tin về chúng tôi </h4>
           
                            <p>
                                <h6>Địa chỉ: 
                                    <a href="https://www.google.com/maps/place/12+P.+Ch%C3%B9a+B%E1%BB%99c,+Quang+Trung,+%C4%90%E1%BB%91ng+%C4%90a,+H%C3%A0+N%E1%BB%99i+100000/@21.0089631,105.8281812,17z/data=!3m1!4b1!4m5!3m4!1s0x3135ac801aebee6d:0x49e3a4fa9c35a65c!8m2!3d21.0089631!4d105.8281812" style="font-family: roboto;">
                                    12 Chùa Bộc - Đống Đa - Hà Nội </a>
                                </h6> 
                            </p>
                            
                            <h6>Tư vấn mua hàng (Miễn phí): <strong style="font-size: 15px; color: red;">1800 6601</strong></h6>
                            <h6>Hỗ trợ kỹ thuật: <strong style="font-size: 15px; color: red;">1800 6601</strong></h6>
                            <h6>Góp ý, khiếu nại dịch vụ (8h00 - 22h00): <strong style="font-size: 15px; color: red;">1800 6616</strong></h6>
                            
                        </div>
                    </div>    
                </div>
                <div class="col-lg-6 col-md-5">
                    <div class="contact__form">
                        <form action="xulylienhe.php" id="contact" method="post" >
                            <div class="row" >
                                <div class="col-lg-12">
                                    <label class="col-form-label">Họ và tên</label>                                     
                                    <input type="text" class="form-control" name="HoTen" placeholder="" required="">
                                </div>                                
                                <div class="col-lg-6">
                                    <label class="col-form-label">Số điện thoại</label> 
                                    <input type="text" class="form-control" name="SoDienThoai" placeholder="" required="">
						        </div>
						        <div class="col-lg-6">
							        <label class="col-form-label">E-mail</label> 
							        <input type="email" class="form-control" name="Email" placeholder="" required="">
						        </div>
                                <div class="col-lg-12">
                                    <label class="col-form-label">Tiêu đề</label></label>                                     
                                    <input type="text" class="form-control" name="TieuDe" placeholder="" required="">
                                </div>        
                                <div class="col-lg-12 contact-me animated wow slideInUp form-group">
						            <label class="col-form-label">Nội dung</label>
						            <textarea name="NoiDung" class="form-control" placeholder="" required=""> </textarea>
					            </div>
                                <div class="col-lg-12 contact-form">
						            <input type="submit" value="Gửi">
					            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
    <!-- map -->
    
    <div class="map mt-sm-0 mt-4">
    <iframe style="width: 100%; min-height: 400px; display: inherit;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.60207040284!2d105.82623881476289!3d21.008582486009317!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac8041a9648d%3A0xe487dd495fdfd676!2zMTIgUC4gQ2jDuWEgQuG7mWMsIFRydW5nIExp4buHdCwgxJDhu5FuZyDEkGEsIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1673444966885!5m2!1svi!2s" 
        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
	</div>

    <!-- //map -->   
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.hoverIntent.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/superfish.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/bootstrap-input-spinner.js"></script>
    <script src="assets/js/jquery.plugin.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/jquery.countdown.min.js"></script>
   
    <script src="assets/js/main.js"></script>
    <?php
     require("footer.php");
    ?>