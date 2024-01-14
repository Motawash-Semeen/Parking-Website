@extends('admin.admin_master')
@section('admin_content')
    <div class="content-body">

        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-1">
                        <div class="card-body">
                            <h3 class="card-title text-white">Total Slots</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">{{ $total_slots }}</h2>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa-solid fa-map-location-dot"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-2">
                        <div class="card-body">
                            <h3 class="card-title text-white">Net Profit</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">$ {{ round($total_price) }}</h2>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-3">
                        <div class="card-body">
                            <h3 class="card-title text-white">Total Customers</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">{{ $total_user }}</h2>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-4">
                        <div class="card-body">
                            <h3 class="card-title text-white">Empty Slot</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">{{ $total_empty }}</h2>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-heart"></i></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Order Summary</h4>
                            <div id="morris-bar-chart"></div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card card-widget">
                        <div class="card-body">
                            <h5 class="text-muted">Order Overview </h5>
                            <h2 class="mt-4">{{ $total_price }}</h2>
                            <span>Total Revenue</span>
                            <div class="mt-4">
                                <h4>{{ round($count_card) }}</h4>
                                <h6>Card Order <span class="pull-right">{{ round($percentage_card) }}%</span></h6>
                                <div class="progress mb-3" style="height: 7px">
                                    <div class="progress-bar bg-primary" style="width: {{ round($percentage_card) }}%;"
                                        role="progressbar"><span class="sr-only">{{ round($percentage_card) }}% Order</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <h4>{{ round($count_online) }}</h4>
                                <h6 class="m-t-10 text-muted">Online Order <span
                                        class="pull-right">{{ round($percentage_online) }}%</span></h6>
                                <div class="progress mb-3" style="height: 7px">
                                    <div class="progress-bar bg-success" style="width: {{ round($percentage_online) }}%;"
                                        role="progressbar"><span class="sr-only">{{ round($percentage_online) }}% Order</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <h4>{{ round($count_cash) }}</h4>
                                <h6 class="m-t-10 text-muted">Cash On Develery <span
                                        class="pull-right">{{ round($percentage_cash) }}%</span></h6>
                                <div class="progress mb-3" style="height: 7px">
                                    <div class="progress-bar bg-warning" style="width: {{ round($percentage_cash) }}%;"
                                        role="progressbar"><span class="sr-only">{{ round($percentage_cash) }}% Order</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-0">
                            <h4 class="card-title px-4 mb-3">Todo</h4>
                            <div class="todo-list">
                                <div class="tdl-holder">
                                    <div class="tdl-content">
                                        <ul id="todo_list">
                                            <li><label><input type="checkbox"><i></i><span>Check Transactions</span><a
                                                        href='#' class="ti-trash"></a></label></li>
                                            <li><label><input type="checkbox"><i></i><span>Check Review</span><a
                                                        href='#' class="ti-trash"></a></label></li>
                                            <li><label><input type="checkbox"><i></i><span>Check New User</span><a
                                                        href='#' class="ti-trash"></a></label></li>

                                        </ul>
                                    </div>
                                    <div class="px-4">
                                        <input type="text" class="tdl-new form-control"
                                            placeholder="Write new item and hit 'Enter'...">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="active-member">
                                <div class="table-responsive">
                                    <table class="table table-xs mb-0">
                                        <thead>
                                            <tr style="background-color: rgba(0, 0, 0, 0.05);">
                                                <th>Invoice</th>
                                                <th>Book Date</th>
                                                <th>Contact Name</th>
                                                <th>Contact Number</th>
                                                <th>Slots Number</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($top_transaction as $tran)
                                                <tr>
                                                    <td>{{ $tran->invoice_number }}</td>
                                                    <td>{{ date('Y-m-d H:i:s', $tran->order_date) }}</td>
                                                    <td>{{ $tran->name }}</td>
                                                    <td>{{ $tran->phone }}</td>
                                                    <td>{{ $tran->slot_number }}</td>
                                                    <td>{{ $tran->amount }}</td>
                                                    <td>
                                                        @php
                                                            $tran->status != 'confirmed' ? ($value = 'Pending') : ($value = '  Confirmed');
                                                        @endphp
                                                        <span
                                                            class="badge {{ $value == 'Confirmed' ? 'badge-primary' : 'badge-danger' }} px-2">{{ $value }}</span>
                                                    </td>
                                                    <td>
                                                        <span><a href="{{ url('admin/edit-transaction/' . $tran->id) }}"
                                                                data-toggle="tooltip" data-placement="top" title="View"
                                                                data-original-title="View"><i
                                                                    class="fa-regular fa-file color-muted m-r-5"></i>
                                                            </a></span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="social-graph-wrapper widget-facebook">
                            <span class="s-icon"><i class="fa fa-facebook"></i></span>
                        </div>
                        <div class="row">
                            <div class="col-6 border-right">
                                <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                    <h4 class="m-1">89k</h4>
                                    <p class="m-0">Friends</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                    <h4 class="m-1">119k</h4>
                                    <p class="m-0">Followers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="social-graph-wrapper widget-linkedin">
                            <span class="s-icon"><i class="fa fa-linkedin"></i></span>
                        </div>
                        <div class="row">
                            <div class="col-6 border-right">
                                <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                    <h4 class="m-1">89k</h4>
                                    <p class="m-0">Friends</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                    <h4 class="m-1">119k</h4>
                                    <p class="m-0">Followers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="social-graph-wrapper widget-googleplus">
                            <span class="s-icon"><i class="fa fa-google-plus"></i></span>
                        </div>
                        <div class="row">
                            <div class="col-6 border-right">
                                <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                    <h4 class="m-1">89k</h4>
                                    <p class="m-0">Friends</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                    <h4 class="m-1">119k</h4>
                                    <p class="m-0">Followers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="social-graph-wrapper widget-twitter">
                            <span class="s-icon"><i class="fa fa-twitter"></i></span>
                        </div>
                        <div class="row">
                            <div class="col-6 border-right">
                                <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                    <h4 class="m-1">89k</h4>
                                    <p class="m-0">Friends</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                    <h4 class="m-1">119k</h4>
                                    <p class="m-0">Followers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
        <!-- #/ container -->
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/morris.js@0.5.1/morris.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/raphael@2.3.0/raphael.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/morris.js@0.5.1/morris.min.js"></script>
    <script>
        $.ajax({
            url: '/admin/get-chart-data',
            method: 'GET',
            success: function(data) {
                Morris.Bar({
                    element: 'morris-bar-chart',
                    data: data,
                    xkey: 'y',
                    ykeys: ['a'],
                    labels: ['A'],
                    barColors: ['#FC6C8E'],
                    hideHover: 'auto',
                    gridLineColor: 'transparent',
                    resize: true
                });
            },
            error: function(error) {
                console.log(error);
            }
        });
        
    </script>
@endsection
