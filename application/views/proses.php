<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi reCAPTCHA
    $recaptchaSecretKey = "6Lc9ozooAAAAAOKUIqkzexAy-W_1FnsjAu1AY-9Y"; // Ganti dengan kunci rahasia Anda
    $recaptchaResponse = $_POST["g-recaptcha-response"];

    $url = "https://www.google.com/recaptcha/api/siteverify";
    $data = [
        "secret" => $recaptchaSecretKey,
        "response" => $recaptchaResponse
    ];

    $options = [
        "http" => [
            "header" => "Content-Type: application/x-www-form-urlencoded\r\n",
            "method" => "POST",
            "content" => http_build_query($data)
        ]
    ];

    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);
    $responseKeys = json_decode($response, true);

    if (intval($responseKeys["success"]) !== 1) {
        // reCAPTCHA tidak valid, tampilkan peringatan
        echo "Captcha belum dicentang. Silakan coba lagi ya.";
    } else {
        // reCAPTCHA valid, proses formulir
        // ...kode untuk memproses formulir Anda...
        header('Location: '. base_url(). 'pasien');
        //echo "oke";
    }
}
?>
