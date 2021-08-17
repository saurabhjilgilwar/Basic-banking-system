<br>
<?php 
    $title="Success";
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    if(isset($_POST['submit'])){
        //extract value from the $_POST array
        $fname = $_POST["FullName"];
        $email = $_POST["InputEmail"];
        $gender = $_POST["Gender"];
        $balance = $_POST["Balance"];
        //call function to insert and track if success or not
        $isSuccess = $crud->insertUsers($fname, $email, $gender, $balance);
        // $specialtyName = $crud->getSpecialtyById($specialty);

        if ($isSuccess){
            include 'includes/successmessage.php';           
        }
        else{
            include 'includes/errormessage.php';
        }
    }
?>

    <div class="card bg-light text-dark" style="width: 18rem;">
        <div class="card-body">
            <h3 class="card-title">
            <?php echo $_POST["FullName"] ?>
            </h3>
            <h5 class="card-subtitle mb-2 text-muted"><?php echo  $_POST['Gender'];  ?></h5>
            <h6 class="card-text"><?php echo "Email : ".$_POST['InputEmail']."</br>"."Account Balance: ". $_POST['Balance'] ?></h6>
            
        </div>
    </div>
    <br>
    <br>
    <a href="users.php"><button type="button" class="btn btn-outline-primary btn-lg download-button">View Customers</button></a>

    <br>
    <br>
    <br>

<?php require_once 'includes/footer.php'; ?>
   <br>
   <br>