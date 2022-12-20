req1 = new XMLHttpRequest();
let data = [];
req1.onreadystatechange = function () {
  data = req1.response;
};
req1.open("GET", "../app/Models/data.php", true);
req1.responseType = "json";
req1.send();

var total = 0;
var count = 0;
var result1;
function buy(i) {
  $.post("../app/Models/buy.php", { id: i }, function (result) {
    result1 = result;
    if (result1 == "done") {
      var x = document.getElementById("bill");
      var d = document.createElement("div");
      d.innerHTML =
        `<img src="../app/Views/` +
        data[i-1].img +
        `" style="width: 90px; margin:10px; border-radius: 10%;">` +
        data[i-1].name +
        " | price: " +
        data[i-1].price +
        "$"+"<i class='fa-solid fa-trash fs-6 me-3' onclick='deleting("+i+")'></i>";
      d.setAttribute("id", "id"+i);
      x.appendChild(d);
      total += parseInt(data[i-1].price);
      count++;
      var t = document.getElementById("total");
      t.innerText = total + "$";
      var t0 = document.getElementById("total0");
      t0.innerText = total + "$";
      var n = document.getElementById("cart_number");
      n.innerHTML = count;
    } else if (result1 == "not enough qtyy") {
      alert(result1);
    }
  });
}

function deleting(i){
    $.post("../app/Models/del.php", { id: i }, function (result) {
    if (result == "done") {
       var tostr = i.toString();
       var str = "id"+tostr;
       var element = document.getElementById(str);
       element.remove();
       total -= parseInt(data[i - 1].price);
       count--;
       var t = document.getElementById("total");
       t.innerText = total + "$";
       var t0 = document.getElementById("total0");
       t0.innerText = total + "$";
       var n = document.getElementById("cart_number");
       n.innerHTML = count;
    }
   });
 }
 
 function toggle() {
   var b = document.querySelector(".cnt");
   b.style.display = "flex";
   var c = document.querySelector("#icon0");
   c.style.display = "grid";
   var d = document.querySelector("#icon");
   d.style.display = "none";
 }
 function toggle0() {
   var b = document.querySelector(".cnt");
   b.style.display = "none";
   var c = document.querySelector("#icon0");
   c.style.display = "none";
   var d = document.querySelector("#icon");
   d.style.display = "grid";
 }
 function order() {
   if(total>0){
     alert(" Thank you for buying from us \n your order is confirmed");
     window.location.reload();
   }else{
     alert(" You didn't buy anything\n buy something before confirming");
   }
 }
 function display(){
  var b = document.querySelector(".bascket"); 
  b.style.display = "flex";
  var c = document.querySelector("#bascket");
  c.style.display = "none";
}
function display0(){
  var b = document.querySelector(".bascket"); 
  b.style.display = "none";
  var c = document.querySelector("#bascket");
  c.style.display = "grid";
}

// to get current year
function getYear() {
    var currentDate = new Date();
    var currentYear = currentDate.getFullYear();
    document.querySelector("#displayYear").innerHTML = currentYear;
}

getYear();


/** google_map js **/

function myMap() {
    var mapProp = {
        center: new google.maps.LatLng(40.712775, -74.005973),
        zoom: 18,
    };
    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
}
