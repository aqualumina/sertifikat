<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
          <div class="container p-0" id="sign-in-page-box">
                <div class="bg-white form-container sign-up-container">
                   <div class="sign-in-page-data">
                      <div class="sign-in-from w-100 m-auto">
                          <h1 class="mb-3 text-center">Sign Up</h1>
                          <p class="text-center text-dark">Enter your email address and password to access admin panel.</p>
                          <form class="mt-4">
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Your Full Name</label>
                                  <input type="email" class="form-control mb-0" id="exampleInputEmail1" placeholder="Your Full Name">
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail2">Email address</label>
                                  <input type="email" class="form-control mb-0" id="exampleInputEmail2" placeholder="Enter email">
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Password</label>
                                  <input type="password" class="form-control mb-0" id="exampleInputPassword1" placeholder="Password">
                              </div>
                              <div class="d-inline-block w-100">
                                  <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                                      <input type="checkbox" class="custom-control-input" id="customCheck1">
                                      <label class="custom-control-label" for="customCheck1">I accept <a href="#">Terms and Conditions</a></label>
                                  </div>
                              </div>
                              <div class="sign-info">
                                  <button type="submit" class="btn btn-primary mb-2">Sign Up</button>
                                  <span class="text-dark d-block line-height-2">Already Have Account ? <a href="#">Log In</a></span>
                              </div>
                          </form>
                      </div>
                  </div>
                </div>
                <div class="bg-white form-container sign-in-container">
                    <div class="sign-in-page-data">
                      <div class="sign-in-from w-100 m-auto">
                          <h1 class="mb-3 text-center">Sign in</h1>
                          <p class="text-center text-dark">Enter your email address and password to access admin panel.</p>
                          <form class="mt-4">
                              <div class="form-group">
                                  <label for="exampleInputEmail2">Email address</label>
                                  <input type="email" class="form-control mb-0" id="exampleInputEmail2" placeholder="Enter email">
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputPassword2">Password</label>
                                  <a href="#" class="float-right">Forgot password?</a>
                                  <input type="password" class="form-control mb-0" id="exampleInputPassword2" placeholder="Password">
                              </div>
                              <div class="d-inline-block w-100">
                                  <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                                      <input type="checkbox" class="custom-control-input" id="customCheck2">
                                      <label class="custom-control-label" for="customCheck1">Remember Me</label>
                                  </div>
                              </div>
                              <div class="sign-info">
                                  <button type="submit" class="btn btn-primary mb-2">Sign in</button>
                                  <span class="text-dark dark-color d-block line-height-2">Don't have an account? <a href="#">Sign up</a></span>
                              </div>
                          </form>
                      </div>
                  </div>
                </div>
                <div class="overlay-container">
                    <div class="overlay">
                        <div class="overlay-panel overlay-left">
                            <a class="sign-in-logo mb-5" href="#"><img src="images/logo-full.png" class="img-fluid" alt="logo"></a>
                            <p>To Keep connected with us please login with your personal info</p>
                            <button class="btn iq-border-primary mt-2" id="signIn">Sign In</button>
                        </div>
                        <div class="overlay-panel overlay-right">
                            <a class="sign-in-logo mb-5" href="#"><img src="images/logo-full.png" class="img-fluid" alt="logo"></a>
                            <p>Enter your personal details and start journey with us</p>
                            <button class="btn iq-border-primary mt-2" id="signUp">Sign Up</button>
                        </div>
                    </div>
                </div>
            </div>
            <?= $this->endSection() ?>