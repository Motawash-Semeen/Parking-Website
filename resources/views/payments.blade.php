@extends('master')
@section('frontend.content')
    @include('frontend.partials.secondHead')
    <style>
        .hide {
            display: none;
        }

        .has-error {
            display: block;
        }
    </style>
    <div class="container py-5" style="width: 100vw;" id="payment-page">
        <!-- For demo purpose -->
        <div class="row mb-4">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-6">Make Payments</h1>
            </div>
        </div> <!-- End -->
        <div class="row">
            <div class="col-lg-6 mx-auto" style="background-color: white">
                <div class="card border border-0 bg-white">
                    <!-- Right Side: Parking Details -->
                    <div class="card-body">
                        <h5 class="mb-3">Parking Details</h5>

                        <!-- Add your parking details here -->
                        <div class="mb-2">
                            <strong>Price:</strong> {{ $price }} tk
                        </div>
                        <div class="mb-2">
                            <strong>Parking Slot:</strong> {{ $request->slot_number }}
                        </div>
                        <div class="mb-2">
                            <strong>Location:</strong>
                            {{ $slot->building_number .
                                ', ' .
                                $slot->building_name .
                                ', ' .
                                $slot->post_area .
                                ', ' .
                                $slot->zip .
                                ', ' .
                                $slot->city }}
                        </div>
                        <!-- ... (add more parking details as needed) ... -->

                        <!-- Additional Parking Information -->
                        <hr class="my-3">
                        <div class="mb-2">
                            <strong>Booking Time:</strong> {{ $formattedDateTime }}
                        </div>
                        <div class="mb-2">
                            <strong>Start Time:</strong> {{ $stratTime }}
                        </div>
                        <div class="mb-2">
                            <strong>End Time:</strong> {{ $endTime }}
                        </div>
                        <hr class="my-3">
                        <!-- Contact Information -->
                        <div>
                            <p class="mb-1"><strong>Contact:</strong></p>
                            <p>{{ $slot->users->name . ' | ' . $slot->users->email . ' | ' . $slot->mobile }}</p>
                        </div>
                    </div> <!-- End Card Body -->
                </div>
            </div>

            <div class="col-lg-6" style="background-color: white">
                <div class="card border border-0 bg-white" style="background-color: white">
                    <div class="card-header" style="background-color: white">
                        <div class="bg-white pt-4 ps-2 pe-2 pb-2 rounded mb-4"
                            style="box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;">
                            <!-- Credit card form tabs -->
                            <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3"
                                style="background-color: white">
                                <li class="nav-item" role="presentation" style="background-color: white">
                                    <a data-bs-toggle="pill" class="nav-link active" id="credit-card-tab"
                                        data-bs-target="#credit-card" type="button" role="tab"
                                        aria-controls="credit-card" aria-selected="true">
                                        <i class="bi bi-credit-card mr-2"></i> Credit Card
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation" style="background-color: white">
                                    <a data-bs-toggle="pill" class="nav-link" id="paypal-tab" data-bs-target="#paypal"
                                        type="button" role="tab" aria-controls="paypal" aria-selected="false">
                                        <i class="bi bi-cash-stack mr-2"></i> Cash
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation" style="background-color: white">
                                    <a data-bs-toggle="pill" class="nav-link" id="net-banking-tab"
                                        data-bs-target="#net-banking" type="button" role="tab"
                                        aria-controls="net-banking" aria-selected="false">
                                        <i class="bi bi-phone mr-2"></i> Net Banking
                                    </a>
                                </li>
                            </ul>
                        </div> <!-- End -->
                        <div class="tab-content" id="pills-tabContent">
                            <!-- Credit card form content -->
                            <div class="tab-pane fade show active" id="credit-card" role="tabpanel"
                                aria-labelledby="credit-card-tab" tabindex="0">
                                <!-- credit card info-->
                                <form role="form" action="{{ url('/stripe/payment') }}" method="POST"
                                    data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" class="require-validation"
                                    data-cc-on-file="false" id="payment-form">
                                    @csrf
                                    <input type="text" name="slot_number" id="slot-number" hidden value={{ $request->slot_number }}>
                                    <input type="text" name="slot_id" id="slot-id" hidden value={{ $request->slot_id }}>
                                    <input type="text" name="coordinates_send" id="coordinates-send" hidden
                                        value="{{ $request->coordinates_send }}">
                                    <input type="text" name="coordinates_start" id="coordinates-start" hidden
                                        value="{{ $request->coordinates_start }}">
                                    <input type="text" name="arriveDateTime" id="coordinates-send" hidden
                                        value="{{ $request->arriveDateTime }}">
                                    <input type="text" name="leavingDateTime" id="coordinates-start" hidden
                                        value="{{ $request->leavingDateTime }}">
                                    <input type="text" name="price" id="coordinates-start" hidden
                                        value="{{ $price }}">
                                    
                                    <div class="form-group my-3 required">
                                        <div class='col-xs-12 form-group required'>
                                            <label class='control-label'>Name on Card</label> <input class='form-control card_name'
                                                size='4' type='text'>
                                        </div>

                                    </div>
                                    <div class="form-group my-3 required">
                                        <label for="cardNumber">
                                            <h6>Card number</h6>
                                        </label>
                                        <div class="input-group required">
                                            <input type="text" name="card_number" placeholder="Valid card number"
                                                class="form-control card_number" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text text-muted"> <i
                                                        class="bi bi-credit-card-2-front mx-1"></i> <i
                                                        class="bi bi-credit-card-2-back mx-1"></i> <i
                                                        class="bi bi-person-vcard-fill mx-1"></i>
                                                </span>
                                            </div>
                                        </div>
                                        @error('card_number')
                                            <span class="text-danger">{{ $message }} </span>
                                        @enderror
                                    </div>
                                    <div class="row my-3 required">
                                        <div class="col-sm-8">
                                            <div class="form-group"> <label><span class="hidden-xs">
                                                        <h6>Expiration Date</h6>
                                                    </span></label>
                                                <div class="input-group required">
                                                    <input type="number" placeholder="MM" name="card_month"
                                                        class="form-control card_month" required>
                                                    <input type="number" placeholder="YY" name="card_year"
                                                        class="form-control card_year" required>
                                                </div>
                                                @error('card_month')
                                                    <span class="text-danger">{{ $message }} </span>
                                                @enderror
                                                @error('card_year')
                                                    <span class="text-danger">{{ $message }} </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4 required">
                                            <div class="form-group mb-4 required"> <label data-toggle="tooltip"
                                                    title="Three digit CV code on the back of your card">
                                                    <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                                </label> <input type="text" required class="form-control card_cvc"
                                                    name="card_cvv"> @error('card_cvc')
                                                    <span class="text-danger">{{ $message }} </span>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                    <button type="submit" class="subscribe btn btn-primary btn-block shadow-sm"> Confirm
                                        Payment
                                    </button>
                                    <div class='form-row'>
                                        <div class='col-md-12 error form-group hide'>
                                            <div class='alert-danger alert'>Please correct the errors and try
                                                again.</div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- Paypal info -->
                            <div class="tab-pane fade text-center" id="paypal" role="tabpanel"
                                aria-labelledby="paypal-tab" tabindex="0">
                                <h6 class="pb-2">Do you want to pay with cash?</h6>
                                <p> <button type="button" class="btn btn-primary "><i class="bi bi-cash-coin mr-2"></i>
                                        Yes </button> </p>
                                <p class="text-muted"> Note: After clicking on the button, you have to make payment upon
                                    entry. After completing the payment process, you will be redirected back
                                    to parking slots. </p>
                            </div>
                            <!-- Net Banking info -->
                            <div class="tab-pane fade" id="net-banking" role="tabpanel"
                                aria-labelledby="net-banking-tab" tabindex="0">
                                <div class="form-group mb-3">
                                    <label for="Select Your Bank">
                                        <h6>Select your Bank</h6>
                                    </label>
                                    <select class="form-control" id="ccmonth">
                                        <option value="" selected disabled>--Please select your Bank--</option>
                                        <option>Bank 1</option>
                                        <option>Bank 2</option>
                                        <option>Bank 3</option>
                                        <option>Bank 4</option>
                                        <option>Bank 5</option>
                                        <option>Bank 6</option>
                                        <option>Bank 7</option>
                                        <option>Bank 8</option>
                                        <option>Bank 9</option>
                                        <option>Bank 10</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <p> <button type="button" class="btn btn-primary "><i
                                                class="fas fa-mobile-alt mr-2"></i> Proceed Payment</button> </p>
                                </div>
                                <p class="text-muted">Note: After clicking on the button, you will be directed to a secure
                                    gateway for payment. After completing the payment process, you will be redirected back
                                    to the website to view details of your order. </p>
                            </div>
                        </div> <!-- End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
$(function() {
      
      /*------------------------------------------
      --------------------------------------------
      Stripe Payment Code
      --------------------------------------------
      --------------------------------------------*/
      
      var $form = $(".require-validation");
       
      $('form.require-validation').bind('submit', function(e) {
          var $form = $(".require-validation"),
          inputSelector = ['input[type=email]', 'input[type=password]',
                           'input[type=text]', 'input[type=file]',
                           'textarea'].join(', '),
          $inputs = $form.find('.required').find(inputSelector),
          $errorMessage = $form.find('div.error'),
          valid = true;
          $errorMessage.addClass('hide');
      
          $('.has-error').removeClass('has-error');
          $inputs.each(function(i, el) {
            var $input = $(el);
            if ($input.val() === '') {
              $input.parent().addClass('has-error');
              $errorMessage.removeClass('hide');
              e.preventDefault();
            }
          });
       
          if (!$form.data('cc-on-file')) {
            e.preventDefault();
            Stripe.setPublishableKey($form.data('stripe-publishable-key'));
            Stripe.createToken({
              number: $('.card_number').val(),
              cvc: $('.card_cvc').val(),
              exp_month: $('.card_month').val(),
              exp_year: $('.card_year').val()
            }, stripeResponseHandler);
          }
      
      });
        
      /*------------------------------------------
      --------------------------------------------
      Stripe Response Handler
      --------------------------------------------
      --------------------------------------------*/
      function stripeResponseHandler(status, response) {
          if (response.error) {
              $('.error')
                  .removeClass('hide')
                  .find('.alert')
                  .text(response.error.message);
          } else {
              /* token contains id, last4, and card type */
              var token = response['id'];
                   
              $form.find('input[type=text]').empty();
              $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
              $form.get(0).submit();
          }
      }
       
  });

    </script>
    
@endsection
