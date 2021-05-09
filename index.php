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
    if ($response != '0') {
        $aUser = $cBank->login($response['card_id']);
    } else{
        $scan = $_POST["scan"];
        $aUser = $cBank->login($scan);
    }
        if($aUser != "false" && !empty($aUser)){
            $_SESSION["id"]     = $aUser->characterID;
            $_SESSION["name"]   = $aUser->character_name;
            $url =  "location: https://www.eosfrontier.space/eos_bank/user.php";
            header($url);
        }


    }
?>
    <?php
        include('includes/inc.header.php');
    ?>
        <div id="main">
            <div class="container">
                <div class="login">
                    <p class="big">
                        Please scan your ICC-identity badge
                    </p>
                    <form id="login-form" method="post" autocomplete="off">
                        <input name="scan" id="login-input" autofocus />
                        <?php
                            if($aUser == "false"){
                            ?>
                            <br /><strong class="red">No customer found</strong>
                            <?php
                            }
                        ?>
                    </form>

                </div>
                <div class="message-right">
                    <p class="big">Welcome, valued customer.</p>
                    <p>
                        We are proud that you choose us for all your banking business. We strive hard to keep your Sonuren secure. That's why we've included the new security measure that you can only login with your ICC-identity badge.
                    </p>
                    <p>
                        This banking terminal is secured by the latest security measures and keeps getting improved. Do you think you could help us in our efforts to keep your Sonuren more secure and our banking experience more pleasurable? Feel free to contact us.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <?php
        include('includes/inc.footer.php');
    ?>
    <script>

    </script>
</body>
</html>
