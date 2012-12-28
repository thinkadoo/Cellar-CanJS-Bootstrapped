(function () {
    "use strict";

    var Wine = can.Model({

        findAll : 'GET //localhost/Cellar-CanJS-Bootstrapped/api/index.php/wines',
        findOne : 'GET //localhost/Cellar-CanJS-Bootstrapped/api/index.php/wines/{id}',
        create  : 'POST //localhost/Cellar-CanJS-Bootstrapped/api/index.php/wines',
        update  : 'PUT //localhost/Cellar-CanJS-Bootstrapped/api/index.php/wines/{id}',
        destroy : 'DELETE //localhost/Cellar-CanJS-Bootstrapped/api/index.php/wines/{id}'

    }, {});

    var Wines = can.Control({

        init: function(){
            this.wine = new Wine();
            this.imageList = [];
            this.element.html(can.view('views/winesList.ejs', {
                wines:this.options.wines
            }));
            this.listImagePaths();
            var that = this;
            var findIndex = function(indx,id) {
                if (typeof indx === "number") {
                    return indx;
                } else {
                    indx = id;
                    if( indx<10 ){
                        Wine.findOne({'id': indx}).then(function(oneResponse){
                            if (typeof oneResponse === "undefined"){
                                id++ ;
                                indx = undefined;
                                return findIndex(indx,id);
                            }else{
                                that.indx = oneResponse.id
                                that.wine = oneResponse;
                                that.renderDetails(oneResponse.id-1);
                            }
                        });
                    }
                }
            }
            findIndex(undefined,1);
        },

        listImagePaths: function(){
            for(var x=0;x<this.options.wines.length;x++) {
                this.imageList[x] = new Image();
                this.imageList[x].src = ('pics/' + this.options.wines[x].picture);
            }
        },

        selectWine: function(el){
            var that = this;
            var index = $("a",el).attr("id");
            Wine.findOne({'id': index}).then(function(oneResponse){
                    that.wine = oneResponse;
                    that.renderDetails(index-1);
                }
            )
        },

        renderDetails: function(index) {
            var image = this.imageList[index];
            $('#wineId').val(this.wine.id);
            $('#name').val(this.wine.name);
            $('#grapes').val(this.wine.grapes);
            $('#country').val(this.wine.country);
            $('#region').val(this.wine.region);
            $('#year').val(this.wine.year);
            $('#pic').html(image);
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
            var values = can.deparam(form.serialize());
            this.wine = new Wine();
            this.wine.attr(values);
            this.wine.attr('picture','generic.jpg');
            this.wine.removeAttr('id');
            this.wine.save();
            this.options.wines.push(this.wine);
        },

        updateWine: function(){
            var form = this.element.find('form');
            var values = can.deparam(form.serialize());
            this.wine.attr(values).save();
        },

        deleteWine: function(){
            this.wine.destroy();
            this.newWine();
        },

        '{document} #wines li click': function(el){
            this.selectWine(el);
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