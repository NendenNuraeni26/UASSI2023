<div class="col-md-12">
    <div class="card-body">
        <h1 class="card-title" style="color:green">Tabel Data Perankingan</h1>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Alternatif</th>
                        <th>Y</th>
                        <th>Ranking</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dataMb as $data): ?>
                        <tr>
                            <td>
                                <?= $data['nama_usaha']; ?>
                            </td>
                            <td>
                                <?= $data['Y']; ?>
                            </td>
                            <td>
                                <?= $data['Ranking']; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>