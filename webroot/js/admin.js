(function ($) {
    function initAdminSelects(scope) {
        var $root = scope ? $(scope) : $(document);
        $root.find('select').each(function () {
            var $el = $(this);
            if (this.closest('template') || $el.hasClass('select2-hidden-accessible')) {
                return;
            }
            $el.select2({
                width: '100%',
                language: 'es',
                placeholder: $el.find('option[value=""]').text() || 'Selecciona',
                allowClear: $el.find('option[value=""]').length > 0
            });
        });
    }

    window.initAdminSelects = initAdminSelects;

    $(function () {
        initAdminSelects();

        document.querySelectorAll('[data-bs-toggle="tab"]').forEach(function (tab) {
            tab.addEventListener('shown.bs.tab', function () {
                initAdminSelects();
            });
        });
    });
})(jQuery);
