var tl = new TimelineMax();

Banner = function() {
  this.size = {
    width: 728,
    height: 90
  };

  this.images = {
    background: {
      path: './images/background.jpg',
      frames: 12,
      frameDuration: 0.25,
      loopDelay: 0.15,
      horizontal: false,
      loop: 8
    },
    logoYoutube: {
      path: './images/youtube-logo.png'
    }
  };

  this.dom = {};
  this.sections = {};

  this.preInit();
};


Banner.prototype.preInit = function() {
  this.setupDom();
  this.setupSections();

  this.setElementSize(this.dom.container, this.size, 0);

  this.enablerShorthand(Enabler.isInitialized(), studio.events.StudioEvent.INIT,
      this.preloadImages.bind(this));
};


Banner.prototype.preloadImages = function() {
  var i = 0;
  var imageGroup = Object.keys(this.images);

  imageGroup.forEach(function(id) {
    var texture = new Image();
    texture.src = this.images[id].path + '?v=' + new Date().getTime();
    texture.onload = function(event) {
      this.images[id].texture = event.target;

      i++;
      if (i === imageGroup.length) {
        this.init();
      }
    }.bind(this);
  }.bind(this));
};


Banner.prototype.setupDom = function() {
  this.dom.body = document.body;
  this.dom.container = document.getElementById('container');
  this.dom.logoContainer = document.getElementById('logo');
  this.dom.sections = document.getElementsByTagName('section');
};


Banner.prototype.checkPageLoad = function() {
  this.enablerShorthand(Enabler.isPageLoaded(), studio.events.StudioEvent.PAGE_LOADED,
    this.init.bind(this));
};


Banner.prototype.init = function() {
  this.setActiveSection(this.sections.start);

  var img = this.images.background;

  var el = document.createElement('div');
  el.className = 'pngseq';

  img.horizontal ? img.texture.classList.add('height') : img.texture.classList.add('width');

  var newSize = {
    width: this.size.width,
    height: this.size.height * this.images.background.frames
  };

  this.setElementSize(img.texture, newSize, 0);

  img.texture.style.width = this.size.width;
  img.texture.style.height = this.size.height * this.images.background.frames;
  img.texture.classList.add('image');

  el.appendChild(img.texture);

  this.appendElement(el, this.dom.container);

  this.pngSequence(img);

  this.appendElement(this.images.logoYoutube.texture, this.dom.logoContainer);
  this._addEventListeners();
};

Banner.prototype._addEventListeners = function() {
  window.addEventListener('click', this.exitClickHandler.bind(this));
};

/**
 * Background exit = stop the animation.
 */
Banner.prototype.exitClickHandler = function() {
  tl.pause();
  Enabler.exit('BackgroundExit');
  //window.open(window.clickTag);
};


Banner.prototype.pngSequence = function(textureObject) {
  var a = textureObject;

  if (a.horizontal) {
    tl.to(
      a.texture,
      a.frameDuration * a.frames,
      {
        x: -(a.texture.offsetWidth - (a.texture.offsetWidth / a.frames)),
        ease: SteppedEase.config(a.frames - 1),
        repeat: a.loop,
        repeatDelay: a.loopDelay
      }
    );
 } else {
    tl.to(
      a.texture,
      a.frameDuration * a.frames,
      {
        y: -(a.texture.offsetHeight - (a.texture.offsetHeight / a.frames)),
        ease: SteppedEase.config(a.frames - 1),
        repeat: a.loop,
        repeatDelay: a.loopDelay
      }
    );
  }

  setTimeout(function() {
    console.log('10 seconds passed');
  }, 10000);

  setTimeout(function() {
    console.log('20 seconds passed');
  }, 10000);

  setTimeout(function() {
    console.log('stopped');
    tl.pause();
  }, 29000)
};



// Helpers.
Banner.prototype.setActiveSection = function(section) {
  this.sections[this.dom.container.className].classList.remove('active');
  this.dom.container.className = section.id;
  section.classList.add('active');

  this.setElementOpacity(section, 1, 1);
};


Banner.prototype.appendElement = function(element, parent) {
  parent.appendChild(element);
};


Banner.prototype.setElementOpacity = function(element, opacity, duration) {
  tl.to(element, duration, {opacity: opacity, ease: Power1.easeInOut});
};


Banner.prototype.setElementSize = function(element, size, duration) {
  if (size.width && size.height) {
    tl.to(element, duration, {width: size.width, height: size.height, ease: Power1.easeInOut});
  } else if (size.width) {
    tl.to(element, duration, {width: size.width, ease: Power1.easeInOut});
  } else if (size.height) {
    tl.to(element, duration, {height: size.height, ease: Power1.easeInOut});
  }
};


Banner.prototype.setupSections = function() {
  for (var i = this.dom.sections.length - 1; i >= 0; i--) {
    var section = this.dom.sections[i];
    this.sections[section.id] = section;
  }
};


Banner.prototype.enablerShorthand = function(arg, listener, funct) {
  arg ? funct : Enabler.addEventListener(listener, funct);
};



function newBanner() {
  var banner = new Banner;
};

window.addEventListener('load', newBanner);
