var clock = document.getElementById('clock');
function clockk() {
    var time = new Date();
    var h = (time.getHours()).toString();
    var n = time.getMinutes().toString();
    var s = time.getSeconds().toString();

    if(h.length <2){
        h = '0' + h;
    }
    if(n.length <2){
        n = '0' + n;
    }
    if(s.length <2){
        s = '0' + s;
    }

    var clockString = h + ":" + n + ":" + s;

    clock.textContent = clockString;
}
clockk();
setInterval(clockk, 1000);

