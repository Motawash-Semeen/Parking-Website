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
                            <h4 class="card-title">Social Links</h4>
                                <div class="form-validation">
                                    {{-- <form class="form-valide" action="{{ url('admin/all-links') }}" method="post" novalidate="novalidate"> --}}
                                        {!! Form::open([
                                            'url' => 'admin/all-links',
                                            'method' => 'post',
                                            'class' => 'form-valide',
                                            'nonvalidate' => 'nonvalidate',
                                            ]) 
                                        !!}

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Fcaebook <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-username" name="facebook" placeholder="Enter your facebook Link.." value="{{ $links->facebook }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-email">Twitter <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-email" name="twitter" placeholder="Enter your twitter Link.." value="{{ $links->twitter }}">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-confirm-password">LinkedIn <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-confirm-password" name="linkedin" placeholder="Enter your linkedin Link.." value="{{ $links->linkedin }}">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-password">Behance <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-password" name="behance" placeholder="Enter your behance Link.." value="{{ $links->behance }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-confirm-password">Dribbble <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-confirm-password" name="dribbble" placeholder="Enter your dribbble Link.." value="{{ $links->dribbble }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                                                {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                                            </div>
                                        </div>
                                    {{-- </form> --}}
                                    {!! Form::close() !!}

                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>
@endsection
