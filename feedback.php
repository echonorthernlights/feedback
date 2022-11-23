<?php include 'inc/header.php' ?>
<?php 
  $sql = "SELECT * FROM feedback";
  $result = mysqli_query($conn, $sql);
  $feedbacks = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>   
    <h2>Past Feedback</h2>
    <?php if(empty($feedbacks)): ?>
      <p class="lead"> No feedbacks</p>
    <?php endif ?>
    <?php foreach($feedbacks as $feedback): ?>
      <div class="card my-3 w-75">
     <div class="card-body text-center">
     <?php echo $feedback['feedback'] ;?>
     <div class="text-secondary mt-2">
      By <?php echo $feedback['name'] ?> on <?php echo $feedback['created_at'] ?>
     </div>
     </div>
   </div>
    <?php endforeach ?>
   <?php include 'inc/footer.php' ?>