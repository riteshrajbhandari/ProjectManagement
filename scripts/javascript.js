// function myFunction() {
//     var x = document.getElementById("myDIV");
//     if (x.style.display === "none") {
//         x.style.display = "block";
//     } else {
//         x.style.display = "none";
//     }
// }

var className = "";
function showBlock(className) {
    var x = document.getElementsByClassName(className);
    document.getElementsByClassName("myprofile").style.display = "none";
    document.getElementsByClassName("myorders").style.display = "none";
    document.getElementsByClassName("contactinfo").style.display = "none";
    document.getElementsByClassName("changepass").style.display = "none";
    document.getElementsByClassName("paymentinfo").style.display = "none";
    document.getElementsByClassName("wishlist").style.display = "none";
    x.style.display = "block";

}