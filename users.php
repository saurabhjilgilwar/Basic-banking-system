<br>
<?php 
    $title="Customers";
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    //Get all attendee
    $result = $crud->getUsers();
?>

    <table class="table text-center">
    <thead>
        <tr>
        <th scope="col"><h3>#</h3></th>
        <th scope="col"><h3>Name</h3></th>
        <th scope="col"><h3>Email</h3></th>
        <th scope="col"><h3>Gender</h3></th>  
        <th scope="col"><h3>Balance</h3></th>  
        <th scope="col"><h3>Action</h3></th>  
        </tr>
    </thead>
    <tbody>
        <?php while($r = $result->fetch(PDO::FETCH_ASSOC)){ ?>
            <tr>
                <td><h4 class="user"><?php echo $r["users_id"] ?></h4></td>
                <td><h4 class="user"><?php echo $r["fname"] ?></h4></td>
                <td><h4 class="user"><?php echo $r["email"] ?></h4></td>
                <td><h4 class="user"><?php echo $r["gender"] ?></h4></td>                
                <td><h4 class="user"><?php echo $r["balance"] ?></h4></td>                
                <td>
                    <a href="transaction.php?id=<?php echo $r["users_id"] ?>" class="btn btn-primary">View</a>
                    <a href="transaction.php?id=<?php echo $r["users_id"] ?>" class="btn btn-warning">Transaction</a>
                    
                </td>                
            </tr>
        <?php } ?>
    </tbody>
    </table>  

<br>
    <br>
    <br>

<?php require_once 'includes/footer.php'; ?>
   <br>
   <br>