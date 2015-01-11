var points = 0;
var gold = 0;
var oxygen = 3;
var compoxygen = 0;
var amount = 0;

$(document).ready(function(){
	$("#Oxygen").html("Oxygen: " + oxygen);
	$("#Orange").click(function () {
		if (oxygen > 0)
		{
			var cnt;
			$("#Orange").toggle();
			cnt = Math.floor((Math.random() * 100) + 1)
			jQuery('#Log5').html('');
			$("#Log4").contents().prependTo('#Log5');
			$("#Log3").contents().prependTo('#Log4');
			$("#Log2").contents().prependTo('#Log3');
			$("#Log1").contents().prependTo('#Log2');
			randomMoonItem(cnt);
			$("#Points").html("Points: " + points);
			$("#Gold").html("Gold: " + gold);
			$("#Oxygen").html("Oxygen: " + oxygen);
			$("#Result").delay(3000).fadeOut();
			waitTimer();
		}
		else
		{ $("#Message").html("Out of oxygen!"); }
	});
	
	$("#PurchaseOxygen").click(function () { 
     amount = $("#regOxygen").val();
	 if (amount == 0)
	 {
		$("#StoreLog").html("You need to select an amount of Oxygen to buy!");
	 }
	 else
	 {
		 $("#StoreLog").html("You purchased " + amount + " Oxygen.");
		 oxygen=parseInt(amount,10) + parseInt(oxygen,10);
		 $("#Oxygen").html("Oxygen: " + oxygen);
		 //Oxygen costs gold!
		 gold=parseInt(gold,10) - parseInt(amount,10)*20
		 $("#Gold").html("Gold: " + gold);
	 }
	});
	
	$("#PurchaseCompressedOxygen").click(function () { 
     amount = $("#compressedOxygen").val();
	 if (amount == 0)
	 {$("#StoreLog").html("You need to select an amount of Compressed Oxygen to buy!");}
	 else
	 {
		 $("#StoreLog").html("You purchased " + amount + " compressed Oxygen.");
		 compoxygen=parseInt(amount,10) + parseInt(compoxygen,10);
		 $("#compOxygen").html("Compressed Oxygen: " + compoxygen);
		  //Oxygen costs gold!
		 gold=parseInt(gold,10) - parseInt(amount,10)*300
		 $("#Gold").html("Gold: " + gold);

	 }
	});
});

function randomMoonItem(cnt) {
    if (cnt >= 0 && cnt <= 20) {
        $('#Log1').html(moonFTA.log);
		points += 15;
    } else if (cnt >= 21 && cnt <= 50) {
        $('#Log1').html(moonFTF.log);
        points += 20;
		oxygen = oxygen-1;
    } else if (cnt >= 51 && cnt <= 80) {
        $('#Log1').html(moonRock.log);
        points += 25;
        gold += 15;
		oxygen = oxygen-1;
    } else {
        $('#Log1').html(moonStone.log);
        points += 75;
        gold += 105;
		oxygen = oxygen-1;
    }
}

function waitTimer () 
{
    var interval,
        initialMinutes = 0,
        initialSeconds = 4,
        minutes = initialMinutes,
        seconds = initialSeconds;

    countdown('countdown').done(function(){
        $("#Orange").toggle('showOrHide');
	});

    function countdown(element) {
        var dfd = $.Deferred();
        interval = setInterval(function () {
            var el = document.getElementById(element);
            if (seconds == 0) {
                if (minutes == 0) {
                    el.innerHTML = "Venture Ready!";
                    dfd.resolve();
                    clearInterval(interval);

                    return;
                } else {
                    minutes--;
                    seconds = 60;
                }
            }
            if (minutes > 0) {
                var minute_text = minutes + (minutes > 1 ? ' minutes' : ' minute');
            } else {
                var minute_text = '';
            }
            var second_text = seconds > 1 ? 'seconds' : 'second';
            el.innerHTML = minute_text + ' ' + seconds + ' ' + second_text + ' remaining';
            seconds--;
        }, 1000);
        return dfd.promise();
    }
}

function openLink(value)
{window.open(value,"_self")}

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