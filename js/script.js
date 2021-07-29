let btn = document.getElementById('btn_open1');
btn.onclick = function(){
    let a = confirm("Вы уверены?");
    if(a){
        close();
    }else{
        close();
    }
}