export default class Uploader {
    
    constructor() {
        this.uploaded_image = localStorage.getItem("uploaded_image") ? localStorage.getItem("uploaded_image") : '';
    }

    //Launch the Uploader
    launchUploader(){
      $('#uploader').modal('show');
    }

    //Read media to be displayed
    readMedia(){

    }
    //set Uploaded image
    setUploadedImage(image){
        localStorage.setItem("uploaded_image", image);
    }

    //get Uploaded image
    getUploadedImage(){
        return this.uploaded_image;
    }

}