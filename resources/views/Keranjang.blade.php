@include('Header')
</header>
<!--/header-->

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; ?>
                    @foreach($keranjang as $keranjang)
                    <tr>
                        <td class="cart_product" style="padding-left: 10px;">
                            <a href=""><img src="/data_file/{{ $keranjang->gambar }}" width="90px" height="120px" alt="Gambar"></a>
                        </td>
                        <td class="cart_description">
                            <p><a href="">{{ $keranjang->nama_produk }}</a></p>
                        </td>
                        <td class="cart_price">
                            <p>Rp.{{ $keranjang->harga }}</p>
                        </td>
                        <td class="cart_quantity">
                            {{ $keranjang->jumlah }}
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">Rp.{{ $keranjang->harga * $keranjang->jumlah }}</p>
                        </td>
                    </tr>
                    <?php $total += ($keranjang->jumlah * $keranjang->harga);  ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
<!--/#cart_items-->

<section id="do_action">
    <div class="container">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <div class="total_area">
                    <ul>
                        <li>Total <span>Rp.{{ $total }}</span></li>
                    </ul>
                    <a class="btn btn-default check_out" style="margin-left:40px" href="/Checkout">Check Out</a>
                </div>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
</section>
<!--/#do_action-->

<footer id="footer">
    <!--Footer-->

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
                <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
            </div>
        </div>
    </div>

</footer>
<!--/Footer-->



<script src="/BahanStudy/js/jquery.js"></script>
<script src="/BahanStudy/js/bootstrap.min.js"></script>
<script src="/BahanStudy/js/jquery.scrollUp.min.js"></script>
<script src="/BahanStudy/js/jquery.prettyPhoto.js"></script>
<script src="/BahanStudy/js/main.js"></script>
</body>

</html>