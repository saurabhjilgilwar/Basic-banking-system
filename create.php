<br>
<?php 
    $title="Create";
    require_once 'includes/header.php';
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';

?>


    <h1 class="text-center">Create Account</h1>
    <form method="post" action="success.php">
        <div class="mb-3">
            <label for="FullName" class="form-label">Full Name</label>
            <input required type="text" class="form-control" id="FullName" name="FullName">
        </div>
        <div class="mb-3">
            <label for="InputEmail" class="form-label">Email address</label>
            <input required type="email" class="form-control" id="InputEmail" name="InputEmail" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="Gender" class="form-label">Gender</label>
            <input type="text" class="form-control" id="Gender" name="Gender">
        </div>
        
        <div class="mb-3">
            <label for="Balance" class="form-label">Balance</label>
            <input type="text" class="form-control" id="Balance" name="Balance" >
        </div>
        
        <div class="d-grid gap-2 col-6 mx-auto">
            <button class="btn btn-primary" type="submit" name="submit">Submit</button>
        </div>
    </form>
    <br>
    <br>
    <br>

<?php require_once 'includes/footer.php'; ?>
   <br>
   <br>