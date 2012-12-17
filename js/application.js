(function () {

    Wine = can.Model({

        findAll : 'GET //localhost/Cellar-CanJS-Bootstrapped/api/wines',
        findOne : 'GET //localhost/Cellar-CanJS-Bootstrapped/api/wines/{id}',
        create  : 'POST //localhost/Cellar-CanJS-Bootstrapped/api/wines',
        update  : 'PUT //localhost/Cellar-CanJS-Bootstrapped/api/wines/{id}',
        destroy : 'DELETE //localhost/Cellar-CanJS-Bootstrapped/api/wines/{id}'

    }, {});

    Wines = can.Control({

        init: function(){
            this.wine = new Wine();
            this.element.html(can.view('views/winesList.ejs', {
                wines:this.options.wines
            }));
            this.hide();
        },

        show: function(){
            this.element.fadeIn(500);
        },

        hide: function(){
            this.element.fadeOut(0);
        },

        renderDetails: function(wine) {
            $('#wineId').val(wine.id);
            $('#name').val(wine.name);
            $('#grapes').val(wine.grapes);
            $('#country').val(wine.country);
            $('#region').val(wine.region);
            $('#year').val(wine.year);
            $('#pic').attr('src', 'pics/' + wine.picture);
            $('#description').val(wine.description);
        },

        createWine: function() {
            var form = this.element.find('form');
            values = can.deparam(form.serialize());
            this.wine.attr(values).save();
        },

        updateWine: function(el){
            var wine = el.closest('.wine').data('wine');
            wine.attr(el.attr('name'), el.val()).save();
        },

        '.save click': function(el){
            this.createWine();
        },

        '.remove click': function(el, ev){
            el.closest('.wine').data('wine').destroy();
        },

        '.update click': function(el, ev) {
            this.updateWine(el);
        },

        '{document} .hero-unit click': function(el){
            this.show();
        },

        '{document} #wines li click': function(el){
            var that = this;
            var index = $("a",el).attr("id");
            Wine.findOne({'id': index}).then(function(oneResponse){
                    that.renderDetails(oneResponse);
                }
            )
        }

    });

    $(document).ready(function () {

        $.when(Wine.findAll().then(function (wineResponse) {
            new Wines('#wines', {
                wines:wineResponse
            });
        }));

    });

})();