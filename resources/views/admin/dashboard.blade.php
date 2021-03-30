@extends('admin.layouts.master')
@section('content')
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex flex-column align-items-start pb-0">
                                    <div class="avatar bg-rgba-primary p-50 m-0">
                                        <div class="avatar-content">
                                            <i class="feather icon-users text-primary font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700 mt-1">{{ $total_subs }}</h2>
                                    <p class="mb-0">Total Customers</p>
                                </div>
                                <div class="card-content">
                                    <div id="line-area-chart-1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex flex-column align-items-start pb-0">
                                    <div class="avatar bg-rgba-success p-50 m-0">
                                        <div class="avatar-content">
                                            <i class="feather icon-credit-card text-success font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700 mt-1">{{ $per_day_subs }}</h2>
                                    <p class="mb-0">New Customers</p>
                                </div>
                                <div class="card-content">
                                    <div id="line-area-chart-2"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex flex-column align-items-start pb-0">
                                    <div class="avatar bg-rgba-danger p-50 m-0">
                                        <div class="avatar-content">
                                            <i class="feather icon-shopping-cart text-danger font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700 mt-1">{{ $last_month_subs }}</h2>
                                    <p class="mb-0">Customers Last Month</p>
                                </div>
                                <div class="card-content">
                                    <div id="line-area-chart-3"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex flex-column align-items-start pb-0">
                                    <div class="avatar bg-rgba-warning p-50 m-0">
                                        <div class="avatar-content">
                                            <i class="feather icon-package text-warning font-medium-5"></i>
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700 mt-1">{{ $confirmed_orders }}</h2>
                                    <p class="mb-0">Orders Confirmed</p>
                                </div>
                                <div class="card-content">
                                    <div id="line-area-chart-4"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-8 col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-end">
                                    <h4>Subscriptions to Order</h4>
                                    <div class="dropdown chart-dropdown">
                                        <!-- <button class="btn btn-sm border-0 dropdown-toggle px-0" type="button" id="dropdownItem1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Last 7 Days
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownItem1">
                                            <a class="dropdown-item" href="#">Last 28 Days</a>
                                            <a class="dropdown-item" href="#">Last Month</a>
                                            <a class="dropdown-item" href="#">Last Year</a>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body pt-1">
                                        <!-- <div id="session-chart" class="mb-1"></div> -->
                                        <div class="row">
                                        <div class="text-center colors-container bg-gradient-success rounded text-white width-200 height-100 d-flex align-items-center justify-content-center mr-1 ml-50  my-1 shadow">
                                            <span class="align-middle">Total Orders <b class="display-4">{{ number_format($total_orders) }}</b></span>
                                        </div>
                                        <div class="text-center colors-container bg-warning rounded text-white width-200 height-100 d-flex align-items-center justify-content-center mr-1 ml-50  my-1 shadow">
                                            <span class="align-middle">Delivered Orders <b class="display-4">{{ number_format($ordered) }}</b></span>
                                        </div>
                                        <div class="text-center colors-container bg-danger rounded text-white width-200 height-100 d-flex align-items-center justify-content-center mr-1 ml-50  my-1 shadow">
                                            <span class="align-middle">Cancelled Orders <b class="display-4">{{ number_format($cancelled_orders) }}</b></span>
                                        </div>
                                        <div class="text-center colors-container bg-gradient-info rounded text-white width-200 height-100 d-flex align-items-center justify-content-center mr-1 ml-50  my-1 shadow">
                                            <span class="align-middle">Confirmed Orders <b class="display-4">{{ number_format($confirmed_orders) }}</b></span>
                                        </div>
                                        </div>
                                        <div id="donutchart" style="width: 750px; height: 500px;"></div>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Sales Statistics</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        @foreach($result as $pro)
                                            <div class="d-flex justify-content-between mb-25">
                                                <div class="browser-info">
                                                    <p class="mb-25">{{ $pro['product_name'] }}</p>
                                                    <h4>{{ number_format(($pro['product_qty']/$total_qty)*100,2) }}%</h4>
                                                </div>
                                                
                                            </div>
                                            <div class="progress progress-bar-primary mb-2">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="73" aria-valuemin="73" aria-valuemax="100" style="width:{{ ($pro['product_qty']/$total_qty)*100 }}%"></div>
                                            </div>
                                        @endforeach
                                        
                                        
                                        <!-- <div class="d-flex justify-content-between mb-25">
                                            <div class="browser-info">
                                                <p class="mb-25">Opera</p>
                                                <h4>8%</h4>
                                            </div>
                                            <div class="stastics-info text-right">
                                                <span>-200 <i class="feather icon-arrow-down text-danger"></i></span>
                                                <span class="text-muted d-block">13:16</span>
                                            </div>
                                        </div>
                                        <div class="progress progress-bar-primary mb-2">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="8" aria-valuemin="8" aria-valuemax="100" style="width:8%"></div>
                                        </div>
                                        <div class="d-flex justify-content-between mb-25">
                                            <div class="browser-info">
                                                <p class="mb-25">Firefox</p>
                                                <h4>19%</h4>
                                            </div>
                                            <div class="stastics-info text-right">
                                                <span>100 <i class="feather icon-arrow-up text-success"></i></span>
                                                <span class="text-muted d-block">13:16</span>
                                            </div>
                                        </div>
                                        <div class="progress progress-bar-primary mb-2">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="19" aria-valuemin="19" aria-valuemax="100" style="width:19%"></div>
                                        </div>
                                        <div class="d-flex justify-content-between mb-25">
                                            <div class="browser-info">
                                                <p class="mb-25">Internet Explorer</p>
                                                <h4>27%</h4>
                                            </div>
                                            <div class="stastics-info text-right">
                                                <span>-450 <i class="feather icon-arrow-down text-danger"></i></span>
                                                <span class="text-muted d-block">13:16</span>
                                            </div>
                                        </div>
                                        <div class="progress progress-bar-primary mb-50">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="27" aria-valuemin="27" aria-valuemax="100" style="width:27%"></div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-md-8 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Client Retention</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div id="client-retention-chart"></div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        
                    </div>
                    <div class="row">
                        
                        
                         <div class="col-lg-8 col-12">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between pb-0">
                                    <h4 class="card-title">Product Stock to Order</h4>
                                    <!--<div class="dropdown chart-dropdown">-->
                                    <!--    <button class="btn btn-sm border-0 dropdown-toggle px-0" type="button" id="dropdownItem3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                                    <!--        Last 7 Days-->
                                    <!--    </button>-->
                                    <!--    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownItem3">-->
                                    <!--        <a class="dropdown-item" href="#">Last 28 Days</a>-->
                                    <!--        <a class="dropdown-item" href="#">Last Month</a>-->
                                    <!--        <a class="dropdown-item" href="#">Last Year</a>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                </div>
                                <div class="card-content">
                                    <div class="card-body py-4">
                                        <!--<div id="customer-chart"></div>-->
                                        <div id="barchart_material" style="width: 900px; height: 500px;"></div>
                                    </div>
                                    <!--<ul class="list-group list-group-flush customer-info">-->
                                    <!--    <li class="list-group-item d-flex justify-content-between ">-->
                                    <!--        <div class="series-info">-->
                                    <!--            <i class="fa fa-circle font-small-3 text-primary"></i>-->
                                    <!--            <span class="text-bold-600">New</span>-->
                                    <!--        </div>-->
                                    <!--        <div class="product-result">-->
                                    <!--            <span>890</span>-->
                                    <!--        </div>-->
                                    <!--    </li>-->
                                    <!--    <li class="list-group-item d-flex justify-content-between ">-->
                                    <!--        <div class="series-info">-->
                                    <!--            <i class="fa fa-circle font-small-3 text-warning"></i>-->
                                    <!--            <span class="text-bold-600">Returning</span>-->
                                    <!--        </div>-->
                                    <!--        <div class="product-result">-->
                                    <!--            <span>258</span>-->
                                    <!--        </div>-->
                                    <!--    </li>-->
                                    <!--    <li class="list-group-item d-flex justify-content-between ">-->
                                    <!--        <div class="series-info">-->
                                    <!--            <i class="fa fa-circle font-small-3 text-danger"></i>-->
                                    <!--            <span class="text-bold-600">Referrals</span>-->
                                    <!--        </div>-->
                                    <!--        <div class="product-result">-->
                                    <!--            <span>149</span>-->
                                    <!--        </div>-->
                                    <!--    </li>-->
                                    <!--</ul>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Dashboard Ecommerce ends -->

            </div>
        </div>
    
            
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      
      // Subscriptions to Order Statistics Chart  
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
     
      var cancelled_orders = <?php echo $cancelled_orders; ?>;
      var ordered = <?php echo $ordered; ?>;
      var confirmed_orders = <?php echo $confirmed_orders; ?>;
      
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Total Orders'],
          ['Confirmed Orders',     confirmed_orders],
          ['Cancelled Orders',      cancelled_orders],
          ['Delivered Orders',    ordered]
        ]);

        var options = {
          title: '',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    
    
    // Product Stock Statistics Chart  
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart2);
    

    
    function drawChart2() { 
        var data = google.visualization.arrayToDataTable([
            ['Products', 'Sold', 'Stock', { role: 'annotation' } ],
            <?php
                
                foreach ($total_products_qty as $prod) {
            ?>
                    [<?="'".$prod->name."'"?>, <?=$total_soled_products[$prod->id]?>, <?=$prod->quantity?>, <?=" ' ' "?>],
        
            <?php    
                    
                }
            ?>
          ]);

          
          var options = {
            width: 550,
            height: 360,
            legend: { position: 'top', maxLines: 3 },
            bar: { groupWidth: '75%' },
            isStacked: true
          };
          
        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
    </script>
    @endsection