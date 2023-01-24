<div class="card bg-light text-black shadow">
    <div class="card-body">
        <?php

        $nonce = "asdasd";
        $hex = bin2hex(urlencode(base64_encode($nonce)));
        /* add the above $hex as the hidden input */

        /* serverside decode the input*/
        $bin = base64_decode(urldecode(hex2bin($hex)));

        echo $hex . "<br>";
        echo $bin;
        // $message = "data";
        // $additional_data = "-";
        // $nonce = $bin;
        // $key = 1;

        // sodium_crypto_aead_aes256gcm_encrypt(
        //     $message,
        //     $additional_data,
        //     $nonce,
        //     $key
        // );
        ?>
    </div>
</div>