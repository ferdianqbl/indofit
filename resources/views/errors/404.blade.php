<!DOCTYPE html>
<html lang="en">
  <head>
    <!--====== Required meta tags ======-->
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!--====== Title ======-->
    <title>404</title>

    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="https://cdn.ayroui.com/1.0/css/bootstrap.min.css" />

    <!--====== Lineicons CSS ======-->
    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="https://cdn.ayroui.com/1.0/css/starter.css" />

    <style>
        /* ===== Buttons Css ===== */
    .error-content .primary-btn {
    background: var(--primary);
    color: var(--white);
    box-shadow: var(--shadow-2);
    }
    .error-content .active.primary-btn, .error-content .primary-btn:hover, .error-content .primary-btn:focus {
    background: var(--primary-dark);
    color: var(--white);
    box-shadow: var(--shadow-4);
    }
    .error-content .deactive.primary-btn {
    background: var(--gray-4);
    color: var(--dark-3);
    pointer-events: none;
    }

    /*===== ERROR ONE Style =====*/
    .error-content {
    padding-top: 120px;
    padding-bottom: 120px;
    }
    .error-content .error-404 {
    font-size: 98px;
    font-weight: 600;
    color: var(--black);
    line-height: 90px;
    }
    .error-content .sub-title {
    font-size: 24px;
    font-weight: 700;
    color: var(--black);
    margin-top: 16px;
    }
    .error-content .text {
    font-size: 16px;
    line-height: 24px;
    color: var(--dark-3);
    margin-top: 8px;
    }
    .error-content  {
    max-width: 410px;
    position: relative;
    margin: 0 auto;
    margin-top: 40px;
    position: relative;
    }
    .error-content  i {
    position: absolute;
    top: 12px;
    left: 20px;
    font-size: 24px;
    color: var(--primary);
    }
    .error-content  input {
    width: 100%;
    height: 46px;
    padding-left: 60px;
    padding-right: 30px;
    border-radius: 50px;
    border: 2px solid var(--gray-4);
    font-size: 16px;
    font-weight: 600;
    color: var(--dark-3);
    }
    .error-content  input:focus {
    border-color: var(--primary);
    }
    .error-content .error-btn {
    position: absolute;
    top: 0;
    right: 0;
    }
    @media (max-width: 767px) {
    .error-content .error-btn {
        position: relative;
        width: 100%;
        margin-top: 8px;
    }
    }
    @media (max-width: 767px) {
    .error-content .primary-btn {
        width: 100%;
    }
    }
    </style>
  </head>

  <body>
    <!--====== ERROR PART START ======-->
    <section class="error-area error-one">
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-7 col-xl-8 col-lg-8">
                <div class="error-content text-center">
                    <span class="error-404">404</span>
                    <h5 class="sub-title">Halaman Tidak Ditemukan</h5>
                    <p class="text">
                    Tidak ada halaman untuk {{ url()->current() }}
                    </p>
               </div>
                <!-- error content -->
            </div>
        </div>
        <!-- row -->
        </div>
        <!-- container -->
    </section>
    <!--====== ERROR PART ENDS ======-->

  </body>
</html>
