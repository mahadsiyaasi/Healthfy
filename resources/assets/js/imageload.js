function fileValidationView(file,setimage){
    var fileInput = document.getElementById(file);
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Please upload file having extensions .jpeg/.jpg/.png/.gif only.');
        fileInput.value = '';
        return false;
    }else{
        //Image preview
        if (fileInput.files && fileInput.files[0]) {
            var image;
            var reader = new FileReader();
            reader.onload = function(e) {
                $(setimage).attr("src",e.target.result);
                image = e.target.result;
            };
            reader.readAsDataURL(fileInput.files[0]);
            return image;
        }
    }
}
function fileValidationpdf(file,setimage){
    var fileInput = document.getElementById(file);
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.pdf|\.docx|\.doc)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Please upload file having extensions .jpeg/.jpg/.png/.pdf or doc.');
        fileInput.value = '';
        return false;
    }else{
        
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                if (filePath.split('.').pop()=="docx" || filePath.split('.').pop()=="doc") {
                    $("#"+setimage).removeClass("w3-circle")
                    $("#refdetail").html("detail file you uploaded  <hr><br>File name: "+fileInput.files[0].name+"<br>File Size: "+fileInput.files[0].size+" btytes")
                document.getElementById(setimage).src ="avatars/doc.png";
                }else  if (filePath.split('.').pop()=="jpeg" || filePath.split('.').pop()=="png" || filePath.split('.').pop()=="jpg" || filePath.split('.').pop()=="JPG") {
                    $("#"+setimage).addClass("w3-circle")
                document.getElementById(setimage).src = e.target.result;
                $("#refdetail").html("detail file you uploaded  <hr><br>File name: "+fileInput.files[0].name+"<br>File Size: "+fileInput.files[0].size+" btytes")
                }else{
                  $("#"+setimage).removeClass("w3-circle")
                     document.getElementById(setimage).src = "avatars/pdf.png";
                      $("#refdetail").html("detail file you uploaded   <hr><br>File name: "+fileInput.files[0].name+" <br>File Size: "+fileInput.files[0].size+" btytes")
                }
               
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}