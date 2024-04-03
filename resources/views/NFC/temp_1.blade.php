<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <title>{{$nfc->Name}} - NFC کارت</title>
</head>
<body dir="ltr">
<div class="container-fluid bg-dark text-light">
    <div class="row mb-3 border-bottom pb-3 pr-4 ">

        <div class="col-8 d-flex flex-column align-items-end justify-content-center">
            <h3>{{$nfc->Name}}</h3>
            <div class=" mr-2 text-light">{{$nfc->Phone}}</div>
            <button class="btn btn-outline-success mt-1">افزودن به مخاطب</button>
        </div>
        <div class="col-4">
            <img src="@php $pathArr = explode("/",$nfc->Image);$newPath = array_pop($pathArr) ;echo asset("storage/nfc/Images/".$newPath); @endphp" class="w-100 m-2 rounded-circle img-thumbnail" alt="{{$nfc->Name}}">
        </div>
    </div>
    <div class="row h-75 mb-5 pb-5 border-bottom pr-4">


        @if($nfc->Instagram != "")

        <div class="col-6 col-sm-4 col-md-4">
            <img src="{{asset("img/social/Instagram.png")}}" class="w-75 m-2 rounded-circle img-thumbnail float-right" alt="{{$nfc->Name}}" onclick="window.location.href = 'https://instagram.com/'+'{{$nfc->Instagram}}'">
        </div>
        @endif
        @if($nfc->Telegram != "")

        <div class="col-6 col-sm-4 col-md-4">
            <img src="{{asset("img/social/Telegram.png")}}" class="w-75 m-2 rounded-circle img-thumbnail float-right" alt="{{$nfc->Name}}" onclick="window.location.href = 'https://t.me/'+'{{$nfc->Telegram}}'">
        </div>
        @endif
        @if($nfc->Rubika != "")

        <div class="col-6 col-sm-4 col-md-4">
            <img src="{{asset("img/social/Rubika.png")}}" class="w-75 m-2 rounded-circle img-thumbnail float-right" alt="{{$nfc->Name}}" onclick="window.location.href = 'https://rubika.com/'+'{{$nfc->Rubika}}'">
        </div>
        @endif
        @if($nfc->Twitter != "")

        <div class="col-6 col-sm-4 col-md-4">
            <img src="{{asset("img/social/Twitter.png")}}" class="w-75 m-2 rounded-circle img-thumbnail float-right" alt="{{$nfc->Name}}" onclick="window.location.href = 'https://twitter.com/'+'{{$nfc->Twitter}}'">
        </div>
        @endif
        @if($nfc->WhatsApp != "")

        <div class="col-6 col-sm-4 col-md-4">
            <img src="{{asset("img/social/WhatsApp.png")}}" class="w-75 m-2 rounded-circle img-thumbnail float-right" alt="{{$nfc->Name}}" onclick="window.location.href = 'https://WA.me/'+'{{$nfc->WhatsApp}}'">
        </div>
        @endif
        @if($nfc->Linkedin != "")

        <div class="col-6 col-sm-4 col-md-4">
            <img src="{{asset("img/social/Linkedin.png")}}" class="w-75 m-2 rounded-circle img-thumbnail float-right" alt="{{$nfc->Name}}" onclick="window.location.href = 'https://linkedin.com/in/'+'{{$nfc->Linkedin}}'">
        </div>
        @endif
        @if($nfc->Website != "")

        <div class="col-6 col-sm-4 col-md-4">
            <img src="{{asset("img/social/Website.png")}}" class="w-75 m-2 rounded-circle img-thumbnail float-right" alt="{{$nfc->Name}}" onclick="window.location.href = 'https://'+'{{$nfc->Website}}'">
        </div>

        @endif


    </div>
    <div class="row text-center pb-5">
        <h4> برای رفیقمم بساز 😎</h4>
        <p>با ساختن برای دوستات و آشناهاتم میتونی پول دربیاری !</p>
        <p>کافی فقط بزنی رو دکمه پایین 👇</p>
        <button class="btn btn-outline-light" onclick="window.location.href = 'new/{{$nfc->id}}'">همین الان بسازش !!</button>
    </div>

</div>
<div class="position-fixed text-center border-top w-100" style="bottom: 0;">
    <a href="https://mrmdcode.ir">MrMDCode</a>
</div>
</body>
</html>

