<?php

function check($text,$type){

    $text = mb_strtolower($text);
    $punctuation = ['.',',','-',PHP_EOL];
    $NewText = str_replace($punctuation, "", $text);
    $masText = explode(" ", $NewText);
    $countText = count($masText);
    $NewMasText=[];

    for($i=0;$i<count($masText);$i++){
        if (array_key_exists($masText[$i], $NewMasText)){
            $NewMasText[$masText[$i]]+=1;
        }
        else{
            $NewMasText[$masText[$i]]=1;
        }
    }


    if ($type ==='FileTextFile'){
        $PathOfFile = 'FileTextFiles';
    }
    elseif($type === 'AreaTextFile'){
        $PathOfFile = 'AreaTextFiles';
    }
    $LastMas=[];
    foreach ($NewMasText as $key => $value){
        array_push($LastMas, array($key,$value));
    }
    array_push($LastMas,array("всего слов",$countText));
    $lastPath = "{$PathOfFile}/".rand().".csv";
    $f = fopen($lastPath, 'w');
    foreach ($LastMas as $lines){
        fputcsv($f,$lines,':');
    }
    fclose($f);


}
if (!empty($_FILES['docs']['name'])){
    $fileText = file_get_contents($_FILES['docs']['tmp_name']);
    check($fileText,'FileTextFile');
    }
if (!empty($_POST['communication'])){
    $areaText = $_POST['communication'];
    check($areaText,'AreaTextFile');
    }

if (!is_dir("AreaTextFiles")){
    mkdir("AreaTextFiles", 8777,true);
    }
if (!is_dir("FileTextFiles")){
    mkdir("FileTextFiles", 8777,true);
}

