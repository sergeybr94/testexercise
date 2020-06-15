<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
?>

    <script>
        var API = {
            urlAJAX: '/api/dealer/',
            method: {
                get: 'GET',
                create: 'POST',
                update: 'PUT',
                remove: 'DELETE',
            },

            request: function (entity, method = 'GET', param = {}, callback) {
                $.ajax({
                    url: this.urlAJAX + entity + "/",
                    type: method,
                    data: param,
                    dataType: "json",
                    success: function (data) {

                        if (typeof (callback) == 'function')
                            callback(data["result"], data["status"]);

                        if (!data["status"]) {
                            console.log("error response");
                        }
                    },
                    error: function () {
                        console.log("error request");
                    }
                });
            },


            car: {
                entity: 'car',
                getList: function (params = {}, callback) {
                    API.request(this.entity, API.method.get, params, callback)
                },
            },
        };
    </script>


    <script>
        $(document).ready(function () {
            API.car.getList([], function (res, status) {
                console.log(res);


                $(res).each(function (i , car) {
                    $('#carCard').tmpl(car).appendTo('#listCar');
                })


            })
        })
    </script>


    <template id="carCard" type="text/x-jquery-tmpl">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">${BRAND_NAME}</h5>
                <p class="card-text">
                    Model: ${MODEL_NAME}<br>
                    Mileage: ${UF_MILEAGE}<br>
                    Year: ${UF_YEAR}<br>
                    New: ${UF_NEW}<br>
                    Cost: ${UF_PRICE}
                </p>
            </div>
        </div>
    </template>


    <div id="listCar">

    </div>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>