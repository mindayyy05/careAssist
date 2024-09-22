<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Babysitter Booking</title>
    <style>
        body,
        html {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f6f9;
            color: #333;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px;
        }

        .babysitter-profile {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 30px;
            animation: fadeIn 1s ease-out;
        }

        .babysitter-header {
            text-align: center;
            position: relative;
        }

        .babysitter-photo {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #E44B8D;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
        }

        .babysitter-header h1 {
            margin: 10px 0;
            color: #E44B8D;
            font-size: 2em;
            font-weight: bold;
        }

        .about-julia {
            font-size: 1.1em;
            color: #666;
            margin: 10px 0;
        }

        .rating {
            margin: 10px 0;
        }

        .star {
            color: #FFD700;
            font-size: 1.5em;
            margin: 0 2px;
        }

        .action-icons {
            margin: 20px 0;
            display: flex;
            justify-content: center;
        }

        .action-icons a {
            margin: 0 15px;
            display: inline-block;
            transition: transform 0.3s, opacity 0.3s;
        }

        .action-icons a svg {
            width: 2em;
            height: 2em;
        }

        .action-icons a:hover {
            transform: scale(1.2);
            opacity: 0.8;
        }

        .btn-message {
            display: inline-block;
            padding: 12px 24px;
            font-size: 1.2em;
            color: #ffffff;
            background-color: #E44B8D;
            border-radius: 25px;
            text-decoration: none;
            transition: background-color 0.3s, transform 0.3s;
            margin-top: 20px;
        }

        .btn-message:hover {
            background-color: #d93b7b;
            transform: scale(1.05);
        }

        .babysitter-content {
            width: 100%;
            margin-top: 20px;
        }

        .section {
            margin-bottom: 30px;
            background-color: #E3F2FD;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .section:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .section h2 {
            margin-top: 0;
            color: #E44B8D;
            font-size: 1.6em;
            font-weight: bold;
        }

        .section p {
            margin: 10px 0;
            font-size: 1em;
        }

        .section ul {
            list-style-type: disc;
            margin: 10px 0 0 20px;
            padding: 0;
        }

        .section li {
            margin-bottom: 5px;
        }

        .testimonial {
            margin-bottom: 15px;
        }

        .testimonial-author {
            font-style: italic;
            color: #888;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            .babysitter-profile {
                padding: 15px;
            }

            .babysitter-header h1 {
                font-size: 1.5em;
            }

            .about-julia {
                font-size: 1em;
            }

            .star {
                font-size: 1.2em;
            }
        }



        /* Container to set consistent width */
        .container {
            max-width: 1200px;
            /* or set a specific max-width */
            margin: auto;
        }

        /* Section for certifications and experience */
        .certifications-experience-section {
            display: flex;
            gap: 20px;
            margin-top: 20px;
            padding: 20px;



        }

        .certifications-box,
        .experience-box {
            background-color: #faf3f8;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1);
            flex: 1;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .certifications-box:hover,
        .experience-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .certifications-box h2,
        .experience-box h2 {
            color: #E44B8D;
            font-size: 1.8em;
            margin-bottom: 15px;
        }

        .certification-item {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
        }

        .certification-icon {
            background-color: #E44B8D;
            padding: 10px;
            border-radius: 50%;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
        }

        .certification-details h3 {
            margin: 0;
            color: #333;
            font-size: 1.2em;
        }

        .certification-details p {
            margin: 5px 0 0;
            color: #666;
        }

        .experience-box p {
            margin-bottom: 10px;
            color: #333;
        }

        .experience-box ul {
            list-style-type: disc;
            margin: 10px 0 0 20px;
            padding: 0;
        }

        .experience-box li {
            margin-bottom: 5px;
        }

        @media (max-width: 768px) {
            .certifications-experience-section {
                flex-direction: column;
            }
        }

        /* Section for testimonials */
        .testimonial-section {
            padding: 20px;
            background-color: #faf3f8;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: auto;
            text-align: center;
            margin-top: 2%;
        }

        .testimonial-section h2 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #E44B8D;
        }

        .testimonials-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
        }

        .testimonial-box {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            text-align: left;
            flex: 1;
            min-width: 200px;
            max-width: 210px;
        }

        /* Section for availability */
        .availability-section {
            padding: 20px;
            background-color: #faf3f8;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: auto;
            text-align: center;
        }

        .availability-section h2 {
            font-size: 2em;
            margin-bottom: 15px;
            color: #E44B8D;
        }

        .availability-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        .availability-table th,
        .availability-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        .availability-table th {
            background-color: #f4f4f4;
            color: #333;
        }

        .availability-table td {
            background-color: #fff;
        }

        .tick {
            color: #4caf50;
            /* Green color for the tick */
            font-size: 1.5em;
        }

        .availability-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Section for reviews */
        /* Reviews Container Styling */
        .reviews-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            padding: 20px;
            background-color: #faf3f8;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: auto;
            text-align: center;
            margin-top: 3%;
        }

        /* Heading Styling */
        .reviews-container h2 {
            font-size: 2em;
            margin-bottom: 15px;
            color: #E44B8D;
            width: 100%;
            text-align: center;
        }

        /* Review Box Styling */
        .review-box {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            text-align: left;
            flex: 1;
            min-width: 200px;
            max-width: 210px;
        }


        /* Hover effect for the review cards */
        .review-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        /* Specific style for the Add Review card */
        .add-review {
            background-color: #E44B8D;
            color: white;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            transition: background-color 0.3s ease;
            min-width: 200px;
            max-width: 210px;
        }

        /* Hover effect for the Add Review card */
        .add-review:hover {
            background-color: #C43A6A;
        }

        /* Modal Background */
        .modal-background {
            display: none;
            /* Hidden by default */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            /* Semi-transparent background */
            z-index: 1000;
            /* Ensure it's on top of other content */
            justify-content: center;
            align-items: center;
        }

        /* Modal Container */
        .modal-container {
            background: white;
            border-radius: 8px;
            padding: 20px;
            max-width: 500px;
            width: 90%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            position: relative;
        }

        /* Modal Form Elements */
        .modal-container form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .modal-container label {
            font-weight: bold;
        }

        .modal-container input[type="text"],
        .modal-container textarea {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1em;
        }

        .modal-container button[type="submit"] {
            background-color: #E44B8D;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .modal-container button[type="submit"]:hover {
            background-color: #C43A6A;
        }












































        /* Sliding Form */
        .form-slider {
            position: relative;
            overflow: hidden;
            width: 100%;


        }

        .form-slides {
            display: flex;
            transition: transform 0.5s ease-in-out;

            width: 100%;
        }

        .form-slide {
            min-width: 100%;
            box-sizing: border-box;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0.2, 0.2, 0.2, 0.2);
            margin-right: 0;
            text-align: center;
        }


        .form-slide.hidden {
            display: none;
        }

        .navigation-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .navigation-buttons button {
            padding: 10px 20px;
            background-color: #E44B8D;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .navigation-buttons button:hover {
            background-color: #B03A6B;
        }

        /* Age Group Selection */
        .age-group-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 20px;
        }

        .age-group-box {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            background-color: #E3F2FD;
            border-radius: 10px;
            cursor: pointer;
            transition: transform 0.3s, background-color 0.3s;
        }

        .age-group-box.selected {
            background-color: #E44B8D;
            color: #fff;
        }

        .age-group-box:hover {
            transform: scale(1.05);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .age-group-icon {
            font-size: 30px;
            margin-bottom: 10px;
        }

        /* Input Fields for Child Details */
        /* Input Fields for Child Details */
        .child-details-container {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-bottom: 20px;
            align-items: center;
        }

        .child-details-container input,
        .child-details-container select {
            /* Apply styles to both input and select */
            width: 85%;
            /* Increased width */
            max-width: 350px;
            /* Optional: Adjust the maximum width */
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            /* Ensures font size consistency */
            appearance: none;
            /* Removes default browser styling */
            -webkit-appearance: none;
            /* For Safari */
            -moz-appearance: none;
            /* For Firefox */
        }



        /* Buttons for Schedules */
        .schedule-buttons {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 20px;
            align-items: center;
        }

        .schedule-button {
            padding: 10px 15px;
            background-color: #E3F2FD;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 80%;
            max-width: 300px;
        }

        .schedule-button:hover {
            background-color: #BDE0FE;
        }

        /* Adding Tasks Slide */
        .adding-tasks-form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .task-item {
            display: flex;
            gap: 10px;
        }

        .task-description {
            flex: 1;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .task-time {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .add-task {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .add-task:hover {
            background-color: #45a049;
        }

        .upload-doc {
            margin-top: 10px;
        }

        .upload-doc input[type="file"] {
            margin-top: 5px;
        }

        /* Sickness Details Slide */
        .sickness-details-form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: center;
            /* Center the items horizontally */
            margin: 0 auto;
            /* Centers the entire form */
        }

        .sickness-details-form input {
            width: 80%;
            max-width: 300px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Medicine Details Slide */
        .medicine-details-form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: center;
            /* Center the items horizontally */
            margin: 0 auto;
            /* Centers the entire form */
        }

        .medicine-details-form input {
            width: 80%;
            max-width: 300px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .confirm-button {
            padding: 10px 20px;
            background-color: #E44B8D;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 80%;
            max-width: 300px;
        }

        .confirm-button:hover {
            background-color: #B03A6B;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .modal-content {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            width: 80%;
            max-width: 600px;
            position: relative;
        }

        .modal-header {
            font-size: 1.5em;
            margin-bottom: 15px;
            color: #333;
        }

        .modal-close {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 1.5em;
            cursor: pointer;
            color: #333;
        }

        .modal-close:hover {
            color: #E44B8D;
        }

        .modal-body {
            margin-bottom: 20px;
        }

        .modal-body label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        .modal-body input {
            width: calc(100% - 22px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .modal-footer button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .modal-footer .confirm-button {
            background-color: #E44B8D;
            color: #fff;
        }

        .modal-footer .confirm-button:hover {
            background-color: #B03A6B;
        }

        .modal-footer .cancel-button {
            background-color: #ccc;
        }

        .modal-footer .cancel-button:hover {
            background-color: #aaa;
        }



        .calendar-container {
            margin: 20px auto;
            text-align: center;
            max-width: 600px;
        }

        .calendar-table {
            width: 100%;
            border-collapse: collapse;
        }

        .calendar-table th,
        .calendar-table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
            cursor: pointer;
        }

        .calendar-table th {
            background-color: #f4f4f4;
        }

        .calendar-table td.selected {
            background-color: #E44B8D;
            color: white;
        }

        .calendar-table td:hover {
            background-color: #e3f2fd;
        }

        .child-details-container input {
            width: 80%;
            max-width: 300px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .heading {
            text-align: center;
            margin: 40px 0;
        }

        .heading h2 {
            font-size: 2.5em;
            color: #E44B8D;
            background: linear-gradient(45deg, #E44B8D, #E3F2FD);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            border: 2px solid #E44B8D;
            border-radius: 10px;
            padding: 10px;
            display: inline-block;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: relative;
            transition: transform 0.3s;
        }

        .heading h2:hover {
            transform: scale(1.1);
            background: linear-gradient(45deg, #E3F2FD, #E44B8D);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .heading h2::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            z-index: -1;
        }

        /* Time Input Slide */
        .time-input-form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: center;
            /* Center the items horizontally */
            margin: 0 auto;
            /* Centers the entire form */
        }

        .time-input-form input {
            width: 80%;
            max-width: 300px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }




        .child-details-container {
            margin-bottom: 20px;
        }

        .feeding-type-options {
            display: flex;
            gap: 15px;
            /* Adjust the gap between checkboxes as needed */
            align-items: center;
        }

        .feeding-times-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            /* Adjust the gap between items as needed */
        }

        .feeding-time-item {
            flex: 1 1 200px;
            /* Adjust width as needed */
            box-sizing: border-box;
        }

        .additional-questions-container {
            margin-top: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .question-item {
            margin-bottom: 15px;
        }

        .question-item label {
            display: block;
            margin-bottom: 5px;
        }

        .question-item textarea {
            width: 100%;
            box-sizing: border-box;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }


        .schedule-container {
            margin-bottom: 20px;
        }

        .wake-sleep-times {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .wake-sleep-time-item {
            flex: 1 1 45%;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
        }

        .wake-sleep-time-item label {
            margin-bottom: 5px;
        }

        .nap-schedule {
            margin-top: 20px;
        }

        .nap-schedule-row {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }

        .nap-time-item {
            flex: 1;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
        }

        .nap-time-item label {
            margin-bottom: 5px;
        }

        .preferences-row {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin-top: 20px;
        }

        .preference-item {
            flex: 1;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
        }

        .preference-item label {
            margin-bottom: 5px;
        }

        .white-noise-question {
            margin-top: 20px;
            display: flex;
            align-items: center;
        }

        .white-noise-question label {
            margin-right: 10px;
            /* Adjust space between question and radio buttons */
        }

        .radio-options {
            display: flex;
            gap: 10px;
            /* Adjust spacing between radio buttons */
        }

        .white-noise-question input[type="radio"] {
            margin-right: 5px;
        }


        .bathing-schedule,
        .preferred-products,
        .diaper-changing,
        .oral-hygiene {
            margin-bottom: 20px;
        }

        .bathing-schedule {
            margin-bottom: 20px;
        }

        .bathing-schedule-row {
            display: flex;
            justify-content: space-between;
        }

        .schedule-item {
            flex: 1;
            margin-right: 10px;
            /* Adjust spacing between columns */
            box-sizing: border-box;
        }

        .schedule-item label {
            display: block;
            margin-bottom: 5px;
        }

        .schedule-item input[type="time"],
        .schedule-item input[type="text"] {
            width: 100%;
            box-sizing: border-box;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .preferred-products,
        .diaper-changing,
        .oral-hygiene {
            display: flex;
            flex-direction: column;
        }

        .product-item,
        .diaper-item {
            margin-bottom: 10px;
        }

        .diaper-changing {
            margin-bottom: 20px;
        }

        .brushing-times {
            display: flex;
            flex-wrap: wrap;
        }

        .brushing-times label {
            display: flex;
            align-items: center;
            margin-right: 20px;
            /* Adjust spacing between checkboxes */
            margin-bottom: 5px;
        }

        .brushing-times input[type="checkbox"] {
            margin-right: 10px;
        }

        /* Flex container for medicine sections */
        .sickness-disabilities-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .sickness-item,
        .disability-item {
            flex: 1 1 45%;
            display: flex;
            flex-direction: column;
        }

        .sickness-item label,
        .disability-item label {
            margin-bottom: 5px;
        }

        .medicine-row {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .medicine-details-form {
            flex: 1;
            display: flex;
            flex-direction: column;
            padding: 10px;
            box-sizing: border-box;
        }

        .confirm-button {
            background-color: #E44B8D;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .confirm-button:hover {
            background-color: #c5417b;
        }

        .emergency-contacts-row {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .emergency-contact {
            flex: 1;
            display: flex;
            flex-direction: column;
            padding: 10px;
            box-sizing: border-box;
        }

        .emergency-contact input {
            margin-bottom: 10px;
        }

        .screen-time-questions-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            /* Aligns textareas at the top */
            margin-top: 20px;
            /* Adds spacing above the row */
        }

        .screen-time-question {
            flex: 1;
            margin-right: 10px;
            /* Adds spacing between the questions */
        }

        .screen-time-gap {
            width: 5px;
            /* Adjusts the gap size */
        }

        .question-input-form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            /* Adds space between the questions */
            margin-top: 20px;
            /* Adds spacing above the form */
        }

        textarea {
            width: 100%;
            padding: 8px;
            font-size: 14px;
            border-radius: 4px;
            border: 1px solid #ccc;
            resize: vertical;
            /* Allows vertical resizing of text areas */
        }

        .message-babysitter {
            margin-top: 10px;
        }

        .btn-message {
            background-color: #6191c6;
            /* Green */
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }

        .btn-message:hover {
            background-color: #45a049;
            /* Darker green */
        }

        .message-container {
            margin: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .btn-submit {
            background-color: #008CBA;
            /* Blue */
            color: white;
            padding: 10px 20px;
            text-align: center;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-submit:hover {
            background-color: #007B9E;
            /* Darker blue */
        }

        /* Form Elements */
        #review-form-modal textarea {
            width: calc(100% - 15px);
            /* Adjust width to reduce space from the right */
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            /* Ensure padding and border are included in width */
        }

        .report-btn-container {
            display: flex;
            /* Use flexbox to align the button */
            justify-content: flex-end;
            /* Aligns the button to the right */
            margin-top: 10px;
            /* Margin at the top */
        }

        .report-btn {
            background-color: #ff4d4d;
            /* Red color */
            color: white;
            /* White text */
            padding: 8px 16px;
            /* Padding for the button */
            border: none;
            /* Remove border */
            border-radius: 4px;
            /* Rounded corners */
            cursor: pointer;
            /* Pointer cursor on hover */
            font-size: 14px;
            /* Font size */
            font-weight: bold;
            /* Bold text */
            transition: background-color 0.3s ease;
            /* Smooth transition effect */
        }

        .report-btn:hover {
            background-color: #cc0000;
            /* Darker red on hover */
        }
    </style>
</head>

<body><br><br><br><br>

    <!-- Babysitter Details Card -->
    <!-- Babysitter Details Card -->
    <div class="container">
        <div class="babysitter-profile">
            <div class="babysitter-header">
                <img src="images/babysitter.jpeg" alt="Babysitter Photo" class="babysitter-photo">
                <h1>Julia Cooper</h1>
                <p class="about-julia">
                    Julia has worked with over 50 families and has extensive experience in various child care settings.
                    She specializes in infant care, special needs care, and homework assistance. Julia is known for her
                    reliability, kindness, and engaging activities for children.
                </p>
                <div class="rating">
                    <span class="star">&#9733;</span>
                    <span class="star">&#9733;</span>
                    <span class="star">&#9733;</span>
                    <span class="star">&#9733;</span>
                    <span class="star">&#9733;</span>
                </div>
                <div class="action-icons">
                    <!-- Call icon -->
                    <a href="tel:0725306972" class="icon-call" aria-label="Call Babysitter">
                        <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24">
                            <path fill="#38b240"
                                d="M19.95 21q-3.125 0-6.175-1.362t-5.55-3.863t-3.862-5.55T3 4.05q0-.45.3-.75t.75-.3H8.1q.35 0 .625.238t.325.562l.65 3.5q.05.4-.025.675T9.4 8.45L6.975 10.9q.5.925 1.187 1.787t1.513 1.663q.775.775 1.625 1.438T13.1 17l2.35-2.35q.225-.225.588-.337t.712-.063l3.45.7q.35.1.575.363T21 15.9v4.05q0 .45-.3.75t-.75.3" />
                        </svg>
                    </a>
                    <!-- Email icon -->
                    <a href="mailto:babysitter@example.com" class="icon-email" aria-label="Email Babysitter">
                        <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24">
                            <path fill="#3884b2"
                                d="M4 20q-.825 0-1.412-.587T2 18V6q0-.825.588-1.412T4 4h16q.825 0 1.413.588T22 6v12q0 .825-.587 1.413T20 20zm8-7l8-5V6l-8 5l-8-5v2z" />
                        </svg>
                    </a>
                </div>
                <a href="{{ route('message.view') }}" class="btn-message">
                    Message Babysitter
                </a>
            </div>
            <div class="babysitter-content">
                <div class="certifications-experience-section">
                    <div class="certifications-box">
                        <h2>Certifications</h2>
                        <div class="certification-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256">
                                <path fill="#b23879"
                                    d="M128 140a12 12 0 0 1-12 12H72a12 12 0 0 1 0-24h44a12 12 0 0 1 12 12m-12-52H72a12 12 0 0 0 0 24h44a12 12 0 0 0 0-24m120 79.14V228a12 12 0 0 1-17.95 10.42L196 225.82l-22 12.6A12 12 0 0 1 156 228v-24H40a20 20 0 0 1-20-20V56a20 20 0 0 1 20-20h176a20 20 0 0 1 20 20v32.86a55.87 55.87 0 0 1 0 78.28M196 160a32 32 0 1 0-32-32a32 32 0 0 0 32 32m-40 20v-12.86a56 56 0 0 1 56-92.8V60H44v120Zm56 27.32v-25.66a55.87 55.87 0 0 1-32 0v25.66l10.05-5.74a12 12 0 0 1 11.9 0Z" />
                            </svg>
                            <div class="certification-details">
                                <h3>CPR Certification</h3>
                                <p>Issued: 2022</p>
                            </div>
                        </div>
                        <div class="certification-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256">
                                <path fill="#b23879"
                                    d="M128 140a12 12 0 0 1-12 12H72a12 12 0 0 1 0-24h44a12 12 0 0 1 12 12m-12-52H72a12 12 0 0 0 0 24h44a12 12 0 0 0 0-24m120 79.14V228a12 12 0 0 1-17.95 10.42L196 225.82l-22 12.6A12 12 0 0 1 156 228v-24H40a20 20 0 0 1-20-20V56a20 20 0 0 1 20-20h176a20 20 0 0 1 20 20v32.86a55.87 55.87 0 0 1 0 78.28M196 160a32 32 0 1 0-32-32a32 32 0 0 0 32 32m-40 20v-12.86a56 56 0 0 1 56-92.8V60H44v120Zm56 27.32v-25.66a55.87 55.87 0 0 1-32 0v25.66l10.05-5.74a12 12 0 0 1 11.9 0Z" />
                            </svg>
                            <div class="certification-details">
                                <h3>First Aid Certification</h3>
                                <p>Issued: 2022</p>
                            </div>
                        </div>
                        <div class="certification-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256">
                                <path fill="#b23879"
                                    d="M128 140a12 12 0 0 1-12 12H72a12 12 0 0 1 0-24h44a12 12 0 0 1 12 12m-12-52H72a12 12 0 0 0 0 24h44a12 12 0 0 0 0-24m120 79.14V228a12 12 0 0 1-17.95 10.42L196 225.82l-22 12.6A12 12 0 0 1 156 228v-24H40a20 20 0 0 1-20-20V56a20 20 0 0 1 20-20h176a20 20 0 0 1 20 20v32.86a55.87 55.87 0 0 1 0 78.28M196 160a32 32 0 1 0-32-32a32 32 0 0 0 32 32m-40 20v-12.86a56 56 0 0 1 56-92.8V60H44v120Zm56 27.32v-25.66a55.87 55.87 0 0 1-32 0v25.66l10.05-5.74a12 12 0 0 1 11.9 0Z" />
                            </svg>
                            <div class="certification-details">
                                <h3>Child Development Course</h3>
                                <p>Issued: 2021</p>
                            </div>
                        </div>

                        <div class="certification-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256">
                                <path fill="#b23879"
                                    d="M128 140a12 12 0 0 1-12 12H72a12 12 0 0 1 0-24h44a12 12 0 0 1 12 12m-12-52H72a12 12 0 0 0 0 24h44a12 12 0 0 0 0-24m120 79.14V228a12 12 0 0 1-17.95 10.42L196 225.82l-22 12.6A12 12 0 0 1 156 228v-24H40a20 20 0 0 1-20-20V56a20 20 0 0 1 20-20h176a20 20 0 0 1 20 20v32.86a55.87 55.87 0 0 1 0 78.28M196 160a32 32 0 1 0-32-32a32 32 0 0 0 32 32m-40 20v-12.86a56 56 0 0 1 56-92.8V60H44v120Zm56 27.32v-25.66a55.87 55.87 0 0 1-32 0v25.66l10.05-5.74a12 12 0 0 1 11.9 0Z" />
                            </svg>
                            <div class="certification-details">
                                <h3>Child Development Course</h3>
                                <p>Issued: 2021</p>
                            </div>
                        </div>
                    </div>


                    <div class="certifications-box">
                        <h2>Experience</h2>
                        <div class="certification-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 14 14">
                                <g fill="none" stroke="#b23879" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4.03 4.5a2 2 0 1 0 0-4a2 2 0 0 0 0 4" />
                                    <path
                                        d="M5.716 10.524L5.344 13.5H2.727l-.5-4H.529V8a3.5 3.5 0 0 1 6.942-.634M7.295 9.97c0-.487.395-.882.882-.882h4.412c.487 0 .882.395.882.883v2.647a.88.88 0 0 1-.882.882H8.177a.88.88 0 0 1-.882-.882zm1.881-.882v-.65a1 1 0 0 1 1-1h.412a1 1 0 0 1 1 1v.65" />
                                </g>
                            </svg>
                            <div class="certification-details">
                                <h3>CPR Certification</h3>
                                <p>Issued: 2022</p>
                            </div>
                        </div>
                        <div class="certification-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 14 14">
                                <g fill="none" stroke="#b23879" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4.03 4.5a2 2 0 1 0 0-4a2 2 0 0 0 0 4" />
                                    <path
                                        d="M5.716 10.524L5.344 13.5H2.727l-.5-4H.529V8a3.5 3.5 0 0 1 6.942-.634M7.295 9.97c0-.487.395-.882.882-.882h4.412c.487 0 .882.395.882.883v2.647a.88.88 0 0 1-.882.882H8.177a.88.88 0 0 1-.882-.882zm1.881-.882v-.65a1 1 0 0 1 1-1h.412a1 1 0 0 1 1 1v.65" />
                                </g>
                            </svg>
                            <div class="certification-details">
                                <h3>First Aid Certification</h3>
                                <p>Issued: 2022</p>
                            </div>
                        </div>

                        <div class="certification-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                viewBox="0 0 14 14">
                                <g fill="none" stroke="#b23879" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4.03 4.5a2 2 0 1 0 0-4a2 2 0 0 0 0 4" />
                                    <path
                                        d="M5.716 10.524L5.344 13.5H2.727l-.5-4H.529V8a3.5 3.5 0 0 1 6.942-.634M7.295 9.97c0-.487.395-.882.882-.882h4.412c.487 0 .882.395.882.883v2.647a.88.88 0 0 1-.882.882H8.177a.88.88 0 0 1-.882-.882zm1.881-.882v-.65a1 1 0 0 1 1-1h.412a1 1 0 0 1 1 1v.65" />
                                </g>
                            </svg>
                            <div class="certification-details">
                                <h3>First Aid Certification</h3>
                                <p>Issued: 2022</p>
                            </div>
                        </div>

                        <div class="certification-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                viewBox="0 0 14 14">
                                <g fill="none" stroke="#b23879" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4.03 4.5a2 2 0 1 0 0-4a2 2 0 0 0 0 4" />
                                    <path
                                        d="M5.716 10.524L5.344 13.5H2.727l-.5-4H.529V8a3.5 3.5 0 0 1 6.942-.634M7.295 9.97c0-.487.395-.882.882-.882h4.412c.487 0 .882.395.882.883v2.647a.88.88 0 0 1-.882.882H8.177a.88.88 0 0 1-.882-.882zm1.881-.882v-.65a1 1 0 0 1 1-1h.412a1 1 0 0 1 1 1v.65" />
                                </g>
                            </svg>
                            <div class="certification-details">
                                <h3>Child Development Course</h3>
                                <p>Issued: 2021</p>
                            </div>
                        </div>
                    </div>




                </div>


                <div class="testimonial-section">
                    <h2>Testimonials</h2>
                    <div class="testimonials-container">
                        <div class="testimonial-box">
                            <p class="testimonial-text">"Julia was fantastic with our kids! Highly recommended!"</p>
                            <p class="testimonial-author">- Sarah K.</p>
                        </div>
                        <div class="testimonial-box">
                            <p class="testimonial-text">"Professional and caring. We trust her completely."</p>
                            <p class="testimonial-author">- John D.</p>
                        </div>
                        <div class="testimonial-box">
                            <p class="testimonial-text">"Highly skilled and attentive. A real asset to our family."</p>
                            <p class="testimonial-author">- Emma W.</p>
                        </div>
                        <div class="testimonial-box">
                            <p class="testimonial-text">"Reliable and compassionate. Our go-to person for childcare."
                            </p>
                            <p class="testimonial-author">- Michael B.</p>
                        </div>
                    </div>
                </div><br><br><br>


                <div class="availability-section">
                    <h2>Availability</h2>
                    <p>Julia is available for bookings on the following days:</p>
                    <table class="availability-table">
                        <thead>
                            <tr>
                                <th>Day</th>
                                <th>Morning</th>
                                <th>Afternoon</th>
                                <th>Evening</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Monday</td>
                                <td class="tick">&#10004;</td>
                                <td class="tick">&#10004;</td>
                                <td class="tick">&#10004;</td>
                            </tr>
                            <tr>
                                <td>Tuesday</td>
                                <td class="tick">&#10004;</td>
                                <td class="tick">&#10004;</td>
                                <td class="tick">&#10004;</td>
                            </tr>
                            <tr>
                                <td>Wednesday</td>
                                <td class="tick">&#10004;</td>
                                <td class="tick">&#10004;</td>
                                <td class="tick">&#10004;</td>
                            </tr>
                            <tr>
                                <td>Thursday</td>
                                <td class="tick">&#10004;</td>
                                <td class="tick">&#10004;</td>
                                <td class="tick">&#10004;</td>
                            </tr>
                            <tr>
                                <td>Friday</td>
                                <td class="tick">&#10004;</td>
                                <td class="tick">&#10004;</td>
                                <td class="tick">&#10004;</td>
                            </tr>
                            <tr>
                                <td>Saturday</td>
                                <td class="tick">&#10004;</td>
                                <td class="tick">&#10004;</td>
                                <td class="tick">&#10004;</td>
                            </tr>
                            <tr>
                                <td>Sunday</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <div class="reviews-section">
                    <div class="reviews-container">
                        <h2>Rating and Reviews</h2>
                        <!-- Add Review Box -->
                        <div class="review-box add-review" onclick="showReviewForm()">
                            + Add Review
                        </div>

                        
                        @foreach ($reviews as $review)
                            <div class="review-box">
                                <strong>{{ $review->name }}</strong>
                                <p>{{ $review->review }}</p>
                                <small>{{ $review->created_at->format('M d, Y') }}</small>
                            </div>
                        @endforeach
                    </div>
                    <!-- Report Babysitter Button -->
                    <!-- Report Babysitter Button -->
                    <div class="report-btn-container">
                        <button class="report-btn" onclick="">Report Babysitter</button>
                    </div>



                </div>


                <!-- Review Form Modal -->
                <!-- Modal Background -->
                <div id="review-form-modal" class="modal-background">
                    <div class="modal-container">
                        <button class="modal-close" onclick="hideReviewForm()"><svg
                                xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                viewBox="0 0 20 20">
                                <path fill="#b23879"
                                    d="M2.93 17.07A10 10 0 1 1 17.07 2.93A10 10 0 0 1 2.93 17.07M11.4 10l2.83-2.83l-1.41-1.41L10 8.59L7.17 5.76L5.76 7.17L8.59 10l-2.83 2.83l1.41 1.41L10 11.41l2.83 2.83l1.41-1.41L11.41 10z" />
                            </svg></button>
                        <form action="{{ route('storeReview') }}" method="POST">
                            @csrf
                            <label for="name">Name:</label>
                            <input type="text" name="name" required>
                            <label for="review">Review:</label>
                            <textarea name="review" required></textarea>
                            <button type="submit">Submit</button>
                        </form>
                    </div>

                </div>



            </div>
        </div>
    </div>



    </div>



    <div class="container">
        <!-- Babysitter Details -->
        <!-- ... (existing code) -->

        <div class="heading">
            <h2>Book a babysitter now!</h2>
        </div><br><br>

        <form id="confirmBookingForm" method="POST" action="{{ route('confirm.booking') }}">
            @csrf
            <div class="form-slider">
                <div class="form-slides">
                    <!-- Age Group Selection Slide -->
                    <div class="form-slide" id="ageGroupSlide">
                        <h2>Select Age Group</h2>
                        <p>Choose the appropriate age group for the child.</p>
                        <div class="age-group-container" id="ageGroupCategory" name="ageGroupCategory">
                            <!-- Age Group 0-2 years -->
                            <div class="age-group-box" id="ageGroup0-2" onclick="selectAgeGroup('0-2')">
                                <div class="age-group-icon" id="icon0-2" name="icon0-2">👶</div>
                                <p id="label0-2">0-2 years</p>
                            </div>
                            <!-- Age Group 3-5 years -->
                            <div class="age-group-box" id="ageGroup3-5" onclick="selectAgeGroup('3-5')">
                                <div class="age-group-icon" id="icon3-5" name="icon3-5">👦</div>
                                <p id="label3-5">3-5 years</p>
                            </div>
                            <!-- Age Group 6-12 years -->
                            <div class="age-group-box" id="ageGroup6-12" onclick="selectAgeGroup('6-12')">
                                <div class="age-group-icon" id="icon6-12" name="icon6-12">👧</div>
                                <p id="label6-12">6-12 years</p>
                            </div>
                        </div>
                    </div>


                    <!-- Booking Date and Time Slide -->
                    <div class="form-slide" id="slide5">
                        <h2>Select Booking Date and Time</h2>
                        <p>Please select the date and time for the booking.</p>
                        <div class="child-details-container">
                            <label for="booking-date">Booking Date:</label>
                            <input type="date" id="bookingDate" name="bookingDate">
                            <label for="booking-time">Booking Time:</label>
                            <input type="time" id="bookingTime" name="bookingTime">
                        </div>
                    </div>

                    <!-- Child Details Slide -->
                    <div class="form-slide" id="childDetailsSlide">
                        <h2>Child Details</h2>
                        <p>Enter the details of the child to be babysat.</p>
                        <div class="child-details-container">
                            <!-- Child's Name and Age -->
                            <input type="text" id="childName" name="childName" placeholder="Child's Name"
                                required>
                            <input type="text" id="childAge" name="childAge" placeholder="Age" required>

                            <!-- Gender Selection -->
                            <select id="gender" name="gender" required>
                                <option value="" disabled selected>Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>

                            <!-- House Address -->
                            <input type="text" id="houseAddress" name="houseAddress" placeholder="House Address"
                                required>
                        </div>
                    </div>


                    <!-- Schedule and Feeding Slide -->
                    <div class="form-slide" id="scheduleSlide">


                        <h2>Set Feeding Schedule</h2>

                        <div class="child-details-container">
                            {{-- <label for="feedingType">Feeding Type:</label>
                            <div class="feeding-type-options">
                                <input type="checkbox" id="breastfed" name="feedingType" value="breastfed">
                                <label for="breastfed">Breastfed</label>
                                <input type="checkbox" id="formulaFed" name="feedingType" value="formulaFed">
                                <label for="formulaFed">Formula Fed</label>
                                <input type="checkbox" id="solidFoods" name="feedingType" value="solidFoods">
                                <label for="solidFoods">Solid Foods</label>
                            </div><br><br> --}}

                            <div class="feeding-times-container">
                                <div class="feeding-time-item">
                                    <label for="feedingTime">Breakfast Feeding Time:</label>
                                    <input type="time" id="feedingTime" name="feedingTime" required>
                                    <label for="breakfast">Preferred Food:</label>
                                    <input type="text" id="breakfast" name="breakfast">
                                    <label for="feedingDetails">Details:</label>
                                    <input type="text" id="feedingDetails" name="feedingDetails">
                                </div>

                                <div class="feeding-time-item">
                                    <label for="feedingTime2">Lunch Feeding Time:</label>
                                    <input type="time" id="feedingTime2" name="feedingTime2" required>
                                    <label for="lunch">Preferred Food:</label>
                                    <input type="text" id="lunch" name="lunch">
                                    <label for="feedingDetails2">Details:</label>
                                    <input type="text" id="feedingDetails2" name="feedingDetails2">
                                </div>

                                <div class="feeding-time-item">
                                    <label for="feedingTime3">Dinner Feeding Time:</label>
                                    <input type="time" id="feedingTime3" name="feedingTime3" required>
                                    <label for="dinner">Preferred Food:</label>
                                    <input type="text" id="dinner" name="dinner">
                                    <label for="feedingDetails3">Details:</label>
                                    <input type="text" id="feedingDetails3" name="feedingDetails3">
                                </div>

                                <div class="feeding-time-item">
                                    <label for="feedingTime4">Snack Time:</label>
                                    <input type="time" id="feedingTime4" name="feedingTime4" required>
                                    <label for="snack">Preferred Food:</label>
                                    <input type="text" id="snack" name="snack">
                                    <label for="feedingDetails4">Details:</label>
                                    <input type="text" id="feedingDetails4" name="feedingDetails4">
                                </div>
                            </div><br>

                            <div class="additional-questions-container">
                                <div class="question-item">
                                    <label for="allergies">Allergies or Dietary Restrictions:</label>
                                    <textarea id="allergies" name="allergies" rows="3"
                                        placeholder="Enter any allergies or dietary restrictions here"></textarea>
                                </div>
                                <div class="question-item">
                                    <label for="specialInstructions">Special Instructions:</label>
                                    <textarea id="specialFoodInstructions" name="specialFoodInstructions" rows="3"
                                        placeholder="Enter any special instructions here"></textarea>
                                </div>
                            </div>
                        </div>


                    </div>


                    <div class="form-slide" id="napscheduleSlide">
                        <h2>Set Nap Schedule</h2>

                        <div class="nap-schedule">
                            <div class="wake-sleep-times">
                                <div class="wake-sleep-time-item">
                                    <label for="morningWakeUpTime">Morning Wake Up Time:</label>
                                    <input type="time" id="morningWakeUpTime" name="morningWakeUpTime">
                                </div>
                                <div class="wake-sleep-time-item">
                                    <label for="nightSleepingTime">Night Sleeping Time:</label>
                                    <input type="time" id="nightSleepingTime" name="nightSleepingTime">
                                </div>
                            </div>

                            <div class="nap-schedule-row">
                                <div class="nap-time-item">
                                    <label for="napTiming">Nap Time:</label>
                                    <input type="time" id="napTiming" name="napTiming">
                                    <label for="napDetails">Nap Details:</label>
                                    <input type="text" id="napDetails" name="napDetails"
                                        placeholder="Enter details">
                                </div>
                                <div class="nap-time-item">
                                    <label for="napTiming2">Nap Time:</label>
                                    <input type="time" id="napTiming2" name="napTiming2">
                                    <label for="napDetails2">Nap Details:</label>
                                    <input type="text" id="napDetails2" name="napDetails2"
                                        placeholder="Enter details">
                                </div>
                                <div class="nap-time-item">
                                    <label for="napTiming3">Nap Time:</label>
                                    <input type="time" id="napTiming3" name="napTiming3">
                                    <label for="napDetails3">Nap Details:</label>
                                    <input type="text" id="napDetails3" name="napDetails3"
                                        placeholder="Enter details">
                                </div>
                            </div>

                            <div class="preferences-row">
                                <div class="preference-item">
                                    <label for="sleepingPreferences">Sleeping Preferences:</label>
                                    <input type="text" id="sleepingPreferences" name="sleepingPreferences"
                                        placeholder="crib, bassinet, bed">
                                </div>
                                <div class="preference-item">
                                    <label for="comfortItems">Comfort Items:</label>
                                    <input type="text" id="comfortItems" name="comfortItems"
                                        placeholder="blankets, toys">
                                </div>
                                <div class="preference-item">
                                    <label for="specificRoutines">Specific Routines:</label>
                                    <input type="text" id="specificRoutines" name="specificRoutines"
                                        placeholder="rocking, singing">
                                </div>
                            </div>

                            <div class="white-noise-question">
                                <label>Does she/he sleep with white noise?</label>
                                <div class="radio-options">
                                    <input type="radio" id="whiteNoiseYes" name="whiteNoise" value="yes">
                                    <label for="whiteNoiseYes">Yes</label>
                                    <input type="radio" id="whiteNoiseNo" name="whiteNoise" value="no">
                                    <label for="whiteNoiseNo">No</label>
                                </div>
                            </div>
                        </div>
                    </div>








                    <!-- Adding Tasks Slide -->
                    <div class="form-slide" id="addingTasksSlide">
                        <h2>Activity Plan</h2>
                        <p>Add tasks for the babysitter to manage during the babysitting session.</p>
                        <div class="adding-tasks-form">
                            <div id="task-list">
                                <!-- Initial Task Items -->
                                <div class="task-item">
                                    <input type="text" id="taskDescription" name="taskDescription"
                                        placeholder="Enter activity 1" class="task-description">
                                    <input type="time" id="taskTime" name="taskTime" class="task-time">
                                </div>
                                <div class="task-item">
                                    <input type="text" id="taskDescription2" name="taskDescription2"
                                        placeholder="Enter activity 2" class="task-description">
                                    <input type="time" id="taskTime2" name="taskTime2" class="task-time">
                                </div>
                                <div class="task-item">
                                    <input type="text" id="taskDescription3" name="taskDescription3"
                                        placeholder="Enter activity 3" class="task-description">
                                    <input type="time" id="taskTime3" name="taskTime3" class="task-time">
                                </div>
                                <div class="task-item">
                                    <input type="text" id="taskDescription4" name="taskDescription4"
                                        placeholder="Enter activity 4" class="task-description">
                                    <input type="time" id="taskTime4" name="taskTime4" class="task-time">
                                </div>
                                <div class="task-item">
                                    <input type="text" id="taskDescription5" name="taskDescription5"
                                        placeholder="Enter activity 5" class="task-description">
                                    <input type="time" id="taskTime5" name="taskTime5" class="task-time">
                                </div>
                            </div>

                            <!-- Screen Time Section -->
                            <h3>Screen Time</h3>
                            <div class="screen-time">
                                <!-- First Row of Time Slots -->
                                <div class="time-slot-row">
                                    <span class="time-slot-title">Screen Time 1:</span><br>
                                    <label for="screenTimeStart1">Starting Time</label>
                                    <input type="time" id="screenTimeStart1" name="screenTimeStart1"
                                        placeholder="Start Time">
                                    <label for="screenTimeEnd1">Ending Time</label>
                                    <input type="time" id="screenTimeEnd1" name="screenTimeEnd1"
                                        placeholder="End Time">
                                </div><br>
                                <!-- Second Row of Time Slots -->
                                <div class="time-slot-row">
                                    <span class="time-slot-title">Screen Time 2:</span><br>
                                    <label for="screenTimeStart2">Starting Time</label>
                                    <input type="time" id="screenTimeStart2" name="screenTimeStart2"
                                        placeholder="Start Time">
                                    <label for="screenTimeEnd2">Ending Time</label>
                                    <input type="time" id="screenTimeEnd2" name="screenTimeEnd2"
                                        placeholder="End Time">
                                </div>
                            </div>

                            <!-- Screen Time Rules and Items in a Single Row -->
                            <div class="screen-time-questions-row">
                                <!-- Screen Time Rules -->
                                <div class="screen-time-question">
                                    <label for="screenTimeRules">Screen Time Rules (if any):</label>
                                    <textarea id="screenTimeRules" name="screen_time_rules" rows="3" cols="30"
                                        placeholder="Enter any specific rules or guidelines"></textarea>
                                </div>
                                <!-- Gap Between the Two Questions -->
                                <div class="screen-time-gap"></div>
                                <!-- Screen Time Items -->
                                <div class="screen-time-question">
                                    <label for="screenTimeItems">Screen Time Items:</label>
                                    <textarea id="screenTimeItems" name="screen_time_items" rows="3" cols="30" placeholder="iPad, laptop"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>




                    <!-- hygiene plan Slide -->
                    <div class="form-slide" id="hygienePlanSlide">
                        <h2>Bathing Schedule</h2>
                        <div class="bathing-schedule">
                            <div class="bathing-schedule-row">
                                <div class="schedule-item">
                                    <label for="bathTime1">Bath Time:</label>
                                    <input type="time" id="bathTime1" name="bath_time1">
                                    <label for="bathDetails1">Details:</label>
                                    <input type="text" id="bathDetails1" name="bath_details1"
                                        placeholder="Enter details">
                                </div>
                                <div class="schedule-item">
                                    <label for="bathTime2">Bath Time:</label>
                                    <input type="time" id="bathTime2" name="bath_time2">
                                    <label for="bathDetails2">Details:</label>
                                    <input type="text" id="bathDetails2" name="bath_details2"
                                        placeholder="Enter details">
                                </div>
                                <div class="schedule-item">
                                    <label for="bathTime3">Bath Time:</label>
                                    <input type="time" id="bathTime3" name="bath_time3">
                                    <label for="bathDetails3">Details:</label>
                                    <input type="text" id="bathDetails3" name="bath_details3"
                                        placeholder="Enter details">
                                </div>
                            </div>

                            <h3>Preferred Products</h3>
                            <div class="preferred-products">
                                <div class="product-item">
                                    <label for="shampoo">Shampoo:</label>
                                    <input type="text" id="shampoo" name="shampoo"
                                        placeholder="Enter shampoo name">
                                </div>
                                <div class="product-item">
                                    <label for="soap">Soap:</label>
                                    <input type="text" id="soap" name="soap"
                                        placeholder="Enter soap name">
                                </div>
                            </div>

                            <h2>Diaper Changing Instructions</h2>
                            <div class="diaper-changing">
                                <div class="diaper-item">
                                    <label for="frequency">Frequency:</label>
                                    <select id="frequency" name="diaper_frequency">
                                        <option value="every2hours">Every 2 hours</option>
                                        <option value="every5hours">Every 5 hours</option>
                                        <option value="wheneverPoops">Whenever she/he poops</option>
                                    </select>
                                </div>
                                <div class="diaper-item">
                                    <label for="specificProducts">Specific Products:</label>
                                    <input type="text" id="specificProducts" name="diaper_specific_products"
                                        placeholder="diaper, wet wipes">
                                </div>
                            </div>

                            <h2>Oral Hygiene</h2>
                            <div class="oral-hygiene">
                                <label>Brushing Time:</label>
                                <div class="brushing_times">
                                    <label><input type="checkbox" name="brushingTime" value="morningWakeUp"> Morning
                                        after waking up</label>
                                    <label><input type="checkbox" name="brushingTime" value="morningAfterEating">
                                        Morning after eating</label>
                                    <label><input type="checkbox" name="brushingTime" value="afternoonAfterEating">
                                        Afternoon after eating</label>
                                    <label><input type="checkbox" name="brushingTime" value="nightBeforeEating">
                                        Night before eating</label>
                                    <label><input type="checkbox" name="brushingTime" value="nightAfterEating"> Night
                                        after eating</label>
                                    <label><input type="checkbox" name="brushingTime" value="nightBeforeSleeping">
                                        Night before sleeping</label>
                                </div><br>
                                <div class="product-item">
                                    <label for="oralProducts">Any Specific Products:</label>
                                    <input type="text" id="oralProducts" name="oral_products"
                                        placeholder="toothbrush, toothpaste">
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Time Input Slide for 3-5 Years -->
                    <div class="form-slide hidden" id="timeInputSlide">
                        <h2>Behavioral Plan</h2>
                        <p>Please provide additional information regarding child care</p>
                        <div class="question-input-form">
                            <!-- First Question: Preferred Discipline Methods -->
                            <label for="disciplineMethods">Preferred Discipline Methods:</label>
                            <textarea id="disciplineMethods" name="discipline_methods" rows="2" cols="50"
                                placeholder="gentle reminders, time-outs"></textarea>

                            <!-- Second Question: Comforting Methods for Distress -->
                            <label for="comfortingMethods">Comforting Methods for Distress:</label>
                            <textarea id="comfortingMethods" name="comforting_methods" rows="2" cols="50"
                                placeholder="holding, pacifiers"></textarea>

                            <!-- Third Question: Known Triggers for Tantrums or Anxiety -->
                            <label for="triggersForTantrums">Known Triggers for Tantrums or Anxiety:</label>
                            <textarea id="triggersForTantrums" name="triggers_for_tantrums" rows="2" cols="50"
                                placeholder="Describe any known triggers"></textarea>

                            <!-- Fourth Question: Reinforcement Strategies -->
                            <label for="reinforcementStrategies">Reinforcement Strategies:</label>
                            <textarea id="reinforcementStrategies" name="reinforcement_strategies" rows="2" cols="50"
                                placeholder="positive reinforcement, reward systems"></textarea>
                        </div>
                    </div>




                </div>

                <!-- Medicine Details Slide -->
                <div class="form-slide" id="medicineSlide">
                    <h2>Medicine Details</h2>
                    <p>Enter the medicine details and timings.</p>

                    <!-- Sicknesses and Disabilities Row -->
                    <div class="sickness-disabilities-row">
                        <div class="sickness-item">
                            <label for="sickness">Any Sicknesses?</label>
                            <input type="text" id="sickness" name="sickness"
                                placeholder="Enter sickness details">
                        </div>
                        <div class="disability-item">
                            <label for="disability">Any Disabilities?</label>
                            <input type="text" id="disability" name="disability"
                                placeholder="Enter disability details">
                        </div>
                    </div>

                    <!-- Medicine Row -->
                    <div class="medicine-row">
                        <!-- Medicine Section 1 -->
                        <div class="medicine-details-form">
                            <input type="text" id="medicineName1" name="medicine_name1"
                                placeholder="Medicine Name">
                            <input type="text" id="dosage1" name="dosage1" placeholder="Dosage">
                            <input type="time" id="medicineTime1" name="medicine_time1"
                                placeholder="Time to Give Medicine">
                        </div>

                        <!-- Medicine Section 2 -->
                        <div class="medicine-details-form">
                            <input type="text" id="medicineName2" name="medicine_name2"
                                placeholder="Medicine Name">
                            <input type="text" id="dosage2" name="dosage2" placeholder="Dosage">
                            <input type="time" id="medicineTime2" name="medicine_time2"
                                placeholder="Time to Give Medicine">
                        </div>

                        <!-- Medicine Section 3 -->
                        <div class="medicine-details-form">
                            <input type="text" id="medicineName3" name="medicine_name3"
                                placeholder="Medicine Name">
                            <input type="text" id="dosage3" name="dosage3" placeholder="Dosage">
                            <input type="time" id="medicineTime3" name="medicine_time3"
                                placeholder="Time to Give Medicine">
                        </div>
                    </div>

                    <!-- Emergency Contacts Section -->
                    <h3>Emergency Contacts</h3>
                    <div class="emergency-contacts-row">
                        <div class="emergency-contact">
                            <input type="text" id="contactName1" name="emergency_contact_name1"
                                placeholder="Contact Name 1">
                            <input type="text" id="contactNumber1" name="emergency_contact_number1"
                                placeholder="Contact Number 1">
                        </div>
                        <div class="emergency-contact">
                            <input type="text" id="contactName2" name="emergency_contact_name2"
                                placeholder="Contact Name 2">
                            <input type="text" id="contactNumber2" name="emergency_contact_number2"
                                placeholder="Contact Number 2">
                        </div>
                    </div>

                    <br><br>
                    <button type="submit" class="confirm-button"
                        onclick="document.getElementById('confirmBookingForm').submit()" id="confirmButton">Confirm
                        Booking</button>
                </div>



                <!-- Booking Confirmation Slide -->
            </div>
        </form>

        <!-- Navigation Buttons -->
        <div class="navigation-buttons">
            <button id="prevButton" onclick="prevSlide()" disabled>Previous</button>
            <button id="nextButton" onclick="nextSlide()">Next</button>
        </div>
    </div>


    <br><br><br><br>

    <script>
        // JavaScript for Sliding Functionality

        let currentSlide = 0;
        let selectedAgeGroup = '';

        const slides = document.querySelectorAll('.form-slide');
        const nextButton = document.getElementById('nextButton');
        const prevButton = document.getElementById('prevButton');

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.style.display = i === index ? 'block' : 'none';
            });
            prevButton.disabled = index === 0;
            nextButton.disabled = index === slides.length - 1;
        }

        async function validateSlide() {
            switch (currentSlide) {
                case 0:
                    if (!selectedAgeGroup) {
                        alert('Please select an age group');
                        return false;
                    }
                    break;
                case 1:
                    const bookingDate = document.getElementById('bookingDate').value;
                    if (!bookingDate) {
                        alert('Please select the booking date');
                        return false;
                    }
                    if (new Date(bookingDate) < new Date()) {
                        alert('The selected date cannot be in the past');
                        return false;
                    }

                    const isBooked = await checkDateAvailability(bookingDate);
                    if (isBooked) {
                        alert('Date already booked');
                        return false;
                    }
                    break;
                case 2:
                    const childName = document.querySelector('input[placeholder="Child\'s Name"]').value;
                    const age = document.querySelector('input[placeholder="Age"]').value;

                    if (!childName || !age) {
                        alert('Please enter the child\'s name and age');
                        return false;
                    }

                    // Validate child's name (should only contain letters and spaces)
                    if (!/^[a-zA-Z\s]+$/.test(childName)) {
                        alert('Child\'s name can only contain letters and spaces');
                        return false;
                    }

                    // Validate age (should be a number and positive)
                    if (!/^\d+$/.test(age) || parseInt(age) <= 0) {
                        alert('Age must be a positive number');
                        return false;
                    }
                    break;
                    // Add additional validation for other slides if needed
                default:
                    break;
            }
            return true;
        }

        async function checkDateAvailability(date) {
            try {
                const response = await fetch('/check-booking', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content')
                    },
                    body: JSON.stringify({
                        date
                    })
                });
                const result = await response.json();
                return result.isBooked;
            } catch (error) {
                console.error('Error checking date availability:', error);
                return false;
            }
        }

        async function nextSlide() {
            if (!await validateSlide()) {
                return;
            }

            // Skip the schedule slide for age group 6-12
            if (selectedAgeGroup === '6-12' && currentSlide === 3) {
                currentSlide = 5; // Skip to the tasks slide directly
            } else {
                currentSlide++;
            }
            showSlide(currentSlide);
        }

        function prevSlide() {
            // Handle navigation for skipped slides
            if (currentSlide === 5 && selectedAgeGroup === '6-12') {
                currentSlide = 3; // Move back to the schedule slide if it was skipped
            } else {
                currentSlide--;
            }
            showSlide(currentSlide);
        }

        function selectAgeGroup(ageGroup) {
            selectedAgeGroup = ageGroup;
            // Highlight selected age group visually
            document.querySelectorAll('.age-group-box').forEach(box => box.classList.remove('selected'));
            document.querySelector(`.age-group-box[onclick="selectAgeGroup('${ageGroup}')"]`).classList.add('selected');
            showSlide(1);
        }

        // Function to open the feeding modal
        function openFeedingModal() {
            document.getElementById('feedingModal').style.display = 'flex';
        }

        // Function to close the feeding modal
        function closeFeedingModal() {
            document.getElementById('feedingModal').style.display = 'none';
        }

        // Function to handle the submission of the feeding schedule
        function submitFeedingSchedule() {
            const feedingForm = document.getElementById('feedingForm');
            // You can handle form submission here, e.g., via AJAX
            console.log('Feeding Schedule:', new FormData(feedingForm));
            closeFeedingModal(); // Close the modal after submission
        }

        // Ensure that clicking outside the modal content closes the modal
        window.onclick = function(event) {
            if (event.target == document.getElementById('feedingModal')) {
                closeFeedingModal();
            }
            if (event.target == document.getElementById('review-form-modal')) {
                hideReviewForm();
            }
        };

        function openNapModal() {
            document.getElementById('napModal').style.display = 'flex';
        }

        function closeNapModal() {
            document.getElementById('napModal').style.display = 'none';
        }

        function saveFeedingSchedule() {
            document.getElementById('feedingTimeInput').value = document.getElementById('feedingTime').value;
            document.getElementById('feedingDetailsInput').value = document.getElementById('feedingDetails').value;
            document.getElementById('feedingScheduleForm').submit();
        }

        function saveNapSchedule() {
            document.getElementById('napTimingInput').value = document.getElementById('napTiming').value;
            document.getElementById('napDetailsInput').value = document.getElementById('napDetails').value;
            document.getElementById('napScheduleForm').submit();
        }

        function addTask() {
            const taskList = document.getElementById('task-list');
            const taskItem = document.createElement('div');
            taskItem.className = 'task-item';
            taskItem.innerHTML = `
                <input type="text" placeholder="Enter Task Description" class="task-description">
                <input type="time" class="task-time">
            `;
            taskList.appendChild(taskItem);
        }

        function confirmBooking() {
            document.getElementById('confirmBookingForm').submit();
        }

        // Function to show the review form modal
        function showReviewForm() {
            document.getElementById('review-form-modal').style.display = 'flex';
        }

        // Function to hide the review form modal
        function hideReviewForm() {
            document.getElementById('review-form-modal').style.display = 'none';
        }

        // Initialize by showing the first slide
        showSlide(currentSlide);
    </script>






</body>

</html>
