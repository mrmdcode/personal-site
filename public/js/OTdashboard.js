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
        if (item.orders){
            if (item.orders.status == 'accepted') {

                tableSelect.innerHTML += `<span onclick="tableSelecting(${item.id},true,'${item.name}')">${item.name}</span>`;
            } else {
                tableSelect.innerHTML += `<span onclick="tableSelecting(${item.id},false ,'${item.name}')">${item.name}</span>`;
            }
        }
        else {
            tableSelect.innerHTML += `<span onclick="tableSelecting(${item.id},true,'${item.name}')">${item.name}</span>`;

        }

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


const tableSelecting = (id,selected , tableN) => {
    if(selected){
        tableSelector.innerHTML =`
                    <div>میز :</div>
                    <div id="tableSelectId">${tableN}</div>
                    <button onclick="send()" class="btnsend">ثبت</button>
                    <button onclick="tabelSelectCancel(1)">انصراف</button>`;
    }else{
        tableSelector.innerHTML =`
                    <div>میز :</div>
                    <div id="tableSelectId">${tableN}</div>
                    <button onclick="edit(${id})" class="btnsend">ویرایش</button>
                    <button onclick="tabelSelectCancel(1)">انصراف</button>`;

    }
    tableSelected = id;
    tableSelect.style.display = 'none';
    tableSelector.style.display = 'flex';
}

const tabelSelectCancel = (type) => {
    if (type == 1){

        tableSelected = 0;
        tableSelect.style.display = 'flex';
        tableSelector.style.display = 'none';
    }
    else if(type == 2){

    }
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
                ordersItem.splice(i,1);
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
        initPage();
        ordersref();

    }
    else{
        alert('نام مشتری را وارد کنید .')
    }


}
const edit = async (id) => {

    ordersItem = [];
    config = {
        method : 'GET',
        headers : {
            'Accept' : 'application/json',
        },

    }
    let response = await fetch(`/edit/${id}`,config)
    let responseJson = await response.json();
    console.log(responseJson);
    // console.log(responseJson.rs_menu_items);
    responseJson.rs_menu_items.map((item)=>{
        // console.log(item)
        ordersItem.push({
            id:item.id,
            name:item.name,
            qty:item.pivot.qty
        })
    });
    customer_name.value = responseJson.order[1]
    customer_phone.value = responseJson.order[2]
    tableSelector.innerHTML =`
                    <button onclick="update(${responseJson.order[0]})" class="btnsend">بروزرسانی</button>
                    <button onclick="tabelSelectCancel(2)" class="btnsend">انصراف</button>
                    `;
    ordersref()
}

const update =async (id) => {
    // console.log(id , ordersItem)
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
                tableSelected :id ,
                ordersItem : ordersItem,
            })
        }
        let response = await fetch(`/update/${id}`,config)
        let responseJson = await response.json();
        console.log(responseJson);
        if (response.status == 200 ){

            alert('سفارش با موفقیت ویرایش شد .');
            //after send
            customer_name.value = '';
            customer_phone.value = '';
            tabelSelectCancel();
            ordersItem = [];
            initPage();
            ordersref();
        }

    }
    else{
        alert('نام مشتری را وارد کنید .')
    }
}


document.addEventListener('DOMContentLoaded',initPage)
