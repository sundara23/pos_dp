<?php include 'header3.php'; ?>
<html>
<head>
    <meta charset="utf-8">
    <title>CETAK INVOICE FASKAL</title>

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td{
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body>
<?php
$kdtoko = $_SESSION['kd_toko'];
$id_admin = $_SESSION['id'];
if(isset($_GET['id'])){
    $id_invoice = $_GET['id'];
}else{
    header("location:index.php");
}
?>
<div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
        <tr class="top">
            <td colspan="2">
                <?php
                $kos = mysqli_query($config,"select * from transaksi,kostumer where trx_invoice='$id_invoice' and trx_customer=kostumer_id");
                $k=mysqli_fetch_assoc($kos);
                ?>
                <table>
                    <tr>
                        <td class="title">
                            <img src="../images/faskallogo.png" width="200px">
                        </td>
                        <td >
                            <?php
                            $y =  date('Y', strtotime($k['trx_date']));
                            $kd_toko = $_SESSION['kd_toko'];

                            ?>
                            <p style="margin-top: 30px;">
                                No. Invoice : <?php echo $k['trx_invoice'].'/'.strtoupper($kd_toko).'/'.$y; ?><br>
                                Tanggal Transaksi : <?php echo date('d-m-Y',strtotime($k['trx_date'])); ?><br>
                                </b>
                            </p>
                        </td>

                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="2">
                <?php
                $toko = mysqli_query($config,"select * from toko where kd_toko='$kd_toko'");
                $t=mysqli_fetch_assoc($toko);
                ?>
                <table>
                    <tr>
                        <td>
                            TOKO :<br>
                            <b>CV. FASKAL JAYA ABADI</b>.<br>
                            <?php echo $t['no_tlp']; ?> <br>
                            <?php echo $t['alamat_toko']; ?>

                        </td>

                    </tr>
                </table>
            </td>
        </tr>

        <tr class="heading">
            <td colspan="2">
                Metode Pembayaran
            </td>
        </tr>

        <tr class="details">
            <td >
                <?php
                $jp = $k['trx_jenis_pembayaran'];
                $koss = mysqli_query($config,"select * from jenis_pembayaran where jenis_pembayaran_id='$jp'");
                $kk=mysqli_fetch_assoc($koss);
                echo ucwords($kk['jenis_pembayaran_nama']);
                ?>
            </td>
            <td>
                <?php
                if($k['trx_jenis_pembayaran']==2){
                    echo 'Uang Muka : Rp. '.number_format($k['trx_dp']);
                }
                ?>
            </td>
        </tr>

        <tr class="heading">
            <td>Nama Barang</td>
            <td>Sub Total Harga</td>
        </tr>
        <?php
        $no = 1;
        $data = mysqli_query($config,"select * from orderan,produk where orderan.order_produk_id=produk.produk_id and  order_invoice='$id_invoice'");
        while($d=mysqli_fetch_array($data)){
            ?>
            <tr class="item">
                <td><?php echo ucfirst($d['produk_nama']).' ('.$d['order_keterangan'].')'; ?></td>
                <td>Rp. <?php echo number_format($d['order_harga_sub_total']) ?></td>
            </tr>
        <?php }
        if($k['trx_diskon'] > 0){
            ?>
            <tr class="item">
                <td>Diskon</td>
                <td><?php echo number_format($k['trx_diskon']); ?></td>
            </tr>
        <?php }
        if ($k['trx_pajak'] > 0){
            ?>
            <tr class="item">
                <td>Pajak</td>
                <td><?php echo $k['trx_pajak']; ?> %</td>
            </tr>
        <?php } ?>
        <tr class="total">
            <td ></td>

            <td>
                Total Harga : Rp. <?php echo number_format($k['trx_lunas']); ?>
            </td>
        </tr>
    </table>
</div>
<script type="text/javascript">
	this.window.print();
</script>


<?php include 'footer.php'; ?>