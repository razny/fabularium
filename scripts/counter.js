(function ($) {
	$.fn.countTo = function (options) {
		options = options || {};

		return $(this).each(function () {
			// ustawienie opcji dla bieżącego elementu
			var settings = $.extend({}, $.fn.countTo.defaults, {
				from: $(this).data('from'),
				to: $(this).data('to'),
				speed: $(this).data('speed'),
				refreshInterval: $(this).data('refresh-interval'),
				decimals: $(this).data('decimals')
			}, options);

			// obliczenie, ile razy zaktualizować wartość i o ile ją zwiększyć przy każdej aktualizacji
			var loops = Math.ceil(settings.speed / settings.refreshInterval),
				increment = (settings.to - settings.from) / loops;

			// referencje i zmienne, które będą się zmieniać przy każdej aktualizacji
			var self = this,
				$self = $(this),
				loopCount = 0,
				value = settings.from,
				data = $self.data('countTo') || {};

			$self.data('countTo', data);

			// jeśli istnieje interwał, wyczyść go
			if (data.interval) {
				clearInterval(data.interval);
			}
			data.interval = setInterval(updateTimer, settings.refreshInterval);

			// inicjalizacja elementu wartością początkową
			render(value);

			function updateTimer() {
				value += increment;
				loopCount++;

				render(value);

				if (typeof (settings.onUpdate) == 'function') {
					settings.onUpdate.call(self, value);
				}

				if (loopCount >= loops) {
					// usuń interwał
					$self.removeData('countTo');
					clearInterval(data.interval);
					value = settings.to;

					if (typeof (settings.onComplete) == 'function') {
						settings.onComplete.call(self, value);
					}
				}
			}

			function render(value) {
				var formattedValue = settings.formatter.call(self, value, settings);
				$self.html(formattedValue);
			}
		});
	};

	$.fn.countTo.defaults = {
		from: 0,               // początkowa wartość elementu
		to: 0,                 // końcowa wartość elementu
		speed: 1000,           // czas trwania animacji między wartościami docelowymi
		refreshInterval: 100,  // częstotliwość aktualizacji elementu
		decimals: 0,           // liczba miejsc po przecinku do wyświetlenia
		formatter: formatter,  // funkcja formatująca wartość przed wyświetleniem
		onUpdate: null,        // metoda zwrotna wywoływana za każdym razem, gdy element jest aktualizowany
		onComplete: null       // metoda zwrotna wywoływana po zakończeniu aktualizacji elementu
	};

	function formatter(value, settings) {
		return value.toFixed(settings.decimals);
	}
}(jQuery));

jQuery(function ($) {
	// niestandardowe formatowanie
	$('.count-number').data('countToOptions', {
		formatter: function (value, options) {
			return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
		}
	});

	// rozpoczęcie wszystkich liczników
	$('.timer').each(count);

	function count(options) {
		var $this = $(this);
		options = $.extend({}, options || {}, $this.data('countToOptions') || {});
		$this.countTo(options);
	}
});
