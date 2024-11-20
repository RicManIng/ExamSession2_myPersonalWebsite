<!DOCTYPE html>
<html lang="it">
<head>
    <?php
        require_once('head.php');
    ?>
    <title>Riccardo Mancinelli Engineering</title> 
    <link rel="stylesheet" href="resources/css/contact.min.css">
</head>
<body>
    <?php
        require_once('common.php');
        require_once('header.php');
    ?>
    <main>
        <?php if(!empty($_POST)): ?>
            <?php
                $valid_conditions = true;
                $MessageDatabase = json_decode(file_get_contents($file_messages), true);
                if(!(isset($_POST['argument']) && isset($_POST['message']))){
                    $valid_conditions = false;
                }
                $message = htmlspecialchars($_POST['message']);
                $object = htmlspecialchars($_POST['object']);
                if($valid_conditions){
                    /* change the saved message structure to be an associative array */
                    $new_element = array(
                        'name' => $user->get_name(),
                        'surname' => $user->get_surname(),
                        'email' => $user->get_email(),
                        'argument' => $_POST['argument'],
                        'object' => $object,
                        'message' => $message
                    );
                    if(!empty($MessageDatabase)){
                        $MessageDatabase = [];
                    }
                    array_push($MessageDatabase, $new_element);
                    file_put_contents($file_messages, json_encode($MessageDatabase));
                }
            ?>
            <?php if($valid_conditions): ?>
                <div class='container'>
                    <h1>Messagge sent correctly</h1>
                    <p>Answare in 3-5 days</p>
                </div>
            <?php else: ?>
                <div class='container'>
                    <h1 class='errore'>Error sending message</h1>
                    <p class='errore'>Check fields to be correctly filled</p>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <div class='container'>
            <form action="" method="post" novalidate>
                <h1>Contact me</h1>
                <label for="argument">Select the message argument :</label>
                <select name="argument" id="argument">
                    <option value="info_request">Information request</option>
                    <option value="tech_assistant">Technical assistance</option>
                    <option value="web_project">Information for a web development project</option>
                    <option value="embed_system">Information for an embedded system project</option>
                    <option value="other">Altro</option>
                </select>
                <label for="object">Object :</label>
                <textarea name="object" id="object" required placeholder="insert here the object of your message"></textarea>
                <label for="message">Message :</label>
                <textarea name="message" id="message" required placeholder="insert here your message"></textarea>
                <input type="submit" value="Send">
            </form>
            </div>
        <?php endif; ?>
    </main>
    <?php
        require_once('footer.php');
    ?>
</body>
</html>