let cart = [];

function openPopup() {
  document.getElementById("popup").style.display = "block";
}
function closePopup() {
  document.getElementById("popup").style.display = "none";
}

function openCart() {
  document.getElementById("cart").style.display = "block";
}
function closeCart() {
  document.getElementById("cart").style.display = "none";
}

function addToCart(item) {
  cart.push(item);
  renderCart();
}

function renderCart() {
  let list = document.getElementById("cartItems");
  list.innerHTML = "";
  cart.forEach(i => {
    let li = document.createElement("li");
    li.textContent = i;
    list.appendChild(li);
  });
}
let loggedIn = false;

// LOGIN
function openLogin() {
  document.getElementById("loginPopup").style.display = "block";
}
function closeLogin() {
  document.getElementById("loginPopup").style.display = "none";
}
function loginUser() {
  let u = document.getElementById("username").value;
  let p = document.getElementById("password").value;

  if (u && p) {
    loggedIn = true;
    alert("Login successful!");
    closeLogin();
  } else {
    alert("Enter details");
  }
}

// ADDRESS
function openAddress() {
  if (!loggedIn) {
    openLogin();
  } else {
    document.getElementById("addressPopup").style.display = "block";
  }
}
function closeAddress() {
  document.getElementById("addressPopup").style.display = "none";
}

// CONFIRM ORDER
function confirmOrder() {
  let name = document.getElementById("name").value;
  let phone = document.getElementById("phone").value;
  let addr = document.getElementById("address").value;

  if (name && phone && addr) {
    alert("🎉 Order Confirmed!\nThanks " + name);
    cart = [];
    renderCart();
    closeAddress();
    closeCart();
  } else {
    alert("Please fill all fields");
  }
}
