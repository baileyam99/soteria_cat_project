<?php include '../view/header.php';
require_once('../model/evidence_db.php');
?>
<!DOCTYPE html>
<html>
<!-- the body section -->
<body>
    <main>
        <h1>Update Evidence</h1>
        <form action="." method="post"
              id="collect_evidence">

            <label>File Name:</label>
            <input type="text" name="filename" value = <?php echo $fileName;?>><br>

            <label>Descriptor:</label>
            <input type="text" name="descriptor" value = <?php echo $descriptor;?>><br>

            <label>Size:</label>
            <input type="text" name="size" value = <?php echo $size;?>><br>
            
            <label>Date Created/Modified:</label>
            <input type="text" name="datemodified" value = <?php echo $dateModified;?>><br>
            
            <label>Item Hash:</label>
            <input type="text" name="itemhash" value = <?php echo $itemHash;?>><br>

            <input type ="hidden" name ="username" value= "csarlo">
            <input type ="hidden" name ="codename" value= <?php echo $codename; ?>>
            <input type ="hidden" name ="idNum" value= <?php echo $idNum; ?>>

            <label>&nbsp;</label>
            <input type="submit" name="action" id="action" value="Update"><br>
        </form>
        <form action = "." method="post">
            <input type="hidden" name="codename" value=<?php echo $codename; ?>>
            <input type ="hidden" name ="idNum" value= <?php echo $idNum; ?>>
            <input type="submit" name="action" id="action" value="Delete"><br>
        </form>

        <form action = "." method="post">
            <input type="hidden" name="codename" value="<?php echo $codename; ?>">
            <input type="submit" name="action" id ="action" value = "Return to List"> 
        </form>
    </main>

</body>
</html>


<?php include '../view/footer.php'; ?>