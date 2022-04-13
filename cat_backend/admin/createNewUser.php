<?php include '../view/header.php'; ?>

<main>
    <h1>Create New User</h1>
    <form action="index.php?action=new" method="post"
            id="add_user_form">

        <label>Username:</label>
        <input type="text" name="username" autocomplete="off"><br>

        <label>Admin:</label>
        <select name="admin">
            <option value ="0">No</option>
            <option value ="1">Yes</option>
        </select><br>

        <label> </label>
        <input type="submit" value="Create User" />
        <br>
    </form>
    <p><a href="admin.php">Admin Tools</a></p>
</main>

<?php include '../view/footer.php'; ?>