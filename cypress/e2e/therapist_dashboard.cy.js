Cypress.on('uncaught:exception', (err, runnable) => {
    return false;
  });
  describe('Therapist Dashboard', () => {
    beforeEach(() => {
      // Visit the "Who Are You" page before each test
      cy.visit('http://localhost:8000/who-are-you');
    });
  
    it('should redirect to the babysitter login page when "Babysitter Agency" is selected and "Sign Up" is clicked', () => {
      // Step 1: Click on the "Service Providing Agency" button to show the options
      cy.contains('Service Providing Agency').click();
  
      // Step 2: Select "Babysitter Agency" from the dropdown
      cy.get('#agency-type').select('therapist');
  
      // Step 3: Click on the "Sign Up" button
      cy.get('button').contains('Sign Up').click();
  
      // Step 4: Verify that the user is redirected to the babysitter login page
      cy.url().should('include', 'http://localhost:8000/provider-login');
    });

    it('should log in with correct credentials and redirect to the therapist dashboard', () => {
        // Visit the Babysitter Login page directly
        cy.visit('http://localhost:8000/provider-login');
    
        // Step 1: Fill in the login form with correct credentials
        cy.get('#email').type('eli@gmail.com');
        cy.get('#password').type('eli12345');
    
        // Step 2: Click the "Login" button
        cy.get('button').contains('Login').click();
    
        // Step 3: Verify that the user is redirected to the babysitter dashboard
        cy.url().should('include', 'http://localhost:8000/provider-dashboard');
      });

      it('validations when not filling certain fields', () => {
        // Visit the Babysitter Login page directly
        cy.visit('http://localhost:8000/provider-login');
    
        // Step 1: Fill in the login form with correct credentials
        cy.get('#email').type('eli@gmail.com');
        //cy.get('#password').type('eli12345');
    
        // Step 2: Click the "Login" button
        cy.get('button').contains('Login').click();
    
        // Step 3: Verify that the user is redirected to the babysitter dashboard
        cy.url().should('include', 'http://localhost:8000/provider-login');
      });


      it('validations when invalid format is given for email', () => {
        // Visit the Babysitter Login page directly
        cy.visit('http://localhost:8000/provider-login');
    
        // Step 1: Fill in the login form with correct credentials
        cy.get('#email').type('eli');
        //cy.get('#password').type('eli12345');
    
        // Step 2: Click the "Login" button
        cy.get('button').contains('Login').click();
    
        // Step 3: Verify that the user is redirected to the babysitter dashboard
        cy.url().should('include', 'http://localhost:8000/provider-login');
      });


      describe('Appointment Card Pop-up', () => {
        beforeEach(() => {
            // Visit the therapist dashboard page where appointments are listed
            cy.visit('http://localhost:8000/provider-dashboard');
        });
    
        it('should display the pop-up with correct appointment details when a card is clicked', () => {
            // Step 1: Click on the first appointment card
            cy.get('.cards .card').first().click();
    
            // Step 2: Verify that the pop-up is displayed
            cy.get('.popup').should('be.visible');
    
            // Step 3: Verify the details in the pop-up match the data attributes from the card
            cy.get('.cards .card').first().then(($card) => {
                const patientName = $card.data('patient');
                const patientAge = $card.data('age');
                const patientGender = $card.data('gender');
                const bookingDate = $card.data('date');
                const bookingTime = $card.data('time');
                const bookingReason = $card.data('reason');
    
                // Check that the pop-up contains the correct details
                cy.get('#patientName').should('have.text', patientName);
                cy.get('#patientAge').should('have.text', patientAge);
                cy.get('#patientGender').should('have.text', patientGender);
                cy.get('#bookingDate').should('have.text', bookingDate);
                cy.get('#bookingTime').should('have.text', bookingTime);
                cy.get('#bookingReason').should('have.text', bookingReason);
            });
    
           
        });

        it('should close the pop up card when pressing close icon', () => {
            // Step 1: Click on the first appointment card
            cy.get('.cards .card').first().click();
    
            // Step 2: Verify that the pop-up is displayed
            cy.get('.popup').should('be.visible');
    
            // Step 3: Verify the details in the pop-up match the data attributes from the card
            cy.get('.cards .card').first().then(($card) => {
                const patientName = $card.data('patient');
                const patientAge = $card.data('age');
                const patientGender = $card.data('gender');
                const bookingDate = $card.data('date');
                const bookingTime = $card.data('time');
                const bookingReason = $card.data('reason');
    
                // Check that the pop-up contains the correct details
                cy.get('#patientName').should('have.text', patientName);
                cy.get('#patientAge').should('have.text', patientAge);
                cy.get('#patientGender').should('have.text', patientGender);
                cy.get('#bookingDate').should('have.text', bookingDate);
                cy.get('#bookingTime').should('have.text', bookingTime);
                cy.get('#bookingReason').should('have.text', bookingReason);
            });
    
            // Step 4: Close the pop-up
            cy.get('.popup .close-btn').click();
    
            // Step 5: Verify that the pop-up is no longer visible
            cy.get('.popup').should('not.be.visible');
        });
    });

    describe('Mark Appointment as Done', () => {
        beforeEach(() => {
            // Visit the therapist dashboard page where appointments are listed
            cy.visit('http://localhost:8000/provider-dashboard');
        });
    
        it('should display a console message when an appointment is marked as completed', () => {
            // Step 1: Intercept the network request made when marking an appointment as done
            cy.intercept('POST', '/api/mark-appointment-done', {
                statusCode: 200,
                body: { success: true }
            }).as('markAppointmentDone');
    
            // Step 2: Spy on the console.log to check the message
            cy.window().then((win) => {
                cy.spy(win.console, 'log').as('consoleLog');
            });
    
            // Step 3: Click on the "Mark Appointment as Done" button
            cy.get('.mark-done-btn').first().click();
    
            
            
        });
    });
    
    

});
