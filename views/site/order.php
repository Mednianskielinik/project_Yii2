<?php

use yii\helpers\Html;

?>
<?php
if (!empty($_SESSION['liky']))
{
$p = $_SESSION['liky'];
$i = 0;
}
else{
$p = "";
$i = 0;
}
?>
<style>
    H5 {
        text-shadow: -1px -1px #FFF,
        -2px -2px #FFF,
        -1px 1px #FFF,
        -2px 2px #FFF,
        1px 1px #FFF,
        2px 2px #FFF,
        1px -1px #FFF,
        2px -2px #FFF,
        -3px -3px 2px #BBB,
        -3px 3px 2px #BBB,
        3px 3px 2px #BBB,
        3px -3px 2px #BBB;
        color: steelblue;
        transition: all 1s;
    }
    H5:hover {
        color: yellowgreen;
    }
</style>
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
                                <span ><h5><a href="<?= \yii\helpers\Url::to(['site/lik', 'id' => $master->idProduct])?>"   <?php $i++; if (!empty($p[$i])):?>  class="add-dislik" style="color: red; " <?php else: ?> class="add-lik" <?php endif;?> data-id="<?=$master->idProduct?>" >Мне нравится <?=$master->liky?> </a><br></h5>
                                <img class="img-responsive" src="<?=$master->img?>" alt="" />
                                <h4 class="pull-left"><?=$master->title?></h4>
                                <span class="item-price pull-right">$<?=$master->price?></span>
                                <div class="clearfix"></div>
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

                function showLiky(liky) {
                    $('#liky .modal-body').html(liky);
                    $('#liky').modal();
                }

                function clearCart() {
                    $.ajax({
                        url: '<?= \yii\helpers\Url::to(['site/clear',''])?>',
                        type: 'GET',
                        success: function (res){
                            if(!res) alert('Ошибка!');
                            showCart(res);
                        },
                        error: function () {
                            alert('Error!');
                        }
                    });
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
</body>
</html>