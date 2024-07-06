<?php get_header('Liste des films', 'admin'); ?>
<style>
    <!-- /* Empêche le texte de passer sur deux lignes */
    th {
        white-space: nowrap;
        width: auto;
    }
</style>
<div class="table-responsive">
    <table class="table">
        <caption class="caption-top">Liste des films</caption>
        <thead>
            <tr>
                <th scope="col">Poster</th>
                <th scope="col">Title</th>
                <th scope="col" class="d-xl-table-cell d-sm-none">Duration</th>
                <th scope="col" class="d-xl-table-cell d-sm-none">Release date</th>
                <th scope="col" class="d-xl-table-cell d-sm-none">Director</th>
                <th scope="col">Categories</th>
                <th scope="col" class="d-xl-table-cell d-sm-none">Note</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php $movies = retrieveAllMovies() ; ?>
            <?php foreach ($movies as $movie) : ?>
            <?php $categories = retrieveAllCategoriesForMovie($movie['id']) ?>
            <tr>
                <td scope="row"> <img height=50 src="/movies/public/images/poster/<?= $movie['poster']; ?>"></td>
                <td scope="row"class="text-wrap fw-bold lh-sm"><?= $movie['title'];?></th>
                <td scope="row" class="d-xl-table-cell d-sm-none"><?= $movie['duration']; ?></td>
                <td scope="row" class="d-xl-table-cell d-sm-none"><?= $movie['releaseDate']; ?></td>
                <td scope="row"class="d-xl-table-cell d-sm-none"><?= $movie['director']; ?></td>
                <td scope="row">
                    <?php foreach ($categories as $category) : ?>
                    <?= $category['name']; ?>
                    <?php endforeach; ?>
                </td>
                <td scope="row" class="d-xl-table-cell d-sm-none"><?= $movie['note']; ?></td>
                <td scope="row"><a href="../films/afficher/<?= $movie['id'] ?>"><img id="read" src="/movies/public/images/read.svg" height="20"></a></td>
                <td scope="row"><a href="../films/editer/<?= $movie['id'] ?>"><img id="update" src="/movies/public/images/edit.svg" height="20"></a></td>
                <td scope="row"><a href="../films/supprimer/<?= $movie['id'] ?>" onclick="return confirm('êtes-vous sûr de vouloir supprimer cette fiche ?')"><img id="delete" src="/movies/public/images/bin.svg" height="20"></a> </td>
            </tr>
            <?php endforeach; ?>
    
    
        </tbody>
    </table>
</div>    

<?php get_footer('admin'); ?>