<?php

// $page =readfile('info.txt');

// echo $page;




//fopen();
// $fileopen =fopen("info.txt","r");

// echo(var_dump($fileopen));



// if(!$fileopen){
//     die("unable to open file enter a correct file name");
// }
  
// $content =fread($fileopen,filesize("info.txt"));

// echo fgetc($fileopen);
// echo fgetc($fileopen);
// echo fgetc($fileopen);
// echo fgetc($fileopen);
// echo fgetc($fileopen);
// echo fgetc($fileopen);


// while ($a= fgetc($fileopen) ) {

// echo $a;
// }


//  echo fgets($fileopen);









// fclose($fileopen);
// echo $content;






$fileopenw =fopen("info1.txt", "w" );

fwrite($fileopenw,"waseem");
fwrite($fileopenw,"afnan\n");
fwrite($fileopenw,"hasan");
fwrite($fileopenw,"musa");




$fileopena =fopen("info1.txt", "a" );

fwrite($fileopena,"waseem memon");




?>