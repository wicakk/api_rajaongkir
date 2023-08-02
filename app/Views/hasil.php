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
            <form>
                <div class="d-flex gap-1">
                    <div class="col-6">
                        <label for="">Pilih Kota Asal</label>
                        <div class="input-group mb-3">
                                <select class="form-select" id="inputGroupSelect02" name="asal" disabled>
                                    <option selected disabled>Pilih Kota Asal</option>
                                </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <label for="">Pilih Kota Tujuan</label>
                        <div class="input-group mb-3">
                                <select class="form-select" id="inputGroupSelect02" name="tujuan" disabled>
                                    <option selected>Pilih Kota Asal</option>
                                </select>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <label for="">Berat</label>
                    <input type="text" name="berat" class="form-control" disabled>
                </div>
                <div class="col-12 mt-4">
                    <input type="submit" value="Cek Ongkir" class="btn btn-primary btn-sm" name="submit" disabled>
                </div>
            </form>
            
        </div>
    </div>

    <!-- hasil -->

    <div class="container mt-2">
        <div class="card col-12">
            <div class="card-body  bg-white rounded-2">
                <div class="col-12 d-flex">
                    <div class="col-4">
                        <strong>Asal Pengiriman : </strong>
                        <div><?php echo $hasil->rajaongkir->origin_details->city_name ?></div>
                        <strong>Provinsi : </strong>
                        <div><?php echo $hasil->rajaongkir->origin_details->province ?></div>
                    </div>
                    <div class="col-4">
                        <strong>Asal Tujuan : </strong>
                        <div><?php echo $hasil->rajaongkir->origin_details->city_name ?></div>
                        <strong>Provinsi : </strong>
                        <div><?php echo $hasil->rajaongkir->origin_details->province ?></div>
                    </div>
                    <div class="col-4">
                        <strong>Berat : </strong>
                        <div><?php echo $hasil->rajaongkir->query->weight/1000 ?>Kg</div>
                    </div>
                </div>
                <div class="col-12">
                    <strong>Harga : </strong>
                    <div>
                        <?php foreach ($hasil->rajaongkir->results[0]->costs as $biaya) :?>
                            <?php echo $biaya->service ?>: <?php echo "Rp." .$biaya->cost[0]->value ?> (<b><?php echo  $biaya->cost[0]->etd ?> hari</b>) <br>
                        <?php endforeach ?>
                    
                    </div>
                </div>
                <hr>
                <div class="col-12 mt-3">
                    <strong>kurir : </strong>
                    <div><?php echo $hasil->rajaongkir->query->courier ?></div>
                </div>

            </div>
            
        </div>
        <div class="col-12 mt-4">
            <a href="/">
                <input type="submit" value="Back" class="btn btn-danger btn-sm" name="back">

            </a>
            </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>