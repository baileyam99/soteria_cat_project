<?php include '../view/header.php'; 
session_start();

$codename = filter_input(INPUT_GET, 'codename');
?>

<!DOCTYPE html>
<html>
<!-- the body section -->
<body>
    <main>
        <h1>Intake Physical Evidence</h1>
        <form action="." method="post"
              id="intake">

            <label>Identifier:</label>
            <input type="text" name="identifier"><br>

            <label>description:</label>
            <input type="text" name="description"><br>

            <label>disposition:</label>
            <input type="text" name="disposition"><br>

            <input type ="hidden" name ="username" value="<?php echo $_SESSION["username"] ?>">
            <input type ="hidden" name ="codename" value=<?php echo $codename; ?>>

            <label>&nbsp;</label>
            <input type="submit" name="action" id="action" value="Add Physical Evidence"><br>
        </form>
        <form action = "." method="post">
            <input type="hidden" name="codename" value="<?php echo $codename; ?>">
            <input type="submit" name="action" id ="action" value = "Return to List"> 
        </form>
    </main>

</body>
</html>

<?php include '../view/footer.php'; ?>