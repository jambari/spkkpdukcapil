<?php

// Include config file
require_once "config.php";
include('fungsi.php');
// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Silahkan masukan password baru.";
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Password minimal 6 karakter.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Silahkan konfirmasi password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password tidak cocok.";
        }
    }

    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE users SET password = ? WHERE id = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);

            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: login.php");
                exit();
            } else{
                echo "Oops! Terjadi kesalahan. Silahkan coba lahi.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
}

include('header.php');
?>

<br><br><br><br>
  <section class="w3-content" >
        <div class="w3-info">
            <h2>Reset Password</h2>
        </div>

        <p>Silahkan isi formulir berikut untuk mengatur ulang password.</p>
        <form  class="w3-container w3-card w3-padding-16 " action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class=" <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                <label>Password Baru</label>
                <input type="password" name="new_password" class="w3-input" value="<?php echo $new_password; ?>">
                <span class="w3-block"><?php echo $new_password_err; ?></span>
            </div>
            <div class=" <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Konfirmasi Password</label>
                <input type="password" name="confirm_password" class="w3-input">
                <span class="w3-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <p>
                <input type="submit" class="w3-button w3-teal" value="Submit">
                <a class="w3-button w3-red" href="index.php">Batal</a>
            </p>
        </form>
  </section>
<?php include('footer.php'); ?>
