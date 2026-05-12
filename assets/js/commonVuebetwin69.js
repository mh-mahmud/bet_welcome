/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Vue.filter('round', function (value, decimalPoint) {
    return (value !== null) ? parseFloat(value).toFixed(decimalPoint) : 0.00;
})

Vue.directive('init', {
    bind: function (el, binding, vnode) {
        vnode.context[binding.arg] = binding.value;
    }
});

Vue.component('date-range-picker', {
    template: '<input class="form-control" placeholder="From date - To date">',
    props: ['opens', 'dateFormat', 'autoUpdateInput'],
    mounted: function () {

        var vm = this;
        $(this.$el).daterangepicker({
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            alwaysShowCalendars: true,
            maxDate: moment(),
            autoApply: true,
            opens: this.opens,
            locale: {format: this.dateFormat},
            autoUpdateInput: false
        });

        $(this.$el).on('apply.daterangepicker', function (ev, picker) {
            vm.$emit('update-date-range', {
                startDate: picker.startDate.format('YYYY-MM-DD'),
                endDate: picker.endDate.format('YYYY-MM-DD')
            });
            
            $(vm.$el).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
        });

    },
    beforeDestroy: function () {
        jQ(this.$el).daterangepicker('hide').daterangepicker('destroy');
    }
});

//})(jQuery);

Vue.http.interceptors.push(function (request, next) {

//    // modify method
//    request.method = 'POST';

    // modify headers
//    request.headers.set('bet_csrf', document.querySelector('input[name="bet_csrf"]').getAttribute('value'));
//    request.headers.set('Authorization', 'Bearer TOKEN');
});

var base_url = document.querySelector("#base_url").getAttribute('value');
var timeDiff = 0;
$(document).ready(function () {
    var serverTime = document.getElementById('time_now').value;
    var localTime = +Date.now();
    timeDiff = serverTime - localTime;
    startTime();
});

function startTime() {
 
    var realtime = +Date.now() + timeDiff;
    var today = new Date(realtime);
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    var day = today.getDate();
    var month = today.getMonth();
    var year = today.getFullYear();
    var amOrPm = h >= 12 ? 'PM' : 'AM';
    h = (h % 12) || 12;
    
    var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    
    if(day == 1)
    {
        day = day+"st";
    }
    else if(day == 2)
    {
       day = day+"nd"; 
    }
    else if(day == 3)
    {
       day = day+"rd"; 
    }
    else
    {
       day = day+"th"; 
    }
    var monthname = months[month]

    m = checkTime(m);
    s = checkTime(s);
    
    document.getElementById('date_clock').innerHTML = day + " " + monthname + ", " + year;
    document.getElementById('time_clock').firstChild.firstChild.innerHTML = h + ":" + m + ":" + s + ' ' + amOrPm;

    var t = setTimeout(function () {
        startTime();
    }, 1000);
}
function checkTime(i) {
    if (i < 10) {
        i = "0" + i
    }
    ;  // add zero in front of numbers < 10
    return i;
}
