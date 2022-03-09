<?php  
use PHPHtmlParser\Dom;
use PHPHtmlParser\Options;

function search($word){

require_once __DIR__ . '/vendor/autoload.php';




//   参照　　　https://github.com/paquettg/php-html-parser 最新のphpに対応



// 文字コードを設定する。
// 日本語だと文字コードの自動解析がうまく動かないようなので、
// ページに合わせて設定する必要があります
$options = new Options();
$options->setEnforceEncoding('utf8');

// 文字化けする場合は Shift JIS を試してみてください
// $options->setEnforceEncoding('sjis');

//echo parse_url($url,PHP_URL_PATH); これで単語を配列[path]をechoする

//https ここに://を入れる  ejje.weblio.jp/content/hello 
//Array ( [scheme] => https [0] => :// [host] => ejje.weblio.jp [path] => /content/hello ) 

$urlParse = array('scheme'=>'https', 'host'=>'ejje.weblio.jp', 'path'=>'');




//ここに飛ばしてくる
$urlParse['path']= "/content/$word";

//$urlParse = parse_url($url);//urlを分解


array_splice($urlParse,1,0,'://'); //  ここで配列に://を入れる

$url= implode($urlParse); //分解にしたURLを文字列にする



$dom = new Dom();
$dom->loadFromUrl($url, $options);





// 意味を取得
$element = $dom->find('.content-explanation.ej');
$result = $element->text . "\n";
return $result;

};


?>


