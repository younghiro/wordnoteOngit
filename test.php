<?php
/*
require_once __DIR__ . '/vendor/autoload.php';

use PHPHtmlParser\Dom;
use PHPHtmlParser\Options;

// 文字コードを設定する。
// 日本語だと文字コードの自動解析がうまく動かないようなので、
// ページに合わせて設定する必要があります
$options = new Options();
$options->setEnforceEncoding('utf8');

// 文字化けする場合は Shift JIS を試してみてください
// $options->setEnforceEncoding('sjis');

// ページを解析
$url = 'https://ejje.weblio.jp/content/negotiate';
$dom = new Dom();
$dom->loadFromUrl($url, $options);

// 商品名を取得
$element = $dom->find('.content-explanation.ej');
echo $element->text . "\n"; 
*/

?>

<?php  
//test

/*
    $dsn = "mysql:host=localhost;dbname=wordnote;charset=utf8";
    $user= "wordnote_user";
    $pass= "hiromu112010";

    $dbh= new PDO($dsn, $user, $pass);
    
    var_dump($dbh);
*/

/*
require_once __DIR__ . '/vendor/autoload.php';

use PHPHtmlParser\Dom;
use PHPHtmlParser\Options;

$options = new Options();
$options->setEnforceEncoding('utf8');

//$word = "negotiate"; //ここに単語を入れる



$url="https://ejje.weblio.jp/content/negotiate";



$dom = new Dom();
$dom->loadFromUrl($url, $options);





// 意味を取得
$element = $dom->find('.content-explanation.ej');
echo $element->text . "\n";




*/
?>
