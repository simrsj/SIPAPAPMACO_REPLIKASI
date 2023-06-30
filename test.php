<div class="card bg-light text-black shadow m-2">
    <div class="card-body">
        <?php

        // KEY:
        $key = "SIPAPAPMACORSJPROVJABAR";
        $string = "SM";
        $key = "your-secret-key";
        $data = "123abcXYZ";
        $method = "aes-256-cbc";
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($method));
        $encrypted = openssl_encrypt($data, $method, $key, OPENSSL_RAW_DATA, $iv);
        $result = base64_encode($iv . $encrypted);
        echo $result;

        $key = "your-secret-key";
        $encrypted = base64_decode($result);
        $method = "aes-256-cbc";
        $iv_length = openssl_cipher_iv_length($method);
        $iv = substr($encrypted, 0, $iv_length);
        $data = substr($encrypted, $iv_length);
        $decrypted = openssl_decrypt($data, $method, $key, OPENSSL_RAW_DATA, $iv);
        echo $decrypted;

        ?>

    </div>
</div>