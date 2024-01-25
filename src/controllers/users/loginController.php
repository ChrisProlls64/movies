<?php


//  if (!empty($_POST['email'])  && !empty($_POST['pwd'])) {
//     $accessUser = checkUserAccess();
//     if (!empty($accessUser)) {
//         $_SESSION['user'] = [
//             'id' => $accessUser,
//             'lastLogin' => date('Y-m-d H:i:s') 
//         ];

//         saveLastLogin($accessUser);
        
//         alert('Vous êtes connecté', 'success');
//         header('Location: ' . $router->generate('users'));
//         die;
//     } else {
//         alert('Identifiants incorrects');
//     }
// }



if (!empty($_POST['birthDate'])){
    alert('Vous ne pouvez pas vous connecter à ce site');
    header('Location: ' . $router->generate('home'));
    die;
} else if (!empty($_POST['email'])  && !empty($_POST['pwd'])) {
    $accessUser = checkUserAccess();
    if (!empty($accessUser)) {
        $_SESSION['user'] = [
            'id' => $accessUser,
            'lastLogin' => date('Y-m-d H:i:s') 
        ];

        saveLastLogin($accessUser);
        
        alert('Vous êtes connecté', 'success');
        header('Location: ' . $router->generate('users'));
        die;
    } else {
        alert('Identifiants incorrects');
    }
}
