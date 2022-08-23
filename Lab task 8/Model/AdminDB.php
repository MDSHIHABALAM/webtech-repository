<?php 
    require 'Connect.php';

    function update($phone, $email, $address) {
        $ezl = connect();
        $sql = "UPDATE admin SET Contact='$phone', Email='$email', Address='$address' WHERE CompanyName='online grocery'";

        $_SESSION['phone'] = $phone;
        $_SESSION['email'] = $email;
        $_SESSION['address'] = $address;

        $qry = $ezl->query($sql);
        $ezl->close();
    }

    function chng_password($password) {
        $ezl = connect();
        $sql = "UPDATE admin SET Password='$password'";
        $qry = $ezl->query($sql);

        $ezl->close();
    }
    

?>