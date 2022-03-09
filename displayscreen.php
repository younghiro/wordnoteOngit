<?php require_once("indexphp.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My wordbooks</title>
    <link rel="stylesheet" href="indexphp.css"> <!-- cssファイルを読み込む　-->
</head>

<?php
    switch ($mode){
        case "input": //下の処理は通常時の画面を表示する?>
                    <header>
                    <div class="text">
                        <h1>My wordbooks.</h1>
                        <p class="explaination">保存先（教科など）を選択し単語を検索すると単語と意味が個別にメモされます。</p>
                    </div>
                    </header> 

                <div class="main">
                    <form action="./displayscreen.php" method="post"><?php //飛ばすリンク先注意 ?>
                        
                        <div class="selectsituation">
                            <label class="radio1"><input type="radio" name="situation" value="study" checked>study</label>
                            <label class="radio2"><input type="radio" name="situation" value="others">others</label>
                        </div>
                        
                        <?php //foreach文にする ?>
                        <div class="selectsubject">
                        <?php foreach( $subjects['subjecttt'] as $key => $subject){ ?>
                            <label><input type="radio" name="subject" value="<?php echo $key ?>"><?php echo $subject ?></label>
                        <?php } ?>
                        </div>
                        <div class="word">
                            <div class="wordinput">
                                <input type="text" name="word" placeholder="word">
                                <button type="submit" name="search">検索</button>
                            </div>
                        </div>
                    </form> 
                </div>     

            <?php //print_r($_POST) ?>
            <?php //echo "$mode"; ?>


                <footer>
                <!-- ここにメモに飛ぶリンクを作る　-->
                    <!--<?php // foreachで  <a href="link"> ここに教科名　</a> >?> -->
                    <div class="selectsubjectnote">
                    <p><a href="http://localhost:8888/portfolio/indexAlgorithm.php" target="_blank" class="noteselect">Algorithm</a></p>
                    <p><a href="http://localhost:8888/portfolio/indexmath.php" target="_blank" class="noteselect">Math</a></p>
                    <p><a href="http://localhost:8888/portfolio/indexEnglishforit.php" target="_blank" class="noteselect">English for IT</a></p>
                    <p><a href="http://localhost:8888/portfolio/indexComputer.php" target="_blank" class="noteselect">Computer</a></p>
                    <p><a href="http://localhost:8888/portfolio/indexOthers.php" target="_blank" class="noteselect">Others</a></p>
                    </div>
                </footer>
    
            <?php break; ?>

            <!--  ここから下はerror時の処理です。-->
        <?php case "error": ?>
            
                    <header>
                    <div class="text">
                        <h1>My wordbooks.</h1>
                        <p class="explaination">保存先（教科など）を選択し単語を検索すると単語と意味が個別にメモされます。</p>
                    </div>
                </header>                            
                <div class="main">

                    <form action="./displayscreen.php" method="post">   <?php //飛ばす先注意 ?>
                        
                        <div class="selectsituation">
                            <label class="radio1"><input type="radio" name="situation" value="study" checked>study</label>
                            <label class="radio2"><input type="radio" name="situation" value="others">others</label>
                        </div>

                        <?php //foreach文にする //valueの値は文字列?>
                        <div class="selectsubject">
                            <?php foreach( $subjects['subjecttt'] as $key => $subject){ ?>
                                <label><input type="radio" name="subject" value="<?php echo $key ?>"><?php echo $subject ?></label>
                            <?php } ?>
                        </div>
                        <div class="word">
                            <div class="wordinput">
                                <input type="text" name="word" placeholder="word" 
                                <?php if(isset($_SESSION['word'])){ ?>
                                    value="<?php echo $_SESSION['word']; }?>">
                                <button type="submit" name="search">検索</button>
                            </div>
                        </div>
                    </form> 
                <div class="errormessage">
                    <?php echo $errmessage; ?>
                </div>                            

                    
                </div> 


                <footer>
                <!-- ここにメモに飛ぶリンクを作る　-->
                    <div class="selectsubjectnote">
                    <?php  foreach($subjects['urls'] as $key => $url){ ?>
                        <p><a href="<?php echo $url ?>" target="_blank" class="noteselect"><?php echo $key?></a></p>
                    <?php } ?>    
                    <p><a href="http://localhost:8888/portfolio/indexOthers.php" target="_blank" class="noteselect">Others</a></p>
                    </div>
                </footer>

            <?php 
            break;  //ここから下はエラーがない時にそれぞれのメモに飛ぶ処理です
        case "0": 
            header('Location: indexEnglishforit.php ');
            exit();
            break; 
        case "1":
            header('Location: indexmath.php');
            exit(); 
            break;
        case "2"; 
            header('Location: indexComputer.php');
            exit();
            break; 
        case "3":
            header('Location: indexAlgorithm.php');
            exit();
            break;
        case "4":
            header('Location: indexOthers.php');
            exit();
            break;
        }
            ?>