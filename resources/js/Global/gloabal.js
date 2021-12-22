export default class global {
    constructor() {
        this.adressBarDisplayState = localStorage.getItem("adressBarDisplayState") ? localStorage.getItem("adressBarDisplayState") : 1;
        this.account_overview = localStorage.getItem("account_overview") ? localStorage.getItem("account_overview") : 1;
        this.totalPrice = localStorage.getItem("totalPrice") ? localStorage.getItem("totalPrice") : 0;
        this.buyerdetails = localStorage.getItem("buyerdetails") ? localStorage.getItem("buyerdetails") : {};

    }
    hideAdressBar() {
        document.getElementById('addressbar').style.display = "none";
        localStorage.setItem("adressBarDisplayState", 0);
    }
    getAdressBarDisplayState() {
        return this.adressBarDisplayState;
    }

    resetAdressBarDisplayState() {
        // document.getElementById('addressbar').style.display = "block";
        localStorage.setItem("adressBarDisplayState", 1);
    }

    showAccountOverview() {
        return Number(this.account_overview);
    }

    hideAccountOverview(path) {
            localStorage.setItem("account_overview", 0);
            if (this.account_overview - 1 == 0) {
                window.location.assign(path);
                window.location.reload();
            } else {
                window.location.assign(path);
            }
        }
        //hold buyer details for some time
    maintainBuyerDetails(details) {
        console.log(details);
        localStorage.setItem("buyerdetails", JSON.stringify(details));
        console.log(this.buyerdetails);
    }

    returndBuyerDetails() {
        return this.buyerdetails;
    }

}