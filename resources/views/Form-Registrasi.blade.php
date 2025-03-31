@extends('Layout/Master')
    @section('content')
    <section id="hero" class="hero section">
    <style>
    .form-section {
        padding: 20px;
    }
    .required:after {
        content: " *";
        color: red;
    }
    .section-header {
        color: #EF8318;
        margin-bottom: 20px;
        padding-top: 20px;
    }
    </style>

    <div class="container">
      <div class="row" style="justify-content: center; padding-top:200px">
        <div class="col-lg-10 custom-box-shadow">
          <section id="team" class="team section">
            <div class="container">
                <div class="container section-title" style="padding-bottom:10px" data-aos="fade-up">
                    <h2>Form Registrasi</h2>
                </div>
                <div class="form-section">
                    <form action="{{ route('form-registrasi') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Data Pribadi -->
                        <h4 class="section-header">Data Pribadi</h4>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label required">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama_lengkap" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label required">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label required">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggal_lahir" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label required">Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label required">Alamat Domisili</label>
                            <textarea class="form-control" name="alamat_domisili" rows="3" required></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label required">Nomor Telepon/HP</label>
                                <input type="tel" class="form-control" name="nomor_telepon" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label required">Email Pribadi</label>
                                <input type="email" class="form-control" name="email_pribadi" required>
                            </div>
                        </div>

                        <!-- Data Pekerjaan -->
                        <h4 class="section-header">Data Pekerjaan</h4>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label required">NIK (8 Digit)</label>
                                <input type="text" class="form-control" name="nik" maxlength="8" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label required">Unit Kerja</label>
                                <input type="text" class="form-control" name="unit_kerja" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Nomor Ekstensi</label>
                                <input type="text" class="form-control" name="nomor_ekstensi">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label required">Email Kantor</label>
                                <input type="email" class="form-control" name="email_kantor" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Komunitas</label>
                            <input type="text" class="form-control" name="komunitas">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Pengalaman Organisasi</label>
                            <textarea class="form-control" name="pengalaman_organisasi" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Serikat Pekerja Selain HIKA</label>
                            <input type="text" class="form-control" name="serikat_pekerja_lain">
                        </div>

                        <div class="mb-3">
                            <label class="form-label required">Upload Foto</label>
                            <input type="file" class="form-control" name="foto" accept="image/*" required>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="agreement" name="agreement" required>
                                <label class="form-check-label" for="agreement">
                                    Dengan ini mengajukan permohonan untuk dapat menjadi anggota Himpunan Karyawan Bio Farma (Hika-BF) dan
                                    memberikan kuasa pada HIKA-BF untuk melakukan pemotongan atas pendapatan yang saya terima dari PT Biofarma
                                    (Persero) untuk pembayaran iuran wajib organisasi sesuai dengan ketentuan yang berlaku.
                                </label>
                            </div>
                        </div>
                        <div class="text-end mt-4">
                            <button type="submit" class="btn btn-primary" style="background-color: #55A9B6; border-color: #007bff;">Submit Registrasi</button>
                        </div>
                    </form>
                </div>
            </div>
          </section>
        </div>
      </div>
    </div>
    </section>
@endsection
