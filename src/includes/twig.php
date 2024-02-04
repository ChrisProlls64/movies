<?php

$twig->addFunction(new Twig\twigFunction('getUrl', function ($name, array $params = []) {
    global $router;
    return $router->generate($name, $params);
}));

$twig->addFunction(new Twig\twigFunction('basePath', function () {
    global $router;
    return $router->generate('home');
}));

$twig->addfunction(new Twig\twigFunction('carrousel', function($path){
    $scandir = scandir($path);
    $images=[];
    $Nbr=0;
    foreach($scandir as $cle => $fichier){
        $fichier=strtolower($fichier);
        if(preg_match("#\.(jpg|jpeg|png|gif|bmp)$#",$fichier)){
            $Nbr++;
            $images[$Nbr]=$fichier;
          }
        }
        if(count($images)==0){
            echo "Aucune image dans ce dossier.";
        } else {
          $LienPrecedente='';
          $ImageAffichee=$images[1];
          $LienSuivante=(count($images) > 1)?'<a href="carrousel.php?image=2">Image suivante</a>':'';
          if(isset($_GET['image']) and is_int((int)$_GET['image'])){
            if(array_key_exists($_GET['image'],$images)){
              $LienPrecedente=isset($images[$_GET['image']-1])?'<a href="carrousel.php?image='.($_GET['image']-1).'">Image précédente</a>':'';
              $ImageAffichee=$images[$_GET['image']];
              $LienSuivante=isset($images[$_GET['image']+1])?'<a href="carrousel.php?image='.($_GET['image']+1).'">Image suivante</a>':'';
            }
          }
          echo '<table style="width:100%">';
            echo '<tr><th>'.count($images).' image'.(count($images)>1?'s':'').'</th></tr>';
            echo '<tr><td style="text-align:center">'.$LienPrecedente.' '.$ImageAffichee.' '.$LienSuivante.'</td></tr>';
            echo '<tr><td style="text-align:center"><img src="'.$path.'/'.$ImageAffichee.'" alt="Image..."></td></tr>';
          echo '</table>';
        }
}));

