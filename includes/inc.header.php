<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>System of Central Banks</title>
    <link href="https://fonts.googleapis.com/css?family=Khand:300,400,500,600,700" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="assets/style.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
    <![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <header>
        <div class="container">
            <div id="logo">
                System of Central Banks
            </div>
            <?php if(isset($_SESSION["name"])){ ?>
            <div class="header-right">
                Welcome<br />
                <strong><?php echo $_SESSION["name"]; ?></strong><br />
                <a class="header-logout" href="./logout.php">Log out</a>
            </div>
            <?php } ?>
            <div class="clear"></div>
        </div>

    </header>
