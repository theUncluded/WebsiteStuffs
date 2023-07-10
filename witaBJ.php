<!DOCTYPE html>
<html>
<link rel="stylesheet" href="witaStyle.css">
<?php error_reporting(E_ERROR | E_PARSE); 
session_start(); 
?>
<body>
<button id="home" style="background-color: black;
position:absolute; top:0; left:0;
color: white;
text-align: left;
font-variant: small-caps;
    ">Home</button>
    
<img src="bj dealer.png" alt="DEALER" width="500" height="500">

<p>Credits: <span id="credits">100</span></p>
<button id="dealBut">Deal!</button>
<button id="hitBut">Hit!</button>
<button id="standBut">Stand!</button>
<button id="cashOut"> CASH OUT END GAME </button>

<select id="betAmount">
     <option value="1">1</option>
     <option value="5">5</option>
     <option value="10">10</option>
     <option value="25">25</option>
     <option value="50">50</option>
     <option value="100">100</option>
</select>
<br>
<p>Your Card Sum: </p>
<p id="uSum"></p>
<p id="result"></p>
<br>
<p>Dealer's Hand</p>
<p id="dH"></p>
</body>

<script>
document.getElementById("home").addEventListener("click",function(){
location.href = "/";
});

window.onload = function(){
// Initialize variables
let totalCredits = 100;

// Function to update the credits display
function updateCredits() {
  document.getElementById("credits").textContent = totalCredits;
}

// Event listener for the "Deal" button
document.getElementById("dealBut").addEventListener("click", function() {

    document.getElementById("result").innerHTML = "";
    
    const betAmount = parseInt(document.getElementById("betAmount").value, 10);
  
    if (betAmount > totalCredits) {
    alert("Insufficient credits.");
    return;
  }
    // Reduce credits when dealing
    totalCredits -= betAmount;
    updateCredits();



  let x = Math.floor(Math.random() * 13) + 2;
   //logic for increased chances of getting +10 to hand for dealer 12,13 and 14 are jack queen king
   if(x==12 || x==13 || x==14)
            x=10;

  let y = Math.floor(Math.random() * 13) + 2;
   //logic for increased chances of getting +10 to hand for dealer 12,13 and 14 are jack queen king
   if(y==12 || y==13 || y==14)
            y=10;


  if(y==11 && x==11){
    y=2;
  }

  //logic for dealing the cards
    let uSum = x+y;
    
    document.getElementById("uSum").innerHTML = uSum;

    //dealer logic
    let r = Math.floor(Math.random() * 13) + 2;
     //logic for increased chances of getting +10 to hand for dealer 12,13 and 14 are jack queen king
     if(r==12 || r==13 || r==14) {
            r=10;
    }

    let j = Math.floor(Math.random() * 13) + 2;
     //logic for increased chances of getting +10 to hand for dealer 12,13 and 14 are jack queen king
     if(j==12 || j==13 || j==14){
            j=10;
     }

    if(r==11 && j==11){
        j=1;
    }
    let DealerSum = r+j;

    

    document.getElementById("dH").innerHTML = DealerSum;

});

// Event listener for the "Hit" button
document.getElementById("hitBut").addEventListener("click", function() {
  //logic for drawing another card
    var z = Math.floor(Math.random() * 13) + 2;

     //logic for increased chances of getting +10 to hand for dealer 12,13 and 14 are jack queen king
     if(z==12 || z==13 || z==14)
            z=10;


    let uSum = parseInt(document.getElementById("uSum").innerHTML, 10);

    if(z==11 && uSum+z >21){
        z=1;
    }

    let newSum = uSum +z;
    
    document.getElementById("uSum").innerHTML = newSum;

    if(newSum >= 22){
        document.getElementById("result").innerHTML = "YOU LOSE";
    }

});

// Event listener for the "Stand" button
document.getElementById("standBut").addEventListener("click", function() {
    totalCredits = parseInt(document.getElementById("credits").innerHTML, 10);
    let betAmount = parseInt(document.getElementById("betAmount").value, 10);

    // Get the dealer's current hand value
    let dealerHand = document.getElementById("dH").innerHTML;
    let DealerSum = parseInt(dealerHand, 10);

    // Calculate the actual dealer's hand value
    let dealerCards = dealerHand.split(", ");
    DealerSum = 0;
    let hasAce = false;
    for (let i = 0; i < dealerCards.length; i++) {
        let cardValue = parseInt(dealerCards[i], 10);
        if (cardValue === 1 && DealerSum + 11 <= 21) {
            cardValue = 11; // Consider an Ace as 11 if it won't bust
            hasAce = true;
        }
        DealerSum += cardValue;
    }

    // Calculate your current hand value
    let uSum = parseInt(document.getElementById("uSum").innerHTML, 10);

    // Function to check if the dealer should hit or stand
    function shouldDealerHit() {
        return DealerSum < 17;
    }

    // logic for ending the round
    document.getElementById("dH").innerHTML = dealerHand;

    // Dealer hits until hand value is 17 or greater
    while (shouldDealerHit()) {
        let card = Math.floor(Math.random() * 13) + 2;
        //logic for increased chances of getting +10 to hand for dealer 12,13 and 14 are jack queen king
        if(card==12 || card==13 || card==14)
            card=10;

        dealerHand += ", " + card;
        if (card === 11 && DealerSum + 11 <= 21) {
            card = 11; // Consider an Ace as 11 if it won't bust
            hasAce = true;
        }
        DealerSum += card;
    }

    // Update the dealer's hand value on the page
    document.getElementById("dH").innerHTML = dealerHand;

    if (DealerSum > 21) {
        // Dealer busted, you win
        document.getElementById("result").innerHTML = "YOU WIN";
        totalCredits += betAmount * 2;
    } else if (uSum > 21) {
        // You busted, you lose
        document.getElementById("result").innerHTML = "YOU LOSE";
    } else if (DealerSum > uSum) {
        // Dealer has a higher hand value, you lose
        document.getElementById("result").innerHTML = "YOU LOSE";
    } else if (DealerSum === uSum) {
        // It's a tie
        document.getElementById("result").innerHTML = "PUSH";
        totalCredits += betAmount; // Return the bet amount
    } else {
        // You have a higher hand value, you win
        document.getElementById("result").innerHTML = "YOU WIN";
        totalCredits += betAmount * 2;
    }

    document.getElementById("credits").textContent = totalCredits;
});

//High Score Logic Button
document.getElementById("cashOut").addEventListener("click", function() {
"<?php 

?>"
});

// Initial credits update
updateCredits();
}
</script>
</html>