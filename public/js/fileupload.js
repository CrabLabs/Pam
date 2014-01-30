(function ($) {
    $.fn.fileUpload = function (options) {
        var opts = $.extend({}, $.fn.fileUpload.defaults, options);

        this.on('change', function (event) {
            event.preventDefault();
            createAjaxRequest(createFormData(this));
        });

        function createFormData (self) {
            var fd   = new FormData(),
                file = self.files[0];

            fd.append('file', file);
            fd.append('location', opts.location);
            
            return fd;
        };

        function createAjaxRequest (data) {
            $.ajax({
                xhr: function () {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener('progress', function (event) {
                        if (event.lengthComputable) {
                            opts.onProgress(event.loaded / event.total);
                        }
                    }, false);
                    return xhr;
                },
                url: opts.url,
                type: opts.method,
                data: data,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.success)
                        opts.onSuccess(response);
                    else
                        opts.onError(response);
                }
            });
        };
    };

    $.fn.fileUpload.defaults = {
        url: document.location.protocol + '//' + document.location.host + '/upload',
        location: 'img/uploads',
        method: 'POST',
        onProgress: function (percent) {
            console.log('Complete: ' + percent + '%');
        },
        onSuccess: function (response) {
            console.log('File uploaded!');
        },
        onError: function (response) {
            console.log('Uploading error: ' + response.error);
        }
    };

}(jQuery));