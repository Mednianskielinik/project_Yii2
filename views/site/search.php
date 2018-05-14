
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<body>
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
                                    <a href="<?= \yii\helpers\Url::to(['site/add', 'id' => $master->idProduct])?>" class="link hidden-xs add-to-cart" data-id="<?=$master->idProduct?>" >Заказать</a>
                                </div>
                            </div>
                        <?php endforeach;?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showCart(cart) {
            $('#cart .modal-body').html(cart);
            $('#cart').modal();
        }

        $('.add-to-cart').click(function(e){
            e.preventDefault();
            var id = $(this).data('id');
            $.ajax({
                url: '<?= \yii\helpers\Url::to(['site/add',''])?>',
                data: {id: id},
                type: 'GET',
                success: function (res){
                    if(!res) alert('Ошибка!');
                    showCart(res);
                },
                error: function () {
                    alert('Error!');
                }
            })
        });
    </script>
</div>
</body>
</html>
