<?php include 'cekLogin.php'; ?>


<?php include "../_headerpenggunjung.php"; ?>


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

<div class="container"><br><br><br><br>
        <div class="spec ">
            <h3>Keranjang Belanja</h3>
            <div class="ser-t">
                <b></b>
                <span><i></i></span>
                <b class="line"></b>
            </div>
        </div>
    

<div class="container" style="margin: 20px 0;">
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


                                    $result = mysqli_query($conn, "SELECT * FROM orders_temp where kodepelanggan='$_COOKIE[id]'");

                                    $total_semua_produk = 0;
                                    $total_bayar = 0;
                                    $total_berat = 0;
                                    $i = 0;
                                    while ($orders_temp = mysqli_fetch_assoc($result))
                                    {
                                        $result2 = mysqli_query($conn, "SELECT * FROM produk where kodeproduk='$orders_temp[kodeproduk]'");

                                        $orders_temp2 = mysqli_fetch_assoc($result2);
                                        $harga_produk = $orders_temp2['harga_produk'] - ($orders_temp2['harga_produk'] / 100 * $orders_temp2['diskon']);

                                        $total = $harga_produk * $orders_temp["jumlah"];
                                        $total_semua_produk += fromRupiah($total);

                                        $total_berat += $orders_temp2['berat'];

                                        $harga_produk = toRupiah($harga_produk);
                                        $data_harga = fromRupiah($harga_produk);
                                        $totalRupiah = $total;
                                        $total = toRupiah($total);
                                        $data_total = fromRupiah($total);
                                        $total_semua_produk = toRupiah($total_semua_produk);

echo <<<EOD
                                        <input type='hidden' name='produks[$i][kodeproduk]' value='$orders_temp[kodeproduk]'/>
                                        <input type='hidden' name='produks[$i][size]' value='$orders_temp[size]'/>
                                        <input type='hidden' name='produks[$i][harga_satuan]' value='$orders_temp2[harga_produk]'/>
                                        <input type='hidden' name='produks[$i][total]' value='$totalRupiah' class='totalRupiah'/>
                                        <tr data-total-berat='$total_berat'>
                                        <td><img src="../../images/$orders_temp2[foto1]" class="img-orders"></td>
                                        <td><strong>$orders_temp2[nama_produk]</strong><p>Size : $orders_temp[size] <br> $orders_temp2[berat]KG</p></td>
                                        <td>
                                        <input required class="jumlah form-control" type="number" name='produks[$i][jumlah]' value="$orders_temp[jumlah]" min='1' data-index-jumlah="$i" max='$orders_temp2[stok]'>
                                        <a href="./destroyOrderTemp.php?id=$orders_temp[id_order_temp]" class="btn btn-primary" onclick='return confirm("Yakin akan hapus produk ini dari keranjang?");'><i class="fa fa-trash-o"></i></a>
                                        </td>
                                        <td class='harga_produk' data-harga='$data_harga'>$harga_produk</td>
                                        <td data-index-total="$i" class='total'><span class='spanTotal'>$total</span> (Diskon: $orders_temp2[diskon]%)</td>
                                        </tr>
EOD;
                                    $i++;
                                    }

                                    ?>


                                    <tr>
                                        <td colspan="6">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-right">Total Product</td>
                                        <td class="totalProduct"><?php echo $total_semua_produk; ?></td>
                                    </tr>
                                    <tr>

                                        <?php 
                                        $result3 = mysqli_query($conn, "SELECT * FROM pelanggan where kodepelanggan='$_COOKIE[id]'");
                                        $orders_temp3 = mysqli_fetch_assoc($result3);

                                        $result4 = mysqli_query($conn, "SELECT * FROM kota where id_kota='$orders_temp3[id_kota]'");
                                        $orders_temp4 = mysqli_fetch_assoc($result4);

                                        ?>

                                        <td colspan="4" class="text-right">Alamat</td>
                                        <td>
                                            <textarea required class="form-control" cols="2" name="orders[alamat_pengirim]"><?php echo $orders_temp3['alamat'] ?></textarea>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="4" class="text-right">Total Shipping</td>
                                        <td>
                                            <!-- select kota -->
                                            <select required name="orders[id_kota]" id="id_kota" data-ongkir-default='<?php echo $orders_temp4["ongkir"] ?>'>
                                                <option value="">--Pilih Kota--</option>
                                                <?php 


                                                $result5 = mysqli_query($conn, "SELECT * FROM kota");
                                                ?>



                                                <?php while ($orders_temp5 = mysqli_fetch_assoc($result5))
                                                {
                                                    $selected = $orders_temp5['id_kota'] == $orders_temp3['id_kota'] ? "selected": "";

                                                    if ( $selected = 'selected')
                                                    {
                                                        $total_shipping_fee = $orders_temp5['ongkir'];
                                                    }

                                                    echo "<option value='$orders_temp5[id_kota]' $selected class='form-control input-sm' data-ongkir='$orders_temp5[ongkir]'>$orders_temp5[nama_kota] (ongkir: " . toRupiah($orders_temp5['ongkir']) . ")</option>";
                                                } ?>
                                            </select>

                                            <!-- select kurir -->
                                            <select name="orders[kurir_id]" required id="orderKurir">
                                                <option value="">- Pilih Kurir -</option>
                                                <?php 
                                                $result7 = mysqli_query($conn, "SELECT * FROM kurirs");
                                                while ($rows = mysqli_fetch_assoc($result7)) {
                                                    echo "<option value='$rows[kurir_id]' data-ongkir='$rows[ongkir]'>$rows[kurir]</option>";
                                                } ?>
                                            </select>
                                            <span>x </span>
                                            <span id="shippingCount"><?php echo $total_berat; ?></span>
                                            <span>(Dibulatkan: <?php echo ceil($total_berat); ?>)</span>
                                            <span>=</span>
                                            <input type="hidden" name="orders[ongkir]" value="<?php echo $total_shipping_fee * $total_berat; ?>" class="ongkir" >
                                            <span id="totalShippingCount"><?php echo toRupiah($total_shipping_fee * ceil($total_berat)); ?></span>


                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-right"><strong>Total Bayar</strong></td>
                                        <td><?php 

                                        $result6 = mysqli_query($conn, "SELECT * FROM kota where id_kota=$orders_temp3[id_kota]");
                                        $orders_temp6 = mysqli_fetch_assoc($result6);

                                        $total_bayar = $total_semua_produk === 0 ? 0 : toRupiah(fromRupiah($total_semua_produk) + $orders_temp6['ongkir']);

                                        echo "<span id='total_bayar' data-total-bayar-default='$total_semua_produk'>$total_bayar</span>";

                                        ?></td>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <a href="./produk.php" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;Lanjutkan Belanja</a>
                        <!-- <a href="pembelian.php?halaman=pembelian&kodepelanggan=<?php echo $_COOKIE['id'];; ?>" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-chevron-right">Checkout</span></a> -->

                        <button type="submit" class="btn btn-primary pull-right" <?php echo $total_semua_produk === 0 ? "disabled" : ""; ?>>
                            <span class="glyphicon glyphicon-chevron-right"> Checkout</span>
                        </button>
                  

                </div>
                </form>
            </div>
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

                var totalShippingCount = (parseInt($('select#id_kota option:selected').data('ongkir')) * parseInt(Math.ceil($('#shippingCount').text())));

                $('#total_bayar').text(toRupiah(totalProduct + totalShippingCount));

                $('.ongkir').val(totalShippingCount);
                
                $('#totalShippingCount').text(toRupiah(totalShippingCount));
            }

            $('#id_kota').on('change', function(){
                totalBayar();
            });

            $(document).on('keyup', '.jumlah', function(e){
                var rowHarga = $(`.table tbody tr:eq(${$(this).data('index-jumlah')}) td.harga_produk`);
                var rowTotal = $(`.table tbody tr:eq(${$(this).data('index-jumlah')}) td.total span.spanTotal`);

                var total = parseInt(
                        (rowHarga.data('harga')) * parseInt($(this).val())
                    );
                        
                // var total = parseInt(
                //         (rowHarga.data('harga')) * parseInt($(this).val()) + 
                //         (parseInt($(this).val()) * parseInt($("#orderKurir option:selected").data('ongkir'))
                //     );

                rowTotal.text(toRupiah(total));
                $(".totalRupiah").eq($(this).data('index-jumlah')).val(total);

                totalBayar();
            });
        });
    </script>

    <?php include "../_footer.php"; ?>
