@extends('site.layout.main')
@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div
          id="heroCarousel"
          data-bs-interval="5000"
          class="carousel slide carousel-fade"
          data-bs-ride="carousel"
        >
          <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
  
          <div class="carousel-inner" role="listbox">
            <!-- Slide 1 -->
            <div
              class="carousel-item active"
              style="background-image: url(assets/img/slide/contact-us.png)"
            >
              <div class="carousel-container" style="top:unset !important">
                <div class="container">
                  <div class="row">
                    <div class="col-md-9 text-start">
                      <h2 class="animate__animated animate__fadeInDown">
                        CONTACT US
                      </h2>
                      <p class="animate__animated animate__fadeInUp">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna
                        aliqua.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End Hero -->
  
      <main id="main">
        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
          <div class="container" data-aos="fade-up">
            <header class="row text-center justify-content-center">
              <div class="col-lg-8 mb-4">
                <h2>CONTACT US</h2>
                <p>
                  Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                  Laboriosam deleniti cumque veritatis dolore vitae fugiat ea
                  error aspernatur adipisci, .
                </p>
              </div>
            </header>
  
            <div class="row gy-4 justify-content-center">
              <div class="col-lg-9">
                <form
                  action="forms/contact.php"
                  method="post"
                  class="php-email-form"
                >
                  <div class="row gy-4">
                    <div class="col-md-6">
                      <input
                        type="text"
                        name="fname"
                        class="form-control"
                        placeholder="First Name"
                        required
                      />
                    </div>
                    <div class="col-md-6">
                      <input
                        type="text"
                        name="lname"
                        class="form-control"
                        placeholder="Last Name"
                        required
                      />
                    </div>
  
                    <div class="col-md-12">
                      <input
                        type="email"
                        class="form-control"
                        name="email"
                        placeholder="Your email adress"
                        required
                      />
                    </div>
  
                    <div class="col-md-6">
                      <input
                        type="tel"
                        class="form-control"
                        name="phone"
                        placeholder="Phone Number"
                        required
                      />
                    </div>
                    <div class="col-md-6">
                      <input
                        type="text"
                        class="form-control"
                        name="Notes"
                        placeholder="Special notes"
                      />
                    </div>
  
                    <div class="col-md-12">
                      <textarea
                        class="form-control"
                        name="message"
                        rows="6"
                        placeholder="Enter your message"
                        required
                      ></textarea>
                    </div>
                    <div class="col-md-6">
                      <input
                        type="checkbox"
                        id="vehicle1"
                        name="vehicle1"
                        value="Bike"
                      />
                      <label for="policy">
                        I have read and accept your privacy policy</label
                      ><br />
                    </div>
  
                    <div class="col-md-12 text-center">
                      <div class="loading">Loading</div>
                      <div class="error-message"></div>
                      <div class="sent-message">
                        Your message has been sent. Thank you!
                      </div>
  
                      <button type="submit">Send Message</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section>
        <!-- End Contact Section -->
      </main>
      <!-- End #main -->

@endsection