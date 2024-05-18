<?php

global $resultmessage;
global $errormessage;

// Değişkenleri başlatın
$name = $email = $radio = $radio2 = $message = "";
$errormessage = $resultmessage = "";

// Formun gönderilip gönderilmediğini kontrol edin
if (isset($_POST['submit'])) {
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
    }
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    if (isset($_POST['radio'])) {
        $radio = $_POST['radio'];
    }
    if (isset($_POST['radio2'])) {
        $radio2 = $_POST['radio2'];
    }
    if (isset($_POST['message'])) {
        $message = $_POST['message'];
    }

    // Hata mesajlarını kontrol edin
    if (!$name) {
        $errormessage = "Lütfen İsminizi Yazınız!";
    }

    if (!$email) {
        $errormessage .= "<br>Lütfen Mailinizi Yazınız!";
    }

    if (!$radio) {
        $errormessage .= "<br>Lütfen İşlemimizi Seçiniz!";
    }

    if (!$radio2) {
        $errormessage .= "<br>Lütfen Cinsiyetinizi Seçiniz!";
    }

    if (!$message) {
        $errormessage .= "<br>Lütfen Mesajınızı Giriniz!";
    }

    if ($errormessage) {
        $resultmessage = "Lütfen Aşağıdaki Alanları Doldurunuz.<br>" . $errormessage;
    } else {
        // Başarılı mesaj ve kullanıcı bilgilerini göster
        $resultmessage = "Bilgileriniz başarıyla gönderildi!<br>";
        $resultmessage .= "İsim: $name<br>";
        $resultmessage .= "Email: $email<br>";
        $resultmessage .= "İşlem: $radio<br>";
        $resultmessage .= "Cinsiyet: $radio2<br>";
        $resultmessage .= "Mesaj: $message<br>";
    }

    // Sonuç mesajını ekrana yazdırın ve JavaScript ile yönlendirme yapın
    echo "<div>$resultmessage</div>";
    echo "<script>
            setTimeout(function(){
                window.location.href = 'iletisim.html';
            }, 5000); // 5000 milisaniye = 5 saniye
          </script>";
    exit;
}

// Hata veya başarı mesajını ekrana yazdırın
if ($resultmessage) {
    echo $resultmessage;
} else {
    echo "Merhaba\n";
}

?>
