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
                                <div class="col-md-6 mb-2" >
                                    <select class="custom-select t-send-user">
                                        <option>Scegli l'utente a cui inviare il messaggio</option>
                                        <?php foreach ($clients as $client) : ?>
                                            <option value="<?=$client->auth_code?>"><?= $client->name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-6" >
                                    <button class="btn t-send-button btn-primary">Invia</button>
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

