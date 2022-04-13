<?php include '../view/header.php'; ?>
 
<main> 

    <h1>
        Success!
    </h1>
    <body>
        User: [<?php echo $username; ?>] was edited successfully.
        INFO: [USERNAME: <?php echo $username; ?>, ADMIN: <?php echo $admin; ?>]
    </body>
    <p><a href="admin.php">Return to Admin Tools</a></p>
</main>

<?php include '../view/footer.php'; ?>