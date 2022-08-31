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
                        <h6 class="m-0 font-weight-bold text-primary">Invia Messaggio</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-8">
                                <div class="col-md-12 mb-2" >
                                    <label for="exampleFormControlTextarea1">Scrivi il tuo messaggio</label>
                                </div>
                                <div class="col-md-12 mb-4" >
                                    <textarea class="form-control t-send-text" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                                <div class="col-md-12 mb-2" >
                                    <label for="exampleFormControlTextarea1">Scegli l'utente a cui inviare il messaggio</label>
                                </div>
                                <div class="col-md-12 mb-2" >
                                    <select class="custom-select t-send-user">
                                        <?php foreach ($clients as $client) : ?>
                                            <option value="<?=$client->auth_code?>"><?= $client->name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-12" >
                                    <button class="btn t-send-button btn-primary">Invia</button>
                                </div>
                                <div class="error-container mt-3">
                                    <div class="alert warning alert-warning alert-dismissible d-none fade show" role="alert">
                                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        <span class="text-center m-1 warning-alert-message">
                                        </span>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="alert success alert-success alert-dismissible d-none fade show" role="alert">
                                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                                        <span class="text-center m-1 success-alert-message">
                                        </span>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>                                    </div>
                                    <div class="alert danger alert-danger alert-dismissible d-none fade show" role="alert">
                                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        <span class="text-center m-1 danger-alert-message">
                                        </span>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">

                            </div>

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

