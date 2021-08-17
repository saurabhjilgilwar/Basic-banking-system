
<?php 
    $title="Transfer_To";
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    
?>
<?php
$con = mysqli_connect("127.0.0.1","root","","banking_db") or die(mysqli_error($con));
?>

<?php 
    $transfer_id=$_GET['id'];
    $select = "SELECT * FROM  users where users_id=$transfer_id";
    $select_query=mysqli_query($con,$select);
    $row = mysqli_fetch_assoc($select_query);
    if(isset($_POST['submit']))
    {
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];
    
    $select = "SELECT * from users where users_id=$from";
    $select_query = mysqli_query($con,$select);
    $row1 = mysqli_fetch_array($select_query);
     // returns array or output of user from which the amount is to be transferred.
    
    $receiver = "SELECT * from users where users_id=$to";
    $query = mysqli_query($con,$receiver);
    $row2 = mysqli_fetch_array($query);

    
    // constraint to check input of negative value by user
    if (($amount)<0)
    {
    echo '<script type="text/javascript">';
    echo ' alert("Your request is cancel!!, please enter correct amount, Negative amount is not valid.")'; 
     // showing an alert box.
    echo '</script>';
    }
    // constraint to check insufficient balance.
    else if($amount > $row1['balance']) 
    {
    echo '<script type="text/javascript">';
    echo ' alert("Your transaction is not possible due to Insufficient Balance")';
      // showing an alert box.
    echo '</script>';
    }
    // constraint to check zero values
    else if($amount == 0){
    echo "<script type='text/javascript'>";
    echo "alert('Oops! Zero Amount cannot be transferred')";
    echo "</script>";
    }
    else {
        // deducting amount from sender's account
        $newbalance = $row1['balance'] - $amount;
        $new = "UPDATE users set balance=$newbalance where users_id=$from";
        mysqli_query($con,$new);
        // adding amount to reciever's account
        $newbalance = $row2['balance'] + $amount;
        $new2 = "UPDATE users set balance=$newbalance where users_id=$to";
        mysqli_query($con,$new2);
        $sender = $row1['fname'];
        $receiver = $row2['fname'];
        $insert = "INSERT INTO transfer(`senderName`, `receiverName`, `amount`) VALUES ('$sender','$receiver','$amount')";
        $query=mysqli_query($con,$insert);

        if($query){
            echo "<script> alert('Transaction Successful');
            window.location='history.php';
            </script>";
            
            }
            $newbalance= 0;
            $amount =0;
        }
        }
?>

<div class="container">
<h2 class="text-center" style="margin-top: 30px; "><strong>Transfer Money</strong></h2>
<div class="row">
<form method="POST" name="send">
<table class="table table-hover" style="color: #001E6C; ">
<thead>
<th>#</th>
<th>Name</th>
<th>Email</th>
<th>Balance</th>

</thead>
<tbody>
<tr style="color: #001E6C; ">
<td><?php echo $row['users_id'] ?></td>
<td><?php echo $row['fname'] ?></td>
<td><?php echo $row['email'] ?></td>
<td><?php echo $row['balance'] ?></td>
</tr>
</tbody>
</table>
<br><br>
<label style="color: #001E6C; ">Transfer To:</label>
<select name="to" class="form-control" required>
<option value="" disabled selected>Choose</option>
<?php
$transfer_id=$_GET['id'];
$select = "SELECT * FROM  users where users_id!=$transfer_id ";
$select_query=mysqli_query($con,$select);
while($row = mysqli_fetch_assoc($select_query)) {
?>
<option class="table" value="<?php echo $row['users_id'];?>" >
<?php echo $row['fname'] ;?>
</option>
<?php 
} 
?>
<div>
</select>
<br>
<label style="color: #001E6C; ">Amount:</label>
<input type="number" class="form-control" step="0.01" name="amount" required>   
<br>
<div class="text-center" >
<button class="btn btn-lg btn-success" name="submit" type="submit">Transfer</button>
</form>
</div>
</div>

    <br>
    <br>
    <br>

<?php require_once 'includes/footer.php'; ?>