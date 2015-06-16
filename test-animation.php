<?php
/*
	Plugin Name: Animated Transitions (A Respondo Shortcode Extension)
	plugin URI: 
	Description:
	version: 1.0
	Author: 
	Author URI: 
	License: GPL2
*/

function respondo_tween_animation_scripts_with_jquery()  {  
	$is_mobile = false;
			
	$user_agent = strtolower ( $_SERVER['HTTP_USER_AGENT'] );
	if ( preg_match ( "/phone|iphone|itouch|ipod|symbian|android|htc_|htc-|palmos|blackberry|opera mini|iemobile|windows ce|nokia|fennec|hiptop|kindle|mot |mot-|webos\/|samsung|sonyericsson|^sie-|nintendo/", $user_agent ) ) {
		$is_mobile = true;
	} else if ( preg_match ( "/mobile|pda;|avantgo|eudoraweb|minimo|netfront|brew|teleca|lg;|lge |wap;| wap /", $user_agent ) ) {
		$is_mobile = true;
	}
	
	if( !$is_mobile ) {
		wp_register_script( 'respondo_tweenmaxmin', plugins_url( 'js/TweenMax.min.js' , __FILE__ ), array( 'jquery' ) );
		wp_enqueue_script( 'respondo_tweenmaxmin' );
		
		wp_register_script( 'respondo_superscrollorama', plugins_url( 'js/jquery.superscrollorama.js' , __FILE__ ), array( 'jquery' ) );
		wp_enqueue_script( 'respondo_superscrollorama' );
	}
	
	// wp_register_script( 'respondo_my_animation', plugins_url( 'js/scripts.js' , __FILE__ ), array( 'jquery' ) );
    // wp_enqueue_script( 'respondo_my_animation' );
	
	// wp_enqueue_style( 'respondo_myaction_css', plugins_url( 'css/style.css' , __FILE__ ));
	// wp_enqueue_style( 'respondo_myaction_css' );
} 

add_action( 'wp_enqueue_scripts', 'respondo_tween_animation_scripts_with_jquery' );  

$respondoshortcode_animation_extension = 'activated';

if (!class_exists("shortcodesListSLSExtensionAnimation")):

    class shortcodesListSLSExtensionAnimation {
		 function __construct() {
			//Premium
			add_shortcode('rs-transition_section', array(&$this, 'transition_section_premium'));
			add_shortcode('rs-transition_item', array(&$this, 'transition_item_premium'));
			
			add_shortcode('rs-transition', array(&$this, 'transition_premium'));
		}
		
		var $animation_premium_idex = 0;
		var $animation_premium_item_idex = 0;
		
		function transition_premium($attr, $content = null){
			ob_start();
			$this->animation_premium_idex++;
			
			$position_style = 'position:relative;';
			if( $attr['animation'] == 'fade-in' || $attr['animation'] == 'fade-out' ){
				$position_style = '';
			} 
			
			// if( $attr['animation'] == 'slide-bottom' ){
				// $position_style = 'position:absolute;';
			// }
			
			$is_mobile = false;
			
			$user_agent = strtolower ( $_SERVER['HTTP_USER_AGENT'] );
			if ( preg_match ( "/phone|iphone|itouch|ipod|symbian|android|htc_|htc-|palmos|blackberry|opera mini|iemobile|windows ce|nokia|fennec|hiptop|kindle|mot |mot-|webos\/|samsung|sonyericsson|^sie-|nintendo/", $user_agent ) ) {
				$is_mobile = true;
			} else if ( preg_match ( "/mobile|pda;|avantgo|eudoraweb|minimo|netfront|brew|teleca|lg;|lge |wap;| wap /", $user_agent ) ) {
				$is_mobile = true;
			}
			
			if( !$is_mobile ) {
		?>
			<script type="text/javascript">
				<?php if( $this->animation_premium_idex == 1 ) { ?>
				var controller;
				jQuery('body').css('overflow-x', 'hidden');
				<?php } ?>
				
				jQuery(document).ready(function(){
					<?php if( $this->animation_premium_idex == 1 ) { ?>
					controller = jQuery.superscrollorama();
					<?php } ?>

					<?php //if( $this->animation_premium_idex == 1 ) { ?>
					<?php /*if( $attr['animation'] == 'slide-left' ) { ?>
					TweenMax.from( jQuery('#respondo-animation-section<?php echo $this->animation_premium_idex; ?>'), .8, {css:{right:'10%', opacity:'0'}, ease:Quad.easeInOut});
					<?php } else if( $attr['animation'] == 'slide-right' ) { ?>
					TweenMax.from( jQuery('#respondo-animation-section<?php echo $this->animation_premium_idex; ?>'), .8, {css:{left:'10%', opacity:'0'}, ease:Quad.easeInOut});
					<?php } else if( $attr['animation'] == 'slide-bottom' ) { ?>
					TweenMax.from( jQuery('#respondo-animation-section<?php echo $this->animation_premium_idex; ?>'), .8, {css:{bottom:'2%', opacity:'0'}, ease:Quad.easeInOut});
					<?php } else if( $attr['animation'] == 'fade-in' ) { ?>
					TweenMax.from( jQuery('#respondo-animation-section<?php echo $this->animation_premium_idex; ?>'), .8, {alpha:0, ease:Quad.easeInOut});
					<?php } else if( $attr['animation'] == 'fade-out' ) { ?>
					TweenMax.to( jQuery('#respondo-animation-section<?php echo $this->animation_premium_idex; ?>'), .8, {alpha:0});
					<?php } */?>
					<?php //} else { ?>
					<?php if( $attr['animation'] == 'slide-right' ) { ?>
					controller.addTween('#respondo-animation-section<?php echo $this->animation_premium_idex; ?>', TweenMax.from( jQuery('#respondo-animation-section<?php echo $this->animation_premium_idex; ?>'), 0.8, {css:{right:'10%', opacity:'0'}, ease:Quad.easeInOut}), -10);
					<?php } else if( $attr['animation'] == 'slide-left' ) { ?>
					controller.addTween('#respondo-animation-section<?php echo $this->animation_premium_idex; ?>', TweenMax.from( jQuery('#respondo-animation-section<?php echo $this->animation_premium_idex; ?>'), 0.8, {css:{left:'10%', opacity:'0'}, ease:Quad.easeInOut}), -10);
					<?php } else if( $attr['animation'] == 'slide-bottom' ) { ?>
					controller.addTween('#respondo-animation-section<?php echo $this->animation_premium_idex; ?>', TweenMax.from( jQuery('#respondo-animation-section<?php echo $this->animation_premium_idex; ?>'), 0.8, {css:{top:'30px', opacity:'0'}, ease:Quad.easeInOut}), -50);
					<?php } else if( $attr['animation'] == 'fade-in' ) { ?>
					controller.addTween('#respondo-animation-section<?php echo $this->animation_premium_idex; ?>', TweenMax.from( jQuery('#respondo-animation-section<?php echo $this->animation_premium_idex; ?>'), 0.8, {alpha:0, ease:Quad.easeInOut}), -50);
					<?php } else if( $attr['animation'] == 'fade-out' ) { ?>
					controller.addTween('#respondo-animation-section<?php echo $this->animation_premium_idex; ?>', TweenMax.to( jQuery('#respondo-animation-section<?php echo $this->animation_premium_idex; ?>'), 0.8, {alpha:0}), -50);
					<?php } ?>
					<?php //} ?>
					
					// jQuery('#respondo-animation-section<?php echo $this->animation_premium_idex; ?>').parent().css('overflow', 'hidden');
				});
			</script>
		<?php
			}
		?>
			<?php if( $attr['animation'] == 'slide-bottom' ){ /*echo '<div style="position:relative;display:block;">';*/ } ?><div id="respondo-animation-section<?php echo $this->animation_premium_idex; ?>" style="<?php echo $position_style; ?>"><?php echo do_shortcode($content); ?></div><?php if( $attr['animation'] == 'slide-bottom' ){ /*echo '</div>';*/ } ?>
		<?php
			$output_string = ob_get_contents();
			ob_end_clean();
			return $output_string;
		}
		
		/*function transition_section_premium($attr, $content = null){
			ob_start();
			$this->animation_premium_idex++;
			$this->animation_premium_item_idex = 0;
		?>
			<script language="javascript">
				<?php if( $this->animation_premium_idex == 1 ) { ?>
				var controller;
				<?php } ?>
				
				jQuery(document).ready(function(){
					<?php if( $this->animation_premium_idex == 1 ) { ?>
					controller = jQuery.superscrollorama();
					<?php } ?>
				});
			</script>
			<div class="clearfix"></div><section id="respondo-animation-section<?php echo $this->animation_premium_idex; ?>"><?php echo do_shortcode($content); ?></section><div class="clearfix"></div>
		<?php
			$output_string = ob_get_contents();
			ob_end_clean();
			return $output_string;
		}
		
		function transition_item_premium($attr, $content = null){
			ob_start();
			$this->animation_premium_item_idex++;
			
			$position_style = 'position:relative;';
			if( $attr['animation'] == 'fade-in' || $attr['animation'] == 'fade-out' ){
				$position_style = '';
			} else if( $attr['animation'] == 'slide-bottom' ){
				$position_style = 'position:absolute';
			}
		?>
			<div id="respondo-animation-section<?php echo $this->animation_premium_idex; ?>-item<?php echo $this->animation_premium_item_idex; ?>" style="float:left;<?php echo $position_style; ?>"><?php echo $content; ?></div>
			<script language="javascript">
				jQuery(document).ready(function(){
					<?php if( $this->animation_premium_idex == 1 ) { ?>
					<?php if( $attr['animation'] == 'slide-left' ) { ?>
					TweenMax.from( jQuery('#respondo-animation-section<?php echo $this->animation_premium_idex; ?>-item<?php echo $this->animation_premium_item_idex; ?>'), .8, {css:{right:'10%', opacity:'0'}, ease:Quad.easeInOut});
					<?php } else if( $attr['animation'] == 'slide-right' ) { ?>
					TweenMax.from( jQuery('#respondo-animation-section<?php echo $this->animation_premium_idex; ?>-item<?php echo $this->animation_premium_item_idex; ?>'), .8, {css:{left:'10%', opacity:'0'}, ease:Quad.easeInOut});
					<?php } else if( $attr['animation'] == 'slide-bottom' ) { ?>
					TweenMax.from( jQuery('#respondo-animation-section<?php echo $this->animation_premium_idex; ?>-item<?php echo $this->animation_premium_item_idex; ?>'), .8, {css:{bottom:'2%', opacity:'0'}, ease:Quad.easeInOut});
					<?php } else if( $attr['animation'] == 'fade-in' ) { ?>
					TweenMax.from( jQuery('#respondo-animation-section<?php echo $this->animation_premium_idex; ?>-item<?php echo $this->animation_premium_item_idex; ?>'), .8, {alpha:0, ease:Quad.easeInOut});
					<?php } else if( $attr['animation'] == 'fade-out' ) { ?>
					TweenMax.to( jQuery('#respondo-animation-section<?php echo $this->animation_premium_idex; ?>-item<?php echo $this->animation_premium_item_idex; ?>'), .8, {alpha:0});
					<?php } ?>
					<?php } else { ?>
					<?php if( $attr['animation'] == 'slide-left' ) { ?>
					controller.addTween('#respondo-animation-section<?php echo $this->animation_premium_idex; ?>', TweenMax.from( jQuery('#respondo-animation-section<?php echo $this->animation_premium_idex; ?>-item<?php echo $this->animation_premium_item_idex; ?>'), .8, {css:{right:'10%', opacity:'0'}, ease:Quad.easeInOut}), -50);
					<?php } else if( $attr['animation'] == 'slide-right' ) { ?>
					controller.addTween('#respondo-animation-section<?php echo $this->animation_premium_idex; ?>', TweenMax.from( jQuery('#respondo-animation-section<?php echo $this->animation_premium_idex; ?>-item<?php echo $this->animation_premium_item_idex; ?>'), .8, {css:{left:'10%', opacity:'0'}, ease:Quad.easeInOut}), -50);
					<?php } else if( $attr['animation'] == 'slide-bottom' ) { ?>
					controller.addTween('#respondo-animation-section<?php echo $this->animation_premium_idex; ?>', TweenMax.from( jQuery('#respondo-animation-section<?php echo $this->animation_premium_idex; ?>-item<?php echo $this->animation_premium_item_idex; ?>'), .8, {css:{bottom:'2%', opacity:'0'}, ease:Quad.easeInOut}), -50);
					<?php } else if( $attr['animation'] == 'fade-in' ) { ?>
					controller.addTween('#respondo-animation-section<?php echo $this->animation_premium_idex; ?>', TweenMax.from( jQuery('#respondo-animation-section<?php echo $this->animation_premium_idex; ?>-item<?php echo $this->animation_premium_item_idex; ?>'), .8, {alpha:0, ease:Quad.easeInOut}), -50);
					<?php } else if( $attr['animation'] == 'fade-out' ) { ?>
					controller.addTween('#respondo-animation-section<?php echo $this->animation_premium_idex; ?>', TweenMax.to( jQuery('#respondo-animation-section<?php echo $this->animation_premium_idex; ?>-item<?php echo $this->animation_premium_item_idex; ?>'), .8, {alpha:0}), -50);
					<?php } ?>
					<?php } ?>
				});
			</script>
		<?php
			$output_string = ob_get_contents();
			ob_end_clean();
			return $output_string;
		}*/
	}

	new shortcodesListSLSExtensionAnimation();

endif;
