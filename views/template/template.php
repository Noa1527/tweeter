<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="views/resources/whitehibou-32.png" type="image/x-icon">
        <link rel="stylesheet" href="views/resources/style.css">   
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="public/JS/popup.js type='module' defer"></script>
        <?php if (isset($css)) {
            foreach ($css as $value) {
                echo $value;
            }
        } ?>
        <?php if (isset($js)) {
            foreach ($js as $value) {
                echo $value;
            }
        } ?>
        <title>My Tweetos</title>
    </head>
    <body>
       <div id="content " class="container-fluid h-100 bg-black">
           <div class="row h-100">
                <header class="col-3 h-100">
                    <?php include"views/pages/headerUserHome.php" ?>
                </header>
                <main class="col-9 h-100">
                    <?= $content; ?>
                </main>
           </div>   
        </div>
    </body>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>