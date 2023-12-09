<!-- Add this content to your form_kriteria.php view file -->
<div class="col-md-12">
    <div class="card-body">
        <h1 class="card-title" style="color:green">Form Kriteria</h1>

        <!-- Display validation errors if any -->
        <?php if (isset($validation)): ?>
            <div class="alert alert-danger" role="alert">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>

        <!-- Form to add Kriteria -->
        <form method="post" action="<?= base_url('home/insertKriteria') ?>">
            <div class="form-group">
                <label for="nama_kriteria">Kode Kriteria</label>
                <input type="text" class="form-control" name="kode_kriteria" value="<?= set_value('kode_kriteria') ?>">
            </div>
            <div class="form-group">
                <label for="nama_kriteria">Nama Kriteria</label>
                <input type="text" class="form-control" name="nama_kriteria" value="<?= set_value('nama_kriteria') ?>">
            </div>

            <div class="form-group">
                <label for="nilai_kriteria">Nilai Kriteria</label>
                <input type="text" class="form-control" name="nilai_kriteria"
                    value="<?= set_value('nilai_kriteria') ?>">
            </div>
            <div class="form-group">
                <label for="tipe_kriteria">Tipe Kriteria</label>
                <input type="text" class="form-control" name="tipe_kriteria" value="<?= set_value('tipe_kriteria') ?>">
            </div>

            <button type="submit" class="btn btn-primary">Add Kriteria</button>
        </form>
    </div>
</div>