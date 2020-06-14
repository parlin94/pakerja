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

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRelasiModal">Add New Relasi</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Diagnosa</th>
                        <th scope="col">Nama Gejala</th>
                        <th scope="col">Nilai MD</th>
                        <th scope="col">Nilai MB</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($gabung as $g) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $g['nama_diagnosa']; ?></td>
                            <td><?= $g['nama_gejala']; ?></td>
                            <td><?= $g['md']; ?></td>
                            <td><?= $g['mb']; ?></td>
                            <td>
                                <a href="<?= base_url('relasi/editRelasi/') . $g['id'] ?>" class="badge badge-success modalRelasiTampil" data-toggle="modal" data-target="#newRelasiModal" data-id="<?= $g['id']; ?>">edit</a>
                                <a href="<?= base_url('relasi/deleteRelasi/') . $g['id']; ?>" class="badge badge-danger">delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->

<!-- Modal -->
<div class="modal fade" id="newRelasiModal" tabindex="-1" role="dialog" aria-labelledby="newRelasiModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-relasi" id="newRelasiModalLabel">Add Relasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('relasi'); ?>" method="post" aria-required="true">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <select name="diagnosa_id" id="diagnosa_id" class="form-control">
                            <option value="">Select Diagnosa</option>
                            <?php foreach ($diag as $d) : ?>
                                <option value="<?= $d['id']; ?>"><?= $d['nama_diagnosa']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="gejala_id" id="gejala_id" class="form-control">
                            <option value="">Select Gejala</option>
                            <?php foreach ($gejala as $gj) : ?>
                                <option value="<?= $gj['id']; ?>"><?= $gj['nama_gejala']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control " id="md" name="md" placeholder="Nilai md">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="mb" name="mb" placeholder="Nilai mb">
                    </div>

                </div>
                <div class="modal-footer modal-addRelasi">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $("#md").on("keyup", function() {
        var valid = /^d{0,15}(.d{0,9})?$/.test(this.value),
            val = this.value;

        if (!valid) {
            console.log("Invalid input!");
            this.value = val.substring(0, val.length - 1);
        }
    });
    $("#mb").on("keyup", function() {
        var valid = /^d{0,15}(.d{0,9})?$/.test(this.value),
            val = this.value;

        if (!valid) {
            console.log("Invalid input!");
            this.value = val.substring(0, val.length - 1);
        }
    });
</script>