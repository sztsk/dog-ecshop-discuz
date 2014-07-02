//forum_fade.js
function FForumFade(selector,params) {
	if (typeof selector === 'undefined') return;

	if (!(selector.nodeType)) {
        if ($(selector).length === 0) return;
    };

    var _this = this;

    var defaults = {
    	speed: 800,
        timeout: 3000,
    	wrapper: '.fade_box',
    	elemenets: '.box',
        currElem: 'curr_box',
        underElem: 'under_box',
    	num: '.num',
        currNum: 'curr'
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
    	nBox = $box.length
        $num = $Wrapper.find(params.num);

    var bIsAnimating = false,
    	nCurrNum = 0;

    _this.fFade = function (num) {

        bIsAnimating = !bIsAnimating;

        var _curr = $Wrapper.find('div.' + params.currElem),
            _inElem = $box.eq(num);

        _inElem.addClass(params.underElem)
            .fadeIn(params.speed,function () {
                _inElem.removeClass(params.underElem)
                    .addClass(params.currElem);

                bIsAnimating = !bIsAnimating;

                if (!!params.timeout && !TIMER) {
                    _this.loopEvent();
                };
            });

        _curr.fadeOut(params.speed - 100,function () {
            _curr.removeClass(params.currElem);
            nCurrNum = num;
            _this.setNumCurr(nCurrNum);
        });
    };

    var nFadeNum = 0,TIMER;

    _this.loopEvent = function () {
        TIMER = setInterval(function () {
            nFadeNum = (nCurrNum >= nBox - 1) ? 0 : nCurrNum + 1;

            _this.fFade(nFadeNum);
        },params.timeout);
    };

    if (!!params.timeout) {
        _this.loopEvent();
    };

    $num.delegate('a','click',function (e) {
    	var _t = $(this),
            _index = _t.index();
        if (bIsAnimating || _index === nCurrNum) { return false };

        clearInterval(TIMER);
        TIMER = undefined;

        _this.fFade(_index);
    });

    _this.setNumCurr = function (num) {
        $num.find('a').removeClass(params.currNum)
            .eq(num).addClass(params.currNum);
    };

    _this.setNum = function () {
        var _html = '';
        for (var i = 1; i <= nBox; i++) {
            _html += '<a href="javascript:">' + i + '</a>'
        };

        $num.html(_html);
    };

    _this.initFade = function () {
        _this.setNum();
        _this.setNumCurr(nCurrNum);
    	$box.first().addClass(params.currElem).show();
    };

}


FForumFade.prototype = {
	constructor : FForumFade,
	init : function () {
		this.initFade();
	}
};



