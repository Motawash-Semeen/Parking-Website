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
                              <div class="faq-btn text-right">
                                <a href="{{ url('admin/store-faq') }}" class="btn btn-success text-white"><i class="fa-solid fa-plus mr-2"></i> Add FAQ</a>
                              </div>
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr style="background-color: rgba(0, 0, 0, 0.05);">
                                            <th>Question</th>
                                            <th>Answer</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($faqs as $faq)
                                            <tr>
                                                <td>{{ $faq->question }}</td>
                                                <td>{{ $faq->answer }}</td>
                                                <td>
                                                    @if ($faq->status == 1)
                                                        <span class="badge badge-success text-white">Active</span>
                                                    @else
                                                        <span class="badge badge-danger text-white">Inactive</span>
                                                    @endif
                                                </td>
                                                <td style="text-align: center;">
                                                    <span><a
                                                      href="{{ url('admin/edit-faq/'.$faq->id) }}" data-toggle="tooltip" data-placement="top"
                                                      title="" data-original-title="Edit"><i
                                                          class="fa fa-pencil color-muted m-r-5"></i></a></span>
                                                    <span><a
                                                      href="{{ url('admin/faq-delete/'.$faq->id) }}" data-toggle="tooltip" data-placement="top"
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
