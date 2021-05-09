<?php

    include('includes/include.php');
    $cBank = new bank();
    $aUser = "";
    require_once 'includes/SSO.php';
	$scan = $logged_in_char->ICC_number;
    if(isset($scan)){
        $aUser = $cBank->login($scan);
        if($aUser != "false" && !empty($aUser)){
            $_SESSION["id"]     = $aUser->characterID;
            $_SESSION["name"]   = $aUser->character_name;
	        $url =  "location: https://www.eosfrontier.space/eos_bank/user.php";
            header($url);
	      }
        } elseif(isset($_POST["scan"])){
            $scan = $_POST["scan"];
        	$aUser = $cBank->login($scan);
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
    }
    <?php
        include('includes/inc.footer.php');
    ?>
    <script>

    </script>
</body>
</html>
