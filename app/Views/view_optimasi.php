<div class="col-md-12">
    <div class="card-body">
        <h1 class="card-title" style="color:green">Tabel Hasil Optimasi</h1>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                    <tr>
                        <th>ID Konversi</th>
                        <th>Alternatif</th>
                        <th>C1</th>
                        <th>C2</th>
                        <th>C3</th>
                        <th>C4</th>
                        <th>C5</th>
                        <th>C6</th>
                        <th>C7</th>
                    </tr>

                    <?php foreach ($dataMb as $row): ?>
                        <tr>
                            <td>
                                <?= $row['id_konversi']; ?>
                            </td>
                            <td>
                                <?= $row['nama_usaha']; ?>
                            </td>
                            <td>
                                <?= round($row['C1'], 8); ?>
                            </td>
                            <td>
                                <?= round($row['C2'], 8); ?>
                            </td>
                            <td>
                                <?= round($row['C3'], 8); ?>
                            </td>
                            <td>
                                <?= round($row['C4'], 8); ?>
                            </td>
                            <td>
                                <?= round($row['C5'], 8); ?>
                            </td>
                            <td>
                                <?= round($row['C6'], 8); ?>
                            </td>
                            <td>
                                <?= round($row['C7'], 8); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
            </table>
        </div>
    </div>
</div>