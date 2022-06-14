<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="views/resources/styleHome.css">
        <link rel="shortcut icon" href="views/resources/whitehibou-32.png" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <?php if (isset($js)) {
            foreach ($js as $value) {
                echo $value;
            }
        } ?>
        <title>Page d'acceuil twitose</title>
    </head>
    <body>
        <div class="container-fluid bg-black" id="contente">
            <div class="row w-100 h-100">
                <div class="col-5 p-0" id="contentCol5">
                    <header>
                        <div class="img">
                            <img class="imageMatrix" src="views/resources/matrix.jpg" alt="matrix"> 
                            <img class="imgHibouHomeBlack" src="views/resources/hibou.svg" alt="un triangle aux trois côtés égaux"  />
                        </div>
                    </header>
                </div>
                <div class="col-7 d-flex align-items-center">
                    <main class="h-100">
                        <div class="container-fluid h-100">
                            <div class="logo">
                                <img class="imgHibouHomeWhite" src="views/resources/hiboux.svg" alt="un triangle aux trois côtés égaux"  />
                            </div>
                                <h1 class="display-1 fw-bold text-white mb-5">Ça se passe maintenant</h1>
                                <P class="display-6 text-white fw-bold mb-3 ">Rejoignez Twittos dès aujourd'hui.</P>
                            <div class="subscription ">
                                <button class="subscription__btn btn btn-primary btn-round"><a class="text-white text-decoration-none" href="index.php?p=formSignOn">S'inscrire avec un numéro de téléphone</a></button>
                            </div>
                            <div class="connexion mt-3">
                                <button class="connexion__btn btn btn-outline-primary"> <a class="text-white text-decoration-none" href="index.php?p=formSignIn"> Se connecter </a></button>
                            </div>
                        </div>
                    </main>
                </div>   
            </div>
        </div>
        
        <footer >
           <nav class="nav-">

           </nav>
        </footer>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>