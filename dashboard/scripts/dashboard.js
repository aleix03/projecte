$(document).ready(function(){
    var contador = 0;
    var calcularleft = 0;
    $( ".perfil-imagen-container img" )
    .mouseenter(function() {
        if(contador==0){
            $("#logo-container").append("<input/>");
            calcularleft = (window.screen.availWidth*20/100-150)/2 + "px";
            $(this).css("opacity",".5");
            $("#logo-container input").attr("type","file").css({"display":"block","height":"20px","width":"150px","position":"absolute","top":"125px","left":calcularleft,"class":"pujar-fitxer"});
            $("#logo-container input").css("color","transparent");
            $("#logo-container input").click(function(){
                if (window.File && window.FileReader && window.FileList && window.Blob) {
                    //function handleFileSelect(evt) {
                        //var files = evt.target.files; // FileList object
                        // files is a FileList of File objects. List some properties.
                        //var output = [];
                        //for (var i = 0, f; f = files[i]; i++) {
                            //output.push('<li><strong>', escape(f.name), '</strong> (', f.type || 'n/a', ') - ',
                            //f.size, ' bytes, last modified: ',
                            //f.lastModifiedDate.toLocaleDateString(), '</li>');
                        //}
                        //document.getElementById('list').innerHTML = '<ul>' + output.join('') + '</ul>';
                    //}
                    //document.getElementById('files').addEventListener('change', handleFileSelect, false);
                    alert("Success");
                } else {
                    alert('El teu navegador no suporta la inclusio de fitxers locals');
                }
            });
            $("#logo-container").mouseleave(function(){
                $("#logo-container input").remove()
                $(".perfil-imagen-container img").css("opacity","1");
            });
        }
    });
});