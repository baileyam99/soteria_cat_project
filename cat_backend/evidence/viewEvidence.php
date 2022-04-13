<?php include '../view/header.php'; ?>
<?php
require_once('../model/database.php');
require_once('../model/evidence_db.php');

$codename = filter_input(INPUT_GET, 'codename');
$evList = viewEvidence($codename);
$date = new DateTime();
?>


<!DOCTYPE html>
<html>
<body>
<main>
    <h1><?php echo $codename?> Evidence Log</h1>
    
    <section>
        <table>
            <tr>
                <th>File Name</th>
                <th>Descriptor</th>
                <th>Size</th>
                <th>Date Modified</th>
                <th>Item Hash</th>
                <th>Collector</th>
            </tr>
            <?php foreach ($evList as $evidence) :
                $timestamp = strtotime($evidence['dateModified']);
                $date = $date->setTimestamp($timestamp);
                $mod_date= $date->format('n-j-Y');

                ?>
            <tr>
                <td><?php echo $evidence['fileName']; ?></td>
                <td><?php echo $evidence['descriptor']; ?></td>
                <td><?php echo $evidence['size']; ?></td>
                <td><?php echo $mod_date;?></td>
                <td><?php echo $evidence['itemHash']; ?></td>
                <td><?php echo $evidence['collector']; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="codename" value="<?php echo $codename; ?>">
                    <input type="hidden" name="idNum" value="<?php echo $evidence['idNum']; ?>">
                    <input type="hidden" name="fileName" value="<?php echo $evidence['fileName']; ?>">
                    <input type="hidden" name="descriptor" value="<?php echo $evidence['descriptor']; ?>">
                    <input type="hidden" name="size" value="<?php echo $evidence['size']; ?>">
                    <input type="hidden" name="dateModified" value="<?php echo $evidence['dateModified']; ?>">
                    <input type="hidden" name="itemHash" value="<?php echo $evidence['itemHash']; ?>">
                    <input type="hidden" name="collector" value="<?php echo $evidence['collector']; ?>">
                    <input type="submit" name="action" id ="action" value="Edit">
                </form></td> 
            </tr>
            <?php 
            
            endforeach; ?>            
        </table>
        <form action = "." method="post">
            <input type="hidden" name="codename" value="<?php echo $codename; ?>">
            <input type="submit" name="action" id ="action" value = "Collect Evidence"> 
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