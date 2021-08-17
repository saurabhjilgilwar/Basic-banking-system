<br>
<?php 
    $title="History";
    require_once 'includes/header.php';
    require_once 'db/conn.php';
    
     $result = $crud->getHistory();
   
?>
<center><a href="users.php"> <button type="button" class="btn btn-outline-primary btn-lg download-button">Check Balance</button></a>
</center><br>
<h1 class="text-center"><strong>History</strong></h1>
<table class="table text-center">
    <thead>
        <tr>
        <th scope="col"><h3>#</h3></th>
        <th scope="col"><h3>Sender</h3></th>
        <th scope="col"><h3>Receiver</h3></th>
        <th scope="col"><h3>Amount</h3></th>
        <th scope="col"><h3>Action</h3></th>   
        </tr>
    </thead>
    <tbody>
        <?php while($r = $result->fetch(PDO::FETCH_ASSOC)){ ?>
            <tr>
                <td><h4 class="user"><?php echo $r["transfer_id"] ?></h4></td>
                <td><h4 class="user"><?php echo $r["senderName"] ?></h4></td>
                <td><h4 class="user"><?php echo $r["receiverName"] ?></h4></td>
                <td><h4 class="user"><?php echo $r["amount"] ?></h4></td>
                <td>
                <a onclick="return confirm('Are you sure want to delete this record..?');" href="delete1.php?id=<?php echo $r["transfer_id"] ?>" class="btn btn-Danger">Delete</a>
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
