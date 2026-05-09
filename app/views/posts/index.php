<?php require APPROOT . '/views/inc/header.php'; ?>
    <?php flash('post_message'); ?>

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">

        <h1 class="mb-3 mt-4">
            Apa yang perlu Caerah perbaiki?</h1>

        <a href="<?php echo URLROOT; ?>/posts/add" class="btn btn-success align-self-start align-self-md-center">
            <i class="fa-solid fa-pencil"></i> Add Post
        </a>
    </div>
    <?php foreach($data['posts'] as $post) : ?>
        <div class="card card-body mb-3">
            <h4 class="card-title"><?php echo $post->title; ?></h4>
            <div class="bg-light p-2 mb-3">
                Written by <?php echo $post->name; ?> on <?php echo $post->postCreate; ?>
            </div>
            <p class="card-text"><?php echo $post->body; ?></p>
            <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>" class="btn btn-dark">More</a>
        </div>
    <?php endforeach; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>