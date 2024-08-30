 <!--- navbar start-->
 <header class="sticky-top custom-navbar">
     <nav class="navbar " style="background-color:#2d3387; ">
         <div class="container-fluid">
             <a href="{{ route('front.home') }}">

                 <img src="{{ asset('frontend/image/logo.png') }}" alt="logo" style="width:220px;height:80px;">
             </a>
             <div class="swiffy-slider py-3 slider-item-show4 py-3 py-lg-3 mt-2  slider-nav-sm  slider-nav-page slider-item-snapstart slider-nav-autoplay slider-item-ratio slider-item-ratio-contain slider-item-ratio-32x9 bg-white shadow-lg py-1 py-lg-1"
                 data-slider-nav-autoplay-interval="2000">
                 <div class="slider-container">
                     <div><img src="https://qph.cf2.quoracdn.net/main-qimg-a86b86989b596619237097ec1b7e2389-lq"
                             alt="..."></div>
                     <div><img src="https://www.gamblingsites.org/app/uploads/2020/02/Casino-Game-Free-1-1.jpg"
                             alt="..."></div>
                     <div><img
                             src="https://is3-ssl.mzstatic.com/image/thumb/Purple5/v4/89/fe/36/89fe36ab-88a2-5add-a4dc-87e340cbcdee/source/750x750bb.jpeg"
                             alt="..."></div>
                     <div><img
                             src="https://www.shutterstock.com/image-vector/web-banner-illustration-online-casino-260nw-2223494525.jpg"
                             alt="..."></div>
                     <div><img src="https://i.pinimg.com/736x/66/2f/d9/662fd98cfd3e9f73653481e9ee73cbec.jpg"
                             alt="..."></div>
                     <div><img
                             src="https://images.squarespace-cdn.com/content/v1/5ede2122e582b96630a4a73e/1609375291581-S6HH2ND892X3RPTUNIJG/Rolex-logo+2021.jpg"
                             alt="..."></div>
                     <div><img
                             src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcShAfu8mkf9EXNIsuKsf8DSSHoz9h1l6UtjNA&s"
                             alt="..."></div>
                     <div><img
                             src="https://inkbotdesign.com/wp-content/uploads/2023/02/Intel-Logo-Design-in-BLue-1024x640.png"
                             alt="..."></div>
                     <div><img
                             src="https://www.designrush.com/uploads/users/customer-12/image_1532370530_PUupRl8PHyZvMCs2KRMuskJdYeyqW3IeacT72WYE.png"
                             alt="..."></div>
                     <div><img
                             src="https://mymodernmet.com/wp/wp-content/uploads/2017/10/famous-logo-from-memory-feat-big-2.jpg"
                             alt="..."></div>
                     <div><img
                             src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTD1gbDH7D5-lVeT2yWgG4_p3T8ugB9HMaksw&s"
                             alt="..."></div>
                     <div><img
                             src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTlcL_Qh_9kPUBXzXV0MSLXZ03T3Uz_riSW2w&s"
                             alt="..."></div>
                 </div>
                 <button type="button" class="slider-nav" aria-label="Go left"></button>
                 <button type="button" class="slider-nav slider-nav-next" aria-label="Go left"></button>
             </div>
             <div class="dropdown dropdown-menu-end me-5 mt-2">
                 <a class="navbar-brand text-white fs-6 ">Balance : <span class="text-danger fw-bold">
                         <i class="bi bi-currency-rupee"></i>252.26</span></a><br>
                 <a class="navbar-brand text-white fs-6 ">Exposure : 0</a>
                 <div class=" dropdown-toggle text-white " type="button" data-bs-toggle="dropdown"
                     aria-expanded="false">

                     <span class="text-success  fw-bold">{{ Auth::user()->name }}</span>
                 </div>
                 <ul class="dropdown-menu ">
                     <li><a class="dropdown-item" href="{{ route('front.accountStatement') }}">
                             <i class="bi bi-gear-fill"></i>
                             <span>Account Statement</span>
                         </a>
                     </li>
                     <li><a class="dropdown-item" href="{{ route('front.profitLossReport') }}">
                             <i class="bi bi-journal-bookmark-fill"></i>
                             Profit Loss Report
                         </a>
                     </li>
                     <li><a class="dropdown-item" href="{{ route('front.betHistory') }}">
                             <i class="bi bi-calendar2-event-fill"></i>
                             Bet History
                         </a>
                     </li>
                     <li><a class="dropdown-item" href="{{ route('front.unsetteledBet') }}">
                             <i class="bi bi-clipboard-check-fill"></i>
                             Unsettled Bet
                         </a>
                     </li>
                     <li><a class="dropdown-item" href="{{ route('front.setButtonValue') }}">
                             <i class="bi bi-badge-vo"></i>
                             Set button Values
                         </a>
                     </li>
                     <li><a class="dropdown-item" href="{{ route('front.changePassword') }}">
                             <i class="bi bi-lock-fill"></i>
                             Change Password
                         </a>
                     </li>
                     <li><a class="dropdown-item" href="{{ route('front.logout') }}">
                             <i class="bi bi-box-arrow-in-right"></i>
                             SignOut
                         </a>
                     </li>
                 </ul>
             </div>
         </div>
     </nav>
     <nav class="navbar navbar-expand-lg " style="background-color:#092844;">
         <div class="container-fluid">
             <!--sidebar trigger-->
             <button class="navbar-toggler " type="button" data-bs-toggle="offcanvas"
                 data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                 <i class="bi bi-list text-white fs-2" data-bs-target="#offcanvasExample"></i>
             </button>
             <!--sidebar trigger-->
             <div></div>
             <button class="navbar-toggler " type="button" data-bs-toggle="collapse"
                 data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                 aria-label="Toggle navigation">
                 <i class="bi bi-list text-white fs-2"></i>
             </button>
             <div class="collapse navbar-collapse " id="navbarSupportedContent">
                 <ul class="navbar-nav " style="font-size: 13px; font-weight: bold; ">
                     <a class="nav-link text-white" href="{{ route('front.home') }}">HOME</a>
                     <a class="nav-link text-white" href="#">CRICKET</a>
                     <a class="nav-link text-white" href="#">FOOTBALL</a>
                     <a class="nav-link text-white" href="#">TENNIS</a>
                     <a class="nav-link text-white" href="#">ELECTION</a>
                     <a class="nav-link text-white" href="#">IPL 2024</a>
                     <a class="nav-link text-white" href="#">ONE-DAY TEENPATTI</a>
                     <a class="nav-link text-white" href="#">ROULETTE</a>
                     <a class="nav-link text-white" href="#">7UP & DOWN</a>
                     <a class="nav-link text-white" href="#">32 CARD CASINO</a>
                     <a class="nav-link text-white" href="#">SICBO</a>
                     <a class="nav-link text-white" href="#">POKER</a>
                     <a class="nav-link text-white" href="#">ANDAR BAHAR</a>
                     <a class="nav-link text-white" href="#">ONE-DAY DRAGON TIGER</a>
                 </ul>
             </div>
         </div>
     </nav>
 </header>
 <!-- navbar end-->
