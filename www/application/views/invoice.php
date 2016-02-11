<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Invoice #12345 (Unpaid)</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta name="robots" content="noindex, nofollow" />
    <link type="text/css" rel="stylesheet" href="<?=URL::base()?>static/css/invoice/print.css" />
</head>

<body>
	<div class="container">
        <h1>INVOICE</h1>
        
        <div class="status unpaid">UNPAID</div>
        
        <div class="logo">
            <img src="<?=URL::base()?>static/img/logo.png" />
        </div>
        
        <div class="company">
            <h2>ABC Digita</h2>
            Jl. Panjang Pendek 123<br />
            Kedoya Utara, Jakarta Barat 11520<br />
            +62 1234 4321<br />
            abc@abc.net<br />
        </div>
        
        <div class="meta">
            <table class="form">
                <tr>
                    <th>Invoice No</th>
                    <td>1510001</td>
                </tr>
                <tr>
                    <th>Invoice Date</th>
                    <td>Jan 25, 2015</td>
                </tr>
                <tr>
                    <th>Due Date</th>
                    <td>Feb 24, 2015</td>
                </tr>
            </table>
        </div>
        
        <div class="client">
            <h3>Bill to:</h3>
            <div class="name">Ex Ya Zet Sdn Bhd</div>
            <div class="address">
                3.02, Level 3, Menara RRRR<br />
                285 Jalan Tralala, Bukit Hijau, 59000 Kuala Lumpur<br />
                Malaysia
            </div>
        </div>
        
        <div class="details">
            <table class="table">
                <tr>
                    <th>Item / Description</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
                <tr>
                    <td>
                        Consultancy Services
                        <div class="desc">
                            Consultancy services in building and supporting IT application<br />
                            January 2016
                        </div>
                    </td>
                    <td>1</td>
                    <td>Rp 12,345,000.00</td>
                    <td>Rp 12,345,000.00</td>
                </tr>
            </table>
        </div>
        
        <div class="summary">
            <table class="form">
<!--
                <tr>
                    <th>Total</th>
                    <td>Rp 12,345,000.00</td>
                </tr>
                <tr>
                    <th>Paid</th>
                    <td>Rp 0.00</td>
                </tr>
-->
                <tr class="balance">
                    <th>Balance Due</th>
                    <td>Rp 12,345,000.00</td>
                </tr>
            </table>
        </div>
        
        <div class="note">
            Payment can be made via bank transfer to the following account:<br />
            <br />
            <b>Bank Asia</b><br />
            Acc Name: Mister Bean<br />
            Acc No:
            123 123 1234<br />
            SWIFT:
            BASIIDJA<br />
            Branch:
            KCP Asia Bagus<br />
            Branch Addr: Jln.Melati Kembar 10 Kebon Rumput, Jakarta Barat 11530,
            021-1231231<br />
            <br />
        </div>
    </div>
</body>

</html>
