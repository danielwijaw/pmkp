<div class="card o-hidden border-0 shadow-lg my-5">
  <div class="card-body p-0">
    <div class="col-lg-12">
      <div class="p-5">
        <div class="text-center">
          <h1 class="h4 text-gray-900 mb-4">Mutan</h1>
            <hr/>
            <fieldset>
              <legend>Form Upload Excel Waktu Tunggu Rawat Jalan</legend>
              <form method="post" enctype="multipart/form-data" action="<?php echo base_url('/backend') ?>/waktu_tunggu_rawat_jalan">
                  <div class="form-group">
                      <label for="exampleInputFile">File Upload</label>
                      <input type="file" name="berkas_excel" required>
                      <legend>Format Excel</legend>
                      <table border="1" width="100%" style='border-collapse: collapse'>
                          <tr>
                              <td>Tanggal, Jam<br/>(11/26/2019 1:28:58 PM)</td>
                              <td>Nama Perawat<br/>(VARYA)</td>
                              <td>Poli<br/>(ANAK)</td>
                              <td>Nama Dokter<br/>(DR NUR FAIZAH SPA)</td>
                              <td>Jam Datang<br/>(7:00:00 AM)</td>
                              <td>Jam Pulang<br/>(8:00:00 AM)</td>
                              <td>Nama Pasien<br/>(shafiulla arsy hafidsyah, an)</td>
                              <td>Nomor Visit<br/>(133828)</td>
                          </tr>
                      </table>
                  </div>
                  <button class="btn btn-primary" type="submit">Hitung</button>
              </form>
          </fieldset>
          <hr/>
          <br/>
          <fieldset>
              <legend>Form Upload Excel Kecepatan Respon Terhadap Komplain</legend>
              <form method="post" enctype="multipart/form-data" action="<?php echo base_url('/backend') ?>/kecepatan_respon_komplain">
                  <div class="form-group">
                      <label for="exampleInputFile">File Upload</label>
                      <input type="file" name="berkas_excel" required>
                      <legend>Format Excel</legend>
                      <table border="1" width="100%" style='border-collapse: collapse'>
                          <tr>
                              <td>Tanggal, Jam<br/>(11/26/2019 1:28:58 PM)</td>
                              <td>Nama Perawat<br/>(VARYA)</td>
                              <td>Poli<br/>(ANAK)</td>
                              <td>Nama Dokter<br/>(DR NUR FAIZAH SPA)</td>
                              <td>Jam Datang<br/>(7:00:00 AM)</td>
                              <td>Jam Pulang<br/>(8:00:00 AM)</td>
                              <td>Nama Pasien<br/>(shafiulla arsy hafidsyah, an)</td>
                              <td>Nomor Visit<br/>(133828)</td>
                          </tr>
                      </table>
                  </div>
                  <button class="btn btn-primary" type="submit">Hitung</button>
              </form>
          </fieldset>
          <hr/>
          <br/>
          <fieldset>
              <legend>Form Upload Excel Rekap Kepatuhan Identifikasi Pasien</legend>
              <form method="post" enctype="multipart/form-data" action="<?php echo base_url('/backend') ?>/rekap_kepatuhan_identifikasi_pasien">
                  <div class="form-group">
                      <label for="exampleInputFile">File Upload</label>
                      <input type="file" name="berkas_excel" required>
                      <legend>Format Excel</legend>
                      <table border="1" width="100%" style='border-collapse: collapse'>
                          <tr>
                              <td>Tanggal, Jam<br/>(11/26/2019 1:28:58 PM)</td>
                              <td>Nama Pengambil Data<br/>(Boleh Dikosongkan)</td>
                              <td>Tempat Pengambilan Sample<br/>(Laboratorium)</td>
                              <td>Nama<br/>(Boleh Dikosongkan)</td>
                              <td>Profesi Peetugas Pemberi Layanan<br/>(Perawat)</td>
                              <td>Layanan Kesehatan Yang Diberikan<br/>(Pemberian Obat)</td>
                              <td>Apakah Petugas Menanyakan Nama<br/>(Ya)</td>
                              <td>Apakah Petugas Menanyakan Tanggal Lahir<br/>(Ya)</td>
                              <td>Nama Pengambil Sample<br/>(Cici)</td>
                              <td>Nama Petugas Yang Dinilai<br/>(Devi)</td>
                          </tr>
                      </table>
                  </div>
                  <button class="btn btn-primary" type="submit">Hitung</button>
              </form>
          </fieldset>
          <hr/>
          <br/>
          <fieldset>
              <legend>Form Upload Excel Rekap Resiko Jatuh</legend>
              <form method="post" enctype="multipart/form-data" action="<?php echo base_url('/backend') ?>/rekap_resiko_jatuh">
                  <div class="form-group">
                      <label for="exampleInputFile">File Upload</label>
                      <input type="file" name="berkas_excel" required>
                      <legend>Format Excel</legend>
                      <table border="1" width="100%" style='border-collapse: collapse'>
                          <tr>
                              <td>Tanggal, Jam<br/>(11/26/2019 1:28:58 PM)</td>
                              <td>Nama Pengambil Sample<br/>(FARIS)</td>
                              <td>Tempat Pengambilan Data<br/>(Gerbera)</td>
                              <td>Nama Pasien<br/>(An Raynand)</td>
                              <td>RM<br/>(134298)</td>
                              <td>Apakah Skrining Risiko Jatuh IGD/Rawat Jalan<br/>(Ya)</td>
                              <td>Apakah Assesment Awal Risiko Jatuh Rawat Inap<br/>(Ya)</td>
                              <td>Apakah Assesment Ulang Risiko Jatuh<br/>(Ya)</td>
                              <td>Apakah Edukasi Pencegahan Jatuh<br/>(Ya)</td>
                              <td>Tanggal Masuk<br/>(12/12/2019)</td>
                              <td>Tanggal Keluar<br/>(12/12/2019)</td>
                          </tr>
                      </table>
                  </div>
                  <button class="btn btn-primary" type="submit">Hitung</button>
              </form>
          </fieldset>
        </div>
      </div>
    </div>
  </div>
</div>