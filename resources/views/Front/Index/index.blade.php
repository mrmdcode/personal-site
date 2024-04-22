<!DOCTYPE html>
<html lang="{{$setting->metaLang}}">
<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="lang" content="{{$setting->metaLang}}" />
    <meta name="Copyright" content="{{$setting->metaCopyright}}" />
    <meta name="keywords" content="{{$setting->metaKeyword}}" />
    <meta name="description" content="{{$setting->metaDescription}}" />
    <meta name="author" content="{{$setting->metaAuthor}}" />
    <title>{{$setting->title}}</title>
    <meta name="robots" content="{{$setting->metaRobots}}">
    <meta property="og:title" content="{{$setting->metaVoTitle}}"/>
    <meta property="og:description" content="{{$setting->metaVoDescription}}"/>
    <meta property="og:type" content="{{$setting->metaVoType}}"/>
    <meta property="og:url" content="{{$setting->metaVoUrl}}"/>
    <meta property="og:image" content="@php $pathArr = explode("/",$setting->metaVoImage);$newPath = array_pop($pathArr) ;echo asset("storage/Images/".$newPath); @endphp"/>
    <script>
        !function(e,t,n){e.yektanetAnalyticsObject=n,e[n]=e[n]||function(){e[n].q.push(arguments)},e[n].q=e[n].q||[];var a=t.getElementsByTagName("head")[0],r=new Date,c="https://cdn.yektanet.com/superscript/7Km8BWTU/native-mrmdcode.ir-37222/yn_pub.js?v="+r.getFullYear().toString()+"0"+r.getMonth()+"0"+r.getDate()+"0"+r.getHours(),s=t.createElement("link");s.rel="preload",s.as="script",s.href=c,a.appendChild(s);var l=t.createElement("script");l.async=!0,l.src=c,a.appendChild(l)}(window,document,"yektanet");
    </script>
    <link rel="shortcut icon" href="@php $pathArr = explode("/",$setting->icon);$newPath = array_pop($pathArr) ;echo asset("storage/Images/".$newPath); @endphp" type="image/x-icon">


    <link
        href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900"
        rel="stylesheet"
    />
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/fontawesome.css" />
    <link rel="stylesheet" href="assets/css/templatemo-style.css" />
    <link rel="stylesheet" href="assets/css/owl.css" />
    <link rel="stylesheet" href="assets/css/lightbox.css" />
</head>

<body>
<div id="page-wraper">
    <!-- Sidebar Menu -->
    @include("Front.Index._partial._Aside")

    @include("Front.Index._partial._About")

    @include("Front.Index._partial._Skills")

    @include("Front.Index._partial._Works")

    @include("Front.Index._partial._ContactMe")
</div>

<!-- Scripts -->
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/isotope.min.js"></script>
<script src="assets/js/owl-carousel.js"></script>
<script src="assets/js/lightbox.js"></script>
<script src="assets/js/custom.js"></script>
<script src="js/sweetalert2.js"></script>
<script>

@if(session("status") == "success")

    Swal.fire({
        position: "top-end",
        icon: "success",
        title: "Send Your Request is Successfully",
        showConfirmButton: false,
        timer: 1500
    });
@endif
    //according to loftblog tut
    $(".main-menu li:first").addClass("active");

    var showSection = function showSection(section, isAnimate) {
        var direction = section.replace(/#/, ""),
            reqSection = $(".section").filter(
                '[data-section="' + direction + '"]'
            ),
            reqSectionPos = reqSection.offset().top - 0;

        if (isAnimate) {
            $("body, html").animate(
                {
                    scrollTop: reqSectionPos
                },
                800
            );
        } else {
            $("body, html").scrollTop(reqSectionPos);
        }
    };

    var checkSection = function checkSection() {
        $(".section").each(function() {
            var $this = $(this),
                topEdge = $this.offset().top - 80,
                bottomEdge = topEdge + $this.height(),
                wScroll = $(window).scrollTop();
            if (topEdge < wScroll && bottomEdge > wScroll) {
                var currentId = $this.data("section"),
                    reqLink = $("a").filter("[href*=\\#" + currentId + "]");
                reqLink
                    .closest("li")
                    .addClass("active")
                    .siblings()
                    .removeClass("active");
            }
        });
    };

    $(".main-menu").on("click", "a", function(e) {
        e.preventDefault();
        showSection($(this).attr("href"), true);
    });

    $(window).scroll(function() {
        checkSection();
    });
</script>
</body>
</html>
