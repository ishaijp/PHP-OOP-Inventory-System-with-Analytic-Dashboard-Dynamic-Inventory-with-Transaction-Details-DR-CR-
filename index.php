<?php
 session_start();
require_once "function.php";

 $user     = new LoginRegistration();
 $uid      = $_SESSION['uid'];
 $username = $_SESSION['uname'];
 
      if(!$user->getSession()){
	   header('Location: sign-in.php');
	   exit();
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Welcome To | Nahar Home Appliance</title>
    <!-- Favicon-->
    <link rel="icon" href="icon.jpg" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />
	
	<!-- Morris Chart Css-->
    <link href="plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
	
<!-- Chart.js Library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	
</head>

<body class="theme-red">
				<?php if($user->getSession()){ ?>
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.php">ADMIN - NAHAR HOME APPLIANCE</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                    <!-- #END# Call Search -->
                    <!-- Notifications -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count">7</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICATIONS</li>
                            <li class="body">
                                <ul class="menu">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-cyan">
                                                <i class="material-icons">add_shopping_cart</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>4 sales made</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 22 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-red">
                                                <i class="material-icons">delete_forever</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>Nancy Doe</b> Got Membership</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Notifications -->
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
		<?php } else{ ?>
	    <a href="sign-in.php">LogIn</a></li>
	    <a href="sign-up.php">Register</a></li>
				<?php } ?>	
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?php $user->getUserpicture($uid); ?>" alt="User"  style="width: 50px; height: 50px;"/>
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $username; ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="profile.php"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="otherusers.php"><i class="material-icons">group</i>Other Users</a></li>
                            <li><a href="changepassword.php"><i class="material-icons">lock</i>Change Password</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="sign-out.php"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active">
                        <a href="index.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
					<li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">library_books</i>
                            <span>Clients</span>
                        </a>
						<ul class="ml-menu">
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Customers</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="acustomer.php">Add Customer</a>
                                    </li>
                                    <li>
                                        <a href="lcustomer.php">Customer List</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Suppliers</span>
                                </a>
                                <ul class="ml-menu">
                            <li>
                                <a href="add_suppliers.php">Add Supplier</a>
                            </li>
                            <li>
                                <a href="supplierslist.php">Supplier List</a>
                            </li>
						</ul>	
                            </li>
                        </ul>
					</li>		
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">widgets</i>
                            <span>Services</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Category</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="acategory.php">Add Category</a>
                                    </li>
                                    <li>
                                        <a href="lcategory.php">Category List</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Products</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="aproduct.php">Add Product</a>
                                    </li>
                                    <li>
                                        <a href="lproduct.php">Product List</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">swap_calls</i>
                            <span>Inventory</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="buy.php">Buy</a>
                            </li>
                            <li>
                                <a href="sell.php">Sell</a>
                            </li>
                            <li>
                                <a href="storage.php">Storage</a>
                            </li>                        
                        </ul>
                    </li>
					<li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assignment</i>
                            <span>Invoice</span>
                        </a>
                        <ul class="ml-menu">
						    <li>
                                <a href="invoice.php">BILL</a>
                            </li>
                            <li>
                                <a href="journal.php">Journal</a>
                            </li>
                        </ul>
                    </li>
					<li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assignment</i>
                            <span>Transaction</span>
                        </a>
                        <ul class="ml-menu">
						    <li>
                                <a href="daily_transactions.php">Daily Debit/Credit</a>
                            </li>
                            <li>
                                <a href="range_transactions.php">AllTime Debit/Credit</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2024 <a href="javascript:void(0);">©isha_ijp</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
                <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red" class="active">
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Deep Purple</span>
                        </li>
                        <li data-theme="indigo">
                            <div class="indigo"></div>
                            <span>Indigo</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>Light Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>Light Green</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>Yellow</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>Deep Orange</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>Brown</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>Blue Grey</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Black</span>
                        </li>
                    </ul>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="settings">
                    <div class="demo-settings">
                        <p>GENERAL SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Report Panel Usage</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Email Redirect</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>SYSTEM SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Notifications</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Auto Updates</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>ACCOUNT SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Offline</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Location Permission</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>
	
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>DASHBOARD</h2>
        </div>
		<?php $salesData = $user->getSalesData(); ?>
         <!-- Visitors -->
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="card">
                <div class="body bg-pink">
                    <div class="sparkline" data-type="line" data-spot-Radius="4" data-highlight-Spot-Color="rgb(233, 30, 99)" data-highlight-Line-Color="#fff"
                         data-min-Spot-Color="rgb(255,255,255)" data-max-Spot-Color="rgb(255,255,255)" data-spot-Color="rgb(255,255,255)"
                         data-offset="90" data-width="100%" data-height="92px" data-line-Width="2" data-line-Color="rgba(255,255,255,0.7)"
                         data-fill-Color="rgba(0, 188, 212, 0)">
                        MONITOR YOUR SALES
                    </div>
                    <ul class="dashboard-stat-list">
                        <li>
                            TODAY
                            <span class="pull-right"><b><?php echo $salesData['today']; ?></b> <small>SALES</small></span>
                        </li>
                        <li>
                            YESTERDAY
                            <span class="pull-right"><b><?php echo $salesData['yesterday']; ?></b> <small>SALES</small></span>
                        </li>
                        <li>
                            LAST 7 DAYS
                            <span class="pull-right"><b><?php echo $salesData['last_week']; ?></b> <small>SALES</small></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #END# Visitors -->
		<?php $buyData = $user->getBuyData(); ?>
         <!-- Visitors -->
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="card">
                <div class="body bg-pink">
                    <div class="sparkline" data-type="line" data-spot-Radius="4" data-highlight-Spot-Color="rgb(233, 30, 99)" data-highlight-Line-Color="#fff"
                         data-min-Spot-Color="rgb(255,255,255)" data-max-Spot-Color="rgb(255,255,255)" data-spot-Color="rgb(255,255,255)"
                         data-offset="90" data-width="100%" data-height="92px" data-line-Width="2" data-line-Color="rgba(255,255,255,0.7)"
                         data-fill-Color="rgba(0, 188, 212, 0)">
                        MONITOR YOUR PURCHASE
                    </div>
                    <ul class="dashboard-stat-list">
                        <li>
                            LAST 14 DAYS
                            <span class="pull-right"><b><?php echo $buyData['last_14_days']; ?></b> <small>PURCHASE</small></span>
                        </li>
                        <li>
                            LAST MONTH
                            <span class="pull-right"><b><?php echo $buyData['last_month']; ?></b> <small>PURCHASE</small></span>
                        </li>
                        <li>
                            LAST 2 MONTH
                            <span class="pull-right"><b><?php echo $buyData['last_2_months']; ?></b> <small>PURCHASE</small></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #END# Visitors -->
		<?php
		$dailySalesData = $user->getDailySalesData();
		$dates = array_column($dailySalesData, 'date');
		$sales = array_column($dailySalesData, 'sales'); ?>
		        <!-- Sales Bar Chart -->
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="card">
                <div class="header">
                    <h2>TOTAL SALES PER DAY</h2>
                </div>
                <div class="body">
                    <canvas id="salesBarChart" height="150"></canvas>
                </div>
            </div>
        </div>
        <!-- #END# Sales Bar Chart -->
		<?php
		$productSalesData = $user->getProductSalesData();
		$productNames = array_column($productSalesData, 'proName');
		$totalSales = array_column($productSalesData, 'total_sales'); ?>

		        <!-- Product Sales Donut Chart -->
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="card">
                <div class="header">
                    <h2>PRODUCT SELLING RATIO</h2>
                </div>
                <div class="body">
                    <canvas id="productChart" height="190"></canvas>
                </div>
            </div>
        </div>
        <!-- #END# Product Sales Donut Chart -->
		<?php
$uniqueProductModels = array_unique(array_column($user->getMonthlyProductData(), 'proModel'));

$productNames = array_column($productSalesData, 'proName');
$totalSales = array_column($productSalesData, 'total_sales');
?>

<!-- Dropdown for selecting product model -->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="header">
            <h2>CHOOSE PRODUCT BY MODEL</h2>
        </div>
        <div class="body">
            <select id="productModelDropdown" class="form-control show-tick">
                <option value="">-- Please select a product model --</option>
                <?php foreach ($uniqueProductModels as $model): ?>
                    <option value="<?php echo htmlspecialchars($model); ?>"><?php echo htmlspecialchars($model); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
</div>

<!-- Monthly Product Data Chart -->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="header">
            <h2>MONTHLY PURCHASE & SELL </h2>
        </div>
        <div class="body">
            <canvas id="monthlyProductChart" height="150"></canvas>
        </div>
    </div>
</div>
<!-- #END# Monthly Product Data Chart -->
    </div>
</section>

<!-- Jquery Core Js -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/chartjs/Chart.bundle.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var ctx = document.getElementById('productChart').getContext('2d');
    var productChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($productNames); ?>,
            datasets: [{
                label: 'Total Sales',
                data: <?php echo json_encode($totalSales); ?>,
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)'
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            var label = context.label || '';
                            if (label) {
                                label += ': ';
                            }
                            label += context.raw;
                            return label;
                        }
                    }
                }
            }
        }
    });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var monthlyCtx = document.getElementById('monthlyProductChart').getContext('2d');

    function updateChart(model) {
        var productData = <?php echo json_encode($user->getMonthlyProductData()); ?>;
        var filteredData = productData.filter(function(item) {
            return item.proModel === model;
        });

        var labels = filteredData.map(function(item) { return item.proName; });
        var salesData = filteredData.map(function(item) { return item.total_sales; });
        var buysData = filteredData.map(function(item) { return item.total_buys; });

        var monthlyProductChart = new Chart(monthlyCtx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Total Sales',
                        data: salesData,
                        backgroundColor: 'rgba(75, 192, 192, 1.0)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Total Buys',
                        data: buysData,
                        backgroundColor: 'rgba(153, 102, 255, 1.0)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }

    document.getElementById('productModelDropdown').addEventListener('change', function() {
        var selectedModel = this.value;
        if (selectedModel) {
            updateChart(selectedModel);
        }
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var ctx = document.getElementById('salesBarChart').getContext('2d');
    var salesBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($dates); ?>,
            datasets: [{
                label: 'Sales Per Day',
                data: <?php echo json_encode($sales); ?>,
                backgroundColor: 'rgba(75, 192, 192, 1)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
</script>
<script src="plugins/chartjs/Chart.bundle.js"></script>

<!-- Bootstrap Core Js -->
<script src="plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->


<!-- Slimscroll Plugin Js -->
<script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="plugins/node-waves/waves.js"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="plugins/jquery-countto/jquery.countTo.js"></script>

<!-- Morris Plugin Js -->
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/morrisjs/morris.js"></script>

<!-- Chart Plugins Js -->
<script src="plugins/chartjs/Chart.bundle.js"></script>

<!-- Flot Charts Plugin Js -->
<script src="plugins/flot-charts/jquery.flot.js"></script>
<script src="plugins/flot-charts/jquery.flot.resize.js"></script>
<script src="plugins/flot-charts/jquery.flot.pie.js"></script>
<script src="plugins/flot-charts/jquery.flot.categories.js"></script>
<script src="plugins/flot-charts/jquery.flot.time.js"></script>

<!-- Custom Js -->
<script src="js/admin.js"></script>
<script src="js/pages/charts/chartjs.js"></script>

<!-- Demo Js -->
<script src="js/demo.js"></script>
</body>

</html>
