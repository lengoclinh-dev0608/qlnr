@extends('layouts.master')

@section('title', 'Admin - Home')

@section('style-libraries')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">

@stop

@section('styles')
{{--custom css item suggest search--}}
<style>
    .autocomplete-group {
        padding: 2px 5px;
    }
</style>
@stop

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Home Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a href="#">Home</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>2</h3>

                            <p>Số lứa rắn đã nuôi</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>100<sup style="font-size: 20px">%</sup></h3>

                            <p>Tỷ lệ rắn sống sót</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>6</h3>

                            <p>Bệnh được lưu trữ</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>65</h3>

                            <p>Loại thuốc được lưu trữ</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-7 connectedSortable">
                    <!-- BAR CHART -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Biểu đồ chi phí chăn nuôi</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>
                <!-- right col -->
                <section class="col-lg-5 connectedSortable">
                    <!-- Calendar -->
                    <div class="card bg-gradient-success">
                        <div class="card-header border-0">

                            <h3 class="card-title">
                                <i class="far fa-calendar-alt"></i>
                                Calendar
                            </h3>
                            <!-- tools card -->
                            <div class="card-tools">
                                <!-- button with a dropdown -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                                        <i class="fas fa-bars"></i>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                        <a href="#" class="dropdown-item">Add new event</a>
                                        <a href="#" class="dropdown-item">Clear events</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item">View calendar</a>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <!-- /. tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body pt-0">
                            <!--The calendar -->
                            <div id="calendar" style="width: 100%">
                                <div class="bootstrap-datetimepicker-widget usetwentyfour">
                                    <ul class="list-unstyled">
                                        <li class="show">
                                            <div class="datepicker">
                                                <div class="datepicker-days" style="">
                                                    <table class="table table-sm">
                                                        <thead>
                                                            <tr>
                                                                <th class="prev" data-action="previous">
                                                                    <span class="fa fa-chevron-left" title="Previous Month"></span>
                                                                </th>
                                                                <th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Month">November 2021</th>
                                                                <th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Month"></span></th>
                                                            </tr>
                                                            <tr>
                                                                <th class="dow">Su</th>
                                                                <th class="dow">Mo</th>
                                                                <th class="dow">Tu</th>
                                                                <th class="dow">We</th>
                                                                <th class="dow">Th</th>
                                                                <th class="dow">Fr</th>
                                                                <th class="dow">Sa</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="10/31/2021" class="day old weekend">31</td>
                                                                <td data-action="selectDay" data-day="11/01/2021" class="day">1</td>
                                                                <td data-action="selectDay" data-day="11/02/2021" class="day">2</td>
                                                                <td data-action="selectDay" data-day="11/03/2021" class="day">3</td>
                                                                <td data-action="selectDay" data-day="11/04/2021" class="day">4</td>
                                                                <td data-action="selectDay" data-day="11/05/2021" class="day">5</td>
                                                                <td data-action="selectDay" data-day="11/06/2021" class="day weekend">6</td>
                                                            </tr>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="11/07/2021" class="day active today weekend">7</td>
                                                                <td data-action="selectDay" data-day="11/08/2021" class="day">8</td>
                                                                <td data-action="selectDay" data-day="11/09/2021" class="day">9</td>
                                                                <td data-action="selectDay" data-day="11/10/2021" class="day">10</td>
                                                                <td data-action="selectDay" data-day="11/11/2021" class="day">11</td>
                                                                <td data-action="selectDay" data-day="11/12/2021" class="day">12</td>
                                                                <td data-action="selectDay" data-day="11/13/2021" class="day weekend">13</td>
                                                            </tr>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="11/14/2021" class="day weekend">14</td>
                                                                <td data-action="selectDay" data-day="11/15/2021" class="day">15</td>
                                                                <td data-action="selectDay" data-day="11/16/2021" class="day">16</td>
                                                                <td data-action="selectDay" data-day="11/17/2021" class="day">17</td>
                                                                <td data-action="selectDay" data-day="11/18/2021" class="day">18</td>
                                                                <td data-action="selectDay" data-day="11/19/2021" class="day">19</td>
                                                                <td data-action="selectDay" data-day="11/20/2021" class="day weekend">20</td>
                                                            </tr>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="11/21/2021" class="day weekend">21</td>
                                                                <td data-action="selectDay" data-day="11/22/2021" class="day">22</td>
                                                                <td data-action="selectDay" data-day="11/23/2021" class="day">23</td>
                                                                <td data-action="selectDay" data-day="11/24/2021" class="day">24</td>
                                                                <td data-action="selectDay" data-day="11/25/2021" class="day">25</td>
                                                                <td data-action="selectDay" data-day="11/26/2021" class="day">26</td>
                                                                <td data-action="selectDay" data-day="11/27/2021" class="day weekend">27</td>
                                                            </tr>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="11/28/2021" class="day weekend">28</td>
                                                                <td data-action="selectDay" data-day="11/29/2021" class="day">29</td>
                                                                <td data-action="selectDay" data-day="11/30/2021" class="day">30</td>
                                                                <td data-action="selectDay" data-day="12/01/2021" class="day new">1</td>
                                                                <td data-action="selectDay" data-day="12/02/2021" class="day new">2</td>
                                                                <td data-action="selectDay" data-day="12/03/2021" class="day new">3</td>
                                                                <td data-action="selectDay" data-day="12/04/2021" class="day new weekend">4</td>
                                                            </tr>
                                                            <tr>
                                                                <td data-action="selectDay" data-day="12/05/2021" class="day new weekend">5</td>
                                                                <td data-action="selectDay" data-day="12/06/2021" class="day new">6</td>
                                                                <td data-action="selectDay" data-day="12/07/2021" class="day new">7</td>
                                                                <td data-action="selectDay" data-day="12/08/2021" class="day new">8</td>
                                                                <td data-action="selectDay" data-day="12/09/2021" class="day new">9</td>
                                                                <td data-action="selectDay" data-day="12/10/2021" class="day new">10</td>
                                                                <td data-action="selectDay" data-day="12/11/2021" class="day new weekend">11</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="datepicker-months" style="display: none;">
                                                    <table class="table-condensed">
                                                        <thead>
                                                            <tr>
                                                                <th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Year"></span></th>
                                                                <th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Year">2021</th>
                                                                <th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Year"></span></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="7"><span data-action="selectMonth" class="month">Jan</span><span data-action="selectMonth" class="month">Feb</span><span data-action="selectMonth" class="month">Mar</span><span data-action="selectMonth" class="month">Apr</span><span data-action="selectMonth" class="month">May</span><span data-action="selectMonth" class="month">Jun</span><span data-action="selectMonth" class="month">Jul</span><span data-action="selectMonth" class="month">Aug</span><span data-action="selectMonth" class="month">Sep</span><span data-action="selectMonth" class="month">Oct</span><span data-action="selectMonth" class="month active">Nov</span><span data-action="selectMonth" class="month">Dec</span></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="datepicker-years" style="display: none;">
                                                    <table class="table-condensed">
                                                        <thead>
                                                            <tr>
                                                                <th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Decade"></span></th>
                                                                <th class="picker-switch" data-action="pickerSwitch" colspan="5" title="Select Decade">2020-2029</th>
                                                                <th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Decade"></span></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="7"><span data-action="selectYear" class="year old">2019</span><span data-action="selectYear" class="year">2020</span><span data-action="selectYear" class="year active">2021</span><span data-action="selectYear" class="year">2022</span><span data-action="selectYear" class="year">2023</span><span data-action="selectYear" class="year">2024</span><span data-action="selectYear" class="year">2025</span><span data-action="selectYear" class="year">2026</span><span data-action="selectYear" class="year">2027</span><span data-action="selectYear" class="year">2028</span><span data-action="selectYear" class="year">2029</span><span data-action="selectYear" class="year old">2030</span></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="datepicker-decades" style="display: none;">
                                                    <table class="table-condensed">
                                                        <thead>
                                                            <tr>
                                                                <th class="prev" data-action="previous"><span class="fa fa-chevron-left" title="Previous Century"></span></th>
                                                                <th class="picker-switch" data-action="pickerSwitch" colspan="5">2000-2090</th>
                                                                <th class="next" data-action="next"><span class="fa fa-chevron-right" title="Next Century"></span></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="7"><span data-action="selectDecade" class="decade old" data-selection="2006">1990</span><span data-action="selectDecade" class="decade" data-selection="2006">2000</span><span data-action="selectDecade" class="decade active" data-selection="2016">2010</span><span data-action="selectDecade" class="decade active" data-selection="2026">2020</span><span data-action="selectDecade" class="decade" data-selection="2036">2030</span><span data-action="selectDecade" class="decade" data-selection="2046">2040</span><span data-action="selectDecade" class="decade" data-selection="2056">2050</span><span data-action="selectDecade" class="decade" data-selection="2066">2060</span><span data-action="selectDecade" class="decade" data-selection="2076">2070</span><span data-action="selectDecade" class="decade" data-selection="2086">2080</span><span data-action="selectDecade" class="decade" data-selection="2096">2090</span><span data-action="selectDecade" class="decade old" data-selection="2106">2100</span></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="picker-switch accordion-toggle"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>
            </div>
            <!-- /.row (main row) -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@stop

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
{{--jquery.autocomplete.js--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.devbridge-autocomplete/1.4.10/jquery.autocomplete.min.js"></script>
{{--quick defined--}}
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<script>
    var thisInterval = setInterval(function() {
        //this if statment checks if the id "thisCanvas" is linked to something
        if (document.getElementById("barChart") != null) {
            $(function() {
                /* ChartJS
                 * -------
                 * Here we will create a few charts using ChartJS
                 */
                var areaChartData = {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                    datasets: [{
                            label: 'Thức ăn',
                            backgroundColor: 'rgba(210, 214, 222, 1)',
                            borderColor: 'rgba(210, 214, 222, 1)',
                            pointRadius: false,
                            pointColor: 'rgba(210, 214, 222, 1)',
                            pointStrokeColor: '#c1c7d1',
                            pointHighlightFill: '#fff',
                            pointHighlightStroke: 'rgba(220,220,220,1)',
                            data: [65, 59, 80, 51, 56, 55, 90]
                        },
                        {
                            label: 'Công cụ',
                            backgroundColor: 'rgba(60,141,188,0.9)',
                            borderColor: 'rgba(60,141,188,0.8)',
                            pointRadius: false,
                            pointColor: '#3b8bba',
                            pointStrokeColor: 'rgba(60,141,188,1)',
                            pointHighlightFill: '#fff',
                            pointHighlightStroke: 'rgba(60,141,188,1)',
                            data: [28, 48, 40, 39, 36, 27, 40]
                        },
                        {
                            label: 'Thuốc',
                            backgroundColor: 'rgba(46, 138, 138, 0.9)',
                            borderColor: 'rgba(46, 138, 138, 0.8)',
                            pointRadius: false,
                            pointColor: '#3b8bba',
                            pointStrokeColor: 'rgba(46, 138, 138, 1)',
                            pointHighlightFill: '#fff',
                            pointHighlightStroke: 'rgba(46, 138, 138, 1)',
                            data: [28, 48, 40, 39, 36, 27, 40]
                        },
                    ]
                }

                //-------------
                //- BAR CHART -
                //-------------
                var barChartCanvas = $('#barChart').get(0).getContext('2d')
                var barChartData = $.extend(true, {}, areaChartData)
                var temp0 = areaChartData.datasets[0]
                var temp1 = areaChartData.datasets[1]
                barChartData.datasets[0] = temp1
                barChartData.datasets[1] = temp0

                var barChartOptions = {
                    responsive: true,
                    maintainAspectRatio: false,
                    datasetFill: false
                }

                new Chart(barChartCanvas, {
                    type: 'bar',
                    data: barChartData,
                    options: barChartOptions
                })

            });
            clearInterval(thisInterval)
        }
        //the 500 means that you will loop through this every 500 milliseconds (1/2 a second)
    }, 500)
</script>
@stop