//show product
const product = [
    {
        id: 1,
        image: "./img/canon/200D/200D.png",
        title: "Canon 200D",
        price: 40000,
        type: "canon",
        quantity: 100
    },
    {
        id: 2,
        image: "./img/canon/1500D-kit/1500D-kit.png",
        title: "Canon 1500D-kit",
        price: 43000,
        type: "canon",
        quantity: 100
    },
    {
        id: 3,
        image: "./img/canon/3000D-kit/3000D-kit.png",
        title: "Canon 3000D-kit",
        price: 16000,
        type: "canon",
        quantity: 100
    },
    {
        id: 4,
        image: "./img/canon/G7-X-mark/G7-X-mark.png",
        title: "Canon G7-X-mark",
        price: 23100,
        type: "canon",
        quantity: 100
    },
    {
        id: 5,
        image: "./img/canon/phukien/speedlite.png",
        title: "Đèn speedlite",
        price: 5400,
        type: "phukien",
        quantity: 100
    },
    {
        id: 6,
        image: "./img/canon/R7/R7.png",
        title: "Canon R7",
        price: 54322,
        type: "canon",
        quantity: 100
    },
    {
        id: 7,
        image: "./img/canon/R8/R8.png",
        title: "Canon R8",
        price: 54323,
        type: "canon",
        quantity: 100
    },
    {
        id: 8,
        image: "./img/canon/R50/R50.png",
        title: "Canon R50",
        price: 32554,
        type: "canon",
        quantity: 100
    },
    {
        id: 9,
        image: "./img/canon/R100/R100.png",
        title: "Canon R100",
        price: 4325220,
        type: "canon",
        quantity: 100
    },
    {
        id: 10,
        image: "./img/canon/SX740-HS/SX740-HS.png",
        title: "Canon SX740-HS",
        price: 540030,
        type: "canon",
        quantity: 100
    }
];

const categories = [...new Set(product.map((item) => { return item; }))];
let i = 1;
var cartIcon = './img/carticon.png';

document.getElementById("product-group").innerHTML = product
    .map((item) => {
        var { id, image, title, price } = item;
        return (
            `<div id="product" class""><a href="product.html" class="productLink">
        <img class="productImg" src=${image} alt=""></a>
        <label class="productName" for="">${title}</label>
        <p class="productPrice">VND ${price}</p>` +
            `<button class='addCart' onclick='displayBuyBox(${id})'>
        <img src = "img/carticon.png" alt='cartIcon'> 
        <p class='muahang' > Mua hàng</p>
        </button > </div>`
        );
    }).join("");

document.getElementById("buyBox").innerHTML = categories
    .map((item) => {
        var { id, image, title, price } = item;
        return (
            `<div class="notiBox-${id}" id="notiBox" style="display: none;">
                <div class="backgroundNoti"></div>
                <div class="littleBox">
                <button class="exitBtn" id="exitBtn" onclick="this.parentElement.parentElement.style.display='none'">X</button>
                <div class="firstInfo">
                    <div class="imgAndInfo">
                    <img src="${image}" alt="" class="imgInLittleBox">
                    <div class="productInfo">
                        <h2>${title}</h2>
                        <p>VND ${price}</p>
                    </div>
                    </div>
                    <div class="amountproduct">
                    <button class="addToCart" onclick='addtocart(${id})')'>+</button>
                    <p id='displayCount-${id}'>0</p>
                    <button class="delToCart" onclick='delElement(${id})'>-</button>
                    </div>
                </div>
                <div class="eventGift">
                    <h2><img class="giftIcon" src="img/giftbox.png" alt="">Chương trình khuyến mãi</h2>
                    <p class="eventDes">Tặng thẻ nhớ 64GB</p>
                </div>
                <div class="lastInfo">
                    <div class="countBox">
                    <h2 class="priceTemp">Tạm tính: <strong class='displayPrice'>0</strong></h2>
                    </div>
                    <button class="buyBtn"><a href="cart_detail.html"> Xác nhận mua</a></button>
                </div>
            </div>
            </div>`
        );
    }).join("");
//Cart
var cart = [];

function addtocart(id) {
    const selectedProduct = product.find(item => item.id === id);
    const existingItem = cart.find(item => item.id === selectedProduct.id);

    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        selectedProduct.quantity = 1;
        cart.push(selectedProduct);
    }

    let priceTotal = existingItem.price * existingItem.quantity;
    document.getElementsByClassName("displayPrice").innerHTML = priceTotal;

    document.getElementById(`displayCount-${id}`).innerHTML = existingItem ? existingItem.quantity : 1;
    displaycart();
}

function delElement(id) {
    const existingItem = cart.find(item => item.id === id);
    if (existingItem) {
        existingItem.quantity -= 1;
        if (existingItem.quantity <= 0) {
            cart = cart.filter(item => item.id !== id);
        }
    }

    let priceTotal = existingItem.price * existingItem.quantity;
    document.getElementsByClassName("displayPrice").innerHTML = priceTotal;

    document.getElementById(`displayCount-${id}`).innerHTML = existingItem ? existingItem.quantity : 0;
    displaycart();
}

function displaycart() {
    let totalQuantity = 0;
    let priceTotal = 0;

    cart.forEach(item => {
        totalQuantity += item.quantity;
        priceTotal += item.price * item.quantity; // Calculate total price
    });

    document.getElementById("count").innerHTML = totalQuantity;

    const priceElements = document.getElementsByClassName("displayPrice");
    for (let i = 0; i < priceElements.length; i++) {
        priceElements[i].innerHTML = `VND ${priceTotal}`; // Update each element
    }
}

var target
function displayBuyBox(id) {
    target = document.getElementsByClassName(`notiBox-${id}`);
    if (target) {
        target[0].style.display = "block";
    }
}