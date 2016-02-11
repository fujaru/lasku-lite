<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Lasku Billing</title>
    <?php include Kohana::find_file('views', 'parts/meta'); ?>
</head>

<body>
	<div class="header">
        <div class="logo">
            <img src="<?=URL::base()?>static/img/logo.png" />
        </div>
        <ul class="menu">
            <li><a href="#">Clients</a>
                <ul>
                    <li><a href="#">Client List</a></li>
                    <li><a href="#">New Client</a></li>
                </ul>
            </li>
            <li><a href="#">Invoices</a>
                <ul>
                    <li><a href="#">Invoice List</a></li>
                    <li><a href="#">New Invoice</a></li>
                </ul>
            </li>
            <li><a href="#">Payments</a>
                <ul>
                    <li><a href="#">Payment List</a></li>
                    <li><a href="#">New Payment</a></li>
                </ul>
            </li>
            <li><a href="#">Reports</a>
                <ul>
                    <li><a href="#">Income Report</a></li>
                </ul>
            </li>
            <li><a href="<?=URL::site('session/logout')?>">Logout</a></li>
        </ul>
    </div>
    <div class="container">
        <h1>Invoice List</h1>
        <p>
            <a class="btn" href="#">New Invoice</a>
        </p>
        
        <table class="table highlight">
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Due</th>
                <th>Client</th>
                <th class="aright">Amount</th>
                <th>Status</th>
                <th></th>
            </tr>
            <tr>
                <td>150001</td>
                <td>Jan 11, 2015</td>
                <td>Feb 11, 2015</td>
                <td>Abese Innovation Labs</td>
                <td class="aright">Rp 20,000,000.00</td>
                <td>Paid</td>
                <td>
                    <a href="#">View</a> &bull; 
                    <a href="#">Pay</a> &bull; 
                    <a href="#">Copy</a> &bull; 
                    <a href="#">Edit</a> &bull;
                    <a href="#">Delete</a>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
