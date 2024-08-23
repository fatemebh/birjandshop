<?php
use Birjandshop\Model\Product;
?>

<?php include 'components/header.php';?>
<?php $products = Product::get_all(order: 'created_at DESC');?>
    <div class="section container">
        <h2>جدید ترین ها</h2>
        <div class="row">
            <?php foreach ( $products as $product ): ?>
                <div class="col-3">
                    <a class="card" href="product.php?id=<?php echo $product->ID;?>">
                        <header>
                            <div class="countdown" data-time="2024-08-04 08:18:00">
                                12:10:16
                            </div>
                            <img src="<?php echo $product->thumbnail;?>"
                                alt="نام محصول" width="300" height="300">
                        </header>
                        <h3><?php echo $product->title;?></h3>
                        <p class="remain-stock">تنها <?php echo $product->stock;?> عدد در انبار باقی مانده</p>
                        <footer>
                            <div class="discount" style="height: 22px;" data-discount="<?php echo $product->get_discount_percent();?>">
                                <?php echo $product->get_discount_percent();?>%
                            </div>
                            <div class="sale-price">
                                <?php echo number_format($product->get_sale_price() / 10);?><span style="margin-right: 7px;">تومان</span>
                            </div>
                            <div></div>
                            <div class="price">
                                <?php echo number_format($product->price / 10);?>
                            </div>
                        </footer>
                    </a>
                </div>
            <?php endforeach;?>
        </div>
    </div> <!--.section container-->
<?php include 'components/footer.php';?>