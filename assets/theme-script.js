// Mobile hamburger menu DOM queries
var hamburgerButton = document.getElementById('hamburgerIcon');
var mobileNavContent = document.getElementById('mobileMenu');
var dropshadow = document.getElementById('dropshadow');
// Dropdown menu DOM queries
var dropdownButton = document.getElementsByClassName('menu-item-has-children');
var dropdownContent = document.getElementsByClassName('sub-menu');
var headerCta = document.getElementById('headerCta');
var headerCtaStyles = document.getElementsByClassName('cta-header')[0];
// Sticky nav bar variables
var navbar = document.getElementById('navbar');
var pageBuffer = document.getElementById('pageBuffer');
var sticky = navbar.offsetHeight;
// Document title DOM queries
var docTitle = 'CMOS – Commercial Cleaning Company';
var titleMessage = 'Hey, come back!';

// Function setting the page content to sit below the navigation (mobile only)
function pageMargin() {
    if(headerCta && window.innerWidth < 1200){
        var ctaHeight = headerCta.scrollHeight;
        pageBuffer.style.marginTop = ctaHeight + 'px';
    } else{
        pageBuffer.style.marginTop = 0;
    }
}

document.body.onload = function() {pageMargin()};
window.onresize = function() {pageMargin()};

// Function controlling sticky nav ability
function stickyNav() {
    var navHeight = navbar.scrollHeight;
    if(headerCta && window.innerWidth < 1200){
        var ctaHeight = headerCta.scrollHeight;
    }
    if (window.pageYOffset >= sticky) {
    navbar.classList.add('sticky-header');
    if(headerCta && window.innerWidth < 1200){
        pageBuffer.style.marginTop = navHeight + ctaHeight +'px';
    } else{
        pageBuffer.style.marginTop = navHeight + 'px';
    }
  } else {
        navbar.classList.remove('sticky-header');
        if(headerCta && window.innerWidth < 1200){
            pageBuffer.style.marginTop = ctaHeight + 'px';
        } else{
            pageBuffer.style.marginTop = 0;
        }
  }
}
window.onscroll = function() {stickyNav()};

// Function controlling hamburger menu (on mobile/tablet only)

function toggleMenu(){
    if(mobileNavContent.style.maxHeight){
        mobileNavContent.style.maxHeight = null;
        dropshadow.style.opacity = '0';
        dropshadow.style.pointerEvents = 'none';
        document.body.style.overflow = 'auto';
        headerCta.style.backgroundColor = '#3EAB46';
        headerCta.style.color = '#FFF';
        if ((window.innerWidth >= 600) && (window.innerWidth <= 1200)){
            headerCta.style.width = '100%';
            headerCta.style.boxSizing = 'content-box';
        }
    } else{
        // Setting the mobile nav position based on navbar height
        var navHeight = navbar.scrollHeight;
        var mobileNavDiv = document.getElementsByClassName('nav')[0];
        mobileNavDiv.style.top = navHeight + 'px';
        mobileNavContent.style.maxHeight = mobileNavContent.scrollHeight + 'px';
        dropshadow.style.opacity = '0.4';
        dropshadow.style.pointerEvents = 'auto';
        document.body.style.overflow = 'hidden';
        // Change CTA styles
        headerCta.style.backgroundColor = '#444';
        headerCta.style.color = '#3EAB46';
        if ((window.innerWidth >= 600) && (window.innerWidth <= 1200)){
            headerCta.style.width = '400px';
            headerCta.style.boxSizing = 'border-box';
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

        dropdownButton[n].addEventListener('mouseover', function(){openDropdown(n)}, false);
        
        document.addEventListener('mouseover', function(event) {
          var isOver = dropdownButton[n].contains(event.target);

          if (!isOver) {
              dropdownContent[n].style.maxHeight = null;
          }
        });
}

function openDropdown(n){
    dropdownContent[n].style.maxHeight = dropdownContent[n].scrollHeight + 'px';
//    setTimeout(function(){ dropdownContent[n].style.overflow = 'visible'; }, 300);
    
    
    
//    dropdownButton[n].addEventListener('mouseleave', function(){closeDropdown(n)}, false);
}

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


// Function controlling document title change

window.onblur = function() { 
    document.title = titleMessage; 
}

window.onfocus = function() {
    document.title = docTitle; 
}

// SWIPER (Home page slideshow banner)

var swiper = new Swiper('.swiper1', {
  slidesPerView: 1,
  spaceBetween: 30,
  loop: true,
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  autoplay: {
    delay: 12000,
  }
});