const hourEl = document.getElementById('hour');
const minuteEl = document.getElementById('minute');
const secondEl = document.getElementById('second');
const pmamEl = document.getElementById('pmam');

function updateClock(){
    let h = new Date().getHours();
    let m = new Date().getMinutes();
    let s = new Date().getSeconds();
    let pmam = 'AM';

    if(h>12){
        h = h-12;
        pmam = 'PM'
    }

    h = h <10 ? '0'+h:h;
    m = m <10 ? '0'+m:m;
    s = s <10 ? '0'+s:s;

    hourEl.innerText = h;
    minuteEl.innerText = m;
    secondEl.innerText = s;
    pmamEl.innerText = pmam;

    setInterval(()=>{updateClock()},1000)
}

updateClock();