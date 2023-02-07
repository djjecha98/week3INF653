<?php
require('database.php');


$query = 'SELECT orders.customer_id, order_id, customer_first_name, customer_last_name, customer_address, customer_city, customer_state, customer_zip, customer_phone
FROM `customers`
INNER JOIN `orders` ON customers.customer_id = orders.customer_id
GROUP BY customers.customer_id, order_id, customer_first_name, customer_last_name, customer_address, customer_city, customer_state, customer_zip, customer_phone
ORDER BY customer_id';// PUT YOUR SQL QUERY HERE
// Example: $query = 'SELECT * FROM customers';

$statement = $db->prepare($query);
$statement->execute();
$customers = $statement->fetchAll();
$statement->closeCursor(); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Guitar Shop Customers</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<!-- the body section -->
<body>
    <header><h1>Customer List</h1></header>
    <main>
        <section>
            <?php foreach ($customers as $customer) : ?>
                <p><span class="bold">CustID:</span> <?php echo $customer['customer_id']; ?></p>
                <p><span class="bold">OrderID:</span> <?php echo $customer['order_id']; ?></p>
                <p><span class="bold">FirstName:</span> <?php echo $customer['customer_first_name']; ?></p>
                <p><span class="bold">LastName:</span> <?php echo $customer['customer_last_name']; ?></p>
                <p><span class="bold">Address:</span> <?php echo $customer['customer_address']; ?></p>
                <p><span class="bold">City:</span> <?php echo $customer['customer_city']; ?></p>
                <p><span class="bold">State:</span> <?php echo $customer['customer_state']; ?></p>
                <p><span class="bold">ZipCode:</span> <?php echo $customer['customer_zip']; ?></p>
                <p><span class="bold">Phone:</span> <?php echo $customer['customer_phone']; ?></p>
                <br>
            <?php endforeach; ?>
        </section>
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
    </footer>
</body>
</html>