<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta property="og:title" content="{{$nfc->Name}}" />
    <meta property="og:description" content="ﮎﺍﺮﺗ ﻩﻮﺸﻤﺗﺩ ﻭﺰﯿﺗ mrmdcode" />
    <meta property="og:image" content="@php $pathArr = explode("/",$nfc->Image);$newPath = array_pop($pathArr) ;echo asset("storage/nfc/Images/".$newPath); @endphp" />
    <title>{{$nfc->Name}} - NFC کارت</title>
    <link rel="stylesheet" href="/nfc/theme_2/style/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<main>
    <header>
        <canvas class="img-bg" id="canvas"></canvas>

        <div class="avatar" style="background-image: url(@php $pathArr = explode("/",$nfc->Image);$newPath = array_pop($pathArr) ;echo asset("storage/nfc/Images/".$newPath); @endphp);"></div>
    </header>

    <h1 class="NameTitle">{{$nfc->Name}}</h1>
    <h3 class="number">{{$nfc->Phone}}</h3>

    <div class="Socials">
        <ul>
            @if($nfc->Twitter != "")
                <li>
                    <a href="{{$nfc->Instagram}}">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                </li>
            @endif
            @if($nfc->Instagram != "")
                <li>
                    <a href="{{$nfc->Instagram}}">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                </li>
            @endif
            @if($nfc->Telegram != "")
                <li>
                    <a href="{{$nfc->Instagram}}">
                        <i class="fa-brands fa-telegram"></i>
                    </a>
                </li>
            @endif
            @if($nfc->Linkedin != "")
                <li>
                    <a href="{{$nfc->Instagram}}">
                        <i class="fa-brands fa-linkedin"></i>
                    </a>
                </li>
            @endif



        </ul>
    </div>

    <div class="conatainer">
        <div class="card cardOne">
            <i class="fa-solid fa-code"></i>

            <p>ارتباطات بدون مرز رو با تکنولوژی NFC ما تجربه کن ! تعامالاتت رو ساده تر کن ، به راحتی همه چیزو به اشتراک بذار و بدون زحمت ارتباط بگیر. تجربه ارتباط بی درنگ با ‌NFC</p>
        </div>

        <div class="card cardTwo">
            <i class="fa-solid fa-handshake"></i>

            <p>با دعوت از دوستات میتونی از ما جایزه بگیری</p>
        </div>
    </div>
</main>
<div class="footerButtons">
    <a id="addToContact" href="tel:+{{$nfc->Phone}}">افرودن به مخاطبین</a>
    <a id="buyNfc" href="mrmdcode.ir">منم NFC میخوام</a>
</div>

<script src="https://unpkg.com/starback@2.1.1/dist/starback.global.js"></script>

<script>
    const canvas = document.getElementById("canvas");
    const starback = new Starback(canvas, {
        type: "dot",
        quantity: 100,
        direction: 225,
        backgroundColor: ["#0e1118", "#232b3e"],
        randomOpacity: true,
    });
</script>
</body>
</html>
