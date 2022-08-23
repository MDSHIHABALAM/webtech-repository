<?php
	require '../Model/BuyerDB.php';

	if(isset($_GET['buyer'])) {
		$name = $_GET['buyer'];
		$result = get($name);
	}

	if ($result->num_rows > 0) {
		echo "<table border='1' align='center'>";
		echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Name</th>";
        echo "<th>Gender</th>";
        echo "<th>Date of Birth</th>";
        echo "<th>Email</th>";
        echo "<th>Phone No</th>";
        echo "<th>Username</th>";
        echo "<th>Action</th>";
		while ($data = $result->fetch_assoc()) {
            echo "</tr>";
	        echo "<tr>";
            echo "<td>" . $data['ID'] . "</td>";
            echo "<td>" . $data['Name'] . "</td>";
            echo "<td>" . $data['Gender'] . "</td>";
            echo "<td>" . $data['DateofBirth'] . "</td>";
            echo "<td>" . $data['Email'] . "</td>";
            echo "<td>" . $data['Contact'] . "</td>";
            echo "<td>" . $data['Username'] . "</td>";
            echo "<td>" . "<a href='/ProjectDH/Controller/DeleteActionBuyer.php?id=" . $data['ID'] . "'>Delete</a></td>";
            echo "</tr>";
	    }
	    echo "</table>";
	}
	else {
		echo "No record(s) found";
	}
?>
