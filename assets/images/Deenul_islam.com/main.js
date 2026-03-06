// images slider.
let slider = document.querySelector('.slider .list');
let items = document.querySelectorAll('.slider .list .item');
let next = document.getElementById('next');
let prev = document.getElementById('prev');
let dots = document.querySelectorAll('.slider .dots li');

let lengthItems = items.length - 1;
let active = 0;
next.onclick = function(){
    active = active + 1 <= lengthItems ? active + 1 : 0;
    reloadSlider();
}
prev.onclick = function(){
    active = active - 1 >= 0 ? active - 1 : lengthItems;
    reloadSlider();
}
let refreshInterval = setInterval(()=> {next.click()}, 3000);
function reloadSlider(){
    slider.style.left = -items[active].offsetLeft + 'px';
    // 
    let last_active_dot = document.querySelector('.slider .dots li.active');
    last_active_dot.classList.remove('active');
    dots[active].classList.add('active');

    clearInterval(refreshInterval);
    refreshInterval = setInterval(()=> {next.click()}, 3000);
}

dots.forEach((li, key) => {
    li.addEventListener('click', ()=>{
         active = key;
         reloadSlider();
    })
})
window.onresize = function(event) {
    reloadSlider();
};


//validating feedback foam
const foam = document.getElementById('myfoam');
const uname = document.getElementById('name');
const uemail = document.getElementById('email');
const utext = document.getElementById('text');
const terrorr = document.querySelector('.terror');
const eerrorr = document.querySelector('.eerror'); 
const nerrorr = document.querySelector('.nerror');

myfoam.addEventListener('submit', (event) => {
  event.preventDefault();
  if (uname.value === '') {
    nerrorr.textContent = 'Name is required.';
  } else {
    nerrorr.textContent = '';
  }
  
  if (uemail.value === '') {
    eerrorr.textContent = 'Email Required.';
  } else {
    eerrorr.textContent = '';
  }
  
  if (utext.value === '') {
    terrorr.textContent = 'this field is required.';
  } else {
    terrorr.Terror = '';
  }
});

// generating news and event with javascript

const events = [
  {
    images: "3.jpg", 
    brief: "Next inter Classes musabaqah", 
    classes: "one"
  }, 
  {
    images: "4.jpg", 
    brief: "Deenul Islam management has open kinds section", 
    classes: "two"
  }, 
  {
    images: "7.jpg", 
    brief: "Deenul Islam management has successfully finish building up their general library", 
    classes: "three"
  }
  ];
 
  // generating about content with javascript
  
  let abouts = [
    {
      image: "1.jpg", 
      text: `This section contain short       history about deenul islam
               height is a bit of an ice cream so I can send it to you tomorrow and see if I can get it easy to make a list option if you want to come to the cart and also remove it from the shop`, 
               classe: "about_btn" 
    }
    ];
  
  let productEvent = '';
  
  events.forEach((pro) => {
    productEvent += `
       <div class="${pro.classes}">
            <img src="${pro.images}" alt="" height="130" width="200">
            <p>${pro.brief}</p>
            <button type="submit">Learn More</button>
          </div>
    `
  });
  
  document.querySelector('.event').innerHTML = productEvent;
  
  let about = '';
  abouts.forEach((abo) => {
    about += `
    <div class="menu">
             <img src="${abo.image}" alt="" height="130" width="280">
          </div>
          <div class="detail">
             <p>
               ${abo.text}
             </p>
             <button type="submit" class="${abo.classe}">
               Load More
             </button>
    `
  });
  
  document.querySelector('.about').innerHTML = about;
  
  document.querySelector('.about_btn').addEventListener('click', () => {
  window.location.href = "About.html";
});

const program = [
  {
    title: "leaning on-campus", 
    image: "2.jpg", 
    more: "Deenul Islam provides a very well decorated and enough lecture hall for on-campus learning", 
    classs: "visual", 
    fun: "visual"
  }, 
  {
    title: "Distance leaning", 
    image: "1.jpg", 
    more: "if you are not able to learn on campus physically, deenul islam gives you a chance to study online", 
    classs: "distance", 
    fun: "distance"
  }
  ];
  
  let programs = '';
  
  program.forEach((pro) => {
    programs += `
    <div class="${pro.classs}">
              <h3>${pro.title}</h3>
              <img src="${pro.image}" alt="" height="130" width="200">
               <p>${pro.more}</p>
              <button type="submit" onclick="${pro.fun}()">Check program</button>
          </div>
    `
   // console.log(programs);
  });
    document.querySelector('.program').innerHTML = programs; 
    
    function visual() {
      window.location.href="Visual.html";
    }
    
    function distance() {
      window.location.href="Distance.html";
    }
  
  let staffs = [
      {
        classse: "one", 
        imag: "0.jpg", 
        texts: "Ceo.founder(head master)"
      }, 
      {
        classse: "two", 
        imag: "15.png", 
        texts: "Deenul Islam registerer"
      }, 
      {
        classse: "three", 
        imag: "images.png", 
        texts: "Deenul Islam manager"
      }
    ];
    
    let office = '';
    staffs.forEach((off) => {
      office += `
      <div class="${off.classse}">
            <img src="${off.imag}" alt="" height="180" width="200">
            <p>${off.texts}</p>
          </div>
      `   
    });
    
    document.querySelector('.staff').innerHTML = office;
    