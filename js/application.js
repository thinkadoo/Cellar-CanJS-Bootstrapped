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
        },

        renderDetails: function() {
            $('#wineId').val(this.wine.id);
            $('#name').val(this.wine.name);
            $('#grapes').val(this.wine.grapes);
            $('#country').val(this.wine.country);
            $('#region').val(this.wine.region);
            $('#year').val(this.wine.year);
            $('#pic').attr('src', 'pics/' + this.wine.picture);
            $('#description').val(this.wine.description);
        },

        newWine: function() {
            $('#wineId').val('');
            $('#name').val('');
            $('#grapes').val('');
            $('#country').val('');
            $('#region').val('');
            $('#year').val('');
            $('#pic').attr('src', 'pics/generic.jpg');
            $('#description').val('');
        },

        createWine: function() {
            var form = this.element.find('form');
            values = can.deparam(form.serialize());
            this.wine = new Wine();
            this.wine.attr(values);
            this.wine.attr('picture','generic.jpg');
            this.wine.removeAttr('id');
            this.wine.save();
            this.options.wines.push(this.wine);
        },

        updateWine: function(){
            var form = this.element.find('form');
            values = can.deparam(form.serialize());
            this.wine.attr(values).save();
        },

        deleteWine: function(){
            this.wine.destroy();
            this.newWine();
        },

        '.new click': function(){
            this.newWine();
        },

        '.save click': function(){
            this.createWine();
        },

        '.remove click': function(){
            this.deleteWine();
        },

        '.update click': function() {
            this.updateWine();
        },

        '{document} #wines li click': function(el){
            var that = this;
            var index = $("a",el).attr("id");
            Wine.findOne({'id': index}).then(function(oneResponse){
                    that.wine = oneResponse;
                    that.renderDetails();
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