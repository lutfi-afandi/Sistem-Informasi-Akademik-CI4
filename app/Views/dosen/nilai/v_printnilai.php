   <?= $this->include('template/head') ; ?>

   <script>
    var css = '@page { size: 29.7cm 21cm ; }',
    head = document.head || document.getElementsByTagName('head')[0],
    style = document.createElement('style');

    style.type = 'text/css';
    style.media = 'print';

    if (style.styleSheet){
      style.styleSheet.cssText = css;
  } else {
      style.appendChild(document.createTextNode(css));
  }

  head.appendChild(style);

  window.print();

</script>
<body onload="window.print();">
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="page-header">
                        <i class="fa fa-file-archive-o"></i> Nilai <?= $jadwal['matkul']; ?> - <?= $jadwal['nama_kelas']; ?> - Semester : <?= $ta['semester']; ?> - <?= $ta['ta']; ?>
                        <small class="pull-right">Tanggal :<?= date('d M y'); ?></small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row">
                <div class="col-sm-12 table-sm">
                    <div class="row">
                        <div class="col-sm-6">
                            <table class=" table-sm">
                                <tr>
                                    <th>Program Studi</th>
                                    <td class="text-center" width="20px"> : </td>
                                    <td><?= $jadwal['prodi']; ?></td>
                                </tr>
                                <tr>
                                    <th>Fakultas</th>
                                    <td class="text-center" width="20px"> : </td>
                                    <td><?= $jadwal['fakultas']; ?></td>
                                </tr>
                                <tr>
                                    <th>Kode Matkul</th>
                                    <td class="text-center" width="20px"> : </td>
                                    <td><?= $jadwal['kode_matkul']; ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-sm-6">
                            <table class=" table-sm">
                                <tr>
                                    <th>Mata Kuliah</th>
                                    <td class="text-center" width="20px"> : </td>
                                    <td><?= $jadwal['matkul']; ?></td>
                                </tr>
                                <tr>
                                    <th>Jadwal</th>
                                    <td class="text-center" width="20px"> : </td>
                                    <td><?= $jadwal['hari']; ?> - <?= $jadwal['waktu']; ?></td>
                                </tr>
                                <tr>
                                    <th>Dosen Pengampu</th>
                                    <td class="text-center" width="20px"> : </td>
                                    <td><?= $jadwal['nama_dosen']; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    
                </div>

            </div>

            <div class="col-sm-12">
            </div>

            <div class="row">

                <div class="col-sm-12">
                    <table class="table table-striped table-sm table-bordered" id="example2">
                        <thead>
                            <tr class="bg-gradient-success">
                                <th class="text-center">No</th>
                                <th class="text-center">NIM</th>
                                <th class="text-center" width="70%">Mahasiswa</th>
                                <th class=" text-center">Nilai Akhir</th>
                                <th class="text-center">Huruf Mutu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            $sks = 0;
                            foreach ($mhs as $key => $value) { ?>

                                <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <td><?= $value['nim']; ?></td>
                                    <td><?= $value['nama_mhs']; ?></td>

                                    <td class="text-center"><?= $value['nilai_akhir']; ?></td>
                                    <td class="text-center"><?=  $value['nilai_huruf'] ; ?></td>

                                </tr>
                            <?php } ?>
                        </table>
                        
                    </tbody>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- accepted payments column -->
        <div class="col-sm-4">
            <h4>
            </h4>

        </div>

        <!-- /.col -->
        <div class="col-sm-4">

        </div>
        <!-- /.col -->
        <div class="col-sm-4">
            Bandar Lampung, <?= date('d M Y'); ?>
            <br>
            <br>
            <br><br>
            <?= $jadwal['nama_dosen']; ?>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- ./wrapper -->
</body>

</html>