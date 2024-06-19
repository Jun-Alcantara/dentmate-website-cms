<section id="booking-form-section" class="bg-white">
  <div class="max-w-screen-xl mx-auto px-5 py-[50px]">
    <h3 class="text-4xl font-semibold text-[#083d67]">Book Now</h3>
    <div class="mt-2">
      <div>
        <p class="mb-3">
          Experience Dental Care at its Finest! Visit and book at Dentmate Dental Clinic of your choice! 
        </p>

        <div id="error-container" class="hidden">
          <h3 class="text-xl text-red-500">There are errors</h3>
          <ul id="error-list" class="list-disc list-inside text-red-500 mb-3">
          </ul>
        </div>

        <div id="success-message" class="hidden bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-3" role="alert">
          <strong class="font-bold">Success!</strong>
          <span class="block sm:inline">We have received your booking request. Please wait for the cofirmation</span>
        </div>

        <div class="flex flex-col md:flex-row md:gap-[25px]">
          <div class="basis-[50%]">
            <div class="mb-3">
              <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">First Name: <span class="text-red-500">*</span></label>
              <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"required>
            </div>
            <div class="mb-3">
              <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">Last Name: <span class="text-red-500">*</span></label>
              <input type="text" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"required>
            </div>
            <div class="mb-3">
              <label for="clinics" class="block mb-2 text-sm font-medium text-gray-900">Select Branch: <span class="text-red-500 ">*</span></label>
              <select id="clinics" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option value="" selected>Choose Branch</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Note to Clinic:</label>
              <textarea id="message" rows="5" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
            </div>
          </div>
          <div class="basis-[50%]">
            <div class="mb-3">
              <label for="mobile_number" class="block mb-2 text-sm font-medium text-gray-900">Mobile Number: <span class="text-red-500">*</span></label>
              <input type="text" id="mobile_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"required>
            </div>
            <div class="mb-3">
              <label for="fb_name" class="block mb-2 text-sm font-medium text-gray-900">Facebook Profile Link or FB Name:</label>
              <input type="text" id="fb_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"required>
            </div>
            <div class="mb-3">
              <label for="service" class="block mb-2 text-sm font-medium text-gray-900">Select Service: <span class="text-red-500">*</span></label>
              <select id="service" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option selected>Choose Service</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="booking-date" class="block mb-2 text-sm font-medium text-gray-900">Select your date of visit: <span class="text-red-500">*</span></label>
              <input id="booking-date" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Click here to select date">
            </div>
            <div class="mb-3">
              <label for="slots" class="block mb-2 text-sm font-medium text-gray-900">Select your time slot: <span class="text-red-500 ">*</span></label>
              <select id="slots" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option selected>Select time slot</option>
              </select>
            </div>
          </div>
        </div>
        <div class="flex flex-col md:flex-row md:gap-[25px]">
          <div class="mb-3 flex justify-end md:basis-[50%] pr-[10px]">
            <button id="book-now-button" class="bg-[#083d67] !px-[20px] !py-[10px] !text-[white] rounded-lg">
              Book Now
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" href="https://npmcdn.com/flatpickr@4.6.13/dist/themes/material_blue.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.7.2/axios.min.js" integrity="sha512-JSCFHhKDilTRRXe9ak/FJ28dcpOJxzQaCd3Xg8MyF6XFjODhy/YMCM8HW0TFDckNHWUewW+kfvhin43hKtJxAw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.11/dayjs.min.js" integrity="sha512-FwNWaxyfy2XlEINoSnZh1JQ5TRRtGow0D6XcmAWmYCRgvqOUTnzCxPc9uF35u5ZEpirk1uhlPVA19tflhvnW1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  const baseUrl = `http://admin.dentmate.ph/api`
  const clinicDropdown = $('#clinics')
  const slotsDropdown = $('#slots')
  const servicesDropdown = $('#service')
  const bookingDatePicker = $('#booking-date')
  const errorContainer = $('#error-container')
  const errorList = $('#error-list')
  const successMessage = $("#success-message")
  const tomorrowDate = dayjs().add(1, 'day').format('YYYY-MM-DD')
  const blockedSlots = []

  let datePicker = flatpickr('#booking-date', {
    minDate: dayjs().format('YYYY-MM-DD')
  })

  $(document).ready(() => {
    fetch(`${baseUrl}/available-clinics`)
      .then(response => response.json())
      .then((response) => {
        let clinics = response.data.clinics

        clinics.forEach(clinic => {
          clinicDropdown.append(
            `<option value="${clinic.id}">${clinic.name}</option>`
          )
        })
      })

    fetch(`${baseUrl}/available-services`)
      .then(response => response.json())
      .then((response) => {
        let services = response.data.services

        services.forEach(service => {
          let duration = parseDuration(service.duration)

          servicesDropdown.append(
            `<option 
              value="${service.id}"
              data-duration-hours="${duration.hours}"
              data-duration-minutes="${duration.minutes}"
            >
              ${service.name} [${service.duration}]
            </option>`
          )
        })
      })
  })

  clinicDropdown.change((e) => {
    generateSlotOptions()
    let clinic_id = $(e.target).val()

    fetch(`${baseUrl}/clinic-events?clinic_id=${clinic_id}`)
      .then(response => response.json())
      .then((response) => {
        let events = response.data
        let disabledDates = []
        
        events.forEach((event) => {
          if (event.all_day) {
            disabledDates.push(event.date)
          } else {
            if (! blockedSlots[event.date]) {
              blockedSlots[event.date] = []
            }

            blockedSlots[event.date].push({
              from: event.start_time,
              to: event.end_time
            })
          }
        })
        
        datePicker.set('disable', disabledDates)
      })
  })

  let processing = false
  let selectedServiceDuration = {
    hours: 0,
    minutes: 0
  };

  servicesDropdown.change((e) => {
    let hours = $(e.target).find('option:selected').data('duration-hours')
    let minutes = $(e.target).find('option:selected').data('duration-minutes')
    
    selectedServiceDuration.hours = hours
    selectedServiceDuration.minutes = minutes
  })

  $('#book-now-button').click((e) => {
    let timeslot = $('#slots').val()
    let [start, end] = timeslot.split('-')

    currentDate = dayjs().format('YYYY-MM-DD') + ' ' + start + ':00'
    end = dayjs(currentDate).add(selectedServiceDuration.hours, 'hour')
      .add(selectedServiceDuration.minutes, 'minute')
      .format('HH:mm')

    payload = {
      firstname: $('#first_name').val(),
      lastname: $('#last_name').val(),
      clinic_id: $('#clinics').val(),
      fb_name: $('#fb_name').val(),
      remakrs: $('#message').val(),
      mobile_no: $('#mobile_number').val(),
      start_time: start,
      end_time: end,
      service_id: $('#service').val(),
      date: $('#booking-date').val()
    }

    if (processing) {
      return
    }

    processing = true

    errorContainer.addClass('hidden')
    successMessage.addClass('hidden')
    errorList.html('')

    axios.post(`${baseUrl}/book-appointment`, payload)
      .then((response) => {
        successMessage.removeClass('hidden')

        Swal.fire({
          icon: "success",
          title: "Success!",
          text: "We have received your booking request. Please wait for the SMS confirmation.",
          showConfirmButton: true,
        });

        $('#first_name').val('')
        $('#last_name').val('')
        $('#clinics').val('')
        $('#fb_name').val('')
        $('#message').val('')
        $('#mobile_number').val('')
        $('#slots').val('')
        $('#booking-date').val('')

        processing = false
      })
      .catch((error) => {
        let responseData = error.response.data
        let errors = responseData.errors

        for (const key in errors) {
          if (errors.hasOwnProperty(key)) {
            let errorMessage = errors[key][0]

            errorList.append(`
              <li>${errorMessage}</li>
            `)
          }
        }

        errorContainer.removeClass('hidden')

        processing = false
      })

    return;

    fetch(`${baseUrl}/book-appointment`, {
      method: 'POST',
      data: payload
    }).then(response => response.json())
    .then((response) => {
      console.log(response)
    })
  })
  
  $('#booking-date').change((e) => {
    generateSlotOptions()
    let selectedDate = dayjs($(e.target).val())

    $('#slots option').each(function() {
      $(this).prop('disabled', false);
    });
    
    if (selectedDate.isSame(dayjs(), 'day')) {
      let currentHour = dayjs().format('HH')

      $('#slots option').each(function() {
        let optionHour = $(this).val().split(':')[0];
        if (parseInt(optionHour) < parseInt(currentHour)) {
            $(this).prop('disabled', true);
        }
      });
    }
  })

  function parseDuration(durationStr) {
    let hours = 0;
    let minutes = 0;
    let hrMatch = durationStr.match(/(\d+)\s*hr(s)?/);
    let minMatch = durationStr.match(/(\d+)\s*min(s)?/);

    if (hrMatch) {
      hours = parseInt(hrMatch[1], 10);
    }
    
    if (minMatch) {
      minutes = parseInt(minMatch[1], 10);
    }

    if (hours === 0 && minutes === 0) {
      minutes = 30;
    }

    let formattedMinutes = minutes.toString().padStart(2, '0')
    
    return {hours, minutes: formattedMinutes}
  }

  function generateSlotOptions(start = 800, end = 1700) {
    if (clinicDropdown.val() == "") {
      slotsDropdown.html(`<option>Please select clinic first</option>`)
      return;
    }

    if (bookingDatePicker.val() == "") {
      slotsDropdown.html(`<option>Please select a date</option>`)
      return
    }

    const selectedDate = bookingDatePicker.val()

    disabledSlotsFrom = null
    disabledSlotsTo = null
    if (blockedSlots[selectedDate]) {
      disabledSlotsFrom = dayjs().format('YYYY-MM-DD') + ' ' + blockedSlots[selectedDate][0].from
      disabledSlotsTo = dayjs().format('YYYY-MM-DD') + ' ' + blockedSlots[selectedDate][0].to
    }

    const startTime = dayjs().hour(8).minute(0)
    const endTime = dayjs().hour(18).minute(30) 

    let currentTime = startTime
    let options = `<option selected>Choose slot</option>`

    while (currentTime.isBefore(endTime)) {
      const nextTime = currentTime.add(30, 'minute')
      const optionValue = `${currentTime.format('HH:mm')}-${nextTime.format('HH:mm')}`
      const optionText = `${currentTime.format('hh:mm A')}`

      // Disable the option is the disabledSlotsFrom and disabledSlotsTo are not null
      if (disabledSlotsFrom && disabledSlotsTo &&
          currentTime.isAfter(dayjs(disabledSlotsFrom, 'HH:mm')) &&
          currentTime.isBefore(dayjs(disabledSlotsTo, 'HH:mm').add(1, 'hour'))) {
          // options += `<option disabled>${optionText} (Blocked)</option>`;
      } else {
          options += `<option value="${optionValue}">${optionText}</option>`
      }

      currentTime = nextTime;
    }

    console.log(options)
    slotsDropdown.html(options)
  }

  generateSlotOptions()
</script>