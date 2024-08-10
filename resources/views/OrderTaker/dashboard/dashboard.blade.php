<!doctype html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Taker {{$rsp->companyName}}</title>
    <link rel="stylesheet" href="{{asset('css/OTdashboard.css')}}">
</head>
<body>
<form action="{{route('logout')}}" method="post" id="lgform">
    @csrf
</form>
<input type="hidden" id="X-CSRF-TOKEN" value="{{csrf_token()}}">
    <header>
        <div id="information">
            <div onclick="document.getElementById('lgform').submit()">خروج</div>
            <div>{{$rsp->companyName}}</div>
            <div>{{$user->name}}</div>

        </div>
        <div id="menusName">

        </div>
    </header>
    <main>
        <div id="menuItems">

        </div>
        <div class="content">
            <div id="orders">

            </div>
            <div class="form-c">
                <label>نام و نام مشتری :</label>
                <input type="text" id="customer_name" placeholder="<اجباری>">
            </div>
            <div class="form-c">
                <label> شماره تلفن :</label>
                <input type="text" id="customer_phone" placeholder="<اخطیاری>">
            </div>
        </div>

    </main>
    <footer>
        <div id="tableSelect">

        </div>
        <div id="tableSelected">
            <div>میز :</div>
            <div id="tableSelectId"></div>
            <button onclick="edit()" class="btnsend">ویرایش</button>
            <button onclick="tabelSelectCancel()">انصراف</button>
            <button onclick="send()" class="btnsend">ثبت</button>
        </div>
    </footer>
    <script src="{{asset('js/OTdashboard.js')}}"></script>
</body>
</html>
