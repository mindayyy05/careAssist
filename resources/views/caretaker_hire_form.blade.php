<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hire Caretaker</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .content {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .title {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-group textarea {
            resize: vertical;
        }

        .form-group .date-group,
        .form-group .time-group,
        .form-group .address-group {
            display: flex;
            gap: 10px;
        }

        .form-group .date-group input,
        .form-group .time-group select,
        .form-group .address-group select,
        .form-group .address-group input {
            flex: 1;
        }

        .form-group button {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-group button:hover {
            background-color: #555;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="title">Hire John Doe</div>
        <form id="hireForm" action="{{ route('submit_hire_form') }}" method="POST" onsubmit="return validateForm()">
            @csrf

            <input type="hidden" name="form_action" value="form1">
            <div class="form-group">
                <label for="name">Name of the Elderly Individual:</label>
                <input type="text" id="name" name="name" required pattern="[a-zA-Z\s]+"
                    title="Alphanumeric characters only">
                <div id="nameError" class="error"></div>
            </div>
            <div class="form-group">
                <label for="age">Age as of 2024:</label>
                <input type="number" id="age" name="age" required min="1" max="120"
                    title="Please enter a valid age between 1 and 120">
                <div id="ageError" class="error"></div>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
                <div id="genderError" class="error"></div>
            </div>
            <div class="form-group">
                <label>Address:</label>
                <div class="address-group">
                    <select id="city" name="city" required>
                        <option value="">Select City</option>
                        <option value="Colombo">Colombo</option>
                        <option value="Gampaha">Gampaha</option>
                        <option value="Kalutara">Kalutara</option>
                        <option value="Kandy">Kandy</option>
                        <option value="Matale">Matale</option>
                        <option value="Nuwara Eliya">Nuwara Eliya</option>
                        <option value="Galle">Galle</option>
                        <option value="Matara">Matara</option>
                        <option value="Hambantota">Hambantota</option>
                        <option value="Jaffna">Jaffna</option>
                        <option value="Kilinochchi">Kilinochchi</option>
                        <option value="Mannar">Mannar</option>
                        <option value="Vavuniya">Vavuniya</option>
                        <option value="Mullaitivu">Mullaitivu</option>
                        <option value="Batticaloa">Batticaloa</option>
                        <option value="Ampara">Ampara</option>
                        <option value="Trincomalee">Trincomalee</option>
                        <option value="Kurunegala">Kurunegala</option>
                        <option value="Puttalam">Puttalam</option>
                        <option value="Anuradhapura">Anuradhapura</option>
                        <option value="Polonnaruwa">Polonnaruwa</option>
                        <option value="Badulla">Badulla</option>
                        <option value="Moneragala">Moneragala</option>
                        <option value="Ratnapura">Ratnapura</option>
                        <option value="Kegalle">Kegalle</option>
                    </select>
                    <input type="text" id="street_number" name="street_number" placeholder="Street" required
                        pattern="^(?=.*[a-zA-Z])[\w\s]+$"
                        title="Please enter a valid street (letters and numbers allowed, but must include letters)">
                    <input type="text" id="house_number" name="house_number" placeholder="House Number" required
                        pattern="^(?=.*\d)[\w\s]+$"
                        title="Please enter a valid house number (letters and numbers allowed, but must include a number)">
                </div>
                <div id="addressError" class="error"></div>
            </div>
            <div class="form-group">
                <label>If you wish to have the caretaker for more than one day, pick the starting date and ending
                    date:</label>
                <div class="date-group">
                    <input type="date" id="start_date" name="start_date" min="">
                    <input type="date" id="end_date" name="end_date" min="">
                </div>
                <div id="multiDayError" class="error"></div>
            </div>
            <div class="form-group">
                <label>If you wish to have the caretaker only for a specific date, pick the date and time slot:</label>
                <div class="date-group">
                    <input type="date" id="specific_date" name="specific_date" min="">
                </div>
                <div class="time-group">
                    <select id="start_time" name="start_time">
                        <option value="">Select Start Time</option>
                        <option value="6am">6am</option>
                        <option value="7am">7am</option>
                        <option value="8am">8am</option>
                        <option value="9am">9am</option>
                        <option value="10am">10am</option>
                        <option value="11am">11am</option>
                        <option value="12pm">12pm</option>
                        <option value="1pm">1pm</option>
                        <option value="2pm">2pm</option>
                        <option value="3pm">3pm</option>
                        <option value="4pm">4pm</option>
                        <option value="5pm">5pm</option>
                        <option value="6pm">6pm</option>
                        <option value="7pm">7pm</option>
                        <option value="8pm">8pm</option>
                        <option value="9pm">9pm</option>
                        <option value="10pm">10pm</option>
                        <option value="11pm">11pm</option>
                    </select>
                    <select id="end_time" name="end_time">
                        <option value="">Select End Time</option>
                        <option value="6am">6am</option>
                        <option value="7am">7am</option>
                        <option value="8am">8am</option>
                        <option value="9am">9am</option>
                        <option value="10am">10am</option>
                        <option value="11am">11am</option>
                        <option value="12pm">12pm</option>
                        <option value="1pm">1pm</option>
                        <option value="2pm">2pm</option>
                        <option value="3pm">3pm</option>
                        <option value="4pm">4pm</option>
                        <option value="5pm">5pm</option>
                        <option value="6pm">6pm</option>
                        <option value="7pm">7pm</option>
                        <option value="8pm">8pm</option>
                        <option value="9pm">9pm</option>
                        <option value="10pm">10pm</option>
                        <option value="11pm">11pm</option>
                    </select>
                </div>
                <div id="specificDateError" class="error"></div>
            </div>
            <div class="form-group">
                <label for="allergies">Allergies (if any):</label>
                <textarea id="allergies" name="allergies" maxlength="500"></textarea>
                <div id="allergiesError" class="error"></div>
            </div>
            <div class="form-group">
                <label for="disabilities">Disabilities (if any):</label>
                <textarea id="disabilities" name="disabilities" maxlength="500"></textarea>
                <div id="disabilitiesError" class="error"></div>
            </div>
            <div class="form-group">
                <label for="extra_notes">Extra Notes (if any):</label>
                <textarea id="extra_notes" name="extra_notes" maxlength="500"></textarea>
                <div id="extraNotesError" class="error"></div>
            </div>
            <div class="form-group">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>

    <script>
        function setMinDate() {
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('start_date').setAttribute('min', today);
            document.getElementById('end_date').setAttribute('min', today);
            document.getElementById('specific_date').setAttribute('min', today);
        }
        window.onload = setMinDate;

        function validateForm() {
            let isValid = true;
            // Clear previous error messages
            document.getElementById('nameError').textContent = '';
            document.getElementById('ageError').textContent = '';
            document.getElementById('genderError').textContent = '';
            document.getElementById('addressError').textContent = '';
            document.getElementById('multiDayError').textContent = '';
            document.getElementById('specificDateError').textContent = '';
            document.getElementById('allergiesError').textContent = '';
            document.getElementById('disabilitiesError').textContent = '';
            document.getElementById('extraNotesError').textContent = '';

            // Validate name
            const name = document.getElementById('name').value;
            if (!name.match(/^[a-zA-Z\s]+$/)) {
                document.getElementById('nameError').textContent =
                    'Please enter a valid name (alphanumeric characters only).';
                isValid = false;
            }
            // Validate age
            const age = document.getElementById('age').value;
            if (age < 1 || age > 120) {
                document.getElementById('ageError').textContent = 'Please enter a valid age between 1 and 120.';
                isValid = false;
            }
            // Validate gender
            const gender = document.getElementById('gender').value;
            if (gender === '') {
                document.getElementById('genderError').textContent = 'Please select a gender.';
                isValid = false;
            }
            // Validate address
            const city = document.getElementById('city').value;
            const streetNumber = document.getElementById('street_number').value;
            const houseNumber = document.getElementById('house_number').value;
            if (city === '' || !streetNumber.match(/^(?=.*[a-zA-Z])[\w\s]+$/) || !houseNumber.match(/^(?=.*\d)[\w\s]+$/)) {
                document.getElementById('addressError').textContent = 'Please provide a valid address.';
                isValid = false;
            }
            // Validate dates and time slots
            const startDate = document.getElementById('start_date').value;
            const endDate = document.getElementById('end_date').value;
            const specificDate = document.getElementById('specific_date').value;
            const startTime = document.getElementById('start_time').value;
            const endTime = document.getElementById('end_time').value;

            if (startDate && endDate && (specificDate || startTime || endTime)) {
                document.getElementById('multiDayError').textContent =
                    'Please either pick a date range or a specific date and time slot, but not both.';
                document.getElementById('specificDateError').textContent =
                    'Please either pick a date range or a specific date and time slot, but not both.';
                isValid = false;
            }
            if (specificDate && (!startTime || !endTime)) {
                document.getElementById('specificDateError').textContent =
                    'Please pick both start time and end time for the specific date.';
                isValid = false;
            }
            // Check specific date for Fridays
            if (specificDate) {
                const selectedDate = new Date(specificDate);
                const dayOfWeek = selectedDate.getDay();
                const todayDate = new Date().toISOString().split('T')[0]; // Current date in YYYY-MM-DD format
                if (specificDate === todayDate) {
                    document.getElementById('specificDateError').textContent = "The selected date cannot be today.";
                    isValid = false;
                } else if (dayOfWeek === 5) { // 5 represents Friday
                    document.getElementById('specificDateError').textContent =
                        "Caretaker unavailable. Check availability and try again.";
                    isValid = false;
                }
            }
            // Check if end date is after start date
            if (startDate && endDate && new Date(startDate) > new Date(endDate)) {
                document.getElementById('multiDayError').textContent = "The end date must be after the start date.";
                isValid = false;
            }
            return isValid;
        }
    </script>


</body>

</html>
