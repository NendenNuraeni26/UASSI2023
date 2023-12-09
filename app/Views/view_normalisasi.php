<div class="col-md-12">
    <div class="card-body">
        <h1 class="card-title" style="color:green">Tabel Hasil Normalisasi</h1>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Alternatif</th>
                        <?php foreach ($dataMb[array_key_first($dataMb)] as $kriteria => $normalizedValue): ?>
                            <th>
                                <?= $kriteria . ' Normalized'; ?>
                            </th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $counter = 1; ?>
                    <?php foreach ($dataMb as $usaha => $normalizedValues): ?>
                        <tr>
                            <td>
                                <?= $counter++; ?>
                            </td>
                            <td>
                                <?= $usaha; ?>
                            </td>
                            <?php foreach ($normalizedValues as $normalizedValue): ?>
                                <td>
                                    <?= $normalizedValue; ?>
                                </td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>