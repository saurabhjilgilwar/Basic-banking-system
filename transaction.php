<br>
<?php 
    $title="View Record";
    require_once 'includes/header.php';
    
    require_once 'db/conn.php';

    //Get users by id
    if(!isset($_GET['id'])){
        include 'includes/errormessage.php';
        
    }else{
        $id = $_GET['id'];
        $result = $crud->getUserDetails($id);
        $r = $result;

?>
<center>
<div class="card bg-dark text-white" style="width: 18rem;">
        <div class="card-body">
            <h3 class="card-title">
            <?php echo $result["fname"] ?>
            </h3>
            <h5 class="card-subtitle mb-2 text-muted"><?php echo $result['gender'] ?></h5>
            <h6 class="card-text"><?php echo "Email : ". $result['email']."</br>"."Account Balance: ". $result['balance'] ?></h6>
            
        </div>
    </div>
    <br>
    <a href="users.php?id=<?php echo $r["users_id"] ?>" class="btn btn-dark">Cancel</a>
    <a href="transfer_to.php?id=<?php echo $r["users_id"] ?>" class="btn btn-warning">Tranfer To</a>
    <a onclick="return confirm('Are you sure want to delete this record..?');" href="delete.php?id=<?php echo $r["users_id"] ?>" class="btn btn-Danger">Delete</a>
    </center>
<?php } ?>

    <br>
    <br>
    <br>

<?php require_once 'includes/footer.php'; ?>
   <br>
   <br>