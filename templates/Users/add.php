
<?=$this->Flash->render();?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Operator</h6>
        </div>
        <div class="card-body">
            <form method="post" action="<?= $app_root . 'users/add'; ?>">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input required type="text" name="firstname" class="form-control" id="firstname" value=""/>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input required type="text" name="lastname" class="form-control" id="lastname" value="">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input required type="text" name="username" class="form-control" id="username" value="">
                        </div>
                        <div class="form-group">
                            <label for="username">Email</label>
                            <input required type="email" name="email" class="form-control" id="email" value="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input required type="password" name="password" class="form-control password" id="password" placeholder="Password">
                        </div>
                    </div>
                </div>
                <button type="submit" value="submit" class="btn btn-primary submit-operator">Submit</button>
            </form>
        </div>
    </div>
</div>

