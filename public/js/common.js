/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/common.js":
/*!***************************************!*\
  !*** ./resources/assets/js/common.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// (function(){
// 	'use strict';
//
// });
$('document').ready(function () {
  // pop_up veriabel
  var statePop = 0; // hover pop_up

  $(function () {
    // hover on the <.pop_up_in .nav-pop_up>
    $('.pop_up_in .nav-pop_up').hover(function () {
      $(this).animate({
        'z-index': '10'
      }, 100).animate({
        'width': '22%'
      }, 100, 'linear');
    }, function () {
      $(this).animate({
        'width': '20%'
      }, 100, 'linear').animate({
        'z-index': '2'
      }, 100); // $(this).removeAttr('style');
    }); // hover on the <.pop_up_in .nav-pop_up>
    // hover on the <.pop_up_in .sign-in>

    $('.pop_up_in .sign-in').hover(function () {
      if (statePop == 0) {
        $(this).animate({
          'width': '42%'
        }, 100, 'linear');
        $('.pop_up_in .sign-add').animate({
          'width': '38%'
        }, 100, 'linear');
      } else if (statePop == 2) {
        $('.pop_up_in .sign-add').animate({
          'width': '58%'
        }, 100, 'swing');
        $(this).animate({
          'width': '22%'
        }, 100, 'swing');
      }
    }, function () {
      if (statePop == 0) {
        $('.pop_up_in .sign-add').animate({
          'width': '40%'
        }, 100, 'linear');
        $(this).animate({
          'width': '40%'
        }, 100, 'linear');
      } else if (statePop == 2) {
        $('.pop_up_in .sign-add').animate({
          'width': '60%'
        }, 100, 'swing');
        $(this).animate({
          'width': '20%'
        }, 100, 'swing');
      }
    }); // hover on the <.pop_up_in .sign-in>
    // hover on the <.pop_up_in .sign-add>

    $('.pop_up_in .sign-add').hover(function () {
      if (statePop == 0) {
        $(this).animate({
          'width': '42%'
        }, 100, 'linear');
        $('.pop_up_in .sign-in').animate({
          'width': '38%'
        }, 100, 'linear');
      } else if (statePop == 1) {
        $('.pop_up_in .sign-in').animate({
          'width': '58%'
        }, 100, 'swing');
        $(this).animate({
          'width': '24%'
        }, 100, 'swing');
      }
    }, function () {
      if (statePop == 0) {
        $('.pop_up_in .sign-in').animate({
          'width': '40%'
        }, 100, 'linear');
        $(this).animate({
          'width': '40%'
        }, 100, 'linear');
      } else if (statePop == 1) {
        $('.pop_up_in .sign-in').animate({
          'width': '60%'
        }, 100, 'swing');
        $(this).animate({
          'width': '20%'
        }, 100, 'swing');
      }
    }); // hover on the <.pop_up_in .sign-add>
  }); // hover pop_up
  // pop_up on click

  $(function () {
    $('.pop_up_in .nav-pop_up').click(function () {
      statePop = 0;
      $('.pop_up_in').find('.small-icon').removeClass('small-icon');
      $('.shade').animate({
        'z-index': '10'
      }, "fast").animate({
        'width': '100%',
        opacity: '1'
      }, 400, 'swing').animate({
        'left': '100%',
        opacity: '0'
      }, "fast", 'linear', function () {
        $('.shade').removeAttr("style");
        $('.pop_up_in .sign-in').removeAttr("style");
        $('.pop_up_in .sign-add').removeAttr("style");
      });
      $('.pop_up_in .sign-add .wr-content-form').fadeOut("fast");
      $('.pop_up_in .sign-in .wr-content-form').fadeOut("fast");
      $('.pop_up_in .wr-btn').fadeIn("slow");
      $('.pop_up_in').find('small-icon').removeClass('small-icon');
      dotsPopup('.nav-pop_up .dots-pop_up');
    });
    $('.pop_up_in .sign-in').click(function () {
      statePop = 1;
      $(this).animate({
        'width': '60%'
      }, "fast");
      $('.pop_up_in .sign-add').animate({
        'width': '20%'
      }, "fast");
      showFomr();
      $('.pop_up_in .sign-add .wr-btn').fadeIn();

      if ($('.pop_up_in .sign-add .wr-btn').attr('class') != 'small-icon') {
        $('.pop_up_in .sign-add .wr-btn').addClass('small-icon');
      }
    });
    $('.pop_up_in .sign-add').click(function () {
      statePop = 2;
      $(this).animate({
        'width': '60%'
      }, "fast");
      $('.pop_up_in .sign-in').animate({
        'width': '20%'
      }, "fast");
      showFomr();
      $('.pop_up_in .sign-in .wr-btn').fadeIn();

      if ($('.pop_up_in .sign-in .wr-btn').attr('class') != 'small-icon') {
        $('.pop_up_in .sign-in .wr-btn').addClass('small-icon');
      }
    });
  });

  function showFomr() {
    if (statePop == 1) {
      $('.pop_up_in .sign-in .wr-btn').fadeOut("fast");
      $('.pop_up_in .sign-in .wr-content-form').fadeIn("slow");
      $('.pop_up_in .sign-add .wr-content-form').fadeOut("fast");
      dotsPopup('.nav-pop_up .dots-sign-in');
    }

    if (statePop == 2) {
      $('.pop_up_in .sign-add .wr-btn').fadeOut("fast");
      $('.pop_up_in .sign-add .wr-content-form').fadeIn("slow");
      $('.pop_up_in .sign-in .wr-content-form').fadeOut("fast");
      dotsPopup('.nav-pop_up .dots-sign-add');
    }
  }

  function dotsPopup(element) {
    $('.nav-pop_up .popup-dots').each(function (i, el) {
      $(el).parent().removeClass('active');
      $(element).parent().addClass('active');
    });
  } // pop_up on click
  // js-numeric


  function getNumeric() {
    var $tBody = $('.form-horizontal');
    var _NUMBER = 1;
    $tBody.each(function (i, el) {
      var self = $(this);
      $tr = $(this).find('tr'); // row

      $tr.each(function (i, row) {
        // Numeric element
        var $td = $(this).find('td');
        var $input = $td.eq(i).find('input');
        $input.addClass('is-equator');
        $input.val(_NUMBER);
        $input.addClass('disabled'); // td in row

        $td.each(function (j, el) {
          // Disabled element
          if (j !== 0 && j < i) {
            $(this).find('input').addClass('disabled is-action');
            $(this).find('input').parent().attr('title', _NUMBER + '/x');
          } // Active element


          if (j !== 0 && j > i) {
            $(this).find('input').val(0);
            $(this).find('input').addClass('is-active');
            $(this).find('input').on('keyup', function () {
              var self_event = $(this);
              var arrayActive = [];
              var arrayDisabled = [];
              var isActive = $(self).find('.is-active');
              var isDisabled = $(self).find('.is-action');
              var self_tr = $(self).find('tr');
              var self_td = $(self_tr).eq(1).find('td');

              for (var i = 1; i < self_td.length; i++) {
                for (var j = 1; j < self_tr.length; j++) {
                  var input = $(self_tr).eq(j).find('td').eq(i).find('input');

                  if (!$(input).hasClass('is-active') && !$(input).hasClass('is-equator')) {
                    var input_disabled = $(self_tr).eq(j).find('td').eq(i).find('input');
                    arrayDisabled.push(input_disabled.val());
                  }

                  if ($(input).hasClass('is-active')) {
                    var input_active = $(self_tr).eq(j).find('td').eq(i).find('input');
                    arrayActive.push(input_active.val());
                  }
                } // for(var j = 1; j < self_td.length; j++){
                // 	console.log('input - ', $(self_td).eq(i).val());
                //
                // 	let input_val = $(self_td).eq(i).val();
                // 	arrayActive = [].concat(... input_val);
                //
                // }

              }

              console.log('arrayActive - ', arrayActive);
              console.log('arrayDisabled - ', arrayDisabled); // arrayDisabled && arrayActive ?
              // 	isDisabled.forEach((action,i)=>{action.value = _NUMBER/isActive[i].value !== Infinity ?
              // 		(_NUMBER/isActive[i].value).toFixed(2) :
              // 		0
              // 	})
              // 	: null;

              arrayDisabled && arrayActive ? $(arrayActive).each(function (i, input) {
                isDisabled[i].value = _NUMBER / arrayActive[i] !== Infinity ? (_NUMBER / arrayActive[i]).toFixed(3) : 0;
              }) : null;
            });
          }
        });
      });
    });
  }

  getNumeric(); // js-numeric
  // Generation Alternative-create

  function getAlternativeCreate() {
    var AlternativeSelect = $('#AlternativeSelect');
    var AlternativeInput = $('#FieldCriteria .DynamicExtraField');
    $(AlternativeSelect).on('change', function () {
      AlternativeInput.hide();
      var str = "";
      $(AlternativeSelect).find("option:selected").each(function () {
        str += $(this).text() + " ";
      });
      console.log(parseInt(str));

      for (var i = 0; i < parseInt(str); i++) {
        AlternativeInput.eq(i).show();
      }
    }).trigger("change");
  }

  getAlternativeCreate(); // Generation Alternative-create
});

/***/ }),

/***/ 1:
/*!*********************************************!*\
  !*** multi ./resources/assets/js/common.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/alex/Dip/untitled2/resources/assets/js/common.js */"./resources/assets/js/common.js");


/***/ })

/******/ });