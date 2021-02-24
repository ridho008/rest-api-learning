// let mahasiswa = {
//    nama : "Ridho Surya",
//    nrp : "23987234",
//    email : "Surya@gmail.com"
// }

// Object menjadi JSON
// console.log(JSON.stringify(mahasiswa));

// Mengubah JSON menjadi Object
// let xhr = new XMLHttpRequest();
// xhr.onreadystatechange = function() {
//    if(xhr.readyState == 4 && xhr.status == 200) {
//       let mahasiswa = JSON.parse(this.responseText);
//       console.log(mahasiswa);
//    }
// }
// xhr.open('GET', 'coba.js', true);
// xhr.send();

$.getJSON('coba.json', function(data) {
   console.log(data);
})