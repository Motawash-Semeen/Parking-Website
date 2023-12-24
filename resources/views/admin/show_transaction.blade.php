@extends('admin.admin_master')
@section('admin_content')
    <div class="content-body">
        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Data Table</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
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
                                        @foreach ($trans as $tran)
                                            <tr>
                                                <td>{{ $tran->invoice_number }}</td>
                                                <td>{{ date('Y-m-d H:i:s', $tran->order_date) }}</td>
                                                <td>{{ $tran->name }}</td>
                                                <td>{{ $tran->phone }}</td>
                                                <td>{{ $tran->slot_number }}</td>
                                                <td>{{ $tran->amount }}</td>
                                                <td>
                                                    @php
                                                        $tran->status != 'confirmed' ? $value = 'Pending' : $value = ' Confirmed'
                                                    @endphp
                                                    <span class="badge {{ $value == 'Confirmed' ? 'badge-primary':'badge-danger' }} px-2">{{ $value }}</span>
                                                </td>
                                                <td style="text-align: center;">
                                                    <span><a href="{{ url('invoice_download/'.$tran->id) }}" data-toggle="tooltip" data-placement="top"
                                                            title="View" data-original-title="View"><i
                                                                class="fa-solid fa-file-arrow-down color-muted m-r-5"></i> </a></span>
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
        <!-- #/ container -->
    </div>
@endsection
