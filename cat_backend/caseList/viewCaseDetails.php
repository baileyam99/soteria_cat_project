<?php include '../view/header.php'; ?>
<?php
session_start();
require('../model/database.php');
require('../model/case_db.php');
$codename= filter_input(INPUT_GET, 'codename');

$query = "SELECT * FROM caselist WHERE codename=:codename";
$statement = $db->prepare($query);
$statement->bindValue(':codename', $codename);
$statement->execute();
$case = $statement->fetch();
$statement->closeCursor();


?>

<!DOCTYPE html>
<html>
<!-- the body section -->
<body>
    <main>
        <h1>Case Details</h1>
        Case: <?php echo $case['codename'];?> <br>


        <label>Client:</label> <?php echo $case['clientName'];?> <br>
        <label>Type: </label> <?php echo $case['caseType'];?> <br>
        <label>Description: </label> <?php echo $case['description'];?> <br>
        <label>Case Lead: </label> <?php echo $case['lead'];?> <br>
        <label>Status: </label> <?php if($case['caseStatus'] == 1){echo "Open";} else{ echo "Closed";}?> <br>
        <label>Date Opened: </label> <?php echo $case['openDate'];?> <br>
        <label>Date Closed: </label> <?php echo $case['closeDate'];?> <br>
        <label>&nbsp;</label>
            
        <form action="." method="post" id="notes">
            <input type ="hidden" id ="codename" name ="codename" value="<?php echo $codename; ?>">
            <input type ="submit" id ="action" name ="action" value ="View Notes">
        </form>
        
        <form action="." method="post" id="evidence">
            <input type ="hidden" id ="codename" name ="codename" value="<?php echo $codename; ?>">
            <input type ="submit" id ="action" name ="action" value ="View Evidence">
        </form>

        <form action="." method="post" id="physInv">
            <input type ="hidden" id ="codename" name ="codename" value="<?php echo $codename; ?>">
            <input type ="submit" id ="action" name ="action" value ="View Physical Inventory">
        </form>
        
        <input type="submit" id = "action" name ="action" value="Edit Case">
        <?php if($_SESSION['admin']){ ?>
        <input type="submit" id = "action" name ="action" value="Close Case"><br>
        <?php } ?>
        <p><a href="caseListView.php">View Case List</a></p>
    </main>

</body>
</html>
<?php include '../view/footer.php'; ?>
