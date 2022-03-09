<?php  
require_once("indexscraping.php");
require_once("dbc.php");
session_start();
$mode='input';
$errmessage = ""; //エラーメッセージを定義し、もしエラーメッセージがあったら表示する
if( isset($_POST['search'])){  //送信ボタンを押した時


    if( isset($_POST['word']) && !$_POST['word'] ) {  //wordの中が空の時
        $errmessage = "単語を入力してください";
        $mode="error";
    }elseif(mb_strlen($_POST['word']) > 13){   //単語が長い時
        $errmessage ="単語が長すぎます";
        $mode="error";
    }else{
        $_SESSION['word'] = htmlspecialchars($_POST['word'], ENT_QUOTES); //サニタイズしセッションに
        if($_POST['situation']=='others'){  
                //dbにsubjectがothersの番号４と送る
                //wordをothersdbに保存
                //scrapingの関数を呼び出して意味をdbに保存
                $_POST['meanings']= search("$_SESSION[word]");
                $_POST['subject']=4; //otherだけ$_POST[subject]の指定されてないので４に指定し、教科を付け加えれるように時間があれば１に帰る
                $dbc = new Dbc($_POST);
                $dbc->noteCreate();
                $mode='input';
                $_SESSION=array();
            //othersの時は教科の指定なしにothersのメモに飛ばす
                $_POST=[];//配列をからにする
        }else{ 
            if( !isset($_POST['subject']) ) //&& !$_POST['subject']  教科が選択されてない時
            {
                $errmessage ="保存先の教科を選択してください"; //othersではなく教科の保存先がない時エラーを出す
                $mode="error";
            } //教科によってメモを飛ばす
            elseif(isset($_POST['subject']) && $_POST['subject']=="0"){
            //English for ITのメモに飛ばす
                $_POST['meanings']= search("$_SESSION[word]");
                $dbc = new Dbc($_POST);
                $dbc->noteCreate();
                $mode=0;
                $_SESSION=array();
                $_POST=[];//配列をからにする
            }elseif(isset($_POST['subject']) && $_POST['subject']=="1"){
            //Mathのメモに飛ばす
                $_POST['meanings']= search("$_SESSION[word]");
                $dbc = new Dbc($_POST);
                $dbc->noteCreate();
                $_SESSION=array();
                $mode=1;
                $_POST=[];//配列をからにする
            }elseif(isset($_POST['subject']) && $_POST['subject']=="2"){
                //Computerのメモに飛ばす
                $_POST['meanings']= search("$_SESSION[word]");
                $dbc = new Dbc($_POST);
                $dbc->noteCreate();
                $mode=2;
                $_SESSION=array();
                $_POST=[];//配列をからにする
            }elseif(isset($_POST['subject']) && $_POST['subject']=="3"){
            //Algorithmのメモに飛ばす 
                $_POST['meanings']= search("$_SESSION[word]");
                $dbc = new Dbc($_POST);
                $dbc->noteCreate();
                $mode=3;
                $_SESSION=array(); 
                $_POST=[];//配列をからにする  
            }
        }
    }; 

};  

$subjects=array
(
  'subjecttt' => array
    (  "0" => "English for IT",
       "1" =>"Math",
       "2" =>"Computer",
       "3" =>"Algorithm",
       //4はothers
    ),

  'urls' => array
    (
      "English for IT" => "http://localhost:8888/portfolio/indexEnglishforit.php",
      "Math" => "http://localhost:8888/portfolio/indexmath.php",
      "Computer"=> "http://localhost:8888/portfolio/indexComputer.php",
      "Algorithm" => "http://localhost:8888/portfolio/indexAlgorithm.php"
    )

)



?>






