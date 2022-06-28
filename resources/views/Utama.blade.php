@include('Header')
<?php
$id = session('id_user');
?>
<!--/header-bottom-->
@if(session('alert'))
<div class="alert alert-success">{{ session('alert') }}</div>
@endif
</header>
<!--/header-->

<section id="slider">
    <!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>Free E-Commerce Template</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="/BahanStudy/images/home/girl1.jpg" class="girl img-responsive" alt="" />
                                <img src="/BahanStudy/images/home/pricing.png" class="pricing" alt="" />
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>100% Responsive Design</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="/BahanStudy/images/home/girl2.jpg" class="girl img-responsive" alt="" />
                                <img src="/BahanStudy/images/home/pricing.png" class="pricing" alt="" />
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SHOPPER</h1>
                                <h2>Free Ecommerce Template</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="/BahanStudy/images/home/girl3.jpg" class="girl img-responsive" alt="" />
                                <img src="/BahanStudy/images/home/pricing.png" class="pricing" alt="" />
                            </div>
                        </div>

                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>
<!--/slider-->

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <div class="shipping text-center">
                        <!--shipping-->
                        <img src="/BahanStudy/images/home/shipping.jpg" alt="" />
                    </div>
                    <!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <!--features_items-->
                    <h2 class="title text-center">Features Items</h2>

                    @foreach($barang as $brg)

                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="/data_file/{{ $brg->gambar }}" alt="" />
                                    <h2>Rp. {{ $brg->harga }}</h2>
                                    <p>{{ $brg->nama_produk }}</p>
                                    @if($id != null)
                                    <button data-toggle="modal" data-target="#myModal" data-id="{{ $brg->id }}" class="btn btn-default add-to-cart jumlah"><i class="fa fa-shopping-cart"> </i>Add to cart</button>
                                    @endif
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>Rp. {{ $brg->harga }}</h2>
                                        <p>{{ $brg->nama_produk }}</p>
                                        @if($id != null)
                                        <button data-toggle="modal" data-target="#myModal" data-id="{{ $brg->id }}" class="btn btn-default add-to-cart jumlah"><i class="fa fa-shopping-cart"> </i>Add to cart</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach

                </div>
                <!--features_items-->
            </div>
        </div>
    </div>
</section>



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

<!-- membuat POP UP Modal untuk jumlah barang yang akan di input -->
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <form action="/AddCart" method="post">
            <!-- Modal Content -->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4>Masukan Jumlah : </h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id_barang" name="id_barang" value="{{ $brg->id }}">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Jumlah Beli</label>
                        <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah Beli">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">Beli</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>


<script src="/BahanStudy/js/jquery.js"></script>
<script src="/BahanStudy/js/bootstrap.min.js"></script>
<script src="/BahanStudy/js/jquery.scrollUp.min.js"></script>
<script src="/BahanStudy/js/price-range.js"></script>
<script src="/BahanStudy/js/jquery.prettyPhoto.js"></script>
<script src="/BahanStudy/js/main.js"></script>

<!-- java script untuk POP UP modal (Add to cart) -->
<script type="text/javascript">
    $(".jumlah").click(function() {
        $(".id_barang").val($(this).attr('data-id'))
    });
</script>
</body>

</html>