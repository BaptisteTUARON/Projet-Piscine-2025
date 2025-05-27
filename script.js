$(document).ready(function(){
    var $carrousel = $('.carrousel-container'),
        $img = $carrousel.find('img'),
        indexImg = $img.length - 1,
        i = 0,
        $currentImg = $img.eq(i);

    $img.hide();
    $currentImg.show();

    function maBoucle(){
        setTimeout(function(){
            i++;
            if (i > indexImg) i = 0;
            $img.hide();
            $currentImg = $img.eq(i);
            $currentImg.show();
            maBoucle();
        }, 4000);
    }

    maBoucle();

    $('.next').click(function(){
        i++;
        if (i > indexImg) i = 0;
        $img.hide();
        $currentImg = $img.eq(i);
        $currentImg.show();
    });

    $('.prev').click(function(){
        i--;
        if (i < 0) i = indexImg;
        $img.hide();
        $currentImg = $img.eq(i);
        $currentImg.show();
    });
});
