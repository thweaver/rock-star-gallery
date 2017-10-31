<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui">
		<meta name="format-detection" content="telephone=no">
		<meta name="description" content="">
		<link rel="apple-touch-icon" href="apple-touch-icon.png">
		<link href="<?php bloginfo('template_url'); ?>/css/main.min.css?v=4" rel="stylesheet">
		<script src="<?php bloginfo('template_url'); ?>/js/modernizr.min.js"></script>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class( 'page-' . $post->post_name ); ?>>
	<div class="loader">
		<div class="loader-wrapper">
			<?php include 'img/loader-icon.svg' ?>
		</div>
	</div>
	<header>
		<a href="<?php bloginfo('url'); ?>" class="site-logo">
			<?php include 'img/logo-rockstar.svg' ?>
		</a>
		<nav class="nav-flex">
			<?php
				$c_menu = get_nav_menu('celebrity');
				$p_menu = get_nav_menu('photograhy');
				$co_menu = get_nav_menu('collectibles');
			?>
			<form class="search-bar">
				<div class="search-input">
					<input type="text" class="search-text" />
					<?php include 'img/icon-search.svg' ?>
				</div>
			</form>
			<ul class="main-nav">
				<li>
					<a href="<?php bloginfo('url'); ?>/celebrity-artists" class="main-nav-item">CELEBRITY ARTISTS</a>
					<?php if( count( $c_menu ) ) : ?>
						<ul class="sub-nav-list">
							<?php foreach($c_menu as $item) : ?>
								<li class="sub-nav-list-item">
									<a href="<?php echo $item->url; ?>" title="<?php echo $item->title; ?>">
									<?php echo $item->title; ?>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</li>
				<li>
					<a href="<?php bloginfo('url'); ?>/fine-photography" class="main-nav-item">Fine Photography</a>
					<?php if( count( $p_menu ) ) : ?>
						<ul class="sub-nav-list">
							<?php foreach($p_menu as $item) : ?>
								<li class="sub-nav-list-item">
									<a href="<?php echo $item->url; ?>" title="<?php echo $item->title; ?>">
									<?php echo $item->title; ?>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</li>
				<li>
					<a href="<?php bloginfo('url'); ?>/collectibles" class="main-nav-item">Collectibles</a>
					<?php if( count( $co_menu ) ) : ?>
						<ul class="sub-nav-list">
							<?php foreach($co_menu as $item) : ?>
								<li class="sub-nav-list-item">
									<a href="<?php echo $item->url; ?>" title="<?php echo $item->title; ?>"">
									<?php echo $item->title; ?>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</li>
			</ul>
		</nav>
		<div class="hamburger">
			<a href="#" class="hamburger-icon">
				<span></span>
			</a>
		</div>
		<nav class="secondary-nav">
			<ul class="secondary-nav-list">
				<!-- <li><a href="<?php bloginfo('url'); ?>/blog" class="secondary-nav-item">Blog</a></li> -->
				<li><a href="<?php bloginfo('url'); ?>/featured-collections" class="secondary-nav-item">Featured Collections</a></li>
				<li><a href="<?php bloginfo('url'); ?>/gallery" class="secondary-nav-item">Gallery</a></li>
				<li><a href="<?php bloginfo('url'); ?>/testimonials" class="secondary-nav-item">Testimonials</a></li>
				<li><a href="<?php bloginfo('url'); ?>/customer-service" class="secondary-nav-item">Customer Service</a></li>
			</ul>
			<ul class="social-nav">
				<li>
					<a href="<?php the_field('facebook', 16) ?>" class="social-icon">
						<?php include 'img/icon-socialMedia--facebook.svg' ?>
					</a>
				</li>
				<li>
					<a href="<?php the_field('twitter', 16) ?>" class="social-icon">
						<?php include 'img/icon-socialMedia--twitter.svg' ?>
					</a>
				</li>
				<li>
					<a href="<?php the_field('instagram', 16) ?>" class="social-icon">
						<?php include 'img/icon-socialMedia--instagram.svg' ?>
					</a>
				</li>
				<li>
					<a href="<?php the_field('youtube', 16) ?>" class="social-icon">
						<?php include 'img/icon-socialMedia--youtube.svg' ?>
					</a>
				</li>
				<li>
					<a  class="newsletter-btn venobox" href="#js-newsletter" data-type='inline'>
						<span>Join Our Newsletter</span>
						<?php include 'img/icon-socialMedia--email.svg' ?>
					</a>
					<div class="more-content" id="js-newsletter">
					<div class="newsletter-form">
							<h2>
								<span>Join Our Newsletter</span>
							</h2>
						    <form id="ema_signup_form" target="_blank" action="https://madmimi.com/signups/subscribe/97687" accept-charset="UTF-8" method="post">
						       <input name="utf8" type="hidden" value="✓"/>
						       <div class="mimi_field required">
						          <input id="signup_email" name="signup[email]" type="text" data-required-field="This field is required" placeholder="Email*"/>
						       </div>
						       <div class="mimi_field required">
						          <input id="signup_name" name="signup[name]" placeholder="Name*" type="text" data-required-field="This field is required"/>
						       </div>
						       <div style="background: white; font-size:1px; height: 0; overflow: hidden">
						          <input type="text" name="1cdfbe62b3e6a4e7531d8f33ec9ebf44" style="font-size: 1px; width: 1px !important; height:1px !important; border:0 !important; line-height: 1px !important; padding: 0 0; min-height:1px !important;"/>
						          <input class="checkbox" type="checkbox" name="beacon"/>
						       </div>
						       <div class="mimi_field">
						          <input type="submit" class="submit" value="Subscribe" id="webform_submit_button" data-default-text="Subscribe" data-submitting-text="Sending..." data-invalid-text="↑ You forgot some required fields" data-choose-list="↑ Choose a list" data-thanks="Thank you!"/>
						       </div>
						    </form>
						</div>
						<script type="text/javascript">
						(function(global) {
						  function serialize(form){if(!form||form.nodeName!=="FORM"){return }var i,j,q=[];for(i=form.elements.length-1;i>=0;i=i-1){if(form.elements[i].name===""){continue}switch(form.elements[i].nodeName){case"INPUT":switch(form.elements[i].type){case"text":case"hidden":case"password":case"button":case"reset":case"submit":q.push(form.elements[i].name+"="+encodeURIComponent(form.elements[i].value));break;case"checkbox":case"radio":if(form.elements[i].checked){q.push(form.elements[i].name+"="+encodeURIComponent(form.elements[i].value))}break;case"file":break}break;case"TEXTAREA":q.push(form.elements[i].name+"="+encodeURIComponent(form.elements[i].value));break;case"SELECT":switch(form.elements[i].type){case"select-one":q.push(form.elements[i].name+"="+encodeURIComponent(form.elements[i].value));break;case"select-multiple":for(j=form.elements[i].options.length-1;j>=0;j=j-1){if(form.elements[i].options[j].selected){q.push(form.elements[i].name+"="+encodeURIComponent(form.elements[i].options[j].value))}}break}break;case"BUTTON":switch(form.elements[i].type){case"reset":case"submit":case"button":q.push(form.elements[i].name+"="+encodeURIComponent(form.elements[i].value));break}break}}return q.join("&")};


						  function extend(destination, source) {
						    for (var prop in source) {
						      destination[prop] = source[prop];
						    }
						  }

						  if (!Mimi) var Mimi = {};
						  if (!Mimi.Signups) Mimi.Signups = {};

						  Mimi.Signups.EmbedValidation = function() {
						    this.initialize();

						    var _this = this;
						    if (document.addEventListener) {
						      this.form.addEventListener('submit', function(e){
						        _this.onFormSubmit(e);
						      });
						    } else {
						      this.form.attachEvent('onsubmit', function(e){
						        _this.onFormSubmit(e);
						      });
						    }
						  };

						  extend(Mimi.Signups.EmbedValidation.prototype, {
						    initialize: function() {
						      this.form         = document.getElementById('ema_signup_form');
						      this.submit       = document.getElementById('webform_submit_button');
						      this.callbackName = 'jsonp_callback_' + Math.round(100000 * Math.random());
						      this.validEmail   = /.+@.+\..+/
						    },

						    onFormSubmit: function(e) {
						      e.preventDefault();

						      this.validate();
						      if (this.isValid) {
						        this.submitForm();
						      } else {
						        this.revalidateOnChange();
						      }
						    },

						    validate: function() {
						      this.isValid = true;
						      this.emailValidation();
						      this.fieldAndListValidation();
						      this.updateFormAfterValidation();
						    },

						    emailValidation: function() {
						      var email = document.getElementById('signup_email');

						      if (this.validEmail.test(email.value)) {
						        this.removeTextFieldError(email);
						      } else {
						        this.textFieldError(email);
						        this.isValid = false;
						      }
						    },

						    fieldAndListValidation: function() {
						      var fields = this.form.querySelectorAll('.mimi_field.required');

						      for (var i = 0; i < fields.length; ++i) {
						        var field = fields[i],
						            type  = this.fieldType(field);
						        if (type === 'checkboxes' || type === 'radio_buttons') {
						          this.checkboxAndRadioValidation(field);
						        } else {
						          this.textAndDropdownValidation(field, type);
						        }
						      }
						    },

						    fieldType: function(field) {
						      var type = field.querySelectorAll('.field_type');

						      if (type.length) {
						        return type[0].getAttribute('data-field-type');
						      } else if (field.className.indexOf('checkgroup') >= 0) {
						        return 'checkboxes';
						      } else {
						        return 'text_field';
						      }
						    },

						    checkboxAndRadioValidation: function(field) {
						      var inputs   = field.getElementsByTagName('input'),
						          selected = false;

						      for (var i = 0; i < inputs.length; ++i) {
						        var input = inputs[i];
						        if((input.type === 'checkbox' || input.type === 'radio') && input.checked) {
						          selected = true;
						        }
						      }

						      if (selected) {
						        field.className = field.className.replace(/ invalid/g, '');
						      } else {
						        if (field.className.indexOf('invalid') === -1) {
						          field.className += ' invalid';
						        }

						        this.isValid = false;
						      }
						    },

						    textAndDropdownValidation: function(field, type) {
						      var inputs = field.getElementsByTagName('input');

						      for (var i = 0; i < inputs.length; ++i) {
						        var input = inputs[i];
						        if (input.name.indexOf('signup') >= 0) {
						          if (type === 'text_field') {
						            this.textValidation(input);
						          } else {
						            this.dropdownValidation(field, input);
						          }
						        }
						      }
						      this.htmlEmbedDropdownValidation(field);
						    },

						    textValidation: function(input) {
						      if (input.id === 'signup_email') return;

						      if (input.value) {
						        this.removeTextFieldError(input);
						      } else {
						        this.textFieldError(input);
						        this.isValid = false;
						      }
						    },

						    dropdownValidation: function(field, input) {
						      if (input.value) {
						        field.className = field.className.replace(/ invalid/g, '');
						      } else {
						        if (field.className.indexOf('invalid') === -1) field.className += ' invalid';
						        this.onSelectCallback(input);
						        this.isValid = false;
						      }
						    },

						    htmlEmbedDropdownValidation: function(field) {
						      var dropdowns = field.querySelectorAll('.mimi_html_dropdown');
						      var _this = this;

						      for (var i = 0; i < dropdowns.length; ++i) {
						        var dropdown = dropdowns[i];

						        if (dropdown.value) {
						          field.className = field.className.replace(/ invalid/g, '');
						        } else {
						          if (field.className.indexOf('invalid') === -1) field.className += ' invalid';
						          this.isValid = false;
						          dropdown.onchange = (function(){ _this.validate(); });
						        }
						      }
						    },

						    textFieldError: function(input) {
						      input.className   = 'required invalid';
						      input.placeholder = input.getAttribute('data-required-field');
						    },

						    removeTextFieldError: function(input) {
						      input.className   = 'required';
						      input.placeholder = '';
						    },

						    onSelectCallback: function(input) {
						      if (typeof Widget === 'undefined' || !Widget.BasicDropdown) return;

						      var dropdownEl = input.parentNode,
						          instances  = Widget.BasicDropdown.instances,
						          _this = this;

						      for (var i = 0; i < instances.length; ++i) {
						        var instance = instances[i];
						        if (instance.wrapperEl === dropdownEl) {
						          instance.onSelect = function(){ _this.validate() };
						        }
						      }
						    },

						    updateFormAfterValidation: function() {
						      this.form.className   = this.setFormClassName();
						      this.submit.value     = this.submitButtonText();
						      this.submit.disabled  = !this.isValid;
						      this.submit.className = this.isValid ? 'submit' : 'disabled';
						    },

						    setFormClassName: function() {
						      var name = this.form.className;

						      if (this.isValid) {
						        return name.replace(/\s?mimi_invalid/, '');
						      } else {
						        if (name.indexOf('mimi_invalid') === -1) {
						          return name += ' mimi_invalid';
						        } else {
						          return name;
						        }
						      }
						    },

						    submitButtonText: function() {
						      var invalidFields = document.querySelectorAll('.invalid'),
						          text;

						      if (this.isValid || !invalidFields) {
						        text = this.submit.getAttribute('data-default-text');
						      } else {
						        if (invalidFields.length || invalidFields[0].className.indexOf('checkgroup') === -1) {
						          text = this.submit.getAttribute('data-invalid-text');
						        } else {
						          text = this.submit.getAttribute('data-choose-list');
						        }
						      }
						      return text;
						    },

						    submitForm: function() {
						      this.formSubmitting();

						      var _this = this;
						      window[this.callbackName] = function(response) {
						        delete window[this.callbackName];
						        document.body.removeChild(script);
						        _this.onSubmitCallback(response);
						      };

						      var script = document.createElement('script');
						      script.src = this.formUrl('json');
						      document.body.appendChild(script);
						    },

						    formUrl: function(format) {
						      var action  = this.form.action;
						      if (format === 'json') action += '.json';
						      return action + '?callback=' + this.callbackName + '&' + serialize(this.form);
						    },

						    formSubmitting: function() {
						      this.form.className  += ' mimi_submitting';
						      this.submit.value     = this.submit.getAttribute('data-submitting-text');
						      this.submit.disabled  = true;
						      this.submit.className = 'disabled';
						    },

						    onSubmitCallback: function(response) {
						      if (response.success) {
						        this.onSubmitSuccess(response.result);
						      } else {
						        top.location.href = this.formUrl('html');
						      }
						    },

						    onSubmitSuccess: function(result) {
						      if (result.has_redirect) {
						        top.location.href = result.redirect;
						      } else if(result.single_opt_in || !result.confirmation_html) {
						        this.disableForm();
						        this.updateSubmitButtonText(this.submit.getAttribute('data-thanks'));
						      } else {
						        this.showConfirmationText(result.confirmation_html);
						      }
						    },

						    showConfirmationText: function(html) {
						      var fields = this.form.querySelectorAll('.mimi_field');

						      for (var i = 0; i < fields.length; ++i) {
						        fields[i].style['display'] = 'none';
						      }

						      (this.form.querySelectorAll('fieldset')[0] || this.form).innerHTML = html;
						    },

						    disableForm: function() {
						      var elements = this.form.elements;
						      for (var i = 0; i < elements.length; ++i) {
						        elements[i].disabled = true;
						      }
						    },

						    updateSubmitButtonText: function(text) {
						      this.submit.value = text;
						    },

						    revalidateOnChange: function() {
						      var fields = this.form.querySelectorAll(".mimi_field.required"),
						          _this = this;

						      for (var i = 0; i < fields.length; ++i) {
						        var inputs = fields[i].getElementsByTagName('input');
						        for (var j = 0; j < inputs.length; ++j) {
						          if (this.fieldType(fields[i]) === 'text_field') {
						            inputs[j].onkeyup = function() {
						              var input = this;
						              if (input.getAttribute('name') === 'signup[email]') {
						                if (_this.validEmail.test(input.value)) _this.validate();
						              } else {
						                if (input.value.length === 1) _this.validate();
						              }
						            }
						          } else {
						            inputs[j].onchange = function(){ _this.validate() };
						          }
						        }
						      }
						    }
						  });

						  if (document.addEventListener) {
						    document.addEventListener("DOMContentLoaded", function() {
						      new Mimi.Signups.EmbedValidation();
						    });
						  }
						  else {
						    window.attachEvent('onload', function() {
						      new Mimi.Signups.EmbedValidation();
						    });
						  }
						})(this);
						</script>

					</div>
					
				</li>
			</ul>
		</nav>
	</header>