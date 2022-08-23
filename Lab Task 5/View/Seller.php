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
        die("Data base Connection failed: " . $ezl->connect_error);
    }

    $sql = "SELECT * FROM seller";
    $qry = $ezl->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller</title>
</head>
<body>
    <?php include('../View/Adminbar.php') ?>
    
    <fieldset style="width: 60%; height: 450px; overflow: scroll;">
        <legend><b>Seller</b></legend>
        <h3 align="center">Seller Information</h3>
        <div align='right'>
            <form action="../Controller/searchseller.php" method="get" onsubmit="seller(this); return false;">
                🔎<input type="text" id="search" name="Search" placeholder="Search Seller">
                <input type="submit" name="submit" value="Search">
            </form>
        </div>
        <br>

        <div id="records" align="center">
            <table border="1" align="center">
                <tbody>
                    <tr>
                        <th>Seller ID</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Date of Birth</th>
                        <th>Email</th>
                        <th>Phone No</th>
                        <th>Username</th>
                        <th colspan="2">Action</th>
                    </tr>
                    <?php 
                        if ($qry->num_rows > 0) {
                            while ($data = $qry->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td> 101-" . $data['ID'] . "</td>";
                                echo "<td><a href='AdminChat.php?id=" . $data['ID'] . "'>" . $data['Name'] . "</a></td>";
                                echo "<td>" . $data['Gender'] . "</td>";
                                echo "<td>" . $data['DateOfBirth'] . "</td>";
                                echo "<td>" . $data['Email'] . "</td>";
                                echo "<td>" . $data['Contact'] . "</td>";
                                echo "<td>" . $data['Username'] . "</td>";
                                echo "<td><a href='/ProjectDH/View/EditSeller.php?id=" . $data['ID'] ."'>Edit</a></td>";  
                                echo "<td><a href='/ProjectDH/Controller/DeleteActionSeller.php?id=" . $data['ID'] ."'>Delete</a></td>";
                                echo "</tr>";
                            }
                        }
                        else {
                            echo "<tr>";
                            echo "<td>--</td>";
                            echo "<td>--</td>";
                            echo "<td>--</td>";
                            echo "<td>--</td>";
                            echo "<td>--</td>";
                            echo "<td>--</td>";
                            echo "<td>--</td>";
                            echo "<td>--</td>";
                            echo "<td>--</td>";
                            echo "</tr>";
                        }
                        $ezl->close();
                    ?>
                </tbody>
            </table>
        </div>
        <p style="text-align: center;"><a href="../View/SellerForm.php">Add a Seller</a> | <a href="/ProjectDH/View/SellerReq.php">Seller Requests</a></p>
    </fieldset>
    <br>
    <fieldset style="width: 98%;">
        <?php include '../View/Footer.php'; ?>
    </fieldset>

    <script>
        function seller(stdnt) {
            let search = stdnt.search.value;
			let resulturl = stdnt.action;

			if(search !== "") {
				let xhttp = new XMLHttpRequest();
				xhttp.onload = function(){
					document.getElementById('records').innerHTML = this.responseText;
				}

				xhttp.open("GET", resulturl + "?seller=" + search);
				xhttp.send();
			}
            else {
                alert('Empty Search!');
            }
        }
    </script>
</body>
</html>