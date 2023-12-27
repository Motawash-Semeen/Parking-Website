@extends('master')
@section('frontend.content')
    @include('frontend.partials.secondHead')
    <style>
        .badge-danger {
            background-color: #dc3545;
            border-radius: 5px;
        }

        .badge-primary {
            background-color: #ffde16;
            border-radius: 5px;
        }

        a {
            text-decoration: none;

        }

        td {
            color: #69707a !important;
        }
    </style>
    <script src="https://kit.fontawesome.com/4a3cf85510.js" crossorigin="anonymous"></script>

    <div class="container px-4 mt-4" id="profile">
        <!-- Account page navigation-->
        <nav class="nav nav-borders">
            <div class="nav nav-tabs border border-0" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button"
                    role="tab" aria-controls="nav-home" aria-selected="true">Profile</button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                    type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Billing</button>
                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact"
                    type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Security</button>
                <button class="nav-link" id="nav-notification-tab" data-bs-toggle="tab" data-bs-target="#nav-notification"
                    type="button" role="tab" aria-controls="nav-notification" aria-selected="false">Slots</button>
            </div>
        </nav>
        <hr class="mt-0">
        <div class="tab-content my-4" id="nav-tabContent">
            <div class=" tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"
                tabindex="0">
                <div class="row">
                    <div class="col-lg-4">
                        <!-- Profile picture card-->
                        <div class="card mb-4 mb-xl-0">
                            <div class="card-header">Profile Picture</div>
                            <div class="card-body text-center">
                                <!-- Profile picture image-->
                                <img class="img-account-profile rounded-circle mb-2"
                                    src="{{ $user->photo != null ? 'frontend/assets/img/user/' . $user->photo : 'http://bootdey.com/img/Content/avatar/avatar1.png' }}"
                                    alt="" id="profile-picture">
                                <!-- Profile picture help block-->
                                <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                                <!-- Profile picture upload button-->
                                <div class="input-group d-flex align-items-center justify-content-center">
                                    <form action="{{ url('photoUpload') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="custom-file mb-3">

                                            <input type="file" class="custom-file-input" id="inputProfileImage"
                                                accept="image/*" onchange="previewImage()" name="photo">
                                            @error('photo')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="input-group-append">
                                            <button class="btn btn-yellow" type="submit">Upload new
                                                image</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card-header">Account Details</div>
                            <div class="card-body">
                                <form method="POST" action="{{ url('updateUser') }}">
                                    @csrf
                                    <!-- Form Group (username)-->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputUsername">Full Name <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" id="inputUsername" type="text"
                                            placeholder="Enter your name" name="name" value="{{ $user->name }}">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (Email)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputFirstName">Email <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" id="inputFirstName" type="email"
                                                placeholder="Enter your Email" readonly value="{{ $user->email }}">
                                        </div>
                                        <!-- Form Group (number)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputLastName">Mobile <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" id="inputLastName" type="text"
                                                placeholder="Enter your number" name="number"
                                                value="{{ $user->number }}">
                                            @error('number')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Form Row        -->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (nid)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputOrgName">NID <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" id="inputOrgName" type="text"
                                                placeholder="Enter your NID Number" readonly value="{{ $user->nid }}">

                                        </div>
                                        <!-- Form Group (location)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputLocation">Address</label>
                                            <input class="form-control" id="inputLocation" type="text"
                                                placeholder="Enter your address" name="address"
                                                value="{{ $user->address }}">
                                        </div>
                                    </div>
                                    {{-- <!-- Form Group (email address)-->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputEmailAddress">Email address</label>
                                        <input class="form-control" id="inputEmailAddress" type="email" value="name@example.com">
                                    </div>
                                    <!-- Form Row-->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (phone number)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputPhone">Phone number</label>
                                            <input class="form-control" id="inputPhone" type="tel"
                                                placeholder="Enter your phone number" value="555-123-4567">
                                        </div>
                                        <!-- Form Group (birthday)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputBirthday">Birthday</label>
                                            <input class="form-control" id="inputBirthday" type="text"
                                                name="birthday" placeholder="Enter your birthday" value="06/10/1988">
                                        </div>
                                    </div> --}}
                                    <!-- Save changes button-->
                                    <button class="btn btn-yellow" type="button">Save changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"
                tabindex="0">
                <div class="row">
                    <div class="col-lg-4 mb-4">
                        <!-- Billing card 1-->
                        <div class="card h-100 border-start-lg border-start-primary">
                            <div class="card-body">
                                <div class="small text-muted">Spend</div>
                                <div class="h3">${{ number_format($trans_amount, 2, '.', ',') }}</div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <!-- Billing card 2-->
                        @php
                            $total_slot = 0;
                            foreach ($slots as $slot) {
                                $total_slot += count(explode(',', $slot->slot_numbers));
                            }
                        @endphp
                        <div class="card h-100 border-start-lg border-start-secondary">
                            <div class="card-body">
                                <div class="small text-muted">Total Transaction</div>
                                <div class="h3">{{ $trans_count }}</div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <!-- Billing card 3-->
                        <div class="card h-100 border-start-lg border-start-success">
                            <div class="card-body">
                                <div class="small text-muted">Net Profit</div>
                                @if ($has_slot)
                                    <div class="h3">{{ number_format($total_profit, 2, '.', ',') }}</div>
                                @else
                                    <div class="h3 d-flex align-items-center"><a
                                            class="text-arrow-icon small text-success" href="{{ url('service') }}">
                                            List Slot Now
                                            <svg xmlns="" width="24" height="24" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-arrow-right">
                                                <line x1="5" y1="12" x2="19" y2="12">
                                                </line>
                                                <polyline points="12 5 19 12 12 19"></polyline>
                                            </svg>
                                        </a>
                                    </div>
                                @endif


                            </div>
                        </div>
                    </div>
                </div>
                <!-- Payment methods card-->
                {{-- <div class="card card-header-actions mb-4">
                    <div class="card-header">
                        Payment Methods
                        <button class="btn btn-sm btn-primary" type="button">Add Payment Method</button>
                    </div>
                    <div class="card-body px-0">
                        <!-- Payment method 1-->
                        <div class="d-flex align-items-center justify-content-between px-4">
                            <div class="d-flex align-items-center">
                                <i class="fab fa-cc-visa fa-2x cc-color-visa"></i>
                                <div class="ms-4">
                                    <div class="small">Visa ending in 1234</div>
                                    <div class="text-xs text-muted">Expires 04/2024</div>
                                </div>
                            </div>
                            <div class="ms-4 small">
                                <div class="badge bg-light text-dark me-3">Default</div>
                                <a href="#!">Edit</a>
                            </div>
                        </div>
                        <hr>
                        <!-- Payment method 2-->
                        <div class="d-flex align-items-center justify-content-between px-4">
                            <div class="d-flex align-items-center">
                                <i class="fab fa-cc-mastercard fa-2x cc-color-mastercard"></i>
                                <div class="ms-4">
                                    <div class="small">Mastercard ending in 5678</div>
                                    <div class="text-xs text-muted">Expires 05/2022</div>
                                </div>
                            </div>
                            <div class="ms-4 small">
                                <a class="text-muted me-3" href="#!">Make Default</a>
                                <a href="#!">Edit</a>
                            </div>
                        </div>
                        <hr>
                        <!-- Payment method 3-->
                        <div class="d-flex align-items-center justify-content-between px-4">
                            <div class="d-flex align-items-center">
                                <i class="fab fa-cc-amex fa-2x cc-color-amex"></i>
                                <div class="ms-4">
                                    <div class="small">American Express ending in 9012</div>
                                    <div class="text-xs text-muted">Expires 01/2026</div>
                                </div>
                            </div>
                            <div class="ms-4 small">
                                <a class="text-muted me-3" href="#!">Make Default</a>
                                <a href="#!">Edit</a>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- Billing history card-->
                <div class="card mb-4">
                    <div class="card-header">Active Books</div>
                    <div class="card-body p-0">
                        <!-- Billing history table-->
                        <div class="table-responsive table-billing-history">
                            <table class="table mb-0">
                                <thead>
                                    <tr style="background-color: rgba(0, 0, 0, 0.05); ">
                                        <th>Invoice</th>
                                        <th>Book Date</th>
                                        <th>Slots Number</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Invoice</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($active_books->count() == 0)
                                        <tr>
                                            <td colspan="6" style="text-align: center; color: #69707a;">No Active Book
                                            </td>
                                        </tr>
                                    @else
                                        @foreach ($active_books as $tran)
                                            <tr>
                                                <td style="color: #69707a;">{{ $tran->info->invoice_number }}</td>
                                                <td style="color: #69707a;">{{ date('Y-m-d H:i:s', $tran->order_date) }}
                                                </td>
                                                <td style="color: #69707a; text-align: center;">{{ $tran->slot_number }}
                                                </td>
                                                <td style="color: #69707a;">{{ $tran->info->amount }}</td>
                                                <td>
                                                    @php
                                                        $tran->info->status != 'confirmed' ? ($value = 'Pending') : ($value = 'Confirmed');
                                                    @endphp
                                                    <span
                                                        class="badge {{ $value == 'Confirmed' ? 'badge-primary' : 'badge-danger' }} px-2">{{ $value }}</span>
                                                </td>
                                                <td style="text-align: center;">
                                                    <span><a href="{{ url('direction/' . $tran->info->id) }}"
                                                            data-toggle="tooltip" data-placement="top" title="Direction"
                                                            data-original-title="Direction"><i
                                                                class="fa-solid fa-route color-muted m-r-5"
                                                                style="color:#69707a"></i> </a></span>
                                                    <span class="ms-3"><a
                                                            href="{{ url('invoice_download/' . $tran->info->id) }}"
                                                            data-toggle="tooltip" data-placement="top" title="View"
                                                            data-original-title="View"><i
                                                                class="fa-solid fa-file-arrow-down color-muted m-r-5"
                                                                style="color:#69707a"></i> </a>

                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Billing History</div>
                    <div class="card-body p-0">
                        <!-- Billing history table-->
                        <div class="table-responsive table-billing-history">
                            <table class="table mb-0">
                                <thead>
                                    <tr style="background-color: rgba(0, 0, 0, 0.05); ">
                                        <th>Invoice</th>
                                        <th>Book Date</th>
                                        <th>Slots Number</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Invoice</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($trans as $tran)
                                        <tr>
                                            <td style="color: #69707a;">{{ $tran->invoice_number }}</td>
                                            <td style="color: #69707a;">{{ date('Y-m-d H:i:s', $tran->order_date) }}</td>
                                            <td style="color: #69707a; text-align: center;">{{ $tran->slot_number }}</td>
                                            <td style="color: #69707a;">{{ $tran->amount }}</td>
                                            <td>
                                                @php
                                                    $tran->status != 'confirmed' ? ($value = 'Pending') : ($value = 'Confirmed');
                                                @endphp
                                                <span
                                                    class="badge {{ $value == 'Confirmed' ? 'badge-primary' : 'badge-danger' }} px-2">{{ $value }}</span>
                                            </td>
                                            <td style="text-align: center;">
                                                <span>
                                                    @php
                                                        $has_review = App\Models\TransationInfo::with('reviews')
                                                            ->where('id', $tran->id)
                                                            ->where('user_id', Auth::user()->id)
                                                            ->first();
                                                        if (count($has_review->reviews) > 0) {
                                                        } else {
                                                            echo '<button id="' .
                                                                $tran->id .
                                                                '" onclick="setId(this.id)"
                                                                    class="me-3 p-0 bg-transparent border border-0"
                                                                    data-toggle="tooltip" data-placement="top" title="Write Review"
                                                                    data-original-title="Write Review" data-bs-toggle="modal"
                                                                    data-bs-target="#reviewModal"><i
                                                                    class="fa-solid fa-file-pen color-muted m-r-5"
                                                                    style="color:#69707a"></i>
                                                                </button>';
                                                        }
                                                    @endphp

                                                    <a href="{{ url('invoice_download/' . $tran->id) }}"
                                                        data-toggle="tooltip" data-placement="top" title="View"
                                                        data-original-title="View"><i
                                                            class="fa-solid fa-file-arrow-down color-muted m-r-5"
                                                            style="color:#69707a"></i>
                                                    </a>
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab"
                tabindex="0">
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Change password card-->
                        <div class="card mb-4">
                            <div class="card-header">Change Password</div>
                            <div class="card-body">
                                <form method="POST" action="{{ url('/changePassword') }}">
                                    @csrf
                                    <!-- Form Group (current password)-->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="currentPassword">Current Password</label>
                                        <input class="form-control" id="currentPassword" type="password"
                                            placeholder="Enter current password" name="password">
                                    </div>
                                    <!-- Form Group (new password)-->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="newPassword">New Password</label>
                                        <input class="form-control" id="newPassword" type="password"
                                            placeholder="Enter new password" name="newPassword">
                                    </div>
                                    <!-- Form Group (confirm password)-->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="confirmPassword">Confirm Password</label>
                                        <input class="form-control" id="confirmPassword" type="password"
                                            placeholder="Confirm new password" name="confirmPassword">
                                    </div>
                                    <button class="btn btn-yellow" type="submit">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        {{-- <!-- Two factor authentication card-->
                        <div class="card mb-4">
                            <div class="card-header">Two-Factor Authentication</div>
                            <div class="card-body">
                                <p>Add another level of security to your account by enabling two-factor authentication. We
                                    will send you a text message to verify your login attempts on unrecognized devices and
                                    browsers.</p>
                                <form>
                                    <div class="form-check">
                                        <input class="form-check-input" id="twoFactorOn" type="radio" name="twoFactor"
                                            checked="">
                                        <label class="form-check-label" for="twoFactorOn">On</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" id="twoFactorOff" type="radio"
                                            name="twoFactor">
                                        <label class="form-check-label" for="twoFactorOff">Off</label>
                                    </div>
                                    <div class="mt-3">
                                        <label class="small mb-1" for="twoFactorSMS">SMS Number</label>
                                        <input class="form-control" id="twoFactorSMS" type="tel"
                                            placeholder="Enter a phone number" value="555-123-4567">
                                    </div>
                                </form>
                            </div>
                        </div> --}}
                        <!-- Delete account card-->
                        <div class="card mb-4">
                            <div class="card-header">Delete Account</div>
                            <div class="card-body">
                                <p>Deleting your account is a permanent action and cannot be undone. If you are sure you
                                    want to delete your account, select the button below.</p>
                                <button class="btn btn-danger-soft text-danger" type="button" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal">I understand, delete my
                                    account</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-notification" role="tabpanel" aria-labelledby="nav-notification-tab"
                tabindex="0">
                <div class="row">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Your Listed Slots</h4>
                                        @if ($has_slot)
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered zero-configuration">
                                                    <thead>
                                                        <tr style="background-color: rgba(0, 0, 0, 0.05);">
                                                            <th width="300px">Address</th>
                                                            <th>Contact Number</th>
                                                            <th>Slots Number</th>
                                                            <th>Price/hr</th>
                                                            <th>Status</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($slots as $slot)
                                                            <tr>
                                                                <td>{{ $slot->building_number . ',' . $slot->building_name . ',' . $slot->post_area . ',' . $slot->city }}
                                                                </td>
                                                                <td>{{ $slot->mobile }}</td>
                                                                <td>{{ $slot->slot_numbers }}
                                                                    ({{ count(explode(',', $slot->slot_numbers)) }})
                                                                </td>
                                                                <td>{{ $slot->price }}</td>
                                                                @php
                                                                    $slot_type = explode(',', $slot->slot_type);
                                                                @endphp

                                                                <td>
                                                                    @php
                                                                        $slot->status != 0 ? ($value = 'Active') : ($value = 'Inactive');
                                                                    @endphp
                                                                    <a href="{{ url('user/update-satus/' . $slot->id) }}"
                                                                        class="badge {{ $value == 'Active' ? 'badge-primary' : 'badge-danger' }} px-2">{{ $value }}</a>
                                                                </td>
                                                                <td>
                                                                    <span><a href="{{ url('user/edit-slot/' . $slot->id) }}"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            title="" data-original-title="Edit"><i
                                                                                class="fa fa-pencil color-muted m-r-5"></i>
                                                                        </a><a
                                                                            href="{{ url('user/delete-slot/' . $slot->id) }}"
                                                                            data-toggle="tooltip" data-placement="top"
                                                                            title="" data-original-title="Close"><i
                                                                                class="fa fa-close color-danger"></i></a></span>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @else
                                            <div class="text-center">
                                                <h3>You have no listed slot</h3>
                                                <a href="{{ url('service') }}" class="btn btn-yellow">List Slot</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    {{-- ///////////////////////////////Modal////////////////////// --}}

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border border-0">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Account?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ url('deleteUser') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Re-enter Password:</label>
                            <input type="password" class="form-control" id="recipient-name" name="passowrd">
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Confirm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Review Writing Modal -->
    <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reviewModalLabel">Write a Review</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Review Form -->
                    <form action="" method="GET" class="review_form">
                        @csrf

                        <div class="mb-3">
                            <label for="reviewContent" class="form-label">Your Review</label>
                            <textarea class="form-control" id="reviewContent" rows="4" required name="review"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Rating</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input radio" type="checkbox" id="rating1" value="1"
                                    name="rating">
                                <label class="form-check-label" for="rating1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input radio" type="checkbox" id="rating2" value="2"
                                    name="rating">
                                <label class="form-check-label" for="rating2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input radio" type="checkbox" id="rating3" value="3"
                                    name="rating">
                                <label class="form-check-label" for="rating3">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input radio" type="checkbox" id="rating4" value="4"
                                    name="rating">
                                <label class="form-check-label" for="rating4">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input radio" type="checkbox" id="rating5" value="5"
                                    name="rating">
                                <label class="form-check-label" for="rating5">5</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Review</button>
                    </form>
                    <!-- End Review Form -->
                </div>
            </div>
        </div>
    </div>
    <script>
        function previewImage() {
            const inputProfileImage = document.getElementById('inputProfileImage');
            const profilePicture = document.getElementById('profile-picture');
            const file = inputProfileImage.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    profilePicture.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }

        function setId(id) {
            document.querySelector('.review_form').action = "{{ url('write-review') }}/" + id;
        }
        $("input:checkbox").on('click', function() {
            // in the handler, 'this' refers to the box clicked on
            var $box = $(this);
            if ($box.is(":checked")) {
                // the name of the box is retrieved using the .attr() method
                // as it is assumed and expected to be immutable
                var group = "input:checkbox[name='" + $box.attr("name") + "']";
                // the checked state of the group/box on the other hand will change
                // and the current value is retrieved using .prop() method
                $(group).prop("checked", false);
                $box.prop("checked", true);
            } else {
                $box.prop("checked", false);
            }
        });
    </script>
@endsection
