import account from "../components/customer/account.vue";
import orders from '../components/purchase/orders.vue';
import reviews from "../components/customer/reviews.vue";
import credit from "../components/customer/credit.vue";
import saved_items from '../components/purchase/cart.vue';

export default [{
        path: '/account',
        component: account,
    },
    {
        path: '/orders',
        component: orders,
    },
    {
        path: '/reviews',
        component: reviews,
    },
    {
        path: '/credit',
        component: credit,
    },
    {
        path: '/saved-items',
        component: saved_items,
    },

];
