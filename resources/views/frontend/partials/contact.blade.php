<section class="contact_area mt-5" id="contact">
  <div class="text">
      <h2>Contact Us</h2>
      <p>We are here to help and answer any question you might have. We look forward to hearing from you.</p>
  </div>
  <div class="container">
      <div class="row">
          <div class="col md-12">
              <div class="form_area">
                  <form action="{{ url('/contact') }}" method="post">
                    @csrf
                      <div class="input_area">
                          <input type="text" name="first_name" placeholder="First Name">
                          @error('first_name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                          <input type="text" name="last_name" placeholder="Last Name">
                          @error('last_name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                          <input type="email" name="email" placeholder="Email">
                          @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                          <input type="text" name="phone_no" placeholder="Phone">
                          @error('phone_no')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                      <textarea placeholder="Message" name="message"></textarea>
                      @error('message')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror

                      <!-- <input type="submit" value="SEND"> -->
                      <button type="submit" class="btn btn-primary-outline">Send</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
</section>