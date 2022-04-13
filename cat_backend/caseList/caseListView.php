<?php include '../view/header.php'; ?>
<?php
require_once('../model/database.php');
require_once('../model/case_db.php');

//$cases = view();
$date = new DateTime();
?>

<!DOCTYPE html>
<html>
<body>
<main>
    <h1>Case List</h1>
    
    <section>
        <table>
            <tr>
                <th>Codename</th>
                <th>Client Name</th>
<!--                <th>Case Type</th>-->
                <th>Lead</th>
                <th>Case Status</th>
                <th>Open Date</th>
            </tr>
            <?php foreach ($cases as $case) :
            //if($case['caseStatus']==1){
                $timestamp = strtotime($case['openDate']);
                $date = $date->setTimestamp($timestamp);
                $open_date= $date->format('n-j-Y');
                
//                $timestamp2 = strtotime($case['closeDate']);
//                $date2 = $date2->setTimestamp($timestamp2);
//                $close_date= $date->format('n-j-Y');
                ?>
            <tr>
                <td><?php echo $case['codename']; ?></td>
                <td><?php echo $case['clientName']; ?></td>
                <td><?php echo $case['lead']; ?></td>
                <td><?php if($case['caseStatus'] == 1){echo "Open";} else{ echo "Closed";}?></td>
                <td><?php echo $open_date; ?></td>
                <td><form action="." method="post">
                    <input type="hidden" name="codename"
                           value="<?php echo $case['codename']; ?>">
                    <input type="submit" name="action" id ="action" value="Details">
                </form></td> 
            </tr>
            <?php 
            
            //    } 
            endforeach; ?>            
        </table>
        <a href="new_case_form.php">Open case</a>
    </section>
</main>    
</body>
</html>
<?php include '../view/footer.php'; ?>