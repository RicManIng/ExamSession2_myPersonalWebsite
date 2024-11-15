<!DOCTYPE html>
<html lang="it">
<head>
    <?php
        require_once('head.php');
    ?>
    <title>Riccardo Mancinelli Engineering</title> 
    <link rel="stylesheet" href="resources/css/portfolio_description.min.css">
</head>
<body>
    <?php
        require_once('common.php');
        require_once('header.php');

        $id = $_GET['id'];
        $projects_array = json_decode(file_get_contents($file_projects), true);
        foreach ($projects_array as $project) {
            if ($project['id'] == $id) {
                $selected_project = $project;
            }
        }
    ?>
    <main>
        <div class="img-container">
            <img src="<?= $selected_project['image_url'];?>" alt="project-image">
        </div>
        <div class="content">
            <h1><?= $selected_project['name']; ?></h1>
            <p><strong>Client </strong>: <?= $selected_project['client']; ?></p>
            <p><strong>Summary </strong>: <?= $selected_project['description']; ?></p>
            <div class="date-content">
                <p><strong>Start date </strong>: <?= $selected_project['started']; ?></p>
                <p><strong>End date </strong>: <?= $selected_project['finished']; ?></p>
            </div>
            <div class="technologies-content">
                <p><strong>Technologies involved </strong>:</p>
                <ul>
                    <?php foreach ($selected_project['technologies'] as $technology): ?>
                        <li><?= $technology; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <p><strong>Description </strong>: <?= $selected_project['long_description']?></p>
            <?php if($selected_project['repo_url'] != "none"): ?>
                <div class="link-container">
                    <a href="<?= $selected_project['repo_url']; ?>" target="_blank">Repository</a>
                </div>
            <?php endif; ?>
        </div>
    </main>
    <?php
        require_once('footer.php');
    ?>
</body>
</html>