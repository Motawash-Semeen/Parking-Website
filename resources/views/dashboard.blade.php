
@extends('master')
@section('frontend.content')
    @include('frontend.partials.secondHead')
    <style>

    </style>
    {{-- <div class="container">
        <div class="row dashboard">
            <div class="col-12">
                <!-- Page title -->
                <div class="my-5">
                    <h3>My Profile</h3>
                    <hr>
                </div>
                <!-- Form START -->
                <form class="file-upload">
                    <div class="row mb-5 gx-5">
                        <!-- Contact detail -->
                        <div class="col-xxl-8 mb-5 mb-xxl-0">
                            <div class="bg-secondary-soft px-4 py-5 rounded">
                                <div class="row g-3">
                                    <h4 class="mb-4 mt-0">Contact detail</h4>
                                    <!-- First Name -->
                                    <div class="col-md-6">
                                        <label class="form-label">First Name *</label>
                                        <input type="text" class="form-control" placeholder="" aria-label="First name"
                                            value="Scaralet">
                                    </div>
                                    <!-- Last name -->
                                    <div class="col-md-6">
                                        <label class="form-label">Last Name *</label>
                                        <input type="text" class="form-control" placeholder="" aria-label="Last name"
                                            value="Doe">
                                    </div>
                                    <!-- Phone number -->
                                    <div class="col-md-6">
                                        <label class="form-label">Phone number *</label>
                                        <input type="text" class="form-control" placeholder="" aria-label="Phone number"
                                            value="(333) 000 555">
                                    </div>
                                    <!-- Mobile number -->
                                    <div class="col-md-6">
                                        <label class="form-label">Mobile number *</label>
                                        <input type="text" class="form-control" placeholder="" aria-label="Phone number"
                                            value="+91 9852 8855 252">
                                    </div>
                                    <!-- Email -->
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Email *</label>
                                        <input type="email" class="form-control" id="inputEmail4"
                                            value="example@homerealty.com">
                                    </div>
                                    <!-- Skype -->
                                    <div class="col-md-6">
                                        <label class="form-label">Skype *</label>
                                        <input type="text" class="form-control" placeholder="" aria-label="Phone number"
                                            value="Scaralet D">
                                    </div>
                                </div> <!-- Row END -->
                            </div>
                        </div>
                        <!-- Upload profile -->
                        <div class="col-xxl-4">
                            <div class="bg-secondary-soft px-4 py-5 rounded">
                                <div class="row g-3">
                                    <h4 class="mb-4 mt-0">Upload your profile photo</h4>
                                    <div class="text-center">
                                        <!-- Image upload -->
                                        <div class="square position-relative display-2 mb-3">
                                            <i
                                                class="fas fa-fw fa-user position-absolute top-50 start-50 translate-middle text-secondary"></i>
                                        </div>
                                        <!-- Button -->
                                        <input type="file" id="customFile" name="file" hidden="">
                                        <label class="btn btn-success-soft btn-block" for="customFile">Upload</label>
                                        <button type="button" class="btn btn-danger-soft">Remove</button>
                                        <!-- Content -->
                                        <p class="text-muted mt-3 mb-0"><span class="me-1">Note:</span>Minimum size
                                            300px
                                            x 300px</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Row END -->

                    <!-- Social media detail -->
                    <div class="row mb-5 gx-5">
                        <div class="col-xxl-6 mb-5 mb-xxl-0">
                            <div class="bg-secondary-soft px-4 py-5 rounded">
                                <div class="row g-3">
                                    <h4 class="mb-4 mt-0">Social media detail</h4>
                                    <!-- Facebook -->
                                    <div class="col-md-6">
                                        <label class="form-label"><i
                                                class="fab fa-fw fa-facebook me-2 text-facebook"></i>Facebook *</label>
                                        <input type="text" class="form-control" placeholder="" aria-label="Facebook"
                                            value="http://www.facebook.com">
                                    </div>
                                    <!-- Twitter -->
                                    <div class="col-md-6">
                                        <label class="form-label"><i
                                                class="fab fa-fw fa-twitter text-twitter me-2"></i>Twitter *</label>
                                        <input type="text" class="form-control" placeholder="" aria-label="Twitter"
                                            value="http://www.twitter.com">
                                    </div>
                                    <!-- Linkedin -->
                                    <div class="col-md-6">
                                        <label class="form-label"><i
                                                class="fab fa-fw fa-linkedin-in text-linkedin me-2"></i>Linkedin *</label>
                                        <input type="text" class="form-control" placeholder="" aria-label="Linkedin"
                                            value="http://www.linkedin.com">
                                    </div>
                                    <!-- Instragram -->
                                    <div class="col-md-6">
                                        <label class="form-label"><i
                                                class="fab fa-fw fa-instagram text-instagram me-2"></i>Instagram *</label>
                                        <input type="text" class="form-control" placeholder=""
                                            aria-label="Instragram" value="http://www.instragram.com">
                                    </div>
                                    <!-- Dribble -->
                                    <div class="col-md-6">
                                        <label class="form-label"><i
                                                class="fas fa-fw fa-basketball-ball text-dribbble me-2"></i>Dribble
                                            *</label>
                                        <input type="text" class="form-control" placeholder="" aria-label="Dribble"
                                            value="http://www.dribble.com">
                                    </div>
                                    <!-- Pinterest -->
                                    <div class="col-md-6">
                                        <label class="form-label"><i
                                                class="fab fa-fw fa-pinterest text-pinterest"></i>Pinterest *</label>
                                        <input type="text" class="form-control" placeholder="" aria-label="Pinterest"
                                            value="http://www.pinterest.com">
                                    </div>
                                </div> <!-- Row END -->
                            </div>
                        </div>

                        <!-- change password -->
                        <div class="col-xxl-6">
                            <div class="bg-secondary-soft px-4 py-5 rounded">
                                <div class="row g-3">
                                    <h4 class="my-4">Change Password</h4>
                                    <!-- Old password -->
                                    <div class="col-md-6">
                                        <label for="exampleInputPassword1" class="form-label">Old password *</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    <!-- New password -->
                                    <div class="col-md-6">
                                        <label for="exampleInputPassword2" class="form-label">New password *</label>
                                        <input type="password" class="form-control" id="exampleInputPassword2">
                                    </div>
                                    <!-- Confirm password -->
                                    <div class="col-md-12">
                                        <label for="exampleInputPassword3" class="form-label">Confirm Password *</label>
                                        <input type="password" class="form-control" id="exampleInputPassword3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Row END -->
                    <!-- button -->
                    <div class="gap-3 d-md-flex justify-content-md-end text-center">
                        <button type="button" class="btn btn-danger btn-lg">Delete profile</button>
                        <button type="button" class="btn btn-primary btn-lg">Update profile</button>
                    </div>
                </form> <!-- Form END -->
            </div>
        </div>
    </div> --}}

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
                    type="button" role="tab" aria-controls="nav-notification"
                    aria-selected="false">Notifications</button>
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
                                    src="{{ $user->photo != null ? 'frontend/assets/img/user/'.$user->photo : 'http://bootdey.com/img/Content/avatar/avatar1.png' }}" alt="" id="profile-picture">
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
                                        <label class="small mb-1" for="inputUsername">Full Name <span class="text-danger">*</span></label>
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
                                            <label class="small mb-1" for="inputFirstName">Email <span class="text-danger">*</span></label>
                                            <input class="form-control" id="inputFirstName" type="email"
                                                placeholder="Enter your Email" readonly value="{{ $user->email }}">   
                                        </div>
                                        <!-- Form Group (number)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputLastName">Mobile <span class="text-danger">*</span></label>
                                            <input class="form-control" id="inputLastName" type="text"
                                                placeholder="Enter your number" name="number" value="{{ $user->number }}">
                                                @error('number')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Form Row        -->
                                    <div class="row gx-3 mb-3">
                                        <!-- Form Group (nid)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputOrgName">NID <span class="text-danger">*</span></label>
                                            <input class="form-control" id="inputOrgName" type="text"
                                                placeholder="Enter your NID Number" readonly value="{{ $user->nid }}">
                                                
                                        </div>
                                        <!-- Form Group (location)-->
                                        <div class="col-md-6">
                                            <label class="small mb-1" for="inputLocation">Address</label>
                                            <input class="form-control" id="inputLocation" type="text"
                                                placeholder="Enter your address" name="address" value="{{ $user->address }}">
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
                                <div class="small text-muted">Current monthly bill</div>
                                <div class="h3">$20.00</div>
                                <a class="text-arrow-icon small" href="#!">
                                    Switch to yearly billing
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-arrow-right">
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                        <polyline points="12 5 19 12 12 19"></polyline>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <!-- Billing card 2-->
                        <div class="card h-100 border-start-lg border-start-secondary">
                            <div class="card-body">
                                <div class="small text-muted">Next payment due</div>
                                <div class="h3">July 15</div>
                                <a class="text-arrow-icon small text-secondary" href="#!">
                                    View payment history
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-arrow-right">
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                        <polyline points="12 5 19 12 12 19"></polyline>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4">
                        <!-- Billing card 3-->
                        <div class="card h-100 border-start-lg border-start-success">
                            <div class="card-body">
                                <div class="small text-muted">Current plan</div>
                                <div class="h3 d-flex align-items-center">Freelancer</div>
                                <a class="text-arrow-icon small text-success" href="#!">
                                    Upgrade plan
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-arrow-right">
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                        <polyline points="12 5 19 12 12 19"></polyline>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Payment methods card-->
                <div class="card card-header-actions mb-4">
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
                </div>
                <!-- Billing history card-->
                <div class="card mb-4">
                    <div class="card-header">Billing History</div>
                    <div class="card-body p-0">
                        <!-- Billing history table-->
                        <div class="table-responsive table-billing-history">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th class="border-gray-200" scope="col">Transaction ID</th>
                                        <th class="border-gray-200" scope="col">Date</th>
                                        <th class="border-gray-200" scope="col">Amount</th>
                                        <th class="border-gray-200" scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#39201</td>
                                        <td>06/15/2021</td>
                                        <td>$29.99</td>
                                        <td><span class="badge bg-light text-dark">Pending</span></td>
                                    </tr>
                                    <tr>
                                        <td>#38594</td>
                                        <td>05/15/2021</td>
                                        <td>$29.99</td>
                                        <td><span class="badge bg-success">Paid</span></td>
                                    </tr>
                                    <tr>
                                        <td>#38223</td>
                                        <td>04/15/2021</td>
                                        <td>$29.99</td>
                                        <td><span class="badge bg-success">Paid</span></td>
                                    </tr>
                                    <tr>
                                        <td>#38125</td>
                                        <td>03/15/2021</td>
                                        <td>$29.99</td>
                                        <td><span class="badge bg-success">Paid</span></td>
                                    </tr>
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
                                <button class="btn btn-danger-soft text-danger" type="button"  data-bs-toggle="modal" data-bs-target="#deleteModal">I understand, delete my
                                    account</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-notification" role="tabpanel" aria-labelledby="nav-notification-tab"
                tabindex="0">
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Email notifications preferences card-->
                        <div class="card card-header-actions mb-4">
                            <div class="card-header">
                                Email Notifications
                                <div class="form-check form-switch">
                                    <input class="form-check-input" id="flexSwitchCheckChecked" type="checkbox"
                                        checked="">
                                    <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                                </div>
                            </div>
                            <div class="card-body">
                                <form>
                                    <!-- Form Group (default email)-->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputNotificationEmail">Default notification
                                            email</label>
                                        <input class="form-control" id="inputNotificationEmail" type="email"
                                            value="name@example.com" disabled="">
                                    </div>
                                    <!-- Form Group (email updates checkboxes)-->
                                    <div class="mb-0">
                                        <label class="small mb-2">Choose which types of email updates you receive</label>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" id="checkAccountChanges" type="checkbox"
                                                checked="">
                                            <label class="form-check-label" for="checkAccountChanges">Changes made to your
                                                account</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" id="checkAccountGroups" type="checkbox"
                                                checked="">
                                            <label class="form-check-label" for="checkAccountGroups">Changes are made to
                                                groups you're part of</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" id="checkProductUpdates" type="checkbox"
                                                checked="">
                                            <label class="form-check-label" for="checkProductUpdates">Product updates for
                                                products you've purchased or starred</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" id="checkProductNew" type="checkbox"
                                                checked="">
                                            <label class="form-check-label" for="checkProductNew">Information on new
                                                products and services</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" id="checkPromotional" type="checkbox">
                                            <label class="form-check-label" for="checkPromotional">Marketing and
                                                promotional offers</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" id="checkSecurity" type="checkbox"
                                                checked="" disabled="">
                                            <label class="form-check-label" for="checkSecurity">Security alerts</label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- SMS push notifications card-->
                        <div class="card card-header-actions mb-4">
                            <div class="card-header">
                                Push Notifications
                                <div class="form-check form-switch">
                                    <input class="form-check-input" id="smsToggleSwitch" type="checkbox" checked="">
                                    <label class="form-check-label" for="smsToggleSwitch"></label>
                                </div>
                            </div>
                            <div class="card-body">
                                <form>
                                    <!-- Form Group (default SMS number)-->
                                    <div class="mb-3">
                                        <label class="small mb-1" for="inputNotificationSms">Default SMS number</label>
                                        <input class="form-control" id="inputNotificationSms" type="tel"
                                            value="123-456-7890" disabled="">
                                    </div>
                                    <!-- Form Group (SMS updates checkboxes)-->
                                    <div class="mb-0">
                                        <label class="small mb-2">Choose which types of push notifications you
                                            receive</label>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" id="checkSmsComment" type="checkbox"
                                                checked="">
                                            <label class="form-check-label" for="checkSmsComment">Someone comments on your
                                                post</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" id="checkSmsShare" type="checkbox">
                                            <label class="form-check-label" for="checkSmsShare">Someone shares your
                                                post</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" id="checkSmsFollow" type="checkbox"
                                                checked="">
                                            <label class="form-check-label" for="checkSmsFollow">A user follows your
                                                account</label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" id="checkSmsGroup" type="checkbox">
                                            <label class="form-check-label" for="checkSmsGroup">New posts are made in
                                                groups you're part of</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" id="checkSmsPrivateMessage" type="checkbox"
                                                checked="">
                                            <label class="form-check-label" for="checkSmsPrivateMessage">You receive a
                                                private message</label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <!-- Notifications preferences card-->
                        <div class="card">
                            <div class="card-header">Notification Preferences</div>
                            <div class="card-body">
                                <form>
                                    <!-- Form Group (notification preference checkboxes)-->
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" id="checkAutoGroup" type="checkbox"
                                            checked="">
                                        <label class="form-check-label" for="checkAutoGroup">Automatically subscribe to
                                            group notifications</label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" id="checkAutoProduct" type="checkbox">
                                        <label class="form-check-label" for="checkAutoProduct">Automatically subscribe to
                                            new product notifications</label>
                                    </div>
                                    <!-- Submit button-->
                                    <button class="btn btn-danger-soft text-danger">Unsubscribe from all
                                        notifications</button>
                                </form>
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
    <script>
        function previewImage() {
            const inputProfileImage = document.getElementById('inputProfileImage');
            const profilePicture = document.getElementById('profile-picture');
            const file = inputProfileImage.files[0];
    
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    profilePicture.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
