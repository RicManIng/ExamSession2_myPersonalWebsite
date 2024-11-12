<header>
    <a href="home.php" title='go to home page' class='link-image'><img src="./resources/img/logo-bg.png" alt="mio-logo"></a>
    <nav class="center-nav" id="center-nav">
        <!-- common part of nav bar -->
        <?php foreach($nav_array as $nav): ?>
            <?php if($nav['type'] == 'nav-hamburger-open'): ?>
                <a href="#center-nav" class='hamburger-open'><i class="<?= $nav['icon']; ?>"></i></a>
            <?php elseif($nav['type'] == 'nav-hamburger-close'): ?>
                <a href="#menu" class='hamburger-close'><i class="<?= $nav['icon']; ?>"></i></a>
            <?php endif; ?>
        <?php endforeach; ?>
        <ul class="menu" id="menu">
            <?php if($UserLogged): ?>
                <!-- if user is logged show the full menu -->
                <?php foreach($nav_array as $nav): ?>
                    <?php if($nav['type'] == 'nav' || $nav['type'] == 'nav-signed' && $nav['id'] < 5): ?>
                        <?php if(isset($_GET['selected']) && $_GET['selected'] == $nav['id']): ?>
                            <li><a href="<?php echo $nav['url']; ?>" class="selected"><?php echo $nav['name']; ?></a></li>
                        <?php else: ?>
                            <li><a href="<?php echo $nav['url']; ?>"><?php echo $nav['name']; ?></a></li>
                        <?php endif; ?>    
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <!-- if user is not logged show the short menu -->
                <?php foreach($nav_array as $nav): ?>
                    <?php if($nav['type'] == 'nav' && $nav['id'] < 5): ?>
                        <?php if(isset($_GET['selected']) && $_GET['selected'] == $nav['id']): ?>
                            <li><a href="<?php echo $nav['url']; ?>" class="selected"><?php echo $nav['name']; ?></a></li>
                        <?php else: ?>
                            <li><a href="<?php echo $nav['url']; ?>"><?php echo $nav['name']; ?></a></li>
                        <?php endif; ?> 
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </nav>
    <nav class="right-nav" id="right-nav">
        <!-- insert here the toggle button for light/dark mode -->
        <div class="toggle-container"><div class="toggle"></div></div>
        <ul>
            <?php if($UserLogged): ?>
                <!-- if user is logged show the sign out button -->
                <?php foreach($nav_array as $nav): ?>
                    <?php if($nav['type'] == 'nav' || $nav['type'] == 'nav-signed' && $nav['id'] >= 5): ?>
                        <li><a href="<?php echo $nav['url']; ?>" class="logout"><?php echo $nav['name']; ?></a></li>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <!-- if user is not logged show the registration/login button -->
                <?php foreach($nav_array as $nav): ?>
                    <?php if($nav['type'] == 'nav_to_sign' && $nav['id'] >= 5): ?>
                        <li><a href="<?php echo $nav['url']; ?>" class="<?= ($nav['name'] == 'Login') ? 'login':'signup' ?>"><?php echo $nav['name']; ?></a></li>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </nav>
</header>



<!-- used in old code
                        
            HTML
            <header>
                <a href="#promo" title="vai al video promo" class="home-img"><img src="resources/img/logo-bg.png" alt="Logo Ingegnere Riccardo Mancinelli" id="header-img"></a>
                <div class="center-container" id="center-container">
                    <a href="#center-container" class="apri-hamb">
                        <i class="fas fa-bars fa-2x"></i>
                    </a>
                    <a href="#menu" class="chiudi-hamb">
                        <i class="fa-solid fa-x fa-2x"></i>
                    </a>
                    <ul class="menu" id="menu">
                        <li class="no-drop"><a href="#chi-sono" title="vai alla sezione personale">About</a></li>
                        <li class="no-drop"><a href="#studi" title="vai alla sezione accademica">Studi</a></li>
                        <li class="no-drop"><a href="#esperienze" title="vai alla sezione sulle esperienze lavorative">Esperienze</a></li>
                        <li class="no-drop"><a href="#progetti" title="vai alla sezione sui progetti svolti">Progetti</a></li>
                        <li class="no-drop"><a href="#attività" title="vai alla sezione sulle attività avviate o in corso">Attività</a></li>
                        <li class="no-drop"><a href="#contatti" title="vai alla sezione contatti">Contatti</a></li>
                        <li class="no-drop" id="newsletter-container-menu"><a href="#" title="iscriviti alla mia newsletter" id="newsletter-menu">Iscriviti alla newsletter</a></li>
                    </ul>
                </div>
                <ul class="right-container">
                    <li class="no-drop" id="newsletter-container"><a href="#" title="iscriviti alla mia newsletter" id="newsletter">Iscriviti alla newsletter</a></li>
                    <li>
                        <select id="language" name="language">
                            <option value="it" selected>ita</option>
                            <option value="en">eng</option>
                        </select>
                    </li>
                </ul>
            </header>
            

            CSS
            .center-container .apri-hamb{
                display: flex;
                align-items: center;
            }

            #center-container:target .apri-hamb{
                display: none;
            }

            #center-container:target .chiudi-hamb{
                display: flex;
                align-items: center;
            }

            #center-container:target .menu{
                height: 70vh;
            }
-->
