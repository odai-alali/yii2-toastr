/* 
    Created on : Dec 7, 2014, 8:19:32 AM
    Author     : Odai Alali <odai.alali@gmail.com>
*/
var ToastrAjaxFeed = function () {
    return {
        getNotifications : function(url, options){
            $.ajax({
                url: url,
                dataType: 'json',
                success:function(data){
                    $.each(data, function(idx, notification){
                        switch(notification.type){
                            case 'error':
                                toastr.error(notification.message, notification.title, options);
                                break;
                            case 'warning':
                                toastr.warning(notification.message, notification.title, options);
                                break;
                            case 'info':
                                toastr.info(notification.message, notification.title, options);
                                break;
                            case 'success':
                                toastr.success(notification.message, notification.title, options);
                                break;
                        }
                    });
                }
            });
        }
    };
}();


