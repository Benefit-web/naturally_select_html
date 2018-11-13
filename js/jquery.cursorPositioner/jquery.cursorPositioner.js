/**
 * jquery.cursor.positioner v1.0.0 - カーソル位置定期取得
 *
 * Copyright (c) Akira Murata <a.murata0608@gmail.com>
 */

;(function($){

	var plugin = {};

	var defaults = {

		// acquisitionTime
		acquisitionTime: 5000,
	}

	/**
	* current script path settings
	*/
	var currentScriptPath = function(){
	    var root;
	    var scripts = document.getElementsByTagName("script");
	    var i = scripts.length;
	    while (i--) {
	        var match = scripts[i].src.match(/(^|.*\/)jquery.cursorPositioner\.js$/);
	        if (match) {
	            root = match[1];
	            break;
	        }
	    }
	    return (root);
	}

	/**
	* get config
	*/
	var getConfig = function(scrptPath){
				$.ajaxSetup({async: false});
				var responce = $.getJSON(scrptPath+"config.json", function(data){
					return data;
				});
				$.ajaxSetup({async: true});
				var parse = $.parseJSON(responce.responseText);
				return parse;
	}

	// get AjaxUrl
	var config = getConfig(currentScriptPath());
  var url = config.url;
	var site = config.site;

	$.fn.cursorPositioner = function(options){

		var cursor = {};
	  var currentCursorPosition = {};
		var referrer;
		var ua;

		/**
		 * ===================================================================================
		 * = PRIVATE FUNCTIONS
		 * ===================================================================================
		 */

		/**
		 * Initializes namespace settings
		 */
		var init = function(){
			cursor.settings = $.extend({}, defaults, options);

			// CookieID
			// referrer
			referrer = document.referrer;
			// userAgent
			ua = getUserAgent();
			// globalIp
			//var gip = getGlobal();
			setInterval(run(), cursor.settings.acquisitionTime);
		}

		/**
		 * Initializes namespace settings
		 */
		var run = function(){

			// get cursor position
			var pos = getCursorPosition();
			var timeStamp = $.now();

			// Ajax
			$.ajax({
				type: 'POST',
		    url: url,
		    cache: false,
				data: {
					timestamp: timeStamp,
					referrer: referrer,
					site: site,
					userajent: ua,
					clientX: pos['cx'],
					clientX: pos['cx'],
					screenX: pos['sx'],
					screenY: pos['sy'],
					pageX: pos['px'],
					pageY: pos['py']
				},
        success: function( data ) {
        },
        error: function( data ) {
        }
		  });
		}

		/**
		 * UserAgent settings
		 */
		var getUserAgent = function(){
			var ua = {};
			ua.name = window.navigator.userAgent.toLowerCase();

			ua.isIE = (ua.name.indexOf('msie') >= 0 || ua.name.indexOf('trident') >= 0);
			ua.isiPhone = ua.name.indexOf('iphone') >= 0;
			ua.isiPod = ua.name.indexOf('ipod') >= 0;
			ua.isiPad = ua.name.indexOf('ipad') >= 0;
			ua.isiOS = (ua.isiPhone || ua.isiPod || ua.isiPad);
			ua.isAndroid = ua.name.indexOf('android') >= 0;
			ua.isTablet = (ua.isiPad || (ua.isAndroid && ua.name.indexOf('mobile') < 0));

			if (ua.isIE) {
					ua.verArray = /(msie|rv:?)\s?([0-9]{1,})([\.0-9]{1,})/.exec(ua.name);
					if (ua.verArray) {
							ua.ver = parseInt(ua.verArray[2], 10);
							return ua.name + ua.ver;
					}
			}
			if (ua.isiOS) {
					ua.verArray = /(os)\s([0-9]{1,})([\_0-9]{1,})/.exec(ua.name);
					if (ua.verArray) {
							ua.ver = parseInt(ua.verArray[2], 10);
							return ua.name + ua.ver;
					}
			}
			if (ua.isAndroid) {
					ua.verArray = /(android)\s([0-9]{1,})([\.0-9]{1,})/.exec(ua.name);
					if (ua.verArray) {
							ua.ver = parseInt(ua.verArray[2], 10);
							return ua.name + ua.ver;
					}
			}

			return ua.name;
		}


		/**
		 * CursorPosition settings
		 */
		var getCursorPosition = function(){

			var position = new Array();
			var getCookies = ['cx','cy','sx','sx','px','py'];

	    var setCookies = document.cookie;

	    if( cookies != '' )
	    {
	        var cookies = setCookies.split( '; ' );

	        for( var i = 0; i < cookies.length; i++ )
	        {
	            var cookie = cookies[ i ].split( '=' );
							if($.inArray(cookie[0], getCookies) >= 0){
								position[ cookie[0] ] = cookie[1];
							}
	        }
	    }
	    return position;
		}

		init();

		// returns the current jQuery object
		return this;
	}

})(jQuery);
