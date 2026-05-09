<?php require APPROOT . '/views/inc/header.php'; ?>

    <main class="flex-grow-1">
        <div class="jumbotron jumbotron-fluid">
            <div class="container mb-3 mt-4">
            <h1 class="display-3"><?php echo $data['title']; ?></h1>
            <p class="lead"><?php echo str_replace('Caerah', '<strong>Caerah</strong>', htmlspecialchars($data['description'])); ?></p>
            </div>
        </div>
    </main>

<?php require APPROOT . '/views/inc/footer.php'; ?></footer>

 