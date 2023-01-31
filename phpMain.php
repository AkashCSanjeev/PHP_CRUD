<html>

<head>
    <title>Document</title>
</head>

<body>
    <?php

    include('dbconfig.php');

    //! Adding into database
    if (isset($_POST['submit'])) {

        $fruitName = $_POST['fname'];


        $sql = "INSERT INTO `Fruits`(`fname`) VALUES('$fruitName')";
        // save to db and check
        if (mysqli_query($conn, $sql)) {
            // success
            echo "\nadded";
        } else {
            echo 'query error: ' . mysqli_error($conn);
        }

        mysqli_close($conn);
    }

    //! Selecting all from database
    if (isset($_POST['all'])) {
        echo "<br>";
        echo "all";
        echo "<br>";
        $sql = "SELECT * FROM `Fruits`";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {

                echo "\n " . $row["id"] . " - " . $row["fname"] . " ";
                echo "<br>";
            }
        }
    }
    //!Select using Where
    if (isset($_POST['where'])) {
        echo "<br>";
        echo "where " . $_POST['fname'];
        echo "<br>";
        $sql = "SELECT * FROM `Fruits` WHERE fname=\"" . $_POST['fname'] . "\"";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {

                echo "\n " . $row["id"] . " - " . $row["fname"] . " ";
                echo "<br>";
            }
        }
        mysqli_close($conn);
    }


    //! Update
    if (isset($_POST['update'])) {
        echo "<br>";
        echo "update " . $_POST['fname'] . " " . $_POST['frname'];
        echo "<br>";
        $sql = "SELECT * FROM `Fruits` WHERE fname=\"" . $_POST['fname'] . "\"";
        $result = mysqli_query($conn, $sql);
    
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                $sql2 = "UPDATE `fruits` SET `fname` ='" . $_POST['frname'] . "' WHERE `fruits`.`id` = '" . $row["id"] . "'";
                echo "<br>";

                $rs = mysqli_query($conn, $sql2);
                echo $rs;
                /* Check records is updated or not. */
                if ($rs) {
                    echo "Contact Records updated";
                }
            }

        }
        mysqli_close($conn);

    }


    //! Delete
    if (isset($_POST['delete'])) {
        echo "<br>";
        echo "delete " . $_POST['fname'];
        echo "<br>";
        $sql = "SELECT * FROM `Fruits` WHERE fname=\"" . $_POST['fname'] . "\"";
        $result = mysqli_query($conn, $sql);
        // echo mysqli_num_rows($result);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                $sql2 = "DELETE FROM `fruits` WHERE `fruits`.`id` = '" . $row["id"] . "'";
                echo "<br>";

                $rs = mysqli_query($conn, $sql2);
                echo $rs;
                /* Check records is updated or not. */
                if ($rs) {
                    echo "deleted";
                }
            }

        }
        mysqli_close($conn);
    }



    ?>
</body>

</html>