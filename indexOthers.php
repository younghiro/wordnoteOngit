<?php 
require_once("dbc.php");

    //othersに関する単語はデータベースに4と記しつけられて入っている
    $subjectnumber=4;
    $note = new Dbc();
    $noteResult= $note->getAllnote($subjectnumber);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Computernote</title>
    <link rel="stylesheet" href="indexnote.css">
</head>
<body>
    <div class="test">
    <a class=”button_css” href="http://localhost:8888/portfolio/displayscreen.php">戻る</a>
    </div>
        <?php foreach($noteResult as $key=>$noteResults){ ?>
        <ul>    
        <div class="inlineblock"><li><?php echo "$key" ?></li></div>
        </ul>
        <ul>
        <div class="inlineblock2"><li><?php echo "$noteResults" ?></li></div>
        </ul>
        <?php } ?>
</body>
</html>