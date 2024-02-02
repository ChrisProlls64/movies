<?php get_header('Liste des films', 'admin'); ?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Title</th>
            <th scope="col">ID</th>
            <th scope="col">Duration</th>
            <th scope="col">Release date</th>
            <th scope="col">Director</th>
            <th scope="col">Poster</th>
            <th scope="col">Categories</th>
            <th scope="col">Note</th>
            <th scope="col">Fiche</th>
            <th scope="col">Modifier</th>
            <th scope="col">Supprimer</th>
        </tr>
    </thead>
    <tbody>
        <?php $movies = displayMovies() ; ?>
        <?php foreach ($movies as $movie) : ?>
        <tr>
            <th scope="row"><?= $movie['title'];?></th>
            <th scope="row"><?= $movie['id'];?></th>
            <td><?= $movie['duration']; ?></td>
            <td><?= $movie['releaseDate']; ?></td>
            <td><?= $movie['director']; ?></td>
            <td><?= $movie['poster']; ?></td>
            <td><?= $movie['categories']; ?></td>
            <td><?= $movie['note']; ?></td>
            <td><a href="../films/afficher/<?= $movie['id'] ?>">Voir la fiche</a></td>
            <td><a href="../films/editer/<?= $movie['id'] ?>" >Modifier</a></td>
            <td><a href="../films/supprimer/<?= $movie['id'] ?>" onclick="return confirm('êtes-vous sûr de vouloir supprimer cette fichee ?')">Supprimer</a> </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>




<?php get_footer('admin'); ?>