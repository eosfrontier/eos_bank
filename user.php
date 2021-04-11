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
                    <strong>Current balance: <img src="./images/sonuren.svg" /><?php echo $sonuren; ?></strong>
                </div>
				<?php if(!empty($aEntries)){ ?>
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
                            <?php 
								if( $aEntry->id_to === '99999' ){
									$name = 'System of Central Banks';
								}else{
									if ( $aEntry->id_to === $_SESSION["id"] ) {
										$name = $cBank->getNameById($aEntry->character_id); 
									}
									else {
										$name = $cBank->getNameById($aEntry->id_to); 
									}
								}
								
								echo $name;
							?>
                        </td>
                        <td>
                            <?php echo $aEntry->description ?>
                        </td>
                        <td>
							<img src="./images/sonuren.svg" />
                            <?php 
								if ( $aEntry->id_to !== $_SESSION["id"] ) {
									echo "-";
								}
								echo $aEntry->amount
							?>
                        </td>
                    </tr>
                    <?php
                    }
					
                    ?>
                </table>
				<?php } ?>
            </div>
        </div>
    </div>
    <?php
        include('includes/inc.footer.php');
    ?>
</body>
</html>
