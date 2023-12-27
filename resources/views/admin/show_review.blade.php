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
                                            <th>User Name</th>
                                            <th>User Eamil</th>
                                            <th>User Phone</th>
                                            <th>Trnasaction ID</th>
                                            <th>Review</th>
                                            <th>Ratings</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reviews as $review)
                                            <tr>
                                                <td>{{ $review->user->name }}</td>
                                                <td>{{ $review->user->email }}</td>
                                                <td>{{ $review->user->number }}</td>
                                                <td>{{ $review->transaction_id }}</td>
                                                <td>{{ $review->review }}</td>
                                                <td>@for ($i = 0; $i < $review->rating; $i++)
                                                  <i class="fa-solid fa-star"></i>
                                                @endfor</td>
                                                <td>
                                                    @php
                                                        $review->status != 1 ? $value = 'Pending' : $value = 'Active'
                                                    @endphp
                                                    <a href="{{ url('admin/review-status/'.$review->id) }}" class="badge {{ $value == 'Active' ? 'badge-primary':'badge-danger' }} px-2">{{ $value }}</a>
                                                </td>
                                                <td style="text-align: center;">
                                                    <span><a
                                                      href="{{ url('admin/review-delete/'.$review->id) }}" data-toggle="tooltip" data-placement="top"
                                                      title="" data-original-title="Close"><i
                                                          class="fa fa-close color-danger"></i></a></span>
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
