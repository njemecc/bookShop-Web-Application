

async function getBooksFromDB(){ 

const response = await fetch("http://localhost/api/getBooks");
const data = await response.json();
console.log(data);

let container = document.querySelector('.knjige-container')

for(let i = 0; i<data.length; i++){

  let markup = `<div class="card">
  <img
    src="${data[i].image_url}"
    alt="${data[i].name}"
    style="width: 100%"
  />
  <h1>${data[i].name}</h1>
  <p class="price">${data[i].price}$</p>
  
  <p><button class="cart-button" data-id=${data[i].id} data-img=${data[i].image_url} data-desc=${data[i].description} data-name=${data[i].name} data-price=${data[i].price} data-route="api/cart/add">Add to Cart</button></p>
  </div>`

container.insertAdjacentHTML("afterbegin",markup);



//search
const searchInput = document.querySelector("[data-search")
 
searchInput.addEventListener("input",(e)=>{
  const value = e.target.value

   container.innerHTML = ''

   for(let i = 0; i<data.length;i++){

     if (data[i].name.toLowerCase().includes(value.toLowerCase())){

      let markup = `<div class="card">
      <img
        src="${data[i].image_url}"
        alt="${data[i].name}"
        style="width: 100%"
      />
      <h1>${data[i].name}</h1>
      <p class="price">${data[i].price}$</p>
      
      <p><button class="cart-button" data-id=${data[i].id} data-img=${data[i].image_url} data-desc=${data[i].description} data-name=${data[i].name} data-price=${data[i].price} data-route="api/cart/add">Add to Cart</button></p>
      </div>`

   
   container.insertAdjacentHTML("afterbegin",markup);
    }


    }
    

})

 }

 }

let kupljeneKnjige = []

function addToCart(){

  const addToCartButtons = document.querySelectorAll('.cart-button');


  addToCartButtons.forEach(button => {
    button.addEventListener("click",function(){

    
      let id = button.getAttribute("data-id")
      let name = button.getAttribute("data-name")
      let img = button.getAttribute("data-img")
      let desc = button.getAttribute("data-desc")
      let price = button.getAttribute("data-price")

      let data = {'id':id,'name':name,"img":img,'desc':desc,'price':price}

      kupljeneKnjige.push(data);

      data = JSON.stringify(kupljeneKnjige)

      localStorage.setItem("items",data)

      Swal.fire({
        title: 'Item added to the cart.',
        width: 600,
        padding: '3em',
        color: 'black',
        background: '#fff url(/images/trees.png)',
        backdrop: `
         
          url("https://media.tenor.com/PDdj85iOO1sAAAAM/nyan-cat-rainbow.gif")
          left top
          no-repeat
        `
      })

    })
  })

}

getBooksFromDB();

setTimeout(addToCart,1000);

 
  