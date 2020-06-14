<section>
    <div class="container">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><strong><?= $title; ?></strong></h1>

        <?= form_open() ?>


        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-60 col-lg-6">
                <div class="title text-center">
                    <p>Halaman ini adalah halaman diagnosa, Silahkan Anda memilih gejala dengan cara mencentang beberapa pilihan dibawah ini sesuai dengan gejala yang anda rasakan...</p>
                    <hr>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="cekAll" /></th>
                        <th>Kode Gejala</th>
                        <th>Nama Gejala</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list as $li) : ?>
                        <tr>
                            <th><input type="checkbox" name="gejala[]" value="<?php echo $li['id']; ?>"></th>
                            <th><?= $li['kode_gejala']; ?></th>
                            <th><?= $li['nama_gejala']; ?></th>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
        <br>
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 pb-4" float="center">
                <button type="submit" class="btn btn-primary" name="save" data-toggle="modal" data-target="#exampleModalLong">Proses</button>
            </div>
            <br>
        </div>
    </div>
    <?= form_close() ?>
    </div>

</section>
<!-- /.container-fluid -->



<!-- End of Main Content -->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><strong>Hasil Konsultasi</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="mb-3">
                    <h4>Halo <?= $user['name']; ?> Berikut Hasil Diagnosa Anda</h4>
                </div>
                <div class="card mb-3">
                    <h5 class="card-header">Gejala yang Anda pilih</h5>
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
                <div class="card">
                    <h5 class="card-header">Hasil Diagnosa</h5>
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="<?= base_Url('user/laporan_pdf/'); ?>" target="_blank" type="button" class="btn btn-primary pr-1"><i class="fas fa-print"> Print</i></a>

            </div>
        </div>
    </div>
</div>