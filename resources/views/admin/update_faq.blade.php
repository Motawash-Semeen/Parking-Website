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
                            <h4 class="card-title">FAQ UPDATE</h4>
                            <form action="{{ url('admin/store-faq') }}" method="POST" id="myForm">
                                @csrf
                                <div class="card">
                                  <div class="card-body">
                                    <div class="form-group">
                                      <label>Question:</label>
                                      <input type="text" class="form-control input-default" placeholder="Questions" name="question" value="{{ $faq ? $faq->question:'' }}">
                                      @error('question')
                                          <span class="text-danger">{{ $message }}</span>
                                        
                                      @enderror
                                  </div>
                                  <div class="basic-form">
                                        <div class="form-group">
                                            <label>Answer:</label>
                                            <textarea class="form-control h-150px" rows="6" id="comment" name="answer">{{ $faq ? $faq->answer:'' }}</textarea>
                                            @error('answer')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                </div>
                                <div class="form-group row mt-5">
                                  <div class="col-lg-12 ml-auto">
                                      <button type="submit" class="btn btn-primary">Submit</button>
                                  </div>
                              </div>
                                  </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>
@endsection
