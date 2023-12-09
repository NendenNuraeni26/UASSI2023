<!-- File: views/edit_kriteria.php -->

<div class="col-md-12">
    <div class="card-body">
        <h1 class="card-title" style="color:green">Edit Kriteria</h1>

        <!-- Display validation errors if any -->
        <?php if (isset($validation)): ?>
            <div class="alert alert-danger" role="alert">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>

        <!-- Form to edit Kriteria -->
        <form method="post" action="<?= base_url('home/editKriteria/' . $kriteria->id_kriteria) ?>">
            <div class="form-group">
                <label for="kode_kriteria">Kode Kriteria</label>
                <input type="text" class="form-control" name="kode_kriteria"
                    value="<?= set_value('kode_kriteria', $kriteria->kode_kriteria) ?>" readonly>
            </div>

            <div class="form-group">
                <label for="nama_kriteria">Nama Kriteria</label>
                <input type="text" class="form-control" name="nama_kriteria"
                    value="<?= set_value('nama_kriteria', $kriteria->nama_kriteria) ?>">
            </div>

            <div class="form-group">
                <label for="nilai_kriteria">Nilai Kriteria</label>
                <input type="text" class="form-control" name="nilai_kriteria"
                    value="<?= set_value('nilai_kriteria', $kriteria->nilai_kriteria) ?>">
            </div>

            <div class="form-group">
                <label for="tipe_kriteria">Tipe Kriteria</label>
                <input type="text" class="form-control" name="tipe_kriteria"
                    value="<?= set_value('tipe_kriteria', $kriteria->tipe_kriteria) ?>">
            </div>

            <button type="submit" class="btn btn-primary">Update Kriteria</button>
        </form>
    </div>
</div>