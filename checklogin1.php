<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $con = mysqli_connect('localhost','root','','free');

        $sql = "SELECT * from loginform WHERE email='$email' and password = '$password'";
        $result = $con->query($sql);

        if ($result->num_rows > 0)
        {
            session_start();
            $row = mysqli_fetch_array($result);
            if($row['Post']=="ASI")
            {
                    $_SESSION['email'] = $email;
                    $_SESSION['post'] = "ASI";
                echo '<script>
                window.location="../index.html";
                </script>';

            }
            else if($row['Post']=="SI")
            {
                $_SESSION['email'] = $email;
                $_SESSION['post'] = "SI";
                echo '<script>
                window.location="../si_dash.php";
                </script>';
            }
        }
        else
        {
            $message = "Wrong credentials";
            echo "<script type='text/javascript'>alert('$message');</script>";
            echo '<script>
            window.location="index.html";
            </script>';
        }
    }

 ?>
