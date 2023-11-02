window.axios.get('/api/hostedpbx')
    .then(function (response) {
        const jsonObject = response.data;

        makeTable(jsonObject);
    })
    .catch(function (error) {
        console.log(error);
    });

function makeTable(jsonObject) {
    new DataTable('#myTable', {
        data: jsonObject.data,
        columns: [
            {data: 'id'},
            {data: 'instance_name'},
            {data: 'instance_host'},
            {data: 'ymp_name'},
            {data: 'pbx_status'},
            {data: 'sync_status'},
            {data: 'extensions_licenced'},
            {data: 'extensions_provisioned'},
            {data: 'extensions_in_use'},
            {data: 'sync_extensions_matched'},
            {
                data: 'last_modified',
                render: function (data) {
                    return formatDate(data);
                }
            },
            {
                data: null,
                render: function (data, type, row) {
                    return addActionButtons(data, type, row);
                }
            },
        ]
    });
}

function formatDate(data) {
    const date = new Date(data);

    const options = {
        day: 'numeric',
        month: 'numeric',
        year: 'numeric',
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit',
    };

    return date.toLocaleDateString('en-UK', options);
}

function addActionButtons(data, type, row) {
    if (type === 'display') {

        const viewButton =  '<button type="button" class="btn btn-outline-info m-1" data-name="Viewing" data-bs-toggle="modal" data-bs-target="#modal" data-id="' + row.id + '">View</button>';
        const editButton =  '<button type="button" class="btn btn-outline-primary m-1"  data-name="Editing" data-bs-toggle="modal" data-bs-target="#modal" data-id="' + row.id + '">Edit</button>';

        return viewButton + editButton;
    } else {
        return data;
    }
}

$('#modal').on('show.bs.modal', function (event) {
    const button = $(event.relatedTarget);
    const id = button.data('id');
    const action = button.data('name');

    renderModal(id, action);
});

function renderModal(id, action) {
    window.axios.get('/api/hostedpbx/' + id)
        .then(function (response) {
            const jsonObject = response.data.data;

            if (action === 'Editing') {
                $('#modalLabel').text(action + ': ' + jsonObject.instance_name);
                $('#saveButton').show();
                $( '#viewable').hide();
                $('.editable').removeClass('col-md-4').addClass('col-md-6');
                $('p').empty();

                $.each(jsonObject, function(key, value) {
                    $("#" + key).val(value).prop('readonly', false);;
                });
            } else {
                $('#modalLabel').text(action + ': ' + jsonObject.instance_name);
                $( '#viewable').show();
                $('#saveButton').hide();
                $('.editable').removeClass('col-md-6').addClass('col-md-4');
                $('p').empty();

                $.each(jsonObject, function(key, value) {
                    $("#" + key).val(value).prop('readonly', true);
                });
            }
        })
        .catch(function (error) {
            console.log(error);
        });
}

function patchHostPbx() {
    const id = $('#id').val();

    const data = {
        'caco_customer_id': $('#caco_customer_id').val(),
        'caco_customer_name': $('#caco_customer_name').val(),
        'caco_group_id': $('#caco_group_id').val(),
        'caco_group_name': $('#caco_group_name').val(),
        'pbx_status': $('#pbx_status').val(),
        'sync_status': $('#sync_status').val(),
        'extensions_in_use': $('#extensions_in_use').val(),
        'sync_extensions_matched': $('#sync_extensions_matched').val(),
        'extensions_licenced': $('#extensions_licenced').val(),
        'extensions_provisioned': $('#extensions_provisioned').val(),
    }

    window.axios.patch('/api/hostedpbx/' + id, data)
        .then(function (response) {
            location.reload();
        })
        .catch(function (error) {
            const jsonObject = error.response.data.errors;

            $.each(jsonObject, function(key, value) {
                $("#" + key + '_error').text(value);
            });
        });
}
