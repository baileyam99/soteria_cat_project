<?php include '../view/header.php';?>
 
 <main> 
 
     <h1>
         Success!
     </h1>
     <body>
         User '<?php echo $_SESSION['userAdd']; ?>' was added successfully.
     </body>
     <p><a href="admin.php">Return to Admin Tools</a></p>
 </main>

<?php include '../view/footer.php'; ?>