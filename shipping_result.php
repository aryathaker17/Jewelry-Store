<?php
    //gets data from the form
    $first = filter_input(INPUT_POST, 'first');
    $last = filter_input(INPUT_POST, 'last');
    $address = filter_input(INPUT_POST, 'address');
    $city = filter_input(INPUT_POST, 'city');
    $state = filter_input(INPUT_POST, 'state');
    $zip_code = filter_input(INPUT_POST, 'zip', FILTER_VALIDATE_INT);
    $s_date = filter_input(INPUT_POST, 's_date');
    $order_number = filter_input(INPUT_POST, 'order_number', FILTER_VALIDATE_INT);
    $length = filter_input(INPUT_POST, 'length', FILTER_VALIDATE_INT);
    $height = filter_input(INPUT_POST, 'height', FILTER_VALIDATE_INT);
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_INT);

    //apply currency 
    $price_f = '$' . number_format($price, 2);

    //dimensions calc
    $dimensions = $length * $height

    
?>

<html>
    <head>
        <title>Exquisite Jewelers | Shipping</title>
        <link rel="stylesheet" href="shipping_results.css">
        <link rel="shortcut icon" href="images/Jewl_logo.png">
    </head>
    <header>
        <h1 id="label">Shipping Label</h1>  
    </header>
    <body>
        <main>
        <span id="From"><?php echo "Fulfillment Center", "<br>", " 256 Fifth Avenue<br> New York NY 10153 ";?></span>
        
        <span id="dimensions"><?php echo "Package Dimensions: " . $dimensions ."in"; ?></span>
        <br>
        <br>
        <br>
        <br>
        <label id="ship_to"> Ship To:</label>
        <span id="addy"><?php echo "<br>". $first ." ". $last . "<br>", $address ."<br> ".  $city ."     ". $state ."   ". $zip_code; ?></span>
        <br>
        <br>
        <br>
        <br>
        <hr>
        <div id="class_and_carrier">
            <span><?php  echo "UPS Standard"; ?></span>
            <br>
            <label>Tracking #:</label>
            <span><?php echo " 1Z X37 301 68 9786 9331"; ?></span>
            </div>
        <hr>
        <span> <img src="images/ups_track.GIF"/></span>

        <hr>
        <br>
        <span><h4>Additional Information</h4></span>
        <label>Order Number:</label>
        <span><?php echo $order_number; ?></span>
        <br>
        <label>Ship date</label>
        <span><?php echo $s_date;?></span>
        <br>
        <label>Package Declared Value:</label>
        <span><?php echo " " . $price_f; ?></span>

        </main>

        <footer>
        <p>&copy; <?php echo date('Y'); ?>
        Arya Thaker, 02/17/23, IT202004, Semester Project</p>
    </footer>
    </body>
</html>