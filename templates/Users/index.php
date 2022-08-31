<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Operators Table</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th><?= $this->Paginator->sort('firstname', 'Nome') ?></th>
                                    <th><?= $this->Paginator->sort('lastname', 'Cognome') ?></th>
                                    <th><?= $this->Paginator->sort('username', 'Username') ?></th>
                                    <th><?= $this->Paginator->sort('email', 'Email') ?></th>
                                    <th><?= $this->Paginator->sort('token', 'Token') ?></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td><?= $user->firstname ?> </td>
                                        <td><?= h($user->lastname) ?> </td>
                                        <td><?= h($user->username) ?> </td>
                                        <td><?= h($user->email) ?> </td>
                                        <td><?= h($user->token) ?> </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
    </div>
</div>
</body>

