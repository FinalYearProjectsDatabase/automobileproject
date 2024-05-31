$(document).ready(()=>{
    $("#clientsTable").DataTable({
        responsive: true,
        scrollX: true,
        search: true,
        paging: true,
        language: {
            paginate: {
                next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
                previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
            },
            lengthMenu: "Display _MENU_ records per page",
            zeroRecords: "Nothing found - sorry",
            info: "Showing page _PAGE_ of _PAGES_",
            infoEmpty: "No records available",
            infoFiltered: ""
        },
        lengthChange: true,
        autoWidth: true
    })
})