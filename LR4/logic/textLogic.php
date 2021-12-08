<?php
error_reporting(0);
$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);

$preset1 = "https://ru.wikipedia.org/wiki/%D0%9A%D0%B8%D0%BD%D0%BE%D1%80%D0%B8%D0%BD%D1%85%D0%B8";
$preset2 = "https://echo.msk.ru/programs/sorokina/2917870-echo/";
$preset3 = "https://mishka-knizhka.ru/skazki-dlay-detey/zarubezhnye-skazochniki/skazki-alana-milna/vinni-puh-i-vse-vse-vse/#glava-pervaya-v-kotoroj-my-znakomimsya-s-vinni-puhom-i-neskolkimi-pchy";

if ($_GET["preset"]) {
    if ($_GET["preset"] == "1") {
        $text = file_get_contents($preset1, false, stream_context_create($arrContextOptions));
    }
    elseif ($_GET["preset"] == "2") {
        $text = file_get_contents($preset2, false, stream_context_create($arrContextOptions));
    }
    elseif ($_GET["preset"] == "3") {
        $text = file_get_contents($preset3, false, stream_context_create($arrContextOptions));
    }
    else {
        $text = $_POST["text"];
    }
    $analyze = new TextAnalyze($text);
}
else {
    if ($_POST["text"]) {
        $text = $_POST["text"];
    }
    $analyze = new TextAnalyze($text);
}



class textAnalyze{
    public $textBody;

    public function __construct($text){
        $this->textBody = $text;
    }

    public function viewText(){
        echo $this->textBody;
    }

    public function Task1(){
        $i = 0;
        $numlist = '<ol class = "ollist">';
        $checktext = preg_match_all('#\s?<h[12][^>]*>(.*?)</h[12][^>]*>\s?#', $this->textBody,$matches,PREG_SET_ORDER);
        if ($checktext) {
            $checkerh2 = false;
            if(strpos($matches[0][0], "h2")){
                $checkerh2 = true;
            }
            while($matches[$i][0]){
                if (strpos($matches[$i][0], "h1") && $matches[$i + 1][0]) {
                    $numlist = $numlist . '<li class = "lilist">';
                    if (!strpos($matches[$i + 1][0], "h1")) {
                        $numlist = $numlist . $matches[$i][1] . '<ol class="ollist">';
                    } else {
                        $numlist = $numlist . $matches[$i][1] . '</li>';
                    }
                } elseif (strpos($matches[$i][0], "h2") && $matches[$i + 1][0]) {
                    $numlist = $numlist . '<li class = "lilist">';
                    if (!strpos($matches[$i + 1][0], "h2")&&$checkerh2==false) {
                        $numlist = $numlist . $matches[$i][1] . '</li></ol></li>';
                    }elseif(!strpos($matches[$i + 1][0], "h2")&&$checkerh2==true){
                        $numlist = $numlist . $matches[$i][1] . '</li></ol><ol class = "ollist">';
                        $checkerh2 == false;
                    }
                    else {
                        $numlist = $numlist . $matches[$i][1] . '</li>';
                    }
                }
                elseif(!$matches[1][0]){
                    $numlist = $numlist . '<li class = "lilist">'. $matches[0][1].'</li></ol>';}
                elseif(strpos($matches[$i][0], "h2") && !$matches[$i + 1][0] && $checkerh2 == false){
                    $numlist = $numlist .'<li class = "lilist">'.$matches[$i][1].'</li></ol></li></ol>';
                }
                elseif(strpos($matches[$i][0], "h2") && !$matches[$i + 1][0] && $checkerh2 == true){
                    $numlist = $numlist .'<li class = "lilist">'.$matches[$i][1].'</li></ol>';
                }
                elseif(strpos($matches[$i][0], "h1") && !$matches[$i + 1][0]){
                    $numlist = $numlist .'<li class = "lilist">'.$matches[$i][1].'</li></ol>';
                }
                $i++;
            }
            return $numlist;
        } else {
            return 0;
        }
    }

    public  function Task9(){
        $this->textBody = preg_replace("/([^\s]?)\s?([.,?!:;-])\s?([^\s]?)/u", "\$1\$2 \$3" , $this->textBody);
        $this->textBody = preg_replace("/\s+([\.|,|!|\?|-]+)/", '\\1', $this->textBody);
        $this->textBody = preg_replace("/(-)\s+/", '\\1', $this->textBody);
        //return $this->textBody;
    }

    public function Task10(){
        $dom = new DOMDocument();
        $page = $dom->loadHTML($this->textBody);
        $p = $dom->getElementsByTagName('p');
        $rowText = [];
        for($i = 0; $i < count($p); $i++){
            array_push($rowText, $p->item($i)->nodeValue);
        }
        $longSentence = array_reduce($rowText, function($carry, $item) {
            return mb_strlen($carry, 'utf-8') < mb_strlen($item, 'utf-8') ? $item : $carry;
        }, '');
        for($i = 0; $i < count($p); $i++){
            if($p[$i]->nodeValue == $longSentence){
                $p[$i]->setAttribute('id', "longSentence");
            }
        }
        $longSentence = mb_substr($longSentence, 0, 80, 'utf-8');

        if($this->textBody != ""){
            $longSentence = explode(' ', $longSentence);
            for($i = 0; $i < count($longSentence); $i++){
                if(count($longSentence) - $i < 2){
                    echo $longSentence[$i] . "...</a>";
                } else if (count($longSentence) - $i < 3){
                    echo "<a href='#longSentence'>" . $longSentence[$i] . " ";
                } else{
                    echo $longSentence[$i] . " ";
                }
            }
        }
        $this->textBody = $dom->saveHTML();



    }

    public function Task14(){

        $dom = new DOMDocument();
        $page = $dom->loadHTML($this->textBody);
        $i = 0;
        foreach ($dom->getElementsByTagName('a') as $item) {
            $i++;
            $item->removeAttribute('id');
            $item->setAttribute('id', "ref-$i");
            echo "<a href='#ref-$i'>Ссылка $i - " . $item->nodeValue .  "</a> <br>";
        }
        $this->textBody = $dom->saveHTML();
    }
}
?>