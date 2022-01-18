<h2><?= esc($title) ?></h2>

<!-- this function is used to report errors related to CSRF protection -->
<?= session()->getFlashdata('error') ?>
<!-- function is used to report errors related to form validation. -->
<?= service('validation')->listErrors() ?>

<form action="/news/create" method="post">
    <?= csrf_field() ?>

    <label for="title">Título</label>
    <input type="input" name="title" /><br />

    <label for="body">Texto</label>
    <textarea name="body" cols="45" rows="4"></textarea><br />

    <input type="submit" name="submit" value="Create news item" />
</form>