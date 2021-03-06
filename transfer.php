<?php
    include('includes/include.php');
    loggedIn();
    $cBank = new bank();
    $sonuren = $cBank->getSonurenById($_SESSION["id"]);
    $arecipients = $cBank->getrecipients();
?>
    <?php
        include('includes/inc.header.php');
    ?>
        <div id="main">
            <div class="container">
                <div class="menu">
                    <a href="user.php">Overview</a>
                    <a class="current" href="transfer.php">Transfer sonuren</a>
                </div>

                <div class="current-money">
                    <strong>Current balance: <?php echo $sonuren; ?></strong>
                </div>
                <div class="transfer-success">
                    Your sonuren have been transferred.<br />&nbsp;<br />

                    Thank you for chosing System of Central Banks.
                </div>
                <form class="transfer-form">
                    <select required="required" name="recipient" class="recepient-select">
                        <option value="" disabled selected>Select a company or person</option>
                        <optgroup label="Companies">
                            <?php
                                foreach($arecipients as $aRecepient){
                                    if($aRecepient->company != 0){
                                        ?>
                                        <option value="<?php echo $aRecepient->characterID; ?>">
                                            <?php echo $aRecepient->character_name; ?>
                                        </option>
                                        <?php
                                    }
                                }
                            ?>
                        </optgroup>
                        <optgroup label="Persons">
                            <?php
                                foreach($arecipients as $aRecepient){
									
                                    if($aRecepient->company == 0){
                                        if(!empty($aRecepient->character_name)){
                                        ?>
                                        <option value="<?php echo $aRecepient->characterID; ?>">
                                            <?php echo $aRecepient->character_name; ?>
                                        </option>
                                        <?php
                                        }
                                    }
                                }
                            ?>
                        </optgroup>
                    </select><br />
                    Amount:<br />
                    <input name="amount" min="0" type="number" required="required" class="amount-input" /><br />
                    Description:<br />
                    <input name="description" maxlength="75" type="text" class="amount-input" /><br />
                    <input name="from" type="hidden" value="<?php echo $_SESSION["id"]; ?>" />
                    <input name="xf" type="hidden" value="transfer" />
                    <input type="submit" value="Transfer" class="submit-input" />

                </form>
            </div>
        </div>
    </div>
    <?php
        include('includes/inc.footer.php');
    ?>
    <script>
    $(document).ready(function() {
        $('.recepient-select').select2();
    });
    </script>
</body>
</html>
