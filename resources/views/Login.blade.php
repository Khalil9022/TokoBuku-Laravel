@include('Header')
</header>
<!--/header-->
<section id="form">
    <!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form">
                    <!--login form-->
                    <h2>Login to your account</h2>
                    <form action="/Masuk" method="post">
                        <input type="email" placeholder="Email Address" name="email" />
                        <input type="password" placeholder="Password" name="password" />
                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
                </div>
                <!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form">
                    <!--sign up form-->
                    <h2>New User Signup!</h2>
                    <form action="/Daftar" method="post">
                        <input type="text" placeholder="Name" name="nama" />
                        <input type="email" placeholder="Email Address" name="email" />
                        <input type="password" placeholder="Password" name="password" />
                        <button type="submit" class="btn btn-default">Signup</button>
                    </form>
                </div>
                <!--/sign up form-->
            </div>
        </div>
    </div>
</section>
<!--/form-->


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
<script src="/BahanStudy/js/price-range.js"></script>
<script src="/BahanStudy/js/jquery.scrollUp.min.js"></script>
<script src="/BahanStudy/js/bootstrap.min.js"></script>
<script src="/BahanStudy/js/jquery.prettyPhoto.js"></script>
<script src="/BahanStudy/js/main.js"></script>
</body>

</html>