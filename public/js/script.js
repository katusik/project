var time = setInterval(function () {
    var date = new Date();
    document.getElementById("time").innerHTML = (date.getHours() + ":" + date.getMinutes());
}, 1000);
