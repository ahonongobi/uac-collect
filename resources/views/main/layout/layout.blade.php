<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <!--==================== BOOTSTRAP ====================-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!--==================== UNICONS ====================-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>

<style type="text/css">
    .sidebar {
        height: 100vh;
        overflow: hidden;
        background-color: #2a8c28;
    }
    .sidebar:hover {
        overflow: auto;
    }
    .content {
        height: 100vh;
        overflow: hidden;
    }
    .app_bar {
        background-color: #fff;
    }
    .app_bar1 {
        padding: 15px;
        background-color: #2a8c28;
    }
    .app {
        padding: 20px;
    }
    .siteName {
        color: white;
        font-size: 18px;
        font-weight: bolder;
    }
    .nav_list {
        padding: 10px 0px;
    }
    .nav_list_name {
        color: #FFF;
        font-size: 16px;
    }
    .nav_list_name i {
        font-size: 20px;
        font-weight: 700;
    }
    .nav_nav {

    }
    .nav_menu {
        font-size: 10px;
        color: #C5C5C5;
    }
    .nav_item {
        padding: 10px 0px;
        font-size: 14px;
        text-decoration: none;
    }
    .nav_link {
        color: #F5F5F5;
    }
    .account_mobile {
        color: white;
        font-size: 20px;
    }
    .nav_link:hover, .nav_link:focus {
        color: #FFF;
    }
    .bg-primary- {
        background-color: #2a8c28;
    }
    .text-primary- {
        color: #2a8c28;
    }
</style>
<body>



    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-2 col-lg-3 d-none d-lg-block sidebar">
                <div class="hstack app">
                    <img src="{{asset('uac.jpeg')}}" style="height: 45px; width: 45px; border-radius: 50px" alt="" srcset="">
                    <div ></div>
                    <h4 class="siteName ms-2">UAC COLLECT</h4>
                </div>
                <h6 class="nav_menu">MENU</h6>
                <div class="nav_list">
                    <h6 class="nav_list_name">Dashboard <i class="uil uil-arrow-down float-end"></i></h6>
                    <div class="vstack">
                        <div class="nav_item"><a href="" class="nav_link text-decoration-none">Partenaires</a></div>
                        <div class="nav_item"><a href="/add-object" class="nav_link text-decoration-none">Objet Partenariat</a></div>
                        <div class="nav_item"><a href="/add-structure" class="nav_link text-decoration-none">Structures du Rectorat</a></div> 
                        <div class="nav_item"><a href="/add-formation" class="nav_link text-decoration-none">Unités de formation et de Recherche impliquées
                        </a></div> 

                        <div class="nav_item"><a href="" class="nav_link text-decoration-none"></a></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-10 col-lg-9 col-lg-9 bg-light p-0 col-md-12 content">
                <div class="app_bar d-none d-lg-block shadow-lg  text-center">
                    <div class="row bg-light">
                        <div class="col-lg-3 bg-white">
                            <form class="my-3 ms-4 d-none">
                                <input type="search" placeholder="Rechercher..." class="form-control"></input>
                            </form>
                        </div>
                        <div class="col-lg-7 bg-white">
                            <h6 class="mt-4 text-primary-">
                                Collecte de partenaires nationaux de l'UNIVERSITÉ D'ABOMEY-CALAVI
                            </h6>
                        </div>
                        <div class="col-lg-2 text-center hstack mt-2"  class="ms-auto">
                            <div class="mx-auto" style="height: 40px; width: 40px; background-color: #2a8c28; border-radius: 50px"></div>
                            <small class="mx-2 d-none d-xl-block" style="font-size: 12px; font-weight: 600">Administrateur</small>
                        </div>
                    </div>
                </div>

                <div class="d-block d-lg-none app_bar1 text-white shadow-lg row">
                    <div class="hstack">
                        <div type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                            <i class="uil uil-bars"></i>
                        </div>
                        <div class="ms-3 hstack">
                            <div style="height: 30px; width: 30px; background-color: white; border-radius: 50px"></div>
                            <h4 class="siteName ms-2 pt-2">SITENAME</h4>
                        </div>
                        <div class="ms-auto">
                            <i class="uil uil-user account_mobile"></i>
                        </div>
                    </div>
                </div>


                <div class="hstack bg-white shadow-sm border p-3">
                    <div>
                        Dashbord
                    </div>
                    <div class="ms-auto">
                        Dashboard  > Acceuil
                    </div>
                </div>


                @yield('content')

            </div>
        </div>
    </div>



    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
      <div class="offcanvas-header app_bar1">
        <h5 class="offcanvas-title text-white" id="offcanvasExampleLabel">Collecte Info</h5>
        <button type="button" class="btn-close btn-close-white  text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body bg-primary-">
        <h6 class="nav_menu">MENU</h6>
        <div class="nav_list">
            <h6 class="nav_list_name">Dashboard <i class="uil uil-arrow-down float-end"></i></h6>
            <div class="vstack">
                <div class="nav_item"><a href="" class="nav_link text-decoration-none">Partenaires</a></div>
                <div class="nav_item"><a href="" class="nav_link text-decoration-none">Objet Partenariat</a></div>
                <div class="nav_item"><a href="" class="nav_link text-decoration-none"></a></div>
            </div>
        </div>
      </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>
