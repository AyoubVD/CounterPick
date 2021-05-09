<?php include_once "./components/header.php"?>

<section class="section-default">
                <h2>Reset your password</h2>
               <p>An e-mail will be send to you with instructions on how to reset your password.</p>
               <form action="./includes/reset-request.inc.php" method="post">
               <input type="text" name="email" placeholder="Enter your e-mail address...">
               <button type="submit" name="reset-request-submit">Receive new password by email</button>
               </form>
</section>
                

</div>
        
        <?php include_once "./components/footer.php" ?>
    </div>
</body>
</html>