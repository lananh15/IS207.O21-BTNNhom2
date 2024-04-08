let so=document.getElementsByClassName("so");
let dongpheptinh=document.getElementById("pheptinh");
let ketqua=document.getElementById("ketqua");
function checkResultAndDisplay(x){
    if(ketqua.textContent!=''){
        dongpheptinh.textContent='';
        ketqua.textContent='';
        dongpheptinh.textContent+=x;      
    }
    else{
        dongpheptinh.textContent+=x;
    }
}
// dinh nghia cho nut so
for(let i=0;i<so.length;i++){
    so[i].addEventListener("click",function(){
        let soduocclick=this.textContent;
        checkResultAndDisplay(soduocclick);
    })
}
// dinh nghia cho nut CE
const ce=document.getElementById("CE-btn");
ce.addEventListener("click",function(){
    dongpheptinh.textContent='';
    ketqua.textContent='';
})
// dinh nghia cho nut DEL
const del=document.getElementById("Del-btn");
del.addEventListener("click",function(){
    let currentDongpheptinh= dongpheptinh.textContent;
    dongpheptinh.textContent=currentDongpheptinh.slice(0,-1);
    ketqua.textContent='';
})
// dinh nghia hien thi cho day phay
const dauphay=document.getElementById("dauphay");
dauphay.addEventListener("click",function(){
    let x=".";
    checkResultAndDisplay(x);
})
// dinh nghia hien thi cac dau phep tinh
let dau=document.getElementsByClassName("daupheptinh");
for (let i=0;i<dau.length;i++){
    dau[i].addEventListener("click",function(){
        let dauduocclick=this.textContent;
        checkResultAndDisplay(dauduocclick);
    })
}
// dinh nghia cho dau bang
const daubang=document.getElementById("daubang");
daubang.addEventListener("click",function(){
    // neu phep tinh ko co chu so nao hoac co chua 2 dau phep tinh ke nhau thi bao loi
    let a=dongpheptinh.textContent;
    if(!/\d/.test(a) || /\D{2}/.test(a) || a.includes("/0")){
        dongpheptinh.textContent="Error";
        setTimeout(function(){
            dongpheptinh.textContent = '';
        },400);
    }
    let pheptinh=dongpheptinh.textContent;
    let result=math.evaluate(pheptinh);
    let x=Math.round(result* 10000000000) / 10000000000;
    ketqua.textContent=x;
});
