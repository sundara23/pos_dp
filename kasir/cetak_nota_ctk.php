<?php
include '../config.php';
session_start();
if($_SESSION['level'] != "kasir"){
    header("location:../index.php");
}

$kdtoko = $_SESSION['kd_toko'];
$id_admin = $_SESSION['id'];
if(isset($_GET['id'])){
    $id_invoice = $_GET['id'];
}else{
    header("location:index.php");
}
require_once  '../assets/mpdf7/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
$mpdf->AddPageByArray([
    'margin-left' => 0,
    'margin-right' => 0,
    'margin-top' => 0,
    'margin-bottom' => 0,
]);
// Buffer the following html with PHP so we can store it to a variable later
ob_start();


?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Struk Transaksi</title>
        <style>

            {
                margin:0;
                padding:0;
                font-family: arial;
                font-size:6pt;
                color:#000;
            }
            body
            {
                width:100%;
                font-family: arial;
                font-size:6pt;
                margin:0;
                padding:0;
            }

            p
            {
                margin:0;
                padding:0;
                margin-left: 0px;
            }

            #wrapper
            {
                width:44mm;
                margin:0 0mm;
            }

            #main {
                float:left;
                width:0mm;
                background:#ffffff;
                padding:0mm;
            }

            #sidebar {
                float:right;
                width:0mm;
                background:#ffffff;
                padding:0mm;
            }

            .page
            {
                height:200mm;
                width:44mm;
                page-break-after:always;
            }

            table
            {
                /** border-left: 1px solid #fff;
                border-top: 1px solid #fff; **/
                font-family: arial;
                border-spacing:0;
                border-collapse: collapse;

            }

            table td
            {
                /**border-right: 1px solid #fff;
                border-bottom: 1px solid #fff;**/
                padding: 2mm;

            }

            table.heading
            {
                height:0mm;
                margin-bottom: 1px;
            }

            h1.heading
            {
                font-size:6pt;
                color:#000;
                font-weight:normal;
                font-style: italic;


            }

            h2.heading
            {
                font-size:6pt;
                color:#000;
                font-weight:normal;
            }

            hr
            {
                color:#ccc;
                background:#ccc;
            }

            #invoice_body
            {
                height: auto;
            }

            #invoice_body , #invoice_total
            {
                width:100%;
            }
            #invoice_body table , #invoice_total table
            {
                width:100%;
                /** border-left: 1px solid #ccc;
                border-top: 1px solid #ccc; **/

                border-spacing:0;
                border-collapse: collapse;

                margin-top:0mm;
            }

            #invoice_body table td , #invoice_total table td
            {
                text-align:center;
                font-size:7pt;
                /** border-right: 1px solid black;
                border-bottom: 1px solid black;**/
                padding:0 0;
                font-weight: normal;
            }

            #invoice_head table td
            {
                text-align:left;
                font-size:8pt;
                /** border-right: 1px solid black;
                border-bottom: 1px solid black;**/
                padding:0 0;
                font-weight: normal;
            }

            #invoice_body table td.mono  , #invoice_total table td.mono
            {
                text-align:right;
                padding-right:0mm;
                font-size:6pt;
                border: 1px solid white;
                font-weight: normal;
            }

            #footer
            {
                width:44mm;
                margin:0 2mm;
                padding-bottom:1mm;
            }
            #footer table
            {
                width:100%;
                /** border-left: 1px solid #ccc;
                border-top: 1px solid #ccc; **/

                background:#eee;

                border-spacing:0;
                border-collapse: collapse;
            }
            #footer table td
            {
                width:25%;
                text-align:center;
                font-size:8pt;
                /** border-right: 1px solid #ccc;
                border-bottom: 1px solid #ccc;**/
            }
        </style>
    </head>
<body>
<?php
$kos = mysqli_query($config,"select * from transaksi,kostumer where trx_invoice='$id_invoice' and trx_customer=kostumer_id");
$k=mysqli_fetch_assoc($kos);
$toko = mysqli_query($config,"select * from toko where kd_toko='$kdtoko'");
$t=mysqli_fetch_assoc($toko);
$admin = mysqli_query($config,"select * from admin where id='$id_admin'");
$a=mysqli_fetch_assoc($admin);
$customer = mysqli_query($config,"select * from kostumer where kostumer_id='".$k['trx_customer']."'");
$c=mysqli_fetch_assoc($customer);
date_default_timezone_set('Asia/Jakarta');
?>
<div id="wrapper">
    <table class="heading" style="width:100%;">
        <tr>
            <td align="center"> <img src="../images/logostruk.jpg"></td>
        </tr>
        <tr>
            <td align="center"><p style="text-align:center; font-size: 6pt; font-weight:bold;"><?php echo $t['alamat_toko']; ?></p></td>
        </tr>
        <!--<tr>
        <td> <center><p style="text-align:center; font-size: 14px; font-weight:bold;">Aplikasi Point Of Sales</p></center></td>
        </tr>-->
    </table>
    <div id="content">

        <div id="invoice_body">
            <table>
                <tr>
                    <td align="left">NOMOR</td>
                    <td align="right"><?php echo $id_invoice; ?></td>
                </tr>
                <tr>
                    <td align="left">Tanggal</td>
                    <td align="right"><?php echo date('d-m-Y H:i:s'); ?></td>
                </tr>
                <tr>
                    <td align="left">Operator</td>
                    <td align="right"><?php echo $a['nama']; ?></td>
                </tr>
                <tr>
                    <td align="left">Customer</td>
                    <td align="right"><?php echo $c['kostumer_nama']; ?></td>
                </tr>
            </table>
            ===========================
            <table>
                <?php
                $produkqty = 0;
                $data = mysqli_query($config,"select * from orderan,produk where orderan.order_produk_id=produk.produk_id and  order_invoice='$id_invoice'");
                while($d=mysqli_fetch_array($data)){
                    $produkqty += $d['order_qty'];
                ?>
                <tr>
                    <td align="left"><?php echo ucfirst($d['produk_nama']).' ('.$d['order_keterangan'].')'; ?></td>
                    <td align="right"><?php echo $d['order_harga_sub_total'] ?></td>
                </tr>
                <?php } ?>
            </table>
            ===========================
            <table>
                <?php
                $trx = mysqli_query($config,"select sum(order_harga_sub_total) as totaltrx from orderan where order_invoice='$id_invoice'");
                $jumlah = mysqli_fetch_assoc($trx);
                $jumlahtrx = $jumlah['totaltrx'];
                ?>
                <tr>
                    <td align="left">ITEM</td>
                    <td align="right"><?php echo $produkqty ?></td>
                </tr>
                <tr>
                    <td align="left">TOTAL</td>
                    <td align="right"><?php echo $jumlahtrx; ?></td>
                </tr>
                <?php
                if ($k['trx_diskon'] == 0){

                }else {
                    ?>
                    <tr>
                        <td align="left">Diskon</td>
                        <td align="right"><?php echo $k['trx_diskon']; ?></td>
                    </tr>
                    <?php
                }
                if ($k['trx_pajak'] == 0){

                }else {
                    ?>
                    <tr>
                        <td align="left">Pajak (%)</td>
                        <td align="right"><?php echo $k['trx_pajak']; ?> %</td>
                    </tr>
                    <?php
                }
                ?>
                <tr>
                    <td align="left">Grand Total</td>
                    <?php
                    $diskon = $k['trx_diskon'];
                    $pajak =  $k['trx_pajak'];
                    $total =  $jumlahtrx;
                    $grandtotal = $total - $diskon;
                    $totalpajak = $grandtotal*$pajak/100;
                    $grandtotalpajak = $grandtotal + $totalpajak;
                    ?>
                    <td align="right"><?php echo $grandtotalpajak; ?></td>
                </tr>
            </table>
            ===========================
            <p align="center">TERIMA KASIH</p>
        </div>

    </div>
    <br />
</div>
<?php
// Now collect the output buffer into a variable
$html = ob_get_contents();
ob_end_clean();
$nama_file = 'struk-kasir';
// send the captured HTML from the output buffer to the mPDF class for processing
$mpdf->WriteHTML($html);
$mpdf->Output($nama_file."-".date("Y/m/d H:i:s").".pdf" ,'I');
?>