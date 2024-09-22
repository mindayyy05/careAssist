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
            .contains('Booking Psychiatrists')
            .click();

        // Ensure navigation to Babysitters page
        cy.url().should('eq', 'http://localhost:8000/mental-home');
    });




    describe('Agency Card More Info Button', () => {
        beforeEach(() => {
            // Log in and visit the page containing the agency card
            cy.visit('http://localhost:8000/login');
            cy.get('input[name="email"]').type('thinara@gmail.com');
            cy.get('input[name="password"]').type('thinara12345');
            cy.get('button[type="submit"]').click();
            cy.url().should('eq', 'http://localhost:8000/dashboard');
            cy.visit('http://localhost:8000/mental-home'); // Update this to the page where the agency card is located
        });
    
        it('should redirect to /agency-page when pressing the More Info button on the agency card', () => {
            // Ensure the page has fully loaded and elements are visible
            cy.get('.agency-card').should('be.visible');
    
            // Locate the More Info button by its ID and click it
            cy.get('#more-info-button').should('be.visible').click();
    
            // Verify that the redirection happens
            cy.url().should('eq', 'http://localhost:8000/agency-page');
        });
    });
    
    describe('Therapist Card Schedule Appointment Button', () => {
        beforeEach(() => {
            // Log in and visit the page containing the therapist card
            cy.visit('http://localhost:8000/login');
            cy.get('input[name="email"]').type('thinara@gmail.com');
            cy.get('input[name="password"]').type('thinara12345');
            cy.get('button[type="submit"]').click();
            cy.url().should('eq', 'http://localhost:8000/dashboard');
            cy.visit('http://localhost:8000/agency-page'); // Update this to the page where the therapist card is located
        });
    
        it('should redirect to /therapist-profile when pressing the Schedule an appointment button on the therapist card', () => {
            // Ensure the page has fully loaded and elements are visible
            cy.get('.doctor-card').should('be.visible');
    
            // Locate the Schedule an appointment button by its ID and click it
            cy.get('#schedule-appointment-button').should('be.visible').click();
    
            // Verify that the redirection happens
            cy.url().should('eq', 'http://localhost:8000/therapist-profile');
        });
    });
    
    describe('Therapist Profile Booking Form', () => {
        beforeEach(() => {
            // Visit the login page
            cy.visit('http://localhost:8000/login');
    
            // Log in with the provided credentials
            cy.get('input[name="email"]').type('thinara@gmail.com');
            cy.get('input[name="password"]').type('thinara12345');
            cy.get('button[type="submit"]').click();
            
            // Wait for login to complete and redirect to the dashboard
            cy.url().should('eq', 'http://localhost:8000/dashboard');
    
            // Navigate to the therapist profile page
            cy.visit('http://localhost:8000/therapist-profile');
        });
    
        it('should display the booking form when the "Book now" button is clicked', () => {
            // Ensure the "Book now" button is visible and click it
            cy.get('#book-now-button').should('be.visible').click();
    
            // Verify that the booking form appears
            cy.get('#appointment-popup').should('be.visible');
        });
    });
    
    describe('Appointment Booking Form Validation', () => {
        beforeEach(() => {
            // Visit the page containing the appointment booking form
            cy.visit('http://localhost:8000/therapist-profile'); // Replace with your actual page URL
        });
    
        it('should display error message when already booked slot is been booked', () => {

            cy.get('#book-now-button').click();
            // Fill in the 'Name' input
            cy.get('#user-name').type('Kevin Keith');
    
            // Fill in the 'Age' input
            cy.get('#user-age').type('30');
    
            // Select the 'Gender' from dropdown
            cy.get('#user-gender').select('Male');
    
            // Select a date on the calendar (assuming July 23 is visible)
            cy.get('#calendar div').contains('23').click();
    
            // Select a time slot
            cy.get('#time-slots div').contains('11:00 - 12:00').click();
    
            // Fill in the 'Why do you think you need therapy?' textarea
            cy.get('#therapy-reason').type('stress');
    
            // Click the 'Book Appointment' button
            cy.get('#confirm-booking').click();
    
            // Verify that the confirmation popup appears
            cy.get('#error-message') // Replace with the actual selector for the error message container
            .should('be.visible')
            .and('contain', 'Slot already booked');
        });

        it('should display error message when some fields are not filled ', () => {

            cy.get('#book-now-button').click();
            // Fill in the 'Name' input
            //cy.get('#user-name').type('Kevin Keith');
    
            // Fill in the 'Age' input
            cy.get('#user-age').type('30');
    
            // Select the 'Gender' from dropdown
            cy.get('#user-gender').select('Male');
    
            // Select a date on the calendar (assuming July 23 is visible)
            cy.get('#calendar div').contains('23').click();
    
            // Select a time slot
            cy.get('#time-slots div').contains('16:00 - 17:00').click();
    
            // Fill in the 'Why do you think you need therapy?' textarea
            cy.get('#therapy-reason').type('stress');
    
            // Click the 'Book Appointment' button
            cy.get('#confirm-booking').click();
    
            // Verify that the confirmation popup appears
            cy.get('#error-message') // Replace with the actual selector for the error message container
            .should('be.visible')
            .and('contain', 'An error occurred! Please add valid inputs to the form fields and try again.');
        });

        it('should display error message when invalid inputs ', () => {

            cy.get('#book-now-button').click();
            // Fill in the 'Name' input
            cy.get('#user-name').type('56');
    
            // Fill in the 'Age' input
            cy.get('#user-age').type('30');
    
            // Select the 'Gender' from dropdown
            cy.get('#user-gender').select('Male');
    
            // Select a date on the calendar (assuming July 23 is visible)
            cy.get('#calendar div').contains('23').click();
    
            // Select a time slot
            cy.get('#time-slots div').contains('16:00 - 17:00').click();
    
            // Fill in the 'Why do you think you need therapy?' textarea
            cy.get('#therapy-reason').type('stress');
    
            // Click the 'Book Appointment' button
            cy.get('#confirm-booking').click();
    
            // Verify that the confirmation popup appears
            cy.get('#error-message') // Replace with the actual selector for the error message container
            .should('be.visible')
            .and('contain', 'An error occurred! Please add valid inputs to the form fields and try again.');
        });

        it('should display error message when date or time isnt picked ', () => {

            cy.get('#book-now-button').click();
            // Fill in the 'Name' input
            cy.get('#user-name').type('name');
    
            // Fill in the 'Age' input
            cy.get('#user-age').type('30');
    
            // Select the 'Gender' from dropdown
            cy.get('#user-gender').select('Male');
    
            // Select a date on the calendar (assuming July 23 is visible)
            //cy.get('#calendar div').contains('23').click();
    
            // Select a time slot
            //cy.get('#time-slots div').contains('16:00 - 17:00').click();
    
            // Fill in the 'Why do you think you need therapy?' textarea
            cy.get('#therapy-reason').type('stress');
    
            // Click the 'Book Appointment' button
            cy.get('#confirm-booking').click();
    
            // Verify that the confirmation popup appears
            cy.get('#error-message') // Replace with the actual selector for the error message container
            .should('be.visible')
            .and('contain', 'Please select a date and time slot.');
        });
    });

    describe('User Dashboard', () => {
        beforeEach(() => {
          // Visit the therapist profile page (replace with the correct URL)
          cy.visit('http://localhost:8000/userdashboard'); 
        });
      
        
      });
      
    });

    


    
    

