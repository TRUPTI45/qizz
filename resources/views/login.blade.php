<section class="vh-100" style="background-color: #9A616D;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp"
                  alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">

                  <form action="/mail" method="post" >
                    @csrf

                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">PHP QUIZ</h5>

                    <div class="form-outline mb-4">
                      <input type="email" name="email_id" id="form2Example17" class="form-control form-control-lg" />
                      <label class="form-label" for="form2Example17">Email address</label>
                    </div>
                    <div class="form-outline form-white mb-4">
                        <input type="email" name="email_id" id="typeEmailX" class="form-control form-control-lg" />
                    </div>
                    <input type="hidden" name="question_id" value="1">
                    <input type="submit" class="btn btn-outline-light btn-lg px-5" name="submit"
                        value="Start">




                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


