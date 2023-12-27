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
                                            <th>Name</th>
                                            <th>Eamil</th>
                                            <th>Phone</th>
                                            <th>NID</th>
                                            <th>Photo</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->number }}</td>
                                                <td>{{ $user->nid }}</td>
                                                <td>
                                                  @if ($user->photo == NULL)
                                                  <img src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="" width="100">
                                                  @else
                                                  <img src="{{ asset('frontend/assets/img/user/'.$user->photo) }}" alt="" width="100">
                                                  @endif
                                                  </td>
                                                
                                                <td>
                                                    @php
                                                        $user->status != 1 ? $value = 'Pending' : $value = 'Active'
                                                    @endphp
                                                    <a href="{{ url('admin/user-status/'.$user->id) }}" class="badge {{ $value == 'Active' ? 'badge-primary':'badge-danger' }} px-2">{{ $value }}</a>
                                                </td>
                                                <td style="text-align: center;">
                                                    <span><a
                                                      href="{{ url('admin/user-delete/'.$user->id) }}" data-toggle="tooltip" data-placement="top"
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
