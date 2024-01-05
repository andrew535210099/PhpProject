function satu(){
    console.log("Satu")
}
function dua(){
    console.log("function 2 mau di eksekusi");
    setTimeout(() =>{
        console.log("Dua")
    }, 3000)
}
function tiga(){
    console.log("Tiga")
}

satu()
dua()
tiga()