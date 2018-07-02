/**
 * Created by Syed Haider Hassan. on 21/9/2015.
 */
function commonDataTables(selector,url,aoColumns,sDom,HiddenColumnID,RowCallBack,DrawCallBack,filters,sortBy){
    // console.log(HiddenColumnID);
    //Little Code For Sorting.
    if(typeof sortBy === "undefined"){
        sortBy = {
            'ColumnID' : 0,
            'SortType' : 'asc'
        }
    }
    oTable = selector.dataTable({
        "bServerSide": true,
        "bProcessing": true,
        "bPaginate" :true,
        "sPaginationType": "full_numbers",
        "bDestroy":true,
        "sServerMethod": "POST",
        "aaSorting":[[ sortBy['ColumnID'], sortBy['SortType'] ]],
        "sDom" : sDom,
        "aoColumns":aoColumns,
        "sAjaxSource": url,
        "iDisplayLength": 10,
        'fnServerData' : function(sSource, aoData, fnCallback){
            $.ajax({
                'dataType': 'json',
                'type': 'POST',
                'url': url,
                'data': aoData,
                'success': fnCallback
            }); //end of ajax
        },
        'fnRowCallback': function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
            if(typeof HiddenColumnID !== "undefined"){
                $(nRow).attr("data-id",aData[HiddenColumnID]);
            }else{
                $(nRow).attr("data-id",aData[0]);
            }

            if(typeof RowCallBack !== "undefined" || RowCallBack === ''){
                eval(RowCallBack);
            }
            return nRow;
        },
        //This function is called on every 'draw' event, and allows you to dynamically modify any aspect you want about the created DOM.
        fnDrawCallback : function (oSettings) {
            if(typeof DrawCallBack !== "undefined" || DrawCallBack === ''){
                eval(DrawCallBack);
            }
        },
        "fnServerParams": function (aoData, fnCallBack) {
            if (typeof filters !== "undefined") {
                eval(filters);
            }
        }
    });
}

function commonMultiDataTables(selector,url,aoColumns,sDom,HiddenColumnID,tableParam,filters,sortBy,RowCallBack,DrawCallBack){
    // console.log(HiddenColumnID);
    //Little Code For Sorting.
    if(typeof sortBy === "undefined"){
        sortBy = {
            'ColumnID' : 0,
            'SortType' : 'asc'
        }
    }
    oTable[tableParam] = selector.dataTable({
        "bServerSide": true,
        "bProcessing": true,
        "bPaginate" :true,
        "sPaginationType": "full_numbers",
        "bDestroy":true,
        "sServerMethod": "POST",
        "aaSorting":[[ sortBy['ColumnID'], sortBy['SortType'] ]],
        "sDom" : sDom,
        "aoColumns":aoColumns,
        "sAjaxSource": url,
        "iDisplayLength": 10,
        'fnServerData' : function(sSource, aoData, fnCallback){
            $.ajax({
                'dataType': 'json',
                'type': 'POST',
                'url': url,
                'data': aoData,
                'success': fnCallback
            }); //end of ajax
        },
        'fnRowCallback': function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
            if(typeof HiddenColumnID !== "undefined"){
                $(nRow).attr("data-id",aData[HiddenColumnID]);
            }else{
                $(nRow).attr("data-id",aData[0]);
            }

            if(typeof RowCallBack !== "undefined" || RowCallBack === ''){
                eval(RowCallBack);
            }
            return nRow;
        },
        //This function is called on every 'draw' event, and allows you to dynamically modify any aspect you want about the created DOM.
        fnDrawCallback : function (oSettings) {
            if(typeof DrawCallBack !== "undefined" || DrawCallBack === ''){
                eval(DrawCallBack);
            }
        },
        "fnServerParams": function (aoData, fnCallBack) {
            if (typeof filters !== "undefined") {
                eval(filters);
            }
        }
    });
}

function commonSelect2(selector,url,minInputLength,placeholder){
    selector.select2({
        minimumInputLength:minInputLength,
        placeholder:placeholder,
        ajax: {
            url: url,
            dataType: "json",
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // search term
                    page: params.page
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function(obj) {
                        return { id: obj.ID, text: obj.TEXT };
                    })
                };
            },
            cache: true
        },
        debug:false
    });
}

function commonSelect2Dependent(selector,url,minInputLength,placeholder,dependent){
    selector.select2({
        minimumInputLength:minInputLength,
        placeholder:placeholder,
        ajax: {
            url: url,
            dataType: "json",
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // search term
                    page: params.page,
                    dependent: dependent //Adding Dependent Value
                };
            },
            processResults: function (data) {
                return {
                    results: $.map(data, function(obj) {
                        return { id: obj.ID, text: obj.TEXT };
                    })
                };
            },
            initSelection: function (element, callback) {
                element = $(element);
                console.log(element);

                var data = {id: element.val(), text: element.data('name')};
                callback(data);
            },
            cache: true
        },
        debug:false
    });
}

function commonSelect2PatientTemplate(selector,url,minInputLength,placeholder){
    selector.select2({
        minimumInputLength:minInputLength,
        placeholder:placeholder,
        allowClear: true,
        ajax: {
            url: url,
            dataType: "json",
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // search term
                    page: params.page
                };
            },
            processResults: function (data, params) {
                // parse the results into the format expected by Select2
                // since we are using custom formatting functions we do not need to
                // alter the remote JSON data, except to indicate that infinite
                // scrolling can be used
                params.page = params.page || 1;
                var select2Data = $.map(data.Patients, function (obj) {
                    obj.id = obj.ID,
                        obj.text = obj.Patient;
                    return obj;
                });

                return {
                    results: select2Data,
                    pagination: {
                        more: data.Patients.more
                    }
                };
            },
            results: function(data, params) {
                return {results: data.Patients, more: (data.Patients && data.Patients.length == 10 ? true: false)}
            },
            cache: true
        },
        debug:false,
        escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
        templateResult: formatRepo, // omitted for brevity, see the source of this page
        templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
    });

    function formatRepo (repo) {
        if (repo.loading) return repo.TEXT;
        if (repo === 0 || repo == false) return "No Record Found";

        var markup = "<div class='select2-patient-result-repository clearfix'>" +
            /* "<div class='select2-result-repository__avatar'><img src='" + repo.owner.avatar_url + "' /></div>" +*/
            "<div class='select2-patient-result-repository__meta row'>" +
            "<div class='select2-patient-template-result-RefNo col-lg-3 col-md-3'><span class='fa fa-bolt'></span> &nbsp;" + repo.RefNo + "</div>" +
            "<div class='select2-patient-template-result-Name col-lg-3'><span class='fa fa-user'></span> &nbsp;" + repo.Patient + "</div>";

        if(repo.CNIC !== null && repo.CNIC.length > 0){
            markup += "<div class='select2-patient-template-result-CNIC col-lg-3 col-md-12'><span class='fa  fa-credit-card'></span> &nbsp;" + repo.CNIC + "</div>";
        }

        if(repo.Contact !== null && repo.Contact.length > 0){
            markup += "<div class='select2-patient-template-result-Contact col-lg-3 col-md-12'><span class='fa  fa-phone'></span> &nbsp;" + repo.Contact + "</div>";
        }
        markup+="</div></div>";
        return markup;
    }

    function formatRepoSelection (repo) {
        return repo.Patient || repo.text;
    }
}

function commonSelect2DonorTemplate(selector,url,minInputLength,placeholder){
    selector.select2({
        minimumInputLength:minInputLength,
        placeholder:placeholder,
        allowClear: true,
        ajax: {
            url: url,
            dataType: "json",
            delay: 250,
            data: function (params) {
                return {
                    q: params.term, // search term
                    page: params.page
                };
            },
            processResults: function (data, params) {
                // parse the results into the format expected by Select2
                // since we are using custom formatting functions we do not need to
                // alter the remote JSON data, except to indicate that infinite
                // scrolling can be used
                params.page = params.page || 1;
                var select2Data = $.map(data.Donors, function (obj) {
                    obj.id = obj.ID,
                        obj.text = obj.Donor;
                    return obj;
                });

                return {
                    results: select2Data,
                    pagination: {
                        more: data.Donors.more
                    }
                };
            },
            results: function(data, params) {
                return {results: data.Donors, more: (data.Donors && data.Donors.length == 10 ? true: false)}
            },
            cache: true
        },
        debug:false,
        escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
        templateResult: formatRepo, // omitted for brevity, see the source of this page
        templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
    });

    function formatRepo (repo) {
        if (repo.loading) return repo.TEXT;
        if (repo === 0 || repo == false) return "No Record Found";

        var markup = "<div class='select2-patient-result-repository clearfix'>" +
            /* "<div class='select2-result-repository__avatar'><img src='" + repo.owner.avatar_url + "' /></div>" +*/
            "<div class='select2-patient-result-repository__meta row'>" +
            "<div class='select2-patient-template-result-DonorID col-lg-3 col-md-3'><span class='fa fa-bolt'></span> &nbsp;" + repo.ID + "</div>" +
            "<div class='select2-patient-template-result-CNIC col-lg-3 col-md-12'><span class='fa  fa-user'></span> &nbsp;" + repo.Donor + "</div>" +
            "<div class='select2-patient-template-result-Name col-lg-3'><span class='fa fa-tint'></span> &nbsp;" + repo.BloodGroup + "</div>";

        /* if(repo.CNIC !== null && repo.CNIC.length > 0){
         markup += "<div class='select2-patient-template-result-CNIC col-lg-3 col-md-12'><span class='fa  fa-credit-card'></span> &nbsp;" + repo.CNIC + "</div>";
         }
         */
        if(repo.Contact !== null && repo.Contact.length > 0){
            markup += "<div class='select2-patient-template-result-Contact col-lg-3 col-md-12'><span class='fa  fa-phone'></span> &nbsp;" + repo.Contact + "</div>";
        }
        markup+="</div></div>";
        return markup;
    }

    function formatRepoSelection (repo) {
        return repo.Donor || repo.text;
    }
}

//Function for Printing the Page.
function loadOtherPage($printURL) {
    $("<iframe>")                             // create a new iframe element
        .hide()                               // make it invisible
        .attr("src", $printURL)             // point the iframe to the page you want to print
        .appendTo("body");                   // add iframe to the DOM to cause it to load the page
    return true;
}


//Function for validating Email Address
function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function removeWidth(oTable){
    $(".table").css("width","100%");
}