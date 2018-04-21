<?php
require_once('config/pdo_db.php');
require_once('lib/pdo_dbh.php');
require_once('models/Customer.php');

//Instantiate customer
$customer = new Customer;

//get customer data from db
$customers = $customer->getCustomers();
//print_r($customers);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>View Customers</title>
</head>
<body>
    <div class="container mt-4">
        <h2>Customers</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Customer ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customers as $customer): ?>
                <tr>
                    <td><?php echo($customer->id); ?></td>
                    <td><?php echo($customer->first_name." ".$customer->last_name); ?></td>
                    <td><?php echo($customer->email); ?></td>
                    <td><?php echo($customer->created_at); ?></td>
                </tr>
                <tr>
                    
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>