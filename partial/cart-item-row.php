<?php 
use Birjandshop\Model\Product;
    $product_id = $item['product_id'];
    $quantity = $item['qty'];
    $product = new Product($product_id);
?>

<tr class="<?php echo $product->has_discount()  ? 'has-discount' : '' ;?>">
    <td>1</td>
    <td>
        <a href="#">
            <img src="<?php echo $product->thumbnail ?>"
                alt="" width="36" height="36">
            <p><?php echo $product->title;?></p>
        </a>
        <a href="cart.php?id=<?php echo $product_id;?>&remove_from_cart=true" onclick="return confirm( 'sure?' )" class="remove-item">
            <svg width="800px" height="800px" fill="#000000" version="1.1" viewBox="0 0 482.43 482.43"
                xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="m381.16 57.799h-75.094c-3.746-32.483-31.383-57.799-64.855-57.799-33.471 0-61.104 25.315-64.85 57.799h-75.098c-30.39 0-55.111 24.728-55.111 55.117v2.828c0 23.223 14.46 43.1 34.83 51.199v260.37c0 30.39 24.724 55.117 55.112 55.117h210.24c30.389 0 55.111-24.729 55.111-55.117v-260.37c20.369-8.1 34.83-27.977 34.83-51.199v-2.828c0-30.39-24.723-55.118-55.111-55.118zm-139.95-31.66c19.037 0 34.927 13.645 38.443 31.66h-76.879c3.515-18.016 19.406-31.66 38.436-31.66zm134.09 401.17c0 15.978-13 28.979-28.973 28.979h-210.24c-15.973 0-28.973-13.002-28.973-28.979v-256.45h268.18v256.45zm34.83-311.57c0 15.978-13 28.979-28.973 28.979h-279.9c-15.973 0-28.973-13.001-28.973-28.979v-2.828c0-15.978 13-28.979 28.973-28.979h279.9c15.973 0 28.973 13.001 28.973 28.979v2.828z" />
                <path
                    d="m171.14 422.86c7.218 0 13.069-5.853 13.069-13.068v-147.15c0-7.216-5.852-13.07-13.069-13.07s-13.069 5.854-13.069 13.07v147.15c-1e-3 7.217 5.851 13.068 13.069 13.068z" />
                <path
                    d="m241.21 422.86c7.218 0 13.07-5.853 13.07-13.068v-147.15c0-7.216-5.854-13.07-13.07-13.07-7.217 0-13.069 5.854-13.069 13.07v147.15c0 7.217 5.851 13.068 13.069 13.068z" />
                <path
                    d="m311.28 422.86c7.217 0 13.068-5.853 13.068-13.068v-147.15c0-7.216-5.852-13.07-13.068-13.07-7.219 0-13.07 5.854-13.07 13.07v147.15c-1e-3 7.217 5.853 13.068 13.07 13.068z" />
            </svg>
        </a>
    </td>
    <td><?php echo $quantity;?></td>
    <td>
        <del><?php echo number_format( $product->price / 10) ;?></del>
        <ins><?php echo number_format( $product->get_sale_price() / 10) ;?></ins>
    </td>
    <td>
        <ins><?php echo number_format( $product->get_sale_price() * $quantity / 10 ) ?></ins>
    </td>
</tr>