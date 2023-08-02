<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container pt-5">
        <h4>Cek Ongkir Disini</h4>
        <div class="col-12">
            <form action="<?= site_url('Main/cek') ?>" method="post">
                <div class="d-flex gap-1">
                    <div class="col-6">
                        <label for="">Pilih Kota Asal</label>
                        <div class="input-group mb-3">
                                <select class="form-select" id="inputGroupSelect02" name="asal" required>
                                    <option selected>Pilih Kota Asal</option>
                                    <?php if($kota) : ?>
                                        <?php foreach($kota->rajaongkir->results as $kt): ?>
                                            <option value="<?php echo $kt->city_id ?>"><?php echo $kt->city_name ?></option>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="">Pilih Kota Tujuan</label>
                        <div class="input-group mb-3">
                                <select class="form-select" id="inputGroupSelect02" name="tujuan" required>
                                    <option selected>Pilih Kota Asal</option>
                                    <?php if($kota) : ?>
                                        <?php foreach($kota->rajaongkir->results as $kt): ?>
                                            <option value="<?php echo $kt->city_id ?>"><?php echo $kt->city_name ?></option>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                </select>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <label for="">Berat</label>
                    <input type="text" name="berat" class="form-control" required>
                </div>
                <div class="col-12 mt-4">
                    <input type="submit" value="Cek Ongkir" class="btn btn-primary btn-sm" name="submit">
                </div>
            </form>
        </div>
    </div>

    <?php
    if(isset($_POST['submit'])){
        echo '
        <div class="container">
        <div class="card col-12">
            <div class="card-body">
                <strong>Asal Pengiriman</strong>
                <div><?php echo $hasil->rajaongkir->origin_details->city_name ?></div>
            </div>
            
        </div>
    </div>';

    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>