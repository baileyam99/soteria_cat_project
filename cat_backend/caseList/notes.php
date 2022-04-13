<?php include '../view/header.php'; ?>
<?php
session_start(); 
require_once('../model/database.php');
require_once('../model/case_db.php');

$codename = filter_input(INPUT_GET, "codename");
$notes = getNotes($codename);
$date = new DateTime();

?>

<!DOCTYPE html>
<html>
<body>
<main>
    <h1><?php echo $codename; ?> Case Notes</h1>
    
    <section>
            <table>
            <tr>
            <th>Username </th>
            <th>Date </th>
            <th>Body </th>
            </tr>
        <?php foreach ($notes as $note):
                $timestamp = strtotime($note['submitDate']);
                $date = $date->setTimestamp($timestamp);
                $submit_date= $date->format('F j, Y, g:i a'); ?>
            <tr>
                <td><?php echo $note['username']; ?> </td>
                <td><?php echo $submit_date; ?> </td>
                <td><?php echo $note['body']; ?> </td>
            </tr>
        <?php endforeach; ?>
        </table>
        <form action = '.' method = 'post'> 
        <textarea id="body" name="body" rows="4" cols="50"> </textarea> <br>
        <input type ="hidden" name ="codename" value="<?php echo $codename;?>">
        <input type ="hidden" name ="username" value="<?php echo $_SESSION["username"] ?>">
        <input type="submit" name="action" id="action" value="Add Note"><br>
        </form>

        <form action="." method="post">
                    <input type="hidden" name="codename"
                           value="<?php echo $codename; ?>">
                    <input type="submit" name="action" id ="action" value="Details">
                </form>
       
    </section>
</main>    
</body>
</html>
<?php include '../view/footer.php'; ?>