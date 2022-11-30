<!DOCTYPE html>
<html lang="en">
<!-- Basic -->
@include('frontend.layouts.head')

<body style="margin: 0px; overflow: visible;">
    <div class="wrapper">

        @include('frontend.layouts.navbar')
        @yield('content')
        @include('frontend.layouts.footer')

        <!-- Start copyright  -->
        <div class="footer-copyright">
            <p class="footer-company">All Rights Reserved. © 2018 <a href="#">ThewayShop</a> Design By :
                <a href="https://html.design/">html design</a>
            </p>
        </div>
        <!-- End copyright  -->

        <a href="#" id="back-to-top" title="Back to top" style="display: none;">↑</a>

        <div role="dialog" id="baguetteBox-overlay">
            <div id="baguetteBox-slider"></div><button type="button" id="previous-button" aria-label="Previous"
                class="baguetteBox-button"><svg width="44" height="60">
                    <polyline points="30 10 10 30 30 50" stroke="rgba(255,255,255,0.5)" stroke-width="4"
                        stroke-linecap="butt" fill="none" stroke-linejoin="round"></polyline>
                </svg></button><button type="button" id="next-button" aria-label="Next" class="baguetteBox-button"><svg
                    width="44" height="60">
                    <polyline points="14 10 34 30 14 50" stroke="rgba(255,255,255,0.5)" stroke-width="4"
                        stroke-linecap="butt" fill="none" stroke-linejoin="round"></polyline>
                </svg></button><button type="button" id="close-button" aria-label="Close"
                class="baguetteBox-button"><svg width="30" height="30">
                    <g stroke="rgb(160,160,160)" stroke-width="4">
                        <line x1="5" y1="5" x2="25" y2="25"></line>
                        <line x1="5" y1="25" x2="25" y2="5"></line>
                    </g>
                </svg></button>
        </div>


    </div>
</body>

</html>