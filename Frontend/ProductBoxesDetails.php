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
buttons a {
  display: flex;
  flex-direction: row;
}

</style>
<body>
  <div class="ProductContainer">
  </div>

  <script>
    let count = 0;
    const math = document.createElement("div");

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
    let x = 0;
      for (const key in item){
        if( x == 3){
            const value = item[key];
            imgElement.src = value;
        }
       x++;
      }
    imgElement.style.width = "150px";
    imgElement.style.height = "150px";
    imgElement.style.display = "flex";
    imgElement.style.justifyContent = "centre";
    imgElement.style.marginRight = "100px";
    imgElement.style.alignContent = "centre"
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
          break;
        }
      }
    }

    box.appendChild(detailsList);

    const plusButton = document.createElement("button");
    plusButton.textContent = "+";
    plusButton.style.fontWeight = "bold";
    plusButton.style.fontSize = "20px";
    math.appendChild(plusButton);

    const res =document.createElement("span");
    res.textContent = count;
    res.style.fontWeight = "bold";
    res.style.fontSize = "20px";
    math.appendChild(res);


    const minusButton = document.createElement("button");
    minusButton.textContent = "-";
    minusButton.style.fontWeight = "bold";
    minusButton.style.fontSize = "20px";
    math.appendChild(minusButton);

    box.appendChild(math);

    const thirdItem = item[Object.keys(item)[2]];

    


    plusButton.addEventListener("click", () => {
      count++;
      const newValue = thirdItem * count;
      item[Object.keys(item)[2]] = newValue;
      const listItems = detailsList.getElementsByTagName("li");
      listItems[2].textContent = `${Object.keys(item)[2]}: ${newValue}`;
      res.textContent = count;



      const countItem = document.createElement("P");
      detailsList.appendChild(countItem); 


      console.log(count);
    });


    
    minusButton.addEventListener("click", () => {
      if (count > 0) {
        count--;
        const newValue = thirdItem * count;
        item[Object.keys(item)[2]] = newValue;
        const listItems = detailsList.getElementsByTagName("li");
        res.textContent = count;
        listItems[2].textContent = `${Object.keys(item)[2]}: ${newValue}`;

        const countItem = detailsList.querySelector("li:last-child");
        detailsList.removeChild(countItem);


        console.log(count);
      }
    });

    container.appendChild(box);
  });



  

  const shopDirectionsButton = document.getElementById("shopDirectionsButton");
  shopDirectionsButton.addEventListener("click", () => {
    window.location.href = "location.php";
  });
</script>

<div class="buttons">

  <a href="#">
  <button class="button" id="shopDirectionsButton">Send to me</button>
  </a>

  <a href="location.php">
  <button class="button" id="shopDirectionsButton">Shop Directions</button>
  </a>

</div>


</body>
</html>
