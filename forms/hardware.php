<div class="accordion-item third-accordion">
    <div class="accordion-title" id="hardware-accordion">Add Hardware Kit (optional)</div>
    <div class="accordion-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="hardware-h4">Hardware Kit – Includes data plan + basic hardware support</h4>
                    <p class="hardware-para">We recommend 1 kit per location</p>
                </div>

                <?php
                foreach ($products as $key => $product) {
                    if ($product['category']['name'] == 'Hardware') {
                        ?>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <input id="hardware<?= $key ?>" type="checkbox" name="hardware[]" required="required">
                            <label for="hardware<?= $key ?>">
                                <div class="boxes box-1">
                                    <div class="box-img">
                                        <img src="<?= $product['global_product']['img_url'] ?>" class="img-fluid"/>
                                    </div>
                                    <div class="box-content">
                                        <h2 class="heading"><?= $product['product']['name'] ?></h2>
                                        <p class="price"><?= $product['product']['price'] ?></p>
                                    </div>
                                </div>
                            </label>
                        </div>
                    <?php }
                }
                ?>
                <div class="col-md-12">
                    <div class="footer-text mt-4">
                        <p>You can always add some or all of these items at a later date, if you wish.</p>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <button class="btn-sm next-btn btn-block" type="submit">NEXT
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
