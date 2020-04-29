// welcome page view component registration:
import subscriptionComponent from './components/subscription/Main';

if ($("#subscriptionComponent").length !== 0) {
    new Vue({
        el: '#subscriptionComponent',
        components:{
            'subscription-component':subscriptionComponent
        }
    });
}
