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
                                            <th>Address</th>
                                            <th>Coordinates</th>
                                            <th>Contact Number</th>
                                            <th>Slots Number</th>
                                            <th>Price/hr</th>
                                            <th>Slot Type</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($slots as $slot)
                                            <tr>
                                                <td>{{ $slot->building_number . ',' . $slot->building_name . ',' . $slot->post_area. ',' . $slot->city }}
                                                </td>
                                                <td>{{ $slot->coordinates }}</td>
                                                <td>{{ $slot->mobile }}</td>
                                                <td>{{ $slot->slot_numbers }}
                                                    ({{ count(explode(',', $slot->slot_numbers)) }})</td>
                                                <td>{{ $slot->price }}</td>
                                                @php
                                                    $slot_type = explode(',', $slot->slot_type);
                                                @endphp
                                                <td>
                                                    <ul>
                                                        @foreach ($slot_type as $type)
                                                            <li>{{ $type }}</li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td>
                                                    @php
                                                        $slot->status != 0 ? $value = 'Active' : $value = 'Inactive'
                                                    @endphp
                                                    <a href="{{ url('admin/update-satus/'.$slot->id) }}" class="badge {{ $value == 'Active' ? 'badge-primary':'badge-danger' }} px-2">{{ $value }}</a>
                                                </td>
                                                <td>
                                                    <span><a href="{{ url('admin/edit-slot/'.$slot->id) }}" data-toggle="tooltip" data-placement="top"
                                                            title="" data-original-title="Edit"><i
                                                                class="fa fa-pencil color-muted m-r-5"></i> </a><a
                                                            href="{{ url('admin/delete-slot/'.$slot->id) }}" data-toggle="tooltip" data-placement="top"
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
