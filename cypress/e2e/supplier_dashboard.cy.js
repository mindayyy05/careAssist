
Cypress.on('uncaught:exception', (err, runnable) => {
    return false;
  });
  describe('Supplier Dashboard', () => {
    beforeEach(() => {
        cy.visit('http://localhost:8000/supplier-login');

        cy.get('#email').type('healthguard@gmail.com');
        cy.get('#password').type('healthguard12345');
        cy.get('button').contains('Login').click();
    
        // Verify successful login
        cy.url().should('include', '/supplier-dashboard');
      // Visit the "Who Are You" page before each test
    
    });
  
    it('should redirect to the supplier login page when "Health products supplier Agency" is selected and "Sign Up" is clicked', () => {
      // Step 1: Click on the "Service Providing Agency" button to show the options
      cy.visit('http://localhost:8000/who-are-you');
      
      cy.contains('Service Providing Agency').click();
  
      // Step 2: Select "Babysitter Agency" from the dropdown
      cy.get('#agency-type').select('supplier');
  
      // Step 3: Click on the "Sign Up" button
      cy.get('button').contains('Sign Up').click();
  
      // Step 4: Verify that the user is redirected to the babysitter login page
      cy.url().should('include', 'http://localhost:8000/supplier-login');
    });

    it('should log in with correct credentials and redirect to the supplier dashboard', () => {
        // Visit the Babysitter Login page directly
        cy.visit('http://localhost:8000/supplier-login');
    
        // Step 1: Fill in the login form with correct credentials
        cy.get('#email').type('healthguard@gmail.com');
        cy.get('#password').type('healthguard12345');
    
        // Step 2: Click the "Login" button
        cy.get('button').contains('Login').click();
    
        // Step 3: Verify that the user is redirected to the babysitter dashboard
        cy.url().should('include', 'http://localhost:8000/supplier-dashboard');
      });

      it('should redirect to the supplier orders page when "Check Orders" is clicked', () => {

        cy.visit('http://localhost:8000/supplier-dashboard');
     // Locate by the text inside the <h2> tag
            cy.contains('h2', 'Check Orders').click();

            // Locate by a combination of class and href
            cy.url().should('include', 'http://localhost:8000/supplier-orders');
    });

   
    it('should display the order details modal when an order card is clicked', () => {

        cy.visit('http://localhost:8000/supplier-orders');
        // Locate the first order card and click it
        cy.get('.order-card').first().click();
    
        // Verify that the modal is visible
        cy.get('#orderModal').should('be.visible');
    
        // Verify that the modal contains the correct order details
        cy.get('#orderModal .modal-content').within(() => {
          cy.contains('h2', 'Order').should('be.visible');
    
          // Check for the presence of product details
          cy.get('.product-card').should('have.length.greaterThan', 0);
        });
    
      
      });

      it('pop up close button', () => {

        cy.visit('http://localhost:8000/supplier-orders');
        // Locate the first order card and click it
        cy.get('.order-card').first().click();
    
        // Verify that the modal is visible
        cy.get('#orderModal').should('be.visible');
    
        // Verify that the modal contains the correct order details
        cy.get('#orderModal .modal-content').within(() => {
          cy.contains('h2', 'Order').should('be.visible');
    
          // Check for the presence of product details
          cy.get('.product-card').should('have.length.greaterThan', 0);
        });
    
        // Optionally, test the close functionality
        cy.get('.modal-content .close').click();
    
        // Verify that the modal is no longer visible
        cy.get('#orderModal').should('not.be.visible');
      });
});

