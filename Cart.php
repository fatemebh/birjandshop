<?php include 'components/header.php'; ?>
<div class="section container cart-container">
    <h1>سبد خرید</h1>
    <a href="#" class="btn empty-cart btn-danger">
        خالی کردن سبد
    </a>
    <table class="cart-table">
        <thead>
            <tr>
                <th>#</th>
                <th>محصول</th>
                <th>تعداد</th>
                <th>مبلغ(تومان)</th>
                <th>مبلغ کل(تومان)</th>
            </tr>
        </thead>
        <tbody>
            <?php if( cart()->get_item_count() ):?>
                <?php foreach( cart()->get_items() as $item ):?>
                    <?php include 'partial/cart-item-row.php';?>
                <?php endforeach;?>
                <tr>
                    <td></td>
                    <td>جمع کل</td>
                    <td></td>
                    <td></td>
                    <td>
                        <ins><?php echo number_format( cart()->get_total() / 10) ?></ins>
                    </td>
                </tr>
            <?php else:?>
                <tr>
                    <td colspan="5">
                        آیتمی یافت نشد
                    </td>
                </tr>
            <?php endif;?>
        </tbody>
    </table>
    <a href="#" class="btn btn-success mt-3">
        پرداخت
    </a>
</div> <!--.section container cart-container-->
<?php include 'components/footer.php'; ?>