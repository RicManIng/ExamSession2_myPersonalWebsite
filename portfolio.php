<!DOCTYPE html>
<html lang="it">
<head>
    <?php
        require_once('head.php');
    ?>
    <title>Riccardo Mancinelli Engineering</title> 
    <link rel="stylesheet" href="resources/css/portfolio.min.css">
</head>
<body>
    <?php
        require_once('common.php');
        require_once('header.php');
    ?>
    <main>
        <?php $projects_array = json_decode(file_get_contents($file_projects), true); ?>
        <section>
            <h1>Completed</h1>
            <?php foreach ($projects_array as $project): ?>
                <?php if ($project['status'] == 'finished'): ?>  
                    <div class='project'>
                        <div class="img-container">
                            <img src="<?= $project['image_url']; ?>" alt="project-image">
                        </div>
                        <p><strong><?= $project['name']; ?></strong></p>
                        <p><?= $project['client']; ?></p>
                        <div class="link-container">
                            <a href="portfolio_description.php?id=<?= $project['id']; ?>" target="_blank" title="Go to project detail">Project Details</a>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </section>
        <section>
            <h1>Active</h1>
            <?php
                $project_present = false;
                foreach ($projects_array as $project): ?>
                    <?php if ($project['status'] == 'active'): ?>  
                        <?php $project_present = true; ?>
                        <div class='project'>
                            <div class="img-container">
                                <img src="<?= $project['image_url']; ?>" alt="project-image">
                            </div>
                            <p><strong><?= $project['name']; ?></strong></p>
                            <p><?= $project['client']; ?></p>
                            <div class="link-container">
                                <a href="portfolio_description.php?id=<?= $project['id']; ?>" target="_blank" title="Go to project detail">Project Details</a>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php if(!$project_present): ?>
                <p>No active projects</p>
            <?php endif; ?> 
        </section>
        <section>
            <h1>To Do</h1>
            <?php
                $project_present = false;
                foreach ($projects_array as $project): ?>
                    <?php if ($project['status'] == 'to do'): ?>  
                        <?php $project_present = true; ?>
                        <div class='project'>
                            <div class="img-container">
                                <img src="<?= $project['image_url']; ?>" alt="project-image">
                            </div>
                            <p><strong><?= $project['name']; ?></strong></p>
                            <p><?= $project['client']; ?></p>
                            <div class="link-container">
                                <a href="portfolio_description.php?id=<?= $project['id']; ?>" target="_blank" title="Go to project detail">Project Details</a>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php if(!$project_present): ?>
                <p>No coming projects</p>
            <?php endif; ?> 
        </section>
    </main>
    <?php
        require_once('footer.php');
    ?>
</body>
</html>