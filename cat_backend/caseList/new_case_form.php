<?php include '../view/header.php'; ?>
<?php
require('../model/database.php');
$query = "SELECT caseType FROM casetypes";
$statement = $db->prepare($query);
$statement->execute();
$caseTypes = $statement->fetchAll();
$statement->closeCursor();

$query2 = "SELECT username FROM users";
$statement2 = $db->prepare($query2);
$statement2->execute();
$users = $statement2->fetchAll();
$statement2->closeCursor();
?>
<!DOCTYPE html>
<html>
<!-- the body section -->
<body>
    <main>
        <h1>Open New Case</h1>
        <form action="." method="post"
              id="add_product_form">

            <label>Codename:</label>
            <input type="text" name="codename"><br>

            <label>Client Name:</label>
            <input type="text" name="clientname"><br>

            <label>Case Type:</label>
            <select name="casetype">
            <?php foreach($caseTypes as $caseType): ?>
                <option value ="<?php echo $caseType['caseType'];?>"> <?php echo $caseType['caseType'];?> </option>
            <?php endforeach; ?></select><br>
            
            <label>Case Lead:</label>
            <select name="lead">
            <?php foreach($users as $user): ?>
                <option value ="<?php echo $user['username'];?>"> <?php echo $user['username'];?> </option>
            <?php endforeach; ?></select><br>
            
            <label>Description: </label>
            <textarea id="description" name="description" rows="4" cols="50"> </textarea> <br><br>

            <label>&nbsp;</label>
            <input type="submit" name="action" id="action" value="Open Case"><br>
        </form>
        <p><a href="caseListView.php">View Case List</a></p>
    </main>

</body>
</html>

<?php include '../view/footer.php'; ?>