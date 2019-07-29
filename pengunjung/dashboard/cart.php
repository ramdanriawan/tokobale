<?php include 'cekLogin.php'; ?>


<?php include "../_headerpenggunjung.php"; ?>
<?php error_reporting(0) ?>

<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">

<style type="text/css">
.img-orders {
    display: block;
    max-width: 50px;
    height: auto;
    margin-left: auto;
    margin-right: auto;
}
table tr td{
    border:1px solid #FFFFFF;    
}

table tr th {
    background:#eee;    
}

.panel-shadow {
    box-shadow: rgba(0, 0, 0, 0.3) 7px 7px 7px;
}
</style>

<div class="container" style="margin: 20px 0; font-size: 17px;">
    <div class="row">
        <div class="col-md-12 col-sm-12 content">
            <div class="panel panel-info panel-shadow">
                <div class="panel-heading">
                    <h3>
                        Data Produk Di Keranjang
                    </h3>
                </div>
                    <form action="./pembelianStore.php" method='post'>
                    <div class="panel-body" style="padding-top: 20px;"> 
                            
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Deskripsi</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 
                                    echo "<input type='hidden' name='orders[kodepelanggan]' value='$_COOKIE[id]'/>";
                                    echo "<input type='hidden' name='orders[tgl_order]' value='" . date('Y-m-d') . "'/>";


                                    $resultOrdersTemp = mysqli_query($conn, "SELECT * FROM orders_temp where kodepelanggan='$_COOKIE[id]'");

                                    $total_semua_produk = 0;
                                    $total_bayar = 0;
                                    $total_berat = 0;
                                    $total = 0;
                                    $data_total = 0;
                                    $i = 0;
                                    while ($ordersTemp = mysqli_fetch_assoc($resultOrdersTemp))
                                    {
                                        $resultProduk = mysqli_query($conn, "SELECT * FROM produk where kodeproduk='$ordersTemp[kodeproduk]'");

                                        $produks = mysqli_fetch_assoc($resultProduk);
                                        $harga_produk = $produks['harga_produk'] - ($produks['harga_produk'] / 100 * $produks['diskon']);

                                        $total += $harga_produk * $ordersTemp["jumlah"];
                                        $total_semua_produk += fromRupiah($total);

                                        $total_berat += $produks['berat'] * $ordersTemp["jumlah"];

                                        $harga_produk = toRupiah($harga_produk);
                                        $data_harga = fromRupiah($harga_produk);
                                        $totalRupiah = $total;
                                        $total = toRupiah($total);
                                        $data_total += fromRupiah($total);
                                        $total_semua_produk = toRupiah($total_semua_produk);

echo <<<EOD
                                        <input type='hidden' name='produks[$i][kodeproduk]' value='$ordersTemp[kodeproduk]'/>
                                        <input type='hidden' name='produks[$i][size]' value='$ordersTemp[size]'/>
                                        <input type='hidden' name='produks[$i][harga_satuan]' value='$produks[harga_produk]'/>
                                        <input type='hidden' name='produks[$i][total]' value='$totalRupiah' class='totalRupiah'/>
                                        <tr data-total-berat='$total_berat'>
                                        <td><img src="../../images/$produks[foto1]" class="img-orders"></td>
                                        <td class='beratProduk'><strong>$produks[nama_produk]</strong><p>Size : $ordersTemp[size] <br> <span class='beratProduk'>$produks[berat]</span>KG</p></td>
                                        <td>
                                        <input required class="jumlah form-control" type="number" name='produks[$i][jumlah]' value="$ordersTemp[jumlah]" min='1' data-index-jumlah="$i" max='$produks[stok]'>
                                        <a href="./destroyOrderTemp.php?id=$ordersTemp[id_order_temp]" class="btn btn-primary" onclick='return confirm("Yakin akan hapus produk ini dari keranjang?");'><i class="fa fa-trash-o"></i></a>
                                        </td>
                                        <td class='harga_produk' data-harga='$data_harga'>$harga_produk</td>
                                        <td data-index-total="$i" class='total'><span class='spanTotal'>$total</span> (Diskon: $produks[diskon]%)</td>
                                        </tr>
EOD;
                                    $i++;
                                    }
                                    ?>

                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <td colspan="6">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="text-right">Total Product</td>
                                            <td class="totalProduct"><?php echo toRupiah($data_total); ?></td>
                                        </tr>
                                        <tr>

                                        <?php 
                                        $resultPelanggan = mysqli_query($conn, "SELECT * FROM pelanggan where kodepelanggan='$_COOKIE[id]'");
                                        $pelanggans = mysqli_fetch_assoc($resultPelanggan);

                                        $resultKotaPelanggan = mysqli_query($conn, "SELECT * FROM kota where id_kota='$pelanggans[id_kota]'");
                                        $kotaPelanggan = mysqli_fetch_assoc($resultKotaPelanggan);

                                        ?>

                                        <td colspan="4" class="text-right">Alamat</td>
                                        <td>
                                            <textarea required class="form-control" cols="2" name="orders[alamat_pengirim]"><?php echo $pelanggans['alamat'] ?></textarea>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="4" class="text-right">Total Shipping</td>
                                        <td>
                                            <!-- select kota -->
                                            <select required name="orders[id_kota]" id="id_kota" data-ongkir-default='<?php echo $kotaPelanggan["ongkir"] ?>'>
                                                <option value="">--Pilih Kota--</option>
                                                <?php 


                                                $resultKota = mysqli_query($conn, "SELECT * FROM kota");
                                                ?>



                                                <?php while ($kotas = mysqli_fetch_assoc($resultKota))
                                                {
                                                    $selected = $kotas['id_kota'] == $pelanggans['id_kota'] ? "selected": "";

                                                    if ( $selected = 'selected')
                                                    {
                                                        $total_shipping_fee = $kotas['ongkir'];
                                                    }

                                                    echo "<option value='$kotas[id_kota]' $selected class='form-control input-sm' data-ongkir='$kotas[ongkir]'>$kotas[nama_kota] (ongkir JNE: " . toRupiah($kotas['ongkir']) . ")</option>";
                                                } ?>
                                            </select>

                                            <!-- select kurir -->
                                            <!-- <select name="orders[kurir_id]" required>
                                                <option value="">- Pilih Kurir -</option>
                                                <?php 
                                                $resultKurir = mysqli_query($conn, "SELECT * FROM kurirs");
                                                while ($kurirs = mysqli_fetch_assoc($resultKurir)) {
                                                    echo '<option value="'.$kurirs['kurir_id'].'">'.$kurirs['kurir'].'</option>';
                                                } ?>
                                            </select> -->
                                            <span>x </span>
                                            <span id="shippingCount"><?php echo $total_berat; ?></span>
                                            <span>(<span id='diBulatkan'><?php echo round(ceil($total_berat), 1); ?></span> KG</span>)
                                            <span>=</span>
                                            <input type="hidden" name="orders[ongkir]" value="<?php echo $total_shipping_fee * ceil($total_berat); ?>" class="ongkir" >
                                            <span id="totalShippingCount"><?php echo toRupiah($total_shipping_fee * ceil($total_berat)); ?></span>


                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-right"><strong>Total Bayar</strong></td>
                                        <td><?php 

                                        $total_bayar = $data_total === 0 ? 0 : toRupiah(fromRupiah($data_total)  + ($total_shipping_fee * ceil($total_berat)));

                                        echo "<span id='total_bayar' data-total-bayar-default='$data_total'>$total_bayar</span>";

                                        ?></td>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    <a href="./produk.php" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Lanjutkan Belanja</a>
                        <!-- <a href="pembelian.php?halaman=pembelian&kodepelanggan=<?php echo $_COOKIE['id'];; ?>" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-chevron-right">Checkout</span></a> -->

                        <button type="submit" class="btn btn-primary pull-right" <?php echo $total_semua_produk === 0 ? "disabled" : ""; ?> onclick='return confirm("Yakin data barang dicart anda sudah benar?"); '>
                            <span class="glyphicon glyphicon-chevron-right"> Checkout</span>
                        </button>
                  

                    <?php 


                    if (isset($_POST["checkout"])) 
                    {
                    //ambil data dari orders
                        // $rmysqli_query($conn, "SELECT * FROM kota WHERE id_kota=$pelanggans[id_kota]");
                        // mysqli_fetch_assoc()
                        $tggl_order = date('Y-m-d');
                        $alamat = $_POST['alamat_pengirim'];
                        $kotaPelanggan = $_POST['id_kota'];
                        $kurir= $_POST['kurir_id'];

                        //menyimpan data ke tabel orders
                        mysqli_query($conn, "INSERT INTO orders (id_order,kodepelanggan, tgl_order, alamat_pengirim, id_kota, status_order, status_konfirmasi, status_terima, kurir_id, resi)
                            VALUES 
                            ('',$_COOKIE[id], '$tggl_order', 'alamat', '$kotaPelanggan','Belum Dibayar','Menunggu Konfirmasi', 'Belum Diterima', '$kurir', '')");
                       echo mysqli_error($_POST); 

                    }



                    ?>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            function toRupiah(nStr)
            {
                nStr += '';
                x = nStr.split('.');
                x1 = x[0];
                x2 = x.length > 1 ? '.' + x[1] : '';
                var rgx = /(\d+)(\d{3})/;
                while (rgx.test(x1)) {
                    x1 = x1.replace(rgx, '$1' + '.' + '$2');
                }
                return "Rp" + x1 + x2;
            }

            function totalBayar()
            {
                //menghitung semua total dari total harga
                var totalProduct = 0;
                for (var i = 0; i < $(`.totalRupiah`).length; i++)
                {
                    totalProduct += parseInt($(".totalRupiah").eq(i).val());
                }

                $('.totalProduct').text(toRupiah(totalProduct));

                var totalShippingCount = (
                    parseInt($('select#id_kota option:selected').data('ongkir')) * 
                    parseInt(Math.ceil($('#shippingCount').text()))
                    );


                $('.ongkir').val(totalShippingCount);

                $('#totalShippingCount').text(toRupiah(totalShippingCount));
                
                $('#total_bayar').text(toRupiah(totalProduct + totalShippingCount));
            }

            $('#id_kota').on('change', function(){
                totalBayar();
            });

            $(document).on('keyup', '.jumlah', function(e){
                var rowHarga = $(`.table tbody tr:eq(${$(this).data('index-jumlah')}) td.harga_produk`);
                var rowTotal = $(`.table tbody tr:eq(${$(this).data('index-jumlah')}) td.total span.spanTotal`);
                var rowBerat = $(`.table tbody tr:eq(${$(this).data('index-jumlah')}) td.beratProduk span.beratProduk`);

                var totalBerat = 0;
                for (var i = 0; i < $(".table tbody tr").length; i++) 
                {
                     totalBerat += parseFloat($(`.table tbody tr:eq(${i}) td.beratProduk span.beratProduk`).text()) * 
                        parseFloat($(`.jumlah:eq(${i})`).val());
                     ;

                }

                $('#shippingCount').text(totalBerat.toFixed(1));
                $('#diBulatkan').text(Math.ceil(totalBerat.toFixed(1)));

                var total = parseInt(rowHarga.data('harga')) * parseInt($(this).val())
                rowTotal.text(toRupiah(total));

                $(".totalRupiah").eq($(this).data('index-jumlah')).val(total);

                totalBayar();
            });
        });
    </script>

    <?php include "../_footer.php"; ?>
