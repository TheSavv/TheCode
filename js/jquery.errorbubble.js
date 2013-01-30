jQuery.fn.sbTooltip = function() {
	return this.each(function(){
		jQuery(this).attr({sbtooltip: jQuery(this).attr("title")}).removeAttr("title");
	});
};
