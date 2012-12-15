(function () {

    Wine = can.Model({
        findAll:'GET /cellar/api/wines',
        findOne:'GET /cellar/api/wines/{id}'
    }, {});

    Wines = can.Control({
        init:function(){
            this.element.html(can.view('views/winesList.ejs', {
                wines:this.options.wines
            }));
        },
        hide: function(){
            this.element.slideUp(200);
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
        '{document} #wines li click': function(el){
            var that = this;
            var index = $("a",el).attr("id");
            Wine.findOne({'id': index}).then(function(oneResponse){
                    wine = oneResponse;
                    that.renderDetails(wine);
                }
            )

        }
    });

    $(document).ready(function () {
        $.when(Wine.findAll().then(function (wineResponse) {
            var wines = wineResponse;
            new Wines('#wines', {
                wines:wines

            });
        }));
    });

})();