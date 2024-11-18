<div class="page-header text-center" style="background-image: url({{asset('/assets/images/page-header-bg.jpg')}})">
    <div class="container">
        <h1 class="page-title">Shopping Cart<span>Shop</span></h1>
    </div><!-- End .container -->
</div><!-- End .page-header -->
<nav aria-label="breadcrumb" class="breadcrumb-nav">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            {{ $slot }}
        </ol>
    </div><!-- End .container -->
</nav><!-- End .breadcrumb-nav -->