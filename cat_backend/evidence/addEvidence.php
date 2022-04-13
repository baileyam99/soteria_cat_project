<?php include '../view/header.php'; 
session_start();
$codename = filter_input(INPUT_GET, 'codename');
?>

<!DOCTYPE html>
<html>
<!-- the body section -->
<body>
    <main>
        <h1>Collect New Evidence</h1>
        <form action="." method="post"
              id="add_product_form">

            <label>File Name:</label>
            <input type="text" name="filename"><br>

            <label>Descriptor:</label>
            <input type="text" name="descriptor"><br>

            <label>Size:</label>
            <input type="text" name="size"><br>
            
            <label>Date Created/Modified:</label>
            <input type="text" name="datemodified"><br>
            
            <label>Item Hash:</label>
            <input type="text" name="itemhash"><br>

            <input type ="hidden" name ="username" value="<?php echo $_SESSION["username"] ?>">
            <input type ="hidden" name ="codename" value=<?php echo $codename; ?>>

            <label>&nbsp;</label>
            <input type="submit" name="action" id="action" value="Add Evidence"><br>
        </form>
        <form action = "." method="post">
            <input type="hidden" name="codename" value="<?php echo $codename; ?>">
            <input type="submit" name="action" id ="action" value = "Return to List"> 
        </form>
    </main>

</body>
</html>

<?php include '../view/footer.php'; ?>