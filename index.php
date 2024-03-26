<html>
  <head>
    <title>Tarot Deck</title>
    <style>
      @import url('https://fonts.googleapis.com/css?family=UnifrakturCook:700|Open+Sans:300&display=swap');

      :root {
        --p-color: rgb(237, 174, 315);
        --h1-color: rgb(237, 174, 315);
        --header-color: rgba(68, 51, 106, 0.8);
        --container-color: rgba(75, 3, 101, 0.8);
        --nav-color: rgb(130, 54, 90);
        --nav-hover-color: rgb(72, 8, 38);
        --nav-hover-link-color: white;
        --band-border: rgb(39, 89, 128);
        --album-border: rgb(22, 69, 105);
      }

      body {
        background: url("purplebg.jpeg");
        padding: 0px;
        margin: 0px;
        margin-bottom: 50px;
      }

      img {
        height: 400px;
        width: 250px;
        object-fit: cover;
        border-radius: 10px;
        display: block;
        margin-left: auto;
        margin-right: auto;
      }

      h1 {
        text-align: center;
        font-family: "UnifrakturCook";
        font-size: 72px;
        background-color: var(--header-color);
        padding-top: 50px;
        padding-bottom: 50px;
        margin-top: 0px;
        margin-bottom: 0px;
        color: var(--h1-color);
      }

      /***** FLEX BOX *****/

      .container {
        display: flex;
        background-color: var(--container-color);
        padding: 30px;
        margin-bottom: 0px;
        margin-top: 0px;
        justify-content: center;
      }

      .column {
        flex: 1;
      }

      #imagesGal {
        margin-bottom: 80px;
      }

      .myButton {
        background-color:#ce91ff;
        border-radius:8px;
        border:1px solid #c584f3;
        display:inline-block;
        cursor:pointer;
        color:#ffffff;
        font-family:Arial;
        font-size:17px;
        padding:16px 31px;
        text-decoration:none;
        text-shadow:0px 1px 0px #9752cc;
        display: block;
        margin-left: auto;
        margin-right: auto;
      }
      .myButton:hover {
        background-color:#bc80ea;
      }
      .myButton:active {
        position:relative;
        top:1px;
      }


    </style>
  </head>
  <body>
    <h1>Tarot Cards</h1>
    <div id="imagesgal"></div>
    <button class="myButton" onclick="throwCards()">Throw Cards</button>

  
    <?php
      $images = glob("images/*.{jpg,jpeg,JPG,JPEG,gif,GIF,png,PNG}",GLOB_BRACE);
      $imgs = array();
      foreach($images as $image){ $imgs[] = $image; }
    ?>
    
    <script>
      var allImages = JSON.parse('<?php echo json_encode($imgs);?>');
      console.log(allImages);


      function pickThree() {
        var threeCards = [];
        var imagesCopy = allImages.slice();
        var randIndex = Math.floor(Math.random()*imagesCopy.length);
        threeCards.push(imagesCopy[randIndex]);
        imagesCopy.splice(randIndex, 1);
        randIndex = Math.floor(Math.random()*imagesCopy.length);
        threeCards.push(imagesCopy[randIndex]);
        imagesCopy.splice(randIndex, 1);
        randIndex = Math.floor(Math.random()*imagesCopy.length);
        threeCards.push(imagesCopy[randIndex]);
        return threeCards;
      }

      function throwCards() {
        var cards = pickThree();
        var str = "<div class='container'>";
        for (var i = 0; i < cards.length; i++) {
          str += "<div class='column'><img src='" + cards[i] + "'></div>";
        }
        str += "</div>";
        document.getElementById("imagesgal").innerHTML = str;
      }

    </script>
  </body>
 
</html>