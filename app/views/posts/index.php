<?php require APPROOT . '/views/inc/header.php'; ?>

    <?php if(isset($_SESSION['post_message'])) : ?>
        <div class="position-fixed top-0 start-50 translate-middle-x p-3" style="z-index: 1055;">
            <div id="liveToast" class="toast show align-items-center text-bg-success border-0" role="alert">
                <div class="d-flex">
                    <div class="toast-body">
                        <?php echo $_SESSION['post_message']; ?>
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                </div>
            </div>
        </div>
        <?php unset($_SESSION['post_message']); ?>
    <?php endif; ?>

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4">

        <h1 class="mb-3 mt-4">
            What should Caerah improve?</h1>

        <a href="<?php echo URLROOT; ?>/posts/add" class="btn btn-success align-self-start align-self-md-center">
            <i class="fa-solid fa-pencil"></i> Add Post
        </a>
    </div>
    <?php foreach($data['posts'] as $post) : ?>
        <div class="card card-body mb-3">
            <h2 class="card-title"><?php echo $post->title; ?></h2>
            <div class="bg-light px-2 py-1 mb-2 d-inline-block rounded">
                <span class="fs-6">
                    Written by <?php echo $post->is_anonymous ? 'Anonymous' : $post->name; ?> on <?php echo $post->postCreate; ?>
                </span>
            </div>
                <p class="card-text mb-1 mt-2"
                    style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                    <?php echo htmlspecialchars($post->body); ?>
                </p>
            <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>" class="btn btn-dark mb-1 mt-2">More</a>
        </div>
    <?php endforeach; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>