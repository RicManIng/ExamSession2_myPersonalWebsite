<header>
    <a href="index.php" title='go to home page' class='link-image'><img src="./resources/img/logo-bg.png" alt="mio-logo"></a>
    <nav class="center-nav" id="center-nav">
        <!-- common part of nav bar -->
        <!-- in phone viewport show the hamburger icon to access to nav bar -->
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
                    <?php if(($nav['type'] == 'nav' || $nav['type'] == 'nav-signed') && $nav['id'] < 5): ?>
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
        <!-- This toggle button is currently not working; its functionality will be introduced later with the use of JavaScript.  -->
        <!-- <div class="toggle-container" id="toggle">
            <a href="#toggle" class="toggle-link open">
                <div class="toggle"></div>
            </a>
            <a href="#" class="toggle-link close">
                <div class="toggle"></div>
            </a>
        </div> -->
        <?php foreach($nav_array as $nav): ?>
            <!-- in phone viewport show the user icon to access at registration/login/signout buttons -->
            <?php if($nav['type'] == 'nav-account-icon'): ?>
                <a href="#right-nav" class='account-open'><i class="<?= $nav['icon']; ?>"></i></a>
            <?php elseif($nav['type'] == 'nav-hamburger-close'): ?>
                <a href="#login-menu" class='account-close'><i class="<?= $nav['icon']; ?>"></i></a>
            <?php endif; ?>
        <?php endforeach; ?>
        <ul class="login-menu" id="login-menu">
            <?php if($UserLogged): ?>
                <!-- if user is logged show the sign out button -->
                <?php foreach($nav_array as $nav): ?>
                    <?php if(($nav['type'] == 'nav' || $nav['type'] == 'nav-signed') && $nav['id'] >= 5): ?>
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
