<?php if(!empty($session['cart'])): ?>
<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th>Фото</th>
            <th>Наименование</th>
            <th>Количество</th>
            <th>Цена</th>
            <th><span class="glyphicon glyphicon-remove"
            aria-hidden="true"</span></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($session['cart'] as $id=>$item):?>
             <tr>
                 <td><img class="img-responsive"  src="<?= $item['img']?>" alt="" /></td>
                 <td><?= $item['name']?></td>
                 <td><?= $item['qty']?></td>
                 <td>$<?= $item['price']?></td>
                 <td><span data-id ="<?=$id?>" class="glyphicon glyphicon-remove text-danger delitem"
                           aria-hidden="true"</span></td>
             </tr>
        <?php endforeach?>
        <tr>
            <td colspan="4">Итого</td>
            <td><?= $session['cart.qty']?></td>
        </tr>
        <tr>
            <td colspan="4">На сумму</td>
            <td><?= $session['cart.sum']?></td>
        </tr>
        </tbody>
        <script>

            $('#cart .modal-body').on('click', '.delitem', function () {
                var id = $(this).data('id');
                $.ajax({
                    url: '<?= \yii\helpers\Url::to(['site/delitem',''])?>',
                    data:{id: id},
                    type: 'GET',
                    success: function (res){
                        if(!res) alert('Ошибка!');
                        showCart(res);
                    },
                    error: function () {
                        alert('Error!');
                    }
                });
            });


        </script>
    </table>
</div>
<?php else: ?>
    <h3>Вы ничего не выбрали</h3>
<?php endif;


