/**
 * Robosane ED24 template by Ben Klein
 *
 */

//remove conflict of mootools more show/hide function of element
(function() {
    if (window.MooTools && window.MooTools.More && Element && Element.implement) {

        var mthide = Element.prototype.hide,
            mtshow = Element.prototype.show,
            mtslide = Element.prototype.slide;

        Element.implement({
            show: function(args) {
                if (arguments.callee &&
                    arguments.callee.caller &&
                    arguments.callee.caller.toString().indexOf('isPropagationStopped') !== -1) { //jquery mark
                    return this;
                }
                return $.isFunction(mtshow) && mtshow.apply(this, args);
            },

            hide: function() {
                if (arguments.callee &&
                    arguments.callee.caller &&
                    arguments.callee.caller.toString().indexOf('isPropagationStopped') !== -1) { //jquery mark
                    return this;
                }
                return $.isFunction(mthide) && mthide.apply(this, arguments);
            },

            slide: function(args) {
                if (arguments.callee &&
                    arguments.callee.caller &&
                    arguments.callee.caller.toString().indexOf('isPropagationStopped') !== -1) { //jquery mark
                    return this;
                }
                return $.isFunction(mtslide) && mtslide.apply(this, args);
            }
        })
    }
})();

(function($) {
    $(document).ready(function() {
        $('*[rel=tooltip]').tooltip()

        // Turn radios into btn-group
        $('.radio.btn-group label').addClass('btn');
        $(".btn-group label:not(.active)").click(function() {
            var label = $(this);
            var input = $('#' + label.attr('for'));

            if (!input.prop('checked')) {
                label.closest('.btn-group').find("label").removeClass('active btn-success btn-danger btn-primary');
                if (input.val() == '') {
                    label.addClass('active btn-primary');
                } else if (input.val() == 0) {
                    label.addClass('active btn-danger');
                } else {
                    label.addClass('active btn-success');
                }
                input.prop('checked', true);
            }
        });
        $(".btn-group input[checked=checked]").each(function() {
            if ($(this).val() == '') {
                $("label[for=" + $(this).attr('id') + "]").addClass('active btn-primary');
            } else if ($(this).val() == 0) {
                $("label[for=" + $(this).attr('id') + "]").addClass('active btn-danger');
            } else {
                $("label[for=" + $(this).attr('id') + "]").addClass('active btn-success');
            }
        });
    }) // end document .onready()
})(jQuery);

setTimeout(
function (){
    (function($) {
        $(document).ready(function() {
            // Chosen issue from https://github.com/harvesthq/chosen/issues/92
            // Still open after this long?
            // don't let the width to be "0"
            var chzn_check_targets = ".chzn-container,.chzn-container-single"
            $(chzn_check_targets).each(function(){
                if($(this).width() == 0){
                    $(this).width('auto');
                }
            });
            // apply two-column layout as bootstrap col
            jQuery(".items-row.cols-2 > div > .item").addClass("col-sm-6")
        }) // end document .onready()
    })(jQuery);
}, 5);
