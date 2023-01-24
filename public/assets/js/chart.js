'use strict';
console.log("welcome to chart!")


let imenaKnjiga = [];
let brojProdaja = [];

async function getSelledBookNames () {

  try{
    const response = await fetch("http://localhost/api/brojProdatihArtikala");
    const data = await response.json();
    
    console.log(data);

 Object.keys(data).forEach(knjiga=>{
  imenaKnjiga.push(knjiga)
    
 })

 Object.values(data).forEach(knjiga=>{
  brojProdaja.push(knjiga)
    
 })



  }catch(error){

    console.log(error)
  }
  
  
  

}



const makeChart1 = () => {


const ctx = document.getElementById('myChart');

 new Chart(ctx, {
  type: 'bar',
  data: {
    labels: imenaKnjiga,
    datasets: [{
      label: 'copies selled',
      data: brojProdaja,
      borderColor: '#FF6384',
      backgroundColor: '#FFB1C1',
      borderWidth: 1
    }],
   
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    },
    animation:{
      onComplete : function () {

        let a = document.createElement('a');
        a.href = this.toBase64Image();
        a.download = 'my_file_name.png';
        a.innerHTML ="Download";
        const container = document.querySelector('.container-1');
        container.appendChild(a);

        
        
      }
    }
  }
});
 }


 const kategorije = [];
 const sumaKategorija=[];

async function makeChart2() {

try {

const response =  await fetch('http://localhost/api/chart2');
const data = await response.json();

Object.keys(data).forEach(kategorija => {
  kategorije.push(kategorija);
})

Object.values(data).forEach(suma => {
  sumaKategorija.push(suma);
})



} catch (error) {
  alert(error)
}

  const ctx = document.getElementById('myChart2');

  let myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: kategorije,
      datasets: [{
        label: '$ po kateforiji',
        data: sumaKategorija,
        borderWidth: 1
      }],
     
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      },
      animation:{
        onComplete : function () {

          let a = document.createElement('a');
          a.href = myChart.toBase64Image();
          a.download = 'my_file_name.png';
          a.innerHTML ="Download";
          const container = document.querySelector('.container-2');
          container.appendChild(a);

          
          
        }
      }
    }
  });

  



}


const ukupnoTajDan = [];
let datum = [];
const counter = 0;

async function makeChart3(){

const response = await fetch('http://localhost/api/chart3');
const data = await response.json();

Object.values(data).forEach(suma => {
  ukupnoTajDan.push(suma["sum(ukupna_cena)"]);
})

Object.values(data).forEach(suma => {
  datum.push(suma["vreme_kreiranja_racuna"]);
})





let from = document.querySelector('.from');
let to = document.querySelector('.to');
const btnDatum = document.querySelector('.datum-btn');

btnDatum.addEventListener('click',getDate);

function getDate(){

  let fromDate = from.value; 
  let toDate = to.value; 

  console.log(datum);

  datum = datum.filter(date =>{
  console.log(date)
  console.log(fromDate)
  console.log(toDate)
 return date >= fromDate && date <= toDate
  } );

  console.log(datum);
  pokreniChart3();
}


function pokreniChart3(){
  const ctx = document.getElementById('myChart3');

  new Chart(ctx, {
    type: 'line',
    data: {
      labels: datum,
      datasets: [{
        label: 'Ukupna zarada po danu za odredjeni period ($)',
        data: ukupnoTajDan,
        borderWidth: 1
      }],
     
    },
    
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      },
      animation:{
        onComplete : function () {
  
          let a = document.createElement('a');
          a.href = this.toBase64Image();
          a.download = 'my_file_name.png';
          a.innerHTML ="Download";
          const container = document.querySelector('.container-3');
          container.appendChild(a);
  
          
          
        }
      }
    }
  });
}






}




//pozivi funkcija




getSelledBookNames()
setTimeout("makeChart1();",1000);
setTimeout("makeChart2();",1000);
setTimeout("makeChart3();",1000);