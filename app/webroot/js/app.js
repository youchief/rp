$(document).ready(function() {
        var $container = $('#container-masonery');
        // initialize Masonry after all images have loaded
        $container.imagesLoaded(function() {
                $container.masonry();
        });


        $('#imageClick1').click(function() {
                $('#mainImage').attr('src', this.src);
        });
        
        $('#imageClick2').click(function() {
                $('#mainImage').attr('src', this.src);
        });
});