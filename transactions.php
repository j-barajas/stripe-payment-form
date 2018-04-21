<?php
require_once('config/pdo_db.php');
require_once('lib/pdo_dbh.php');
require_once('models/Transaction.php');

//Instantiate customer
$transaction = new Transaction;

//get customer data from db
$transactions = $transaction->getTransactions();
//print_r($transaction);
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
        <div class="btn-group" role="group">
            <a href="customers.php" class="btn btn-primary">Customers</a>
            <a href="transactions.php" class="btn btn-secondary">Transactions</a>
        </div>
        <hr>
        <h2>Transaction</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer ID</th>
                    <th>Product</th>
                    <th>Amount</th>
                    <th>Currency</th>
                    <th>Status</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transactions as $transaction): ?>
                <tr>
                    <td><?php echo($transaction->id); ?></td>
                    <td><?php echo($transaction->customer_id); ?></td>
                    <td><?php echo($transaction->product); ?></td>
                    <td><?php echo($transaction->amount); ?></td>
                    <td><?php echo($transaction->currency); ?></td>
                    <td><?php echo($transaction->status); ?></td>
                    <td><?php echo($transaction->created_at); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p><a href="index.php">Pay Page</a></p>
    </div>
</body>
</html>