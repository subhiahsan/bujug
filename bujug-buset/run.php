<?php

$username = "x";
$token = "x";

$n = rand(1,20);

$namarepo = "dimsbroa";
$org = 'https://github.com/'.$username.'/'.$namarepo.'.git';

$initGit = shell_exec('cd '.$namarepo.' && git init');

for ($i=1 ; $i<= $n; $i++){
	echo'['.$i.']';
    makeCommit($namarepo);
}

gitPushToRepo($namarepo,$username,$token,$org);
echo "\n\n[SELESAI]\n\n";


function makeCommit($namarepo){
    $namafile = $namarepo."/hwid.txt";
    $file = fopen($namafile,"w+");
    fwrite($file,rand());
    fclose($file);
    
    shell_exec('cd '.$namarepo.' && git add . && git commit -m "commit '.rand().' "');
    echo " - [Make Commit]\n";
}

function gitPushToRepo($namarepo,$username,$token,$org){
    $link = 'https://'.$username.':'.$token.'@github.com/'.$username.'/'.$namarepo;
    shell_exec('cd '.$namarepo.' && git push '.$link);
    echo "\n[Pushed To Github]";
}

?>