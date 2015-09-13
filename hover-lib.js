// worlds smallest gif image: 26 bytes
var placeholder = "data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D";

// append a image tag with placeholder src to every link using hover-lib class
$("a.hover-lib").append('<img src="'+placeholder+'" />');

// on mouse over switch the image src from placeholder 
// to the image specified in the links id field. 
$("a.hover-lib").on({
    'mouseover' : function(){
        $(this).children('img').attr('src', this.id);
        $(this).children('img').attr('class', 'hover-lib-visible');
    }
});  

// on mouse out switch the image src back to placeholder
$("a.hover-lib").on({
    'mouseout' : function(){
        $(this).children('img').attr('src', placeholder);
        $(this).children('img').attr('class', 'hover-lib-hidden');
    }
});  
