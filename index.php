<?php

    include('includes/include.php');
    $cBank = new bank();
    $aUser = "";

    // Try SSO
    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.eosfrontier.space/orthanc/v2/chars_player/',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'get_logged_in: ',
        'token: am9zaHNwbGF5Z3JvdW5k'
    ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    echo $response;