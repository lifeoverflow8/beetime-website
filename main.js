/*global $*/

function setTime() {
    var date = new Date();
    var hours;
    var minutes;
    var seconds;
    var amPm;
    
    if (date.getHours() > 12) {
        hours = date.getHours() - 12;
        amPm = 'PM';
    }
    else {
        hours = date.getHours();
        
        if (hours == 12) {
            amPm = 'PM';
        }
        else {
            amPm = 'AM';
        }
    }
    
    minutes = date.getMinutes();
    seconds = date.getSeconds();
    
    if (minutes < 10) {
        minutes = '0' + minutes;
    }
    if (seconds < 10) {
        seconds = '0' + seconds;
    }
    
    $('#time').get(0).innerHTML = hours + ":" + minutes + ":" + seconds + ' ' + amPm;
}

window.setInterval(function() {
    setTime();
}, 1000 / 60);