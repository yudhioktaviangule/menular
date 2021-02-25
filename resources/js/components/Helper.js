
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
window.cked;
class MyUploadAdapter {
    constructor( loader ) {
        this.loader = loader;
    }

    upload() {
        return this.loader.file
            .then( file => new Promise( ( resolve, reject ) => {
                this._initRequest();
                this._initListeners( resolve, reject, file );
                this._sendRequest( file );
            } ) );
    }
    abort() {
        if ( this.xhr ) {
            this.xhr.abort();
        }
    }
    _initRequest() {
        let url = $('#upd').val();
        console.log(url);
        const xhr = this.xhr = new XMLHttpRequest();
        xhr.open( 'POST',url, true );
        xhr.setRequestHeader('Authorization', `Bearer ${window.tk}`)
        xhr.responseType = 'json';
    }
    _initListeners( resolve, reject, file ) {
        const xhr = this.xhr;
        const loader = this.loader;
        const genericErrorText = `Couldn't upload file: ${ file.name }.`;
        xhr.addEventListener( 'error', () => reject( genericErrorText ) );
        xhr.addEventListener( 'abort', () => reject() );
        xhr.addEventListener( 'load', () => {
            const response = xhr.response;
            let editorText = window.cked;
            let data       = editorText.getData();
            data = data.replace(/(<img>)/g,`<img src="${response.name}">`);
            window.cked.setData(data);
            data = window.cked.getData();
            
            if ( !response || response.error ) {
                return reject( response && response.error ? response.error.message : genericErrorText );
            }
            resolve( {
                default: response.url
            } );
        } );
        if ( xhr.upload ) {
            xhr.upload.addEventListener( 'progress', evt => {
                if ( evt.lengthComputable ) {
                    loader.uploadTotal = evt.total;
                    loader.uploaded = evt.loaded;
                }
            } );
        }
    }
    _sendRequest( file ) {
        const data = new FormData();
        data.append( 'upload', file );
        this.xhr.send( data );
    }
}


function MyCustomUploadAdapterPlugin( editor ) {
    editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
        return new MyUploadAdapter( loader );
    };
}

window.ckEdWUpd = (objectId)=>{
    ClassicEditor
    .create( document.querySelector( objectId ), {
        extraPlugins: [ MyCustomUploadAdapterPlugin ],
        
    } ).then(ed=>{
        window.cked = ed;
    })
}