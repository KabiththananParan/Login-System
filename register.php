<?php

    require_once "config.php";

    $username = $password = $confirm_password = "";
    $username_err = $password_err = $confirm_password_err = "";

    if($_SERVER["REQUEST_METHOD"] == 'POST') {

        //Valid username
        if(empty(trim($_POST["username"]))) {
            $username_err = "Please enter a username.";
        }
        elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
            $username_err = "Username can only contain letters, numbers, and underscores.";
        }
        else {
            $sql = "SELECT id FROM users WHERE username = ?";

            if($stmt = $mysqli->prepare($sql)) {
                $stmt->bind_param("s", $param_username);
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <style>
        body {
            font: 14px sans-serif;
        }

        .wrapper {
            width: 360px;
            padding: 20px;
        }
    </style>

</head>
<body>
    
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php $username; ?>" >
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>

        </form>
    </div>



</body>
</html>