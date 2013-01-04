(function () {
    "use strict";

    var Wine = can.Model({

        findAll : 'GET //localhost/Cellar-CanJS-Bootstrapped/api/index.php/wines',
        findOne : 'GET //localhost/Cellar-CanJS-Bootstrapped/api/index.php/wines/{id}',
        create  : 'POST //localhost/Cellar-CanJS-Bootstrapped/api/index.php/wines',
        update  : 'PUT //localhost/Cellar-CanJS-Bootstrapped/api/index.php/wines/{id}',
        destroy : 'DELETE //localhost/Cellar-CanJS-Bootstrapped/api/index.php/wines/{id}'

    }, {});

    var wineDetails = new can.Observe({});

    var Wines = can.Control({

        init: function(){
            this.element.html(can.view('views/winesList.ejs', {
                wines:this.options.wines,
                wineDetails: wineDetails
            }));
            var that = this;
            var findIndex = function(indx,id) {
                if (typeof indx === "number") {
                    return indx;
                } else {
                    indx = id;
                    if( indx<10 ){
                        Wine.findOne({'id': indx}).then(function(findOneResponse){
                            if (typeof findOneResponse === "undefined"){
                                id++ ;
                                indx = undefined;
                                return findIndex(indx,id);
                            }else{
                                that.indx = findOneResponse.id
                                that.wine = findOneResponse;
                                that.updateWineDetailsObserver(findOneResponse);
                            }
                        });
                    }
                }
            }
            findIndex(undefined,1);
        },

        selectWine: function(el){
            var that = this;
            var index = $("a",el).attr("id");
            Wine.findOne({'id': index}).then(function(findOneResponse){
                    that.wine = findOneResponse;
                    that.updateWineDetailsObserver(findOneResponse);
                }
            )
        },

        updateWineDetailsObserver: function(data){
            wineDetails.attr({
                "id":data.id,
                "name":data.name,
                "grapes":data.grapes,
                "country":data.country,
                "region":data.region,
                "year":data.year,
                "picture": "../pics/" + data.picture,
                "description":data.description
            },true);
        },

        newWine: function(){
            wineDetails.attr({
                "id":"",
                "name":"",
                "grapes":"",
                "country":"",
                "region":"",
                "year":"",
                "picture": "../pics/generic.jpg",
                "description":""
            },true);
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
            this.newWine();
            this.wine.destroy();
        },

        '{document} #wines li click': function(el){
            this.selectWine(el);
        },

        '.new click': "newWine",

        '.save click': "createWine",

        '.remove click': "deleteWine",

        '.update click': "updateWine"

    });

    $(document).ready(function () {

        $.when(Wine.findAll().then(function (findAllResponse) {
            new Wines('#wines', {
                wines:findAllResponse
            });
        }));

    });

})();