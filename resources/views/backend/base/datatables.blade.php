
fnDrawCallback: function(oSettings) {
    if(oSettings.aoData.length < oSettings._iDisplayLength && oSettings.aiDisplayMaster.length < 10 && oSettings._iRecordsTotal < 10){
        $(oSettings.nTableWrapper).find('.dataTables_length').hide();
        $(oSettings.nTableWrapper).find('.paging_simple_numbers').hide();
    }
},
destroy: true,
processing: true,
serverSide: true,
language: {
    "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json"
}