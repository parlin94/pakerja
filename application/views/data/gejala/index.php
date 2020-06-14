<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><strong><?= $title; ?></strong></h1>



    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newGejalaModal">Add Data Gejala</a>

            <div class="table-responsive">
                <table class="table table-bordered display" id="tbl">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Kode</th>
                            <th class=" text-center" scope="col">Nama</th>
                            <th scope="col" class=" text-center">Keterangan</th>
                            <th scope="col" class=" text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($list as $l) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $l['kode_gejala']; ?></td>
                                <td class=" text-justify  "><?= $l['nama_gejala']; ?></td>
                                <td class=" text-justify"><?= $l['keterangan']; ?></td>

                                <td>
                                    <a href="<?= base_url('gejala/editGejala/') . $l['id'] ?>" class="badge badge-success text-center modalGejalaTampil" data-toggle="modal" data-target="#newGejalaModal" data-id="<?= $l['id']; ?>">edit</a>
                                    <a href="<?= base_url('gejala/deleteGejala/') . $l['id']; ?>" class="badge badge-danger text-center">delete</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <!-- <script>
                    $(document).ready(function() {
                        $('#tbl').DataTable({
                            "paging": true,
                            "ordering": true,
                            "info": true
                        });

                    });
                </script> -->

                <!-- <script type="text/javascript">
                    $(function() {
                        $("#tbl_diagnosa").dataTable({
                            "iDisplayLength": 6,
                            "processing": true,
                            "client Side": true,
                        });

                        $('.xtooltip').tooltip();
                    });

                    // function edit(kd, nm, warna, harga, stok) {
                    //     $("#kd").val(kd);
                    //     $("#nm").val(nm);
                    //     $('#warna').val(warna);
                    //     $('#harga').val(harga);
                    //     $('#stok').val(stok);
                    //     $('#act').val('edit');
                    // }
                </script> -->
            </div>

        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>

<!-- End of Main Content -->

<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="newGejalaModal" tabindex="-1" role="dialog" aria-labelledby="newGejalaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content formGejala">
            <div class="modal-header">
                <h5 class="modal-Gejala" id="newGejalaModalLabel">Add Data </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('gejala/index'); ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <input type="text" class="form-control" name="kode gejala" id="kode gejala" value="<?= $l['kode_gejala']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama gejala" name="nama gejala" placeholder="Nama Gejala" value="<?= $l['nama_gejala']; ?>">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3" placeholder="Deskripsi" value="<?= $l['keterangan']; ?>"></textarea>
                    </div>

                    <div class="form-group">

                    </div>
                </div>
                <div class="modal-footer modal-addGejala">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>