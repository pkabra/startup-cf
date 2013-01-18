/*
 * Fancy Thumbnail Slider  - jQuery Plugin
 *
 * TERMS OF USE - Fancy Thumbnail Slider
 * 
 * Copyright © 2011 Fabrice Spee
 * All rights reserved.
 *
 * Version: 1.2 (20/11/2011)
 * 
*/

(function($){
 
    $.fn.extend({
         
        //pass the options variable to the function
        fancythumbnailslider: function(options) {
 
            //Set the default values
            var defaults = {
				delay:100,
				slide:300,
				loop:true,
				autoplay:true,
				time:3000,
				captionFade:0,
				arrowKeys:true,
				shuffle:true,
				fixedWidth: false,
				addMissingItems: false,
				scrollItem: 1,
				fullHoverArea: false,
				showNavOnHover: true,
				showNavFade: 300,
				pause: false
            }
            var options =  $.extend(defaults, options);
 
            return this.each(function() {
                o = options;
				$float_easing="easeInOutQuart";  //  easing effect
				
				// caching objects
				$this_parent = $(this).parent();
				$item_container = $(this);
				$li = $item_container.find('li');
				$next_button = $('.fancy_thumbnail_next');
				$prev_button = $('.fancy_thumbnail_prev');
				
				if (o.fullHoverArea) { $scroll_element = $(document); }
				else { $scroll_element = $item_container; }
				
				
				item_size = $li.size();
				item_width = parseInt($li.width(), 10);
				item_height = parseInt($li.height(), 10);
				full_item_width = item_width + parseInt($li.css('marginRight'), 10) + parseInt($li.css('marginLeft'), 10) ;
				full_item_height = item_height + parseInt($li.css('marginTop'), 10) + parseInt($li.css('marginBottom'), 10) ;
				
				// Call different setting function
				adapt_to_window_size();
				set_item_classes();
				set_start_positions();
				set_next_prev_classes();
				
				// USERS ACTIONS
				
				// window resize if fixedWidth is f	alse
				$(window).resize(function() { window_resize(); });
				
				//  call fucntion on click Up or Down
				if (o.arrowKeys) {
					$(document).keydown(function(event) {
						if ( event.which == 40 ) { // down arrow key
							clearInterval(interval);
							if (o.autoplay && !o.pause) { interval = setInterval(autoplay, o.time); }
							show_next_prev('next');
						}
						else if ( event.which == 38 ) { // up arrow key
							clearInterval(interval);
							if (o.autoplay && !o.pause) { interval = setInterval(autoplay, o.time); }
							show_next_prev('prev');
						}
					});
				}
								
				// scroll on mouseover
				$scroll_element.hover(function(){
					var window_width = parseInt($(window).width(), 10);
					var scroll_width = parseInt($(window).width(), 10);
					if (o.fixedWidth) { var scroll_width = parseInt($item_container.parent().width(), 10); }
					var distance = parseInt($item_container.width(), 10) - scroll_width;
					if($item_container.width()>scroll_width){
						$(this).mousemove(function(e){
							var margin = ((distance / scroll_width));
							if (o.fixedWidth) { var margin = Math.ceil(margin * (e.pageX-((window_width-scroll_width)/2))); }
							else { var margin = Math.ceil((margin * e.pageX)); }
							$item_container.css({'marginLeft': '-'+margin+'px'});
						}); 
					}
				});
				
				
				//  Set autoplay if true 
				if (o.autoplay) { interval = setInterval(autoplay, o.time); } else { interval = false; }
				
				//onclick
				$next_button.click(function() { 
					var this_class = $(this).attr('class'); 
					if(this_class.search( 'disable' ) <=0) { 
						clearInterval(interval); 
						if (o.autoplay && !o.pause) { interval = setInterval(autoplay, o.time); }
						show_next_prev('next'); 
					} 
					return(false); 
				});
				$prev_button.click(function() { 
					var this_class = $(this).attr('class'); 
					if(this_class.search( 'disable' ) <=0) { 
						clearInterval(interval); 
						if (o.autoplay && !o.pause) { interval = setInterval(autoplay, o.time); }
						show_next_prev('prev'); 
					} 
					return(false); 
				});
				
				//  FadeIn Nav
				if (o.showNavOnHover) { 
					$next_button.hide();
					$prev_button.hide();
					
					$this_parent.hover(function(){
						$next_button.fadeIn(o.showNavFade);
						$prev_button.fadeIn(o.showNavFade);						   
					}, function() {
						$next_button.fadeOut(o.showNavFade);
						$prev_button.fadeOut(o.showNavFade);
					});
				}
				
				// Fade in Caption
				$li.hover(	function() { clearInterval(interval); $(this).find('.caption').fadeIn(o.captionFade); }, 
							function () { $(this).find('.caption').fadeOut(o.captionFade); if (o.autoplay && !o.pause) { interval = setInterval(autoplay, o.time); } });
								
            });
			
			
			////////////////////////// MAIN FUNCTIONS //////////////////////////
			
			//  depending on window size the variables are set and items are added
			function adapt_to_window_size() {	
				var container_width = parseInt($item_container.width(), 10);
				var container_height = parseInt($item_container.height(), 10);
				var window_width = parseInt($(window).width(), 10);
				
				//  we set the new width for the item_container
				var new_container_width = (Math.ceil(window_width/full_item_width)+o.scrollItem)*(full_item_width);
				if (o.fixedWidth) { var new_container_width = Math.ceil(container_width)+(o.scrollItem*full_item_width); };
				$item_container.css('width',new_container_width+'px');
				
				columns = Math.floor(new_container_width/full_item_width);
				rows = Math.floor(container_height/full_item_height);
				visible_items = columns*rows;
				filled_rows = Math.ceil(item_size/columns);
				total_rows = filled_rows;
				min_filled_rows = rows + 1;  // we want to have minimum 1 hidden row 
				
				
				if (o.addMissingItems) {
					// we count the missi ng items to fill the minimum needed rows 
					if (filled_rows < min_filled_rows) 	{ var needed_items = min_filled_rows*columns; var missing_items = needed_items-item_size; total_rows = min_filled_rows; }
					else 								{ var needed_items = filled_rows*columns; var missing_items = needed_items-item_size; }
					
					// if we have not enough items the script won't working				
					if (missing_items > item_size) { alert("There are not enough items! Scale down your browser window or add more items"); }
					else {
						//  we add the missing items
						for (var i = 1; i <= missing_items; i++) {
							var item_inner_temp = $item_container.find('li:nth-child('+i+')').html();
							$item_container.append('<li>'+item_inner_temp+'</li>');
						}
						var new_item_size = $item_container.find('li').size();
						$li = $item_container.find('li');
					}
				}
				
			} 
			
			// function to set the class name and undisplay those whe aren't visible
			function set_item_classes() {
				$li.each(function(index) {
					$item = $(this);
					var row_number = Math.floor((index+columns)/columns);
					var col_number = (index+columns)-(columns*row_number);
					$item.addClass('row_'+row_number+'_col_'+col_number);
					if (row_number == 1) { $item.addClass('first'); }
					
					if (row_number <= rows) 	{ $item.css({'display':'block', 'opacity':1}); }
					else 						{ $item.css({'opacity':0, 'display':'none'}); }
				});
			}
				
				
			// function to set the different start positions of the items
			function set_start_positions() {
				$li.each(function(index) {
					$item = $(this);
					var row_number = Math.floor(((index+columns)/columns)-1);
					var col_number = index-(columns*row_number);
											
					if (row_number < rows) { var top_position = row_number * full_item_height; }
					else { var top_position = rows * full_item_height; }
					var left_position = col_number * full_item_width;
					
					$item.css('position','absolute');
					$item.css('top',top_position+'px');
					$item.css('left',left_position+'px');
				});
			}
			
			// enable/disable the next/prev buttons
			function set_next_prev_classes() {	
				var first_row_class = $item_container.find("li.first:visible").attr('class');
				first_row_class = first_row_class.replace(" first", "");  //  we delete the string 'first' if isset
				var row_id_first = first_row_class.split('_');
				row_id_first = parseInt(row_id_first[1], 10);
				
				
				if (!o.loop) {
					if (row_id_first ==  '1') { $prev_button.addClass('disable'); }
					else { $prev_button.removeClass('disable'); }
					if ((row_id_first-1)+rows ==  total_rows) { $next_button.addClass('disable'); }
					else { $next_button.removeClass('disable'); }
				}
			}
			
			// window resize funtion
			function window_resize() {
				// we delete all items we have added on pageload
				$li.each(function(index) { 
					$item = $(this);
					$item.removeClass();			  
					if (index+1 > item_size) { $item.remove(); }
				});
				
				// call all start function to reset the items
				adapt_to_window_size();
				set_item_classes();
				set_start_positions();
			}
			
			
			// NEXT/PREV ACTION
			function show_next_prev(method) {
				var first_row_class = $item_container.find("li.first:visible").attr('class');
				first_row_class = first_row_class.replace(" first", "");  //  we delete the string 'first' if isset
				var row_id_first = first_row_class.split('_');
				row_id_first = parseInt(row_id_first[1], 10);

				// we declare an array where we put all row_id's which will be animated
				var row_array = new Array();
				for(var i = 0;i < rows+1;i++) {
					if (method == 'next') { 
						id = row_id_first + i; 
						if (id > total_rows) { id = id - total_rows; }
						row_array[i] = id;
						
						// if loop is true we change the top position of the sliding in item
						if (o.loop) { 
							var top_position = rows * full_item_height;
							if (i == rows) { $item_container.find('li.[class^="row_'+id+'"]').css('top',top_position+'px'); }
						}
					} else if (method == 'prev') { 
						id = (row_id_first) + (rows-1-i);
						if (id <= 0) { id = id + total_rows; }
						if (id > total_rows) { id = id - total_rows;}
						row_array[i] = id;
						
						// if loop is true we change the top position of the sliding in item
						if (o.loop) { 
							var top_position = -full_item_height;
							if (i == rows) { $item_container.find('li.[class^="row_'+id+'"]').css('top',top_position+'px'); }
						}
					}
				}
				
									
				// we declare an array for the shuffle event
				var shuffle_array = new Array();
				for(var i = 0;i < columns;i++) {
					shuffle_array[i] = i;	
				}
				// if shuffle ist true we do shuffle
				if (o.shuffle) { shuffle_array = $.shuffle(shuffle_array); }
				
				// control if next/prev is possible
				var do_action = true;
				if (row_id_first ==  '1' && method == 'prev' || row_id_first ==  total_rows-(rows-1) && method == 'next') {
					if (!o.loop) {  
						do_action = false;
					} 
				} 	
						
				if (do_action) {
					// we run through the rows(r) and cols(c)
					
					for(var r = 0; r < row_array.length; r++)
					{
						for (var c = 0; c < columns; c++)
						{
							// claculation of the new top position depending of the rows/cols
							if (method == 'next') { var new_top_pos = (r-1) * full_item_height; }
							else if (method == 'prev') { var new_top_pos =  Math.abs((r-rows) * full_item_height); }
							var delay = ((shuffle_array[c]) * o.delay)+ (o.delay*(r));
							
							// caching item
							var $item = $item_container.find('li.row_'+row_array[r]+'_col_'+c);
							
							$item.removeClass('first');  // delete the class 'first' for all items for reset 
							if (r == 0) {
								$item.delay(delay).animate({
										top: new_top_pos,
										opacity: 0									
										}, o.slide, $float_easing, function(){
										$(this).css('display','none');	
								});			  
							} else if (r > 0 && r < rows) {
								
								if (method == 'next') { if (r == 1) {  $item.addClass('first'); } }
										 
								$item.delay(delay).animate({
									top: new_top_pos,
									opacity: 1									
									}, o.slide, $float_easing, function(){
								});	
									
							} else if (r == rows) {
								$item.css('display','block');  // the sliding-in items are set to display block
								
								if (method == 'prev' || rows == 1) { $item.addClass('first'); }
								
								$item.delay(delay).animate({
									top: new_top_pos,
									opacity: 1									
									}, o.slide, $float_easing, function(){
								});		  
							}
							
						} // end for var c
					} // end for var r
				} // if(do_action)
				
				//  we reset the navigation links
				set_next_prev_classes();
				
				// hide all captions after animated
				$li.find('.caption').hide();	
			}
			
			function autoplay() {
				var row_item_class = $item_container.find("li.first").attr('class');
				row_item_class = row_item_class.replace(" first", "");  //  we delete the string 'first' if isset
				var row_id = row_item_class.split('_');
				
				if (!o.loop) {
					if (row_id[1] ==  total_rows-(rows-1)) { clearInterval(interval); }
						else { show_next_prev('next'); }
				} else { show_next_prev('next'); }
		   }
						
        }
    });
     
})(jQuery);

