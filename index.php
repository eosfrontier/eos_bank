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
        'token: am9zaHNwbGF5Z3JvdW5k',
        'Cookie: 5d69be776f972f618357ed7009ea7ccb=rdat517c9lalns11r6p36s16ud; __cfduid=d1c77a2fe7002926d77e24e8b8d0f53d51620571489'
    ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);
    echo $response;