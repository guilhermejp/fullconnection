function ajax(url, form, callback){
    $.ajax({
        url: url,
        data: form.serialize(),
        enctype: 'multipart/form-data',
        method: "POST",
        type: "POST",
        dataType: "json",
        success: function(result){
            eval(callback+"(result)");
            return result;
        },
        error: function(result){
            eval(callback+"_erro(result)");
            return result;
        }
    });
}