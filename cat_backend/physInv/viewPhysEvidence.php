<?php include '../view/header.php'; ?>
<?php
require_once('../model/database.php');
require_once('../model/physInv_db.php');

$codename = filter_input(INPUT_GET, 'codename');
$evList = viewPhysEvidence($codename);
$date = new DateTime();
?>


<!DOCTYPE html>
<html>
<body>
<main>
    <h1><?php echo $codename?> Physical Inventory</h1>
    
    <section>
        <table>
            <tr>
                <th>Identifier</th>
                <th>Description</th>
                <th>Disposition</th>
                <th>Collector</th>
            </tr>
            <?php foreach ($evList as $evidence) : ?>
            <tr>
                <td><?php echo $evidence['identifier']; ?></td>
                <td><?php echo $evidence['description']; ?></td>
                <td><?php echo $evidence['disposition']; ?></td>
                <td><?php echo $evidence['collector']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="codename" value="<?php echo $codename; ?>">
                    <input type="hidden" name="idNum" value="<?php echo $evidence['idNum']; ?>">
                    <input type="hidden" name="identifier" value="<?php echo $evidence['identifier']; ?>">
                    <input type="hidden" name="description" value="<?php echo $evidence['description']; ?>">
                    <input type="hidden" name="disposition" value="<?php echo $evidence['disposition']; ?>">
                    <input type="hidden" name="collector" value="<?php echo $evidence['collector']; ?>">
                    <input type="submit" name="action" id ="action" value="Edit">
                </form></td> 
            </tr>
            <?php 
            
            endforeach; ?>            
        </table>
        <form action = "." method="post">
            <input type="hidden" name="codename" value="<?php echo $codename; ?>">
            <input type="submit" name="action" id ="action" value = "Intake Physical Evidence"> 
        </form>
        <form action = "." method="post">
            <input type="hidden" name="codename" value="<?php echo $codename; ?>">
            <input type="submit" name="action" id ="action" value = "Return to Details"> 
        </form>
    </section>
</main>    
</body>
</html>
<?php include '../view/footer.php'; ?>