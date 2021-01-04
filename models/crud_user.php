<?php
class User
{
    function adduser($email, $mdp, $name, $telephone, $adresse, $grade)
    {
        try {
            include('../config/connect.php');
            $sql = "INSERT INTO `user`( `email`, `mdp`, `name`, `telephone`, `adresse`, `grade`) VALUES ('" . $email . "','" . $mdp . "', '" . $name . "', '" . $telephone . "', '" . $adresse . "', '" . $grade . "')";
            // use exec() because no results are returned
            $conn->exec($sql);
            echo "New record created successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
    function deleteuser($id)
    {
        try {
            include('../config/connect.php');
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // sql to delete a record
            $sql = "DELETE FROM user WHERE id='" . $id . "'";

            // use exec() because no results are returned
            $conn->exec($sql);
            echo "Record deleted successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }
    function list_users()
    {

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "covid19";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM user ";
        $result = $conn->query($sql);
        return $result;
    }
    function list_inf()
    {

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "covid19";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM user where grade='infected'";
        $result = $conn->query($sql);
        return $result;
    }
    function current()
    {

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "covid19";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM user WHERE id= '" . $_SESSION['id'] . "' ";
        $result = $conn->query($sql);
        return $result;
    }
    function count()
    {

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "covid19";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT COUNT(id) FROM user";
        $result = $conn->query($sql);
        $row = $result->fetch_row();
        return $row[0];
    }
    function countin()
    {

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "covid19";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT COUNT(id) FROM user where  grade='infected'";
        $result = $conn->query($sql);
        $row = $result->fetch_row();
        return $row[0];
    }
    function connect($email, $mdp)
    {

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "covid19";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM user WHERE email= '" . $email . "' AND mdp='" . $mdp . "' ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0)
            return "ok";
        else {
            return "no";
        }
    }
}