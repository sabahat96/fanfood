<div class="accordion-item second-accordion">
    <div class="accordion-title" id="marketing-accordion">Marketing Materials (optional)</div>
    <div class="accordion-content">
        <div class="container-fluid">
            <div class="row">
                <?php
                foreach ($products as $key => $product) {
                    if ($product['category']['name'] == 'Marketing Materials') {
                        ?>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <input id="marketing<?= $key ?>" type="checkbox" name="marketing[]" required="required">
                            <label for="marketing<?= $key ?>">
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
                    <div class="marketing-footer">
                        <div class="footer-text">
                            <p>You can always add this at a later date, if you wish.</p>
                        </div>
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
