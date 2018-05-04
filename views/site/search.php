
<div class="inner-page padd">
    <div class="shopping">
        <div class="container">
            <div class="shopping-content">
                <div class="row">
                    <?php
                    if (!empty($masters)):?>
                        <?php foreach ($masters as $master): ?>
                            <div class="col-md-3 col-sm-6">
                                <div class="shopping-item">
                                    <img class="img-responsive" src="<?=$master->img?>" alt="" />
                                    <h4 class="pull-left"><a href="item-single.html"><?=$master->title?></a></h4>
                                    <span class="item-price pull-right"><?=$master->price?></span>
                                    <div class="clearfix"></div>

                                    <div class="visible-xs">
                                        <a class="btn btn-danger btn-sm" href="items.html#">Buy Now</a>
                                    </div>

                                    <div class="item-hover br-red hidden-xs"></div>
                                    <a class="link hidden-xs" href="items.html#">I Like It</a>
                                </div>
                            </div>
                        <?php endforeach;?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
