@include('Header')
</header>
<!--/header-->

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Check out</li>
            </ol>
        </div>
        <!--/breadcrums-->


        <div class="review-payment">
            <h2>Review & Payment</h2>
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
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; ?>
                    @foreach($checkout as $ckt)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="/data_file/{{$ckt->gambar}}" alt="" width="100px" height="130px"></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href="">{{$ckt->nama_produk}}</a></h4>
                        </td>
                        <td class="cart_price">
                            <p>Rp {{$ckt->harga}}</p>
                        </td>
                        <td class="cart_quantity">
                            {{$ckt->jumlah}}
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">Rp{{$ckt->harga * $ckt->jumlah}}</p>
                    </tr>
                    <?php $total += ($ckt->jumlah * $ckt->harga) ?>
                    @endforeach

                    <tr>
                        <td colspan="4">&nbsp;</td>
                        <td colspan="2">
                            <table class="table table-condensed total-result">
                                <tr>
                                    <td>Total</td>
                                    <td><span>Rp{{$total}}</span></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="payment-options">

        </div>
    </div>
</section>
<!--/#cart_items-->

<footer id="footer">
    <!--Footer-->

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright (c) 2013 E-SHOPPER Inc. All rights reserved.</p>
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