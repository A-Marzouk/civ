import moment from 'moment';
export default {
    props: {
        hireMeModal: {
          type: Boolean
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
          currentActiveMethod: null,
          isModalOpened: false,
          selectHours:1,
          paymentTotal:null,
          monthlyhours:null,
          payToday:false,
          currentStep: 1,
          currentNoPaymentStep: 1,
          iterations: 2,
          typeOfRecurringInterval: 'week',
          currentPaymentMethod: 'stripe',
          currentPaymentType: 'hourly',
          currentAutoPaymentType: '7-days',
          currentHoursType: 'week',
          // payment calculations:
          percentage: 100,
          hours:[1,2,4,6,8],
          currentSelectedHours: 25,
          finishedSteps: [],
          datePicker: this.currentDate,
          isDatePickerOpened: false,
          isDateChanged: false,
          client: {
            email: '',
            name: '',
            phone: ''
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
          messageBody: 'Hi, can you please setup your payment details to start working with you.'
        };
      },
      watch: {
        hireMeModal: function(value) {
          this.isModalOpened = value;
        },
        isModalOpened: function(value) {
          if (!value) {
            this.$emit('modalClosed');
          }
        },
        currentPaymentType: function(value) {
          this.typeOfRecurringInterval = value.replace('ly', '');
        },
        selectHours:function(value) {
          this.monthlyhours = value;
          if (value==60) {
            this.monthlyhours= value+20;
          }
          if (value==80) {
            this.monthlyhours= value+40;
          }
          if (value==100) {
            this.monthlyhours= value+60;
          }
          this.paymentTotal = this.monthlyhours * this.user.payment_info[0].salary;
        },
        
      },
      methods: {
        payableToday(){
          this.payToday = true;
          this.isDatePickerOpened = false;
        },
        goToNextStep() {
          if (this.currentStep > 4) {
            return;
          }
          this.finishedSteps.push(this.currentStep);
          this.currentStep++;
        },
        intervalNumberPlaceHolder() {
          if (this.currentPaymentType === 'hourly') {
            return '';
          }
          return 'Number of ' + this.typeOfRecurringInterval + 's';
        },
        getHoursLabel() {
          if (this.currentPaymentType === 'weekly') {
            return 'Weekly';
          }
          if (this.currentPaymentType === 'monthly') {
            return 'Monthly';
          }
          return 'Hours';
        },
        goToPreviousStep() {
          if (this.currentStep < 2) {
            return;
          }
          this.currentStep--;
        },
        isStepActive(step) {
          return step === this.currentStep;
        },
        isStepDone(step) {
          return this.finishedSteps.includes(step);
        },
    
        changePaymentMethod(payment_method) {
          this.currentPaymentMethod = payment_method;
          this.percentage = 100;
        },
        // step 2
        setPaymentType(payment_type) {
          this.currentPaymentType = payment_type;
        },
        isPaymentTypeActive(payment_type) {
          return this.currentPaymentType === payment_type;
        },
    
        // step 3
        subtractHours() {
          if (this.currentSelectedHours < 10) {
            return;
          }
          this.currentSelectedHours -= 5;
        },
        addHours() {
          if (this.currentSelectedHours > 1000) {
            return;
          }
          this.currentSelectedHours += 5;
        },
        isHoursTypeActive(hours_type) {
          return this.currentHoursType === hours_type;
        },
        setHoursType(hours_type) {
          this.currentHoursType = hours_type;
        },
        reset() {
          this.currentStep = 1;
          this.finishedSteps = [];
          this.currentSelectedHours = 40;
          this.closeModal();
        },
        continueToSend() {
          if (this.validateInputs()) {
            this.currentNoPaymentStep = 3;
          }
        },
        pay() {
          if (this.validateInputs()) {
            this.paymentData = {
              client: this.client,
              freelancer: this.user,
              payment_info: {
                numberOfHours: this.currentSelectedHours,
                totalAmount: this.totalPaymentAmount,
                percentage: this.percentage,
                toPayNowAmount: this.currentPaymentAmount,
                toPayLaterAmount: this.totalPaymentAmount - this.currentPaymentAmount,
                toPayLaterDate: this.payLaterDate,
                iterations: this.iterations,
                isRecurring: this.currentPaymentType === 'weekly' || this.currentPaymentType === 'monthly',
                interval: this.currentPaymentType === 'weekly' ? 'week' : 'month'
              }
            };
    
            let paymentUrl = '/custom-stripe-payment';
            if (this.currentPaymentMethod === 'paypal') {
              paymentUrl = '/custom-paypal-payment';
            }
    
            axios
              .post(paymentUrl, this.paymentData)
              .then(response => {
                window.location = response.data.url;
              })
              .catch(error => {
                console.log(error);
              });
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
    
          if (!this.validatePhone(this.client.phone)) {
            isValid = false;
            this.errors.phone = 'Phone should be a valid format';
          }
    
          return isValid;
        },
        validateEmail(email) {
          const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
          return re.test(String(email).toLowerCase());
        },
    
        validatePhone(phone) {
          const re = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
          return re.test(String(phone));
        },
        closeModal() {
          this.hireMeModal = false;
        },
    
        // step4
        getPayLink() {
          let paymentMethod = this.user.payment_methods.find(
            i => i.name.toLowerCase() === this.currentPaymentMethod.toLowerCase()
          );
          if (paymentMethod) {
            return paymentMethod.link;
          }
          return '#';
        },
        moment: function() {
          return moment();
        },
        isAutoPaymentTypeActive(payment_type) {
          return this.currentAutoPaymentType === payment_type;
        },
        setAutoPaymentType(payment_type) {
          this.currentAutoPaymentType = payment_type;
        },
        pickDateSelected() {
          this.currentAutoPaymentType = 'custom-date';
          this.isDatePickerOpened = true;
          this.payToday = false;
        },
        dateChanged() {
          // close the date picker
          this.isDatePickerOpened = false;
          this.isDateChanged = true;
        },
        validateAndGoToNextStep() {
          if (this.validateInputs()) {
            this.goToNextStep();
          }
        }
      },
      computed: {
        currentPaymentAmount() {
          return ((this.user.payment_info[0].salary * this.percentage) / 100) * this.currentSelectedHours;
        },
        totalPaymentAmount() {
          return this.user.payment_info[0].salary * this.currentSelectedHours;
        },
        payLaterDate() {
          if (this.currentAutoPaymentType === '7-days') {
            return moment()
              .add(7, 'days')
              .format('YYYY-MM-DD');
          } else if (this.currentAutoPaymentType === '14-days') {
            return moment()
              .add(14, 'days')
              .format('YYYY-MM-DD');
          }
    
          return this.datePicker;
        },
        userHourlyRate() {
          return this.user.payment_info[0].salary;
        },
        currentPosition() {
          return 100 - this.percentage - 10;
        },
        currentHoursPosition() {
          return 100 - this.currentSelectedHours * 2 - 10;
        },
        paymentMethods() {
          return this.user.payment_methods;
        },
        currentDate() {
          return moment()
            .add(1, 'days')
            .format('YYYY-MM-DD');
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
      }
}