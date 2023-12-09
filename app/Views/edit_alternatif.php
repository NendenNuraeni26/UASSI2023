<!-- File: views/edit_alternatif.php -->

<div class="col-md-12">
    <div class="card-body">
        <h1 class="card-title" style="color:green">Edit Alternatif</h1>

        <!-- Display validation errors if any -->
        <?php if (isset($validation)): ?>
            <div class="alert alert-danger" role="alert">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>

        <!-- Form to edit Alternatif -->
        <form method="post" action="<?= base_url('home/editAlternatif/' . $alternatif->id_konversi) ?>">
            <div class="form-group">
                <label for="nama_usaha">Nama Usaha</label>
                <input type="text" class="form-control" name="nama_usaha"
                    value="<?= set_value('nama_usaha', $alternatif->nama_usaha) ?>">
            </div>

            <div class="form-group">
                <label for="C1">C1</label>
                <input type="text" class="form-control" name="C1" value="<?= set_value('C1', $alternatif->C1) ?>">
            </div>

            <div class="form-group">
                <label for="C2">C2</label>
                <input type="text" class="form-control" name="C2" value="<?= set_value('C2', $alternatif->C2) ?>">
            </div>

            <div class="form-group">
                <label for="C3">C3</label>
                <input type="text" class="form-control" name="C3" value="<?= set_value('C3', $alternatif->C3) ?>">
            </div>

            <div class="form-group">
                <label for="C4">C4</label>
                <input type="text" class="form-control" name="C4" value="<?= set_value('C4', $alternatif->C4) ?>">
            </div>

            <div class="form-group">
                <label for="C5">C5</label>
                <input type="text" class="form-control" name="C5" value="<?= set_value('C5', $alternatif->C5) ?>">
            </div>

            <div class="form-group">
                <label for="C6">C6</label>
                <input type="text" class="form-control" name="C6" value="<?= set_value('C6', $alternatif->C6) ?>">
            </div>

            <div class="form-group">
                <label for="C7">C7</label>
                <input type="text" class="form-control" name="C7" value="<?= set_value('C7', $alternatif->C7) ?>">
            </div>

            <!-- Add other form fields for C8, C9, C10, etc., as needed -->

            <button type="submit" class="btn btn-primary">Update Alternatif</button>
        </form>
    </div>
</div>