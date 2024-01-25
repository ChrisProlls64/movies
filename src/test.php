
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico" />
    <title>AnimaScoop</title>
</head>

<body>
    <header id="header" class="wrapper" >
        <div class="logo">
            <a class="login" href="login.php"><img src="assets/images/animascoop_logo.png" alt="logo AnimaScoop"></a>
            
        </div>
        <form method="get" action="search.php">
            <div class="search">
                <label for="site-search" class="search-label"><input type="search" id="site-search" name="search" placeholder="Rechercher un film"></label>
                <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22">
                        <path id="Search" d="M23.733,22.624,17.2,16.1A8.618,8.618,0,1,0,16.1,17.2l6.529,6.529a.785.785,0,1,0,1.11-1.11ZM10.6,17.63A7.035,7.035,0,1,1,17.63,10.6,7.035,7.035,0,0,1,10.6,17.63Z" transform="translate(-1.963 -1.963)" fill="#999" />
                    </svg>
                </button>
            </form>
            
            <a class="logo" href="login.php"><img src="assets/images/user_connexion.png" alt="picto_member">Mon compte </a>
            <a class="logo" href="subscription.php"> - S'insrire </a>
            <a class="logo" href="login.php"><img src="assets/images/mode-sombre.png" alt="mode sombre"></a>
            <a class="logo" href="index.php"> FR </a>
            <a class="logo" href="index.php"> EN </a>
            <a class="logo" href="help.php"><img src="assets/images/help.png" alt="help"></a>

        <nav class="menu">
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="index.php?cat=DernièresSorties">Films</a></li>
                <li><a href="actu.php">Actualités</a></li>
                <li><a href="commu.php?cat=Streets">Communauté</a></li>
                <li><a href="ludotheque.php?cat=Animals">Ludothèque</a></li>
                <li><a href="shop.php?cat=Animals">E-shop</a></li>
            </ul>
        </nav>
    </header>
</body>

</html>