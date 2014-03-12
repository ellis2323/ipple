jQuery.fn.mjpopup = function (option) {
	var settings = jQuery.extend(true,{
		//active debug
		'debug' : true,
		//click or no
		'onClick': {
			'active' : false,
			'class' : 'showPopup'
		},
		//cookie
		'cookie' : {
   			'active' : false,
   			'name' : 'mjpopup',
  			'time' : 1
      	},
		//create overlay
		'overlay': {
			'class': 'popup_overlay',
			'closeOnClick': true,
			'css': {
				'background' : 'url(img/mjpopup/overlay.png)',
				'backgroundRepeat' : 'repeat',
				'zIndex' : 999,
				'width' : '100%',
				'position' : 'absolute',
				'top' :0,
				'height' : jQuery(document).height()
			}
		},
		//create div popup
		'popup': {
			'class': 'popup_div_view',
			'width': 940,
			'height': 538,
			'css': {
				'borderWidth': 8,
				'borderColor': '#D0D0D0',
				'borderStyle': 'solid',
				'borderRadius': '6px 0px 6px 6px',
				'float' : 'left',
				'height' : '500px',
				'position' : 'relative',
				'zIndex' : 999999
			},
			'htmlpopup' : '<img src="img/mjpopup/mjpopup.jpg" />'
		},
		//close button
		'close': {
			'text' : 'close',//string and One word
			'class' : 'close',
			'EscClose': true,
			'css': {
				'color' : 'black',
				'display' : 'block',
				'float' : 'right',
				'padding' : '4px 9px', //px or em
				'backgroundColor' : '#D0D0D0',
				'fontSize' : '12px', //px
				'borderRadius' : '2px 2px 0 0',
				'textTransform' : 'uppercase',
				'fontWeight' : 'bold',
				'cursor' : 'pointer',
				'zIndex' : 999999
			}
		},
		//effect appearance/disappearance for background
		'effect': {
			'bgIn': 'fade',
			'bgTime' : 800,
			'bgOut' : 'fade',
			'popupIn' : 'slide',
			'popupTime' : 1000,
			'popupOut' : 'slide'
		}
	},option);
	
	var msg = '';
	var alertmsg = '';
	
	function countWord(chaine)
	{
	  var exp=new RegExp("[a-zA-Z0-9éèêëàáâäóòôöíìîïçÉÈÊËÀÁÂÄÒÓÔÖÌÍÎÏÇ_-]+","g");
	  var tabNom=chaine.match(exp);
	  if (tabNom!=null)
	    	msg = tabNom.length;
	  return msg;
	}
	
	isFloat = function(number) {
	   try {
		 return (number.toString().indexOf(".") != -1);
	   } catch (ex) { return false; }
	}
		
	function error()
	{
		//****************************
		//onClick test
		//****************************
		if(typeof settings.onClick.active != 'boolean')
				alertmsg = '<li>Your onclick active is bad : "'+settings.onClick.active+'" <br />OnClick active must be boolean. <br />ex: \'active\' : false\</li>';
		if(typeof settings.onClick.class != 'string')
				alertmsg = alertmsg+'<li>Your onclick class is bad : "'+settings.onClick.class+'" <br />OnClick class must be boolean. <br />ex: \'class\' : \'showPopup\'</li>';
		if(typeof settings.onClick.class == 'string')
		{
			msg = countWord(settings.onClick.class);
			if(msg != 1)
				alertmsg = alertmsg+'<li>onclick of your class is bad : "'+settings.onClick.class+'" <br />onclick of your class must have one word. <br />ex: \'class\' : \'showPopup\'</li>';
		}
		//****************************
		//cookie test
		//****************************
		if(typeof settings.cookie.active != 'boolean')
				alertmsg = alertmsg+'<li>Your cookie active is bad : "'+settings.cookie.active+'" <br />Cookie active must be boolean. <br />ex: \'active\' : false\</li>';
		if(typeof settings.cookie.name != 'string')
				alertmsg = alertmsg+'<li>Your cookie name is bad : "'+settings.cookie.name+'" <br />Cookie name must be boolean. <br />ex: \'class\' : \'mjpopup\'</li>';
		if(typeof settings.cookie.time != 'number' || isFloat(settings.cookie.time))
			alertmsg = '<li>Your time cookie is bad : "'+settings.cookie.time+'" <br />Time cookie must be numeric. <br />ex: \'time\' : 1\</li>';
		//****************************
		//overlay test
		//****************************
		if(typeof settings.overlay.class != 'string')
				alertmsg = alertmsg+'<li>Your overlay class is bad : "'+settings.overlay.class+'" <br />Overlay class must be boolean. <br />ex: \'class\' : \'popup_div_view\'</li>';
		if(typeof settings.overlay.class == 'string')
		{
			msg = countWord(settings.overlay.class);
			if(msg != 1)
				alertmsg = alertmsg+'<li>Your overlay class is bad : "'+settings.overlay.class+'" <br />Overlay class must have one word. <br />ex: \'class\' : \'popup_div_view\'</li>';
		}
		if(typeof settings.overlay.closeOnClick != 'boolean')
				alertmsg = alertmsg+'<li>Your overlay closeOnClick is bad : "'+settings.overlay.closeOnClick+'" <br />Overlay closeOnClick must be boolean. <br />ex: \'closeOnClick\' : false\</li>';
		//****************************
		//popup test
		//****************************
		if(typeof settings.popup.class != 'string')
				alertmsg = alertmsg+'<li>Your popup class is bad : "'+settings.popup.class+'" <br />Popup class must be boolean. <br />ex: \'class\' : \'popup_div_view\'</li>';
		if(typeof settings.overlay.class == 'string')
		{
			msg = countWord(settings.popup.class);
			if(msg != 1)
				alertmsg = alertmsg+'<li>Your popup class is bad : "'+settings.popup.class+'" <br />Popup class must have one word. <br />ex: \'class\' : \'popup_div_view\'</li>';
		}
		if(typeof settings.popup.width != 'number' || isFloat(settings.popup.width))
			alertmsg = alertmsg+'<li>Your width popup is bad : "'+settings.popup.width+'" <br />Width popup must be numeric. <br />ex: \'width\' : 800</li>';
		if(typeof settings.popup.height != 'number' || isFloat(settings.popup.height))
			alertmsg = alertmsg+'<li>Your height popup is bad : "'+settings.popup.height+'" <br />Height popup must be numeric. <br />ex: \'height\' : 400</li>';
		if(typeof settings.popup.htmlpopup != 'string')
				alertmsg = alertmsg+'<li>Your htmlpopup is bad : "'+settings.popup.htmlpopup+'" <br />htmlpopup must be string. <br />ex: \'htmlpopup\' : <br />\'&lt;img src="img/mjpopup/mjpopup.jpg" /&gt;\'</li>';
		//****************************
		//close test
		//****************************
		if(typeof settings.close.EscClose != 'boolean')
				alertmsg = alertmsg+'<li>Your EscClose is bad : "'+settings.close.EscClose+'" <br />EscClose must be boolean. <br />ex: \'EscClose\' : false\</li>';
		if(typeof settings.close.class != 'string')
				alertmsg = alertmsg+'<li>Your close class is bad : "'+settings.close.class+'" <br />Close class must be string. <br />ex: \'class\' : \'close\'</li>';
		if(typeof settings.close.class == 'string')
		{
			msg = countWord(settings.close.class);
			if(msg != 1)
				alertmsg = alertmsg+'<li>Your close class is bad : "'+settings.close.class+'" <br />Close class must be string. <br />ex: \'class\' : \'close\'</li>';
		}
		if(typeof settings.close.text != 'string')
				alertmsg = alertmsg+'<li>Your close text is bad : "'+settings.close.text+'" <br />Close text must be string. <br />ex: \'text\' : \'close\' or (null)</li>';
		//****************************
		//effect test
		//****************************
		if(typeof settings.effect.bgIn != 'string')
			alertmsg = alertmsg+'<li>Your effect bgIn is bad : "'+settings.effect.bgIn+'" <br />Effect in bgIn must be string. <br />ex: \'bgIn\' : \'fade\' or  \'show\' or  \'slide\'</li>';
		
		if(typeof settings.effect.bgIn == 'string')
		{
			msg = countWord(settings.effect.bgIn);
			if(msg != 1)
			{
				alertmsg = alertmsg+'<li>Your effect bgIn is bad : "'+settings.effect.bgIn+'" <br />Your Effect bgIn must have one word. <br />ex: \'bgIn\' : \'fade\' or  \'show\' or  \'slide\'</li>';
			}
			else
			{
				switch(settings.effect.bgIn)
				{
					case 'fade':
					break;
					
					case 'slide':
					break;
					
					case 'show':
					break;
					
					default:
					alertmsg = alertmsg+'<li>Your effect bgIn is bad : "'+settings.effect.bgIn+'" <br />Effect in bgIn must be string. <br />ex: \'bgIn\' : \'fade\' or  \'show\' or  \'slide\'</li>';
					break;
				}
			}
		}
		
		if(typeof settings.effect.bgOut != 'string')
			alertmsg = alertmsg+'<li>Your effect bgOut is bad : "'+settings.effect.bgOut+'" <br />Effect in bgOut must be string. <br />ex: \'bgOut\' : \'fade\' or  \'show\' or  \'slide\'</li>';
		
		if(typeof settings.effect.bgOut == 'string')
		{
			msg = countWord(settings.effect.bgOut);
			if(msg != 1)
			{
				alertmsg = alertmsg+'<li>Your effect bgOut is bad : "'+settings.effect.bgOut+'" <br />Your Effect bgOut must have one word. <br />ex: \'bgOut\' : \'fade\' or  \'show\' or  \'slide\'</li>';
			}
			else
			{
				switch(settings.effect.bgOut)
				{
					case 'fade':
					break;
					
					case 'slide':
					break;
					
					case 'show':
					break;
					
					default:
					alertmsg = alertmsg+'<li>Your effect bgOut is bad : "'+settings.effect.bgOut+'" <br />Effect in bgOut must be string. <br />ex: \'bgOut\' : \'fade\' or  \'show\' or  \'slide\'</li>';
					break;
				}
			}
		}
		
		if(typeof settings.effect.popupIn != 'string')
			alertmsg = alertmsg+'<li>Your effect popupIn is bad : "'+settings.effect.popupIn+'" <br />Effect in popupIn must be string. <br />ex: \'popupIn\' : \'fade\' or  \'show\' or  \'slide\'</li>';
		
		if(typeof settings.effect.popupIn == 'string')
		{
			msg = countWord(settings.effect.popupIn);
			if(msg != 1)
			{
				alertmsg = alertmsg+'<li>Your effect popupIn is bad : "'+settings.effect.popupIn+'" <br />Your Effect popupIn must have one word. <br />ex: \'popupIn\' : \'fade\' or  \'show\' or  \'slide\'</li>';
			}
			else
			{
				switch(settings.effect.popupIn)
				{
					case 'fade':
					break;
					
					case 'slide':
					break;
					
					case 'show':
					break;
					
					default:
					alertmsg = alertmsg+'<li>Your effect popupIn is bad : "'+settings.effect.popupIn+'" <br />Effect in popupIn must be string. <br />ex: \'popupIn\' : \'fade\' or  \'show\' or  \'slide\'</li>';
					break;
				}
			}
		}
		
		if(typeof settings.effect.popupOut != 'string')
			alertmsg = alertmsg+'<li>Your effect popupOut is bad : "'+settings.effect.popupOut+'" <br />Effect in popupOut must be string. <br />ex: \'popupOut\' : \'fade\' or  \'show\' or  \'slide\'</li>';
		
		if(typeof settings.effect.popupOut == 'string')
		{
			msg = countWord(settings.effect.popupOut);
			if(msg != 1)
			{
				alertmsg = alertmsg+'<li>Your effect popupOut is bad : "'+settings.effect.popupOut+'" <br />Your Effect popupOut must have one word. <br />ex: \'popupOut\' : \'fade\' or  \'show\' or  \'slide\'</li>';
			}
			else
			{
				switch(settings.effect.popupOut)
				{
					case 'fade':
					break;
					
					case 'slide':
					break;
					
					case 'show':
					break;
					
					default:
					alertmsg = alertmsg+'<li>Your effect popupOut is bad : "'+settings.effect.popupOut+'" <br />Effect in popupOut must be string. <br />ex: \'popupOut\' : \'fade\' or  \'show\' or  \'slide\'</li>';
					break;
				}
			}
		}
		
		if(typeof settings.effect.bgTime != 'number' || isFloat(settings.effect.bgTime))
			alertmsg = alertmsg+'<li>Your effect bgTime is bad : "'+settings.effect.bgTime+'" <br />Effect bgTime must be numeric. <br />ex: \'bgTime\' : 400</li>';
	
		if(typeof settings.effect.popupTime != 'number' || isFloat(settings.effect.popupTime))
			alertmsg = alertmsg+'<li>Your effect popupTime is bad : "'+settings.effect.popupTime+'" <br />Effect popupTime must be numeric. <br />ex: \'popupTime\' : 1000</li>';
			
		if(alertmsg != '') 
		{
			var overlay = jQuery('<div class="overlay-error"></div>').css({
				'width' : '100%',
				'background' : 'black',
				'height' : jQuery(document).height(),
				'position' : 'absolute',
				'top' : 0,
				'opacity' : 0.7,
				'zIndex' : 9999999,
				'cursor' : 'pointer'
			}).hide();
			var content = jQuery('<div id="error"></div>').css({
				'width' : '250px',
				'position' : 'fixed',
				'top' : '50px',
				'left' : '-270px',
				'padding' : '10px',
				'background' : 'white',
				'borderRadius' : '6px',
				'fontFamily' : 'georgia'
			}).html('<h2 style="text-align:center;">DEBUG PARAMS</h2><ul></ul>');
			content = overlay.append(content);
			jQuery('body').append(content);
		}
	}
	
	var t;
	
	//create div for background
	function overlay()
	{
		var overlay = jQuery('<div class="'+settings.overlay.class+'"></div>').css(settings.overlay.css).hide();
		if(settings.overlay.closeOnClick) 
			overlay.css('cursor','pointer');
		jQuery('body').append(overlay);
	}
	
	function popup() 
	{
		if(t != settings.popup.width)
		{	
			if(settings.popup.css.borderWidth != '' && settings.popup.css.borderWidth != 0)
				settings.popup.width = settings.popup.width+(settings.popup.css.borderWidth*2);
			t = settings.popup.width;
		}
		//create div popup
			var content = jQuery('<div class="'+settings.popup.class+'"></div>').css(
			{
				'top' : "50%",
				'left' : "50%",
				'width' : settings.popup.width+"px",
				'height' : settings.popup.height+"px",
				'marginTop' : -(settings.popup.height/2)+"px",
				'marginLeft' : -(settings.popup.width/2)+"px",
				'position' : "fixed",
				'zIndex' : 99999
			}).hide();

			var close = jQuery('<a class="'+settings.close.class+'">'+settings.close.text+'</a>').css(settings.close.css);
			var innerPopup = jQuery('<div class="'+settings.popup.class+'_int">'+settings.popup.htmlpopup+'</div>').css(settings.popup.css);

			content = content.append(close).append(innerPopup);
			jQuery('body').append(content);

	}
	
	function effectIn()
	{
		var appel = jQuery('.'+settings.overlay.class);
		//in overlay
		switch(settings.effect.bgIn) 
		{
			case 'show' :
				appel.show();
				break;
			
			case 'slide' :
				appel.slideDown(settings.effect.bgTime);
				break;
				
			case 'fade' :
				appel.fadeIn(settings.effect.bgTime);
				break;
			
			default :
				appel.show();
				break;
		}
		
		appel = jQuery('.'+settings.popup.class);
		//in popup
		switch(settings.effect.popupIn) 
		{
			case 'show' :
				appel.show();
				break;
			
			case 'slide' :
				appel.slideDown(settings.effect.popupTime);
				break;
				
			case 'fade' :
				appel.fadeIn(settings.effect.popupTime);
				break;
			
			default :
				appel.show();
				break;
		}
	}
		
	function effectOut()
	{
		//out bg
		switch(settings.effect.bgOut) 
		{
			case 'show' :
				jQuery('.'+settings.overlay.class).hide(settings.effect.popupTime,function(){remove()});
				break;
			
			case 'slide' :
				jQuery('.'+settings.overlay.class).slideUp(settings.effect.popupTime,function(){remove()});
				break;
				
			case 'fade' :
				jQuery('.'+settings.overlay.class).fadeOut(settings.effect.popupTime,function(){remove()});
				break;
			
			default :
				jQuery('.'+settings.overlay.class).hide(settings.effect.popupTime,function(){remove()});
				break;
		}
		//out popup
		switch(settings.effect.popupOut) 
		{
			case 'show' :
				jQuery('.'+settings.popup.class).hide(settings.effect.popupTime,function(){remove()});
				break;
			
			case 'slide' :
				jQuery('.'+settings.popup.class).slideUp(settings.effect.popupTime,function(){remove()});
				break;
				
			case 'fade' :
				jQuery('.'+settings.popup.class).fadeOut(settings.effect.popupTime,function(){remove()});
				break;
			
			default :
				jQuery('.'+settings.popup.class).hide(settings.effect.popupTime,function(){remove()});
				break;
		}	
	}
	
	//choice exit's buttons
	function choiceOut()
	{
		//bg click exit or no
		if(settings.overlay.closeOnClick)
		{
			var content = '.'+settings.close.class+', .'+settings.overlay.class;
			jQuery('.'+settings.overlay.class).css('cursor','pointer');
		}
		else
		{
			var content = '.'+settings.close.class;
		}
			
		jQuery(content).click(function()
		{
			effectOut();
		});
		
		if(settings.close.EscClose)
		{
			jQuery(document).keyup(function(e)
			{
				if (e.which == 27) 
				{
					effectOut();
				}
			});
		}
	}
	
	//remove popup and bg
	function remove() 
	{
		if(settings.popup.class != '')
			jQuery('.'+settings.popup.class).remove();
		if(settings.overlay.class != '')
			jQuery('.'+settings.overlay.class).remove();
	}
	
	if(settings.debug)
		error();
	
	function cookies() 
	{
		if(settings.cookie.active)
		{ //cookie false or true
			if(!jQuery.cookie(settings.cookie.name))
			{ //cookie exist or no
				jQuery.cookie(settings.cookie.name,"popup",{ expires: settings.cookie.time });
				call(); //call functions
			}
		}
		else
		{
			call(); //call functions
		}
	}
	
	function call() 
	{
		overlay();
		popup();
		effectIn();
		choiceOut();
	}
	
	//show alert
	function contentalert() 
	{
		jQuery('.overlay-error').fadeIn();
		jQuery('#error ul').html(alertmsg);
		jQuery('#error ul li').css({
			'fontFamily' : 'georgia',
			'fontSize' : '12px',
			'fontStyle' : 'italice',
			'padding' : '10px 0'
		});
		jQuery('#error').animate({
			left : 0
		},600);
	}
	
	//show popup action
	if (settings.onClick.active)
	{
		if(alertmsg != '')
		{
			jQuery('.'+settings.onClick.class).click(function()
			{
				contentalert();
			});
		}
		else
		{
			jQuery('.'+settings.onClick.class).click(function()
			{
				cookies();
			});
		}
	}
	else
	{
		if(alertmsg != '')
		{
			contentalert();
		}
		else
		{
			cookies();
		}
	}
	
	jQuery('.overlay-error').click(function(){
		$(this).fadeOut();
		jQuery('#error').animate({
			left : -270+'px'
		},600);
	});

}