// window.addEventListener("load", function () 
// {
//     document.getElementById("search").addEventListener("keyup", () => 
//     {
//         if (document.getElementById("search").value.length >= 1)
//         {
//             fetch(`/sell/search/${document.getElementById("search").value}`,{ method: "get" } )
//                 .then((response) => response.text())
//                 .then((html) => {
//                     document.getElementById("result").innerHTML = html;
//                 });
//         }
//         else 
//         {
//             document.getElementById("result").innerHTML = "";
//         }
//     });
// });