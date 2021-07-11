"use strict";

// Class Definition
var SearchLimit = function() {
    var _buttonSpinnerClasses = 'spinner spinner-right spinner-white pr-15';
    
    var _handleSearch = function() {
        var formLocalizaSubmitButton = KTUtil.getById('btnSearch');

		$('#btnSearch').on('click', function (e) {
            e.preventDefault();
            
            let limit = $('#limite').val();
            let route_rss = $('#route_search').val();
            let rotaSearch = route_rss + "/#".replace('#', limit);
            
            KTUtil.btnWait(formLocalizaSubmitButton, _buttonSpinnerClasses, "Aguarde...");
            window.location.href = rotaSearch;
        });
    }    

    // Public Functions
    return {
        // public functions
        init: function() {
            _handleSearch();
        }
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    SearchLimit.init();
});
