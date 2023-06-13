<?php
include "config.php";

if (isset($_POST['update'])) {

    $name = $_POST['name'];

    $user_id = $_POST['user_id'];

    $email = $_POST['email'];

    $image = $_POST['image'];

    $password = $_POST['password'];

    $phone = $_POST['phone'];


    $sql = "UPDATE `users` SET `name`='$name',`email`='$email',`password`='$password',`phone`='$phone','image'='$image'WHERE `id`='$user_id'";

    if (isset($dbh)) {
        $result = $dbh>query($sql);
    }

    if ($result == TRUE) {

        echo "Record updated successfully.";

    }else{

        echo "Error:" . $sql . "<br>" . $dbh->error;

    }

}

if (isset($_GET['id'])) {

    $user_id = $_GET['id'];

    $sql = "SELECT * FROM `users` WHERE `id`='$user_id'";

    $result = $dbh->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {

            $name = $row['name'];

            $phone = $row['phone'];

            $email = $row['email'];

            $password  = $row['password'];

            $image = $row['image'];

            $id = $row['id'];

        }

        ?>

        <h2>User Update Form</h2>

        <form action="" method="post">

            <fieldset>

                <legend>Personal information:</legend>

                 name:<br>

                <input type="text" name="firstname" value="<?php echo $name; ?>">

                <input type="hidden" name="user_id" value="<?php echo $id; ?>">

                <br>

                eamil:<br>

                <input type="text" name="lastname" value="<?php echo $email; ?>">

                <br>

                phone:<br>

                <input type="email" name="email" value="<?php echo $phone; ?>">

                <br>

                Password:<br>

                <input type="password" name="password" value="<?php echo $password; ?>">

                <br>

                Gender:<br>
                <input type="image" name="password" value="<?php echo $image; ?>">


                <br><br>

                <input type="submit" value="Update" name="update">

            </fieldset>

        </form>

        </body>

        </html>

        <?php

    } else{

        header('Location: index.php');

    }

}

?>