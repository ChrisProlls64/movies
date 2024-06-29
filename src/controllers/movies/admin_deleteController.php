<?php
if (isCSRFTokenValid()) {
  logout();
  die;
}
deleteMovie();
alert('Fiche supprimée avec succèes', 'success');
