<?php include 'inc/header.php' ?>
<?php 
  $name = $email = $feedback ='';
  $nameErr = $emailErr = $feedbackErr ='';

  //Form Submit
  if(isset($_POST['submit'])){
    // Form validation
    if(empty($_POST['name'])){
      $nameErr = 'Name is required';
    }else{
      $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }
    if(empty($_POST['email'])){
      $emailErr = 'Email is required';
    }else{
      $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    }
    if(empty($_POST['feedback'])){
      $feedbackErr = 'Feedback is required';
    }else{
      $feedback = filter_input(INPUT_POST, 'feedback', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if(empty($nameErr) && empty($emailErr)  && empty($feedbackErr) ){
      $sql = "INSERT INTO feedback(name,email,feedback) VALUES('$name','$email','$feedback')";
      if(mysqli_query($conn, $sql)){
        // Success
        header('Location: feedback.php');
      }else{
        echo 'Error : '. mysqli_error($conn);
      }
    }
  }
?>
    <img src="../feedback/img/logo.png" class="w-25 mb-3" alt="">
    <h2>Feedback</h2>
    <p class="lead text-center">Leave feedback for Traversy Media</p>
    <form action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> method="POST" class="mt-4 w-75">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control <?php echo $nameErr ? "is-invalid" : null; ?>" id="name" name="name" placeholder="Enter your name">
        <div class="invalid-feedback"><?php echo $nameErr; ?></div>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control <?php echo $emailErr ? "is-invalid" : null; ?> " id="email" name="email" placeholder="Enter your email">
        <div class="invalid-feedback"><?php echo $emailErr; ?></div>
      </div>
      <div class="mb-3">
        <label for="feedback" class="form-label">Feedback</label>
        <textarea class="form-control <?php echo $feedbackErr ? 'is-invalid' : null; ?>" id="body" name="feedback" placeholder="Enter your feedback"></textarea>
        <div class="invalid-feedback"><?php echo $feedbackErr; ?></div>
      </div>
      <div class="mb-3">
        <input type="submit" name="submit" value="Send" class="btn btn-dark w-100">
      </div>
    </form>
<?php include 'inc/footer.php'?>
