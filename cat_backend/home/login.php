<?php include '../view/header.php'; ?>
 
 <main>
     <h1>
         User Login
     </h1>
     <body>
         Please log in to continue
         <br>
         <!-- username -->
         <form action="." method="post" autocomplete="off">
             <input type="hidden" name="action" value="login">
             <input type="text" name="username">
             <input type="submit" value="Login">
         </form>
         <br>
     </body>
 </main>

<?php include '../view/footer.php'; ?>