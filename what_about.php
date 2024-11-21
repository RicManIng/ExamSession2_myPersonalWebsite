<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        require_once('head.php');
    ?>
    <title>Riccardo Mancinelli Engineering</title> 
    <link rel="stylesheet" href="resources/css/what_about.min.css">
</head>
<body>
    <?php
        require_once('common.php');
        require_once('header.php');
    ?>
    <main>
        <section class="about-me">
            <img src="resources/img/foto.jpeg" alt="mia-foto" class="mia-foto">
            <div>
                <h1>About Me</h1>
                <p>
                    Hello, and welcome to my online space! I am a mechatronics engineer, with a degree and a 
                    deep passion for programming and advanced technologies. My professional journey began in mechatronics, 
                    but I soon directed my focus toward the fascinating world of embedded systems and IoT solutions. 
                    With a solid foundation in engineering disciplines and a strong dedication to innovation, 
                    I’ve found the embedded programming field to be an ideal space where theory meets practice, 
                    where every line of code contributes to making the world more connected and intelligent.
                </p>
                <p>
                    Over the years, I’ve gained significant experience in designing, developing, and optimizing complex, interconnected systems. 
                    I’m captivated by the challenge of bridging hardware and software, seeking efficient and innovative solutions to make devices more performant, 
                    reliable, and sustainable. Working on embedded and IoT projects allows me to create tangible connections, transforming ideas into functional, 
                    real-world applications—often in contexts where precision and speed are essential.
                </p>
                <p>
                    In my work, I enjoy delving into every aspect of design, from selecting hardware components to implementing software, 
                    with particular attention to resource optimization and system security. I have contributed to various IoT integration projects, 
                    developing solutions that enhance automation, data management, and device connectivity, empowering companies and users to interact with technology in new and innovative ways.
                </p>
                <p>
                    If you're interested in learning more about my skills or exploring how I can contribute to your next project, you're in the right place. 
                    On my website, you’ll find an overview of my experiences, skills, and the projects I’ve worked on. 
                    I look forward to sharing my passion for technology and my commitment to a future that’s ever more interconnected and intelligent.
                </p>
            </div>
        </section>
        <section class="studies">
            <h1>Accademics</h1>
            <?php
                $accademicsArr = json_decode(file_get_contents($file_studies), true);
                foreach($accademicsArr as $accademic):
            ?>  
                <div class="container-studies-extern">
                    <img src="<?= $accademic['logo']; ?>" alt="logo">
                    <div class="container-studies-intern">
                        <h3><?= $accademic['title']; ?></h3>
                        <p><strong>institution : </strong><?= $accademic['institution']; ?></p>
                        <div>
                            <p><strong>location : </strong><?= $accademic['location']; ?></p>
                            <p><strong>website : </strong><a href="<?= $accademic['website']; ?>" target="_blank" title="Go to institute website"><?= $accademic['website'] ?></a></p>
                        </div>
                        <div>
                            <p><strong>start date : </strong><?= $accademic['start_date']; ?></p>
                            <p><strong>end date : </strong><?= $accademic['end_date']; ?></p>
                        </div>
                        <p><strong>evaluation : </strong><?= $accademic['evaluation']; ?></p>
                        <p><strong>description : </strong><?= $accademic['description']; ?></p>
                    </div>
                </div>  
            <?php endforeach; ?>
        </section>
        <section class="work-experiences">
            <h1>Work Experiences</h1>
            <?php
                $workExperiencesArr = json_decode(file_get_contents($file_work_experiences), true);
                foreach($workExperiencesArr as $workExperience):
            ?>
                <div class="container-work-extern">
                    <img src="<?= $workExperience['logo']; ?>" alt="logo">
                    <div class="container-work-intern">
                        <h3><?= $workExperience['company']; ?></h3>
                        <p><strong>position : </strong><?= $workExperience['position']; ?></p>
                        <div>
                            <p><strong>location : </strong><?= $workExperience['location']; ?></p>
                            <p><strong>website : </strong><a href="<?= $workExperience['link']; ?>" target="_blank" title="Go to company website"><?= $workExperience['link'] ?></a></p>
                        </div>
                        <div>
                            <p><strong>start date : </strong><?= $workExperience['start_date']; ?></p>
                            <p><strong>end date : </strong><?= $workExperience['end_date']; ?></p>
                        </div>
                        <p><strong>description : </strong><?= $workExperience['description']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>
    </main>
    <?php
        require_once('footer.php');
    ?>
</body>
</html>