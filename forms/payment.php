<div class="accordion-item">
    <div class="accordion-title" id="payment-accordion">Payment Method</div>
    <div class="accordion-content">
        <div class="row">
            <div class="col-md-9">
                <h3 class="mb-3 billing-address">Billing Address</h3>
                <input type="checkbox" id="duplicate-address" class="billing-checkbox">
                <label for="addresscheckbox" class="same-address-checkbox">Billing Address same as Shipping
                    Address</label>
                <p class="red">*Required Fields</p>

                <div class="row" id="billing-inputs">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="b_firstname">First Name <span>*</span></label>
                            <input type="text" class="form-control" id="b_firstname" name="b_firstname"
                                   required="required">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="b_lastname">Last Name <span>*</span></label>
                            <input type="text" class="form-control" id="b_lastname" name="b_lastname"
                                   required="required">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="b_address">Address <span>*</span></label>
                            <input type="text" class="form-control" id="b_address" name="b_Address"
                                   required="required">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="b_zipcode">Zip Code <span>*</span></label>
                            <input type="number" class="form-control" id="b_zipcode" name="b_zipcode"
                                   required="required">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="b_city">City <span>*</span></label>
                            <input type="text" class="form-control" id="b_city" name="b_city" required="required">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="b_state">State <span>*</span></label>
                            <input type="text" class="form-control" id="b_state" name="b_state" required="required">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="b_phonenumber">Phone Number <span>*</span></label>
                            <input type="number" class="form-control" id="b_phonenumber" name="b_phonenumber"
                                   required="required">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="b_email">Email <span>*</span></label>
                            <input type="email" class="form-control" id="b_email" name="b_email"
                                   required="required">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-9">
                <div class="container payment-sec">
                    <h2 class="mt-4 Payment-address">Payment</h2>

                    <ul class="tabs">
                        <li class="tab-link current" data-tab="tab-1">
                            <img src="<?= plugin_dir_url(__FILE__) . '../images/debit.png'; ?>" alt="">
                        </li>
                        <li class="tab-link" data-tab="tab-2"><img
                                    src="<?= plugin_dir_url(__FILE__) . '../images/applepay.png'; ?>" alt=""></li>
                        <li class="tab-link" data-tab="tab-3"><img
                                    src="<?= plugin_dir_url(__FILE__) . '../images/googlepay.png'; ?>" alt=""></li>
                    </ul>

                    <div id="tab-1" class="tab-content current">
                        <form data-action="<?= plugins_url('fanfood/ajax.php') ?>" id="payment-form"
                              class="e-commerce-form" method="post">
                            <div class="row">
                                <div id="paymentResponse"></div>
                            </div>
                            <div class="row">
                                <input type="hidden" id="stripe-token" name="token">
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="card_number">Credit Card Number <span>*</span></label>
                                        <input type="text" class="form-control" id="card_number" name="card_number">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="cvc">CVC Code <span>*</span></label>
                                        <input type="number" class="form-control" id="cvc" name="cvc">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Name On Card <span>*</span></label>
                                    <input type="text" class="form-control" name="account_title"
                                           required="required">
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="expiry_date">Expiry Date <span>*</span></label>
                                        <input type="text" class="form-control" id="expiry_date" name="expiry_date">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="total-order-heading">Order Total</p>
                                    <p class="red total-order">$1,164.60</p>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <button type="submit" class="btn-sm next-btn btn-block">COMPLETE ORDER
                                            </button>
                                        </div>
                                        <div class="col-md-9">
                                            <div id="paymentResponse"></div>
                                        </div>
                                    </div>

                                    <div class="footer-text">
                                        <p>By submitting the above information, you agree to FanFood's Terms of
                                            Service and Privacy Policy. </p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="tab-2" class="tab-content">
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                        nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                        officia deserunt mollit anim id est laborum.
                    </div>
                    <div id="tab-3" class="tab-content">
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                        commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                        dolore eu fugiat nulla pariatur.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
