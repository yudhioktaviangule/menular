
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import SimpleUploadAdapter from '@ckeditor/ckeditor5-upload/src/adapters/simpleuploadadapter';



window.ckEdWUpd = (objectId,url,_token)=>{
    ClassicEditor
    .create( document.querySelector( objectId ), {
        plugins: [ SimpleUploadAdapter],
        simpleUpload: {
            uploadUrl: url,
            withCredentials: true,
            headers: {
                
                Authorization: `Bearer ${token}`
            }
        }
    } )
}