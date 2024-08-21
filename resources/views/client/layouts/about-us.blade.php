@include('client.partials.header')
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"> --}}

<style>
    .hero-section {
        background-image: url('{{ asset('uploads/about-us.png') }}');
        background-size: cover;
        background-position: center;
        padding: 100px 0;
        text-align: center;
        color: white;
    }

    .hero-section h1 {
        font-size: 3rem;
    }

    .vision-mission {
        padding: 50px 0;
    }


    .testimonial-section {
        background-color: #f8f9fa;
        padding: 50px 0;
    }

    .testimonial img {
        display: inline-block !important;
        max-width: 70px;
        border-radius: 50%;
        margin-top: 1rem;
        margin-bottom: 2.1rem;
    }

    .bg-light-2 {
        background-color: #f9f9f9 !important;
        margin-top: 20px;
        padding: 20px;
    }
</style>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <h1 style="color: white">About Us</h1>
        <p style="color: white">Who we are</p>
    </div>
</section>

<!-- Vision and Mission Section -->
<section class="vision-mission">
    <div class="container text-center">
        <div class="row">
            <div class="col-md-6">
                <h2>Our Vision</h2>
                <p>Mang đến niềm vui cho hàng triệu gia đình Việt.


                </p>
            </div>
            <div class="col-md-6">
                <h2>Our Mission</h2>
                <p>FreshFusion hướng đến mục tiêu mang lại niềm vui mặc mới mỗi ngày cho hàng triệu người tiêu dùng
                    Việt. Chúng tôi tin rằng người dân Việt Nam cũng đang hướng đến một cuộc sống năng động, tích
                    cực hơn.</p>
            </div>
        </div>
    </div>
</section>

<!-- Who We Are Section -->
<section class="who-we-are py-5">
    <div class="container text-center">
        <h2>Who We Are</h2>
        <p class="text-primary">Cảm ơn bạn đã là một phần trong câu chuyện của chúng tôi.</p>
        <p>Tại FreshFusion, chúng tôi tin rằng thời trang không chỉ là quần áo; đó là một cách để thể hiện cá
            tính của bạn và nắm lấy sự độc đáo của bạn. Hành trình của chúng tôi bắt đầu với một ý tưởng đơn giản:
            tạo ra những bộ trang phục chất lượng cao, sành điệu khiến bạn cảm thấy tự tin và thoải mái, bất kể cuộc
            sống đưa bạn đến đâu.</p>
        <button class="btn btn-primary">View Our News</button>
    </div>
</section>

{{-- <!-- Brand Section -->
    <section class="brands py-5">
        <div class="container text-center">
            <h3>The world’s premium design brands in one destination</h3>
            <div class="row">
                <div class="col">
                    <img src="https://portotheme.com/html/molla/assets/images/brands/7.png" alt="Brand 1">
                </div>
                <div class="col">
                    <img src="brand-logo-2.png" alt="Brand 2">
                </div>
                <div class="col">
                    <img src="brand-logo-3.png" alt="Brand 3">
                </div>
                <!-- Add more brand logos as needed -->
            </div>
        </div>
    </section> --}}

<div class="container">
    <div class="row">
        <div class="col-lg-5">
            <div class="brands-text">
                <h2 class="title">The world's premium design brands in one destination.</h2><!-- End .title -->
                <p>Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id,
                    mattis vel, nis</p>
            </div><!-- End .brands-text -->
        </div><!-- End .col-lg-5 -->
        <div class="col-lg-7">
            <div class="brands-display">
                <div class="row justify-content-center">
                    <div class="col-6 col-sm-4">
                        <a href="#" class="brand">
                            <img src="https://portotheme.com/html/molla/assets/images/brands/1.png" alt="Brand Name">
                        </a>
                    </div><!-- End .col-sm-4 -->

                    <div class="col-6 col-sm-4">
                        <a href="#" class="brand">
                            <img src="https://portotheme.com/html/molla/assets/images/brands/2.png" alt="Brand Name">
                        </a>
                    </div><!-- End .col-sm-4 -->

                    <div class="col-6 col-sm-4">
                        <a href="#" class="brand">
                            <img src="https://portotheme.com/html/molla/assets/images/brands/3.png" alt="Brand Name">
                        </a>
                    </div><!-- End .col-sm-4 -->

                    <div class="col-6 col-sm-4">
                        <a href="#" class="brand">
                            <img src="https://portotheme.com/html/molla/assets/images/brands/4.png" alt="Brand Name">
                        </a>
                    </div><!-- End .col-sm-4 -->

                    <div class="col-6 col-sm-4">
                        <a href="#" class="brand">
                            <img src="https://portotheme.com/html/molla/assets/images/brands/5.png" alt="Brand Name">
                        </a>
                    </div><!-- End .col-sm-4 -->

                    <div class="col-6 col-sm-4">
                        <a href="#" class="brand">
                            <img src="https://portotheme.com/html/molla/assets/images/brands/6.png" alt="Brand Name">
                        </a>
                    </div><!-- End .col-sm-4 -->

                    <div class="col-6 col-sm-4">
                        <a href="#" class="brand">
                            <img src="https://portotheme.com/html/molla/assets/images/brands/7.png" alt="Brand Name">
                        </a>
                    </div><!-- End .col-sm-4 -->

                    <div class="col-6 col-sm-4">
                        <a href="#" class="brand">
                            <img src="https://portotheme.com/html/molla/assets/images/brands/8.png" alt="Brand Name">
                        </a>
                    </div><!-- End .col-sm-4 -->

                    <div class="col-6 col-sm-4">
                        <a href="#" class="brand">
                            <img src="https://portotheme.com/html/molla/assets/images/brands/9.png" alt="Brand Name">
                        </a>
                    </div><!-- End .col-sm-4 -->
                </div><!-- End .row -->
            </div><!-- End .brands-display -->
        </div><!-- End .col-lg-7 -->
    </div><!-- End .row -->



    <!-- Testimonial Section -->
    {{-- <section class="testimonial-section">
        <div class="container text-center">
            <h2>What Customer Say About Us</h2>
            <blockquote class="blockquote">
                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit."</p>
                <footer class="blockquote-footer">Jenson Gregory <cite title="Source Title">Customer</cite></footer>
            </blockquote>
        </div>
    </section> --}}

    <div class="about-testimonials bg-light-2 pt-6 pb-6">
        <div class="container">
            <h2 class="title text-center mb-3">What Customer Say About Us</h2><!-- End .title text-center -->

            <div class="owl-carousel owl-simple owl-testimonials-photo owl-loaded owl-drag" data-toggle="owl"
                data-owl-options="{
                    &quot;nav&quot;: false, 
                    &quot;dots&quot;: true,
                    &quot;margin&quot;: 20,
                    &quot;loop&quot;: false,
                    &quot;responsive&quot;: {
                        &quot;1200&quot;: {
                            &quot;nav&quot;: true
                        }
                    }
                }">
                <!-- End .testimonial -->

                <!-- End .testimonial -->
                <div class="owl-stage-outer">
                    <div class="owl-stage"
                        style="transform: translate3d(0px, 0px, 0px); transition: all 0.4s ease 0s; width: 2376px;">
                        <div class="owl-item active" style="width: 1168px; margin-right: 20px;">
                            <blockquote class="testimonial text-center">
                                <img src="https://portotheme.com/html/molla/assets/images/testimonials/user-1.jpg"
                                    alt="user">
                                <p>“ Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Pellentesque aliquet nibh
                                    nec urna. <br>In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium,
                                    ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc
                                    tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti. ”</p>
                                <cite>
                                    Jenson Gregory
                                    <span>Customer</span>
                                </cite>
                            </blockquote>
                        </div>
                        <div class="owl-item" style="width: 1168px; margin-right: 20px;">
                            <blockquote class="testimonial text-center">
                                <img src="assets/images/testimonials/user-2.jpg" alt="user">
                                <p>“ Impedit, ratione sequi, sunt incidunt magnam et. Delectus obcaecati optio eius
                                    error libero perferendis nesciunt atque dolores magni recusandae! Doloremque quidem
                                    error eum quis similique doloribus natus qui ut ipsum.Velit quos ipsa
                                    exercitationem, vel unde obcaecati impedit eveniet non. ”</p>

                                <cite>
                                    Victoria Ventura
                                    <span>Customer</span>
                                </cite>
                            </blockquote>
                        </div>
                    </div>
                </div>
                <div class="owl-nav"><button type="button" role="presentation" class="owl-prev disabled"><i
                            class="icon-angle-left"></i></button><button type="button" role="presentation"
                        class="owl-next"><i class="icon-angle-right"></i></button></div>
                <div class="owl-dots"><button role="button" class="owl-dot active"><span></span></button><button
                        role="button" class="owl-dot"><span></span></button></div>
            </div><!-- End .testimonials-slider owl-carousel -->
        </div><!-- End .container -->
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    @include('client.partials.footer')
