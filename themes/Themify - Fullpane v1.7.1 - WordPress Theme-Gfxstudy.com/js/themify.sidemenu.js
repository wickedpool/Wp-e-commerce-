;(function($) {

	'use strict';

	var defaults = {
			panel: '#mobile-menu',
			close: '',
			side: 'right',
			speed: 250
		};

	function SideMenu ( element, options ) {
		this.element = element;
		this.settings = $.extend( {}, defaults, options );
		this._defaults = defaults;
		this.panelVisible = false;
		this.panelCleanName = this.settings.panel.replace( /#|\.|\s/g, function(match) { 
			var replacements = { '#':'', '\.':'', ' ':'-' };
			return replacements[match]; } );
		this.init();
	}

	SideMenu.prototype = {
		init: function () {
			var self = this;
			$(this.element).on('click', function(e) {
				e.preventDefault();
				if ( self.panelVisible ) {
					self.hidePanel();
				} else {
					self.showPanel();
				}
			});
			if ( '' !== self.settings.close ) {
				$(self.settings.close).on('click', function(e) {
					e.preventDefault();
					self.hidePanel();
				});
			}
			$('body').addClass('sidemenu-active').on( 'scrollhighlightstart.themify', function() {
				if ( self.panelVisible ) {
					self.hidePanel();
				}
			}).on( 'sidemenushow.themify', function(e, emitterPanel) {
				if ( emitterPanel !== self.settings.panel ) {
					self.hidePanel();
				}
			});
		},
		showPanel: function () {
			var thisPanel = this.settings.panel;
			$(thisPanel).removeClass('sidemenu-off').addClass('sidemenu-on').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
				$(this).trigger( 'sidemenuaftershow.themify', [thisPanel]);
			});
			$('body').addClass(this.panelCleanName + '-visible sidemenu-' + this.settings.side).trigger('sidemenushow.themify', [thisPanel]);
			this.panelVisible = true;
		},
		hidePanel: function () {
			var thisPanel = this.settings.panel;
			$(thisPanel).removeClass('sidemenu-on').addClass('sidemenu-off');
			$('body').removeClass(this.panelCleanName + '-visible sidemenu-' + this.settings.side).trigger('sidemenuhide.themify', [thisPanel]);
			this.panelVisible = false;
		}
	};

	$.fn.themifySideMenu = function ( options ) {
		if ( 'string' === typeof options ) {
			var self = $.data( this, 'SideMenu' );
			if ( self ) {
				if ( 'show' == options ) {
					self.showPanel();
				}
				if ( 'hide' == options ) {
					self.hidePanel();
				}
			}
		} else {
			return this.each(function() {
				if ( !$.data( this, 'SideMenu' ) ) {
					$.data( this, 'SideMenu', new SideMenu( this, options ) );
				}
			});
		}
	};

})(jQuery);