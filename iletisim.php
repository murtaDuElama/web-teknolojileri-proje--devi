<?php 

global $resultmessage;
global $errormessage;

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $radio=$_POST['radio'];
    $radio2=$_POST['radio2'];
    $message=$_POST['message'];

}

if(!$name){
    $errormessage="Lütfen İsminizi Yazınız!";
}

if(!$email){
    $errormessage.="<br>Lütfen Mailinizi Yazınız!";
}

if(!$radio){
    $errormessage.="<br>Lütfen İşlemimizi Seçiniz!";
}

if(!$radio2){
    $errormessage.="<br>Lütfen Cinsiyetinizi Seçiniz!";
}

if(!$message){
    $errormessage.="<br>Lütfen Mesajınızı Giriniz!";
}

if($errormessage){
    $resultmessage="Lütfen Aşağıdaki Alanları Doldurunuz.".$errormessage;
}

?>