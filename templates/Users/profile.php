
            <?=$this->Flash->render();?>

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">My Profile</h6>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?= $app_root . 'users/profile'; ?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstname">First Name</label>
                                        <input type="text" name="firstname" class="form-control" id="firstname" value="<?=$logged_user['firstname']?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname">Last Name</label>
                                        <input type="text" name="lastname" class="form-control" id="lastname" value="<?=$logged_user['lastname']?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Email</label>
                                        <input type="email" name="email" class="form-control" id="username" value="<?=$logged_user['email']?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control password" id="password" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm-password">Confirm Password</label>
                                        <input type="password" name="confirm-password" class="form-control confirm-password" id="confirm-password" placeholder="Password">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" value="submit" class="btn btn-primary submit-profile">Submit</button>
                            <div class="form-group text-danger password-alert">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

