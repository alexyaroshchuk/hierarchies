/*!
 * jquery.drawDoughnutChart.js
 * Version: 0.4(Beta)
 * Inspired by Chart.js(http://www.chartjs.org/)
 *
 * Copyright 2014 hiro
 * https://github.com/githiro/drawDoughnutChart
 * Released under the MIT license.
 *
 */
;(function($, undefined) {
  $.fn.drawDoughnutChart = function(data, options) {
    var $this = this,
      W = 200,
      H = 200,
      centerX = W/2,
      centerY = H/2,
      cos = Math.cos,
      sin = Math.sin,
      PI = Math.PI,
      settings = $.extend({
        segmentShowStroke : true,
        segmentStrokeColor : "#0C1013",
        segmentStrokeWidth : 1,
        baseColor: "rgba(0,0,0,0.5)",
        baseOffset: 4,
        edgeOffset : 10,//offset from edge of $this
        percentageInnerCutout : 75,
        animation : true,
        animationSteps : 90,
        animationEasing : "easeInOutExpo",
        animateRotate : true,
        tipOffsetX: -8,
        tipOffsetY: -45,
        showTip: true,
        showLabel: false,
        ratioFont: 1.5,
        shortInt: false,
        tipClass: "doughnutTip",
        tipUnit: "",
        summaryClass: "doughnutSummary",
        summaryTitle: "TOTAL:",
        summaryTitleClass: "doughnutSummaryTitle",
        summaryNumberClass: "doughnutSummaryNumber",
        beforeDraw: function() {  },
        afterDrawed : function() {  },
        onPathEnter : function(e,data) {  },
        onPathLeave : function(e,data) {  }
      }, options),
      animationOptions = {
        linear : function (t) {
          return t;
        },
        easeInOutExpo: function (t) {
          var v = t<.5 ? 8*t*t*t*t : 1-8*(--t)*t*t*t;
          return (v>1) ? 1 : v;
        }
      },
      requestAnimFrame = function() {
        return window.requestAnimationFrame ||
          window.webkitRequestAnimationFrame ||
          window.mozRequestAnimationFrame ||
          window.oRequestAnimationFrame ||
          window.msRequestAnimationFrame ||
          function(callback) {
            window.setTimeout(callback, 1000 / 60);
          };
      }();

    settings.beforeDraw.call($this);

    var $svg = $('<svg width="' + W + '" height="' + H + '" viewBox="0 0 ' + W + ' ' + H + '" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"></svg>').appendTo($this),
        $paths = [],
        easingFunction = animationOptions[settings.animationEasing],
        doughnutRadius = Min([H / 2,W / 2]) - settings.edgeOffset,
        cutoutRadius = doughnutRadius * (settings.percentageInnerCutout / 100),
        segmentTotal = 0;

    //Draw base doughnut
    var baseDoughnutRadius = doughnutRadius + settings.baseOffset,
        baseCutoutRadius = cutoutRadius - settings.baseOffset;
    $(document.createElementNS('http://www.w3.org/2000/svg', 'path'))
      .attr({
        "d": getHollowCirclePath(baseDoughnutRadius, baseCutoutRadius),
        "fill": settings.baseColor
      })
      .appendTo($svg);

    //Set up pie segments wrapper
    var $pathGroup = $(document.createElementNS('http://www.w3.org/2000/svg', 'g'));
    $pathGroup.attr({opacity: 0}).appendTo($svg);

    //Set up tooltip
    if (settings.showTip) {
      var $tip = $('<div class="' + settings.tipClass + '" />').appendTo('body').hide(),
          tipW = $tip.width(),
          tipH = $tip.height();
    }

    //Set up center text area
    var summarySize = (cutoutRadius - (doughnutRadius - cutoutRadius)) * 2,
        $summary = $('<div class="' + settings.summaryClass + '" />')
                   .appendTo($this)
                   .css({
                     width: summarySize + "px",
                     height: summarySize + "px",
                     "margin-left": -(summarySize / 2) + "px",
                     "margin-top": -(summarySize / 2) + "px"
                   });
    var $summaryTitle = $('<p class="' + settings.summaryTitleClass + '">' + settings.summaryTitle + '</p>').appendTo($summary);
    $summaryTitle.css('font-size', getScaleFontSize( $summaryTitle, settings.summaryTitle )); // In most of case useless
    var $summaryNumber = $('<p class="' + settings.summaryNumberClass + '"></p>').appendTo($summary).css({opacity: 0});

    for (var i = 0, len = data.length; i < len; i++) {
      segmentTotal += data[i].value;
      $paths[i] = $(document.createElementNS('http://www.w3.org/2000/svg', 'path'))
        .attr({
          "stroke-width": settings.segmentStrokeWidth,
          "stroke": settings.segmentStrokeColor,
          "fill": data[i].color,
          "data-order": i
        })
        .appendTo($pathGroup)
        .on("mouseenter", pathMouseEnter)
        .on("mouseleave", pathMouseLeave)
        .on("mousemove", pathMouseMove)
		.on("click", pathClick);
    }

    //Animation start
    animationLoop(drawPieSegments);

    //Functions
    function getHollowCirclePath(doughnutRadius, cutoutRadius) {
        //Calculate values for the path.
        //We needn't calculate startRadius, segmentAngle and endRadius, because base doughnut doesn't animate.
        var startRadius = -1.570,// -Math.PI/2
            segmentAngle = 6.2831,// 1 * ((99.9999/100) * (PI*2)),
            endRadius = 4.7131,// startRadius + segmentAngle
            startX = centerX + cos(startRadius) * doughnutRadius,
            startY = centerY + sin(startRadius) * doughnutRadius,
            endX2 = centerX + cos(startRadius) * cutoutRadius,
            endY2 = centerY + sin(startRadius) * cutoutRadius,
            endX = centerX + cos(endRadius) * doughnutRadius,
            endY = centerY + sin(endRadius) * doughnutRadius,
            startX2 = centerX + cos(endRadius) * cutoutRadius,
            startY2 = centerY + sin(endRadius) * cutoutRadius;
        var cmd = [
          'M', startX, startY,
          'A', doughnutRadius, doughnutRadius, 0, 1, 1, endX, endY,//Draw outer circle
          'Z',//Close path
          'M', startX2, startY2,//Move pointer
          'A', cutoutRadius, cutoutRadius, 0, 1, 0, endX2, endY2,//Draw inner circle
          'Z'
        ];
        cmd = cmd.join(' ');
        return cmd;
    };
    function pathMouseEnter(e) {
      var order = $(this).data().order;
      if (settings.showTip) {
        $tip.text(data[order].title + ": " + data[order].value + " " + settings.tipUnit)
            .fadeIn(200);
      }
      if(settings.showLabel) {
		  $summaryTitle.text(data[order].title).css('font-size', getScaleFontSize( $summaryTitle, data[order].title));
          var tmpNumber = settings.shortInt ? shortKInt(data[order].value) : data[order].value;
		  $summaryNumber.html(tmpNumber).css('font-size', getScaleFontSize( $summaryNumber, tmpNumber));
	  }
      settings.onPathEnter.apply($(this),[e,data]);
    }
    function pathMouseLeave(e) {
      if (settings.showTip) $tip.hide();
      if(settings.showLabel) {
		  $summaryTitle.text(settings.summaryTitle).css('font-size', getScaleFontSize( $summaryTitle, settings.summaryTitle));
          var tmpNumber = settings.shortInt ? shortKInt(segmentTotal) : segmentTotal;
		  $summaryNumber.html(tmpNumber).css('font-size', getScaleFontSize( $summaryNumber, tmpNumber));
	  }
      settings.onPathLeave.apply($(this),[e,data]);
    }
    function pathMouseMove(e) {
      if (settings.showTip) {
        $tip.css({
          top: e.pageY + settings.tipOffsetY,
          left: e.pageX - $tip.width() / 2 + settings.tipOffsetX
        });
      }
    }
	function pathClick(e){
	var order = $(this).data().order;
	  if (typeof data[order].action != "undefined")
		  data[order].action();
	}
    function drawPieSegments (animationDecimal) {
      var startRadius = -PI / 2,//-90 degree
          rotateAnimation = 1;
      if (settings.animation && settings.animateRotate) rotateAnimation = animationDecimal;//count up between0~1

      drawDoughnutText(animationDecimal, segmentTotal);

      $pathGroup.attr("opacity", animationDecimal);

      //If data have only one value, we draw hollow circle(#1).
      if (data.length === 1 && (4.7122 < (rotateAnimation * ((data[0].value / segmentTotal) * (PI * 2)) + startRadius))) {
        $paths[0].attr("d", getHollowCirclePath(doughnutRadius, cutoutRadius));
        return;
      }
      for (var i = 0, len = data.length; i < len; i++) {
        var segmentAngle = rotateAnimation * ((data[i].value / segmentTotal) * (PI * 2)),
            endRadius = startRadius + segmentAngle,
            largeArc = ((endRadius - startRadius) % (PI * 2)) > PI ? 1 : 0,
            startX = centerX + cos(startRadius) * doughnutRadius,
            startY = centerY + sin(startRadius) * doughnutRadius,
            endX2 = centerX + cos(startRadius) * cutoutRadius,
            endY2 = centerY + sin(startRadius) * cutoutRadius,
            endX = centerX + cos(endRadius) * doughnutRadius,
            endY = centerY + sin(endRadius) * doughnutRadius,
            startX2 = centerX + cos(endRadius) * cutoutRadius,
            startY2 = centerY + sin(endRadius) * cutoutRadius;
        var cmd = [
          'M', startX, startY,//Move pointer
          'A', doughnutRadius, doughnutRadius, 0, largeArc, 1, endX, endY,//Draw outer arc path
          'L', startX2, startY2,//Draw line path(this line connects outer and innner arc paths)
          'A', cutoutRadius, cutoutRadius, 0, largeArc, 0, endX2, endY2,//Draw inner arc path
          'Z'//Cloth path
        ];
        $paths[i].attr("d", cmd.join(' '));
        startRadius += segmentAngle;
      }
    }
    function drawDoughnutText(animationDecimal, segmentTotal) {
      $summaryNumber
        .css({opacity: animationDecimal})
        .text((segmentTotal * animationDecimal).toFixed(1));
	  var tmpNumber = settings.shortInt ? shortKInt(segmentTotal) : segmentTotal;
	  $summaryNumber.html(tmpNumber).css('font-size', getScaleFontSize( $summaryNumber, tmpNumber));
    }
    function animateFrame(cnt, drawData) {
      var easeAdjustedAnimationPercent =(settings.animation)? CapValue(easingFunction(cnt), null, 0) : 1;
      drawData(easeAdjustedAnimationPercent);
    }
    function animationLoop(drawData) {
      var animFrameAmount = (settings.animation)? 1 / CapValue(settings.animationSteps, Number.MAX_VALUE, 1) : 1,
          cnt =(settings.animation)? 0 : 1;
      requestAnimFrame(function() {
          cnt += animFrameAmount;
          animateFrame(cnt, drawData);
          if (cnt <= 1) {
            requestAnimFrame(arguments.callee);
          } else {
            settings.afterDrawed.call($this);
          }
      });
    }
    function Max(arr) {
      return Math.max.apply(null, arr);
    }
    function Min(arr) {
      return Math.min.apply(null, arr);
    }
    function isNumber(n) {
      return !isNaN(parseFloat(n)) && isFinite(n);
    }
    function CapValue(valueToCap, maxValue, minValue) {
      if (isNumber(maxValue) && valueToCap > maxValue) return maxValue;
      if (isNumber(minValue) && valueToCap < minValue) return minValue;
      return valueToCap;
    }
    function shortKInt (int) {
		int = int.toString();
		var strlen = int.length;
		if(strlen<5)
			return int;
		if(strlen<8)
			return '<span title="' +  int +  '">' + int.substring(0, strlen-3) + 'K</span>';
		return '<span title="' + int  + '">' + int.substring( 0, strlen-6) + 'M</span>';
	}
	function getScaleFontSize(block, newText) {
		block.css('font-size', '');
        newText = newText.toString().replace(/(<([^>]+)>)/ig,"");
		var newFontSize = block.width() / newText.length * settings.ratioFont;
		// Not very good : http://stephensite.net/WordPressSS/2008/02/19/how-to-calculate-the-character-width-accross-fonts-and-points/
		// But best quick way the 1.5 number is to affinate in function of the police
		var maxCharForDefaultFont = block.width() - newText.length * block.css('font-size').replace(/px/, '') / settings.ratioFont;
		if(maxCharForDefaultFont<0)
			return newFontSize+'px';
		else
			return '';
	}
	/**
	function getScaleFontSize(block, newText) {
		block.css('font-size', '');
        newText = newText.toString().replace(/(<([^>]+)>)/ig,"");
		var newFontSize = block.width() / newText.length;
		if(newFontSize<block.css('font-size').replace(/px/, ''))
			return newFontSize+'px';
		else
			return '';
	}*/
    return $this;
  };
})(jQuery);

(function ($) {
    $.fn.simpleChart = function (options) {
        var config = $.extend({
            title: {
                text: 'Simple Chart',
                align: 'right'
            },
            type: 'column', /* progress, bar, waterfall, column */
            layout: {
                width: '100%', /* String value: in px or percentage */
                height: '300px' /* String value: in px or percentage */
            },
            item: {
                label: ['First Label'], // string
                value: [15], //integer
                outputValue: [], // Optimized values: instead of 10240 bytes you can output 10kb if you provide the array
                color: ['#333'],
                prefix: '',
                suffix: '',
                decimals: 2,
                height: null,
                render: {
                    size: 'relative', /* Relative - the height of the items is relative to the maximum value */
                    margin: 0,
                    radius: null
                }
            },
            marker: null
        }, options);

        var template, leftPosition = [], chartType, chartHeight, chartWidth, barColor, barMargin, i, titleAlign;
        config.type ? chartType = config.type : chartType = 'column';
        config.layout.width ? chartWidth = 'width:' + config.layout.width + ';' : chartWidth = '';
        config.layout.height ? chartHeight = 'height:' + config.layout.height + ';' : chartHeight = '';
        config.title.align ? titleAlign = 'text-align:' + config.title.align + ';' : titleAlign = '';
        (config.item.render.margin >= 0) ? barMargin = config.item.render.margin : barMargin = 0.5;


        function getBackgroundColor() {
            var bgColor;
            if (config.item.color.length <= 0) {
                bgColor = '';
            } else if (config.item.color.length == 1) {
                bgColor = 'background-color:' + config.item.color[0] + ';';
            } else {
                bgColor = 'background-color:' + config.item.color[i] + ';'
            }

            return bgColor;
        }

        function recordsClass() {
            var recordClass = '';
            if ((config.item.value.length > 0) && (config.item.value.length <= 10)) {
                recordClass = 'sc-10-items';
            } else if ((config.item.value.length > 10) && (config.item.value.length <= 20)) {
                recordClass = 'sc-20-items';
            } else if (config.item.value.length > 20) {
                recordClass = 'sc-many-items';
            }

            return recordClass;
        }

        function arraySum(arr) {
            var sum = 0;
            for (var i = 0; i < arr.length; i++) {
                sum += arr[i];
            }
            return sum;
        }

        function setItemSize() {
            var itemHeight = [], nominator = 1, maxValue, total;
            maxValue = Math.max.apply(null, config.item.value);
            total = arraySum(config.item.value);

            if (config.item.render.size === 'absolute') {
                nominator = total;
            } else {
                nominator = maxValue;
            }

            for (i = 0; i < config.item.value.length; i++) {
                itemHeight.push(config.item.value[i] * 100 / nominator);
            }
            console.log(config.item.value[i] * 100 / nominator);
            return itemHeight;
        }


        template = '<div class="sc-chart sc-' + chartType + ' ' + recordsClass() + '" style="' + chartWidth + chartHeight + '">';
        template += '<div class="sc-title" style="' + titleAlign + '">' + config.title.text + '</div>';
        template += '<div class="sc-canvas">';

        var itemWidth, itemHeight, itemPercentage;

        if (config.type == 'bar') {
            itemWidth = setItemSize();
            for (i = 0; i < config.item.value.length; i++) {
                barColor = getBackgroundColor();
                (i - 1 >= 0) ? leftPosition[i] = leftPosition[i - 1] + itemWidth[i - 1] : leftPosition[0] = 0;
                template += '<div class="sc-item" style="width:' + itemWidth[i] + '%;' + barColor + 'z-index:' + (config.item.value.length - i) + '">';
                template += '<span class="sc-label">' + config.item.label[i] + '</span>';
                template += '<span class="sc-value">' + config.item.prefix + (config.item.outputValue[i] || config.item.value[i]) + config.item.suffix + '</span>';
                template += '<div class="sc-tooltip">';
                template += '<span class="sc-tooltip-value">' + config.item.prefix + (config.item.outputValue[i] || config.item.value[i]) + config.item.suffix + '</span>';
                template += '<span class="sc-tooltip-label">' + config.item.label[i] + '</span>';
                template += '</div>';
                template += '</div>';
            }
        }


        if (config.type == 'column') {
            itemWidth = (100 - config.item.value.length * barMargin - barMargin) / config.item.value.length;
            itemHeight = setItemSize();
            for (i = 0; i < config.item.value.length; i++) {
                barColor = getBackgroundColor();
                template += '<div class="sc-item" style="left:' + ((itemWidth + barMargin) * i + barMargin) + '%;width:' + (itemWidth) + '%;height:' + itemHeight[i] + '%;' + barColor + '">';
                template += '<span class="sc-label">' + config.item.label[i] + '</span>';
                template += '<span class="sc-value">' + config.item.prefix + (config.item.outputValue[i] || config.item.value[i]) + config.item.suffix + '</span>';
                template += '<div class="sc-tooltip">';
                template += '<span class="sc-tooltip-value">' + config.item.prefix + (config.item.outputValue[i] || config.item.value[i]) + config.item.suffix + '</span>';
                template += '<span class="sc-tooltip-label">' + config.item.label[i] + '</span>';
                template += '</div>';
                template += '</div>';
            }
        }

        if (config.type == 'step') {
            var previous = 0, stepClass;
            itemPercentage = setItemSize();
            itemWidth = (100 - config.item.value.length * barMargin) / config.item.value.length;
            for (i = 0; i < config.item.value.length; i++) {
                config.item.value[i] === previous ? stepClass = ' sc-step-level' : stepClass = '';
                barColor = getBackgroundColor();

                template += '<div class="sc-item' + stepClass + '" style="left:' + ((itemWidth + barMargin) * i) + '%;width:' + (itemWidth) + '%;top:' + (100 - itemPercentage[i]) + '%;' + barColor + '">';
                template += '<span class="sc-label">' + config.item.label[i] + '</span>';
                template += '<span class="sc-value">' + config.item.prefix + (config.item.outputValue[i] || config.item.value[i]) + config.item.suffix + '</span>';
                template += '<div class="sc-tooltip">';
                template += '<span class="sc-tooltip-value">' + config.item.prefix + (config.item.outputValue[i] || config.item.value[i]) + config.item.suffix + '</span>';
                template += '<span class="sc-tooltip-label">' + config.item.label[i] + '</span>';
                template += '</div>';
                template += '</div>';
                previous = config.item.value[i] || 0;
            }
        }

        if (config.type == 'progress') {
            itemWidth = setItemSize();
            for (i = 0; i < config.item.value.length; i++) {
                barColor = getBackgroundColor();
                (i - 1 >= 0) ? leftPosition[i] = leftPosition[i - 1] + itemWidth[i - 1] : leftPosition[0] = 0;
                template += '<div class="sc-item" style="left:' + leftPosition[i] + '%;width:' + itemWidth[i] + '%;' + barColor + 'z-index:' + (config.item.value.length - i) + '">';
                template += '<span class="sc-label">' + config.item.label[i] + '</span>';
                template += '<span class="sc-value">' + config.item.prefix + (config.item.outputValue[i] || config.item.value[i]) + config.item.suffix + '</span>';
                template += '<div class="sc-tooltip">';
                template += '<span class="sc-tooltip-value">' + config.item.prefix + (config.item.outputValue[i] || config.item.value[i]) + config.item.suffix + '</span>';
                template += '<span class="sc-tooltip-label">' + config.item.label[i] + '</span>';
                template += '</div>';
                template += '</div>';
            }
        }



        if (config.type == 'waterfall') {
            itemWidth = setItemSize();
            for (i = 0; i < config.item.value.length; i++) {
                (i - 1 >= 0) ? leftPosition[i] = leftPosition[i - 1] + itemWidth[i - 1] : leftPosition[0] = 0;
                barColor = getBackgroundColor();
                template += '<div class="sc-item" style="left:' + leftPosition[i] + '%;width:' + itemWidth[i] + '%;' + barColor + '">';
                template += '<span class="sc-label">' + config.item.label[i] + '</span>';
                template += '<span class="sc-value">' + config.item.prefix + (config.item.outputValue[i] || config.item.value[i]) + config.item.suffix + '</span>';
                template += '<div class="sc-tooltip">';
                template += '<span class="sc-tooltip-value">' + config.item.prefix + (config.item.outputValue[i] || config.item.value[i]) + config.item.suffix + '</span>';
                template += '<span class="sc-tooltip-label">' + config.item.label[i] + '</span>';
                template += '</div>';
                template += '</div>';
            }
        }

        template += '</div>';
        template += '</div>';
        return this.html(template);
    }

})(jQuery);