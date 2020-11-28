
$(function () {

    var table = $('#school-table').DataTable({
        processing: true,

        serverSide: true,

     responsive : true,

        ajax: "/affiliatedschools",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'school_code', name: 'school_code'},
            {data: 'phone', name: 'phone'},
            {data: 'address', name: 'address'},

        ]
    });

  });

  $(function () {

    $('#download-table').DataTable({
        processing: true,

        serverSide: true,

     responsive : true,

        ajax: "/downloads",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'image', name: 'image'},


        ]
    });

    });

