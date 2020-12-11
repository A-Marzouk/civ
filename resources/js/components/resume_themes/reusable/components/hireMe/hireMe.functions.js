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
          select: { number: 'Ongoing' },
          totalNumber: [
            { number: 'Ongoing' },
            { number: '1' },
            { number: '2' },
            { number: '3' },
            { number: '4' },
            { number: '5' },
            { number: '6' },
          ],
         
          currentActiveMethod: null,
          isModalOpened: false,
          selectHours:1,
          totalHours:null,
          payToday:false,
          weekdayCounter:0,
          dateSelected:null,
          currentWeekDays:[],
          currentPaymentMethod: 'stripe',
          // payment calculations:
          percentage: 100,
          hours:[1,2,4,6,8],
          currentPaymentType: 'hourly',
          paymentTypes:[
            "hour", "month","week"
          ],
          activePaymentTypeIndex:1,
          unitHours:20,
          currentSelectedHours: 25,
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
        selectHours:function(value) {
            this.totalHours =  this.hours[(value-20)/20]*this.unitHours;
            
        },
        activePaymentTypeIndex: function(value) {
          if (value==0) {
            this.unitHours = 1;
          }
          if (value==1) {
            this.unitHours = 20;
            // calculate total number
            this.totalNumber = [{ number: 'Ongoing' }];
            for (let index = 1; index < 7; index++) {
              const element ={number:`${index}`};
              this.totalNumber.push(element)
            }
          }
          if (value==2) {
            this.unitHours = 7;
             // calculate total number
            this.totalNumber = [{ number: 'Ongoing' }];
            for (let index = 1; index < 13; index++) {
              const element ={number:`${index}`};
              this.totalNumber.push(element)
            }
          }
          this.totalHours =  this.hours[(this.selectHours-20)/20]*this.unitHours;
        },
        weekdayCounter:function (value) {
          let startOfWeek = moment().add(value,'d').startOf('isoWeek');
          var endOfWeek = moment().add(value,'d').endOf('isoWeek');
          console.log("added days", startOfWeek)
          var days = [];
          var day = startOfWeek;
          while (day <= endOfWeek) {
            let dayObj = {
              obj: day.format('YYYY-MM-DD'),
              weekday: day.format('ddd'),
              date: day.format('DD'),
            }
              days.push(dayObj);
              day = day.clone().add(1, 'd');
          }
          return  this.currentWeekDays=days;
        }
      },
      methods: {
        increaseCounter() { // Increase
           this.weekdayCounter+=7;
        },
        decreaseCounter() { // Decrease
           this.weekdayCounter-=7;
        }, 
        payableToday(){
          this.payToday = true;
          this.isDatePickerOpened = false;
        },
        nextPaymentType(){
          this.activePaymentTypeIndex++;
          if(this.activePaymentTypeIndex >2){
            this.activePaymentTypeIndex = 0;
          }
        },
        prevPaymentType(){
          this.activePaymentTypeIndex--;
          if(this.activePaymentTypeIndex < 0){
            this.activePaymentTypeIndex = 2;
          }
        },
        selectedDate(date){
          this.dateSelected = date;
        },
        closeModal() {
          this.hireMeModal = false;
        },
        moment: function() {
          return moment();
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
      },
      computed: {
        paymentTotal(){
          return this.totalHours * this.user.payment_info[0].salary;
        },
        monthsNumber(){
          return moment().format("M");
        },
        totalPaymentAmount() {
          return this.user.payment_info[0].salary * this.currentSelectedHours;
        },
        getArrayOfMonths(){
          const months = []
          const dateStart = moment()
          const dateEnd = moment().add(6, 'month')
          while (dateEnd.diff(dateStart, 'months') >= 0) {
            months.push(dateStart.format('MMMM, YYYY'))
            dateStart.add(1, 'month')
          }
          return months;
        },
        
        userHourlyRate() {
          return this.user.payment_info[0].salary;
        },
        paymentMethods() {
          return this.user.payment_methods;
        },
        currentDate() {
          if(this.dateSelected==null){
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
      mounted(){
        var startOfWeek = moment().startOf('isoWeek');
        var endOfWeek = moment().endOf('isoWeek');
        var days = [];
        var day = startOfWeek;
        while (day <= endOfWeek) {
          let dayObj = {
            obj: day.format('YYYY-MM-DD'),
            weekday: day.format('ddd'),
            date: day.format('DD'),
          }
            days.push(dayObj);
            day = day.clone().add(1, 'd');
        }
        return  this.currentWeekDays= days;
      }
}