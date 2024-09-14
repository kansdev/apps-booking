<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome to CodeIgniter 4!</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="stylesheet" href="<?= base_url('dist/css/bootstrap.css') ?>">

    <style>
        body {
            background: url(<?= base_url('dist/img/lapangan.jpg') ?>);
            background-repeat: no-repeat;
            background-size: cover;
        }

        input {
            background-color: transparent !important;
        }

        ::placeholder {
            color: white !important;
        }

        textarea:focus,
        select,
        option,
        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="datetime"]:focus,
        input[type="datetime-local"]:focus,
        input[type="date"]:focus,
        input[type="month"]:focus,
        input[type="time"]:focus,
        input[type="week"]:focus,
        input[type="number"]:focus,
        input[type="email"]:focus,
        input[type="url"]:focus,
        input[type="search"]:focus,
        input[type="tel"]:focus,
        input[type="color"]:focus,
        input[type="radio"]:focus,
        .uneditable-input:focus {
            border-color: rgba(255, 255, 255, 0.8) !important;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(255, 255, 255, 0.6) !important;
            outline: 0 none !important;
        }

        textarea,
        select,
        input[type="text"],
        input[type="password"],
        input[type="datetime"],
        input[type="datetime-local"],
        input[type="date"],
        input[type="month"],
        input[type="time"],
        input[type="week"],
        input[type="number"],
        input[type="email"],
        input[type="url"],
        input[type="search"],
        input[type="tel"],
        input[type="color"],
        .uneditable-input {
            color: rgba(255, 255, 255, 0.8) !important;
            background-color: transparent !important;
        }

        ::-webkit-calendar-picker-indicator {
            filter: invert(1);
        }

        .btn {
            border-color: white !important;
        }

        .btn-outline-light:hover {
            color: black !important;
        }
    </style>
</head>

<body>

    <div class="container mt-4">

        <div class="card bg-dark bg-opacity-75 text-white">
            <div class="card-body text-center">
                <h1>Selamat Datang</h1>
                <p>Silahkan isi data dibawah ini</p>
            </div>
        </div>

        <!-- Pesan Error jika form tidak di isi lengkap -->
        <?php if (!empty(session()->getFlashdata('error'))) : ?>
            <div class="alert alert-danger d-flex align-items-center mt-4">
                <div>
                    <h5>Ada data yang belum di isi, silahkan di isi terlebih dahulu</h5>
                    <?= session()->getFlashdata('error') ?>
                </div>
            </div>
        <?php endif;
        ?>
        <!-- End Message -->

        <div class="card bg-dark bg-opacity-75 text-white mt-4">
            <div class="card-body">
                <!-- Form untuk pengisian data -->
                <form action="<?= base_url('booking') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="Nama Lengkap" class="col-form-label fw-bold">Nama Lengkap</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?= old('nama') ?>">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-2">
                                <label for="nomor-telepon" class="col-form-label fw-bold">Nomor Telepon</label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" name="nomor_telepon" class="form-control" placeholder="Nomor Telepon" value="<?= old('nomor_telepon') ?>">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-2">
                                <label for="nomor-telepon" class="col-form-label fw-bold">Email</label>
                            </div>
                            <div class="col-md-10">
                                <input type="email" name="email" class="form-control" placeholder="Email" value="<?= old('email') ?>">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-2">
                                <label for="tanggal" class="col-form-label fw-bold">Tanggal</label>
                            </div>
                            <div class="col-md-10">
                                <input type="date" name="tanggal" class="form-control" value="<?= old('tanggal') ?>">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-2">
                                <label for="jam_mulai" class="col-form-label fw-bold">Jam Mulai</label>
                            </div>
                            <div class="col-md-10">
                                <input type="time" name="jam_mulai" class="form-control" value="<?= old('jam_mulai') ?>">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-2">
                                <label for="jam_selesai" class="col-form-label fw-bold">Jam Selesai</label>
                            </div>
                            <div class="col-md-10">
                                <input type="time" name="jam_selesai" class="form-control" value="<?= old('jam_selesai') ?>">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-2">
                                <label for="jenis_lapangan" class="col-form-label fw-bold">Pilih Jenis Lapangan</label>
                            </div>
                            <div class="col-md-10 mt-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_lapangan" id="inlineRadio1" value="Sintetis" <?= set_radio('jenis_lapangan', 'Sintetis') ?> checked>
                                    <label class="form-check-label" for="inlineRadio1">Sintetis</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_lapangan" id="inlineRadio2" value="Matras" <?= set_radio('jenis_lapangan', 'Sintetis') ?>>
                                    <label class="form-check-label" for="inlineRadio2">Matras</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_lapangan" id="inlineRadio3" value="Plur" <?= set_radio('jenis_lapangan', 'Sintetis') ?>>
                                    <label class="form-check-label" for="inlineRadio3">Pluran (semen)</label>
                                </div>
                            </div>
                        </div>
                        <div class="float-end">
                            <button class="btn btn-outline-light btn-md mt-3 fw-bold text-white" type="submit" name="submit">Selanjutnya</button>
                        </div>
                    </div>
                </form>
                <!-- End Form -->
            </div>
        </div>

        <h5 class="text-center mt-4 text-white">Powered by <a href="#" class="text-white">seringcoding.com</a></h5>
    </div>


</body>

</html>