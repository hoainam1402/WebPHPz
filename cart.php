<?php
    // For testing purposes set this to true, if set to true it will use paypal sandbox
    $testmode = true;
    $products_in_cart = isset($_SESSION['carts_item']) ? $_SESSION['carts_item'] : array();
    $paypalurl = $testmode ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr';
    // If the user clicks the PayPal checkout button...
    if (isset($_POST['paypal']) && $products_in_cart && !empty($products_in_cart)) {
        // Variables we need to pass to paypal
        // Make sure you have a business account and set the "business" variable to your paypal business account email
        $data = array(
            'cmd'			=> '_cart',
            'upload'        => '1',
            'lc'			=> 'EN',
            'business' 		=> 'payments@yourwebsite.com',
            'cancel_return'	=> 'https://yourwebsite.com/index.php?page=cart',
            'notify_url'	=> 'https://yourwebsite.com/index.php?page=cart&ipn_listener=paypal',
            'currency_code'	=> 'USD',
            'return'        => 'https://yourwebsite.com/index.php?page=placeorder'
        );
        // Add all the products that are in the shopping cart to the data array variable
        for ($i = 0; $i < count($products); $i++) {
            $data['item_number_' . ($i+1)] = $products[$i]['id'];
            $data['item_name_' . ($i+1)] = $products[$i]['name'];
            $data['quantity_' . ($i+1)] = $products_in_cart[$products[$i]['id']];
            $data['amount_' . ($i+1)] = $products[$i]['price'];
        }
        // Send the user to the paypal checkout screen
        header('location:' . $paypalurl . '?' . http_build_query($data));
        // End the script don't need to execute anything else
        exit;
    }
?>