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

    it('should have a working call button on the Babysitter Profile page', () => {
        // Navigate to the Babysitter Profile page
        cy.visit('http://localhost:8000/babysitterprofile');

        // Ensure that the page is loaded properly
        cy.url().should('eq', 'http://localhost:8000/babysitterprofile');

        // Click the call button
        cy.get('.call-button')
            .should('have.attr', 'href', 'tel:+94703003116');
    });

    it('should have a working message button on the Babysitter Profile page', () => {
        // Navigate to the Babysitter Profile page
        cy.visit('http://localhost:8000/babysitterprofile');

        // Ensure that the page is loaded properly
        cy.url().should('eq', 'http://localhost:8000/babysitterprofile');

        // Click the message button
        cy.get('.message-button')
            .should('have.attr', 'href', 'sms:+94703003116');
    });

    it('should navigate to step-2 after pressing Next button on Babysitter Profile page', () => {
        // Navigate to the Babysitter Profile page
        cy.visit('http://localhost:8000/babysitterprofile');

        // Ensure that the page is loaded properly
        cy.url().should('eq', 'http://localhost:8000/babysitterprofile');

        // Wait for the calendar to be loaded and visible
        cy.get('#calendar').should('be.visible');

        // Select the day 30
        cy.get('#calendar').find('.day').contains('30').click();

        // Wait for the Next button to be visible and click it
        cy.get('.next').should('be.visible').click();

        // Ensure navigation to step-2
        cy.get('.form-step step-1').should('not.exist');
        cy.get('.form-step step-2').should('not.exist');
    });
});




describe('Babysitter Booking Form', () => {
    before(() => {
        // Visit the page containing the form
        cy.visit('http://localhost:8000/babysitterprofile'); // Adjust the URL path as necessary
    });

    it('should disable submit button if required fields are not filled', () => {
        // Step 1: Navigate to Step 2
        cy.get('button.next').click();

        // Step 2: Ensure the form-step-2 is visible
        cy.get('.form-step.step-2').should('be.visible');

        // Step 3: Ensure the submit button is initially disabled
        cy.get('button.submit')
            .should('exist') // Ensure the button exists
         
        // Step 4: Fill in all required fields
        cy.get('#number_of_kids').type('2');
        cy.get('#kid_names').type('Alice, Bob');
        cy.get('#timing_start').type('08:00');
        cy.get('#timing_end').type('17:00');
        cy.get('#your_name').type('John Doe');
        cy.get('#phone_number').type('1234567890');
        cy.get('#house_address').type('123 Main St');

        // Step 5: Ensure the submit button is enabled after filling required fields
        cy.get('button.submit').should('not.be.disabled');
    });

    
});
