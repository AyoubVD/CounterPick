<!DOCTYPE html>
<html lang="en">
<head>
    <title>Counter Pick</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="icon" href="./img/logo.png">
    <!--
        Pas de naam aan van JS
        <script src="index.js"></script>
    -->
    <link rel="stylesheet" type="text/css" href="./css/index.css">
    <link rel="stylesheet" type="text/css" href="./css/general.css" >
    <link rel="stylesheet" type="text/css" href="./css/forms.css" >
    
</head>
<body>
    <div id="container">
        <h1 id="title">Create Team</h1>

        <?php include_once "./components/header.php" ?>

        <div id="content">
        <section class="signup-form">
            <h2>Create Team</h2>
            <form action="./includes/createteam.inc.php" method="post">
            <input type="file" id="img" name="img" accept="image/*">
            <br>
            <br>
            <input type="text" name="name" placeholder="Team name">
            <br>
            <br>
            <button type="submit" name="submit">Create Team</button>
            </form>
        </section>
        </div>
        
        <?php include_once "./components/footer.php" ?>
    </div>
</body>
</html>