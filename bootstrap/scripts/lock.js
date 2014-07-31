var Lock = function () {

    return {
        //main function to initiate the module
        init: function () {

             $.backstretch([
		        "/bootstrap/img/bg/1.jpg",
		        "/bootstrap/img/bg/2.jpg",
		        "/bootstrap/img/bg/3.jpg",
		        "/bootstrap/img/bg/4.jpg"
		        ], {
		          fade: 1000,
		          duration: 8000
		      });
        }

    };

}();