<?php include '../view/header.php';
require_once('../model/physInv_db.php');
?>
<!DOCTYPE html>
<html>
<!-- the body section -->
<body>
    <main>
        <h1>Update Evidence</h1>
        <form action="." method="post"
              id="edit_phys_evidence">

            <label>Identifier:</label>
            <input type="text" name="identifier" value = <?php echo $identifier;?>><br>

            <label>Description:</label>
            <input type="text" name="description" value = <?php echo $description;?>><br>

            <label>Disposition:</label>
            <input type="text" name="disposition" value = <?php echo $disposition;?>><br>

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