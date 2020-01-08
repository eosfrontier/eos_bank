<?php
    include('includes/include.php');
    loggedIn();
    $cBank = new bank();
    $sonuren = $cBank->getSonurenById($_SESSION["id"]);
    $aEntries = $cBank->getMutationsById($_SESSION["id"]);

?>
    <?php
        include('includes/inc.header.php');
    ?>
        <div id="main">
            <div class="container">
                <div class="menu">
                    <a class="current" href="user.php">Overview</a>
                    <a href="transfer.php">Transfer sonuren</a>
                </div>

                <div class="current-money">
                    <strong>Current balance: <?php echo $sonuren; ?></strong>
                </div>

                <table id="bankingoverview" width="100%">
                    <thead>
                        <td>
                            Name
                        </td>
                        <td>
                            Description
                        </td>
                        <td>
                            Amount
                        </td>
                    </thead>
                    <?php
                        foreach($aEntries as $aEntry){
                    ?>
                    <tr>
                        <td>
                            <?php echo $cBank->getNameById($aEntry["id_to"])[0]; ?>
                        </td>
                        <td>
                            <?php echo $aEntry["description"] ?>
                        </td>
                        <td>
                            <?php echo $aEntry["amount"] ?>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>
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
