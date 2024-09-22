describe('User Dashboard Navigation', () => {
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

    it('should navigate to the user dashboard when "My Dashboard" is clicked', () => {
        // Step 1: Find the "My Dashboard" link in the left sidebar and click it
        cy.get('.left').find('a').contains('My Dashboard').click();

        // Step 2: Verify that the user is redirected to the user dashboard page
        cy.url().should('include', '/userdashboard');
    });

    it('navigating to babysitter bookings page when "Babysitter Bookings" is clicked', () => {

        cy.visit('http://localhost:8000/userdashboard');
        // Step 1: Find the "Babysitter Bookings" link in the navigation bar and click it
        cy.get('.nav-bar').find('a').contains('Babysitter Bookings').click();

        // Step 2: Verify that the user is still on the user dashboard page
        cy.url().should('eq', 'http://localhost:8000/userdashboard');
    });

    it('navigating to therapy appointment page when "Mental health therapy appointments" is clicked', () => {

        cy.visit('http://localhost:8000/userdashboard');
        // Step 1: Find the "Babysitter Bookings" link in the navigation bar and click it
        cy.get('.nav-bar').find('a').contains('Mental Health Therapy Appointments').click();

        // Step 2: Verify that the user is still on the user dashboard page
        cy.url().should('eq', 'http://localhost:8000/userdashboard_therapy');
    });

    describe('User Dashboard - Add To-Do List Modal', () => {
        beforeEach(() => {
            // Visit the user dashboard page before each test
            cy.visit('http://localhost:8000/userdashboard');
        });
    
        it('should display the "Add To-Do List" modal when "Add to-do list" button is clicked', () => {
            // Step 1: Click on the "Add to-do list" button
            cy.get('button.add-todo-btn').first().click();
    
            // Step 2: Verify that the modal is displayed
            cy.get('.modal-content').should('be.visible');

    
           
        });


        it('should display the to do tasks modal when "View to-do list" button is clicked', () => {
            // Step 1: Click on the "Add to-do list" button
            cy.get('button#view-todo-btn').first().click();
    
            // Step 2: Verify that the modal is displayed
            cy.get('.modal-body').should('be.visible');

    
           
        });
    });
    
});
