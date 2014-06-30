//portal_slide.js
function FPortalSlide(selector,params) {
	if (typeof selector === 'undefined') return;

	if (!(selector.nodeType)) {
        if ($(selector).length === 0) return;
    };

    var _this = this;

    var defaults = {
    	speed: 300,
    	wrapper: '.slide',
    	elemenets: '.box',
    	pnClass: '.arr',
    	prev: '.arr_l',
    	next: '.arr_r'
    };

    params = params || {};
    for (var prop in defaults) {
        if (prop in params && typeof params[prop] === 'object') {
            for (var subProp in defaults[prop]) {
                if (! (subProp in params[prop])) {
                    params[prop][subProp] = defaults[prop][subProp];
                }
            }
        }
        else if (! (prop in params)) {
            params[prop] = defaults[prop];
        }
    };

    _this.params = params;

    _this.selector = selector = $(selector);

    var $Wrapper = _this.selector.find(params.wrapper),
    	$box = $Wrapper.find(params.elemenets),
    	nBox = $box.length + 2,
    	nBoxWidth = $box.width() + 20,
    	nInitLeft = -nBoxWidth;

    var bIsAnimating = false,
    	nCurrNum = 0;

    _this.fMoveWrapper = function (direction) {//direction: 1->to left,0->to right
        if (!!bIsAnimating) { return false };

        //slider动画
        var _nPos = Math.floor($Wrapper.position().left);

        var _condition = false;

        _condition = (direction === 1) ? -nBoxWidth * (nBox - 1) :  0;


        if (_nPos === _condition) { return false };

        bIsAnimating = !bIsAnimating;

        var _move = (direction === 1) ? _nPos - nBoxWidth :  _nPos + nBoxWidth;

        $Wrapper.animate(
            { left: _move },
            params.speed,
            function () {
            	if (_move === 0) {
		    		$(this).css('left', -nBoxWidth * (nBox - 2));
		    	};

		    	if (_move === -nBoxWidth * (nBox - 1)) {
		    		$(this).css('left', -nBoxWidth);
		    	};
		    	
                nCurrNum = (direction === 1) ? nCurrNum + 1 : nCurrNum - 1;

                bIsAnimating = !bIsAnimating;
            }
        );

    };

    _this.selector.delegate(params.pnClass,'click',function (e) {
    	var _t = $(this),
            _type = _t.hasClass('arr_l') ? 0 : 1;

        _this.fMoveWrapper(_type);
    })

    _this.initSlide = function () {
    	var $clone_first = $box.first().clone(),
    		$clone_last = $box.last().clone();

    	$Wrapper.prepend($clone_last).append($clone_first);

  		$Wrapper.css({
  			width: nBoxWidth * nBox,
  			left: nInitLeft
  		});
    };

}


FPortalSlide.prototype = {
	constructor : FPortalSlide,
	init : function () {
		this.initSlide();
	}
};



