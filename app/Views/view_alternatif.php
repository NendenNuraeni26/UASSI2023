<!-- File: views/view_alternatif.php -->

<div class="col-md-12">
    <div class="card-body">
        <h1 class="card-title" style="color:green">Tabel Alternatif</h1>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">No</th>
                        <th>Alternatif</th>
                        <th>C1</th>
                        <th>C2</th>
                        <th>C3</th>
                        <th>C4</th>
                        <th>C5</th>
                        <th>C6</th>
                        <th>C7</th>
                        <th style="width: auto;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 0;
                    foreach ($dataAlternatif as $row):
                        $no++; ?>
                        <tr>
                            <td>
                                <?= $no; ?>
                            </td>
                            <td>
                                <?= $row->nama_usaha; ?>
                            </td>
                            <td>
                                <?= $row->C1; ?>
                            </td>
                            <td>
                                <?= $row->C2; ?>
                            </td>
                            <td>
                                <?= $row->C3; ?>
                            </td>
                            <td>
                                <?= $row->C4; ?>
                            </td>
                            <td>
                                <?= $row->C5; ?>
                            </td>
                            <td>
                                <?= $row->C6; ?>
                            </td>
                            <td>
                                <?= $row->C7; ?>
                            </td>
                            <td>
                                <form action="<?= site_url('Home/deleteAlternatif/' . $row->id_konversi) ?>" method="post"
                                    style="display:inline;">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus alternatif ini?')">Hapus</button>
                                </form>
                                <a href="<?= site_url('Home/showEditAlternatif/' . $row->id_konversi) ?>"
                                    class="btn btn-warning btn-sm">Edit</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>