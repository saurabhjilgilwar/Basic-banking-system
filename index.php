<br>
<?php 
    $title="Index";
    require_once 'includes/header.php';
?>

<!--Title -->
  <!-- Title -->
  <section id="title">
  <div class="row">
      <div class="col-lg-6" style="font-family: 'Montserrat';font-weight:900;" >
        <h1 class="title"><img src="images/logo.png" height="100vh" ><strong> Bank Of India</strong></h1>  
        <br>
        <h1 class="subtitle" style="font-family: 'Montserrat'; font-weight:900; line-height:1.5; font-size: 2rem;"><strong>Get the access of your account now in the comfort of your home.</strong></h1>
        
        <button type="button" class="btn btn-outline-primary btn-lg download-button"><i class="fab fa-apple"></i> Download</button>
        <button type="button" class="btn btn-outline-dark btn-lg download-button"><i class="fab fa-google-play"></i> Download</button>
        <a href="create.php"><button type="button" class="btn btn-outline-primary btn-lg download-button">Create Account</button></a>
    <br>  
    </div>
      <div class="col-lg-6 text-center">
        <img class="title-image" src="images/bank.png" alt="iphone-mockup">
      </div>
    </div>
  </section>

  <!---FEATURES--->
<section id="features">
    <div class="feature-row text-center">
        <div class="feature-col">
            <img src="images/customers1.png">
           <a href="users.php"> <button type="button" class="btn btn-outline-primary btn-lg download-button">Our Customers</button></a>
        </div>
        <div class="feature-col">
            <img src="images/history2 (2).png">
            <a href="history.php"><button type="button" class="btn btn-outline-primary btn-lg download-button">Transaction History</button></a>
        </div>
        <div class="feature-col">
            <img src="images/transfer.png">
            <a href="users.php"><button type="button" class="btn btn-outline-primary btn-lg download-button">Transfer Money</button></a>
        </div>
    </div>
</section>


<br>

<?php require_once 'includes/footer.php'; ?>
   <br>
   <br>