<!-- Breadcrumb -->


@extends('dashboard.layouts.layout')

@section('body')
{{ Breadcrumbs::render(('dashboard')) }}

    <div class="container-fluid">

        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-inverse card-primary">
                        <div class="card-block p-b-0">
                            <div class="btn-group pull-left">
                                <button type="button" class="btn btn-transparent active dropdown-toggle p-a-0"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-settings"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                            <h4 class="m-b-0">9.823</h4>
                            <p>Members online</p>
                        </div>
                        <div class="chart-wrapper p-x-1" style="height:70px;">
                            <canvas id="card-chart1" class="chart" height="70"></canvas>
                        </div>
                    </div>
                </div>
                <!--/col-->

                <div class="col-sm-6 col-lg-3">
                    <div class="card card-inverse card-info">
                        <div class="card-block p-b-0">
                            <button type="button" class="btn btn-transparent active p-a-0 pull-left">
                                <i class="icon-location-pin"></i>
                            </button>
                            <h4 class="m-b-0">9.823</h4>
                            <p>Members online</p>
                        </div>
                        <div class="chart-wrapper p-x-1" style="height:70px;">
                            <canvas id="card-chart2" class="chart" height="70"></canvas>
                        </div>
                    </div>
                </div>
                <!--/col-->

                <div class="col-sm-6 col-lg-3">
                    <div class="card card-inverse card-warning">
                        <div class="card-block p-b-0">
                            <div class="btn-group pull-left">
                                <button type="button" class="btn btn-transparent active dropdown-toggle p-a-0"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-settings"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                            <h4 class="m-b-0">9.823</h4>
                            <p>Members online</p>
                        </div>
                        <div class="chart-wrapper" style="height:70px;">
                            <canvas id="card-chart3" class="chart" height="70"></canvas>
                        </div>
                    </div>
                </div>
                <!--/col-->

                <div class="col-sm-6 col-lg-3">
                    <div class="card card-inverse card-danger">
                        <div class="card-block p-b-0">
                            <div class="btn-group pull-left">
                                <button type="button" class="btn btn-transparent active dropdown-toggle p-a-0"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-settings"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                            <h4 class="m-b-0">9.823</h4>
                            <p>Members online</p>
                        </div>
                        <div class="chart-wrapper p-x-1" style="height:70px;">
                            <canvas id="card-chart4" class="chart" height="70"></canvas>
                        </div>
                    </div>
                </div>
                <!--/col-->

            </div>
            <!--/row-->

            <div class="card">
                <div class="card-block">
                    <div class="row">
                        <div class="col-xs-5">
                            <h4 class="card-title">Traffic</h4>
                            <div class="small text-muted" style="margin-top:-10px;">November 2015</div>
                        </div>
                        <div class="col-xs-7">
                            <div class="btn-toolbar pull-left" role="toolbar" aria-label="Toolbar with button groups">
                                <div class="btn-group" data-toggle="buttons" aria-label="First group">
                                    <label class="btn btn-outline-secondary">
                                        <input type="radio" name="options" id="option1">Day
                                    </label>
                                    <label class="btn btn-outline-secondary active">
                                        <input type="radio" name="options" id="option2" checked>Month
                                    </label>
                                    <label class="btn btn-outline-secondary">
                                        <input type="radio" name="options" id="option3">Year
                                    </label>
                                </div>
                                <div class="btn-group hidden-sm-down" role="group" aria-label="Second group">
                                    <button type="button" class="btn btn-primary"><i class="icon-cloud-download"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chart-wrapper" style="height:300px;margin-top:40px;">
                        <canvas id="main-chart" height="300"></canvas>
                    </div>
                </div>
                <div class="card-footer">
                    <ul>
                        <li>
                            <div class="text-muted">Visits</div>
                            <strong>29.703 Users (40%)</strong>
                            <progress class="progress progress-xs progress-success" value="40"
                                max="100">40%</progress>
                        </li>
                        <li class="hidden-sm-down">
                            <div class="text-muted">Unique</div>
                            <strong>24.093 Unique Users (20%)</strong>
                            <progress class="progress progress-xs progress-info" value="20"
                                max="100">20%</progress>
                        </li>
                        <li>
                            <div class="text-muted">Pageviews</div>
                            <strong>78.706 Views (60%)</strong>
                            <progress class="progress progress-xs progress-warning" value="60"
                                max="100">60%</progress>
                        </li>
                        <li class="hidden-sm-down">
                            <div class="text-muted">New Users</div>
                            <strong>22.123 Users (80%)</strong>
                            <progress class="progress progress-xs progress-danger" value="80"
                                max="100">80%</progress>
                        </li>
                        <li class="hidden-sm-down">
                            <div class="text-muted">Bounce Rate</div>
                            <strong>40.15%</strong>
                            <progress class="progress progress-xs progress-primary" value="40"
                                max="100">40%</progress>
                        </li>
                    </ul>
                </div>
            </div>
            <!--/.card-->

            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="social-box facebook">
                        <i class="fa fa-facebook"></i>
                        <div class="chart-wrapper">
                            <canvas id="social-box-chart-1" height="90"></canvas>
                        </div>
                        <ul>
                            <li>
                                <strong>89k</strong>
                                <span>friends</span>
                            </li>
                            <li>
                                <strong>459</strong>
                                <span>feeds</span>
                            </li>
                        </ul>
                    </div>
                    <!--/.social-box-->
                </div>
                <!--/.col-->

                <div class="col-sm-6 col-lg-3">
                    <div class="social-box twitter">
                        <i class="fa fa-twitter"></i>
                        <div class="chart-wrapper">
                            <canvas id="social-box-chart-2" height="90"></canvas>
                        </div>
                        <ul>
                            <li>
                                <strong>973k</strong>
                                <span>followers</span>
                            </li>
                            <li>
                                <strong>1.792</strong>
                                <span>tweets</span>
                            </li>
                        </ul>
                    </div>
                    <!--/.social-box-->
                </div>
                <!--/.col-->

                <div class="col-sm-6 col-lg-3">

                    <div class="social-box linkedin">
                        <i class="fa fa-linkedin"></i>
                        <div class="chart-wrapper">
                            <canvas id="social-box-chart-3" height="90"></canvas>
                        </div>
                        <ul>
                            <li>
                                <strong>500+</strong>
                                <span>contacts</span>
                            </li>
                            <li>
                                <strong>292</strong>
                                <span>feeds</span>
                            </li>
                        </ul>
                    </div>
                    <!--/.social-box-->
                </div>
                <!--/.col-->

                <div class="col-sm-6 col-lg-3">
                    <div class="social-box google-plus">
                        <i class="fa fa-google-plus"></i>
                        <div class="chart-wrapper">
                            <canvas id="social-box-chart-4" height="90"></canvas>
                        </div>
                        <ul>
                            <li>
                                <strong>894</strong>
                                <span>followers</span>
                            </li>
                            <li>
                                <strong>92</strong>
                                <span>circles</span>
                            </li>
                        </ul>
                    </div>
                    <!--/.social-box-->
                </div>
                <!--/.col-->
            </div>
            <!--/.row-->

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Traffic &amp; Sales
                        </div>
                        <div class="card-block">
                            <div class="row">
                                <div class="col-sm-12 col-lg-4">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="callout callout-info">
                                                <small class="text-muted">New Clients</small>
                                                <br>
                                                <strong class="h4">9,123</strong>
                                                <div class="chart-wrapper">
                                                    <canvas id="sparkline-chart-1" width="100"
                                                        height="30"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/.col-->
                                        <div class="col-sm-6">
                                            <div class="callout callout-danger">
                                                <small class="text-muted">Recuring Clients</small>
                                                <br>
                                                <strong class="h4">22,643</strong>
                                                <div class="chart-wrapper">
                                                    <canvas id="sparkline-chart-2" width="100"
                                                        height="30"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/.col-->
                                    </div>
                                    <!--/.row-->
                                    <hr class="m-t-0">
                                    <ul class="horizontal-bars">
                                        <li>
                                            <div class="title">
                                                Monday
                                            </div>
                                            <div class="bars">
                                                <progress class="progress progress-xs progress-info" value="34"
                                                    max="100" style="margin-bottom: 2px;">34%</progress>
                                                <progress class="progress progress-xs progress-danger m-a-0"
                                                    value="78" max="100">78%</progress>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="title">
                                                Tuesday
                                            </div>
                                            <div class="bars">
                                                <progress class="progress progress-xs progress-info" value="56"
                                                    max="100" style="margin-bottom: 2px;">56%</progress>
                                                <progress class="progress progress-xs progress-danger m-a-0"
                                                    value="94" max="100">94%</progress>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="title">
                                                Wednesday
                                            </div>
                                            <div class="bars">
                                                <progress class="progress progress-xs progress-info" value="12"
                                                    max="100" style="margin-bottom: 2px;">12%</progress>
                                                <progress class="progress progress-xs progress-danger m-a-0"
                                                    value="67" max="100">67%</progress>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="title">
                                                Thursday
                                            </div>
                                            <div class="bars">
                                                <progress class="progress progress-xs progress-info" value="43"
                                                    max="100" style="margin-bottom: 2px;">43%</progress>
                                                <progress class="progress progress-xs progress-danger m-a-0"
                                                    value="91" max="100">91%</progress>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="title">
                                                Friday
                                            </div>
                                            <div class="bars">
                                                <progress class="progress progress-xs progress-info" value="22"
                                                    max="100" style="margin-bottom: 2px;">22%</progress>
                                                <progress class="progress progress-xs progress-danger m-a-0"
                                                    value="73" max="100">73%</progress>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="title">
                                                Saturday
                                            </div>
                                            <div class="bars">
                                                <progress class="progress progress-xs progress-info" value="53"
                                                    max="100" style="margin-bottom: 2px;">53%</progress>
                                                <progress class="progress progress-xs progress-danger m-a-0"
                                                    value="82" max="100">82%</progress>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="title">
                                                Sunday
                                            </div>
                                            <div class="bars">
                                                <progress class="progress progress-xs progress-info" value="9"
                                                    max="100" style="margin-bottom: 2px;">9%</progress>
                                                <progress class="progress progress-xs progress-danger m-a-0"
                                                    value="69" max="100">69%</progress>
                                            </div>
                                        </li>
                                        <li class="legend">
                                            <span class="tag tag-pill tag-info"></span>
                                            <small>New clients</small>&nbsp;
                                            <span class="tag tag-pill tag-danger"></span>
                                            <small>Recurring clients</small>
                                        </li>
                                    </ul>
                                </div>
                                <!--/.col-->
                                <div class="col-sm-6 col-lg-4">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="callout callout-warning">
                                                <small class="text-muted">Pageviews</small>
                                                <br>
                                                <strong class="h4">78,623</strong>
                                                <div class="chart-wrapper">
                                                    <canvas id="sparkline-chart-3" width="100"
                                                        height="30"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/.col-->
                                        <div class="col-sm-6">
                                            <div class="callout callout-success">
                                                <small class="text-muted">Organic</small>
                                                <br>
                                                <strong class="h4">49,123</strong>
                                                <div class="chart-wrapper">
                                                    <canvas id="sparkline-chart-4" width="100"
                                                        height="30"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/.col-->
                                    </div>
                                    <!--/.row-->
                                    <hr class="m-t-0">
                                    <ul class="horizontal-bars type-2">
                                        <li>
                                            <i class="icon-user"></i>
                                            <span class="title">Male</span>
                                            <span class="value">43%</span>
                                            <div class="bars">
                                                <progress class="progress progress-xs progress-warning m-a-0"
                                                    value="43" max="100">43%</progress>
                                            </div>
                                        </li>
                                        <li>
                                            <i class="icon-user-female"></i>
                                            <span class="title">Female</span>
                                            <span class="value">37%</span>
                                            <div class="bars">
                                                <progress class="progress progress-xs progress-warning m-a-0"
                                                    value="37" max="100">37%</progress>
                                            </div>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <i class="icon-globe"></i>
                                            <span class="title">Organic Search</span>
                                            <span class="value">191,235
                                                <span class="text-muted small">(56%)</span>
                                            </span>
                                            <div class="bars">
                                                <progress class="progress progress-xs progress-success m-a-0"
                                                    value="56" max="100">56%</progress>
                                            </div>
                                        </li>
                                        <li>
                                            <i class="icon-social-facebook"></i>
                                            <span class="title">Facebook</span>
                                            <span class="value">51,223
                                                <span class="text-muted small">(15%)</span>
                                            </span>
                                            <div class="bars">
                                                <progress class="progress progress-xs progress-success m-a-0"
                                                    value="15" max="100">15%</progress>
                                            </div>
                                        </li>
                                        <li>
                                            <i class="icon-social-twitter"></i>
                                            <span class="title">Twitter</span>
                                            <span class="value">37,564
                                                <span class="text-muted small">(11%)</span>
                                            </span>
                                            <div class="bars">
                                                <progress class="progress progress-xs progress-success m-a-0"
                                                    value="11" max="100">11%</progress>
                                            </div>
                                        </li>
                                        <li>
                                            <i class="icon-social-linkedin"></i>
                                            <span class="title">LinkedIn</span>
                                            <span class="value">27,319
                                                <span class="text-muted small">(8%)</span>
                                            </span>
                                            <div class="bars">
                                                <progress class="progress progress-xs progress-success m-a-0"
                                                    value="8" max="100">8%</progress>
                                            </div>
                                        </li>
                                        <li class="divider text-xs-center">
                                            <button type="button" class="btn btn-sm btn-link text-muted"
                                                data-toggle="tooltip" data-placement="top" title=""
                                                data-original-title="show more"><i class="icon-options"></i>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                                <!--/.col-->
                                <div class="col-sm-6 col-lg-4">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="callout">
                                                <small class="text-muted">CTR</small>
                                                <br>
                                                <strong class="h4">23%</strong>
                                                <div class="chart-wrapper">
                                                    <canvas id="sparkline-chart-5" width="100"
                                                        height="30"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/.col-->
                                        <div class="col-sm-6">
                                            <div class="callout callout-primary">
                                                <small class="text-muted">Bounce Rate</small>
                                                <br>
                                                <strong class="h4">5%</strong>
                                                <div class="chart-wrapper">
                                                    <canvas id="sparkline-chart-6" width="100"
                                                        height="30"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/.col-->
                                    </div>
                                    <!--/.row-->
                                    <hr class="m-t-0">
                                    <ul class="icons-list">
                                        <li>
                                            <i class="icon-screen-desktop bg-primary"></i>
                                            <div class="desc">
                                                <div class="title">iMac 4k</div>
                                                <small>Lorem ipsum dolor sit amet</small>
                                            </div>
                                            <div class="value">
                                                <div class="small text-muted">Sold this week</div>
                                                <strong>1.924</strong>
                                            </div>
                                            <div class="actions">
                                                <button type="button" class="btn btn-link text-muted"><i
                                                        class="icon-settings"></i>
                                                </button>
                                            </div>
                                        </li>
                                        <li>
                                            <i class="icon-screen-smartphone bg-info"></i>
                                            <div class="desc">
                                                <div class="title">Samsung Galaxy Edge</div>
                                                <small>Lorem ipsum dolor sit amet</small>
                                            </div>
                                            <div class="value">
                                                <div class="small text-muted">Sold this week</div>
                                                <strong>1.224</strong>
                                            </div>
                                            <div class="actions">
                                                <button type="button" class="btn btn-link text-muted"><i
                                                        class="icon-settings"></i>
                                                </button>
                                            </div>
                                        </li>
                                        <li>
                                            <i class="icon-screen-smartphone bg-warning"></i>
                                            <div class="desc">
                                                <div class="title">iPhone 6S</div>
                                                <small>Lorem ipsum dolor sit amet</small>
                                            </div>
                                            <div class="value">
                                                <div class="small text-muted">Sold this week</div>
                                                <strong>1.163</strong>
                                            </div>
                                            <div class="actions">
                                                <button type="button" class="btn btn-link text-muted"><i
                                                        class="icon-settings"></i>
                                                </button>
                                            </div>
                                        </li>
                                        <li>
                                            <i class="icon-user bg-danger"></i>
                                            <div class="desc">
                                                <div class="title">Premium accounts</div>
                                                <small>Lorem ipsum dolor sit amet</small>
                                            </div>
                                            <div class="value">
                                                <div class="small text-muted">Sold this week</div>
                                                <strong>928</strong>
                                            </div>
                                            <div class="actions">
                                                <button type="button" class="btn btn-link text-muted"><i
                                                        class="icon-settings"></i>
                                                </button>
                                            </div>
                                        </li>
                                        <li>
                                            <i class="icon-social-spotify bg-success"></i>
                                            <div class="desc">
                                                <div class="title">Spotify Subscriptions</div>
                                                <small>Lorem ipsum dolor sit amet</small>
                                            </div>
                                            <div class="value">
                                                <div class="small text-muted">Sold this week</div>
                                                <strong>893</strong>
                                            </div>
                                            <div class="actions">
                                                <button type="button" class="btn btn-link text-muted"><i
                                                        class="icon-settings"></i>
                                                </button>
                                            </div>
                                        </li>
                                        <li>
                                            <i class="icon-cloud-download bg-danger"></i>
                                            <div class="desc">
                                                <div class="title">Ebook</div>
                                                <small>Lorem ipsum dolor sit amet</small>
                                            </div>
                                            <div class="value">
                                                <div class="small text-muted">Downloads</div>
                                                <strong>121.924</strong>
                                            </div>
                                            <div class="actions">
                                                <button type="button" class="btn btn-link text-muted"><i
                                                        class="icon-settings"></i>
                                                </button>
                                            </div>
                                        </li>
                                        <li>
                                            <i class="icon-camera bg-warning"></i>
                                            <div class="desc">
                                                <div class="title">Photos</div>
                                                <small>Lorem ipsum dolor sit amet</small>
                                            </div>
                                            <div class="value">
                                                <div class="small text-muted">Uploaded</div>
                                                <strong>12.125</strong>
                                            </div>
                                            <div class="actions">
                                                <button type="button" class="btn btn-link text-muted"><i
                                                        class="icon-settings"></i>
                                                </button>
                                            </div>
                                        </li>
                                        <li class="divider text-xs-center">
                                            <button type="button" class="btn btn-sm btn-link text-muted"
                                                data-toggle="tooltip" data-placement="top" title="show more"><i
                                                    class="icon-options"></i>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                                <!--/.col-->
                            </div>
                            <!--/.row-->
                            <br />
                            <table class="table table-hover table-outline m-b-0 hidden-sm-down">
                                <thead class="thead-default">
                                    <tr>
                                        <th class="text-xs-center"><i class="icon-people"></i>
                                        </th>
                                        <th>User</th>
                                        <th class="text-xs-center">Country</th>
                                        <th>Usage</th>
                                        <th class="text-xs-center">Payment Method</th>
                                        <th>Activity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-xs-center">
                                            <div class="avatar">
                                                <img src="{{ asset('adminassets/img/avatars/1.jpg') }}" class="img-avatar"
                                                    alt="admin@bootstrapmaster.com"
                                                    src="{{ asset('adminassets/img/avatars/1.jpg') }}">
                                                <span class="avatar-status tag-success"></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>Yiorgos Avraamu</div>
                                            <div class="small text-muted">
                                                <span>New</span>| Registered: Jan 1, 2015
                                            </div>
                                        </td>
                                        <td class="text-xs-center">
                                            <img src="{{ asset('adminassets/img/flags/USA.png') }}" alt="USA"
                                                style="height:24px;" src="{{ asset('adminassets/img/flags/USA.png') }}">
                                        </td>
                                        <td>
                                            <div class="clearfix">
                                                <div class="pull-left">
                                                    <strong>50%</strong>
                                                </div>
                                                <div class="pull-left">
                                                    <small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small>
                                                </div>
                                            </div>
                                            <progress class="progress progress-xs progress-success" value="50"
                                                max="100" style="margin:5px 0 0 0;">50%</progress>
                                        </td>
                                        <td class="text-xs-center">
                                            <i class="fa fa-cc-mastercard" style="font-size:24px"></i>
                                        </td>
                                        <td>
                                            <div class="small text-muted">Last login</div>
                                            <strong>10 sec ago</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-xs-center">
                                            <div class="avatar">
                                                <img src="{{ asset('adminassets/img/avatars/2.jpg') }}" class="img-avatar"
                                                    alt="admin@bootstrapmaster.com"
                                                    src="{{ asset('adminassets/img/avatars/2.jpg') }}">
                                                <span class="avatar-status tag-danger"></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>Avram Tarasios</div>
                                            <div class="small text-muted">

                                                <span>Recurring</span>| Registered: Jan 1, 2015
                                            </div>
                                        </td>
                                        <td class="text-xs-center">
                                            <img src="{{ asset('adminassets/img/flags/Brazil.png') }}" alt="Brazil"
                                                style="height:24px;"
                                                src="{{ asset('adminassets/img/flags/Brazil.png') }}">
                                        </td>
                                        <td>
                                            <div class="clearfix">
                                                <div class="pull-left">
                                                    <strong>10%</strong>
                                                </div>
                                                <div class="pull-left">
                                                    <small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small>
                                                </div>
                                            </div>
                                            <progress class="progress progress-xs progress-info" value="10"
                                                max="100" style="margin:5px 0 0 0;">10%</progress>
                                        </td>
                                        <td class="text-xs-center">
                                            <i class="fa fa-cc-visa" style="font-size:24px"></i>
                                        </td>
                                        <td>
                                            <div class="small text-muted">Last login</div>
                                            <strong>5 minutes ago</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-xs-center">
                                            <div class="avatar">
                                                <img src="{{ asset('adminassets/img/avatars/3.jpg') }}" class="img-avatar"
                                                    alt="admin@bootstrapmaster.com"
                                                    src="{{ asset('adminassets/img/avatars/3.jpg') }}">
                                                <span class="avatar-status tag-warning"></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>Quintin Ed</div>
                                            <div class="small text-muted">
                                                <span>New</span>| Registered: Jan 1, 2015
                                            </div>
                                        </td>
                                        <td class="text-xs-center">
                                            <img src="{{ asset('adminassets/img/flags/India.png') }}" alt="India"
                                                style="height:24px;"
                                                src="{{ asset('adminassets/img/flags/India.png') }}">
                                        </td>
                                        <td>
                                            <div class="clearfix">
                                                <div class="pull-left">
                                                    <strong>74%</strong>
                                                </div>
                                                <div class="pull-left">
                                                    <small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small>
                                                </div>
                                            </div>
                                            <progress class="progress progress-xs progress-warning" value="74"
                                                max="100" style="margin:5px 0 0 0;">74%</progress>
                                        </td>
                                        <td class="text-xs-center">
                                            <i class="fa fa-cc-stripe" style="font-size:24px"></i>
                                        </td>
                                        <td>
                                            <div class="small text-muted">Last login</div>
                                            <strong>1 hour ago</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-xs-center">
                                            <div class="avatar">
                                                <img src="{{ asset('adminassets/img/avatars/4.jpg') }}"
                                                    class="img-avatar" alt="admin@bootstrapmaster.com"
                                                    src="{{ asset('adminassets/img/avatars/4.jpg') }}">
                                                <span class="avatar-status tag-default"></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>Enéas Kwadwo</div>
                                            <div class="small text-muted">
                                                <span>New</span>| Registered: Jan 1, 2015
                                            </div>
                                        </td>
                                        <td class="text-xs-center">
                                            <img src="{{ asset('adminassets/img/flags/France.png') }}" alt="France"
                                                style="height:24px;" src="img/flags/France.png">
                                        </td>
                                        <td>
                                            <div class="clearfix">
                                                <div class="pull-left">
                                                    <strong>98%</strong>
                                                </div>
                                                <div class="pull-left">
                                                    <small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small>
                                                </div>
                                            </div>
                                            <progress class="progress progress-xs progress-danger" value="98"
                                                max="100" style="margin:5px 0 0 0;">98%</progress>
                                        </td>
                                        <td class="text-xs-center">
                                            <i class="fa fa-paypal" style="font-size:24px"></i>
                                        </td>
                                        <td>
                                            <div class="small text-muted">Last login</div>
                                            <strong>Last month</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-xs-center">
                                            <div class="avatar">
                                                <img src="{{ asset('adminassets/img/avatars/5.jpg') }}"
                                                    class="img-avatar" alt="admin@bootstrapmaster.com"
                                                    src="{{ asset('adminassets/img/avatars/5.jpg') }}">
                                                <span class="avatar-status tag-success"></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>Agapetus Tadeáš</div>
                                            <div class="small text-muted">
                                                <span>New</span>| Registered: Jan 1, 2015
                                            </div>
                                        </td>
                                        <td class="text-xs-center">
                                            <img src="{{ asset('adminassets/img/flags/Spain.png') }}" alt="Spain"
                                                style="height:24px;"
                                                src="{{ asset('adminassets/img/flags/Spain.png') }}">
                                        </td>
                                        <td>
                                            <div class="clearfix">
                                                <div class="pull-left">
                                                    <strong>22%</strong>
                                                </div>
                                                <div class="pull-left">
                                                    <small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small>
                                                </div>
                                            </div>
                                            <progress class="progress progress-xs progress-info" value="22"
                                                max="100" style="margin:5px 0 0 0;">22%</progress>
                                        </td>
                                        <td class="text-xs-center">
                                            <i class="fa fa-google-wallet" style="font-size:24px"></i>
                                        </td>
                                        <td>
                                            <div class="small text-muted">Last login</div>
                                            <strong>Last week</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-xs-center">
                                            <div class="avatar">
                                                <img src="{{ asset('adminassets/img/avatars/6.jpg') }}"
                                                    class="img-avatar" alt="admin@bootstrapmaster.com"
                                                    src="{{ asset('adminassets/img/avatars/6.jpg') }}">
                                                <span class="avatar-status tag-danger"></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>Friderik Dávid</div>
                                            <div class="small text-muted">
                                                <span>New</span>| Registered: Jan 1, 2015
                                            </div>
                                        </td>
                                        <td class="text-xs-center">
                                            <img src="{{ asset('adminassets/img/flags/Poland.png') }}" alt="Poland"
                                                style="height:24px;"
                                                src="{{ asset('adminassets/img/flags/Poland.png') }}">
                                        </td>
                                        <td>
                                            <div class="clearfix">
                                                <div class="pull-left">
                                                    <strong>43%</strong>
                                                </div>
                                                <div class="pull-left">
                                                    <small class="text-muted">Jun 11, 2015 - Jul 10, 2015</small>
                                                </div>
                                            </div>
                                            <progress class="progress progress-xs progress-success" value="43"
                                                max="100" style="margin:5px 0 0 0;">43%</progress>
                                        </td>
                                        <td class="text-xs-center">
                                            <i class="fa fa-cc-amex" style="font-size:24px"></i>
                                        </td>
                                        <td>
                                            <div class="small text-muted">Last login</div>
                                            <strong>Yesterday</strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--/.col-->
            </div>
            <!--/.row-->
        </div>

    </div>
    <!--/.container-fluid-->
@endsection
