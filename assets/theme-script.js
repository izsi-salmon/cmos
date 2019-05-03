// Sticky nav bar variables
var navbar = document.getElementById('navbar');
var pageBuffer = document.getElementById('pageBuffer');
// Mobile hamburger menu DOM queries
var hamburgerButton = document.getElementById('hamburgerIcon');
var mobileNavContent = document.getElementById('mobileMenu');
var dropshadow = document.getElementById('dropshadow');
var navHeight = navbar.scrollHeight;
// Dropdown menu DOM queries
var dropdownButton = document.getElementsByClassName('menu-item-has-children');
var dropdownContent = document.getElementsByClassName('sub-menu');
var headerCta = document.getElementById('headerCta');
var headerCtaStyles = document.getElementsByClassName('cta-header')[0];

// Function setting the page content to sit below the navigation (mobile only)
function setBuffer() {
    var navHeight = navbar.scrollHeight;
    pageBuffer.style.height = navHeight +'px';
    if(headerCta){
        var ctaHeight = headerCta.scrollHeight;
    }
}

document.body.onload = function() {setBuffer()};
window.onresize = function() {setBuffer()};

// Function controlling hamburger menu (on mobile/tablet only)
function toggleMenu(){
    if(mobileNavContent.style.maxHeight){
        mobileNavContent.style.maxHeight = null;
        dropshadow.style.opacity = '0';
        dropshadow.style.pointerEvents = 'none';
        document.body.style.overflow = 'auto';
        pageBuffer.style.height = navHeight + 'px';
        if(headerCta){
            headerCta.style.backgroundColor = '#3EAB46';
            headerCta.style.color = '#FFF';
            if ((window.innerWidth >= 600) && (window.innerWidth <= 1200)){
                headerCta.style.width = '100%';
                headerCta.style.boxSizing = 'content-box';
            }
        }
        
    } else{
        // Setting the mobile nav position based on navbar height
        var mobileNavDiv = document.getElementsByClassName('nav')[0];
        mobileNavDiv.style.top = navHeight + 'px';
        mobileNavContent.style.maxHeight = mobileNavContent.scrollHeight + 'px';
        dropshadow.style.opacity = '0.4';
        dropshadow.style.pointerEvents = 'auto';
        document.body.style.overflow = 'hidden';
        pageBuffer.style.height = 0;
        // Change CTA styles
        if(headerCta){
            headerCta.style.backgroundColor = '#444';
            headerCta.style.color = '#3EAB46';
            if ((window.innerWidth >= 600) && (window.innerWidth <= 1200)){
                headerCta.style.width = '400px';
                headerCta.style.boxSizing = 'border-box';
            }
        }
    }
}

hamburgerButton.addEventListener('click', toggleMenu, false);

dropshadow.addEventListener('click', toggleMenu, false);

// Functions controlling drop-down services menu (desktop only)

// Function that finds/loops dropdown event listeners
var setDropdownEventListeners = function(){
    for (i = 0; i < dropdownButton.length; i++) { 
        addEventListeners(i);
    }
    
}();

// Function that sets event listeners
function addEventListeners(n){
        
//        dropdownButton[n].addEventListener("click", function(event){
//          event.preventDefault()
//        });

//    dropdownButton[n].addEventListener('mouseover', function(){openDropdown(n)}, false);
        
    document.addEventListener('mouseover', function(event) {
        var isOver = dropdownButton[n].contains(event.target);
        
//        console.log(dropdownContent[n].style.maxHeight);
//        console.log(dropdownContent[n].scrollHeight + 'px');
//        console.log(dropdownContent[n].scrollHeight + 'px' === dropdownContent[n].style.maxHeight);

        if (!isOver) {
            dropdownContent[n].style.maxHeight = null;
//            console.log(dropdownContent[n].style.maxHeight);
//            dropdownContent[n].style.overflow = 'hidden';
//            console.log(dropdownContent[n].style.overflow);
        } else{
            dropdownContent[n].style.maxHeight = dropdownContent[n].scrollHeight + 'px';
            if(dropdownContent[n].scrollHeight + 'px' === dropdownContent[n].style.maxHeight){
                console.log(dropdownContent[n].style.maxHeight);
            }
//            console.log(dropdownContent[n].style.overflow);
        }
    });
}

//function openDropdown(n){
//    dropdownContent[n].style.maxHeight = dropdownContent[n].scrollHeight + 'px';
//    setTimeout(function(){ dropdownContent[n].style.overflow = 'visible'; }, 300);
    
    
    
//    dropdownButton[n].addEventListener('mouseleave', function(){closeDropdown(n)}, false);
//}

//function closeDropdown(n){
//    setTimeout(function(){ dropdownContent[n].style.maxHeight = null; }, 1000);
//}

//function toggleDropdown(n){
//    if(dropdownContent[n].style.maxHeight){
//        dropdownContent[n].style.maxHeight = null;
//    } else{
//        dropdownContent[n].style.maxHeight = dropdownContent[n].scrollHeight + 'px';
//    }
//}

// SWIPER (Home page slideshow banner)

var swiper = new Swiper('.swiper1', {
  slidesPerView: 1,
  spaceBetween: 30,
  loop: true,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  autoplay: {
    delay: 12000,
  }
});

var swiper2 = new Swiper('.swiper2', {
  slidesPerView: 3,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      breakpoints: {
        1500: {
          slidesPerView: 2,
        },
        1000: {
          slidesPerView: 1,
        }
      }
});

// END