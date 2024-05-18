<?php
// Sabit kullanıcı adı ve şifre
$valid_username = "b231210075@sakarya.edu.tr";
$valid_password = "b231210075";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Kullanıcı adının e-posta formatında olup olmadığını kontrol et
    if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Geçerli bir e-posta adresi giriniz.'); window.location.href = 'giris.html';</script>";
        exit;
    }

    // Kullanıcı adı ve şifreyi kontrol et
    if ($username == $valid_username && $password == $valid_password) {
        // Giriş başarılı, hoşgeldiniz mesajı göster ve anasayfaya yönlendir
        echo "<script>alert('Hoşgeldiniz, $valid_password'); window.location.href = 'anaSayfa.html';</script>";
    } else {
        // Giriş başarısız, hata mesajı göster ve kullanıcıyı iletişim sayfasına geri yönlendir
        echo "<script>alert('Geçersiz kullanıcı adı veya şifre.'); window.location.href = 'giris.html';</script>";
    }
}
?>
