<section class="contact_area mt-5" id="contact">
  <div class="text">
      <h2>Contact Us</h2>
      <p>We are here to help and answer any question you might have. We look forward to hearing from you.</p>
  </div>
  <div class="container">
      <div class="row">
          <div class="col md-12">
              <div class="form_area">
                  <form action="/" method="post">
                    @csrf
                      <div class="input_area">
                          <input type="text" name="first_name" placeholder="First Name">
                          <input type="text" name="last_name" placeholder="Last Name">
                          <input type="email" name="email" placeholder="Email">
                          <input type="text" name="phone_no" placeholder="Phone">
                      </div>
                      <textarea name="description" placeholder="Message"></textarea>

                      <!-- <input type="submit" value="SEND"> -->
                      <button type="submit" class="btn btn-primary-outline">Send</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
</section>