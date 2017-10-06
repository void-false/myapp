var createdTime, clickedTime;

function makeBox() {
    setTimeout(function() {
        var myBox = document.getElementById("box");
        var r, g, b;
        r = Math.floor(Math.random() * 255);
        g = Math.floor(Math.random() * 255);
        b = Math.floor(Math.random() * 255);
        
        myBox.style.backgroundColor = 'rgb(' + r + ',' + g + ',' + b + ')';
        myBox.style.top = Math.random() * 480 + "px";
        myBox.style.left = Math.random() * 640 + "px";
        Math.random() < 0.5 ? myBox.style.borderRadius="100px" : myBox.style.borderRadius="0";
        myBox.style.visibility="visible";
        createdTime = Date.now();
    }, Math.random()*1000);
}


document.getElementById("box").onclick=function() {
    this.style.visibility="hidden";
    clickedTime = Date.now();
    
    document.getElementById("result").innerHTML = (clickedTime-createdTime + "ms");
    
    makeBox();
}

makeBox();