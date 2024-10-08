<div class="navbar">
    <div class="nav-container container">
        <div class="nav-right">
            <a href="index.php">
                <img src="https://www.daneshjooyar.com/wp-content/themes/daneshlight/Images/logotype.svg" alt="">
            </a>
        </div> <!--.nav-right-->
        <div class="nav-center">
            <form action="" class="search">
                <input type="search" name="search" class="form-control" placeholder="جستجو">
                <button class="btn btn-primary">جستجو</button>
            </form>
        </div> <!--.nav-center-->
        <div class="nav-left">
            <a href="Cart.php" class="go-to-cart">
                <span class="item-count"><?php echo cart()->get_item_count();?></span>
                <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M20.0164 16.2572C19.5294 18.5297 19.2859 19.666 18.4608 20.333C17.6357 21 16.4737 21 14.1495 21H9.85053C7.52639 21 6.36432 21 5.53925 20.333C4.71418 19.666 4.47069 18.5297 3.98372 16.2572L3.55514 14.2572C2.83668 10.9043 2.47745 9.22793 3.378 8.11397C4.27855 7 5.99302 7 9.42196 7H14.5781C18.0071 7 19.7215 7 20.6221 8.11397C21.2929 8.94376 21.2647 10.0856 20.9097 12"
                        stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                    <path d="M16 12H12M9 12H8" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M10 15H14" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M18 9L15 3" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M6 9L9 3" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </a>
            <a href="#" class="btn btn-secondary">
                ورود/ثبت نام
            </a>
        </div> <!--.nav-left-->
    </div> <!--.nav-container container-->
</div> <!--.navbar-->