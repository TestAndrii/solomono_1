<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

<script>
    (() => {
        const SORT_BY_SELECT = $('#sort-by-select');
        const CATEGORY_SELECT = $('#category-select');

        SORT_BY_SELECT.on('change', (e) => {
            let selectedOption = SORT_BY_SELECT.val();

            let data = {
                selectedOption
            };

            ajaxTemplate('sortBy', data, SORT_BY_SELECT);
        });

        CATEGORY_SELECT.on('change', (e) => {
            let selectedOption = CATEGORY_SELECT.val();

            let data = {
                selectedOption
            };

            ajaxTemplate('changeCategory', data, CATEGORY_SELECT)
        });

        let ajaxTemplate = (action, data, toggler) => {

            const queryString = window.location.search;

            const params = new URLSearchParams(queryString);

            // old params from URL
            const getParams = {};

            for (const [key, value] of params.entries()) {
                getParams[key] = value;
            }

            $.each(getParams, (key, val) => {
                if (key != action) {
                    data[key] = val
                }
            })

            $.ajax({
                type: 'POST',
                url: '/?action=' + action,
                data: {
                    data
                },

                beforeSend: function(data) {
                    toggler.attr('disabled', '');
                },

                error: function(error) {
                    console.log(error);
                },

                success: function(res) {
                    let result = JSON.parse(res);

                    $('#products-block').html('');

                    $.each(result, (index, product) => {
                        $('#products-block').append(product);
                    });

                    changeUrl(action, data.selectedOption)
                },

                complete: function(data) {
                    toggler.removeAttr('disabled');
                }
            });
        }

        let changeUrl = (action, selectedOption) => {
            const queryString = window.location.search;

            const params = new URLSearchParams(queryString);

            // old params from URL
            const getParams = {};

            for (const [key, value] of params.entries()) {
                getParams[key] = value;
            }

            let url = '?' + action + '=' + selectedOption

            if (Object.keys(getParams).length > 0) {
                let iteration = 0;

                if (action in getParams && getParams[action] != selectedOption) {
                    delete getParams[action]
                }

                $.each(getParams, (key, param) => {
                    if (iteration = 0) {
                        url = '?' + key + '=' + param
                        iteration = 1
                    } else {
                        url += '&' + key + '=' + param
                        return;
                    }
                });
            }

            window.history.pushState({}, '', window.location.origin + window.location.pathname);
            window.history.pushState({}, '', url);
        }
    })()
</script>