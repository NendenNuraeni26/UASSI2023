<div class="col-md-12">
    <div class="card-body">
        <h1 class="card-title" style="color:green">Tabel Data Maximum & Minimum</h1>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Alternatif</th>
                        <th>Maximum</th>
                        <th>Minimum</th>
                        <th>Y</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dataMb as $row): ?>
                        <tr>
                            <td>
                                <?= $row['nama_usaha']; ?>
                            </td>
                            <td>
                                <?= $row['Maximum']; ?>
                            </td>
                            <td>
                                <?= $row['Minimum']; ?>
                            </td>
                            <td>
                                <?= $row['Y']; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>