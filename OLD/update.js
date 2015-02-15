function updateVenture() {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var response_arr = xmlhttp.responseText.split("{{}}");
            document.getElementById("ventures").innerHTML = response_arr[0];
            document.getElementById("points").innerHTML = response_arr[1];
            document.getElementById("gold").innerHTML = response_arr[2];
        }
    }
    xmlhttp.open("GET", "update.php", true)
    xmlhttp.send();
}

function randomMoonItem() {
    var cnt;
    cnt = Math.floor((Math.random() * 100) + 1);
    if (cnt >= 0 && cnt <= 20) {
        increasePoints = moonFTA.pointWorth;
        increaseGold = moonFTA.goldWorth;
    }
    else if (cnt >= 21 && cnt <= 50) {
        increasePoints = moonFTF.pointWorth;
        increaseGold = moonFTF.goldWorth;
    } else if (cnt >= 51 && cnt <= 80) {
        increasePoints = moonRock.pointWorth;
        increaseGold = moonRock.goldWorth;
    } else {
        increasePoints = moonStone.pointWorth;
        increaseGold = moonStone.goldWorth;
    }
    var array = [increasePoints,increaseGold];
    return array;
}

function moonItem(name,goldWorth,pointWorth,log)
{
    this.name=name;
    this.goldWorth=goldWorth;
    this.pointWorth=pointWorth;
    this.log=log;
}

moonRock = new moonItem("moon rock",25,15,"You found a plain moon rock worth 25 points and 15 gold.");
moonStone = new moonItem("moon stone",105,75,"You found a rare moon stone worth 75 points and 105 gold!");
moonFTA = new moonItem("moonFTA",0,15,"You found nothing. At least you get 15 points and you made it back safely with your tank of oxygen!");
moonFTF = new moonItem("moonFTF",0,20,"You started running out of Oxygen and had to return before finding anything. At least you get 20 points.");