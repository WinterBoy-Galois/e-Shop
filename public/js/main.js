/**
 * toggles
 * sidebar
 */
function displaySidebar() {
    $('#sidebar').modal('show');
}



/**
 * Display Privacy
 * policy
 */
function Displayprivacy() {
    $('#privacy').modal('show');
}

/**
 * Display Privacy
 * policy
 */
function DisplayTerms() {
    $('#Terms').modal('show');
}


/**
 * Create Product
 * Categories
 */

function createCategory() {
    $('#createcategory').modal('show');
}

function editCategory(category) {
    $('#editcategory').modal('show');
    try {
        document.getElementById('category').value = category.category;
        //document.getElementById('categoryimage').value = category.image;

    } catch (error) {
        console.log(error);
    }
}


//Query if Buyer wants to view cart or continue shopping

function shopOrCheckout(id) {
    try {
        xhttp = new XMLHttpRequest();
        xhttp.open("GET", "/add-to-cart/" + id, true);
        xhttp.send();
        $('#shop-check').modal('show');
    } catch (error) {
        console.log(error);
    }
}