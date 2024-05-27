<section id="booking-form-section" class="bg-white">
  <div class="max-w-screen-xl mx-auto px-5 py-[50px]">
    <h3 class="text-4xl font-semibold text-[#083d67]">Book Now</h3>
    <div class="mt-2">
      <div>
        <p class="mb-3">
          Experience Dental Care at its Finest! Visit and book at Dentmate Dental Clinic of your choice! 
        </p>
        <div class="flex flex-col md:flex-row md:gap-[25px]">
          <div class="basis-[50%]">
            <div class="mb-3">
              <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">First Name:</label>
              <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"required>
            </div>
            <div class="mb-3">
              <label for="middle_name" class="block mb-2 text-sm font-medium text-gray-900">Middle Name:</label>
              <input type="text" id="middle_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"required>
            </div>
            <div class="mb-3">
              <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">Last Name:</label>
              <input type="text" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"required>
            </div>
            <div class="mb-3">
              <label for="gender" class="block mb-2 text-sm font-medium text-gray-900">Gender:</label>
              <select id="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option selected>Select your gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="clinics" class="block mb-2 text-sm font-medium text-gray-900">Select Branch:</label>
              <select id="clinics" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option selected>Choose Branch</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Note to Clinic:</label>
              <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
            </div>
          </div>
          <div class="basis-[50%]">
            <div class="mb-3">
              <label for="mobile_number" class="block mb-2 text-sm font-medium text-gray-900">Mobile Number:</label>
              <input type="text" id="mobile_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"required>
            </div>
            <div class="mb-3">
              <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email:</label>
              <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"required>
            </div>
            <div class="mb-3">
              <label for="message" class="block mb-2 text-sm font-medium text-gray-900">Select your date of visit:</label>
              <input id="booking-date" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Click here to select date">
            </div>
            <div class="mb-3">
              <label for="slots" class="block mb-2 text-sm font-medium text-gray-900">Select your time slot:</label>
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
<script>
  const baseUrl = `http://3.141.43.249/api`
  const clinicDropdown = $('#clinics')
  const slotsDropdown = $('#slots')
  const currentDate = new Date().toISOString().split('T')[0];
  const scheduleMap = []
  let availableDates = {}

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
  })

  $('#clinics').change((e) => {
    let selectedBranch = $(e.target).val()

    fetch(`${baseUrl}/available-slots?clinic_id=${selectedBranch}`)
      .then(response => response.json())
      .then(response => {
        let schedules = response.data.timeslots

        schedules.forEach((date) => {
          let scheduleDate = Object.keys(date)[0]
          availableDates[scheduleDate] = Object.values(date)[0]
        })

        $("#booking-date").flatpickr({
          enable: Object.keys(availableDates)
        });
      })
  })

  $('#booking-date').change((e) => {
    let selectedDate = $(e.target).val()
    let slots = availableDates[selectedDate]

    slotsDropdown.html('')
    slotsDropdown.append(`<option>Select time slot</option>`)

    slots.forEach((slot) => {
      slotsDropdown.append(
        `<option value="${slot.timeslot_id}">${slot.start_time} to ${slot.end_time}</option>`
      )
    })
  })

  $('#book-now-button').click((e) => {
    payload = {
      firstname: $('#first_name').val(),
      middlename: $('#middle_name').val(),
      lastname: $('#last_name').val(),
      gender: $('#gender').val(),
      clinic_id: $('#clinics').val(),
      remakrs: $('#message').val(),
      mobile_no: $('#mobile_number').val(),
      email: $('#email').val(),
      timeslot_id: $('#slots').val()
    }

    fetch(`${baseUrl}/book-appointment`, {
      method: 'POST',
      data: payload
    }).then(response => response.json())
    .then((response) => {
      console.log(response)
    })
  })

  $("#booking-date").flatpickr({
    dateFormat: "F j, Y",
    enable: []
  });
</script>