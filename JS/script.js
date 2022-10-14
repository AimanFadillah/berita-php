// ambil elemen elemen yang dibutuhkan
var keyword = document.getElementById('keyword');
var cari = document.getElementById('cari');
var container = document.getElementById('komentar');

// tambahkan event pada keyword
keyword.addEventListener('keyup',function () {
  
// buat objeck ajak
var xhr = new XMLHttpRequest();

// Cek kesiapan ajak
xhr.onreadystatechange = function () {
    if(xhr.readyState == 4 && xhr.status == 200) {
        container.innerHTML = xhr.responseText;
    }
}

// eksekusi ajak
xhr.open('GET','ajax/komentar.php?keyword=' + keyword.value,true);
xhr.send();

}  );