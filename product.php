<?php

use Birjandshop\Model\Product;

require('init.php');

if (! isset($_GET['id'])) {
    die('Not found product');
}

$pid = abs( intval($_GET['id']) );

if (! $pid) {
    die('Not found product');
}

$product = new Product($pid);

if (! $product->ID){
    die('Not found product');
}

if (! $product->can_view() ){
    die('Product is not visible');
}

?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8" />
    <title>
        <?php echo $product->title; ?>
    </title>
    <link rel="stylesheet" href="./css/style.css" />
</head>

<body>
    <?php include 'components/nav-bar.php';?>
    <section class="container bg-white p-4 rounded section">
        <div class="px-lg-2">
            <main class="d-flex gap-2">
                <nav
                    class="flex-grow-1 d-flex flex-column gap-2"
                    style="max-width: 33%">
                    <div
                        class="bg-danger p-2 w-100 d-flex justify-content-between align-items-center rounded"
                        style="--bs-bg-opacity: 0.1">
                        <div class="fw-bold text-danger">پیشنهاد شگفت انگیز</div>
                        <div
                            class="countdown position-static d-block text- fs-6"
                            data-time="2024-10-07 22:05:45"></div>
                    </div>
                    <div style="max-width: 100%">
                        <img
                            loading="lazy"
                            src="<?php echo $product->thumbnail; ?>"
                            //onerror="this.onerror=null;this.src = '/default_uploads/unknown.png';"
                            style="max-width: 100%; aspect-ratio: 1 / 1" />
                    </div>
                </nav>
                <div class="flex-grow-1" style="max-width: 33%">
                    <h5><?php echo $product->title; ?></h5>
                    <hr />
                    <p class="small">
                        <span>
                            <i class="bi bi-star-fill text-warning"></i>
                            4.6
                            <span class="text-secondary">(از 1000 خرید انجام شده)</span>
                        </span>
                        <span class="vr"></span>
                        <a href="#" class="text-decoration-none">100 دیدگاه</a>
                        <span class="vr"></span>
                        <a href="#" class="text-decoration-none">100 پرسش</a>
                    </p>
                    <p class="small">
                        <i class="bi bi-hand-thumbs-up-fill text-success"></i>
                        ۹۶% (۹۹۹ نفر) از خریداران، این کالا را پیشنهاد کرده‌اند
                    </p>
                </div>
                <div class="flex-grow-1" style="max-width: 33%">
                    <div class="p-2 text-align-start bg-info text-white rounded px-3">
                        <b class="text-black">قیمت</b>
                        <div style="text-align: left">
                            <div class="d-flex gap-1 justify-content-end">
                                <del class="text-secondary"><?php echo $product->price ?></del>
                                <span
                                    class="badge bg-danger text-white rounded-pill align-middle d-flex justify-content-center align-items-center"><?php echo $product->get_discount_percent() . '%';?>
                                </span>
                            </div>
                            <span class="text-success"><?php echo number_format($product->get_sale_price() / 10);?></span>
                                <span>تومان</span>
                        </div>
                        <hr />
                        <span class="text-danger fw-bold">
                            تنها <?php echo $product->stock ?> در انبار باقی مانده
                        </span>
                        <hr />
                        <?php if ($product->is_saleable()): ?>
                            <a class="btn btn-primary" href="/Cart.php?id=<?php echo $product->ID; ?>&add_to_cart=1">
                                افزودن به سبد خرید
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </main>
            <hr />
            <b class="h3 d-block">درباره محصول</b>
            لپ‌تاپ لنوو مدل IdeaPad Slim 3 15IRU8 با وزن 1.62 کیلوگرم به خوبی
            می‌تواند نظر دوست‌داران لپ‌تاپ‌های سبک را جلب کند. این لپ‌تاپ در بخش
            مشخصات سخت‌افزاری به پردازنده Core i3-1305U اینتل مجهز شده که یک
            پردازنده 5 هسته‌ای متشکل از ( 1 هسته Performance و 4 هسته Efficient) با
            6 رشته موازی است که نهایت فرکانس کاری 4.5 گیگاهرتز و 10 مگابایت
            حافظه‌نهان یا کش آن را همراهی می‌کند. نبود تراشه‌گرافیکی مجزا تکلیف
            خریداران را با این لپ‌تاپ روشن می‌کند. تراشه‌گرفیکی یکپارچه UHD اینتل
            گزینه خوبی برای کارهای عمومی و روزمره است و نباید از آن انتظار
            پردازش‌های سنگین گرافیکی را داشت. مقدار هشت گیگابایت رم LPDDR5 با سرعت
            4800 مگاهرتز و البته 256 گیگابایت حافظه‌داخلی از نوع SSD NVMe با رابط
            PCIe 4.0 روی این مدل نصب شده است. در بخش نمایشگر با پنل 15.6 اینچ TN
            روبرو هستیم که روکش‌مات و نهایت روشنایی 250 نیت، عملکرد قابل‌قبولی را
            ارائه می‌کند. لنوو در بخش صدای خروجی کم‌کاری نکرده به طوری که دو اسپیکر
            استریو با توان 1.5 وات، صدای دالبی را به گوش می‌رساند. تاچ‌پد بزرگ با
            پشتیانی از چند‌لمس همزمان و البته کلیدهای مخفی یا Mylar surface، وسعت
            مناسبی از عملکرد را در اختیار کاربر قرار می‌دهد. پورت‌های ورودی‌و‌خروجی
            کامل و باتری 47 وات‌ساعت از دیگر مشخصات لپ‌تاپ لنوو مدل IdeaPad Slim 3
            15IRU8 است.
        </div>
    </section>
    <?php include 'components/footer.php';?>