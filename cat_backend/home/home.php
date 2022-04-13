<?php include '../view/header.php'; 
session_start();
?>
<main>
    <h2>Welcome <?php echo $_SESSION["username"] ?>!<h2>
    <nav>
        
    <ul>
        <li><a href="../caseList/index.php?action=view">View Cases</a></li>
        <?php if($_SESSION['admin']){ ?>
        <li><a href="../admin/index.php">Admin Tools</a></li>
        <?php } ?>
        <form action="index.php?action=logout" method="post" id="logout_button">
            <label> </label>
            <input type="submit" value="Logout" />
    </ul>

    
    </nav>
</section>
<?php include '../view/footer.php'; ?>