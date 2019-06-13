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
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/assets/js/jquery.orgchart.js":
/*!************************************************!*\
  !*** ./resources/assets/js/jquery.orgchart.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function ($) {
  $.fn.orgChart = function (options) {
    var opts = $.extend({}, $.fn.orgChart.defaults, options);
    return new OrgChart($(this), opts);
  };

  $.fn.orgChart.defaults = {
    data: [{
      id: 1,
      name: 'Root',
      parent: 0
    }],
    showControls: false,
    allowEdit: false,
    onAddNode: null,
    onDeleteNode: null,
    onClickNode: null,
    newNodeText: 'Add Child'
  };

  function OrgChart($container, opts) {
    var data = opts.data;
    var nodes = {};
    var rootNodes = [];
    this.opts = opts;
    this.$container = $container;
    var self = this;

    this.draw = function () {
      $container.empty().append(rootNodes[0].render(opts));
      $container.find('.node').click(function () {
        if (self.opts.onClickNode !== null) {
          self.opts.onClickNode(nodes[$(this).attr('node-id')]);
        }
      });

      if (opts.allowEdit) {
        $container.find('.node h2').click(function (e) {
          var thisId = $(this).parent().attr('node-id');
          self.startEdit(thisId);
          e.stopPropagation();
        });
      } // add "add button" listener


      $container.find('.org-add-button').click(function (e) {
        var thisId = $(this).parent().attr('node-id');

        if (self.opts.onAddNode !== null) {
          self.opts.onAddNode(nodes[thisId]);
        } else {
          self.newNode(thisId);
        }

        e.stopPropagation();
      });
      $container.find('.org-del-button').click(function (e) {
        var thisId = $(this).parent().attr('node-id');

        if (self.opts.onDeleteNode !== null) {
          self.opts.onDeleteNode(nodes[thisId]);
        } else {
          self.deleteNode(thisId);
        }

        e.stopPropagation();
      });
    };

    this.startEdit = function (id) {
      var inputElement = $('<input class="org-input" type="text" value="' + nodes[id].data.name + '"/>');
      $container.find('div[node-id=' + id + '] h2').replaceWith(inputElement);

      var commitChange = function commitChange() {
        var h2Element = $('<h2>' + nodes[id].data.name + '</h2>');

        if (opts.allowEdit) {
          h2Element.click(function () {
            self.startEdit(id);
          });
        }

        inputElement.replaceWith(h2Element);
      };

      inputElement.focus();
      inputElement.keyup(function (event) {
        if (event.which == 13) {
          commitChange();
        } else {
          nodes[id].data.name = inputElement.val();
        }
      });
      inputElement.blur(function (event) {
        commitChange();
      });
    };

    this.newNode = function (parentId) {
      var nextId = Object.keys(nodes).length;

      while (nextId in nodes) {
        nextId++;
      }

      self.addNode({
        id: nextId,
        name: '',
        parent: parentId
      });
    };

    this.addNode = function (data) {
      var newNode = new Node(data);
      nodes[data.id] = newNode;
      nodes[data.parent].addChild(newNode);
      self.draw();
      self.startEdit(data.id);
    };

    this.deleteNode = function (id) {
      for (var i = 0; i < nodes[id].children.length; i++) {
        self.deleteNode(nodes[id].children[i].data.id);
      }

      nodes[nodes[id].data.parent].removeChild(id);
      delete nodes[id];
      self.draw();
    };

    this.getData = function () {
      var outData = [];

      for (var i in nodes) {
        outData.push(nodes[i].data);
      }

      return outData;
    }; // constructor


    for (var i in data) {
      var node = new Node(data[i]);
      nodes[data[i].id] = node;
    } // generate parent child tree


    for (var i in nodes) {
      if (nodes[i].data.parent == 0) {
        rootNodes.push(nodes[i]);
      } else {
        nodes[nodes[i].data.parent].addChild(nodes[i]);
      }
    } // draw org chart


    $container.addClass('orgChart');
    self.draw();
  }

  function Node(data) {
    this.data = data;
    this.children = [];
    var self = this;

    this.addChild = function (childNode) {
      this.children.push(childNode);
    };

    this.removeChild = function (id) {
      for (var i = 0; i < self.children.length; i++) {
        if (self.children[i].data.id == id) {
          self.children.splice(i, 1);
          return;
        }
      }
    };

    this.render = function (opts) {
      var childLength = self.children.length,
          mainTable;
      mainTable = "<table cellpadding='0' cellspacing='0' border='0'>";
      var nodeColspan = childLength > 0 ? 2 * childLength : 2;
      mainTable += "<tr><td colspan='" + nodeColspan + "'>" + self.formatNode(opts) + "</td></tr>";

      if (childLength > 0) {
        var downLineTable = "<table cellpadding='0' cellspacing='0' border='0'><tr class='lines x'><td class='line left half'></td><td class='line right half'></td></table>";
        mainTable += "<tr class='lines'><td colspan='" + childLength * 2 + "'>" + downLineTable + '</td></tr>';
        var linesCols = '';

        for (var i = 0; i < childLength; i++) {
          if (childLength == 1) {
            linesCols += "<td class='line left half'></td>"; // keep vertical lines aligned if there's only 1 child
          } else if (i == 0) {
            linesCols += "<td class='line left'></td>"; // the first cell doesn't have a line in the top
          } else {
            linesCols += "<td class='line left top'></td>";
          }

          if (childLength == 1) {
            linesCols += "<td class='line right half'></td>";
          } else if (i == childLength - 1) {
            linesCols += "<td class='line right'></td>";
          } else {
            linesCols += "<td class='line right top'></td>";
          }
        }

        mainTable += "<tr class='lines v'>" + linesCols + "</tr>";
        mainTable += "<tr>";

        for (var i in self.children) {
          mainTable += "<td colspan='2'>" + self.children[i].render(opts) + "</td>";
        }

        mainTable += "</tr>";
      }

      mainTable += '</table>';
      return mainTable;
    };

    this.formatNode = function (opts) {
      var nameString = '',
          descString = '';

      if (typeof data.name !== 'undefined') {
        nameString = '<h2>' + self.data.name + '</h2>';
      }

      if (typeof data.description !== 'undefined') {
        descString = '<p>' + self.data.description + '</p>';
      }

      if (opts.showControls) {
        var buttonsHtml = "<div class='org-add-button'>" + opts.newNodeText + "</div><div class='org-del-button'></div>";
      } else {
        buttonsHtml = '';
      }

      return "<div class='node' node-id='" + this.data.id + "'>" + nameString + descString + buttonsHtml + "</div>";
    };
  }
})(jQuery);

/***/ }),

/***/ 3:
/*!******************************************************!*\
  !*** multi ./resources/assets/js/jquery.orgchart.js ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\FrontEnd\OSPanel\domains\hierarchies\resources\assets\js\jquery.orgchart.js */"./resources/assets/js/jquery.orgchart.js");


/***/ })

/******/ });