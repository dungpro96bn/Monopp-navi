import '../scss/cf7msm.scss';

var cf7msm_ss;

(function( $ ) {
	// load on DOMContentLoaded bc wpc7 loads here.
	document.addEventListener( 'DOMContentLoaded', event => {
		var posted_data = cf7msm_posted_data;
		var cf7msm_field = $("input[name='_cf7msm_multistep_tag']");
		var hasMultistepOptions = cf7msm_field.length > 0;
		var isCF7MSM = hasMultistepOptions;
		if (!isCF7MSM) {
			cf7msm_field = $("input[name='cf7msm-step']");
			isCF7MSM = ( cf7msm_field.length > 0 );
		}
		if ( !isCF7MSM ) {
			//not a multi step form
			return;
		}
		var cf7msm_form = cf7msm_field.closest('form');
		var form_id = cf7msm_form.find('input[name="_wpcf7"]').val();
		
		if ( cf7msm_hasSS() ) {
			cf7msm_ss = sessionStorage.getObject( 'cf7msm' );
			/*
			//multi step forms
			if (cf7msm_ss != null && step_field.length > 0) {
				var cf7_form = $(step_field[0].form);
				$.each(cf7msm_ss, function(key, val){
					if (key == 'cf7msm_prev_urls') {
						cf7_form.find('.wpcf7-back, .wpcf7-previous').click(function(e) {
							window.location.href = val[step_field.val()];
							e.preventDefault();
						});
					}
				});
			}
			*/
			//multi step forms
			if (cf7msm_ss != null) {
				$.each(cf7msm_ss, function(key, val){
					if (key == 'cf7msm_prev_urls') {
						var backButton = cf7msm_form.find('.wpcf7-back, .wpcf7-previous');
						var url = window.location.href;
						var url_no_slash = url.replace(/\/$/, ""); // w/o trailing slash
						var maybeHideButton = (!val.hasOwnProperty(url) || val[url] == '' );
						if (maybeHideButton) {
							// also check w/o trailing slash since it's sometimes added in the url.
							maybeHideButton = (!val.hasOwnProperty(url_no_slash) || val[url_no_slash] == '' )
						}
						// try again without the querystring
						if (maybeHideButton) {
							url = url.split('?')[0];
							url_no_slash = url.replace(/\/$/, ""); // w/o trailing slash
							maybeHideButton = (!val.hasOwnProperty(url) || val[url] == '' );
							if (maybeHideButton) {
								// also check w/o trailing slash since it's sometimes added in the url.
								maybeHideButton = (!val.hasOwnProperty(url_no_slash) || val[url_no_slash] == '' )
							}
						}
						if (maybeHideButton) {
							backButton.hide();
						}
						else {
							backButton.click(function(e) {
								if (val.hasOwnProperty(url) && val[url] != '') {
									window.location.href = val[url];
								}
								else if (val.hasOwnProperty(url_no_slash) && val[url_no_slash] != '') {
									window.location.href = val[url_no_slash];
								}
								else {
									window.history.go(-1);
								}
								e.preventDefault();
							});						
						}
					}
				});
			}

			
		}
		else {
			$("input[name='cf7msm-no-ss']").val(1);
			$(".wpcf7-previous").hide();
		}

		function cf7msm() {
			
			if (posted_data) {
				
				$.each(posted_data, function(key, val){
					if ( key.indexOf('[]') === key.length - 2 ) {
						key = key.substring(0, key.length - 2 );
					}
					if ( key.indexOf('_') != 0 && key != 'cf7msm-step' && key != 'cf7msm_options') {
						var field = cf7msm_form.find('*[name="' + key + '"]:not([data-cf7msm-previous])');
						var checkbox_field = cf7msm_form.find('input[name="' + key + '[]"]:not([data-cf7msm-previous])'); //value is this or this or tihs
						var multiselect_field = cf7msm_form.find('select[name="' + key + '[]"]:not([data-cf7msm-previous])');
						if (field.length > 0) {
							if ( field.prop('type') == 'radio' || field.prop('type') == 'checkbox' ) {
								// check free text fields
								var new_vals = getPossibleFreeTextVal(posted_data, key, val);
								if (new_vals !== null) {
									var field_w_free = field.filter('[value="' + new_vals.new_val + '"]');
									if (field_w_free.length > 0) {
										$('input[name="_wpcf7_free_text_' + key + '"]', cf7msm_form).val(new_vals.free_val);
										val = new_vals.new_val;
									}
								}
								field.filter(function(){
										return $(this).val() == val;
									}).prop('checked', false).trigger('click', [{cf7msm: true}]);
							}
							else if ( field.is('select') ) {
								field.find('option').filter(function() {
									return this.value == val;
								}).prop('selected', true);
							}
							else {
								field.val(val);	
							}
						}
						else if ( checkbox_field.length > 0 && val.constructor === Array ) {
							//checkbox
							if ( val != '' && val.length > 0  ) {
								$.each(val, function(i, v){
									checkbox_field.filter(function(){
										return $(this).val() == v;
									}).prop('checked', false).trigger('click', [{cf7msm: true}]);
								});	
							}
							// now do free text fields
							var last_val = val[val.length - 1];
							var new_vals = getPossibleFreeTextVal(posted_data, key, last_val);
							if (new_vals !== null) {
								var field_w_free = checkbox_field.filter('[value="' + new_vals.new_val + '"]')
								if (field_w_free.length > 0) {
									field_w_free
										.prop('checked', false)
										.trigger('click', [{cf7msm: true}])
									;
									var free_field = $('input[name="_wpcf7_free_text_' + key + '"]');
									free_field.val(new_vals.free_val);
								}
							}
						}
	
						else if ( multiselect_field.length > 0 && val.constructor === Array ) {
							if ( val != '' && val.length > 0  ) {
								$.each(val, function(i, v){
									multiselect_field.find('option').filter(function(){
										return this.value == v;
									}).prop('selected', true);
								});	
							}
						}
	
						
					}
				});

				// if using conditional fields, get it to do its thing
				cf7msm_form.find('input[name="_wpcf7cf_options"]').trigger('change');
	
				
			}
		}

		var savedSubmit = wpcf7.submit;
		wpcf7.submit = function( form, arg2 ) {
			cf7msmBeforeSubmit( form, arg2 );
			savedSubmit( form, arg2 );
		};

		function cf7msmBeforeSubmit( form ) {
			
			cf7msmSetOptions( form );
			cf7msmSetFreeText( form );
		}
		
		function cf7msmSetOptions( cf7_form_arg ) {
			var form = cf7_form_arg;
			if ( ! ( form instanceof jQuery ) ) {
				form = $(cf7_form_arg);
			}

			var cf7msm_option = form.find("input[name='_cf7msm_multistep_tag']");
			
			if ( cf7msm_option.length == 0) {
				return;
			}

			if (cf7msm_option.length > 1){
				cf7msm_option = cf7msm_option.last();
			}
			$('<input />', {
				'type': 'hidden',
				'name': 'cf7msm_options',
				'value': cf7msm_option.val()
			}).appendTo(form);
		}

		function cf7msmSetFreeText( cf7_form_arg ) {
			var form = cf7_form_arg;
			if ( ! ( form instanceof jQuery ) ) {
				form = $(cf7_form_arg);
			}
			var free_text_els = $('.has-free-text', form);
			free_text_els.each(function() {
				var el = $(this);
				var ref_el = $('input:checkbox', el);
				if (ref_el.length == 0) {
					ref_el = $('input:radio', el);
				}
				if (ref_el.length == 0) {
					return false;
				}
				var ref_name = ref_el.attr('name');
				if ( ref_name.indexOf('[]') === ref_name.length - 2 ) {
					ref_name = ref_name.substring(0, ref_name.length - 2 );
				}
				var new_ref_name = '_cf7msm_free_text_reflen_' + ref_name;
				var new_ref_el = $('input[name="' + new_ref_name + '"]', el);
				if (ref_el.is(':checked')) {
					if (new_ref_el.length == 0) {
						new_ref_el = $('<input type="hidden" name="' + new_ref_name + '">');
						el.append(new_ref_el);
					}
					new_ref_el.val(ref_el.val().length);
				}
				else if (new_ref_el.length > 0) {
					new_ref_el.remove();
				}
			})

		}
		// returns the value of the ref field, sets the free text field
		function getPossibleFreeTextVal(posted_data, key, _val) {
            var val = _val;
			// radio button is an array when using cookie.
			if (_val.constructor === Array) {
				val = _val[_val.length - 1];
			}
			var ret = null;
			var ref_name = '_cf7msm_free_text_reflen_' + key;
			if (ref_name in posted_data) {
				var ref_len = parseInt(posted_data[ref_name]);
				if (ref_len <= val.length) {
					ret = {
						new_val: val.substring(0, ref_len),
						free_val: val.substring(ref_len+1)
					}
				}
			}
			return ret;
		}

		

		window.addEventListener( 'load', function() {
			cf7msm();
		} );

		document.addEventListener( 'wpcf7mailsent', function( e ) {
			var form = $('#' + e.detail.unitTag + ' form');
			if ( cf7msm_hasSS() ) {
				var currStep = 0;
				var totalSteps = 0;
				var names = [];
				var currentInputs = {};
				cf7msm_ss = sessionStorage.getObject('cf7msm');
				if ( !cf7msm_ss ) {
					cf7msm_ss = {};
				}
				var isCF7MSM = false;
				var hasMultistepOptions = false;
				var show_success = true;
				var hide_form = false;
				var nextUrl = null;
				var last_step = false;
				
				var free_text_els = $('.has-free-text', form);
				$.each(e.detail.inputs, function(i){
					var name = e.detail.inputs[i].name;
					var value = e.detail.inputs[i].value;

					// CF7 v5.x Does not return free text inputs! or cf7msm inputs
					// alter value if it has free text
					// update reflen field
					var free_text_input_el = $('input[name="' + name +'"]', free_text_els);
					if (free_text_input_el.length > 0) {
						if (free_text_input_el.is(':checked')) {
							var base_name = name;
							if ( name.indexOf('[]') === name.length - 2 ) {
								base_name = name.substring(0, name.length - 2);
							}
							var ref_len = value.length;
							// append free text value
							value += ' ' + $('input[name="_wpcf7_free_text_' + base_name + '"]', free_text_els).val();
							var ref_name = '_cf7msm_free_text_reflen_' + base_name;
							currentInputs[ref_name] = ref_len;
						}
					}

					//make it compatible with cookie version
					if ( name.indexOf('[]') === name.length - 2 ) {
						if ( $.inArray(name, names) === -1 ) {
							currentInputs[name] = [];
						}
						currentInputs[name].push(value);
					}
					else {
						currentInputs[name] = value;
					}
					
					//figure out prev url
					if ( name === 'cf7msm-step' ) {
						if ( value.indexOf("-") !== -1 ) {
							isCF7MSM = true;
							hasMultistepOptions = false;

							var stepParts = value.split('-');
							currStep = parseInt( stepParts[0] );
							totalSteps = parseInt( stepParts[1] );
							if ( typeof cf7msm_redirect_urls[form_id] !== 'undefined' ) {
								nextUrl = cf7msm_redirect_urls[form_id];
							}
							if ( currStep < totalSteps ) {
								show_success = false;
							}
							else if ( currStep === totalSteps ) {
								hide_form = true;
							}
						}
					}
					else if (name === 'cf7msm_options' ) {
						isCF7MSM = true;
						hasMultistepOptions = true;
						show_success = false;
						var options = JSON.parse( value );
						if (options.hasOwnProperty( 'next_url' ) ) {
							nextUrl = options.next_url;
						}
						if (options.hasOwnProperty( 'last_step' ) ) {
							last_step = true;
							if (!nextUrl || nextUrl === '') {
								hide_form = true;
								show_success = true;
							}
						}
					}
					else {
						names.push(name);
					}
				});
				if (!isCF7MSM) {
					return;
				}
				if (!show_success) {
					// hide the success messages
					// for cf7 5.2.1
					var msg = $('#' + e.detail.unitTag).find('div.wpcf7-mail-sent-ok');
					if (msg.length == 0) {
						msg = $('#' + e.detail.unitTag).find('.wpcf7-response-output')
					}
					msg.remove();
					
				}

				if (hide_form) {
					// hide the form
					form.find('*').not('div.wpcf7-response-output').hide();
					form.find('div.wpcf7-response-output').parentsUntil('form').show();						            	
				}

				

				if ( !hasMultistepOptions ) {	    	
					if ( currStep != 0 && currStep === totalSteps ) {
						cf7msm_ss = {};
					}	
				}
				else if ( last_step ) {
					cf7msm_ss = {};
				}

				if (nextUrl && nextUrl != '') {
					var parser = document.createElement('a');
					parser.href = nextUrl;
					var nextUrlHostName = parser.hostname ? parser.hostname : '';

					var steps_prev_urls = {};
					if ( cf7msm_ss && cf7msm_ss.cf7msm_prev_urls ) {
						steps_prev_urls = cf7msm_ss.cf7msm_prev_urls;
					}
					var startOfUrl = window.location.protocol + "//" + window.location.host;
					if ( nextUrl.indexOf( startOfUrl ) !== 0 && (nextUrlHostName == '' || nextUrlHostName == window.location.host)) {
						if (nextUrl.indexOf('/') !== 0 ) {
							startOfUrl += '/';
						}
						nextUrl = startOfUrl + nextUrl;
					}
					steps_prev_urls[nextUrl] = window.location.href;
					var without_query = nextUrl.split('?')[0];
					if (nextUrl != without_query) {
						steps_prev_urls[without_query] = window.location.href;
					}
					cf7msm_ss.cf7msm_prev_urls = steps_prev_urls;
				}

				sessionStorage.setObject('cf7msm', cf7msm_ss);

				if (nextUrl && nextUrl != '') {
					window.location.href = nextUrl;
				}

				
				/*
				if ( currStep != 0 && currStep === totalSteps ) {
					cf7msm_ss = {};
				}
				sessionStorage.setObject('cf7msm', cf7msm_ss);
				*/
			}
		}, false );
	});
})(jQuery);


/**
 * Given 2 arrays, return a unique array
 * https://codegolf.stackexchange.com/questions/17127/array-merge-without-duplicates
 */
function cf7msm_uniqueArray(i,x) {
	var h = {};
	var n = [];
	for (var a = 2; a--; i=x)
	   i.map(function(b){
		 h[b] = h[b] || n.push(b);
	   });
	return n
 }
 
 /**
  * check if local storage is usable.
  */
 function cf7msm_hasSS() {
	 var test = 'test';
	 try {
		 sessionStorage.setItem(test, test);
		 sessionStorage.removeItem(test);
		 return true;
	 } catch(e) {
		 return false;
	 }
 }
 Storage.prototype.setObject = function(key, value) {
	 this.setItem(key, JSON.stringify(value));
 }
 
 Storage.prototype.getObject = function(key) {
	 var value = this.getItem(key);
	 return value && JSON.parse(value);
 }
 
 /**
  * Escape values when inserting into HTML attributes
  * From SO: https://stackoverflow.com/questions/7753448/how-do-i-escape-quotes-in-html-attribute-values
  */
 function quoteattr(s, preserveCR) {
	 preserveCR = preserveCR ? '&#13;' : '\n';
	 return ('' + s) /* Forces the conversion to string. */
		 .replace(/&/g, '&amp;') /* This MUST be the 1st replacement. */
		 .replace(/'/g, '&apos;') /* The 4 other predefined entities, required. */
		 .replace(/"/g, '&quot;')
		 .replace(/</g, '&lt;')
		 .replace(/>/g, '&gt;')
		 /*
		 You may add other replacements here for HTML only 
		 (but it's not necessary).
		 Or for XML, only if the named entities are defined in its DTD.
		 */ 
		 .replace(/\r\n/g, preserveCR) /* Must be before the next replacement. */
		 .replace(/[\r\n]/g, preserveCR);
 }
 /**
  * Escape values when using in javascript first.
  * From SO: https://stackoverflow.com/questions/7753448/how-do-i-escape-quotes-in-html-attribute-values
  */
 function escapeattr(s) {
	 return ('' + s) /* Forces the conversion to string. */
		 .replace(/\\/g, '\\\\') /* This MUST be the 1st replacement. */
		 .replace(/\t/g, '\\t') /* These 2 replacements protect whitespaces. */
		 .replace(/\n/g, '\\n')
		 .replace(/\u00A0/g, '\\u00A0') /* Useful but not absolutely necessary. */
		 .replace(/&/g, '\\x26') /* These 5 replacements protect from HTML/XML. */
		 .replace(/'/g, '\\x27')
		 .replace(/"/g, '\\x22')
		 .replace(/</g, '\\x3C')
		 .replace(/>/g, '\\x3E')
		 ;
 }
