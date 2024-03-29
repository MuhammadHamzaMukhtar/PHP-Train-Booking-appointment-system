<?php $currentPage = "Register"; ?>

<?php require_once('includes/header.php');
require_once('includes/db.php');

if (isset($_POST['register'])) {



  $fname = escape($_POST['fname']);
  $lname = escape($_POST['lname']);
  $username = escape($_POST['username']);
  $email = escape($_POST['email']);
  $dob = escape($_POST['dob']);
  $no = escape($_POST['no']);
  $pass = escape($_POST['pass']);
  $cpass = escape($_POST['cpass']);

  //name validation
  $pattern_n = "/^[a-zA-Z ]{3,12}$/";
  if (!preg_match($pattern_n, $fname)) {
    $errFn = "Must be at lest 3 character long, letter and space allowed";
  }

  //user name validation
  //at lest 3 character, letter, numeber and underscore allowed
  $pattern_un = "/^[a-zA-Z0-9_]{3,16}$/";
  if (!preg_match($pattern_un, $username)) {
    $errUn = "Must be at lest 3 character long, letter, number and underscore allowed";
  } else {
    $query = "SELECT * FROM users WHERE username = '$username'";
    $query_con = mysqli_query($connection, $query);
    if (!$query_con) {
      die("Query Failed" . mysqli_error($connection));
    }
    $count = mysqli_num_rows($query_con);
    if ($count == 1) {
      $errUn = "User already exists, Please choose another";
    }
  }

  //email validation
  $pattern_ue = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/i";
  if (!preg_match($pattern_ue, $email)) {
    $errUe = "Invalid format of email";
  } else {
    $query = "SELECT * FROM users WHERE email = '$email'";
    $query_con = mysqli_query($connection, $query);
    if (!$query_con) {
      die("Query Failed" . mysqli_error($connection));
    }
    $count = mysqli_num_rows($query_con);
    if ($count == 1) {
      $errUe = "Email already exists, Please choose another";
    }
  }

  if ($pass == $cpass) {
    //password validation
    $pattern_up = "/^.*(?=.{4,56})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$/";
    if (!preg_match($pattern_up, $pass)) {
      $errPass = "Must be at lest 4 character long, 1 upper case, 1 lower case letter and 1 number exist";
    }
  } else {
    $errPass = "Password dosen't matched";
  }

  if (!isset($errFn) && !isset($errUn) && !isset($errUe) && !isset($errPass) && !isset($errCaptcha)) {
    $hash = password_hash($pass, PASSWORD_BCRYPT, ['cost' => 10]);
    date_default_timezone_set("asia/karachi");
    $date = date("Y-m-d H:i:s");


    // //Email confirmation
    $mail->addAddress($_POST['email']);
    $token = getToken(32);
    $email = $_POST['email'];
    $expire_date = date("Y-m-d H:i:s", time() + 60);
    $expire_date = base64_encode(urlencode($expire_date));

    // recipient
    $mail->isHTML();
    $mail->Subject = "Verify your email";
    $mail->Body = "
    <h2>Hello! Welcome to Cacti-Succulent Kuching</h2>
    <p> You registered an account on <b>Cacti-Succulent Kuching</b>, before being able to use your account you need to verify that this is your email address </p>
    <a href='http://localhost/Booking-appointment-system-main/LogINOUT/activation.php?eid={$email}&&token={$token}&&exd={$expire_date}' target='_blank'>Click here to verify</a>
    <p>This link is valid for 1 minute</p>
    ";

    if ($mail->send()) {
      $query = "INSERT INTO users (first_name, last_name, username, email, dob, phone_number, password, validation_key, registration_date) VALUES ('$fname', '$lname', '$username', '$email', '$dob', '$no', '$hash', '$token', '$date')";
      $query_conn = mysqli_query($connection, $query);
      if (!$query_conn) {
        die("Query failed" . mysqli_error($connection));
      } else {

        $success = "Check your email for activation link!";
        $_SESSION['toastr'] = array(
          'type'      => 'success',
          'message' => 'Check your email for activation link!',
          'title'     => 'Sign-up Successful!'
        );
        unset($name);
        unset($username);
        unset($email);
      }
    } else {
      $_SESSION['toastr'] = array(
        'type'      => 'error',
        'message' => 'Something Wrong!',
        'title'     => 'Error: Failed Query!'
      );
    }
  }
}


?>

<section class="bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card mt-5 mb-5" style="border-radius: 15px;box-shadow:0 2px 10px;background: whitesmoke;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Create an account</h2>
              <?php echo isset($success) ? "<span class='form-control alert alert-success'>{$success}</span>" : ""; ?>

              <form action="" method="post">

                <div class="form-outline mb-4">
                  <input type="text" id="form3Example1cg" name="fname" class="form-control form-control-lg" maxlength="25" />
                  <label class="form-label" for="form3Example1cg">First Name</label>
                  <div>
                    <?php echo isset($errFn) ? "<span class='text-danger'>{$errFn}</span>" : ""; ?>

                  </div>
                </div>
                <div class="form-outline mb-4">
                  <input type="text" id="form3Example1cg" name="lname" class="form-control form-control-lg" maxlength="25" />
                  <label class="form-label" for="form3Example1cg">Last Name</label>
                  <div>
                    <?php echo isset($errFn) ? "<span class='text-danger'>{$errFn}</span>" : ""; ?>

                  </div>
                </div>

                <div class="form-outline mb-4">
                  <input type="text" id="form3Example1cg" name="username" class="form-control form-control-lg" maxlength="25" />
                  <label class="form-label" for="form3Example1cg">Username</label>
                  <div>
                    <?php echo isset($errUn) ? "<span class='text-danger'>{$errUn}</span>" : ""; ?>

                  </div>
                </div>

                <div class="form-outline mb-4">
                  <input type="email" id="form3Example3cg" name="email" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example3cg">Your Email</label>
                  <div>
                    <?php echo isset($errUe) ? "<span class='text-danger'>{$errUe}</span>" : ""; ?>

                  </div>
                </div>
                <div class="form-outline mb-4">
                  <input type="date" id="form3Example3cg" name="dob" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example3cg">Date of Birth</label>
                  
                </div>
                <div class="form-outline mb-4">
                  <input type="text" pattern="\d*" id="form3Example3cg" maxlength="11" name="no" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example3cg" >Phone Number</label>
                 
                </div>



                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4cg" name="pass" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example4cg">Password</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4cdg" name="cpass" class="form-control form-control-lg" />
                  <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                  <div>
                    <?php echo isset($errPass) ? "<span class='text-danger'>{$errPass}</span>" : ""; ?>
                  </div>
                </div>

            <div class="d-flex justify-content-center">
              <input type="submit" name="register" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" style="margin:0 40px" value="Register">
            </div>

            <p class="text-center text-muted mt-5 mb-1">Have already an account? <a href="login.php" class="fw-bold text-body"><u>Login here</u></a></p>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>

