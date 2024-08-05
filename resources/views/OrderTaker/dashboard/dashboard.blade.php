<!doctype html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Taker {{$rsp->companyName}}</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-size: 22px;
            scrollbar-width: none;
        }
        header{
            width: 100%;
            background-color: rgb(234 179 8 );
            #information{
                width: 100%;
                height: 48px;
                border-bottom: 1px solid #fff;
                justify-content: space-around;
                align-items: center;
                color: #fff;
                -webkit-text-stroke:.2px #000;
                display: flex;
            }
            #menusName{
                height: 57px;
                display: flex;
                justify-content: space-around;
                /*width: 100%;*/
                overflow-x: scroll;
                overflow-y :hidden ;
                align-items: center;
                span{
                    padding: 5px 4px ;
                    margin: 2px;
                    font-size: 18px;
                    min-width: 100px;
                    text-align: center;
                    cursor: pointer;
                }
            }
        }
        main{
            width: 100%;
            display: flex;
            .content
            {
                background-color: #9a6e3a;
                width: 65%;
                height: calc(100vh - 175px);
                border-right: 1px solid #fff;
                #orders {
                    width: 100%;
                    height: 80%;
                    overflow-y: scroll;
                    border-bottom:1px solid #000 ;

                    .orderItem {
                        width: 100%;
                        padding: 5px 10px;
                        border-bottom: 1px solid #aac0ca;
                        display: flex;
                        justify-content: space-between;

                        button {
                            width: 25px;
                            height: 25px;
                            background-color: transparent;
                            border: 1px solid #000;
                            border-radius: 5px;
                        }

                        input {
                            width: 50px;
                            border: none;
                            background-color: transparent;
                        }
                    }

                }
                .form-c{
                    padding: 10px;

                    label{
                        color: #aac0ca;;
                    }
                    input{
                        border: none;
                        background-color: transparent;
                        border-bottom: 2px solid #202020;
                        margin: 0 auto;
                        color: #0e0e0e;
                    }
                    input::placeholder{
                        color: #191919B8;
                    }
                }
            }
            #menuItems{
                background-color: #99711a;
                width: 35%;
                display: flex;
                flex-direction: column;
                height: calc(100vh - 175px);
                overflow-x: scroll;
                span{
                    width: 100%;
                    height: 65px;
                    text-align: center;
                    line-height: 3;
                    border-bottom: 1px solid #fff;
                }
            }
        }
        footer {
            background-color: #fff2d5;
            height: 70px;
            width: 100%;
            #tableSelect {
                height: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                overflow-y: scroll;
                span{
                    border-radius: 5px;
                    background-color: #191825;
                    margin: 0 7px;
                    padding: 1px 10px;
                    min-width: 80px;
                    text-align: center;
                    color: #f1f2f7;
                }
            }
            #tableSelected{
                height: 100%;
                display: none; /* flex - none */
                justify-content: center;
                align-items: center;
                direction: rtl;
                button{
                    background-color: transparent;
                    border: 1px solid #000;
                    border-radius: 5px;
                    cursor: pointer;
                    height: 40px;
                    width: 110px;
                    padding: 2px 4px;
                }
                button.btnsend
                {
                    border-color: #1ddc17;
                    color: #1ddc17;
                    margin: 0 10px;
                }
            }
            #tableSelected *{
                padding: 10px;
            }

        }
    </style>
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
                <input type="text" id="customer_name" placeholder="محمد محمدی <اجباری>">
            </div>
            <div class="form-c">
                <label> شماره تلفن :</label>
                <input type="text" id="customer_phone" placeholder="09150000000 <اخطیاری>">
            </div>
        </div>

    </main>
    <footer>
        <div id="tableSelect">

        </div>
        <div id="tableSelected">
            <div>میز :</div>
            <div id="tableSelectId">5</div>
            <button onclick="tabelSelectCancel()">انصراف</button>
            <button onclick="send()" class="btnsend">ثبت</button>
        </div>
    </footer>
    <script !src="">
        let tableSelected = 0 ;
        let ordersItem = [];
        let menus ;
        const menusName = document.getElementById('menusName');
        const menuItems = document.getElementById('menuItems');
        const orders = document.getElementById('orders');
        const tableSelect = document.getElementById('tableSelect');
        const tableSelectId = document.getElementById('tableSelectId');
        const tableSelector = document.getElementById('tableSelected');
        const x_csrf_token = document.getElementById('X-CSRF-TOKEN');
        const customer_name = document.getElementById('customer_name');
        const customer_phone = document.getElementById('customer_phone');


        const initTableSelector = (tables) => {
            tableSelect.style.display = 'flex';
            tableSelector.style.display = 'none';
            tableSelect.innerHTML = "";
            tables.map((item)=>{
                tableSelect.innerHTML += `<span onclick="tableSelecting(${item.id})">${item.name}</span>`;

            })
        }
        const initMenus = (menus) => {
            menusName.innerHTML = '';
            menus.map((item,i)=>{
                menusName.innerHTML += `<span onclick="initMenusItem(${i})">${item.name}</span>`;
            });
            initMenusItem(0);
        }

        const initPage = async () => {
          let response = await fetch('/indexData')
          let responseJson = await response.json();
            console.log(responseJson)
            let tables = await responseJson.table;
            let menu =await responseJson.menus;
            menus = menu;
            await initTableSelector(tables)
            await initMenus(menu);
        }


        const tableSelecting = (id) => {
            tableSelected = id;
            tableSelectId.textContent =id;
            tableSelect.style.display = 'none';
            tableSelector.style.display = 'flex';
        }

        const tabelSelectCancel = () => {
            tableSelected = 0;
            tableSelect.style.display = 'flex';
            tableSelector.style.display = 'none';
        }

        const initMenusItem = (index) => {
            menuItems.innerHTML='';
          menus[index].menu_items.map((item)=>{
              menuItems.innerHTML += `<span onclick="addItemToOrder(${item.id},'${item.name}')">${item.name}</span>`
          });
        }

        const addItemToOrder = (id,name) => {
            if(!!ordersItem.filter((item)=>{
                return item.id == id ;
            })[0]){
                ordersItem.map((item)=>{
                    if (item.id == id){
                        item.qty += 1
                    }
                });
            }
            else{
                ordersItem.push({id : id ,name:name,qty:1})
            }

            ordersref();
        }
        const ordersref = () => {
            orders.innerHTML ='';
          ordersItem.map((item)=>{
              orders.innerHTML += `<div class="orderItem">
                    <span class="name">${item.name}</span>
                    <span class="qty">
                        <button onclick="qtyMinus(${item.id})">-</button>
                        <input type="number" id="qty_${item.id}" value="${item.qty}">
                        <button onclick="qtyPlus(${item.id})">+</button>
                    </span>
                </div>`
          })
        }

        const qtyPlus = (id) => {
            ordersItem.map((item)=>{
                if (item.id == id){
                    item.qty += 1
                }
            });
            ordersref();
        }
        const qtyMinus = (id) => {
            ordersItem.map((item,i)=>{
                if (item.id == id){
                    if (item.qty >1){
                        item.qty -= 1
                    }
                    else{
                        ordersItem.splice(i);
                    }
                }
            });
            ordersref()
        }

        const send = async () => {
            console.log(customer_name.value, customer_phone.value , tableSelected , ordersItem ,x_csrf_token.value )

            if (customer_name.value != ""){
                config = {
                    method : 'POST',
                    headers : {
                        'Content-Type' : 'application/json',
                        'Accept' : 'application/json',
                        'X-CSRF-Token' : x_csrf_token.value
                    },
                    body:JSON.stringify({
                        customer_phone : customer_phone.value,
                        customer_name : customer_name.value ,
                        tableSelected :tableSelected ,
                        ordersItem : ordersItem,
                    })
                }
                let response = await fetch(`/`,config)
                let responseJson = await response.json();
                console.log(response);
                if (response.status == 201 )
                    alert('سفارش با موفقیت ثبت شد .');
                //after send
                customer_name.value = '';
                customer_phone.value = '';
                tabelSelectCancel();
                ordersItem = [];
                ordersref();
            }


        }
        document.addEventListener('DOMContentLoaded',initPage)
    </script>
</body>
</html>
