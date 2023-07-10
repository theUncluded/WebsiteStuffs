<!DOCTYPE html>
<html>
<link rel="stylesheet" href="witaStyle.css">
<button id="home" style="background-color: black;
position:absolute; top:0; left:0;
color: white;
text-align: left;
font-variant: small-caps;
    ">Home</button>
<body>
<img src="HoL Dealer.png" alt="DEALER" width="500" height="500"><br>
<img id="card" src="" width="200" height="300" alt="card"/>
<p>Current Card: <span id="curCard"></span></p>
<p>Credits: </p>
<p><span id="pCred">5</span></p><br>
<button id="Lower">Lower</button>
<button id="Higher">Higher</button>
<p id="result"></p>
<script>
//home button to redirect home
document.getElementById("home").addEventListener("click",function(){
location.href = "/";
});
    // global vars
    let result = true; 
    let pCred = 5;

    // credit updater from bj
    function updateCredits() {
        document.getElementById("pCred").textContent = pCred;
    }

    function resultDisplay(x) {
        let result = document.getElementById("result");
        if (x == true) {
            result.innerHTML = "SUCCESS!";
        } else {
            result.innerHTML = "FAILURE";
        }
    }

    // math round/floor func just made easier to call
    function pullCard() {
       return Math.floor(Math.random() * 13) + 2;
    }

    // displays and "pulls" card from deck
    function displayCard(z) {
        let card = document.getElementById("card");
        let curCard = document.getElementById("curCard");
        let pulledCard = z;
        let cardMap = {
            2: "2.png",
            3: "3.png",
            4: "4.png",
            5: "5.png",
            6: "6.png",
            7: "7.png",
            8: "8.png",
            9: "9.png",
            10: "10.png",
            11: "jack.png",
            12: "queen.png",
            13: "king.png",
            14: "ace.png"
        };
        card.src = cardMap[pulledCard];
        curCard.innerHTML = pulledCard;
    }

    document.getElementById("Lower").addEventListener("click", function() { 
        let newCard = pullCard();
        if (newCard > curCard.innerHTML) {
            result = false; 
            pCred--;
        } else {
            result = true; 
            pCred++;
        }
        resultDisplay(result);
        updateCredits();
        displayCard(newCard);
    });

    document.getElementById("Higher").addEventListener("click", function() { 
        let newCard = pullCard();
        if (newCard < curCard.innerHTML) {
            result = false; 
            pCred--;
        } else {
            result = true; 
            pCred++;
        }
        resultDisplay(result);
        updateCredits();
        displayCard(newCard);
    });

    // Initial card display
    displayCard(pullCard());
    updateCredits();
</script>
</body>
</html>
