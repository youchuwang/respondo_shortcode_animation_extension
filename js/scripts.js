jQuery(document).ready(function(){
	var controller = jQuery.superscrollorama();
	
	TweenMax.from( jQuery('#left-fly-1'), .8, {css:{right:'10%', opacity:'0'}, ease:Quad.easeInOut});
	TweenMax.from( jQuery('#right-fly-1'), .8, {css:{left:'10%', opacity:'0'}, ease:Quad.easeInOut});
	
	controller.addTween('#section-2', TweenMax.from( jQuery('#left-fly-2'), .8, {css:{right:'10%', opacity:'0'}, ease:Quad.easeInOut}), -50);
	controller.addTween('#section-2', TweenMax.from( jQuery('#right-fly-2'), .8, {css:{left:'10%', opacity:'0'}, ease:Quad.easeInOut}), -50);
	
	controller.addTween('#section-3', TweenMax.from( jQuery('.fly-in-one'), .8, {css:{right:'35%', opacity:'0'}, ease:Quad.easeInOut}), 0, -150);
	controller.addTween('#section-3', TweenMax.from( jQuery('.fly-in-two'), 1, {css:{right:'35%', opacity:'0'}, ease:Quad.easeInOut}), 0, -100);
	controller.addTween('#section-3', TweenMax.from( jQuery('.fly-in-three'), 1.2, {css:{right:'35%', opacity:'0'}, ease:Quad.easeInOut}),-60);
	controller.addTween('.fly-in-three', TweenMax.from( jQuery('.fly-in-four'), 1.4, {css:{right:'35%', opacity:'0'}, ease:Quad.easeInOut}),-70);
	controller.addTween('.fly-in-four', TweenMax.from( jQuery('.fly-in-five'), 1.6, {css:{right:'35%', opacity:'0'}, ease:Quad.easeInOut}),-70);
	controller.addTween('.fly-in-four', TweenMax.from( jQuery('.fly-in-six'), 1.9, {css:{right:'35%', opacity:'0'}, ease:Quad.easeInOut}),-70);
	controller.addTween('.fly-in-five', TweenMax.from( jQuery('.fly-in-seven'), 1.4, {css:{right:'35%', opacity:'0'}, ease:Quad.easeInOut}),-70);
	controller.addTween('.fly-in-six', TweenMax.from( jQuery('.fly-in-eight'), .8, {css:{right:'35%', opacity:'0'}, ease:Quad.easeInOut}),-70);
	controller.addTween('.fly-in-seven', TweenMax.from( jQuery('.fly-in-nine'), 1.2, {css:{right:'35%', opacity:'0'}, ease:Quad.easeInOut}),-70);
	
	controller.addTween('#section-3', TweenMax.from( jQuery('#right-fly-3'), .8, {css:{left:'10%', opacity:'0'}, ease:Quad.easeInOut}), -50);
});