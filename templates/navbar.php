<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3 sticky-top">
    <?php if (LoggedIn::isLoggedIn()) { ?> <?php } else { ?><a class="navbar-brand" href="/">CV Profile</a><?php } ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <!--User is Logged In-->
            <?php if (LoggedIn::isLoggedIn()) { ?>
                <li class="nav-item">
                    <form method="post" action="/logout">
                        <button class="btn btn-danger m-3">Kijelentkezés</button>
                    </form>
                </li>
                <?php if (isset($params["personal"])) { ?>
                    <p class="mt-3">
                        <?php foreach ($params["personal"] as $param) { ?>
                     <h3 class="display-6 mt-2 text-white">🚀Hello <?php echo $param["teljes_nev"];} ?>!</h3>
                   </p>
                <?php } else { ?>
                    <div></div>
                <?php } ?>
                <!--User is not Logged In-->
            <?php } else { ?>
                <li class="nav-item active">
                    <a class="nav-link" href="/">Főoldal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/login">Bejelentkezés</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/signup">Regisztráció</a>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>