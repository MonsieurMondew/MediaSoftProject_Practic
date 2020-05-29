<?php
$text ='В город ворвалась зима. еще вчера ветер гонял по улицам опавшие листья, моросил холодный дождь. Сегодня же с 
утра все покрылось белым. За ночь снежная туча щедро поделилась снегом, который теперь искрился и переливался в лучах 
яркого утреннего солнца. Лицо прохожих, одетых в теплые шубы и пуховики, были радостными. Ребятишки же не скрывали 
свой восторг и громко радовались долгожданному снегу. Возле школ развернулись настоящие снежные баталии. Многие 
школьники, да и некоторые учителя оказались обстреляны снежками. У всех в этот день было радостное, приподнятое 
настроение. Зима вступила в свои владения, подарив людям ощущение сказки, волшебства.';
$text = mb_strtolower($text);

$punctuation = ['.',',' ];

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
foreach ($NewMasText as $key => $value){
    echo "{$key} : {$value}". PHP_EOL;
}

//старый код
//-------
#$LastMas=array_count_values($masText);

#foreach ($LastMas as $key => $value){
#    echo "{$key} : {$value}". PHP_EOL;
#}
//-------
echo "всего слов : {$countText}". PHP_EOL;
