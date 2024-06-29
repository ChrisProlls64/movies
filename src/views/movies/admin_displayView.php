<?php get_header('Liste des films', 'admin'); ?>
<style>
    /* Empêche le texte de passer sur deux lignes */
    th {
        white-space: nowrap;
        width: auto;
    }
</style>
    
<table class="table table-responsive-xl">
    <thead>
        <tr>
            <th scope="col">Poster</th>
            <th scope="col">Title</th>
            <th scope="col">Duration</th>
            <th scope="col">Release date</th>
            <th scope="col">Director</th>
            <th scope="col">Categories</th>
            <th scope="col">Note</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody class="position-relative">
        <?php $movies = retrieveAllMovies() ; ?>
        <?php foreach ($movies as $movie) : ?>
        <?php $categories = retrieveAllCategoriesForMovie($movie['id']) ?>
        <tr>
            <td> <img height=50 src="/movies/public/images/poster/<?= $movie['poster']; ?>"></td>
            <td class="text-wrap fw-bold lh-sm"><?= $movie['title'];?></th>
            <td><?= $movie['duration']; ?></td>
            <td><?= $movie['releaseDate']; ?></td>
            <td><?= $movie['director']; ?></td>
            <td>
                <?php foreach ($categories as $category) : ?>
                <?= $category['name']; ?>
                <?php endforeach; ?>
            </td>
            <td><?= $movie['note']; ?></td>
            <td><a href="../films/afficher/<?= $movie['id'] ?>"><img id="read" src="/movies/public/images/read.svg" height="20"></a></td>
            <td><a href="../films/editer/<?= $movie['id'] ?>"><img id="update" src="/movies/public/images/edit.svg" height="20"></a></td>
            <td><a href="../films/supprimer/<?= $movie['id'] ?>" onclick="return confirm('êtes-vous sûr de vouloir supprimer cette fiche ?')"><img id="delete" src="/movies/public/images/bin.svg" height="20"></a> </td>
        </tr>
        <?php endforeach; ?>


    </tbody>
</table>

<?php get_footer('admin'); ?>