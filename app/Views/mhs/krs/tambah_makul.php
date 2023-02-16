<div class="table-responsive">

    <table id="example1" class="table table-bordered table-striped table-sm text-xs" width="100%">
        <thead class="bg-gradient-success text-center">
            <tr>
                <th width="5%" class="text-center">No</th>
                <th class="text-center">Kode</th>
                <th class="text-center">Mata Kuliah</th>
                <th width="8%" class="text-center">SKS</th>
                <th class="text-center">Kelas</th>
                <th class="text-center">Ruangan</th>
                <th class="text-center">Dosen</th>
                <th class="text-center">Waktu</th>
                <th width="5%" class="text-center">Kuota</th>
                <th width="5%" class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>

            <?php $db = \Config\Database::connect();
            $no = 1;
            if(empty($MakulDitawarkan)){?>

            <?php }
            foreach ($MakulDitawarkan as $key => $value) { ?>
            <?php $jml = $db->table('tbl_krs')->where('id_jadwal', $value['id_jadwal'])
                    ->countAllResults(); ?>
            <tr>
                <td class="text-center"><?= $no++; ?></td>
                <td class="text-center"><?= $value['kode_matkul']; ?></td>
                <td>
                    <?= $value['matkul']; ?>
                    (<?= $value['kode_prodi']; ?>)
                </td>
                <td class="text-center"><?= $value['sks']; ?></td>
                <td class="text-center"><?= $value['nama_kelas']; ?> - <?= $value['tahun_angkatan']; ?></td>
                <td><?= $value['ruangan']; ?> - <?= $value['gedung']; ?></td>
                <td><?= $value['nama_dosen']; ?></td>
                <td>
        <small>
            Hari : <?= $value['hari']; ?>
            <br>
           <span class="text-danger">T.A  :<?= $value['ta']; ?></span>
        </small>
    </td>
                <td class="text-center"><span class="label label-success"><?= $jml; ?>/<?= $value['kuota']; ?></span></td>
                <td class="text-center">
                    <?php if ($jml == $value['kuota']) { ?>
                    <span class="badge badge-danger">Full</span>
                    <?php } else { ?>
                    <a href="<?= base_url('krs/tambahmatkul/' . $value['id_jadwal']).'/' ; ?><?= isset($_GET['id']) ? $_GET['id'] : '';  ?>" class="btn btn-success btn-flat btn-xs"><i class="fa fa-plus"></i></a>
                    <?php } ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>