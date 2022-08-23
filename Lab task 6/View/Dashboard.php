<?php
    session_start();
    if(!isset($_COOKIE['rem'])) {
        header('location: /ProjectDH/Controller/Logout.php');
    }
    
    if(!isset($_SESSION['username'])) {
        header("Location: /ProjectDH/View/login.php");
    }

    $ezl = new mysqli("localhost", "root", "", "online grocery");


    if ($ezl->connect_error) {
        die("db Connection failed: " . $ezl->connect_error);
    }

    $sql1 = "SELECT * FROM seller";
    $sql2 = "SELECT * FROM manager";
    $sql3 = "SELECT * FROM buyer";
    $sql4 = "SELECT * FROM apartment";

    $qry1 = $ezl->query($sql1);
    $qry2 = $ezl->query($sql2);
    $qry3 = $ezl->query($sql3);
    $qry4 = $ezl->query($sql4);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <style>
            td {
                width: 25%;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <?php include('../View/Adminbar.php') ?>

        <fieldset style="width: 50%;">
            <legend><b>Dashboard</b></legend>
            <h3 align='center'>online grocery!</h3>
            <hr>
                <table style="margin-left: auto; margin-right: auto;">
                    <tbody>
                        <tr>
                            <td>Seller</td>
                            <td>Manager</td>
                            <td>Buyer</td>
                            <td>Apartment</td>

                        </tr>
                        <tr>
                            <td><?php echo $qry1->num_rows; ?></td>
                            <td><?php echo $qry2->num_rows; ?></td>
                            <td><?php echo $qry3->num_rows; ?></td>
                            <td><?php echo $qry4->num_rows; ?></td>
                        </tr>
                    </tbody>
                </table>
                <table border="1" style="margin-left: auto; margin-right: auto;">
                    <tbody>
                        <tr>
                            <td rowspan="<?php echo $qry1->num_rows + 1; ?>">Seller</td>
                        </tr>
                        <?php 
                            while($row = $qry1->fetch_assoc()) {
                                echo "<tr><td>" . $row['Name'] . "</tr></td>";
                            }
                            $ezl->close();
                        ?>
                    </tbody>
                </table>
        </fieldset>
        <br>
        <fieldset style="width: 98%;">
            <?php include '../View/Footer.php'; ?>
        </fieldset>
    </body>
</html>