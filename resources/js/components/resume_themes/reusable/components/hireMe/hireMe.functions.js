import moment from 'moment';

export default {
    props: {
        hireMeModal: {
            type: Boolean,
            default: true,
        },
        closeHireMeModal: {
            type: Function
        },
        user: {
            type: undefined
        }
    },

    data() {
        return {
            select: {number: 'ongoing'},
            totalNumber: [
                {number: 'ongoing'},
                {number: '2'},
                {number: '3'},
                {number: '4'},
                {number: '5'},
                {number: '6'},
                {number: '7'},
                {number: '8'},
                {number: '9'},
                {number: '10'},
                {number: '11'},
                {number: '12'},
            ],
            loading: false,
            currentActiveMethod: 'stripe',
            isModalOpened: false,
            selectHours: 1,
            totalHours: null,
            payToday: true,
            weekdayCounter: 0,
            dateSelected: null,
            currentWeekDays: [],
            currentPaymentMethod: 'stripe',
            // payment calculations:
            percentage: 100,
            hours: [1, 2, 4, 6, 8,9,10],
            currentPaymentType: 'hourly',
            paymentTypes: [
                "hour", "month", "week"
            ],
            activePaymentTypeIndex: 0,
            unitHours: 20,
            isDatePickerOpened: false,
            client: {
                email: '',
                name: ''
            },
            rules: {
                required: value => !!value || 'Required.',

                email: value => {
                    const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                    return pattern.test(value) || 'Invalid e-mail.'
                },
            },
            paymentData: {},
            errors: {},
            messageBody: 'Hi, can you please setup your payment details to start working with you.',
            initial: true,
            copyText: 'Copy',
        };
    },
    watch: {
        selectHours: function (value) {
            this.totalHours = this.hours[(value - 20) / 20] * this.unitHours;
        },
        activePaymentTypeIndex: function (value) {
            if (value == 0) {
                this.unitHours = 1;
            }
            if (value == 1) {
                this.unitHours = 20;
                // calculate total number
                this.totalNumber = [{number: 'ongoing'}];
                for (let index = 1; index < 7; index++) {
                    const element = {number: `${index}`};
                    this.totalNumber.push(element)
                }
            }
            if (value == 2) {
                this.unitHours = 7;
                // calculate total number
                this.totalNumber = [{number: 'ongoing'}];
                for (let index = 1; index < 13; index++) {
                    const element = {number: `${index}`};
                    this.totalNumber.push(element)
                }
            }
            this.totalHours = this.hours[(this.selectHours - 20) / 20] * this.unitHours;
        },
        weekdayCounter: function (value) {
            let startOfWeek = moment().add(value, 'd').startOf('isoWeek');
            var endOfWeek = moment().add(value, 'd').endOf('isoWeek');
            var days = [];
            var day = startOfWeek;
            while (day <= endOfWeek) {
                let dayObj = {
                    obj: day.format('YYYY-MM-DD'),
                    weekday: day.format('ddd'),
                    date: day.format('DD'),
                    month: day.format('MMMM, YYYY')
                }
                days.push(dayObj);
                day = day.clone().add(1, 'd');
            }
            return this.currentWeekDays = days;
        }
    },
    methods: {
        increaseCounter() { // Increase
            this.weekdayCounter += 7;
        },
        decreaseCounter() { // Decrease
            this.weekdayCounter -= 7;
        },
        payableToday() {
            this.payToday = true;
            this.isDatePickerOpened = false;
        },
        nextPaymentType() {
            this.activePaymentTypeIndex++;
            if (this.activePaymentTypeIndex > 2) {
                this.activePaymentTypeIndex = 0;
            }
        },
        prevPaymentType() {
            this.activePaymentTypeIndex--;
            if (this.activePaymentTypeIndex < 0) {
                this.activePaymentTypeIndex = 2;
            }
        },
        selectedDate(date) {
            this.dateSelected = date;
        },
        closeModal() {
            this.hireMeModal = false;
        },
        moment: function () {
            return moment();
        },
        pickDateSelected() {
            this.currentAutoPaymentType = 'custom-date';
            this.isDatePickerOpened = true;
            this.payToday = false;
        },

        // paying methods:
        pay() {
            this.loading = true;
            if (this.validateInputs()) {
                this.paymentData = {
                    client: this.client,
                    freelancer: this.user,
                    payment_info: {
                        numberOfHours: this.totalHours,
                        totalAmount: this.paymentTotal,
                        // percentage: this.percentage,
                        toPayNowAmount: this.paymentTotal,
                        toPayLaterAmount: this.paymentTotal,
                        payNow: this.payToday ? 'true' : 'false',
                        toPayLaterDate: this.dateSelected,
                        iterations: this.select.number,
                        isRecurring: this.activePaymentTypeIndex === 1 || this.activePaymentTypeIndex === 2,
                        interval: this.activePaymentTypeIndex === 2 ? 'week' : 'month',
                    }
                };

                let paymentUrl = this.getPaymentLink();

                axios.post(paymentUrl, this.paymentData)
                    .then((response) => {
                        this.loading = false;
                        window.location = response.data.url;
                    })
                    .catch((error) => {
                        this.loading = false;
                        console.log(error)
                    });
            } else {
                this.loading = false;
            }


        },
        validateInputs() {
            let isValid = true;
            this.errors = {};

            if (this.client.name.length < 2 || this.client.name.length > 200) {
                isValid = false;
                this.errors.name = 'Name should be at least 2 characters';
            }
            if (!this.validateEmail(this.client.email)) {
                isValid = false;
                this.errors.email = 'Email should be a valid format';
            }

            return isValid;

        },
        validateEmail(email) {
            const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        },
        getPaymentLink() {
            if (this.currentActiveMethod === 'stripe') {
                return '/custom-stripe-payment';
            }
            return '/custom-paypal-payment';
        },
        getURLParameters(){

            let parameters = this.$route.query ;

            this.currentActiveMethod = parameters.payment_type  ?? 'stripe' ;
            this.select.number = parameters.iterations  ?? 'ongoing' ;

            if(parameters.hire === 'true'){
                this.$emit('openModal');
            }
            if(parameters.recurring === 'monthly'){
                this.activePaymentTypeIndex = 1;
            }
            if(parameters.recurring === 'weekly'){
                this.activePaymentTypeIndex = 2;
            }
            if(parameters.recurring === 'hourly'){
                this.activePaymentTypeIndex = 0;
            }

        },
        getTotalHours(){
            let parameters = this.$route.query ;
            if(parameters.hours && this.initial){
                this.totalHours = parameters.hours;
            }
            return this.totalHours;
        },
    },
    computed: {
        paymentTotal() {
            return this.totalHours * this.user.payment_info[0].salary;
        },
        sharableURL() {
            let URL = location.protocol + '//' + location.host + location.pathname + '?hire=true' ;
            URL += '&hours=' + this.totalHours;
            URL += '&payment_type=' + this.currentActiveMethod;
            if(this.activePaymentTypeIndex === 1){
                URL += '&recurring=monthly';
            }
            if(this.activePaymentTypeIndex === 2){
                URL += '&recurring=weekly';
            }
            if(this.activePaymentTypeIndex === 0){
                URL += '&recurring=hourly';
            }
            URL += '&iterations=' + this.select.number;

            return URL;
        },
        userHourlyRate() {
            return this.user.payment_info[0].salary;
        },
        paymentMethods() {
            return this.user.payment_methods;
        },
        currentDate() {
            if (this.dateSelected == null) {
                return moment().format('YYYY-MM-DD');
            }
            return this.dateSelected;
        },
        futureDate() {
            if (this.currentPaymentType === 'monthly') {
                return moment()
                    .add(31, 'days')
                    .format('YYYY-MM-DD');
            }
            return moment()
                .add(7, 'days')
                .format('YYYY-MM-DD');
        }
    },
    created() {
        var startOfWeek = moment().startOf('isoWeek');
        var endOfWeek = moment().endOf('isoWeek');
        var days = [];
        var day = startOfWeek;
        while (day <= endOfWeek) {
            let dayObj = {
                obj: day.format('YYYY-MM-DD'),
                weekday: day.format('ddd'),
                date: day.format('DD'),
                month: day.format('MMMM, YYYY')
            }
            days.push(dayObj);
            day = day.clone().add(1, 'd');
        }
        return this.currentWeekDays = days;
    },
    mounted() {
        this.getURLParameters();
    }
}