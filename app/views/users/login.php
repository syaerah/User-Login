<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
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
               
                <h2>Login</h2>
                <p>Please fill in your credentials to log in</p>
                <form action="<?php echo URLROOT; ?>/users/login" method="post">
                    <div class="form-group">
                        <label for="email">Email: <sup>*</sup></label>
                        <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data ['email_err'])) ? 'is-invalid' : ''; ?>"value="<?php echo $data['email']; ?>">
                        <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password: <sup>*</sup></label>
                        <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data ['password_err'])) ? 'is-invalid' : ''; ?>"value="<?php echo $data['password']; ?>">
                        <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                    </div>

                    <div class="d-flex gap-3 mt-3">
                        <button type="submit" class="btn btn-success flex-fill py-2">
                            Login
                        </button>
                        <a href="<?php echo URLROOT; ?>/users/register" class="btn btn-outline-secondary py-2 text-center">
                            No account? Register here
                        </a>
                    </div>
                </form>     
            </div>
        </div>
    </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>