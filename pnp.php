<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="Style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form method="get">
    <input type="text" id="input-field" name="search" placeholder="   Search   In   Specials4You">
    <div id="output" class="result-container"></div>
</form>



<h1 style="color: #FFA033;font-size: 50px;" id="heading">Pick n' Pay</h1>
<div class="FixedSideBar">
  <!--The Store selector SideBar-->
  <ul>
    <h id="SideBarTitle" style="font-size: 35px; font-weight: bolder;">Store Selection</h><br>
    <a href="#" class="Store" onclick="toggleDropdown(this)" style="font-weight: bold;font-size: 25px;color: #FFA033;">Pick n' Pay<span class="plus-sign">&nbsp;&nbsp;&nbsp;+</span></a>
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

    <a href="shoprite.php" class="Store" onclick="toggleDropdown(this)" style="font-weight: bold;font-size: 20px;">Shoprite<span class="plus-sign">&nbsp;&nbsp;&nbsp;+</span></a>
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

    <a href="#" class="Store" onclick="toggleDropdown(this)" style="font-weight: bold;font-size: 20px;">Woolworth<span class="plus-sign">&nbsp;&nbsp;&nbsp;+</span></a>
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
const inputBox = document.getElementById("input-field"); // textbox
const output = document.getElementById("output"); //

let userInput = "";
inputBox.addEventListener("input", () => {
  userInput = inputBox.value.toLowerCase();
  let filteredData = data;
  if (userInput.trim() !== "") {
    filteredData = data.filter(
      item => item.Name && item.Name.toLowerCase().includes(userInput)
    );
  }
  if (userInput.trim() === "") {
    output.innerHTML = ""; // Clear the output if there is no input
  } else {
    const outputHTML = filteredData.map(item => {
      const name = item.Name;
      const imageSrc = item[Object.keys(item)[Object.keys(item).length - 1]];
      const thirdColumn = item[Object.keys(item)[2]]; // Assuming the third column index is 2 (0-based index)
      return `
        <div class="result-item">
          <img src="${imageSrc}" alt="Image" />
          <p>${name}</p>
          <p>${thirdColumn}</p>
        </div>
      `;
    }).join("");
    output.innerHTML = outputHTML;
  }
});





// ProductBoxes
const container = document.querySelector(".ProductContainer");
data.forEach(item => {
    const box = document.createElement("div");
    box.classList.add("ProductBox");
    box.style.width = "150px";
    box.style.height = "260px";
    box.style.border = "2px solid white"; // Add white border with 2px thickness
    box.style.borderRadius = "20px"; // Add border radius of 20px
    box.style.boxShadow = "0 0 10px rgba(0, 0, 0, 0.2)"; // Add box shadow
    box.style.paddingLeft = "10px";

  const imgElement = document.createElement("img");
  const lastColumnName = headers[headers.length - 1];
  const lastColumnValue = item[lastColumnName];
  imgElement.src = lastColumnValue;
  imgElement.style.width = "150px"; // Set desired width
  imgElement.style.height = "150px"; // Set desired height

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

  box.appendChild(firstColumnElement);

  container.appendChild(box);
});


</script>
</body>
</html>