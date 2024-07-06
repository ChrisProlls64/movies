<?php
if (isCSRFTokenValid()) {
  logout();
  die;
}
deleteMovie();
header('Location:' . $router->generate('indexMovies'));
die;
