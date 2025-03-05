let holder = document.querySelectorAll("[data-sliderz-main]");

holder.forEach((el) => {
  let data_slider_controller = document.querySelectorAll(
    "[data-slider_controller]"
  );
  let slides = el.querySelectorAll("[data-tab]");
  let indicator = el.querySelector("[data-sliderz-indicator]");
  let slide_amount = slides.length;

  // FIRST AND LAST CONFIGURATION
  set_limits();

  // DATA-CONFIGURATION-TYPE Includes {normal, left}
  for (let i = 0; i < slide_amount; i++) {
    indicator.innerHTML += `<i class="fa-solid fa-circle" data-sliderz-indicator-child></i>`
  }

  let indicators = el.querySelectorAll("[data-sliderz-indicator-child]");


  if (el.dataset.counterType == "normal") {
    slider_normal_data_tab_count();
  } else {
    slider_left_data_tab_count();
  }

  document.querySelector(`[data-sliderz-indicator-child="0"]`).classList.add('active')

  let current_slider_item = document.querySelectorAll('[data-tab="0"]');
  let counter_pos = current_slider_item[0].dataset.tab;
  let index_current = 1;

  if (current_slider_item.length < 2) {
    index_current = 0;
  }

  data_slider_controller.forEach((el) => {
    el.addEventListener("click", slidor);
  });

  function slidor(events) {
    let slider_direction = events.target.closest("[data-slider_controller]")
      .dataset.slider_controller;

    if (
      (current_slider_item[index_current].dataset.sliderItem == "last" &&
        slider_direction == "right") ||
      (current_slider_item[index_current].dataset.sliderItem == "first" &&
        slider_direction == "left")
    ) {
      return;
    }

    current_slider_item.forEach((el) => {
      el.classList.remove("active");
    });

    let previous_width = current_slider_item[index_current].offsetWidth;

    if (slider_direction == "right") {
      counter_pos--;
    } else {
      counter_pos++;
    }

    current_indicator = document.querySelector(
       `[data-sliderz-indicator-child="${counter_pos}"]`
    )
    
    indicators.forEach(element => {
      element.classList.remove('active')
  });
    current_indicator.classList.add('active')

    current_slider_item = document.querySelectorAll(
      `[data-tab="${counter_pos}"]`
    );

    current_slider_item.forEach((el) => {
      el.classList.add("active");
    });

    let track = el.querySelector("[data-slider-track]")
    let gap = window.getComputedStyle(track).gap;
    let calc_gap = gap.split('').filter((e, ind)=>{
      return !isNaN(Number(e)) && typeof  Number(e) === 'number'
    })

    track.style.transform =
      `translateX(` +
      (previous_width + Number(calc_gap.join(''))) *
        Number(current_slider_item[index_current].dataset.tab) +
      "px" +
      ")";
  }

  // CLICK ONLY
  let slider_holder = document.querySelector("[data-slider-holder]");
  let tab_content = document.querySelector(".tab-content");

  
  slider_holder.querySelectorAll("[data-tab]").forEach((link) => {
    link.addEventListener("click", function () {
      
      let previous_width = current_slider_item[index_current].offsetWidth;
      
      current_slider_item = document.querySelectorAll(
        `[data-tab="${link.dataset.tab}"]`
      );
      counter_pos = current_slider_item[index_current].dataset.tab;

      current_indicator = document.querySelector(
        `[data-sliderz-indicator-child="${link.dataset.tab}"]`
     )
     
     indicators.forEach(element => {
       element.classList.remove('active')
   });
   
     current_indicator.classList.add('active')

      tab_content
        .querySelectorAll("[data-tab]")
        .forEach((el) => el.classList.remove("active"));

      slider_holder.querySelectorAll("[data-tab]").forEach((link) => {
        link.classList.remove("active");
      });
      link.classList.add("active");

      let track = el.querySelector("[data-slider-track]")
      let gap = window.getComputedStyle(track).gap;
      let calc_gap = gap.split('').filter((e, ind)=>{
        return !isNaN(Number(e)) && typeof  Number(e) === 'number'
      })
      
      track.style.transform =
        `translateX(` +
        (previous_width + Number(calc_gap.join(''))) *
          Number(current_slider_item[index_current].dataset.tab) +
        "px" +
        ")";

      tab_content
        .querySelector(`[data-tab="${link.dataset.tab}"]`)
        .classList.add("active");
    });
  });

  function set_limits(params) {
    slides[0].dataset.sliderItem = "first";
    slides[slide_amount - 1].dataset.sliderItem = "last";
  }

  function slider_normal_data_tab_count() {
    //how do we do the math
    // 4 items -> [-1, 0, 1, 2];
    // most right have to be divided by 2 (maximum number for the odd)
    // most left have to be the result of the division minus 1 and times -1
    // how do we do the for loop for increment and decrement these results

    let most_left_position = Math.floor(slide_amount / 2);
    let most_right_position = (Math.ceil(slide_amount / 2) - 1) * -1;

    let left_pos = [];
    let right_pos = [];

    while (true) {
      if (most_left_position == 0) {
        break;
      }
      left_pos.push(most_left_position);
      most_left_position--;
    }

    while (true) {
      if (most_right_position == 0) {
        break;
      }
      right_pos.push(most_right_position);
      most_right_position++;
    }

    let zero = [0];
    let tab_amount = left_pos.concat(zero, right_pos.reverse());

    tab_amount.forEach((el, ind) => {
      slides[ind].dataset.tab = el;
      indicators[ind].dataset.sliderzIndicatorChild = el;
    });
  }

  function slider_left_data_tab_count(params) {
    for (let i = 0; i > slide_amount * -1; i--) {
      slides[i * -1].dataset.tab = i;
      indicators[i * -1].dataset.sliderzIndicatorChild = i;
    }
  }
});
