<?php
/**
 * Created by PhpStorm.
 * User: Venera
 * Date: 30.04.2018
 * Time: 13:05
 */

namespace app\models;


use yii\base\Model;
use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{
    public function addToCart($product, $qty = 1){
        if(isset($_SESSION['cart'][$product->idProduct])){
            $_SESSION['cart'][$product->idProduct]['qty'] += $qty;
        }else{
            $_SESSION['cart'][$product->idProduct] = [
                'qty' => $qty,
                'name' => $product->title,
                'price' => $product->price,
                'img' => $product->img,
            ];
        }
        $_SESSION['cart.qty'] = isset($_SESSION['cart.qty'])?$_SESSION['cart.qty'] + $qty : $qty;
        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum'])?$_SESSION['cart.sum'] + ($qty * $product->price) : ($qty * $product->price);
    }

    public function recalc($id){
        if(!isset($_SESSION['cart'][$id])) return false;
        $qtyMinus = $_SESSION['cart'][$id]['qty'];
        $sumMinus = $_SESSION['cart'][$id]['qty']*$_SESSION['cart'][$id]['price'];
        $_SESSION['cart.qty'] -= $qtyMinus;
        $_SESSION['cart.sum'] -= $sumMinus;
        unset($_SESSION['cart'][$id]);
    }

    public function liky($id){
        $model = Product::find()->where(['idProduct' => $id])->one();
        if(empty( $_SESSION['liky'][$id])) {
            $model->liky += 1;
            $model->save();
            $_SESSION['liky'][$id] = $id;
        }
        else{
            $model->liky -= 1;
            $model->save();
            $_SESSION['liky'][$id] = "";
        }
    }



}