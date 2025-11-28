$(document).ready(function () {
    $('.dataTable').DataTable(
        {
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json',
                paginate: {
                    first: '<<', 
                    last: '>>',  
                    next: '>',   
                    previous: '<'
                }
            },
            
            pageLength: 5, 
            lengthMenu: [5, 10, 15, 25, 50, 100], 
            responsive: true, 
        }
    );
});