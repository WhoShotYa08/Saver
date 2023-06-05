<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Product Boxes</title>
</head>
<style>
.button {
  background-color: #4CAF50;
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
    // Retrieve the Results array from local storage
    const resultsData = localStorage.getItem("Results");
    const Results = JSON.parse(resultsData);

    // Iterate over the Results array and display the product boxes
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
      box.style.display = "inline-block"; // Display boxes in a row

        const imgElement = document.createElement("img");
        imgElement.src = item["image"];
        imgElement.style.width = "150px";
        imgElement.style.height = "150px";
        box.appendChild(imgElement);
      

      // Add other product details as needed
      const detailsList = document.createElement("ul"); // Create a list
      for (const key in item) {
        if (key !== "image") {
          const value = item[key];
          const listItem = document.createElement("li"); // Create a list item
          listItem.textContent = `${key}: ${value}`;
          detailsList.appendChild(listItem); // Add list item to the list
        }
      }
      box.appendChild(detailsList); // Add the list to the box

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
