<?php
 require "PHPMailer-master/src/PHPMailer.php"; 
 require "PHPMailer-master/src/SMTP.php"; 
 require 'PHPMailer-master/src/Exception.php'; 
 class mailer{
    function dathangmail($tieude, $noidung, $maildathang){
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);//true:enables exceptions

 try {
     $mail->SMTPDebug = 0; //0,1,2: chế độ debug. khi chạy được thì chỉnh lại 0 
     $mail->isSMTP();  
     $mail->CharSet  = "utf-8";     
     $mail->Host = 'smtp.gmail.com';  //SMTP servers
     $mail->SMTPAuth = true; // Enable authentication
     $mail->Username = 'danghanh16112002@gmail.com'; // SMTP username
     $mail->Password = 'bqwnwmyjryjedvfg';   // SMTP password
     $mail->SMTPSecure = 'ssl';  // mã hoá theo kiểu encryption TLS/SSL
     $mail->Port = 465;  // cổng port to connect to                
     
     $mail->setFrom('danghanh16112002@gmail.com', 'Sun Phone' ); 
     $mail->addAddress($maildathang, 'nttdung'); //mail và tên người nhận  
    //  $mail->addAddress('23a4040022@bav.edu.vn', 'dungba');
     $mail->addCC('danghanh16112002@gmail.com');
     $mail->isHTML(true);  // Set email format to HTML
     $mail->Subject = $tieude;
     $mail->Body = $noidung;
     $mail->smtpConnect( array(
         "ssl" => array(
             "verify_peer" => false,
             "verify_peer_name" => false,
             "allow_self_signed" => true
         )
     ));
     $mail->send();
     echo "<script>alert('Vui lòng kiểm tra email!')</script>";
    } catch (Exception $e) {
        echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
    }
    }
}

class mailer2{
    function dathangmail($tieude, $noidung, $maildathang){
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);//true:enables exceptions

 try {
     $mail->SMTPDebug = 0; //0,1,2: chế độ debug. khi chạy được thì chỉnh lại 0 
     $mail->isSMTP();  
     $mail->CharSet  = "utf-8";     
     $mail->Host = 'smtp.gmail.com';  //SMTP servers
     $mail->SMTPAuth = true; // Enable authentication
     $mail->Username = 'danghanh16112002@gmail.com'; // SMTP username
     $mail->Password = 'bqwnwmyjryjedvfg';   // SMTP password
     $mail->SMTPSecure = 'ssl';  // mã hoá theo kiểu encryption TLS/SSL
     $mail->Port = 465;  // cổng port to connect to                
     
     $mail->setFrom('danghanh16112002@gmail.com', 'Sun Phone' ); 
     $mail->addAddress($maildathang, 'nttdung'); //mail và tên người nhận  
    //  $mail->addAddress('23a4040022@bav.edu.vn', 'dungba');
     $mail->addCC('danghanh16112002@gmail.com');
     $mail->isHTML(true);  // Set email format to HTML
     $mail->Subject = $tieude;
     $mail->Body = $noidung;
     $mail->smtpConnect( array(
         "ssl" => array(
             "verify_peer" => false,
             "verify_peer_name" => false,
             "allow_self_signed" => true
         )
     ));
     $mail->send();
     echo "<script>alert('Vui lòng kiểm tra email!')</script>";
    } catch (Exception $e) {
        echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
    }
    }
}
?>