



<section class="h-100 h-custom" style="background-color: #d2c9ff;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-lg-8">
                <div id="mojDiv" class="p-5">
                  <div  class="d-flex justify-content-between align-items-center mb-5">

                    <h1 class="fw-bold mb-0 text-black">Your Cart</h1>
                    <h6 class="mb-0 text-muted itemsNumber">3 items</h6>
                  </div>
                  <hr class="my-4">


                  

                  


                  <div class="pt-5">
                    <h6 style="margin-bottom:2rem !important;" class="mb-0"><a href="/home" class="text-body"><i
                          class="fas fa-long-arrow-alt-left me-2" ></i>Back to shop</a></h6>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 bg-grey">
                <div class="p-5">
                  <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                  <hr class="my-4">

                  <div class="d-flex justify-content-between mb-4">
                    <h5 class="text-uppercase itemsNumber">items 3</h5>
                    <h5 class="totalPrice">0</h5>
                  </div>

                  <h5 class="text-uppercase mb-3">Shipping</h5>

                  <div class="mb-4 pb-2">
                    <select class="select">
                      <option value="1">Standard-Delivery- €5.00</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                      <option value="4">Four</option>
                    </select>
                  </div>

                  <h5 class="text-uppercase mb-3 ">Give code</h5>

                  <div class="mb-5">
                    <div class="form-outline">
                      <input onKeyUp="reedemCode(this)"  type="text" id="form3Examplea2" class="form-control form-control-lg codeWrapper" />
                      <label class="form-label" for="form3Examplea2">Enter your code</label>
                    </div>
                  </div>

                  <hr class="my-4">

                  <div class="d-flex justify-content-between mb-5">
                    <h5 class="text-uppercase">Total price</h5>
                    <h5 class="totalPrice TOTAL">0</h5>
                  </div>


                
                  <button type="button" class="btn btn-dark btn-block btn-lg btn-pay"
                    data-mdb-ripple-color="dark">Pay</button>
      

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="../assets/js/cart.js"></script>
  <script src="../assets/js/moj.js"></script>
</section>