<?php ?>         
        <footer id="dtr-footer">
            <div class="dtr-footer-main">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <img style="width: 200px;" src="/public/img/logo/logo.png" alt="logo" />
                            <p class="color-white-muted small">
                                We provide Free, Expert guidance to help you identify the best-suited Regular Colleges,
                                Online Certification Programs, Study Abroad Options, and Online Universities as per your requirements.
                            </p> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="dtr-copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center text-size-sm">
                            <p> Copyright © All rights reserved <a href="https://boostmytalent.com/">Boostmytalent</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <style>
            .modal-header .close{
                font-size: 40px !important;
                margin-top: -4px !important;
            }
        </style>

        <!-- modal  -->
        <div class="modal bg_modal_dark" id="myModal">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content"> 
                    <div class="modal-header"> 
                        <img src="/public/img/logo/logo.webp" width="235px" alt="boostmytalnet logo" class="">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div> 
                    <div class="modal-body">
                        <h4 class="modal-title text-center">Ready to transform your career</h4>
                        <div class="row">
                            <div class="col-12 py-4 custom-bg-light">
                                <div class="dtr-form dtr-form-styled">
                                     <?php include('first_delhi_ncr_form.php') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    <script>
        $(document).ready(function () {
            $('.regular-college-slider').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                loop: true,
                autoplay: true,
                autoplaySpeed: 1000,
                infinite: true,
                arrows: true,
                dots: true,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
                // regular end
            });

            $('.online-college-slider').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                loop: true,
                autoplay: true,
                autoplaySpeed: 1000,
                infinite: true,
                arrows: true,
                dots: true,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
                // online end
            });



            $('.top-recruiter-slider').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: true, 
                autoplaySpeed: 1500,
                infinite: true,
                arrows: true,
                dots: false,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            });
        }); 
    </script>


</body>
</html>