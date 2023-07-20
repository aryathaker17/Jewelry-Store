<!DOCTYPE html>
<html lang="en">
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title> Exquisite Jewelers | Home </title>
        <link rel="stylesheet" href="jewl_home.css">
        <link rel="shortcut icon" href="images/Jewl_logo.png">
    </head>
    <body>
        
        <header id="container">
            <img src="images/Jewl_logo.png" alt="logo" width="150" height="150" style="float: left;">
            <?php include("header.php")?>
            <h1 id="Store">Exquisite Jewelers</h1>
            <p id="store_description"> If you're looking for gorgreous jewelery set for your special occassion
                then Exquisite Jewelers is the place for you. Exquisite Jewelers was
                founded in 1904 by James Thaker. He believed that everyone needed to
                have the best weddding day and in order to enjoy it they needed to
                have the most beautiful set of jewlery they world has ever seen. We 
                create handcrafted masterpieces suited for every individuals needs.
                We guarentee to give you the best quaility for the most affordable price.
            </p>

            <h2 id="top_sellers">Top selling Jewlery</h2>
        </header>
        <main id="pics">
            <figure>
                <img id="img1" src="images/GODKI-Super-Luxury-Green-4PCS-indian-Necklace-cubic-Zircon-Jewelry-Sets-For-Women-Wedding-African-Nigerian.jpg_Q90.jpg_.webp" alt="Jewlery set 1" height="300"/>
                <figcaption id="figcap1">Emerald Green Diamond</figcaption>
            </figure>
            <figure>
                <img id="img3" src="images/bridal-jewellery-sets-819x1024.jpg" alt="Jewlery 3" height="300"/>
                <figcaption id="figcap2">Black Diamond Crystals</figcaption>
            </figure>
            <figure>
                <img id="img2" src="images/47f9e8b68db4f8e0069a91d15d6258f9.jpg" alt="Jewlery 2" height="300"/>
                <figcaption id="figcap3">24K white diamond</figcaption>
            </figure>
            <figure>
                <img id="img4" src="images/jewl_1.jpg.webp" alt="Jewlery 4" height="300"/>
                <figcaption id="figcap4">Aqua Crystals</figcaption>
            </figure>
            <span class="stretch"></span>
        </main>

        <footer>
        <p>&copy; <?php echo date('Y'); ?>
        Arya Thaker, 02/17/23, IT202004, Semester Project</p>
    </footer>

    </body>
    
</html>