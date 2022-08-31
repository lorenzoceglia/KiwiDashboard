<body class="bg-gradient-primary">
    <div>
       <div class="container">
            <div class="row">
                <div class="col-xl col-lg col-md"></div>
                <div class="col-xl-6 col-lg-6 col-md-9">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="p-5">
                                <div class="text-center">
                                    <div class="sidebar-brand-icon">
                                        <i class="fas fa-kiwi-bird fa-5x" style="color:#4e73df"></i>
                                    </div>
                                    <h1 class="h4 text-primary mb-4"><?=$login_message?></h1>
                                </div>
                                <form class="user" method="post" action="<?= $app_root . 'login'; ?>">
                                    <div class="form-group">
                                        <input name="email" type="email" class="form-control form-control-user"
                                               id="email" aria-describedby="emailHelp"
                                               placeholder="<?=$email_input ?>">
                                    </div>
                                    <div class="form-group">
                                        <input name="password" type="password" class="form-control form-control-user"
                                               id="password" placeholder="<?=$password_input ?>">
                                    </div>
                                    <button class="btn btn-primary btn-user btn-block" type="submit">Login</button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <span class="small" href="forgot-password.html"><?=$client_name;?></span>
                                </div>
                                <?php if(false): ?>

                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html"><?=$forgot_password?></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <?= $this->Flash->render(); ?>
                    </div>
                </div>
                <div class="col-xl col-lg col-md"></div>
            </div>
       </div>
    </div>
</body>

