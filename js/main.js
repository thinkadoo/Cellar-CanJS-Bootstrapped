

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
        }
    });

    $(document).ready(function () {
        $.when(Wine.findAll().then(function (wineResponse) {
            var wines = wineResponse;
            new Wines('#wines', {
                wines:wines

            });
            console.log(wines);
        }));
    });

})();

$('#wines li').live('click', function() {
    Wine.findOne({'id': $("#wines li").index(this)+1}).then(function (findOneResponse){
            var wine = findOneResponse;
            renderDetails(wine);
        }
    )
});

function renderDetails(wine) {
    $('#wineId').val(wine.id);
    $('#name').val(wine.name);
    $('#grapes').val(wine.grapes);
    $('#country').val(wine.country);
    $('#region').val(wine.region);
    $('#year').val(wine.year);
    $('#pic').attr('src', 'pics/' + wine.picture);
    $('#description').val(wine.description);
}
