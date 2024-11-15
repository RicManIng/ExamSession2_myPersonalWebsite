<!DOCTYPE html>
<html lang="it">
<head>
    <?php
        require_once('head.php');
    ?>
    <title>Riccardo Mancinelli Engineering</title> 
    <link rel="stylesheet" href="resources/css/services.min.css">
</head>
<body>
    <?php
        require_once('common.php');
        require_once('header.php');
    ?>
    <main>
        <section class="embedded">
            <div class="container">
                <h1>Custom Embedded Software Development</h1>
                <p>
                    I provide highly specialized embedded software development solutions tailored to meet the demands of your most complex projects. 
                    With advanced expertise in <strong>C</strong>, <strong>C++</strong>, and <strong>Python</strong>, we deliver optimized firmware and applications for embedded devices, ensuring reliability, 
                    efficiency, and seamless integration with your hardware.
                </p>
                <p class="centered"><strong>My Services Include:</strong></p>
                <ul>
                    <li><strong>Custom Development</strong>: tailored solutions designed to meet your specific requirements.</li>
                    <li><strong>Performance Optimization</strong>: lightweight, fast, and highly efficient code.</li>
                    <li><strong>Multi-Platform Support</strong>: expertise in diverse embedded architectures, from microcontrollers to advanced platforms.</li>
                    <li><strong>Debugging and Maintenance</strong>: rigorous testing and ongoing support for stability and longevity.</li>
                </ul>
                <p>Trust me to turn your ideas into high-quality embedded solutions, perfect for IoT applications, industrial automation, robotics, automotive systems, and more.</p>
                <p class="centered"><strong><a href="<?= ($UserLogged) ? 'contact.php?state=4' : 'login.php?state=login'; ?>">Contact me</a></strong> to discuss your project and discover how we can help you achieve your technological goals.</p>
            </div>
        </section>
        <section class="web">
            <div class="container">
                <h1>Web Development Tailored to Your Needs</h1>
                <p>
                    We specialize in delivering professional web development solutions, 
                    leveraging a wide range of cutting-edge technologies to create fast, responsive, and user-friendly websites and applications. 
                    With expertise in <strong>PHP, HTML, CSS, SASS, JavaScript, RxJS, Laravel, Bootstrap, and AngularJS,</strong> we craft solutions that stand out 
                    for their design and functionality.
                </p>
                <p class="centered"><strong>My Services Include:</strong></p>
                <ul>
                    <li><strong>Front-End Development</strong>: stunning, responsive interfaces built with <strong>HTML, CSS, SASS,</strong> and frameworks like <strong>Bootstrap and AngularJS.</strong></li>
                    <li><strong>Back-End Development</strong>: robust and scalable server-side solutions powered by <strong>PHP and Laravel.</strong></li>
                    <li><strong>Database Management</strong>: efficient data handling and storage to ensure smooth performance.</li>
                    <li><strong>Dynamic and Interactive Features</strong>: modern JavaScript frameworks like <strong>RxJS</strong> to enhance user experience.</li>
                    <li><strong>Customized Solutions</strong>: tailored development to meet the unique needs of your business.</li>
                </ul>
                <p>
                    Whether you need a simple website, a complex web application, or seamless integration with existing systems, 
                    we’re here to bring your vision to life with precision and attention to detail.
                </p>
                <p class="centered"><strong><a href="<?= ($UserLogged) ? 'contact.php?state=4' : 'login.php?state=login'; ?>">Contact me</a></strong> today to start building a web solution that elevates your online presence!</p>
            </div>
        </section>
    </main>
    <?php
        require_once('footer.php');
    ?>
</body>
</html>