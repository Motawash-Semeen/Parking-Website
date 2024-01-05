@extends('master')
@section('frontend.content')
    @include('frontend.partials.secondHead')

    <div class="row w-50 mx-auto my-5">
      <h3 class="text-center m-3">Plaese Complete the following to get Started</h3>
        <div class="col-lg-12">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-body">
                    <form method="POST" action="{{ url('store-nid') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">NID Number <span
                                    class="text-danger">*</span></label>
                            <input class="form-control" id="inputUsername" type="number"
                                placeholder="Enter your nid Number" name="nid">
                                @error('nid')
                                    <span class="text-danger">{{$message}}</span>
                                  
                                @enderror
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (Email)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">Password <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" id="inputFirstName" type="password"
                                    placeholder="Enter your Password" name="password">
                                    @error('password')
                                    <span class="text-danger">{{$message}}</span>
                                  
                                @enderror
                            </div>
                            <!-- Form Group (number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Confirm Password <span
                                        class="text-danger">*</span></label>
                                <input class="form-control" id="inputLastName" type="password"
                                    placeholder="Enter your Confirm Password" name="confirm_password">
                                    @error('confirm_password')
                                    <span class="text-danger">{{$message}}</span>
                                  
                                @enderror
                            </div>
                        </div>


                        <!-- Save changes button-->
                        <button class="btn btn-info text-white m-auto" type="submit">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
