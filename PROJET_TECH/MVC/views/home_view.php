<! DOCTYPE html>
<html>
    <head>
        <title>StopGaspillage</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="jj.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>

    </head>
    <body>
        <!-- barre de navigation-->
        <?php include_once 'views/includes/header.php'?>
    <!--debut bannière-->
        <div class="container">
        <div id="slider">
            <div id="headerSlider" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#headerSlider" data-slide-to="0" class="active"></li>
                <li data-target="#headerSlider" data-slide-to="1"></li>
                <li data-target="#headerSlider" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block img-fluid" src="images/banner.jpg" alt="banner">
                    <div class="carousel-caption">
                      <h5>Plus vous donnez Plus vous recevrez</h5>
                    </div>
                </div>
                <div class="carousel-item">
                  <img class="d-block img-fluid" src="images/banner1.jpg" alt="banner">
                    <div class="carousel-caption">
                      <h5>Un coeur qui donne Est un coeur doux</h5>
                  </div>
                </div>
                <div class="carousel-item">
                  <img class="d-block img-fluid" src="images/banner2.jpg" alt="banner">
                    <div class="carousel-caption">
                      <h5>La main qui donne est celle qui recevra</h5>
                    </div>
                </div>
              </div>
              <a class="carousel-control-prev" href="#headerSlider" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#headerSlider" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
        </div>
        </div>
    <!-- fin banniere-->
    <!-- debut apropos-->
        <section id="About">
            <div class="container">
                <div class="row">
                    <div class="col-md">
                        <h3>Où nous trouver</h3>
                    <div class="about-content"></div>
                        Ipsam vero urbem Byzantiorum fuisse refertissimam atque ornatissimam signis quis ignorat? Quae illi, exhausti sumptibus bellisque maximis, cum omnis Mithridaticos impetus totumque Pontum armatum affervescentem in Asiam atque erumpentem, ore repulsum et cervicibus interclusum suis sustinerent, tum, inquam, Byzantii et postea signa illa et reliqua urbis ornanemta sanctissime custodita tenuerunt.
                    </div>

                    <div class="col-md">
                        <h3>Faire un don</h3>
                        Ipsam vero urbem Byzantiorum fuisse refertissimam atque ornatissimam signis quis ignorat? Quae illi, exhausti sumptibus bellisque maximis, cum omnis Mithridaticos impetus totumque Pontum armatum affervescentem in Asiam atque erumpentem, ore repulsum et cervicibus interclusum suis sustinerent, tum, inquam, Byzantii et postea signa illa et reliqua urbis ornanemta sanctissime custodita tenuerunt.
                    </div>
                    <div class="col-md">
                        <h3>Devenir bénevole</h3>
                        Ipsam vero urbem Byzantiorum fuisse refertissimam atque ornatissimam signis quis ignorat? Quae illi, exhausti sumptibus bellisque maximis, cum omnis Mithridaticos impetus totumque Pontum armatum affervescentem in Asiam atque erumpentem, ore repulsum et cervicibus interclusum suis sustinerent, tum, inquam, Byzantii et postea signa illa et reliqua urbis ornanemta sanctissime custodita tenuerunt.
                    </div>

                </div>
                <button type="button" class="btn btn-primary">Suite>></button>
            </div>

        </section>
        <!------services------>


<div class="background-block">
    <div class="container text-center py-5">
        <div class="com-top">
            <h1>Notre equipe</h1>
            <div class="text w-75 mx-auto">vous pouvez nous a partir de nos reseau sociaux.
            </div>
        </div>
        <div class="row pt-5">
            <div class="col-lg-4 ">
                <div class="com-circle-container com-circle">
                    <i class="fas fa-phone com-icon"></i>
                </div>
                <div class="pb-5">
                    <div class="com-title">Telephone</div>
                    <div class="w-75 m-auto">00335644648

                    </div>
                </div>
            </div>
            <div class="col-lg-4 ">
                <div class="com-circle-container com-circle">
                    <i class="fas fa-comment com-icon"></i>
                </div>
                <div class="pb-5">
                    <div class="com-title">Messages</div>
                    <div class="w-75 m-auto">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vitae
                        feugiat orci. Aenean tempus
                        erat eu sollicitudin venenatis.
                    </div>
                </div>
            </div>
            <div class="col-lg-4 ">
                <div class="com-circle-container com-circle">
                    <i class="fas fa-envelope com-icon"></i>
                </div>
                <div class="pb-5">
                    <div class="com-title">Email</div>
                    <div class="w-75 m-auto">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vitae
                        feugiat orci. Aenean tempus
                        erat eu sollicitudin venenatis.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        <!-----fin services---->
        <!-----footer---->
        <?php include_once 'views/includes/footer.php'?>
        <!----- fin footer---->


			<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
			<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    </body>

</html>