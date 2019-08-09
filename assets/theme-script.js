// Sticky nav bar variables
var navbar = document.getElementById('navbar');
var pageBuffer = document.getElementById('pageBuffer');
var navStyles = window.getComputedStyle(navbar);
// Mobile hamburger menu variables
var hamburgerButton = document.getElementById('hamburgerIcon');
var mobileNavContent = document.getElementById('mobileMenu');
var dropshadow = document.getElementById('dropshadow');
var navHeight;
var parsedNavHeight;
var ctaHeight;
// Dropdown menu variables
var dropdownButton = document.getElementById('dropdownButton');
var dropdownElement = document.getElementsByClassName('menu-item-has-children');
var dropdownContent = document.getElementsByClassName('sub-menu');
var headerCta = document.getElementById('headerCta');
var headerCtaStyles = document.getElementsByClassName('cta-header')[0];
// Modal variables
var modalButton = document.getElementById('modalButton');
var successModal = document.getElementById('successModal');
var successWrapper = document.getElementById('successWrapper');
var closeSuccess = document.getElementById('closeSuccess');


// Function setting the page content to sit below the navigation (mobile only)
function setBuffer() {
    navHeight = navStyles.getPropertyValue('height');
    pageBuffer.style.height = navHeight;
    if(window.innerWidth < 1200){
        parsedNavHeight = parseInt(navHeight);
        if(headerCta){
            ctaHeight = headerCta.scrollHeight;
            pageBuffer.style.height = parsedNavHeight + ctaHeight + 'px';
        } else {
            pageBuffer.style.height = parsedNavHeight + 'px';
        }
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
        mobileNavContent.style.overflow = 'hidden';
        if(headerCta){
            pageBuffer.style.height = parsedNavHeight + ctaHeight + 'px';
            headerCta.style.backgroundColor = '#3EAB46';
            headerCta.style.color = '#FFF';
            if ((window.innerWidth >= 600) && (window.innerWidth < 1200)){
                headerCta.style.width = '100%';
                headerCta.style.boxSizing = 'content-box';
            }
        } else{
            pageBuffer.style.height = parsedNavHeight + 'px';
        }
        
    } else{
        // Setting the mobile nav position based on navbar height
        var mobileNavDiv = document.getElementsByClassName('nav')[0];
        if(mobileNavContent.scrollHeight + parsedNavHeight > document.documentElement.clientHeight){
            mobileNavContent.style.maxHeight = (document.documentElement.clientHeight - parsedNavHeight) + 'px';
            mobileNavContent.style.overflow = 'scroll';
        } else if(headerCta && (mobileNavContent.scrollHeight + parsedNavHeight + ctaHeight > document.documentElement.clientHeight)){
                mobileNavContent.style.maxHeight = (document.documentElement.clientHeight - parsedNavHeight - ctaHeight) + 'px';
                mobileNavContent.style.overflow = 'scroll';
        }else{
            mobileNavContent.style.maxHeight = mobileNavContent.scrollHeight + 'px';
        }
        dropshadow.style.opacity = '0.4';
        dropshadow.style.pointerEvents = 'auto';
        document.body.style.overflow = 'hidden';
        pageBuffer.style.height = 0;
        // Change CTA styles
        if(headerCta){
            mobileNavDiv.style.top = parsedNavHeight + ctaHeight + 'px';
            headerCta.style.backgroundColor = '#444';
            headerCta.style.color = '#3EAB46';
            if ((window.innerWidth >= 600) && (window.innerWidth <= 1200)){
                headerCta.style.width = '400px';
                headerCta.style.boxSizing = 'border-box';
            }
        } else{
            mobileNavDiv.style.top = parsedNavHeight + 'px';
        }
    }
}

hamburgerButton.addEventListener('click', toggleMenu, false);

dropshadow.addEventListener('click', toggleMenu, false);

// Functions controlling drop-down services menu (desktop only)

// Function that finds/loops dropdown event listeners
var setDropdownEventListeners = function(){
    for (i = 0; i < dropdownElement.length; i++) { 
        addEventListeners(i);
    }
    
}();

// Function that sets event listeners
function addEventListeners(n){

    dropdownButton.addEventListener('mouseover', function(){openDropdown(n)}, false);
        
    document.addEventListener('mouseover', function(event) {
        var isOver = dropdownElement[n].contains(event.target);

        if (!isOver) {
            dropdownContent[n].style.maxHeight = null;
        }
    });
}

function openDropdown(n){
    dropdownContent[n].style.maxHeight = dropdownContent[n].scrollHeight + 'px';
}

function closeSuccessModal(){
    successWrapper.style.display = 'none';
}

if(closeSuccess){
    closeSuccess.addEventListener('click', closeSuccessModal, false);
}

if(successWrapper){
    window.onclick = function(event) {
      if (event.target == successWrapper) {
        successWrapper.style.display = "none";
      }
    }
}

// SWIPERS 

// Slide show

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

// Testimonials

var swiper2 = new Swiper('.swiper2', {
  slidesPerView: 1,
  loop: true,   
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
  autoplay: {
    delay: 12000,
  }
});

var swiper3 = new Swiper('.swiper3', {
  slidesPerView: 3,
  loop: true,
  navigation: {
    nextEl: '.custom-swiper-button-next',
    prevEl: '.custom-swiper-button-prev',
  },  
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
  },
  autoplay: {
    delay: 12000,
  }
});

// END