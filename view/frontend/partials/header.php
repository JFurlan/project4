<div class="" id="menu_open">
    <i id="cross_close_menu" class="fas fa-times"></i>
    <ul class="nav navbar-nav">
        <li class="fas fa-home">
            <a href="index.php">Accueil</a>
        </li>
        <li class="fas fa-plane">
            <a href="index.php?action=listPosts">Les chapitres</a>
        </li>
        <li class="fas fa-sign-in-alt">
            <?php if(!isset($_SESSION['login'])) : ?>
                <a href="index.php?action=connect">Connexion</a>
            <?php else : ?>    
                <a href="index.php?action=adminHome">Administration</a>
            <?php endif; ?>        
        </li>
    </ul>
</div>

<div id="main-wrapper">  
    <!-- DÉBUT HEADER -->
    <header id="main-header">
        <nav id="menu" class="navbar">
            <div class="container-fluid">
                <a class="author_name" href="index.php">Jean Forteroche</a>
                <button type="button">
                    <span class="fas fa-bars">Menu</span>
                </button>
            </div>
        </nav>
    </header>
    <!-- FIN HEADER -->