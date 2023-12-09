<div class="col-md-12">
    <div class="card-body">
        <h1 class="card-title" style="color:green">Tabel Data Kriteria</h1>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Kriteria</th>
                        <th>Nama Kriteria</th>
                        <th>Nilai Kriteria</th>
                        <th>Tipe Kriteria</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dataKriteria as $row): ?>
                        <tr>
                            <td>
                                <?= $row->kode_kriteria; ?>
                            </td>
                            <td>
                                <?= $row->nama_kriteria; ?>
                            </td>
                            <td>
                                <?= $row->nilai_kriteria; ?>
                            </td>
                            <td>
                                <?= $row->tipe_kriteria; ?>
                            </td>
                            <td>
                                <!-- Tombol Hapus -->
                                <form action="<?= site_url('Home/deleteKriteria/' . $row->id_kriteria) ?>" method="post"
                                    style="display:inline;">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus kriteria ini?')">Hapus</button>
                                </form>

                                <!-- Tombol Edit -->
                                <a href="<?= site_url('Home/showEditForm/' . $row->id_kriteria) ?>"
                                    class="btn btn-warning btn-sm">Edit</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>