(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
'use strict';

(function ($) {
	$.entwine('ss', function ($) {
		$('.field.silverstripe\\\\forms\\\\segment:not(.readonly)').entwine({
			'MaxPreviewLength': 55,

			'Ellipsis': '...',

			'onmatch': function onmatch() {
				if (this.find(':text').length) {
					this.toggleEdit(false);
				}

				this.redraw();
				this._super();
			},

			'redraw': function redraw() {
				var field = this.find(':text');
				var value = field.val();

				var preview = value;

				if (value.length > this.getMaxPreviewLength()) {
					preview = this.getEllipsis() + value.substr(value.length - this.getMaxPreviewLength(), value.length);
				}

				this.find('.preview').text(field.data('preview'));
			},

			'toggleEdit': function toggleEdit(toggle) {
				var field = this.find(':text');

				this.find('.preview-holder')[toggle ? 'hide' : 'show']();
				this.find('.edit-holder')[toggle ? 'show' : 'hide']();

				if (toggle) {
					field.data('original', field.val());
					field.focus();
				}
			},

			'update': function update() {
				var _this = this;

				var field = this.find(':text');
				var current = field.data('original');
				var updated = field.val();

				if (current != updated) {
					this.addClass('loading');

					this.suggest(updated, function (data) {
						_this.removeClass('loading');

						field.val(data['suggestion']);
						field.data('preview', data['preview']);

						_this.toggleEdit(false);
						_this.redraw();
					});
				} else {
					this.toggleEdit(false);
					this.redraw();
				}
			},

			'cancel': function cancel() {
				var field = this.find(':text');
				field.val(field.data("original"));
				this.toggleEdit(false);
			},

			'suggest': function suggest(val, callback) {
				var _this2 = this;

				var field = this.find(':text');
				var parts = $.path.parseUrl(this.closest('form').attr('action'));

				var url = parts.hrefNoSearch + '/field/' + field.attr('name') + '/suggest/?value=' + encodeURIComponent(val);

				if (parts.search) {
					url += '&' + parts.search.replace(/^\?/, '');
				}

				$.ajax({
					'url': url,
					'dataType': 'json',
					'success': function success(data) {
						callback(data);
					},
					'error': function error(xhr, status) {
						xhr.statusText = xhr.responseText;
					},
					'complete': function complete() {
						_this2.removeClass('loading');
					}
				});
			}
		});

		$('.field.silverstripe\\\\forms\\\\segment .edit').entwine({
			'onclick': function onclick(event) {
				event.preventDefault();
				this.closest('.field').toggleEdit(true);
			}
		});

		$('.field.silverstripe\\\\forms\\\\segment .update').entwine({
			'onclick': function onclick(event) {
				event.preventDefault();
				this.closest('.field').update();
			}
		});

		$('.field.silverstripe\\\\forms\\\\segment .cancel').entwine({
			'onclick': function onclick(event) {
				event.preventDefault();
				this.closest('.field').cancel();
			}
		});

		$('.field.silverstripe\\\\forms\\\\segment :text').entwine({
			'onkeydown': function onkeydown(event) {
				var code = event.keyCode || event.which;

				if (code == 13) {
					event.stop();
					this.closest('.field').update();
				}
			}
		});
	});
})(jQuery);

},{}]},{},[1]);
