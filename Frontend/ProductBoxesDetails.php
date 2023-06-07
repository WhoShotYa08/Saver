<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Product Boxes</title>
</head>
<style>
.button {
  background-color: orange;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
<body>
  <div class="ProductContainer">
  </div>

  <script>
    const resultsData = localStorage.getItem("Results");
    const Results = JSON.parse(resultsData);

    const container = document.querySelector(".ProductContainer");
    Results.forEach(item => {
      const box = document.createElement("div");
      box.classList.add("ProductBox");
      box.style.width = "350px";
      box.style.height = "260px";
      box.style.border = "2px solid white";
      box.style.borderRadius = "20px";
      box.style.boxShadow = "0 0 10px rgba(0, 0, 0, 0.2)";
      box.style.paddingLeft = "10px";
      box.style.display = "inline-block"; 
      box.style.marginRight = "20px";

      const imgElement = document.createElement("img");
      imgElement.src = item["image"];
      imgElement.style.width = "150px";
      imgElement.style.height = "150px";
      box.appendChild(imgElement);

      const detailsList = document.createElement("ul"); 
      let counter = 0;
      for (const key in item) {
        if (key !== "image") {
          const value = item[key];
          const listItem = document.createElement("li");
          listItem.textContent = `${key}: ${value} `;
          detailsList.appendChild(listItem);
          
          counter++;
          if (counter === 3) {
            break; // Exit the loop after the third iteration
          }
        }
      }

      box.appendChild(detailsList); 
      const plusButton = document.createElement("button");
      plusButton.textContent = "+";
      plusButton.style.fontWeight = "bold";
      plusButton.style.fontSize = "20px";
      box.appendChild(plusButton);

      const thirdItem = item[Object.keys(item)[2]];

      let count = 0;
      plusButton.addEventListener("click", () => {
        count++;
        const newValue = thirdItem * count;

        item[Object.keys(item)[2]] = newValue;

        const listItems = detailsList.getElementsByTagName("li");
        listItems[2].textContent = `${Object.keys(item)[2]}: ${newValue}`;
        console.log(count);
        
      });

      container.appendChild(box);
    });

    const shopDirectionsButton = document.getElementById("shopDirectionsButton");
    shopDirectionsButton.addEventListener("click", () => {
      window.location.href = "location.php";
    });
  </script>


<div class="buttons">
  <a href="location.php">
  <button class="button" id="shopDirectionsButton">Shop Directions</button>
</a>
</div>
</body>
</html>
