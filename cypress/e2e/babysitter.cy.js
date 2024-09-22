describe('Babysitters Page Navigation', () => {
    beforeEach(() => {
        // Visit the login page
        cy.visit('http://localhost:8000/login');

        // Log in with the provided credentials
        cy.get('input[name="email"]').type('thinara@gmail.com');
        cy.get('input[name="password"]').type('thinara12345');
        cy.get('button[type="submit"]').click();
        
        // Wait for login to complete and redirect to home page
        cy.url().should('eq', 'http://localhost:8000/dashboard');
    });

    it('should direct to the Babysitters page after pressing the Hiring Babysitters card', () => {
        // Click the Hiring Babysitters card
        cy.get('.our-services-container .cards .card')
            .contains('Hiring Babysitters')
            .click();

        // Ensure navigation to Babysitters page
        cy.url().should('eq', 'http://localhost:8000/babysitters');
    });

    it('should direct to the Bagency page after pressing More Information button in Babysitters page', () => {
        // Navigate to the Babysitters page
        cy.visit('http://localhost:8000/babysitters');

        // Ensure that the page is loaded properly
        cy.url().should('eq', 'http://localhost:8000/babysitters');

        // Click the More Information button
        cy.get('.agency-card')
            .contains('More Information')
            .click();

        // Verify that it redirects to the Bagency page
        cy.url().should('eq', 'http://localhost:8000/bagency');
    });

    it('should direct to the Babysitter Profile page after pressing Book Now button in Bagency page', () => {
        // Navigate to the Bagency page
        cy.visit('http://localhost:8000/bagency');

        // Ensure that the page is loaded properly
        cy.url().should('eq', 'http://localhost:8000/bagency');

        // Click the Book Now button
        cy.get('.babysitter-card')
            .contains('Book Now')
            .click();

        // Verify that it redirects to the Babysitter Profile page
        cy.url().should('eq', 'http://localhost:8000/babysitterprofile');
    });

    it('should direct to the Message View page after pressing Message Babysitter button', () => {
        // Navigate to the Babysitter Profile page
        cy.visit('http://localhost:8000/babysitterprofile');

        // Ensure that the page is loaded properly
        cy.url().should('eq', 'http://localhost:8000/babysitterprofile');

        // Click the Message Babysitter button
        cy.get('a.btn-message')
            .contains('Message Babysitter')
            .click();

        // Verify that it redirects to the Message View page
        cy.url().should('eq', 'http://localhost:8000/message/view');
    });

    it('should display the review form modal when clicking the + Add Review button', () => {
        // Navigate to the Babysitter Profile page
        cy.visit('http://localhost:8000/babysitterprofile');

        // Ensure that the page is loaded properly
        cy.url().should('eq', 'http://localhost:8000/babysitterprofile');

        // Click the + Add Review button
        cy.get('.review-box.add-review')
            .contains('+ Add Review')
            .click();

        // Verify that the review form modal is displayed
        cy.get('#review-form-modal').should('be.visible');
    });

    it('should add a review, close the modal, and display the new review', () => {
        // Navigate to the Babysitter Profile page
        cy.visit('http://localhost:8000/babysitterprofile');

        // Click the + Add Review button
        cy.get('.review-box.add-review')
            .click();

        // Fill in the review form
        cy.get('#review-form-modal input[name="name"]').type('John Doe');
        cy.get('#review-form-modal textarea[name="review"]').type('Great babysitter, very professional!');

        // Submit the review form
        cy.get('#review-form-modal button[type="submit"]').click();

        

        // Verify that the page redirects back to the babysitter profile
        cy.url().should('eq', 'http://localhost:8000/babysitterprofile');

        // Verify that the newly added review is displayed in the reviews container
        cy.get('.reviews-container').within(() => {
            cy.contains('John Doe').should('be.visible');
            cy.contains('Great babysitter, very professional!').should('be.visible');
        });
    });

    it('should display the Booking Date and Time slide after selecting an age group and clicking Next', () => {
        // Navigate to the Babysitter Profile page
        cy.visit('http://localhost:8000/babysitterprofile');

        // Ensure that the page is loaded properly
        cy.url().should('eq', 'http://localhost:8000/babysitterprofile');

        // Select an age group by clicking on it
        cy.get('.age-group-box').contains('0-2 years').click();

        // Click the "Next" button to proceed to the next slide
        cy.get('#nextButton').click();

        // Verify that the date and time selection slide is displayed
        cy.get('#slide5').should('be.visible');
        cy.get('#bookingDate').should('exist');
        cy.get('#bookingTime').should('exist');
    });

    it('should display the Child Details slide after selecting date and time and clicking Next', () => {
        // Navigate to the Babysitter Profile page
        cy.visit('http://localhost:8000/babysitterprofile');

        // Ensure that the page is loaded properly
        cy.url().should('eq', 'http://localhost:8000/babysitterprofile');

        // Select an age group by clicking on it
        cy.get('.age-group-box').contains('0-2 years').click();

        // Click the "Next" button to proceed to the date and time selection slide
        cy.get('#nextButton').click();

        // Ensure the date and time slide is visible
        cy.get('#slide5').should('be.visible');

        // Pick a date and time
        cy.get('#bookingDate').type('2024-09-15');
        cy.get('#bookingTime').type('14:00');

        // Click the "Next" button to proceed to the next slide
        cy.get('#nextButton').click();

        // Verify that the child details slide is displayed
        cy.get('#childDetailsSlide').should('be.visible');
        cy.get('#childName').should('exist');
        cy.get('#childAge').should('exist');
        cy.get('#gender').should('exist');
        cy.get('#houseAddress').should('exist');
    });

    it('should display the Feeding Schedule slide after filling in the child details and clicking Next', () => {
        // Navigate to the Babysitter Profile page
        cy.visit('http://localhost:8000/babysitterprofile');

        // Ensure that the page is loaded properly
        cy.url().should('eq', 'http://localhost:8000/babysitterprofile');

        // Select an age group by clicking on it
        cy.get('.age-group-box').contains('0-2 years').click();

        // Click the "Next" button to proceed to the date and time selection slide
        cy.get('#nextButton').click();

        // Ensure the date and time slide is visible
        cy.get('#slide5').should('be.visible');

        // Pick a date and time
        cy.get('#bookingDate').type('2024-09-15');
        cy.get('#bookingTime').type('14:00');

        // Click the "Next" button to proceed to the child details slide
        cy.get('#nextButton').click();

        // Ensure the child details slide is visible
        cy.get('#childDetailsSlide').should('be.visible');

        // Fill in the child details
        cy.get('#childName').type('John');
        cy.get('#childAge').type('3');
        cy.get('#gender').select('Male');
        cy.get('#houseAddress').type('123 Main Street');

        // Click the "Next" button to proceed to the feeding schedule slide
        cy.get('#nextButton').click();

        // Verify that the feeding schedule slide is displayed
        cy.get('#scheduleSlide').should('be.visible');
        cy.get('#feedingTime').should('exist');
        cy.get('#feedingTime2').should('exist');
        cy.get('#feedingTime3').should('exist');
        cy.get('#feedingTime4').should('exist');
    });

    it('should display the Nap Schedule slide after filling in the feeding schedule and clicking Next', () => {
        // Navigate to the Babysitter Profile page
        cy.visit('http://localhost:8000/babysitterprofile');

        // Ensure that the page is loaded properly
        cy.url().should('eq', 'http://localhost:8000/babysitterprofile');

        // Select an age group by clicking on it
        cy.get('.age-group-box').contains('0-2 years').click();

        // Click the "Next" button to proceed to the date and time selection slide
        cy.get('#nextButton').click();

        // Ensure the date and time slide is visible
        cy.get('#slide5').should('be.visible');

        // Pick a date and time
        cy.get('#bookingDate').type('2024-09-15');
        cy.get('#bookingTime').type('14:00');

        // Click the "Next" button to proceed to the child details slide
        cy.get('#nextButton').click();

        // Ensure the child details slide is visible
        cy.get('#childDetailsSlide').should('be.visible');

        // Fill in the child details
        cy.get('#childName').type('John');
        cy.get('#childAge').type('3');
        cy.get('#gender').select('Male');
        cy.get('#houseAddress').type('123 Main Street');

        // Click the "Next" button to proceed to the feeding schedule slide
        cy.get('#nextButton').click();

        // Ensure the feeding schedule slide is visible
        cy.get('#scheduleSlide').should('be.visible');

        // Fill in the feeding schedule details
        cy.get('#feedingTime').type('08:00');
        cy.get('#feedingTime2').type('12:00');
        cy.get('#feedingTime3').type('16:00');
        cy.get('#feedingTime4').type('20:00');

        // Click the "Next" button to proceed to the nap schedule slide
        cy.get('#nextButton').click();

        // Verify that the nap schedule slide is displayed
        cy.get('#napscheduleSlide').should('be.visible');
        cy.get('#morningWakeUpTime').should('exist');
        cy.get('#nightSleepingTime').should('exist');
        cy.get('#napTiming').should('exist');
    });

    it('should display the Activity slide after filling in the nap schedule and clicking Next', () => {
         // Navigate to the Babysitter Profile page
         cy.visit('http://localhost:8000/babysitterprofile');

         // Ensure that the page is loaded properly
         cy.url().should('eq', 'http://localhost:8000/babysitterprofile');
 
         // Select an age group by clicking on it
         cy.get('.age-group-box').contains('0-2 years').click();
 
         // Click the "Next" button to proceed to the date and time selection slide
         cy.get('#nextButton').click();
 
         // Ensure the date and time slide is visible
         cy.get('#slide5').should('be.visible');
 
         // Pick a date and time
         cy.get('#bookingDate').type('2024-09-15');
         cy.get('#bookingTime').type('14:00');
 
         // Click the "Next" button to proceed to the child details slide
         cy.get('#nextButton').click();
 
         // Ensure the child details slide is visible
         cy.get('#childDetailsSlide').should('be.visible');
 
         // Fill in the child details
         cy.get('#childName').type('John');
         cy.get('#childAge').type('3');
         cy.get('#gender').select('Male');
         cy.get('#houseAddress').type('123 Main Street');
 
         // Click the "Next" button to proceed to the feeding schedule slide
         cy.get('#nextButton').click();
 
         // Ensure the feeding schedule slide is visible
         cy.get('#scheduleSlide').should('be.visible');
 
         // Fill in the feeding schedule details
         cy.get('#feedingTime').type('08:00');
         cy.get('#feedingTime2').type('12:00');
         cy.get('#feedingTime3').type('16:00');
         cy.get('#feedingTime4').type('20:00');
 
         // Click the "Next" button to proceed to the nap schedule slide
         cy.get('#nextButton').click();
 
         // Verify that the nap schedule slide is displayed
         cy.get('#napscheduleSlide').should('be.visible');
         cy.get('#morningWakeUpTime').should('exist');
         cy.get('#nightSleepingTime').should('exist');
         cy.get('#napTiming').should('exist');

        // Click the "Next" button to proceed to the Activity Plan slide
        cy.get('#nextButton').click();

        // Verify that the Activity Plan slide is displayed
        cy.get('#addingTasksSlide').should('be.visible');
        cy.get('#taskDescription').should('exist');
        cy.get('#taskTime').should('exist');
    });



    it('should display the bathing schedule slide after filling in the activity schedule and clicking Next', () => {
        // Navigate to the Babysitter Profile page
        cy.visit('http://localhost:8000/babysitterprofile');

        // Ensure that the page is loaded properly
        cy.url().should('eq', 'http://localhost:8000/babysitterprofile');

        // Select an age group by clicking on it
        cy.get('.age-group-box').contains('0-2 years').click();

        // Click the "Next" button to proceed to the date and time selection slide
        cy.get('#nextButton').click();

        // Ensure the date and time slide is visible
        cy.get('#slide5').should('be.visible');

        // Pick a date and time
        cy.get('#bookingDate').type('2024-09-15');
        cy.get('#bookingTime').type('14:00');

        // Click the "Next" button to proceed to the child details slide
        cy.get('#nextButton').click();

        // Ensure the child details slide is visible
        cy.get('#childDetailsSlide').should('be.visible');

        // Fill in the child details
        cy.get('#childName').type('John');
        cy.get('#childAge').type('3');
        cy.get('#gender').select('Male');
        cy.get('#houseAddress').type('123 Main Street');

        // Click the "Next" button to proceed to the feeding schedule slide
        cy.get('#nextButton').click();

        // Ensure the feeding schedule slide is visible
        cy.get('#scheduleSlide').should('be.visible');

        // Fill in the feeding schedule details
        cy.get('#feedingTime').type('08:00');
        cy.get('#feedingTime2').type('12:00');
        cy.get('#feedingTime3').type('16:00');
        cy.get('#feedingTime4').type('20:00');

        // Click the "Next" button to proceed to the nap schedule slide
        cy.get('#nextButton').click();

        // Verify that the nap schedule slide is displayed
        cy.get('#napscheduleSlide').should('be.visible');
        cy.get('#morningWakeUpTime').should('exist');
        cy.get('#nightSleepingTime').should('exist');
        cy.get('#napTiming').should('exist');

       // Click the "Next" button to proceed to the Activity Plan slide
       cy.get('#nextButton').click();

       // Verify that the Activity Plan slide is displayed
       cy.get('#addingTasksSlide').should('be.visible');
       cy.get('#taskDescription').should('exist');
       cy.get('#taskTime').should('exist');

       cy.get('#nextButton').click();

       cy.get('#hygienePlanSlide').should('be.visible');
       
   });


it('should display the medicine plan slide after filling in the behavioral plan and clicking Next', () => {
    // Navigate to the Babysitter Profile page
    cy.visit('http://localhost:8000/babysitterprofile');

    // Ensure that the page is loaded properly
    cy.url().should('eq', 'http://localhost:8000/babysitterprofile');

    // Select an age group by clicking on it
    cy.get('.age-group-box').contains('0-2 years').click();

    // Click the "Next" button to proceed to the date and time selection slide
    cy.get('#nextButton').click();

    // Ensure the date and time slide is visible
    cy.get('#slide5').should('be.visible');

    // Pick a date and time
    cy.get('#bookingDate').type('2024-09-15');
    cy.get('#bookingTime').type('14:00');

    // Click the "Next" button to proceed to the child details slide
    cy.get('#nextButton').click();

    // Ensure the child details slide is visible
    cy.get('#childDetailsSlide').should('be.visible');

    // Fill in the child details
    cy.get('#childName').type('John');
    cy.get('#childAge').type('3');
    cy.get('#gender').select('Male');
    cy.get('#houseAddress').type('123 Main Street');

    // Click the "Next" button to proceed to the feeding schedule slide
    cy.get('#nextButton').click();

    // Ensure the feeding schedule slide is visible
    cy.get('#scheduleSlide').should('be.visible');

    // Fill in the feeding schedule details
    cy.get('#feedingTime').type('08:00');
    cy.get('#feedingTime2').type('12:00');
    cy.get('#feedingTime3').type('16:00');
    cy.get('#feedingTime4').type('20:00');

    // Click the "Next" button to proceed to the nap schedule slide
    cy.get('#nextButton').click();

    // Verify that the nap schedule slide is displayed
    cy.get('#napscheduleSlide').should('be.visible');
    cy.get('#morningWakeUpTime').should('exist');
    cy.get('#nightSleepingTime').should('exist');
    cy.get('#napTiming').should('exist');

   // Click the "Next" button to proceed to the Activity Plan slide
   cy.get('#nextButton').click();

   // Verify that the Activity Plan slide is displayed
   cy.get('#addingTasksSlide').should('be.visible');
   cy.get('#taskDescription').should('exist');
   cy.get('#taskTime').should('exist');

   cy.get('#nextButton').click();

   cy.get('#hygienePlanSlide').should('be.visible');

   cy.get('#nextButton').click();

   cy.get('#timeInputSlide').should('be.visible');

   cy.get('#nextButton').click();

   cy.get('#medicineSlide').should('be.visible');
   
});


it('successfully booking the babysitter after inputting the medicine slide details which is the last slide ', () => {
    // Navigate to the Babysitter Profile page
    cy.visit('http://localhost:8000/babysitterprofile');

    // Ensure that the page is loaded properly
    cy.url().should('eq', 'http://localhost:8000/babysitterprofile');

    // Select an age group by clicking on it
    cy.get('.age-group-box').contains('0-2 years').click();

    // Click the "Next" button to proceed to the date and time selection slide
    cy.get('#nextButton').click();

    // Ensure the date and time slide is visible
    cy.get('#slide5').should('be.visible');

    // Pick a date and time
    cy.get('#bookingDate').type('2024-09-15');
    cy.get('#bookingTime').type('14:00');

    // Click the "Next" button to proceed to the child details slide
    cy.get('#nextButton').click();

    // Ensure the child details slide is visible
    cy.get('#childDetailsSlide').should('be.visible');

    // Fill in the child details
    cy.get('#childName').type('John');
    cy.get('#childAge').type('3');
    cy.get('#gender').select('Male');
    cy.get('#houseAddress').type('123 Main Street');

    // Click the "Next" button to proceed to the feeding schedule slide
    cy.get('#nextButton').click();

    // Ensure the feeding schedule slide is visible
    cy.get('#scheduleSlide').should('be.visible');

    // Fill in the feeding schedule details
    cy.get('#feedingTime').type('08:00');
    cy.get('#feedingTime2').type('12:00');
    cy.get('#feedingTime3').type('16:00');
    cy.get('#feedingTime4').type('20:00');

    // Click the "Next" button to proceed to the nap schedule slide
    cy.get('#nextButton').click();

    // Verify that the nap schedule slide is displayed
    cy.get('#napscheduleSlide').should('be.visible');
    cy.get('#morningWakeUpTime').should('exist');
    cy.get('#nightSleepingTime').should('exist');
    cy.get('#napTiming').should('exist');

   // Click the "Next" button to proceed to the Activity Plan slide
   cy.get('#nextButton').click();

   // Verify that the Activity Plan slide is displayed
   cy.get('#addingTasksSlide').should('be.visible');
   cy.get('#taskDescription').should('exist');
   cy.get('#taskTime').should('exist');

   cy.get('#nextButton').click();

   cy.get('#hygienePlanSlide').should('be.visible');

   cy.get('#nextButton').click();

   cy.get('#timeInputSlide').should('be.visible');

   cy.get('#nextButton').click();

   cy.get('#medicineSlide').should('be.visible');

   cy.get('.confirm-button').click();
   
});


it('not letting user move to the next slide when a date thats already booked is input along with an error message', () => {
    // Navigate to the Babysitter Profile page
    cy.visit('http://localhost:8000/babysitterprofile');

    // Ensure that the page is loaded properly
    cy.url().should('eq', 'http://localhost:8000/babysitterprofile');

    // Select an age group by clicking on it
    cy.get('.age-group-box').contains('0-2 years').click();

    // Click the "Next" button to proceed to the date and time selection slide
    cy.get('#nextButton').click();

    // Ensure the date and time slide is visible
    cy.get('#slide5').should('be.visible');

    // Pick a date and time
    cy.get('#bookingDate').type('2024-09-27');
    cy.get('#bookingTime').type('14:00');

    // Click the "Next" button to proceed to the child details slide
    cy.get('#nextButton').click();

    

    
   
});

    
});
