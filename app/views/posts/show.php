<?php require APPROOT . '/views/inc/header.php'; ?>
    <a href="<?php echo URLROOT; ?>/posts" class="btn btn-light mb-3 mt-4"><i class="fas fa-arrow-left"></i> Back</a>
    <br>
    <div class="card card-body mt-4">
        <div class="d-flex justify-content-between align-items-start mb-3">
            <h1><?php echo $data['post']->title; ?></h1>
            <div class="d-flex justify-content-end p-2 mb-3">
                Written by <?php echo $data['post']->is_anonymous ? 'Anonymous' : $data['user']->name; ?><br><?php echo $data['post']->create_at; ?>
            </div>
        </div>
        <div class="mt-3 fs-6 lh-lg">
            <?php echo nl2br(htmlspecialchars($data['post']->body)); ?>
        </div>
    </div>
    
    <?php if($data['post']->user_id == $_SESSION['user_id']) : ?>
        <br>
        <div class="d-flex justify-content-between align-items-center w-100">

            <a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']->id; ?>" class="btn btn-dark"> Edit</a>

            <form class="m-0" action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->id; ?>" method="post">
            <input type="submit" value="Delete" class="btn btn-danger">
            </form>

        </div>

    <?php endif; ?>

<?php require APPROOT . '/views/inc/footer.php'; ?>
