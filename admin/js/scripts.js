$(document).ready(function(){
    //editor CKeditor
    ClassicEditor
    .create( document.querySelector( '#body' ) )
    .catch( error => {
        console.error( error );
    } );


    // $('#selectAllBoxes').click(function(event){
    //     if(this.checked){
    //         $('.checkBoxes').each(function(){
    //             this.checked=true;
    //         });
    //     } 
    //     else{
    //             $('.checkBoxes').each(function(){
    //                 this.checked=false;
    //             });

    //         }
    // });

 

});

function loadUserOnline(){
    $.get("function.php?onlineusers=result", function(data){
        $(".usersonline").text(data);



    });
}
setInterval(function(){
    loadUserOnline();


},500);










