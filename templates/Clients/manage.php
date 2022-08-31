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
                        <h6 class="m-0 font-weight-bold text-primary">Users Table</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th><?= $this->Paginator->sort('firstname', 'Name') ?></th>
                                    <th><?= $this->Paginator->sort('lastname', 'Surname') ?></th>
                                    <th><?= $this->Paginator->sort('nickname', 'Nickname') ?></th>
                                    <th><?= $this->Paginator->sort('auth_code', 'Auth Token') ?></th>
                                    <th>Operations</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($clients as $client): ?>
                                    <tr>
                                        <td><?= $client->name ?> </td>
                                        <td><?= $client->surname ?> </td>
                                        <td><?= $client->nickname ?> </td>
                                        <td><?= $client->auth_code ?> </td>
                                        <td class="d-flex justify-content-between">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit-modal-<?=$client->auth_code;?>">
                                                Edit
                                            </button>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal-<?=$client->auth_code;?>">
                                                Delete
                                            </button>
                                        </td>
                                        <div class="modal fade" id="edit-modal-<?=$client->auth_code;?>" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit <?= $client->name ?></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method="post" action="<?= $app_root . 'clients/edit'; ?>">
                                                        <div class="modal-body">
                                                                <input type="hidden" name="usr-id" value="<?= $client->id ?>">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Name</label>
                                                                    <input type="text" name="name" class="form-control" aria-describedby="emailHelp" value="<?= $client->name ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Surname</label>
                                                                    <input type="text" name="surname" class="form-control" aria-describedby="emailHelp" value="<?= $client->surname ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Nickname</label>
                                                                    <input type="text" name="nickname" class="form-control" aria-describedby="emailHelp" value="<?= $client->nickname ?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Auth Token</label>
                                                                    <input type="text" name="auth_code" class="form-control" aria-describedby="emailHelp" value="<?= $client->auth_code ?>">
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="delete-modal-<?=$client->auth_code;?>" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete <?= $client->name ?></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are You Sure?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <form method="post" action="<?= $app_root . 'clients/delete'; ?>">
                                                            <input type="hidden" name="usr-id" value="<?=$client->id?>">
                                                            <button type="submit" class="btn btn-danger">Delete It!</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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

