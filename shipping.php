<?php

session_start();


    if(!isset($first)){$first = '';};
    if(!isset($last)){$last = '';};
    if(!isset($address)){$address = '';} ;   
    if(!isset($city)){$city = '';};
    if(!isset($zip_code)){$zip_code = '';};
    if(!isset($s_date)){$s_date = '';};
    if(!isset($order_number)){$order_number = '';};
    if(!isset($length)){$length = '';};
    if(!isset($height)){$height = '';};
    if(!isset($price)){$price = '';};

    
?>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Exquisite Jewelers | Shipping</title>
        <link rel="stylesheet" href="jewl_shipping.css">
        <link rel="shortcut icon" href="images/Jewl_logo.png">
    </head>
    <header id="container">
    <img src="images/Jewl_logo.png" alt="logo" class="logo">
    <?php include("header.php") ?>
    </header>
    
    <body>
        <h1 id="shipping_info">Shipping Information</h1>
        <?php if (!empty($error_message)){?><p class="error">
            <?php echo htmlspecialchars($error_message); ?>
        </p>
    <?php } ?>
     
            <form action="shipping_result.php" method="post">
                <label>First name</label>
                <input type="text" name="first" value="<?php echo htmlspecialchars($first);?>" required/>
                
                <br>
                <br>
                
                <label>Last name</label>
                <input type="text" name="last" value="<?php echo htmlspecialchars($last);?>" required/>
               
                <br>
                <br>

                <label>Street Address</label>
                <input type="text" name="address" value="<?php htmlspecialchars($address);?>" required/>
                
                <br>
                <br>

                <label>City</label>
                <input type="text" name="city" value="<?php htmlspecialchars($city); ?>" required/>
                
                <br>
                <br>

                <label>State</label>
                <select name="state" id="state" required>
                    <option value="state select">--Select state--</option>
                    <option value="Alabama">AL</option>
                    <option value="Alaska">AK</option>
                    <option value="Arizona">AZ</option>
                    <option value="Arkansas">AR</option>
                    <option value="California">CA</option>
                    <option value="Colorado">CO</option>
                    <option value="Conneticut">CT</option>
                    <option value="Delaware">DE</option>
                    <option value="District of Columbia">DC</option>
                    <option value="Florida">FL</option>
                    <option value="Georgia">GA</option>
                    <option value="Hawaii">HI</option>
                    <option value="Idaho">ID</option>
                    <option value="Illinois">IL</option>
                    <option value="Iowa">IA</option>
                    <option value="Kansas">KS</option>
                    <option value="Kentucky">KY</option>
                    <option value="Louisiana">LA</option>
                    <option value="Maine">ME</option>
                    <option value="Maryland">MD</option>
                    <option value="Massachusetts">MA</option>
                    <option value="Michigan">MI</option>
                    <option value="Minnesota">MN</option>
                    <option value="Mississippi">MS</option>
                    <option value="Missouri">MO</option>
                    <option value="Montana">MT</option>
                    <option value="Nebraska">NE</option>
                    <option value="Nevada">NV</option>
                    <option value="New Hampshire">NH</option>
                    <option value="New Jersey">NJ</option>
                    <option value="New Mexico">NM</option>
                    <option value="New York">NY</option>
                    <option value="North Carolina">NC</option>
                    <option value="North Dakota">ND</option>
                    <option value="Ohio">OH</option>
                    <option value="Oklahoma">OK</option>
                    <option value="Oregon">OR</option>
                    <option value="Pennsylvania">PA</option>
                    <option value="Rhode Island">RI</option>
                    <option value="South Carolina">SC</option>
                    <option value="South Dakota">SD</option>
                    <option value="Tennessee">TN</option>
                    <option value="Texas">TX</option>
                    <option value="Utah">UT</option>
                    <option value="Vermont">VT</option>
                    <option value="Virginia">VA</option>
                    <option value="Washingoton">WA</option>
                    <option value="West Virginia">WV</option>
                    <option value="Wisconsin">WI</option>
                    <option value="Wyoming">WY</option>
                </select>

                <br>
                <br>

                <label>Zip Code</label>
                <input type="text" name="zip"  placeholder="00000" value="<?php htmlspecialchars($zip_code);?>" required/>

                <br>
                <br>

                <label>Ship Date</label>
                <input type="date" name="s_date" value="<?php htmlspecialchars($s_date);?>" required/>

                <br>
                <br>

                <label>Order Number</label>
                <input type="number" name="order_number" value="<?php htmlspecialchars($order_number);?>" required/>

                <br>
                <br>
 
                    <Label>Package dimensions</Label>
                    <br>
                    <Label>Length</Label>
                    <input type="number" name="length" min="1" max="6" value="<?php htmlspecialchars($length);?>" required/>
                    <br>
                    <label>Height</label>
                    <input type="number" name="height" min="1" max="6" value="<?php htmlspecialchars($height);?>" required/>
                
                <br>
                <br>

                    <label>Decalared Value of Package</label>
                    <input type="number" name="price" min="1" max="100000" value="<?php htmlspecialchars($price);?>" required/>

                <br>
                <br>

                <input type="submit" value="submit">
            </form>

        <br>

        <footer>
        <p>&copy; <?php echo date('Y'); ?>
        Arya Thaker, 02/17/23, IT202004, Semester Project</p>
    </footer>

    </body>
</html>

