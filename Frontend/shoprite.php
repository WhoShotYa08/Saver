<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="MainPage.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="services.css">
    <title>Document</title>
</head>
<body>
<header>
        <div class="navbar">
    
        <nav>
            <ul>
            <li><a href="./pnp.php" class="icons" id="logo"><img src="./1678467425782-thumbnail 1.jpg" alt="LOGO" style="height: 1em"></a></li>
                <li><a href="./Welcome_page.php">Home</a></li>
                
                <li><a href="./services.php">Services</a></li>
                <li><a href="./contact.php">Contact</a></li>
                <li><a href="./pnp.php">Contact</a></li>
            </ul>
            <div class="profile_cart">
                    <a href="./profile.php" class="icons" id="profile_icon"><ion-icon name="person-circle-outline"></ion-icon></a>
                    
                    <!-- shopping cart icon -->
                    <a href="./ProductBoxesDetails.php" class="icons" id="cart_icon"><ion-icon name="cart-outline"></ion-icon></a>
            </div>
        </nav>
        
    </div>
    </header>


<form method="get" action="SearchBarDetails.php">
  <input type="text" id="input-field" name="search" placeholder="Search In Specials4You">
  <div id="output" class="result-container"></div>
  <input type="hidden" id="result-data" name="resultData">
</form>


<a href="ProductBoxesDetails.php">
<div class="Cart">
  <p>GROCERY LIST</p>
</div>
</a>


<h1 style="color: #FFA033;font-size: 50px;" id="heading">Shoprite</h1>
<div class="FixedSideBar"><!--The Store selector SideBar-->
    <ul>
        <h id="SideBarTitle" style="font-size: 35px; font-weight: bolder;" >Store Selection</h><br>
          <a href="Pnp.php" class="Store" style="font-weight: bold;font-size: 20px;">Pick n' Pay<span class="plus-sign">&nbsp;&nbsp;&nbsp;+</span></a>
          <ul class="dropdown-menu" style="font-size: 15px;">
            <li><a href="#">Food Cupboard</a></li>
            <li><a href="#">Household and Cleaning</a></li>
            <li><a href="#">Frozen Foods</a></li>
            <li><a href="#">Poultry, Red Meat and Seafood</a></li>
            <li><a href="#">Fruit and Vegetables</a></li>
            <li><a href="#">Self-care and Health</a></li>
            <li><a href="#">Milk, Eggs and Dairy</a></li>
            <li><a href="#">Beverages</a></li>
          </ul>

            <a href="#" class="Store" style="font-weight: bold;font-size: 25px;color: #FFA033;">Shoprite<span class="plus-sign">&nbsp;&nbsp;&nbsp;+</span></a>
            <ul class="dropdown-menu" style="font-size: 15px;">
              <li><a href="#">Food Cupboard</a></li>
              <li><a href="#">Household and Cleaning</a></li>
              <li><a href="#">Frozen Foods</a></li>
              <li><a href="#">Poultry, Red Meat and Seafood</a></li>
              <li><a href="#">Fruit and Vegetables</a></li>
              <li><a href="#">Self-care and Health</a></li>
              <li><a href="#">Milk, Eggs and Dairy</a></li>
              <li><a href="#">Beverages</a></li> 
            </ul>

            <a href="#" class="Store" style="font-weight: bold;font-size: 20px;">Woolworth<span class="plus-sign">&nbsp;&nbsp;&nbsp;+</span></a>
            <ul class="dropdown-menu" style="font-size: 15px;">
              <li><a href="#">Food Cupboard</a></li>
              <li><a href="#">Household and Cleaning</a></li>
              <li><a href="#">Frozen Foods</a></li>
              <li><a href="#">Poultry, Red Meat and Seafood</a></li>
              <li><a href="#">Fruit and Vegetables</a></li>
              <li><a href="#">Self-care and Health</a></li>
              <li><a href="#">Milk, Eggs and Dairy</a></li>
              <li><a href="#">Beverages</a></li>
            </ul>
  </ul>
</div>

<div class="ProductContainer">

</div>

<script>
//Sidebar
function toggleDropdown(element) {
    element.classList.toggle('show');
  }



// Opening and Storing in Object
// Pnp
const request = new XMLHttpRequest();
request.open("GET", "pnp.csv", false);
request.send(null);

const csvData = request.responseText;

const rows = csvData.split("\n");
const headers = rows[0].split(",");
const data = [];

for (let i = 1; i < rows.length; i++) {
  const row = rows[i].split(",");
  if (row.length === headers.length) {
    const obj = {};
    for (let j = 0; j < headers.length; j++) {
      if (row[j] !== "") {
        obj[headers[j]] = row[j];
      }
    }
    if (Object.keys(obj).length > 0) {
      data.push(obj);
    }
  }
}


// SearchBox
const inputBox = document.getElementById("input-field");
const output = document.getElementById("output");
const resultDataInput = document.getElementById("result-data"); 

let userInput = "";
let Result = []; 

inputBox.addEventListener("input", () => {
  userInput = inputBox.value.toLowerCase();
  let filteredData = data;
  if (userInput.trim() !== "") {
    filteredData = data.filter(
      item => item.Name && item.Name.toLowerCase().includes(userInput)
    );
  }

  if (userInput.trim() === "") {
    output.innerHTML = "";
  } else {
    const outputHTML = filteredData.map((item, index) => {
      let name = item.Name;
      let imageSrc = item[Object.keys(item)[Object.keys(item).length - 1]];
      let thirdColumn = item[Object.keys(item)[2]];
      let SecondColumn = item[Object.keys(item)[1]];
      return `
        <div class="result-item">
          <a href="SearchBarDetails.php" class="result-link" data-index="${index}">
            <img src="${imageSrc}" alt="Image" name="img"></img>
            <p name="name">${name}</p>
            <p name="discountprice">${thirdColumn}</p>
            <p name="originalprice">${SecondColumn}</p>
          </a>
        </div>
      `;
    }).join("");
    output.innerHTML = outputHTML;

    const resultLinks = document.querySelectorAll('.result-link');
    resultLinks.forEach((link) => {
      link.addEventListener('click', (event) => {
        event.preventDefault(); 
        const resultIndex = link.getAttribute('data-index');

        let clickedResult = filteredData[resultIndex];
        let resultItem = {
          imageSrc: clickedResult[Object.keys(clickedResult)[Object.keys(clickedResult).length - 1]],
          name: clickedResult.Name,
          thirdColumn: clickedResult[Object.keys(clickedResult)[2]],
          SecondColumn: clickedResult[Object.keys(clickedResult)[1]]
        };

        Result.push(resultItem); 
        resultDataInput.value = JSON.stringify(Result);
        document.querySelector('form').submit();
      });
    });
  }
});



// ProductBoxes
const Results = [];

const container = document.querySelector(".ProductContainer");
data.forEach(item => {
  const box = document.createElement("div");
  box.classList.add("ProductBox");
  box.style.width = "150px";
  box.style.height = "280px";
  box.style.border = "2px solid white";
  box.style.borderRadius = "20px";
  box.style.boxShadow = "0 0 10px rgba(0, 0, 0, 0.2)";
  box.style.paddingLeft = "10px";

  const imgElement = document.createElement("img");
  const lastColumnName = headers[headers.length - 1];
  const lastColumnValue = item[lastColumnName];
  imgElement.src = lastColumnValue;
  imgElement.style.width = "150px";
  imgElement.style.height = "150px";

  box.appendChild(imgElement);

  for (let j = 1; j < headers.length - 1; j++) {
    const columnName = headers[j];
    const columnValue = item[columnName];

    const columnElement = document.createElement("p");
    columnElement.textContent = columnValue;

    box.appendChild(columnElement);
  }

  const firstColumnName = headers[0];
  const firstColumnValue = item[firstColumnName];

  const firstColumnElement = document.createElement("p");
  firstColumnElement.textContent = firstColumnValue;

  const plus =document.createElement("p");
  plus.textContent = "+";
  plus.style.fontWeight = "bold";
  plus.style.fontSize = "20px";


  box.appendChild(firstColumnElement);
  box.appendChild(plus);

  box.addEventListener("click", () => {
    Results.push(item);
    localStorage.setItem("Results", JSON.stringify(Results));
    alert("Product added succesfully");
  });

  container.appendChild(box);
});

localStorage.setItem("Results", JSON.stringify(Results));
</script>
</body>
</html>