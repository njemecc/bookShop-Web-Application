console.log("Welcome to cart")

function showCart(){
   
const parent = document.getElementById('mojDiv')  

let items = localStorage.getItem('items')
itemsParsed = JSON.parse(items)
console.log(itemsParsed)

const payButton = document.querySelector('.btn-pay').addEventListener('click',izbaciRacun);

for(let i = 0; i < itemsParsed.length;i++){

    let markup = `
    <div class="container">
    <div class="row mb-4 d-flex justify-content-between align-items-center">
    <div class="col-md-2 col-lg-2 col-xl-2">
      <img
        src="${itemsParsed[i].img}"
        class="img-fluid rounded-3" alt="${itemsParsed[i].desc}">
    </div>
    <div class="col-md-3 col-lg-3 col-xl-3">
      <h6 class="text-muted">${itemsParsed[i].name}</h6>
      <h6 class="text-black mb-0"></h6>
    </div>
    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
   
     

      <input  id="form1" min="0" name="quantity" value="1" type="number"
        class="form-control form-control-sm inputNumber" />

      <button style="text-decoration:none; color:red" onclick="promeniUkupno(this)" class="btn btn-link px-2"
        >
        add
      </button>

      
    </div>
    
    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">

      <h6 class="mb-0 price">$${itemsParsed[i].price}</h6>
    </div>
    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
      <a href="#!" class="text-muted"><i class="fas fa-times"></i></a>
    </div>
  </div>
  </div>

  `
  parent.insertAdjacentHTML('beforeend',markup)

}


const itemNumberContainers = document.querySelectorAll('.itemsNumber').forEach(number=>{
  number.innerHTML = `Items ${itemsParsed.length}`
})





}



showCart()


function promeniUkupno(element){
  
  const mainEl = element.closest('.container')

  let price = mainEl.querySelector('.price').innerHTML
  let quantity = mainEl.querySelector('.inputNumber').value
  price = price.substring(1)
  price = parseInt(price)
  
  let total = quantity * price
  total = parseInt(total)

  element.innerText = 'Done';
  element.setAttribute('disabled','true')
 //element.style.display = "none"; 


  ukupnaCenaContainer = document.querySelectorAll('.totalPrice').forEach(elementUkupno=>{
    vrednostElemenenta =  elementUkupno.innerHTML
    vrednostElemenenta =  parseInt(vrednostElemenenta)
    console.log(vrednostElemenenta)

    elementUkupno.innerText = vrednostElemenenta + total

    

    
  })


}


function reedemCode(input){ 
  const mainElement = input.closest('.mb-5')
  let tekst = document.querySelector('.form-label')
  let code = input.value

  if(code == 'DESETKA'){


    tekst.innerHTML = "Correct Code"
    tekst.style.color ="Green"

    let containerVrednost = document.querySelector('.TOTAL')
    let vrednost = document.querySelector('.TOTAL').innerHTML 
    vrednost = parseInt(vrednost) 

    umanjeno = vrednost / 10

    umanjeno = parseInt(umanjeno)

    let totalnaVrednost = vrednost - umanjeno

    console.log(totalnaVrednost)
    
    containerVrednost.innerHTML = totalnaVrednost

  }else{
    tekst.innerHTML = "Invalid Code"
    tekst.style.color ="red"
  }


}

let Racuni = [];





function izbaciRacun(e){
e.target.setAttribute("disabled","true")

//ukupna cena
const ukupnaCenaElement = document.querySelector('.TOTAL');
let ukupnaCena = Number(ukupnaCenaElement.innerHTML);

// itemi
let items = localStorage.getItem('items')
itemsParsed = JSON.parse(items)
let itemiKorpe = "";

let imenaItemaKorpe = "";

itemsParsed.forEach(item=>{
  itemiKorpe += `${item.id},`;
  imenaItemaKorpe+=`${item.name}, `
})

//brojStavki
let brojStavki = itemsParsed.length

let datumKreiranjaRacuna =  Date.now();



//ubacujemo Racun u array sa racunima

Racuni.push({
  'ukupnaCena':`${ukupnaCena}`,
  'brojStavki':`${brojStavki}`,
  'itemiKorpe':`${itemiKorpe}`,
  'datumKreiranjaRacuna':`${datumKreiranjaRacuna}`

})

Swal.fire(`Uspesno ste porucili ${imenaItemaKorpe} po ceni od ${ukupnaCena}$`)


//localStorage.setItem("Racuni",Racuni)


//Saljemo podatke sa klijenta na server

fetch("http://localhost/ajax",{
  method:'post',
  body:JSON.stringify(Racuni),
  headers:{
    "Content-Type":'application/json'
  }
}).then(function(response) {
  return response.text();
}).then(function(text){
  console.log(text);
}).catch(function(error){
  console.log("error",error);
})

}