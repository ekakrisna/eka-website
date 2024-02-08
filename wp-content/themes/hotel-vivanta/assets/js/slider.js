(function() {
  var $slides = document.querySelectorAll('.slide');
  var $controls = document.querySelectorAll('.slider__control');
  var numOfSlides = $slides.length;
  var slidingAT = 1300; // sync this with scss variable
  var slidingBlocked = false;

  [].slice.call($slides).forEach(function($el, index) {
    var i = index + 1;
    $el.classList.add('slide-' + i);
    $el.dataset.slide = i;
  });

  [].slice.call($controls).forEach(function($el) {
    $el.addEventListener('click', hotel_vivanta_controlClickHandler);
  });

  function hotel_vivanta_controlClickHandler() {
    if (slidingBlocked) return;
    slidingBlocked = true;

    var $control = this;
    var isRight = $control.classList.contains('m--right');
    var $curActive = document.querySelector('.slide.s--active');
    var index = +$curActive.dataset.slide;
    (isRight) ? index++ : index--;
    if (index < 1) index = numOfSlides;
    if (index > numOfSlides) index = 1;
    var $newActive = document.querySelector('.slide-' + index);

    $control.classList.add('a--rotation');
    $curActive.classList.remove('s--active', 's--active-prev');
    document.querySelector('.slide.s--prev').classList.remove('s--prev');

    $newActive.classList.add('s--active');
    if (!isRight) $newActive.classList.add('s--active-prev');


    var prevIndex = index - 1;
    if (prevIndex < 1) prevIndex = numOfSlides;

    document.querySelector('.slide-' + prevIndex).classList.add('s--prev');

    setTimeout(function() {
      $control.classList.remove('a--rotation');
      slidingBlocked = false;
    }, slidingAT*0.75);
  };
}());


const items = document.querySelectorAll('.slider-item');
const itemCount = items.length;
const nextItem = document.querySelector('.next');
const previousItem = document.querySelector('.previous');
const navItem = document.querySelector('a.toggle-nav');
let count = 0;

function hotel_vivanta_showNextItem() {
  items[count].classList.remove('active');

  if(count < itemCount - 1) {
    count++;
  } else {
    count = 0;
  }

  items[count].classList.add('active');
  console.log(count);
}

function hotel_vivanta_showPreviousItem() {
  items[count].classList.remove('active');

  if(count > 0) {
    count--;
  } else {
    count = itemCount - 1;
  }

  items[count].classList.add('active');
  // Check if working...
  console.log(count);
}

function hotel_vivanta_toggleNavigation(){
  this.nextElementSibling.classList.toggle('active');
}

function keyPress(e) {
  e = e || window.event;

  if (e.keyCode == '37') {
    hotel_vivanta_showPreviousItem();
  } else if (e.keyCode == '39') {
    hotel_vivanta_showNextItem();
  }
}

nextItem.addEventListener('click', hotel_vivanta_showNextItem);
previousItem.addEventListener('click', hotel_vivanta_showPreviousItem);
document.addEventListener('keydown', keyPress);

var supportsCssVars = function() { var e, t = document.createElement("style"); return t.innerHTML = "root: { --tmp-var: bold; }", document.head.appendChild(t), e = !!(window.CSS && window.CSS.supports && window.CSS.supports("font-weight", "var(--tmp-var)")), t.parentNode.removeChild(t), e };

