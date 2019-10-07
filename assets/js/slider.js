const OnePictureSlider = function(options) {
  this.container = options.container;
  this.images = options.images;
  this.prevBtn = options.prevBtn;
  this.nextBtn = options.nextBtn;
  this.updateInterval = options.updateInterval || 5000;
  this._current = 0;
  this._intervalID = 0;

  this.getCurrentSlide = function() {
    return this._current;
  };

  this.init = function() {
    // Disable slider if no images received
    if (!this.images || !this.images.length) return;

    this.addStyles();
    this._changeSlide();
    this.initEventListeners();
    this.setIntervalChanging();
  };
};

OnePictureSlider.prototype._changeSlide = function() {
  this.images.forEach(img => img.classList.add('mst-ops-hidden'));
  this.images[this._current].classList.remove('mst-ops-hidden');
};

OnePictureSlider.prototype.setIntervalChanging = function() {
  this._intervalID = setInterval(() => this.next(), this.updateInterval);
};

OnePictureSlider.prototype.removeIntervalChanging = function() {
  if (this._intervalID) {
    clearInterval(this._intervalID);
    this._intervalID = 0;
    this.updateIntervalChanging();
  }
};

// Reset interval update after removing it (user clicked on slide or swiped it)
OnePictureSlider.prototype.updateIntervalChanging = function() {
  if (!this._intervalID) {
    setTimeout(() => this.setIntervalChanging(), 8000);
  }
};

OnePictureSlider.prototype._decSlide = function() {
  if (this.images[this._current - 1]) {
    this._current -= 1;
  } else {
    this._current = this.images.length - 1;
  }
};

OnePictureSlider.prototype._incSlide = function() {
  if (this.images[this._current + 1]) {
    this._current += 1;
  } else {
    this._current = 0;
  }
};

OnePictureSlider.prototype.prev = function() {
  this._decSlide();
  this._changeSlide();
};

OnePictureSlider.prototype.next = function() {
  this._incSlide();
  this._changeSlide();
};

OnePictureSlider.prototype.detectSwipe = function() {
  const h = new Hammer(this.container);
  h.on('swipe', (e) => {
    this.removeIntervalChanging();
    if (e.direction === Hammer.DIRECTION_LEFT) {
      this.next();
    } else if (e.direction === Hammer.DIRECTION_RIGHT) {
      this.prev();
    }
  });
};

OnePictureSlider.prototype.initEventListeners = function() {
  if (this.prevBtn) {
    this.prevBtn.addEventListener('click', () => {
      this.prev();
      this.removeIntervalChanging();
    });
  }

  if (this.nextBtn) {
    this.nextBtn.addEventListener('click', () => {
      this.next();
      this.removeIntervalChanging();
    });
  }

  if (typeof Hammer === 'function') {
    this.detectSwipe();
  } else {
    console.warn('Please, define Hammer.js to enabling swipe slide changing');
  }
};

OnePictureSlider.prototype.addStyles = function() {
  const style = document.createElement('style');
  style.innerHTML = `
    .mst-ops-hidden {
      display: none !important;
    }
  `;
  document.body.appendChild(style);
};
