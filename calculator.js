var so=document.getElementsByClassName("so");
var dongpheptinh=document.getElementById("pheptinh");
var ketqua=document.getElementById("ketqua");

for(var i=0;i<so.length;i++){
    so[i].addEventListener("click",function(){
        var soduocclick=this.textContent;
        dongpheptinh.innerHTML+=soduocclick;
    })
}
// dinh nghia cho nut CE
var ce=document.getElementById("CE-btn");
ce.addEventListener("click",function(){
    dongpheptinh.textContent='';
    ketqua.textContent='';
})
// dinh nghia cho nut DEL
var del=document.getElementById("Del-btn");
del.addEventListener("click",function(){
    var currentDongpheptinh= dongpheptinh.textContent;
    dongpheptinh.textContent=currentDongpheptinh.slice(0,-1);
    ketqua.textContent='';
})
// dinh nghia hien thi cho day phay
var dauphay=document.getElementById("dauphay");
dauphay.addEventListener("click",function(){
    dongpheptinh.textContent+=".";
})
// dinh nghia hien thi cac dau phep tinh
var dau=document.getElementsByClassName("daupheptinh");
for (var i=0;i<dau.length;i++){
    dau[i].addEventListener("click",function(){
        var dauduocclick=this.textContent;
        dongpheptinh.textContent+=dauduocclick;
    })
}
// dinh nghia cho dau bang
var daubang=document.getElementById("daubang");
daubang.addEventListener("click",function(){
    if(!/\d/.test(dongpheptinh.textContent) || /\D{2}/.test(dongpheptinh.textContent)){
        dongpheptinh.textContent="Error";
        setTimeout(function(){
            dongpheptinh.textContent = '';
        },400);
    }
    else{
        var pheptinh=dongpheptinh.textContent;
        var result=math.evaluate(pheptinh);
        ketqua.textContent=Math.round(result * 10000000000) / 10000000000;
    }
});