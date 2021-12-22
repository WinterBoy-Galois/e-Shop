export default class global {
    constructor() {
        this.currentProductId = localStorage.getItem("currentProductId") ? localStorage.getItem("currentProductId") : null;
    }
   
    /**
     * set the current Product
     *  To Be Edited 
    */
    setCurrentProductid(id){
        localStorage.setItem("currentProductId", id);
    }
}